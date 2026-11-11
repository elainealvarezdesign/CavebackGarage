<?php
/**
 * Title: Quote request (2-step form)
 * Slug: caveback/quote
 * Categories: caveback
 *
 * Prototype form: submission is simulated in assets/js/caveback.js.
 * On the live site, replace the form with Elementor Pro Form / WPForms (multi-step).
 */

$caveback_chips = array(
	'reset' => 'Caveback Reset',
	'keep'  => 'Keep Clear',
	'tote'  => 'Tote System',
	'wall'  => 'Wall System',
	'floor' => 'Floor Finish',
);
?>
<!-- wp:group {"tagName":"section","anchor":"quote","className":"cb-section cb-band","layout":{"type":"default"}} -->
<section id="quote" class="wp-block-group cb-section cb-band">
<!-- wp:group {"className":"cb-wrap cb-split cb-split--top","layout":{"type":"default"}} -->
<div class="wp-block-group cb-wrap cb-split cb-split--top">
<!-- wp:group {"className":"cb-stack","layout":{"type":"default"}} -->
<div class="wp-block-group cb-stack">
<!-- wp:paragraph {"className":"cb-eyebrow"} -->
<p class="cb-eyebrow">Get a free quote</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"cb-h2 cb-h2--xl"} -->
<h2 class="wp-block-heading cb-h2 cb-h2--xl">Let’s get your garage back.</h2>
<!-- /wp:heading -->

<!-- wp:separator {"className":"cb-rule"} -->
<hr class="wp-block-separator has-alpha-channel-opacity cb-rule"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"className":"cb-body"} -->
<p class="cb-body">Tell us a little about your space. Photos or a quick video help us give you an accurate quote, faster.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<h3 class="cb-h3" style="font-size:15px;letter-spacing:.06em;text-transform:uppercase;margin-top:8px">What happens next</h3>
<ol class="cb-numbered">
<li><span>1</span><span>We review your details, photos and video.</span></li>
<li><span>2</span><span>We reply within [1 business day] with an estimate or a short visit time.</span></li>
<li><span>3</span><span>You pick a date. No obligation, no pressure.</span></li>
</ol>
<p class="cb-small" style="font-weight:600;margin-top:8px">Rather talk to someone?</p>
<div class="cb-contact-btns">
<a href="tel:+16040000000"><?php echo caveback_icon( 'phone' ); ?>Call</a>
<a href="sms:+16040000000"><?php echo caveback_icon( 'message' ); ?>Text</a>
<a href="mailto:hello@example.com"><?php echo caveback_icon( 'mail' ); ?>Email</a>
</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<div class="cb-form-card" data-cb-quote>
<div data-cb-quote-steps>
<div class="cb-progress-head"><h3>Request your quote</h3><span class="cb-small" style="font-size:13px;font-weight:600" data-cb-step-label>Step 1 of 2</span></div>
<ol class="cb-progress" aria-label="Form progress">
<li class="is-active" data-cb-progress="1" aria-current="step">1. Your details</li>
<li data-cb-progress="2">2. Your garage</li>
</ol>

<form class="cb-form" data-cb-step="1">
<div class="cb-fields">
<div><label class="cb-label" for="cb-name">Full name <span class="cb-req" aria-hidden="true">*</span></label><input class="cb-field" id="cb-name" type="text" required autocomplete="name" placeholder="Jordan Smith"></div>
<div><label class="cb-label" for="cb-email">Email <span class="cb-req" aria-hidden="true">*</span></label><input class="cb-field" id="cb-email" type="email" required autocomplete="email" placeholder="you@example.com"></div>
<div><label class="cb-label" for="cb-phone">Phone <span class="cb-req" aria-hidden="true">*</span></label><input class="cb-field" id="cb-phone" type="tel" required autocomplete="tel" placeholder="(604) 555-0123"></div>
<div><label class="cb-label" for="cb-city">City or postal code <span class="cb-req" aria-hidden="true">*</span></label><input class="cb-field" id="cb-city" type="text" required autocomplete="postal-code" placeholder="Langley or V2Y 1A1"></div>
<div><label class="cb-label" for="cb-contact">Best way to reach you</label><select class="cb-field" id="cb-contact"><option>Phone call</option><option>Text message</option><option>Email</option></select></div>
</div>
<button class="cb-btn cb-btn--primary cb-btn--lg" type="submit">Continue to garage details <?php echo caveback_icon( 'arrow-right' ); ?></button>
<p class="cb-note"><span aria-hidden="true">*</span> Required · Takes about a minute · No obligation</p>
</form>

<form class="cb-form" data-cb-step="2" hidden>
<div><label class="cb-label" for="cb-size">Garage size</label><select class="cb-field" id="cb-size"><option value="">Choose a size</option><option>1-car garage</option><option>2-car garage</option><option>3-car garage or larger</option><option>Not sure</option></select></div>
<fieldset class="cb-fieldset"><legend>Services you’re interested in</legend>
<div class="cb-chips">
<?php foreach ( $caveback_chips as $key => $label ) : ?>
<button type="button" class="cb-toggle cb-chip" data-cb-svc="<?php echo esc_attr( $key ); ?>" aria-pressed="false"><?php echo caveback_icon( 'check' ); ?><?php echo esc_html( $label ); ?></button>
<?php endforeach; ?>
</div>
</fieldset>
<div><label class="cb-label" for="cb-msg">Tell us about your garage</label><textarea class="cb-field" id="cb-msg" rows="3" placeholder="What’s in there now, and what would you like to use the space for?"></textarea></div>
<div><span class="cb-label">Photos or a short video</span>
<label class="cb-drop" for="cb-files"><?php echo caveback_icon( 'upload' ); ?><span><strong>Choose files</strong> or drag them here</span><span class="cb-small" style="font-size:13px" data-cb-files-label>JPG, PNG, HEIC or MP4 · up to 5 files · [max size] each</span></label>
<input class="cb-sr" id="cb-files" type="file" multiple accept="image/*,video/*"></div>
<div><label class="cb-label" for="cb-video">Or paste a video link <span style="font-weight:400;color:var(--cb-muted)">(optional)</span></label><input class="cb-field" id="cb-video" type="url" placeholder="YouTube, Google Drive or Dropbox link"></div>
<label class="cb-consent"><input type="checkbox" required><span>I agree that Caveback may use these details to contact me about my quote. See our <a href="#privacy">Privacy Policy</a>. <span class="cb-req" aria-hidden="true">*</span></span></label>
<div class="cb-form-row">
<button class="cb-btn cb-btn--ghost cb-btn--lg" type="button" data-cb-back><?php echo caveback_icon( 'arrow-left' ); ?>Back</button>
<button class="cb-btn cb-btn--primary cb-btn--lg" type="submit">Send my quote request <?php echo caveback_icon( 'arrow-right' ); ?></button>
</div>
<p class="cb-note">Spam-protected. Your details are never sold or shared.</p>
</form>
</div>

<div class="cb-done" data-cb-quote-done role="status" tabindex="-1" hidden>
<span class="cb-done__icon"><?php echo caveback_icon( 'check' ); ?></span>
<h3>Thanks! Your request is in.</h3>
<p>We’ll reply within [1 business day] using your preferred contact method. A confirmation is on its way to your inbox.</p>
<p>While you wait, browse the <a href="#catalog">storage catalog</a> to see the options we install.</p>
<button class="cb-btn cb-btn--ghost" type="button" data-cb-again>Send another request</button>
</div>
</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
