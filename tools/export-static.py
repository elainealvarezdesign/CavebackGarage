"""Export the rendered WordPress front page to a static folder for Netlify.

Usage: run WordPress with the caveback theme active on http://localhost:8899, then
    python3 tools/export-static.py site
"""
import os, re, sys, urllib.request, urllib.parse

BASE = 'http://localhost:8899'
OUT = sys.argv[1]
URL_RE = re.compile(r'http://localhost:8899(/[^"\'\s)<>]*)')

def fetch(path):
    with urllib.request.urlopen(BASE + path) as r:
        return r.read()

html = fetch('/').decode('utf-8')

# Drop WordPress plumbing that makes no sense on a static host.
html = re.sub(r'<link rel="(?:alternate|EditURI|https://api\.w\.org/|wlwmanifest|shortlink|pingback)"[^>]*>\n?', '', html)
html = re.sub(r'<script type="speculationrules">.*?</script>\n?', '', html, flags=re.S)
html = re.sub(r'<meta name=\'robots\'[^>]*>\n?', '', html)
html = re.sub(r'<meta name="generator"[^>]*>\n?', '', html)

seen, queue = set(), []
def collect(text):
    for m in URL_RE.finditer(text):
        p = urllib.parse.urlsplit(m.group(1)).path
        if p not in seen and p not in ('/', '/index.php') and '.' in os.path.basename(p):
            seen.add(p); queue.append(p)
collect(html)

while queue:
    p = queue.pop()
    data = fetch(p)
    dest = os.path.join(OUT, p.lstrip('/'))
    os.makedirs(os.path.dirname(dest), exist_ok=True)
    if p.endswith(('.css', '.js')):
        text = data.decode('utf-8')
        collect(text)
        if p.endswith('.css'):  # relative url() inside stylesheets
            for u in re.findall(r'url\(\s*["\']?([^"\')]+)', text):
                if u.startswith(('data:', 'http', '#', '/')):
                    continue
                rp = urllib.parse.urlsplit(urllib.parse.urljoin(p, u)).path
                if rp not in seen:
                    seen.add(rp); queue.append(rp)
        data = URL_RE.sub(r'\1', text).encode('utf-8')
    with open(dest, 'wb') as f:
        f.write(data)

html = URL_RE.sub(r'\1', html)
with open(os.path.join(OUT, 'index.html'), 'w') as f:
    f.write(html)
print('files', len(seen))
print('\n'.join(sorted(seen)))
