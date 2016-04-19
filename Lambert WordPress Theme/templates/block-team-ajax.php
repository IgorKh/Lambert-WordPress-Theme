<?php
	
	if ( ! isset( $_POST['popup_data'] ) ) {
		return;
	}
	$data = $_POST['popup_data'];
	
	$name        = isset( $data['name'] ) ? $data['name'] : '';
	$post        = isset( $data['post'] ) ? $data['post'] : '';
	$description = isset( $data['description'] ) ? $data['description'] : '';
	$image       = isset( $data['image'] ) ? $data['image'] : '';
	$find_label  = isset( $data['find_label'] ) ? $data['find_label'] : '';
	$facebook    = isset( $data['facebook'] ) ? $data['facebook'] : '';
	$twitter     = isset( $data['twitter'] ) ? $data['twitter'] : '';
	$dribbble    = isset( $data['dribbble'] ) ? $data['dribbble'] : '';
	$pinterest   = isset( $data['pinterest'] ) ? $data['pinterest'] : '';
?>
<div id="custom-content" class="white-popup-block">
	<div class="team-modal">
		<a href="#" class="popup-modal-dismiss"><i class="fa fa-compress"></i></a>
		
		<div class="row-fluid">
			<div class="col-md-6">
				<img src="<?= $image ?>" class="respimg" alt=""/>
			</div>
			<div class="col-md-6">
				<div class="section-title">
					<h3><?= $name ?></h3>
					<h4 class="decor-title"><?= $post ?></h4>
					
					<div class="separator color-separator"></div>
				</div>
				<p><?= $description ?></p>
				<?php
					if ( $facebook !== ''
					     || $twitter !== ''
					     || $dribbble !== ''
					     || $pinterest !== ''
					) {
						echo "<h5>$find_label</h5>";
						echo "<ul class='team-social'>";

						echo $facebook !== '' ? "<li><a href='$facebook' target='_blank' class='elem'><i class='fa fa-facebook'></i></a></li>" : '';
						echo $twitter !== '' ? "<li><a href='$twitter' target='_blank' class='elem'><i class='fa fa-twitter'></i></a></li>" : '';
						echo $dribbble !== '' ? "<li><a href='$dribbble' target='_blank' class='elem'><i class='fa fa-dribbble'></i></a></li>" : '';
						echo $pinterest !== '' ? "<li><a href='$pinterest' target='_blank' class='elem'><i class='fa fa-pinterest-square'></i></a></li>" : '';

						echo "</ul>";
					}
				?>
			</div>
		</div>
	</div>
</div>