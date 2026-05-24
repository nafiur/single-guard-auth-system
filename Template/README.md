# Ebon Window B2B Multi-Page Web Showcase - Premium Clone

A state-of-the-art, high-end HTML5, CSS3, and Vanilla JS B2B corporate web portal designed to showcase premium architectural aluminum windows, doors, and structural glazing systems. 

This project clones the content systems of `ebonwindow.com` but completely elevates the presentation using **modern premium design principles**: curated luxury HSL Navy Blue and Antique Gold color accents, custom micro-animations, glassmorphic navigations, responsive specifications comparison tables, and dynamic routing logic.

---

## 1. Project Structure & Subpages

The codebase is built entirely on native web standards (no frameworks required) and features a fully linked multi-page architecture:

*   **[index.html](file:///c:/Users/Nafiur/Desktop/ebonwindow/index.html)**: The primary B2B portal. Contains the custom interactive slider (loaded with our AI-generated architectural glazing visual), metrics count, corporate introduction video banner, catalog preview deck, and latest news items.
*   **[about.html](file:///c:/Users/Nafiur/Desktop/ebonwindow/about.html)**: Corporate authority page documenting Ebon's 100,000㎡ intelligent manufacturing bases, product development history since 2004, and international B2B certifications (CE, SGS, ISO 9001).
*   **[products.html](file:///c:/Users/Nafiur/Desktop/ebonwindow/products.html)**: Detailed B2B catalog featuring tab-based catalog filtering and a tabular comparative technical specification matrix of U-values, profile thickness, and weatherproofing.
*   **[cases.html](file:///c:/Users/Nafiur/Desktop/ebonwindow/cases.html)**: Global project masonry gallery illustrating customized finishes in the Philippines, Thailand, West Africa, Romania, China, and Australia.
*   **[news.html](file:///c:/Users/Nafiur/Desktop/ebonwindow/news.html)**: Ebon B2B newsroom and technical whitepapers feed outlining triple-pane Low-E metrics and polyamide thermal strip thermal barrier dynamics.
*   **[contact.html](file:///c:/Users/Nafiur/Desktop/ebonwindow/contact.html)**: Complete B2B direct telephone/email directory to Foshan, Hong Kong, and Southeast Asia support decks, accompanied by an intake form collecting target profile finishes and glazing volume sizing.
*   **[style.css](file:///c:/Users/Nafiur/Desktop/ebonwindow/style.css)**: Curated stylesheet housing responsive typography, HSL color tokens, custom hover animations, glassmorphic headers (`backdrop-filter`), and mobile drawers.
*   **[app.js](file:///c:/Users/Nafiur/Desktop/ebonwindow/app.js)**: Central vanilla JS script managing sticky scrolls, mobile menus, auto-rotating hero carousels, scroll reveals, dynamic tab filters, URL query mapping, and contact submit loaders.
*   **[assets/hero_villa.png](file:///c:/Users/Nafiur/Desktop/ebonwindow/assets/hero_villa.png)**: A high-resolution AI-generated hero image demonstrating high-end architectural villa glazing with slim aluminum frames.

---

## 2. Integrated B2B Features

1.  **Glassmorphism Sticky Nav**: Main header navigation features smooth scroll transitions, adding background blurs and border drop shadows as you scroll.
2.  **Custom B2B Carousel Slider**: Auto-rotating hero banner with responsive timing, control arrows, and navigation dots.
3.  **Active Product Filters**: Responsive catalog tabs that immediately toggle cards without reloading, utilizing standard CSS animation entries.
4.  **URL Parameter Routing**: Seamlessly processes URL parameters (e.g. `products.html?cat=doors`). Clicking links inside navbar dropdown menus automatically highlights the corresponding catalog tab on page load.
5.  **Multi-Channel Lead Capture**: Implements popup dialog models, inline quote blocks, floating WhatsApp widgets, and detailed questionnaires with dynamic submit feedback loops.

---

## 3. How to Preview Locally

Because this system is built using native web standards with zero package compilers (no NPM or Tailwind installations required), it is 100% offline-capable:

1.  Clone this repository locally.
2.  Directly double-click **`index.html`** to load the site inside any standard browser (Chrome, Edge, Safari, Firefox).
3.  Navigate through the header or footer menu links to interact with all pages.
