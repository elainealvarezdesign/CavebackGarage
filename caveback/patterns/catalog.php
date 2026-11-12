<?php
/**
 * Title: Storage catalog download
 * Slug: caveback/catalog
 * Categories: caveback
 */
?>
<!-- wp:group {"tagName":"section","anchor":"catalog","className":"cb-section cb-catalog","layout":{"type":"default"}} -->
<section id="catalog" class="wp-block-group cb-section cb-catalog">
<!-- wp:group {"className":"cb-wrap cb-split","layout":{"type":"default"}} -->
<div class="wp-block-group cb-wrap cb-split">
<!-- wp:html -->
<div class="cb-cover-wrap" aria-hidden="true"><div class="cb-cover"><div class="cb-cover__inner">
<img src="<?php echo caveback_img( 'caveback-logo-reversed.png' ); ?>" alt="">
<div class="cb-cover__rule"></div>
<span class="cb-cover__kicker">2026 STORAGE CATALOG</span>
<span class="cb-cover__title">Everything you keep gets a place.</span>
</div></div></div>
<!-- /wp:html -->

<!-- wp:group {"className":"cb-stack","layout":{"type":"default"}} -->
<div class="wp-block-group cb-stack">
<!-- wp:paragraph {"className":"cb-eyebrow"} -->
<p class="cb-eyebrow">Free storage catalog</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"cb-h2"} -->
<h2 class="wp-block-heading cb-h2">See every storage option before we visit.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"cb-body"} -->
<p class="cb-body">Browse the cabinets, shelving and racks we install, with sizes, finishes and what each one is best for. Pick favourites and bring them to your quote.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<ul class="cb-checks cb-checks--grid">
<li><?php echo caveback_icon( 'check' ); ?>Tote racks &amp; shelving</li>
<li><?php echo caveback_icon( 'check' ); ?>Cabinets &amp; workbenches</li>
<li><?php echo caveback_icon( 'check' ); ?>Slatwall panels &amp; hooks</li>
<li><?php echo caveback_icon( 'check' ); ?>Overhead storage</li>
<li><?php echo caveback_icon( 'check' ); ?>Bike, sport &amp; tool storage</li>
<li><?php echo caveback_icon( 'check' ); ?>Floor finish colours</li>
</ul>
<form class="cb-form" data-cb-catalog novalidate>
<div><label class="cb-label" for="cb-cat-email">Email address</label>
<div class="cb-inline-form"><input class="cb-field" id="cb-cat-email" name="email" type="email" required autocomplete="email" placeholder="you@example.com"><button class="cb-btn cb-btn--dark" type="submit"><?php echo caveback_icon( 'download' ); ?>Email me the catalog</button></div></div>
<p hidden><label>Leave this empty <input name="bot-field" tabindex="-1" autocomplete="off"></label></p>
<p class="cb-small" data-cb-catalog-note>Free PDF, emailed to you by our team. No spam.</p>
<p class="cb-note cb-error" data-cb-catalog-error role="alert" style="text-align:left" hidden>Sorry, that didn’t go through. Please try again.</p>
</form>
<div class="cb-done" data-cb-catalog-done role="status" hidden><span class="cb-done__icon"><?php echo caveback_icon( 'check' ); ?></span><p><strong>Thanks! We’ll email you the catalog shortly.</strong><br>Keep an eye on your inbox. <a href="#quote" style="color:#45522a;font-weight:700">Ready for a quote?</a></p></div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
