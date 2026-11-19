<?php
/**
 * Title: Services (carousel)
 * Slug: caveback/services
 * Categories: caveback
 */
?>
<!-- wp:html -->
<section id="services" class="sec" aria-labelledby="svc-h">
<div class="wrap">
<div style="display:flex;justify-content:space-between;align-items:flex-end;gap:24px 48px;flex-wrap:wrap;margin-bottom:40px">
<div style="display:flex;flex-direction:column;gap:16px;max-width:640px"><p class="eyebrow">Our services</p><h2 class="h2" id="svc-h">Five services. <span class="serif">One</span> clear garage.</h2></div>
<div style="display:flex;flex-direction:column;gap:18px;max-width:400px"><p class="lead">Start with a Reset and add only what you need. Tap <strong style="color:#FFFFFF">+</strong> on a service to add it to your quote.</p>
<div style="display:flex;gap:10px"><button class="circ" type="button" aria-label="Previous services" id="svc-prev"><svg class="i" viewBox="0 0 24 24" aria-hidden="true" style="width:20px;height:20px"><path d="M19 12H5M11 18l-6-6 6-6"></path></svg></button><button class="circ circ-lime" type="button" aria-label="Next services" id="svc-next"><svg class="i" viewBox="0 0 24 24" aria-hidden="true" style="width:20px;height:20px"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></button></div></div>
</div>
<ul class="track" id="svc-track" aria-label="Caveback services">
<li class="svc feat"><div class="svc-img"><img src="<?php echo caveback_img( 'before-cluttered.jpg' ); ?>" alt="" loading="lazy"><span class="svc-num">01</span><button class="svc-add" type="button" aria-pressed="false" aria-label="Add Caveback Reset to quote" data-svc="reset"><svg class="i" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"></path></svg></button></div><div class="svc-body"><h3>Caveback Reset</h3><p style="color:#D3DACB">Full garage cleanout. We sort with you, remove what goes and leave a clean slate.</p><span class="svc-tag" style="background:#D6F25B;color:#19252C">Start here</span></div></li>
<li class="svc"><div class="svc-img"><img src="<?php echo caveback_img( 'project-clear-floor.jpg' ); ?>" alt="" loading="lazy"><span class="svc-num">02</span><button class="svc-add" type="button" aria-pressed="false" aria-label="Add Keep Clear to quote" data-svc="keep"><svg class="i" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"></path></svg></button></div><div class="svc-body"><h3>Keep Clear</h3><p>An organization plan with clear zones for tools, sports gear, seasonal items and more.</p><span class="svc-tag" style="border:1px solid #3F535D;color:#E2E5E1">Organization</span></div></li>
<li class="svc"><div class="svc-img"><img src="<?php echo caveback_img( 'project-shelves.jpg' ); ?>" alt="" loading="lazy"><span class="svc-num">03</span><button class="svc-add" type="button" aria-pressed="false" aria-label="Add Tote System to quote" data-svc="tote"><svg class="i" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"></path></svg></button></div><div class="svc-body"><h3>Tote System</h3><p>Custom racks sized for your totes, so every bin slides in and out easily.</p><span class="svc-tag" style="border:1px solid #3F535D;color:#E2E5E1">Storage</span></div></li>
<li class="svc"><div class="svc-img"><img src="<?php echo caveback_img( 'project-tool-wall.jpg' ); ?>" alt="" loading="lazy"><span class="svc-num">04</span><button class="svc-add" type="button" aria-pressed="false" aria-label="Add Wall System to quote" data-svc="wall"><svg class="i" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"></path></svg></button></div><div class="svc-body"><h3>Wall System</h3><p>Slatwall panels and wall-mounted storage that get bikes, tools and gear off the floor.</p><span class="svc-tag" style="border:1px solid #3F535D;color:#E2E5E1">Storage</span></div></li>
<li class="svc"><div class="svc-img"><img src="<?php echo caveback_img( 'after-organized.jpg' ); ?>" alt="" loading="lazy"><span class="svc-num">05</span><button class="svc-add" type="button" aria-pressed="false" aria-label="Add Floor Finish to quote" data-svc="floor"><svg class="i" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"></path></svg></button></div><div class="svc-body"><h3>Floor Finish</h3><p>Professional floor coating for a durable, easy-to-clean finish.</p><span class="svc-tag" style="border:1px dashed #5C707B;color:#C3CBBF">Optional upgrade</span></div></li>
</ul>
<p role="status" style="margin:18px 0 0;display:flex;align-items:center;gap:10px;font-size:15px;color:#C3CBBF"><span style="width:8px;height:8px;border-radius:50%;background:#D6F25B;flex-shrink:0"></span><span id="svc-summary">No services selected yet.</span></p>
</div>
</section>
<!-- /wp:html -->
