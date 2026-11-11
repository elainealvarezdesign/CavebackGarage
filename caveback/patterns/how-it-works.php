<?php
/**
 * Title: How it works
 * Slug: caveback/how-it-works
 * Categories: caveback
 */

$caveback_steps = array(
	array( 'video', 'Show us your garage', 'Send photos or a 1-minute video with the form. Prefer to talk? Call or text us.' ),
	array( 'clipboard', 'Get a clear quote', 'We recommend only what solves a real need, with a written estimate before any work starts.' ),
	array( 'truck', 'Reset day', 'We sort with you, haul away what goes and clean the space. You decide what stays.' ),
	array( 'grid', 'Organize what stays', 'We set up your Keep Clear zones and install totes and wall storage. Floor Finish if you want it.' ),
);
?>
<!-- wp:group {"tagName":"section","anchor":"how","className":"cb-section cb-process","layout":{"type":"default"}} -->
<section id="how" class="wp-block-group cb-section cb-process">
<!-- wp:group {"className":"cb-wrap","layout":{"type":"default"}} -->
<div class="wp-block-group cb-wrap">
<!-- wp:group {"className":"cb-stack","layout":{"type":"default"}} -->
<div class="wp-block-group cb-stack">
<!-- wp:paragraph {"className":"cb-eyebrow"} -->
<p class="cb-eyebrow">How it works</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"cb-h2"} -->
<h2 class="wp-block-heading cb-h2">A simple process, start to finish.</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<ol class="cb-steps">
<?php foreach ( $caveback_steps as $i => $step ) : ?>
<li><span class="cb-step__label"><span class="cb-icon-dot cb-icon-dot--lg"><?php echo caveback_icon( $step[0] ); ?></span>Step <?php echo (int) $i + 1; ?></span><h3><?php echo esc_html( $step[1] ); ?></h3><p><?php echo esc_html( $step[2] ); ?></p></li>
<?php endforeach; ?>
</ol>
<p class="cb-journey" aria-label="Customer journey: Clear, Reset, Organize, Keep Clear, Finish"><span>CLEAR</span><span aria-hidden="true">›</span><span>RESET</span><span aria-hidden="true">›</span><span>ORGANIZE</span><span aria-hidden="true">›</span><span>KEEP CLEAR</span><span aria-hidden="true">›</span><span>FINISH</span></p>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
