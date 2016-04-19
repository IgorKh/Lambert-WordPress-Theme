/**
 * Created by Igor on 3/23/15.
 */

//todo перегенирировать всю таблицу после аякса, чтобы не было несуществующих полей
//блок сохранения
var KHT_SavingBlock = {

    //необходимые селекторы
    selector: {
        wrap: 'KHT_save',
        text: 'text',
        icon: 'icon',
        whereAppend: '#wpadminbar'
    },

    //необходимый текст
    text: {
        init: 'Все ок :)',
        action: 'Сохраняю...'
    },

    //разметка, которую ьудем добавлять в шапку
    html: function (selectors, text) {
        return '<p id="' + selectors.wrap + '">' +
            '<span class="' + selectors.text + '">' + text + '</span>' +
            '<img class="icon" src="' + pluginURL + '/img/cube.svg" >' +
            '</p>';
    },

    //как раз изменяет состояния, с с"сохраняется", до "сохранено"
    action: function (status) {

        var sel = this.selector;
        var txt = this.text;

        switch (status) {
            case 'start':
                sel.wrap.addClass('saving');
                sel.text.text(txt.action);
                sel.icon.fadeIn('fast');

                break;

            case 'stop':
                sel.text.text(txt.init);
                sel.icon.fadeOut('slow');

                setTimeout(function () {
                    sel.wrap.removeClass('saving');
                }, 4000);
                break;
            default :
                //return console.log('saving block. action. no status');
                break;
        }
    },

    init: function () {

        if (typeof pluginURL === typeof undefined) {
            return;
        }

        var sel = this.selector;
        var txt = this.text;

        jQuery(this.html(sel, txt.init)).appendTo(sel.whereAppend);

        sel.wrap = jQuery('#' + sel.wrap);
        sel.text = jQuery('.' + sel.text);
        sel.icon = jQuery('.' + sel.icon);
    }
};
KHT_SavingBlock.init();


var KHT_doSave = {

    attr_prev: 'data-prev',

    //собственно хэндлер
    set_previous_value: function (el) {
        var value = el.val();

        el.attr(this.attr_prev, value);
    },

    check_previous_value: function (el) {
        var attr = el.attr(this.attr_prev);

        var name = el.attr('name');
        var value = el.val();

        if (attr !== value) {
            this.save(name, value, el);
        }
    },

    save: function (name, value, el) {
        KHT_SavingBlock.action('start');

        var root = this;

        var data = {
            action: 'save_setting',
            name: name,
            value: value
        };

        jQuery.post(
            ajaxurl,
            data,
            function (response) {
                console.log(response);
                KHT_SavingBlock.action('stop');
                root.highlightSaved(el);
                //root.db_debug(name);
            }
        );
    },

    remove: function (settings) {

        var root = this;

        var data = {
            action: 'remove_settings',
            settings: settings
        };

        //console.log(data);

        jQuery.post(
            ajaxurl,
            data,
            function (response) {
                //try {
                //    response = JSON.parse(response);
                //    console.log(response);
                //    //callback(response);
                //} catch (error) {
                //    console.warn('JSON parse error ' + error); //error in the above string(in this case,yes)!
                //}
                console.log(response);
                KHT_SavingBlock.action('stop');
                //root.db_debug(settings);
            }
        );
    },

    highlightSaved: function (el) {
        var class_name = 'saved';
        el.addClass(class_name);
        setTimeout(function () {
            el.removeClass(class_name);
        }, 1000)
    },

    db_debug: function (key) {
        var data = {
            action: 'debug_DB',
            key_debug: key
        };

        //console.log(data);

        jQuery.post(
            ajaxurl,
            data,
            function (response) {
                //try {
                //    response = JSON.parse(response);
                //    console.log(response);
                //    //callback(response);
                //} catch (error) {
                //    console.warn('JSON parse error ' + error); //error in the above string(in this case,yes)!
                //}
                //var deb = jQuery('.db_debug');
                //deb.html(response);
                //deb.addClass('active');
                //setTimeout(function () {
                //    deb.removeClass('active');
                //}, 3000);

                //console.log(response);
            }
        );
    }


};

function KHT_backEnd($, templateUrl) {

//todo: корректное клонирование чекбоксов
//todo: сброс чекбоксов при клонировании
    //Определяем селекторы, названия полей и прочее

    //текстовое поле
    var field = $('.field');
    //выпадающий список
    var select = $('select');
    //чекбокс
    var checkbox = $('.checkbox');
    //загрузка картинки
    var upload_button = $('.' + 'upload_image_button');

    //события
    //текстареа и инпут
    field.focus(function () {
        KHT_doSave.set_previous_value($(this));
    });

    //выпадающий список
    select.focus(function () {
        KHT_doSave.set_previous_value($(this));
    });

    //картинка
    upload_button.focus(function () {
        var field = $(this).siblings('input');
        KHT_doSave.set_previous_value(field);
    });


    //селект
    select.change(function () {
        KHT_doSave.check_previous_value($(this));
    });


    //текстовые поля
    field.blur(function () {
        KHT_doSave.check_previous_value($(this));
    });

    //чекбокс
    checkbox.change(function () {
        var el = $(this);
        var value = el.val();
        if (value == '1' || value == '0') {
            switch (value) {
                case '0':
                    el.val(1);
                    el.attr('checked', true);
                    break;
                case '1':
                    el.val(0);
                    el.attr('checked', false);
                    break;
            }
            KHT_doSave.save(el.attr('name'), el.val(), el);
        }
    });

    //картинка
    upload_button.click(function (event) {
        //определяем поля для использования
        var element = $(this);
        var field = element.siblings('input');
        var link = element.siblings('a');
        var img = link.find('img');

        upload(event, field, img, link);
    });

    //загружает картинку
    function upload(event, field, image, link) {

        //объявляем загрузчик картинки
        var custom_uploader;

        //текст кнопки
        var text = 'Загрузить';
        var black_hole = templateUrl + '/img/empty.png';

        event.preventDefault();

        //если уже открыт загрузчик, уходим
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        //Определяем загрузчик картинки
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: text,
            button: {
                text: text
            },
            multiple: false
        });

        //определяем действия после выбора картинки
        custom_uploader.on('select', function () {

            //хз, но по ходу берем выбранную картинку и после используем адрес этой картинки
            var attachment = custom_uploader.state().get('selection').first().toJSON();

            //меняем у поля, ссылки и картинки предосмотра аттрибуты и значения на загруженну картинку

            var url = attachment.url.trim() !== '' ? attachment.url.trim() : black_hole;

            field.val(url);
            link.attr('href', url);
            image.attr('src', url);


            //ну и собственно проверяем, изменилась ли картинка и сохраняем ее
            KHT_doSave.check_previous_value(field);
        });
        custom_uploader.open();
    }

    //добавляем модальное окно для предосмотра картинок
    $(".fancybox").fancybox({
        arrows: false
    });

    $('.' + 'wpPages_dropDown').find('select').addClass('form-control')

}

if (typeof pluginURL !== typeof undefined) {
    KHT_backEnd(jQuery, pluginURL)
}