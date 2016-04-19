/**
 * Created by Igor on 6/24/15.
 */

(function ($) {

    if (typeof pluginURL === typeof undefined) {
        return;
    }

    var ids = {
        wrap: 'max-wrap',
        body: 'sort-body',
        block: 'movable-block',
        add: 'buttonAdd',
        block_title: 'block-title',
        remove: 'close-block',
        move: 'sort-blocks',
        max: 'data-max',
        name: 'data-name',
        index: 'data-index',
        count_header: 'count-header',
        size: 'data-size'
    };

    function htmlAdd() {
        $('.' + ids.wrap).each(function () {
            var data = {};
            data.max_wrap = $(this);
            data.max = parseInt(data.max_wrap.attr(ids.max));
            data.size = parseInt(data.max_wrap.attr(ids.size));
            data.parent = data.max_wrap.children('.' + ids.body);
            data.sample_element = data.parent.children();
            data.length = data.sample_element.length;

            data.html = {};
            data.html.className = ids.add + ' col-xs-12 col-sm-' + data.size + ' ' + (data.size === 12 ? 'fullWidth' : '');
            data.html.title = 'Add block';
            data.html.html = '<a href="#" class="' + data.html.className + '" title="' + data.html.title + '"></a>';


            $(data.html.html).appendTo(data.parent);

            data.button = data.parent.children('.' + ids.add);

            if (data.length >= data.max) {
                hide(data.button);
            }

            if (data.size !== 12) {

                function buttonAddHeight() {
                    data.button.css('height', data.sample_element.height())
                }

                buttonAddHeight();

                $(window).resize(function () {
                    buttonAddHeight();
                })

            }

        });
    }

    htmlAdd();

    $('.' + ids.add).click(function (event) {
        event.preventDefault();

        KHT_SavingBlock.action('start');

        var data = get_elements($(this));

        if (data.length >= (data.max - 1)) {
            hide(data.current);
            KHT_SavingBlock.action('stop');
            return;
        }

        if (data.length > 1) {
            show(data.move);
        }

        add(data);

        KHT_SavingBlock.action('stop');

    });

    function add(data) {

        //картинка для заглушки поля загрузки картинки
        var black_hole = pluginURL + '/img/empty.png';

        //самое вкусное

        //делаем клон последнего элемента и добавляем его в конец
        data.last.clone(true).insertBefore(data.current).hide();

        //берем только что созданный последний элемент
        data = get_elements(data.current);

        data.last.fadeIn();
        //увеличиваем индекс
        data.last_index = data.last_index + 1;
        //меняем индекс в атрибуте индекса, будем его использовать для замены заголовков и прочего
        data.last.attr(ids.index, data.last_index);


        //очищаем дочерние блоки, в которых можно тоже добавлять блоки.
        //оставляем только первый блок в данном случае
        data.last.find('.' + ids.body).each(function () {
            $(this).children('.' + ids.block + ':not(:first-child)').remove();
        });

        //ищем поля настроек по имени
        data.last.find('*[name*=' + data.name + ']').each(function () {
            var el = $(this);

            //Если был аттрибут disable убираем
            el.attr('disabled', false);

            //очищаем значение поля
            el.val('');


            if (el.is('select')) {
                var option = $(this).find('option');
                option.each(function (index, element) {
                    element = $(element);
                    if (index === 0) {
                        element.attr('selected', true);
                    } else {
                        element.attr('selected', false);
                    }
                });
            }


            if (el.hasClass('checkbox')) {
                el.attr('checked', false);
                el.val('0');
            }

        });

        rename_ids(data.last, data.name, data.last_index, (data.last_index - 1));

        //если добавляем поле загрузки картинки, то очищаем ссылку и src картинки и убераем активный класс
        data.last.find('.fancybox').each(function () {
            var element = $(this);
            var img = element.find('img');

            element.attr('href', black_hole);
            img.attr('src', black_hole);
        });

    }

    function htmlRemove() {
        $('.' + ids.wrap).each(function () {

            var data = {};

            data.parent = $(this);
            data.body = data.parent.children('.' + ids.body);
            data.block = data.body.children('.' + ids.block);

            data.html = {};
            data.html.className = ' ' + ids.remove + ' ';
            data.html.title = 'Remove Block';
            data.html.html = '<div class="' + data.html.className + '" title="' + data.html.title + '"></div>';

            data.block.each(function () {
                $(data.html.html).appendTo($(this).children('.' + ids.block_title));


            });

        });
    }

    htmlRemove();

    $('.' + ids.remove).click(function (event) {
        event.preventDefault();

        //показываем анимацию сохранения
        KHT_SavingBlock.action('start');

        var data = get_elements($(this));

        if (data.length < 1) {
            KHT_SavingBlock.action('stop');
            return;
        }

        if (data.length === 1) {
            hide(data.move);
        }

        if (data.length <= data.max) {
            show(data.add);
        }

        remove(data);

        KHT_SavingBlock.action('stop');
    });


    function remove(data) {
        data.parent.children('.' + ids.block).each(function (index) {
            if (index > data.index) {
                $(this).attr(ids.index, (index - 1));
                rename_ids($(this), data.name, (index - 1), index);
            }
        });

        KHT_doSave.remove(data.name + data.index);

        data.block.fadeOut(400, function () {
            data.block.remove();
        });
        //data.block.fadeOut();
    }


    function get_elements(current) {
        var data = {};
        data.current = current;
        data.max_wrap = current.closest('.' + ids.wrap);
        data.max = parseInt(data.max_wrap.attr(ids.max));
        data.parent = current.closest('.' + ids.body);
        data.block = current.closest('.' + ids.block);
        data.length = data.parent.children('.' + ids.block).length;
        data.last = data.parent.children('.' + ids.block).last();
        data.last_index = parseInt(data.last.attr(ids.index));
        data.name = data.max_wrap.attr(ids.name);
        data.index = parseInt(data.block.attr(ids.index));


        if (current.hasClass(ids.add)) {
            data.add = current;
        } else {
            data.add = data.parent.children('.' + ids.add);
        }

        if (current.hasClass(ids.remove)) {
            data.remove = current;
        } else {
            data.remove = data.parent.children('.' + ids.block_title).children('.' + ids.remove);
        }

        if (current.hasClass(ids.move)) {
            data.move = current;
        } else {
            data.move = data.max_wrap.children('.' + ids.move);
        }

        return data;
    }

    function rename_ids(element, name, index, replace_index) {

        //создаем регулярное выражение для замены данных настроек в новом блоке
        var regex_find = '(' + name + replace_index + ')',
            regex = new RegExp(regex_find, 'g');

        //ищем поля настроек по имени
        element.find('*[name*=' + name + ']').each(function () {
            var el = $(this);
            var el_name = el.attr('name');

            //заменяем  старое имя на новое ( по сути, меняем только индекс)
            el_name = el_name.replace(regex, name + index);

            //Заменяем аттрибут name и id на новый
            el.attr('name', el_name);
            el.attr('id', el_name);
        });

        //ищем
        element.find('.' + ids.count_header).each(function () {
            $(this).attr('class', $(this).attr('class').replace(regex, name + index));
        });

        element.find('*[for*=' + name + ']').each(function () {
            var el = $(this);
            el.attr('for', el.attr('for').replace(regex, name + index));
        });

        //меняем цифру в заголовке блока и в подписи к полю
        element.find('.' + name + ids.count_header).text(index + 1);

        element.find('*[data-name*=' + name + ']').each(function () {
            $(this).attr(ids.name, $(this).attr(ids.name).replace(regex, name + index))
        });
    }

    function is_visible(element) {
        return element.is(":visible") ? true : false;
    }

    function show(element) {
        if (!is_visible(element)) {
            element.show();
        }
    }

    function hide(element) {
        if (is_visible(element)) {
            element.hide();
        }
    }


    //todo пока не действует
    $('.' + ids.move).click(function (event) {
        event.preventDefault();

        //показываем анимацию сохранения
        KHT_SavingBlock.action('start');

        var data = get_elements($(this));

        move(data);

        KHT_SavingBlock.action('stop');
    });

    function move(data) {
        data.current.toggleClass('active');

        var sortable = null;
        var sortable_id = 'KHT_sortable';
        var sort = document.getElementById(sortable_id);
        var sort_pages_button = $('.sort-pages');
        var sortable_items = wrap.find('#' + sortable_id + ' li');

        switch (data.current.hasClass('active')) {
            case true:
                sortable = new Sortable(sort, {
                    scrollSensitivity: 100,
                    ghostClass: 'sortable-placeholder',
                    handle: ".panel-heading",
                    onUpdate: function () {
                        //send_ajax_sortable();
                    }
                });
                break;
            case false:
                if (typeof sortable === typeof undefined) {
                    return;
                }
                sortable.destroy();
                break;
        }

    }
})(jQuery);
