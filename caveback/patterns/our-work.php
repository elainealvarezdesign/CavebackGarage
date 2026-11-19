<?php
/**
 * Title: Our work (before/after + gallery)
 * Slug: caveback/our-work
 * Categories: caveback
 */
?>
<!-- wp:html -->
<section id="work" class="sec" aria-labelledby="work-h">
<div class="wrap">
<div style="display:flex;justify-content:space-between;align-items:flex-end;gap:20px 48px;flex-wrap:wrap;margin-bottom:36px">
<div style="display:flex;flex-direction:column;gap:16px;max-width:640px"><p class="eyebrow">Real transformations</p><h2 class="h2" id="work-h">From cluttered to <span class="serif">functional.</span></h2></div>
<p class="lead" style="max-width:380px">Drag the handle to see the difference a Reset and a storage system make.</p>
</div>
<div class="ba-wrap">
<div class="ba" id="ba">
<img src="<?php echo caveback_img( 'before-cluttered.jpg' ); ?>" alt="Before: a cluttered workshop garage">
<div style="position:absolute;inset:0;clip-path:inset(0 0 0 var(--split,50%))"><img src="<?php echo caveback_img( 'after-organized.jpg' ); ?>" alt="After: a clear garage floor with organized shelving"></div>
<span class="ba-tag" style="left:18px;background:#19252C;color:#FFFFFF">BEFORE</span>
<span class="ba-tag" style="right:18px;background:#D6F25B;color:#19252C">AFTER</span>
<label class="sr" for="ba-v2">Compare before and after</label>
<input class="ba-range" id="ba-v2" type="range" min="0" max="100" value="50">
<div class="ba-handle" aria-hidden="true" style="position:absolute;top:0;bottom:0;left:var(--split,50%);width:3px;margin-left:-1.5px;background:#D6F25B;z-index:3;pointer-events:none"><div class="ba-knob" style="position:absolute;top:50%;left:50%;width:52px;height:52px;margin:-26px 0 0 -26px;border-radius:50%;background:#D6F25B;color:#19252C;display:flex;align-items:center;justify-content:center;box-shadow:0 6px 18px rgba(0,0,0,.4)"><svg class="i" viewBox="0 0 24 24"><path d="M9 6l-6 6 6 6M15 6l6 6-6 6"></path></svg></div></div>
</div>

</div>
<ul class="gal">
<li><img src="<?php echo caveback_img( 'project-clear-floor.jpg' ); ?>" alt="A cleared garage with shelving along the walls" loading="lazy"><strong>[Project name] · Langley</strong><span>2-car garage · Reset + Tote System</span></li>
<li><img src="<?php echo caveback_img( 'project-tool-wall.jpg' ); ?>" alt="Tools hung on a wall-mounted board" loading="lazy"><strong>[Project name] · Surrey</strong><span>1-car garage · Keep Clear + Wall System</span></li>
<li><img src="<?php echo caveback_img( 'project-shelves.jpg' ); ?>" alt="Garage shelves full of organized items" loading="lazy"><strong>[Project name] · White Rock</strong><span>3-car garage · Full system + Floor Finish</span></li>
</ul>
<p style="margin:14px 0 0;font-size:12px;color:#8E978A">Prototype photos from Pexels. Replace with real Caveback projects before launch.</p>
</div>
</section>
<!-- /wp:html -->
