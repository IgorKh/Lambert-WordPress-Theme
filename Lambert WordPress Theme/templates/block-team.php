<?php
	$data = KHT_f( 'home' )['team']
?>

<!--=============== team ===============-->
<section id="sec3">
	<div class="triangle-decor"></div>
	<div class="container">
		<div class="section-title">
			<h3><?= KGS( $data['title'] ) ?></h3>
			<h4><?= KGS( $data['subtitle'] ) ?></h4>
			
			<div class="separator color-separator"></div>
		</div>
		<div class="inner">
			<p><?= KGS( $data['description'] ) ?></p>
		</div>
		<div class="bold-separator">
			<span></span>
		</div>
		<div class="team-links">
			<?php
				$find_label = KGS( $data['find_label'] );
				$more       = KGS( $data['more'] );

				foreach ( $data['team'] as $item ) {

					$name  = $item['name'];
					$post  = $item['post'];
					$thumb = $item['thumb'];

					//Ну да лапша, а что делать... Время поджимает...

					$get_link = get_template_directory_uri() . '/' . 'templates/block-team-ajax.php';

					$attr_name        = "data-ajax-name='$name'";
					$attr_post        = "data-ajax-post='$post'";
					$attr_image       = "data-ajax-image='" . $item['image'] . "'";
					$attr_find_label  = "data-ajax-find_label='$find_label'";
					$attr_facebook    = "data-ajax-facebook='" . ( isset( $item['facebook']['enable'] ) && $item['facebook']['enable'] == '1' ? $item['facebook']['url'] : '' ) . "'";
					$attr_twitter    = "data-ajax-twitter='" . ( isset( $item['twitter']['enable'] ) && $item['twitter']['enable'] == '1' ? $item['twitter']['url'] : '' ) . "'";
					$attr_dribbble    = "data-ajax-dribbble='" . ( isset( $item['dribbble']['enable'] ) && $item['dribbble']['enable'] == '1' ? $item['dribbble']['url'] : '' ) . "'";
					$attr_pinterest    = "data-ajax-pinterest='" . ( isset( $item['pinterest']['enable'] ) && $item['pinterest']['enable'] == '1' ? $item['pinterest']['url'] : '' ) . "'";


					echo "<div class='team-item'>";
					echo "<a href='$get_link' class='popup-with-move-anim' $attr_name $attr_post $attr_image $attr_find_label $attr_facebook $attr_twitter $attr_dribbble $attr_pinterest>";
					echo "<span class='team-details'>$more</span>";
					echo "<span class='team-description' style='display: none'>".$item['description']."</span>";
					echo "<img src='$thumb' alt='$name' class='respimg'>";
					echo "<span class='chefname'>$name</span>";
					echo "<span class='chefinfo'>$post</span>";
					echo "</a>";
					echo "</div>";

				}
			?>
		</div>
	</div>
</section>
<!--section end-->