<?php
	namespace KHT_menu;

	class Data {
		static $general = array(
			'title'  => 'General settings',
			'logo'   => array(
				'title'  => 'Logo setup',
				'fields' => array(
					'logo_top'    => array(
						'title' => 'Logo on black background',
						'type'  => 'image',
						'size'  => 6
					),
					'logo_footer' => array(
						'title' => 'Logo on black background',
						'type'  => 'image',
						'size'  => 6
					),
				),
			),
			'social' => array(
				'title'  => 'Social links',
				'fields' => array(
					'facebook'  => array(
						'title'  => 'Facebook',
						'fields' => array(
							'url'    => array(
								'title' => 'Full url',
								'size'  => 10
							),
							'enable' => array(
								'title' => 'Enable?',
								'type'  => 'checkbox',
								'size'  => 2
							)
						)
					),
					'twitter'   => array(
						'title'  => 'Twitter',
						'fields' => array(
							'url'    => array(
								'title' => 'Full url',
								'size'  => 10
							),
							'enable' => array(
								'title' => 'Enable?',
								'type'  => 'checkbox',
								'size'  => 2
							)
						)
					),
					'instagram' => array(
						'title'  => 'Instagram',
						'fields' => array(
							'url'    => array(
								'title' => 'Full url',
								'size'  => 10
							),
							'enable' => array(
								'title' => 'Enable?',
								'type'  => 'checkbox',
								'size'  => 2
							)
						)
					),
					'pinterest' => array(
						'title'  => 'Pinterest',
						'fields' => array(
							'url'    => array(
								'title' => 'Full url',
								'size'  => 10
							),
							'enable' => array(
								'title' => 'Enable?',
								'type'  => 'checkbox',
								'size'  => 2
							)
						)
					),
					'tumblr'    => array(
						'title'  => 'Tumblr',
						'fields' => array(
							'url'    => array(
								'title' => 'Full url',
								'size'  => 10
							),
							'enable' => array(
								'title' => 'Enable?',
								'type'  => 'checkbox',
								'size'  => 2
							)
						)
					),

				),
			),
			//'clients' => array(
			//	'title'  => 'Clients gallery',
			//	'fields' => array(
			//		'image' => array(
			//			'title' => 'Client #',
			//			'max'   => 100,
			//			//'text_add_button'    => 'Add image',
			//			//'text_remove_button' => 'Remove image',
			//			'type'  => 'image',
			//			'size'  => 4
			//		),
			//	),
			//),
			'pages'  => array(
				'title'  => 'Select correct pages',
				'fields' => array(
					'home'        => array(
						'title' => 'Home page',
						'type'  => 'wpPages_dropDown',
						'size'  => 4
					),
					'menu'        => array(
						'title' => 'Menu page',
						'type'  => 'wpPages_dropDown',
						'size'  => 4
					),
					'gallery'     => array(
						'title' => 'Gallery page',
						'type'  => 'wpPages_dropDown',
						'size'  => 4
					),
					'reservation' => array(
						'title' => 'Reservation page',
						'type'  => 'wpPages_dropDown',
						'size'  => 4
					),
					'contact'     => array(
						'title' => 'Contact page',
						'type'  => 'wpPages_dropDown',
						'size'  => 4
					),
				),
			),
		);

		static $home = array(
			'title'        => 'Home page settings',
			'header'       => array(
				'title'  => 'Header',
				'fields' => array(
					'title'       => array(
						'title' => 'Title',
						'size'  => 6
					),
					'description' => array(
						'title' => 'Description',
						'type'  => 'textarea',
						'size'  => 6
					),
					'bg'          => array(
						'title' => 'Header background #',
						'type'  => 'image',
						'max'   => 5
					),
				),
			),
			'discover'     => array(
				'title'  => 'Discover block',
				'fields' => array(
					'title'       => array(
						'title' => 'Title',
						'size'  => 6
					),
					'subtitle'    => array(
						'title' => 'Sub title',
						'size'  => 6
					),
					'description' => array(
						'title' => 'Text',
						'type'  => 'textarea',
						'size'  => 6
					),
					'link_label'  => array(
						'title' => 'Link label',
						'size'  => 6
					),
					'link'        => array(
						'title' => 'Page',
						'type'  => 'wpPages_dropDown',
						'size'  => 6
					),
					'slider'      => array(
						'title' => 'Slider image #',
						'type'  => 'image',
						'max'   => 10
					),
				),
			),
			'restaurants'  => array(
				'title'  => '"Our restaurants" block',
				'fields' => array(
					'title'       => array(
						'title' => 'Title',
						'size'  => 6
					),
					'subtitle'    => array(
						'title' => 'Sub title',
						'size'  => 6
					),
					'description' => array(
						'title' => 'Text',
						'type'  => 'textarea',
						'size'  => 6
					),
					'link_label'  => array(
						'title' => 'Link label',
						'size'  => 6
					),
					'link'        => array(
						'title' => 'Page',
						'type'  => 'wpPages_dropDown',
						'size'  => 6
					),
					'slider'      => array(
						'title' => 'Slider image #',
						'type'  => 'image',
						'max'   => 10
					),
				),
			),
			'weakly_deals' => array(
				'title'  => '"WEEKLY DEALS" block',
				'fields' => array(
					'title'      => array(
						'title' => 'Title',
						'size'  => 6
					),
					'subtitle'   => array(
						'title' => 'Sub title',
						'size'  => 6
					),
					'bg'         => array(
						'title' => 'Background',
						'type'  => 'image',
					),
					'link_label' => array(
						'title' => 'Link label',
						'size'  => 6
					),
					'link'       => array(
						'title' => 'Page',
						'type'  => 'wpPages_dropDown',
						'size'  => 6
					),
					'menu'       => array(
						'title'  => 'Menu row #',
						'max'    => 7,
						'fields' => array(
							'day'       => array(
								'title' => 'Names of the day',
								'size'  => 8
							),
							'details'   => array(
								'title' => 'Detail (between brackets)',
								'size'  => 4
							),
							'name'      => array(
								'title' => 'Item name',
								'size'  => 8
							),
							'old_price' => array(
								'title' => 'Old price',
								'size'  => 2
							),
							'new_price' => array(
								'title' => 'New price',
								'size'  => 2
							)
						)
					)
				),
			),
			'team'         => array(
				'title'  => '"Our Team" block',
				'fields' => array(
					'title'       => array(
						'title' => 'Title',
						'size'  => 6
					),
					'subtitle'    => array(
						'title' => 'Sub title',
						'size'  => 6
					),
					'description' => array(
						'title' => 'Description',
						'type'  => 'textarea',
					),
					'team'        => array(
						'title'  => 'Team member #',
						'number' => 4,
						'fields' => array(
							'name'        => array(
								'title' => 'Name',
								'size'  => 8
							),
							'post'        => array(
								'title' => 'Post',
								'size'  => 4
							),
							'thumb'       => array(
								'title' => 'Preview image (340 x 340)',
								'type'  => 'image',
								'size'  => 6
							),
							'image'       => array(
								'title' => 'Big image',
								'type'  => 'image',
								'size'  => 6
							),
							'description' => array(
								'title' => 'Description',
								'type'  => 'textarea'
							),
							'facebook'    => array(
								'title'  => 'Facebook',
								'fields' => array(
									'url'    => array(
										'title' => 'Full url',
										'size'  => 10
									),
									'enable' => array(
										'title' => 'Enable?',
										'type'  => 'checkbox',
										'size'  => 2
									)
								)
							),
							'twitter'     => array(
								'title'  => 'Twitter',
								'fields' => array(
									'url'    => array(
										'title' => 'Full url',
										'size'  => 10
									),
									'enable' => array(
										'title' => 'Enable?',
										'type'  => 'checkbox',
										'size'  => 2
									)
								)
							),
							'dribbble'    => array(
								'title'  => 'Dribbble"',
								'fields' => array(
									'url'    => array(
										'title' => 'Full url',
										'size'  => 10
									),
									'enable' => array(
										'title' => 'Enable?',
										'type'  => 'checkbox',
										'size'  => 2
									)
								)
							),
							'pinterest'   => array(
								'title'  => 'Pinterest',
								'fields' => array(
									'url'    => array(
										'title' => 'Full url',
										'size'  => 10
									),
									'enable' => array(
										'title' => 'Enable?',
										'type'  => 'checkbox',
										'size'  => 2
									)
								)
							),
						)
					),
					'find_label'  => array(
						'title' => '"Find on" label',
						'size'  => 6
					),
					'more'        => array(
						'title' => '"More info" label',
						'size'  => 6
					),
				),
			),
		);

		static $headerFooter = array(
			'footer' => array(
				'title'  => 'Footer block',
				'fields' => array(
					'social_title' => array(
						'title' => 'Social block. Title',
						'size'  => 6
					),
					'text'         => array(
						'title'  => 'Footer text',
						'fields' => array(
							'col_1'     => array(
								'title'  => 'Column 1',
								'size'   => 4,
								'fields' => array(
									'text' => array(
										'title' => 'Title'
									),
									'link' => array(
										'title' => 'Full link'
									)
								),
							),
							'col_2'     => array(
								'title'  => 'Column 2',
								'size'   => 4,
								'fields' => array(
									'text' => array(
										'title' => 'Title'
									),
									'link' => array(
										'title' => 'Full link'
									)
								),
							),
							'col_3'     => array(
								'title'  => 'Column 3',
								'size'   => 4,
								'fields' => array(
									'text' => array(
										'title' => 'Title'
									),
									'link' => array(
										'title' => 'Full link'
									)
								),
							),
							'copyright' => array(
								'title' => 'Copyright text',
								'size'  => 6
							),
							'toTop'     => array(
								'title' => 'To top label',
								'size'  => 6
							),
						),
					),

				)
			),
		);

		static $blog = array(
			'title'     => 'Blog settings',
			'header'    => array(
				'title'  => 'Header',
				'fields' => array(
					'title'       => array(
						'title' => 'Title',
						'size'  => 6
					),
					'description' => array(
						'title' => 'Description',
						'type'  => 'textarea',
						'size'  => 6
					),
					'bg'          => array(
						'title' => 'Header background',
						'type'  => 'image',
					),
				),
			),
			'titles'    => array(
				'title'  => 'Titles',
				'fields' => array(
					'search'   => array(
						'title' => 'Search results',
						'size'  => 6
					),
					'tag'      => array(
						'title' => 'By tag',
						'size'  => 6
					),
					'category' => array(
						'title' => 'By category',
						'size'  => 6
					),
					'author'   => array(
						'title' => 'By author',
						'size'  => 6
					),
				),
			),
			'sidebar'   => array(
				'title'  => 'Sidebar',
				'fields' => array(
					'text_widget'   => array(
						'title'  => 'Text widget',
						'size'   => 6,
						'fields' => array(
							'title' => array(
								'title' => 'Title',
							),
							'text'  => array(
								'title' => 'Text',
								'type'  => 'textarea'
							),
						),
					),
					'tags'          => array(
						'title' => 'Tags title',
						'size'  => 6
					),
					'last_updates'  => array(
						'title' => 'Last updates title',
						'size'  => 6
					),
					'categories'    => array(
						'title' => 'Categories title',
						'size'  => 6
					),
					'slider_widget' => array(
						'title'  => 'Slider widget',
						'fields' => array(
							'title' => array(
								'title' => 'Title',
							),
							'image' => array(
								'title' => 'Image',
								'max'   => 10,
								'type'  => 'image'
							),
						),
					),
				),
			),
			'post_data' => array(
				'title'  => 'Various post text',
				'fields' => array(
					'comments' => array(
						'title' => 'Comments label',
						'size'  => 6
					),
					'author'   => array(
						'title' => 'Author label',
						'size'  => 6
					),
					'more'     => array(
						'title' => 'Read more label',
						'size'  => 6
					),
					'search'   => array(
						'title' => 'Search label',
						'size'  => 6
					),
					'not'      => array(
						'title' => 'Not found text',
						'type'  => 'textarea',
						'size'  => 6
					),

				),
			)
		);

		static $testimonials = array(
			'title'        => '"TESTIMONIALS"" block settings',
			'header'       => array(
				'title'  => 'Titles',
				'fields' => array(
					'title'     => array(
						'title' => 'Title',
						'size'  => 6
					),
					'sub_title' => array(
						'title' => 'Sub Title',
						'size'  => 6
					),
				)
			),
			'testimonials' => array(
				'title'  => 'Testimonial #',
				'max'    => 10,
				'fields' => array(
					'name' => array(
						'title' => 'Name',
						'size'  => 6
					),
					'text' => array(
						'title' => 'Text',
						'type'  => 'textarea',
						'size'  => 6
					),
				)
			),
			'bg'           => array(
				'title' => 'Background image',
				'type'  => 'image',
			),
		);

		static $open_hours = array(
			'title'  => '"OPENING HOURS"" block settings',
			'header' => array(
				'title'  => 'Titles',
				'fields' => array(
					'title'     => array(
						'title' => 'Title',
						'size'  => 6
					),
					'sub_title' => array(
						'title' => 'Sub Title',
						'size'  => 6
					),
				)
			),
			'block1' => array(
				'title'  => 'Block 1',
				'fields' => array(
					'title' => array(
						'title' => 'Title',
						'size'  => 6
					),
					'time1' => array(
						'title' => 'Time 1',
						'size'  => 3
					),
					'time2' => array(
						'title' => 'Time 2',
						'size'  => 3
					),
				)
			),
			'block2' => array(
				'title'  => 'Block 2',
				'fields' => array(
					'title' => array(
						'title' => 'Title',
						'size'  => 6
					),
					'time1' => array(
						'title' => 'Time 1',
						'size'  => 3
					),
					'time2' => array(
						'title' => 'Time 2',
						'size'  => 3
					),
				)
			),
			'phone'  => array(
				'title' => 'Phone number',
			),
			'bg'     => array(
				'title' => 'Background image',
				'type'  => 'image',
			),
			'video'  => array(
				'title' => 'Background video',
				'type'  => 'image',
			),
		);

		static $menu = array(
			'title' => '"Menu"" page settings',
			'menu'  => array(
				'title'  => 'Menu',
				'fields' => array(
					'currency' => array(
						'title' => 'Currency',
						'size'  => 4,
						'class' => 'pull-right'
					),
					'block'    => array(
						'title'  => 'Block #',
						'max'    => 10,
						'fields' => array(
							'title'           => array(
								'title' => 'Title',
								'size'  => 4
							),
							'sub_title'       => array(
								'title' => 'Subtitle',
								'size'  => 4
							),
							'label_selection' => array(
								'title' => 'Title for selection label',
								'size'  => 4
							),
							'bg'              => array(
								'title' => 'Background image',
								'type'  => 'image',
							),
							'item'            => array(
								'title'  => 'Menu item #',
								'max'    => 20,
								'size'   => 6,
								'fields' => array(
									'name'        => array(
										'title' => 'Name',
										'size'  => 8
									),
									'price'       => array(
										'title' => 'Price',
										'size'  => 4
									),
									'description' => array(
										'title' => 'Description',
										'size'  => 8
									),
									'selection'   => array(
										'title' => 'Selection item?',
										'type'  => 'checkbox',
										'size'  => 4
									),
									'bg'          => array(
										'title' => 'Item image',
										'type'  => 'image',
									),
								)
							),
						)
					),
				)
			),
		);

		static function gallery() {

			$filter_data = array();

			if ( isset( KHT_f( 'gallery' )['filters'] )
			     && isset( KHT_f( 'gallery' )['filters'][0]['title'] )
			     && isset( KHT_f( 'gallery' )['filters'][0]['id'] )
			) {

				foreach ( KHT_f( 'gallery' )['filters'] as $filter ) {
					$filter_data[ $filter['id'] ] = $filter['title'];

				}

			}


			$output = array(
				'title'      => 'Blog settings',
				'header'     => array(
					'title'  => 'Header',
					'fields' => array(
						'title'       => array(
							'title' => 'Title',
							'size'  => 6
						),
						'description' => array(
							'title' => 'Description',
							'type'  => 'textarea',
							'size'  => 6
						),
						'bg'          => array(
							'title' => 'Header background',
							'type'  => 'image',
						),
					),
				),
				'filters'    => array(
					'title'  => 'Filters',
					'max'    => 8,
					'fields' => array(
						'title' => array(
							'title' => 'Filter Name',
							'size'  => 8
						),
						'id'    => array(
							'title' => 'Filter Id (no special characters)',
							'size'  => 4
						),

					),
				),
				'items'      => array(
					'title'  => 'Gallery item #',
					'max'    => 30,
					'fields' => array(
						'image'       => array(
							'title' => 'Image Link',
							'type'  => 'image',
							'size'  => 6
						),
						'thumb'       => array(
							'title' => 'Item thumbnail',
							'type'  => 'image',
							'size'  => 6
						),
						'description' => array(
							'title' => 'Description of Image Link (optional)',
							'size'  => 3
						),
						'size'        => array(
							'title' => 'Big size of thumbnail? (optional)',
							'type'  => 'checkbox',
							'size'  => 3
						),
						'video'       => array(
							'title' => 'Video Link (Youtube or Vimeo only; If the field specified, Image Link will be ignored) ',
							'size'  => 6
						),
						'filters'     => array(
							'title'      => 'Select filter for Item (Reload page if no variants). Item #',
							'type'       => 'select',
							'max'        => 10,
							'selectData' => $filter_data,
							'size'       => 6
						),
					)
				),
				'filter_all' => array(
					'title' => 'Label for "ALL" filter',
				)
			);


			return $output;
		}

		static $reservation = array(
			'title'  => 'Reservation page settings',
			'header' => array(
				'title'  => 'Header',
				'fields' => array(
					'title'       => array(
						'title' => 'Title',
						'size'  => 6
					),
					'description' => array(
						'title' => 'Description',
						'type'  => 'textarea',
						'size'  => 6
					),
					'bg'          => array(
						'title' => 'Header background',
						'type'  => 'image',
					),
				),
			),
			'text'   => array(
				'title'  => 'Text before reservation form',
				'fields' => array(
					'title'       => array(
						'title' => 'Title',
						'size'  => 6
					),
					'description' => array(
						'title' => 'Description',
						'type'  => 'textarea',
						'size'  => 6
					),
				),
			),
			'email'  => array(
				'title' => 'Email for reservations requests',
				'size'  => 6
			),
		);
		static $contact = array(
			'title'     => 'Contact page settings',
			'header'    => array(
				'title'  => 'Header',
				'fields' => array(
					'title'       => array(
						'title' => 'Title',
						'size'  => 6
					),
					'description' => array(
						'title' => 'Description',
						'type'  => 'textarea',
						'size'  => 6
					),
					'bg'          => array(
						'title' => 'Header background',
						'type'  => 'image',
					),
				),
			),
			'text'      => array(
				'title'  => 'Text before contact form',
				'fields' => array(
					'title'       => array(
						'title' => 'Title',
						'size'  => 6
					),
					'description' => array(
						'title' => 'Description',
						'type'  => 'textarea',
						'size'  => 6
					),
				),
			),
			'addresses' => array(
				'title'  => 'Addresses',
				'fields' => array(
					'item' => array(
						'title'  => 'Address #',
						'number' => 3,
						'fields' => array(
							'title'     => array(
								'title' => 'Title',
								'size'  => 6,
							),
							'address'   => array(
								'title' => 'Address',
								'size'  => 6,
							),
							'phone'     => array(
								'title' => 'Phone number',
								'size'  => 6,
							),
							'email'     => array(
								'title' => 'Email',
								'size'  => 6,
							),
							'latitude'  => array(
								'title' => 'Location (Latitude)',
								'size'  => 6,
							),
							'longitude' => array(
								'title' => 'Location (Longitude)',
								'size'  => 6,
							),
						),
					),

				),
			),
			'email'     => array(
				'title' => 'Email for messages',
				'size'  => 6
			),
		);

		static $p404 = array(
			'title'  => 'Page 404 (not found)',
			'header' => array(
				'title' => 'Title',
			),
			'text'   => array(
				'title' => 'Text',
				'type'  => 'textarea'
			),
			'image'  => array(
				'title' => 'Image',
				'type'  => 'image'
			),

		);
	}
