<?php
/**
 * Title: Quote request (2-step form)
 * Slug: caveback/quote
 * Categories: caveback
 */
?>
<!-- wp:html -->
<section id="quote" aria-labelledby="quote-h" style="padding:0 0 clamp(64px,8vw,112px)">
<div class="wrap">
<div class="qpanel slats">
<div style="display:flex;flex-direction:column;gap:22px">
<p class="eyebrow">Get a free quote</p>
<h2 class="h2" id="quote-h" style="font-size:clamp(38px,4.6vw,64px)">Let’s get your garage <span class="serif">back.</span></h2>
<p style="margin:0;font-size:17px;line-height:1.6;color:#D3DACB">Tell us a little about your space. A few photos help us give you an accurate quote, faster.</p>
<ol class="qnum">
<li><span>1</span><span>We review your details and photos.</span></li>
<li><span>2</span><span>We reply within [1 business day] with an estimate or a short visit time.</span></li>
<li><span>3</span><span>You pick a date. No obligation, no pressure.</span></li>
</ol>
<div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:4px">
<a class="cpill" href="tel:+16040000000"><svg class="i" viewBox="0 0 24 24" aria-hidden="true" style="width:16px;height:16px"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"></path></svg>Call</a>
<a class="cpill" href="sms:+16040000000"><svg class="i" viewBox="0 0 24 24" aria-hidden="true" style="width:16px;height:16px"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>Text</a>
<a class="cpill" href="mailto:hello@example.com"><svg class="i" viewBox="0 0 24 24" aria-hidden="true" style="width:16px;height:16px"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="M22 6l-10 7L2 6"></path></svg>Email</a>
</div>
</div>
<div class="fcard">
<div id="q-steps">
<div style="display:flex;justify-content:space-between;align-items:baseline;gap:12px;flex-wrap:wrap"><h3 style="margin:0;font-size:22px;font-weight:800">Request your quote</h3><span style="font-size:13px;font-weight:700;color:#4E5750">Step <span id="q-stepnum">1</span> of 2</span></div>
<ol aria-label="Form progress" style="list-style:none;margin:14px 0 22px;padding:0;display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:8px">
<li id="q-p1" aria-current="step" style="display:flex;flex-direction:column;gap:8px;font-size:13px;font-weight:700"><span style="height:5px;border-radius:3px;background:#566634"></span>1. Your details</li>
<li id="q-p2" style="display:flex;flex-direction:column;gap:8px;font-size:13px;font-weight:700;color:#6B7366"><span style="height:5px;border-radius:3px;background:#DCDFD8"></span>2. Your garage</li>
</ol>
<div id="q-s1">
<form id="q-form1" style="display:flex;flex-direction:column;gap:16px">
<p hidden><label>Leave this empty <input name="bot-field" tabindex="-1" autocomplete="off"></label></p>
<div class="fgrid">
<div><label class="flabel" for="v2-name">Full name <span aria-hidden="true" style="color:#566634">*</span></label><input class="field" id="v2-name" name="name" type="text" required="" autocomplete="name" placeholder="Jordan Smith"></div>
<div><label class="flabel" for="v2-email">Email <span aria-hidden="true" style="color:#566634">*</span></label><input class="field" id="v2-email" name="email" type="email" required="" autocomplete="email" placeholder="you@example.com"></div>
<div><label class="flabel" for="v2-phone">Phone <span aria-hidden="true" style="color:#566634">*</span></label><input class="field" id="v2-phone" name="phone" type="tel" required="" autocomplete="tel" placeholder="(604) 555-0123"></div>
<div><label class="flabel" for="v2-city">City or postal code <span aria-hidden="true" style="color:#566634">*</span></label><input class="field" id="v2-city" name="city" type="text" required="" autocomplete="postal-code" placeholder="Langley or V2Y 1A1"></div>
</div>
<div><label class="flabel" for="v2-contact">Best way to reach you</label><select class="field" id="v2-contact" name="contact_preference"><option>Phone call</option><option>Text message</option><option>Email</option></select></div>
<button class="fsend" type="submit">Continue to garage details<span class="dot"><svg class="i" viewBox="0 0 24 24" aria-hidden="true" style="width:20px;height:20px"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></span></button>
<p style="margin:0;font-size:12px;color:#4E5750;text-align:center"><span aria-hidden="true">*</span> Required · Takes about a minute · No obligation</p>
</form>
</div>
<div id="q-s2" hidden>
<form id="q-form2" style="display:flex;flex-direction:column;gap:16px">
<div><label class="flabel" for="v2-size">Garage size</label><select class="field" id="v2-size" name="garage_size"><option value="">Choose a size</option><option>1-car garage</option><option>2-car garage</option><option>3-car garage or larger</option><option>Not sure</option></select></div>
<fieldset style="border:0;margin:0;padding:0"><legend class="flabel" style="padding:0;margin-bottom:8px">Services you’re interested in</legend>
<div style="display:flex;flex-wrap:wrap;gap:8px">
<button class="chip" type="button" aria-pressed="false" data-svc="reset">Caveback Reset</button>
<button class="chip" type="button" aria-pressed="false" data-svc="keep">Keep Clear</button>
<button class="chip" type="button" aria-pressed="false" data-svc="tote">Tote System</button>
<button class="chip" type="button" aria-pressed="false" data-svc="wall">Wall System</button>
<button class="chip" type="button" aria-pressed="false" data-svc="floor">Floor Finish</button>
</div></fieldset>
<div><label class="flabel" for="v2-msg">Tell us about your garage</label><textarea class="field" id="v2-msg" name="message" rows="3" placeholder="What’s in there now, and what would you like to use the space for?" style="resize:vertical"></textarea></div>
<div><span class="flabel">Photos</span><label class="drop" for="v2-files"><span style="display:flex;align-items:center;justify-content:center;width:44px;height:44px;border-radius:12px;background:#D6F25B;color:#19252C;flex-shrink:0"><svg class="i" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M17 8l-5-5-5 5M12 3v12"></path></svg></span><span style="display:flex;flex-direction:column;gap:2px"><strong style="font-size:15px">Choose photos</strong><span style="font-size:12px;color:#4E5750">JPG, PNG or HEIC · up to 5 photos · 8 MB total</span></span></label><input class="sr" id="v2-files" name="photos" type="file" multiple="" accept="image/*"></div>
<label style="display:flex;gap:12px;align-items:flex-start;font-size:13px;line-height:1.5;color:#3F4842;cursor:pointer"><input type="checkbox" name="consent" value="yes" required="" style="width:20px;height:20px;margin:0;accent-color:#566634;flex-shrink:0">I agree that Caveback may use these details to contact me about my quote. See our Privacy Policy.</label>
<div style="display:flex;gap:10px"><button class="fback" type="button" id="q-back"><svg class="i" viewBox="0 0 24 24" aria-hidden="true" style="width:18px;height:18px"><path d="M19 12H5M11 18l-6-6 6-6"></path></svg>Back</button><p id="q-error" role="alert" hidden style="margin:0;font-size:14px;font-weight:600;color:#9B2C1F">Sorry, your request didn’t go through. Please try again, or call us.</p>
<button class="fsend" type="submit">Send request<span class="dot"><svg class="i" viewBox="0 0 24 24" aria-hidden="true" style="width:20px;height:20px"><path d="M7 17L17 7M8 7h9v9"></path></svg></span></button></div>
</form>
</div>
</div>
<div id="q-done" hidden tabindex="-1">
<div role="status" style="display:flex;flex-direction:column;align-items:flex-start;gap:16px;padding:12px 0">
<span style="display:flex;align-items:center;justify-content:center;width:64px;height:64px;border-radius:50%;background:#D6F25B;color:#19252C"><svg class="i" viewBox="0 0 24 24" aria-hidden="true" style="width:30px;height:30px"><path d="M20 6L9 17l-5-5"></path></svg></span>
<h3 style="margin:0;font-size:30px;font-weight:900;letter-spacing:-.02em">Thanks! Your request is <span class="serif" style="font-weight:400">in.</span></h3>
<p style="margin:0;font-size:16px;line-height:1.6;color:#3F4842">We’ll reply within [1 business day] using your preferred contact method.</p>
<button class="fback" type="button" id="q-again">Send another request</button>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- /wp:html -->
