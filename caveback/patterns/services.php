<?php
/**
 * Title: Services (slider)
 * Slug: caveback/services
 * Categories: caveback
 */

$caveback_services = array(
	array( 'reset', 'trash', '01', 'Caveback Reset', 'Full garage cleanout. We sort with you, remove what goes and leave a clean slate.', 'Start here', 'cb-badge--light' ),
	array( 'keep', 'layers', '02', 'Keep Clear', 'An organization plan with clear zones for tools, sports gear, seasonal items and more.', 'Organization', '' ),
	array( 'tote', 'tote', '03', 'Tote System', 'Custom racks sized for your totes, so every bin slides in and out easily.', 'Storage', '' ),
	array( 'wall', 'wall', '04', 'Wall System', 'Slatwall panels and wall-mounted storage that get bikes, tools and gear off the floor.', 'Storage', '' ),
	array( 'floor', 'floor', '05', 'Floor Finish', 'Professional floor coating for a durable, easy-to-clean finish.', 'Optional upgrade', 'cb-badge--outline' ),
);
?>
<!-- wp:group {"tagName":"section","anchor":"services","className":"cb-section","layout":{"type":"default"}} -->
<section id="services" class="wp-block-group cb-section">
<!-- wp:group {"className":"cb-wrap","layout":{"type":"default"}} -->
<div class="wp-block-group cb-wrap">
<!-- wp:group {"className":"cb-head-row","layout":{"type":"default"}} -->
<div class="wp-block-group cb-head-row">
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"cb-eyebrow"} -->
<p class="cb-eyebrow">Our services</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"cb-h2"} -->
<h2 class="wp-block-heading cb-h2">Five services. One clear garage.</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"cb-body"} -->
<p class="cb-body">Start with a Reset and add only the storage you need. Tap <strong>Add to quote</strong> on anything that fits; we’ll carry it into your quote form.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<div data-cb-slider>
<ul class="cb-slider cb-slider--services" aria-label="Caveback services">
<?php foreach ( $caveback_services as $s ) : ?>
<li class="cb-card">
<div class="cb-card__top"><span class="cb-icon-dot cb-icon-dot--lg"><?php echo caveback_icon( $s[1] ); ?></span><span class="cb-card__num"><?php echo esc_html( $s[2] ); ?></span></div>
<h3 class="cb-h3"><?php echo esc_html( $s[3] ); ?></h3>
<p><?php echo esc_html( $s[4] ); ?></p>
<span class="cb-badge <?php echo esc_attr( $s[6] ); ?>"><?php echo esc_html( $s[5] ); ?></span>
<button type="button" class="cb-toggle" data-cb-svc="<?php echo esc_attr( $s[0] ); ?>" aria-pressed="false"><?php echo caveback_icon( 'check' ); ?><span data-cb-label>Add to quote</span><span class="cb-sr"> — <?php echo esc_html( $s[3] ); ?></span></button>
</li>
<?php endforeach; ?>
</ul>
<div class="cb-slider-foot">
<p class="cb-summary" role="status" data-cb-summary>No services selected yet. Pick any that fit, or just tell us about your garage.</p>
<div class="cb-arrows"><button class="cb-arrow-btn" type="button" data-cb-prev aria-label="Previous services"><?php echo caveback_icon( 'arrow-left' ); ?></button><button class="cb-arrow-btn cb-arrow-btn--next" type="button" data-cb-next aria-label="Next services"><?php echo caveback_icon( 'arrow-right' ); ?></button></div>
</div>
</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
