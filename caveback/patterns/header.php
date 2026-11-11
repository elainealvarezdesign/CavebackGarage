<?php
/**
 * Title: Header
 * Slug: caveback/header
 * Categories: caveback
 * Inserter: no
 */
?>
<!-- wp:group {"className":"cb-wrap cb-header__inner","layout":{"type":"default"}} -->
<div class="wp-block-group cb-wrap cb-header__inner">
<!-- wp:image {"width":"180px","sizeSlug":"full","linkDestination":"custom","className":"cb-logo"} -->
<figure class="wp-block-image size-full is-resized cb-logo"><a href="#main"><img src="<?php echo caveback_img( 'caveback-logo-reversed.png' ); ?>" alt="Caveback Garage Co. home" style="width:180px"/></a></figure>
<!-- /wp:image -->

<!-- wp:navigation {"overlayMenu":"mobile","className":"cb-nav","layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:navigation-link {"label":"Services","url":"#services","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"How it works","url":"#how","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Our work","url":"#work","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Catalog","url":"#catalog","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"FAQ","url":"#faq","kind":"custom"} /-->
<!-- /wp:navigation -->

<!-- wp:html -->
<div class="cb-header__actions">
<a class="cb-phone" href="tel:+16040000000"><?php echo caveback_icon( 'phone' ); ?><span class="cb-phone__label">(604) XXX-XXXX</span><span class="cb-sr">Call Caveback</span></a>
<a class="cb-btn cb-btn--primary" href="#quote">Get a free quote <?php echo caveback_icon( 'arrow-right' ); ?></a>
</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
