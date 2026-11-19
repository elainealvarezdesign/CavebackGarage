"""Convert the Dark v2 canvas artboard (.dc.html) into a static page for Netlify /v2/."""
import re, sys
src, out = sys.argv[1], sys.argv[2]
s = open(src).read()

blobs = {
    'c501b71aa511c0fc2e556eeeccac33ed': 'img/hero-garage-wall.jpg',
    '088b99d02f44cdb3574f5a2cb2a8fe90': 'img/before-cluttered.jpg',
    'b39d8fd4a1f2c8ff34d4a124f348931f': 'img/after-organized.jpg',
    'd0e75ecc9ddbc29fd506cf8754acc2bc': 'img/project-shelves.jpg',
    '23b7cb3ff2c1bb41cad09b2fa161ac62': 'img/project-tool-wall.jpg',
    '0c9260b136e513a55d11bd2564ba926a': 'img/project-clear-floor.jpg',
    '070ac80a891900a9ee07edd365cde4f4': 'img/caveback-logo-reversed.png',
}
for k, v in blobs.items():
    s = s.replace('/_blob/' + k, v)
assert '/_blob/' not in s, 'unknown blob'

body = s.split('<x-dc>')[1].split('</x-dc>')[0]
helmet = re.search(r'<helmet>(.*?)</helmet>', body, re.S).group(1)
body = re.sub(r'<helmet>.*?</helmet>', '', body, flags=re.S)

def sub(pat, rep, count=1, flags=0):
    global body
    new, n = re.subn(pat, rep, body, count=count, flags=flags)
    assert n == count if count else n > 0, pat
    body = new

# Services: card toggles and form chips share data-svc.
for k in ['reset', 'keep', 'tote', 'wall', 'floor']:
    sub(r' style="background:\{\{svc\.%s\.bg\}\};color:\{\{svc\.%s\.fg\}\}"' % (k, k), '')
    sub(r' style="border:1\.5px solid \{\{svc\.%s\.cbd\}\};background:\{\{svc\.%s\.cbg\}\};color:\{\{svc\.%s\.cfg\}\}"' % (k, k, k), '')
    sub(r'aria-pressed="\{\{svc\.%s\.pressed\}\}"' % k, 'aria-pressed="false"', 2)
    sub(r'onClick="\{\{svc\.%s\.toggle\}\}"' % k, 'data-svc="%s"' % k, 2)
    sub(r'd="\{\{svc\.%s\.path\}\}"' % k, 'd="M12 5v14M5 12h14"')
sub(r' ref="\{\{setSvc\}\}"', ' id="svc-track"')
sub(r'onClick="\{\{svcPrev\}\}"', 'id="svc-prev"')
sub(r'onClick="\{\{svcNext\}\}"', 'id="svc-next"')
sub(r'\{\{quoteSummary\}\}', '<span id="svc-summary">No services selected yet.</span>')

# Menu
sub(r'aria-expanded="\{\{menuExpanded\}\}"', 'aria-expanded="false" id="menu-btn"')
sub(r' onClick="\{\{toggleMenu\}\}"', '')
sub(r' onClick="\{\{closeMenu\}\}"', ' data-close-menu', count=5)
sub(r'<sc-if value="\{\{menuOpen\}\}"[^>]*>(.*?)</sc-if>', r'<div id="mnav-wrap" hidden>\1</div>', flags=re.S)

# Before / after
sub(r'<div class="ba">', '<div class="ba" id="ba">')
sub(r'\{\{splitPct\}\}', 'var(--split,50%)', count=2)
sub(r'value="\{\{split\}\}" onChange="\{\{onSplit\}\}"', 'value="50"')

# Catalog
sub(r'<sc-if value="\{\{catNotSent\}\}"[^>]*>(.*?)</sc-if>', r'<div id="cat-form-wrap">\1</div>', flags=re.S)
sub(r'<sc-if value="\{\{catSent\}\}"[^>]*>(.*?)</sc-if>', r'<div id="cat-done" hidden>\1</div>', flags=re.S)
sub(r'<form onSubmit="\{\{submitCatalog\}\}"', '<form id="cat-form"')

# Quote (inner branches first)
sub(r'<sc-if value="\{\{step1\}\}"[^>]*>(.*?)</sc-if>', r'<div id="q-s1">\1</div>', flags=re.S)
sub(r'<sc-if value="\{\{step2\}\}"[^>]*>(.*?)</sc-if>', r'<div id="q-s2" hidden>\1</div>', flags=re.S)
sub(r'<sc-if value="\{\{notSent\}\}"[^>]*>(.*?)</sc-if>', r'<div id="q-steps">\1</div>', flags=re.S)
sub(r'<sc-if value="\{\{sent\}\}"[^>]*>(.*?)</sc-if>', r'<div id="q-done" hidden tabindex="-1">\1</div>', flags=re.S)
sub(r'\{\{stepNum\}\}', '<span id="q-stepnum">1</span>')
sub(r'aria-current="\{\{cur1\}\}"', 'id="q-p1" aria-current="step"')
sub(r'aria-current="\{\{cur2\}\}"', 'id="q-p2"')
sub(r'color:\{\{lbl2\}\}', 'color:#6B7366')
sub(r'background:\{\{bar2\}\}', 'background:#DCDFD8')
sub(r'<form onSubmit="\{\{nextStep\}\}"', '<form id="q-form1"')
sub(r'<form onSubmit="\{\{submitQuote\}\}"', '<form id="q-form2"')
sub(r'onClick="\{\{prevStep\}\}"', 'id="q-back"')
sub(r'onClick="\{\{resetQuote\}\}"', 'id="q-again"')

# Field names for Netlify Forms
for fid, name in [('v2-name', 'name'), ('v2-email', 'email'), ('v2-phone', 'phone'), ('v2-city', 'city'),
                  ('v2-contact', 'contact_preference'), ('v2-size', 'garage_size'), ('v2-msg', 'message'),
                  ('v2-files', 'photos'), ('v2-cat', 'email')]:
    sub(r'id="%s"' % fid, 'id="%s" name="%s"' % (fid, name))
sub(r'<input type="checkbox" required', '<input type="checkbox" name="consent" value="yes" required')
honeypot = '<p hidden><label>Leave this empty <input name="bot-field" tabindex="-1" autocomplete="off"></label></p>\n'
sub(r'(<form id="q-form1"[^>]*>\n)', r'\1' + honeypot)
sub(r'(<form id="cat-form"[^>]*>\n)', r'\1' + honeypot)
sub(r'(<button class="fsend" type="submit">Send request)', '<p id="q-error" role="alert" hidden style="margin:0;font-size:14px;font-weight:600;color:#9B2C1F">Sorry, your request didn’t go through. Please try again, or call us.</p>\n' + r'\1')
sub(r'(<p style="margin:0;font-size:13px;color:#2B3A23">Free PDF)', '<p id="cat-error" role="alert" hidden style="margin:0;font-size:14px;font-weight:700;color:#7A1F14">Sorry, that didn’t go through. Please try again.</p>\n' + r'\1')

# FAQ: static rows from the component's data.
faq_js = re.search(r'const faqData = \[(.*?)\];', s, re.S).group(1)
faqs = re.findall(r"\{ q: '(.*?)', a: '(.*?)' \}", faq_js)
assert len(faqs) == 6
rows = []
for i, (q, a) in enumerate(faqs):
    open_ = i == 0
    rows.append(
        '<div class="faq-row%s">\n<h3 style="margin:0"><button class="faq-q" type="button" aria-expanded="%s" aria-controls="v2faq-%d">%s'
        '<span class="faq-ico"><svg class="i" viewBox="0 0 24 24" aria-hidden="true" style="width:18px;height:18px"><path d="%s"></path></svg></span></button></h3>\n'
        '<p id="v2faq-%d"%s style="margin:0;padding:0 72px 22px 24px;font-size:15px;line-height:1.65;color:#C3CBBF">%s</p>\n</div>'
        % (' open' if open_ else '', 'true' if open_ else 'false', i, q, 'M5 12h14' if open_ else 'M12 5v14M5 12h14', i, '' if open_ else ' hidden', a))
sub(r'<sc-for list="\{\{faqs\}\}".*?</sc-for>', '\n'.join(rows).replace('\\', '\\\\'), flags=re.S)

assert '{{' not in body and '<sc-' not in body, re.findall(r'\{\{[^}]*\}\}|<sc-[a-z]+', body)[:5]

extra_css = """
[hidden]{display:none !important}
.svc-add{background:#19252C;color:#FFFFFF}
.svc-add[aria-pressed="true"]{background:#D6F25B;color:#19252C}
.chip{border:1.5px solid #C9CEC4;background:#FFFFFF;color:#19252C}
.chip[aria-pressed="true"]{background:#566634;border-color:#566634;color:#FFFFFF}
.faq-ico{background:#22323B;color:#F2F4F0}
.faq-row.open .faq-ico{background:#D6F25B;color:#19252C}
.fsend[aria-busy="true"],.cat-btn[aria-busy="true"]{opacity:.7;cursor:progress}
html{scroll-behavior:smooth;scroll-padding-top:90px}
@media (prefers-reduced-motion:reduce){html,.track{scroll-behavior:auto}}
"""
helmet = helmet.replace('</style>', extra_css + '</style>')

html = ('<!doctype html>\n<html lang="en">\n<head>\n<meta charset="utf-8">\n'
        '<meta name="viewport" content="width=device-width, initial-scale=1">\n'
        '<meta name="robots" content="noindex, nofollow">\n'
        '<title>Caveback Garage Co. – Get your garage back.</title>\n'
        '<meta name="description" content="Garage cleanouts, organization and practical storage in Langley and the Lower Mainland.">\n'
        + helmet.strip() + '\n<script>window.CAVEBACK_FORMS = \'netlify\';</script>\n'
        '<script src="v2.js" defer></script>\n</head>\n<body>\n' + body.strip() + '\n</body>\n</html>\n')
open(out, 'w').write(html)
print('ok', len(html))
