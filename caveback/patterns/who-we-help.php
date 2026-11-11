<?php
/**
 * Title: Who we help
 * Slug: caveback/who-we-help
 * Categories: caveback
 */

$caveback_audiences = array(
	array( 'home', 'Busy families', 'Room to park, play and find things fast, without giving up a weekend.' ),
	array( 'truck', 'Moving or selling', 'Clear and stage the garage before listing photos or moving day.' ),
	array( 'heart', 'Downsizing &amp; seniors', 'A patient, hands-on team to sort, lift and haul, at your pace.' ),
	array( 'refresh', 'After a family change', 'New baby, a move-in or an estate: reorganize around how you live now.' ),
);
?>
<!-- wp:group {"tagName":"section","className":"cb-section","layout":{"type":"default"}} -->
<section class="wp-block-group cb-section">
<!-- wp:group {"className":"cb-wrap","layout":{"type":"default"}} -->
<div class="wp-block-group cb-wrap">
<!-- wp:group {"className":"cb-head-row","layout":{"type":"default"}} -->
<div class="wp-block-group cb-head-row">
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"cb-eyebrow"} -->
<p class="cb-eyebrow">Who we help</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"cb-h2"} -->
<h2 class="wp-block-heading cb-h2">Garage gotten away from you?</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"cb-body"} -->
<p class="cb-body">It happens to everyone. No judgment, just a practical plan to make your garage work again.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<ul class="cb-grid4">
<?php foreach ( $caveback_audiences as $a ) : ?>
<li class="cb-card"><?php echo caveback_icon( $a[0] ); ?><h3><?php echo $a[1]; // Static copy, contains an entity. ?></h3><p><?php echo esc_html( $a[2] ); ?></p></li>
<?php endforeach; ?>
</ul>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
