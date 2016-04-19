<?php

	$data = KHT_f( 'headerFooter' )['footer']['text'];

	$data = array(
		array(
			'text' => KGS($data['col_1']['text']),
			'link' => $data['col_1']['link'],
		),
		array(
			'text' => KGS($data['col_2']['text']),
			'link' => $data['col_2']['link'],
		),
		array(
			'text' => KGS($data['col_3']['text']),
			'link' => $data['col_3']['link'],
		),
	);

	$output = '';

	foreach ( $data as $block ) {
		$link = $block['link'];
		$text = $block['text'];

		$output .= "<li><a href='$link'>$text</a></li>";
	}



?>
<ul class="footer-contacts">
	<?= $output ?>
</ul>