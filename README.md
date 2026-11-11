# Caveback Garage Co. — WordPress one-page prototype

Live prototype of the Caveback Garage Co. one-page website (dark theme), built as a
child theme of [Home Services Blocks](https://wordpress.org/themes/home-services-blocks/).

## Open the live prototype

**[▶ Open in WordPress Playground](https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/elainealvarezdesign/CavebackGarage/main/blueprint.json)**

Playground runs a full WordPress site in the browser: no hosting, no login needed.
It installs Home Services Blocks from WordPress.org, installs the `caveback` theme from
this repo and opens the home page. Nothing is saved between visits.

## What's in the repo

| Path | Contains |
|---|---|
| `blueprint.json` | WordPress Playground recipe that builds the prototype |
| `caveback/` | The child theme (copy this folder to `wp-content/themes/` on any WordPress site) |
| `caveback/theme.json` | Brand colours (Cave Charcoal, Utility Olive, Concrete Grey, Light Concrete) and Inter |
| `caveback/style.css` | All one-page styles, as `--cb-*` tokens at the top |
| `caveback/patterns/` | One block pattern per section: header, hero, why-caveback, services, how-it-works, our-work, catalog, who-we-help, quote, faq, footer |
| `caveback/templates/front-page.html` | The one-page layout (stacks the patterns) |
| `caveback/assets/js/caveback.js` | Sliders, before/after, "Add to quote" selection, 2-step quote form |

## Install on a real WordPress site

1. Install and keep **Home Services Blocks** (Appearance → Themes → Add New).
2. Upload the `caveback` folder (zip it first) under Appearance → Themes → Add New → Upload.
3. Activate **Caveback**. The front page uses the one-page layout.

## Prototype limits (before launch)

- **Forms are simulated.** The quote and catalog forms validate and show their success
  states, but send nothing. On the live site use Elementor Pro Form or WPForms (multi-step,
  file upload, reCAPTCHA, email notification, catalog PDF delivery).
- **Photos are placeholders from [Pexels](https://www.pexels.com/)** (free licence). Replace
  them with real Caveback before/after projects.
- **Placeholders to fill:** phone `(604) XXX-XXXX`, email `hello@[yourdomain].com`, reply
  time `[1 business day]`, upload size `[max size]`, donation partners, project names,
  social links, catalog PDF.
- **Elementor:** the final site is planned in Elementor. Rebuild each section from the
  patterns here, with the same Global Colors and fonts from `theme.json`.

### Photo credits (Pexels)

- Hero: [Well-Organized Garage Workshop with Tools](https://www.pexels.com/photo/well-organized-garage-workshop-with-tools-29286299/)
- Before: [Tools and Accessories on Wall in Workshop](https://www.pexels.com/photo/tools-and-accessories-on-wall-in-workshop-16243257/)
- After / gallery: [Garage Hall in House](https://www.pexels.com/photo/garage-hall-in-house-17181949/)
- Gallery: [Various instruments hanging on wooden board in garage](https://www.pexels.com/photo/various-instruments-hanging-on-wooden-board-in-garage-3822859/)
- Gallery: [Full Shelves in Garage Workshop](https://www.pexels.com/photo/full-shelves-in-garage-workshop-9395008/)
