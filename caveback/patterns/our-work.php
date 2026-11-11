<?php
/**
 * Title: Our work (before/after + gallery)
 * Slug: caveback/our-work
 * Categories: caveback
 */
?>
<!-- wp:group {"tagName":"section","anchor":"work","className":"cb-section","layout":{"type":"default"}} -->
<section id="work" class="wp-block-group cb-section">
<!-- wp:group {"className":"cb-wrap","layout":{"type":"default"}} -->
<div class="wp-block-group cb-wrap">
<!-- wp:group {"className":"cb-split","layout":{"type":"default"}} -->
<div class="wp-block-group cb-split">
<!-- wp:group {"className":"cb-stack","layout":{"type":"default"}} -->
<div class="wp-block-group cb-stack">
<!-- wp:paragraph {"className":"cb-eyebrow"} -->
<p class="cb-eyebrow">Real transformations</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"cb-h2"} -->
<h2 class="wp-block-heading cb-h2">From cluttered to functional.</h2>
<!-- /wp:heading -->

<!-- wp:separator {"className":"cb-rule"} -->
<hr class="wp-block-separator has-alpha-channel-opacity cb-rule"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"className":"cb-body"} -->
<p class="cb-body">Everything you keep gets a place. Drag the handle to see the difference a Reset and a storage system make.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<ul class="cb-checks">
<li><?php echo caveback_icon( 'check' ); ?>Visible floor and room to park again</li>
<li><?php echo caveback_icon( 'check' ); ?>Shelving and totes you can reach in seconds</li>
<li><?php echo caveback_icon( 'check' ); ?>Bikes, tools and gear off the floor</li>
</ul>
<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<div class="cb-ba" data-cb-ba>
<img src="<?php echo caveback_img( 'before-cluttered.jpg' ); ?>" alt="Before: a cluttered workshop garage with tools and boxes everywhere">
<div class="cb-ba__after"><img src="<?php echo caveback_img( 'after-organized.jpg' ); ?>" alt="After: a clear garage floor with organized shelving"></div>
<span class="cb-ba__tag cb-ba__tag--before">BEFORE</span>
<span class="cb-ba__tag cb-ba__tag--after">AFTER</span>
<label class="cb-sr" for="cb-ba-range">Compare before and after</label>
<input class="cb-ba__range" id="cb-ba-range" type="range" min="0" max="100" value="50">
<div class="cb-ba__handle" aria-hidden="true"><div class="cb-ba__knob"><?php echo caveback_icon( 'swap' ); ?></div></div>
</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<ul class="cb-gallery">
<li><img src="<?php echo caveback_img( 'project-clear-floor.jpg' ); ?>" alt="A cleared garage with shelving along the walls" loading="lazy"><strong>[Project name] · Langley</strong><span>2-car garage · Reset + Tote System</span></li>
<li><img src="<?php echo caveback_img( 'project-tool-wall.jpg' ); ?>" alt="Tools hung on a wall-mounted board" loading="lazy"><strong>[Project name] · Surrey</strong><span>1-car garage · Keep Clear + Wall System</span></li>
<li><img src="<?php echo caveback_img( 'project-shelves.jpg' ); ?>" alt="Garage shelves full of labelled items" loading="lazy"><strong>[Project name] · White Rock</strong><span>3-car garage · Full system + Floor Finish</span></li>
</ul>
<p class="cb-credit">Prototype photos from Pexels. Replace with real Caveback projects before launch.</p>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
