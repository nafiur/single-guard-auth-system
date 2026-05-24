# Multi-Device Responsive Optimization Plan

The goal of this plan is to ensure that the entire 10-page Ebon Window B2B portal is fully responsive, looking premium and flawless across all screen sizes (Large Desktop, Laptop, Tablet, Mobile), with zero horizontal scrolling and pixel-perfect layouts.

## User Review Required

> [!IMPORTANT]
> **CSS Grid Overrides with Specificity Controls**:
> Because several grid containers and split columns across the 10 HTML pages use rigid inline styles (e.g., `display: grid; grid-template-columns: repeat(3, 1fr)`), they override standard stylesheet rules. We will declare high-specificity stylesheet rules using `!important` inside media queries in `style.css`. This is highly elegant and maintains the integrity of the original markup without requiring complex, invasive changes to every single HTML file.
>
> **Interactive Mobile Navigation Drawer**:
> The navbar drawer is set to collapse at **1024px** (to support landscape and portrait tablet views perfectly). We will verify that mobile dropdown behaviors and touch triggers operate smoothly and overlap correctly without clipping.

---

## Proposed Changes

We will modify and optimize the central styling sheets in the workspace `C:\Users\Nafiur\Desktop\ebonwindow`:

### 1. Style Overrides & Enhancements
#### [MODIFY] [style.css](file:///C:/Users/Nafiur/Desktop/ebonwindow/style.css)
*   **Neutralize Inline Grids dynamically**:
    Add media queries for `max-width: 1024px` and `max-width: 768px` to force multi-column inline grids to stack cleanly into 1 or 2 columns using `!important`.
*   **Scale Typographies and Spacings**:
    Verify and downscale hero titles, section titles, and container paddings on tablets and mobile screens so text fits cleanly on small screens.
*   **Optimize Form Rows and Spec Checklists**:
    Ensure the quote modals, inquiry form grids, and checklists stack vertically on mobile.
*   **Ensure Table Responsiveness**:
    Add custom CSS wrappers (`.table-responsive`) and style them with `overflow-x: auto` so that extensive spec sheets (like low-E thermal insulation charts) can be swiped horizontally on small screens without breaking the outer container.

### 2. HTML Structure Verifications (For Table Wrapping)
We will audit the HTML files (especially `product-detail.html`, `case-detail.html`, `news-detail.html`) to ensure tables are wrapped in a responsive container or are styled to prevent overflow.

---

## Verification Plan

### Automated & Visual Testing
*   **Viewport Verification**: Verify layouts at standard device viewports:
    *   **Desktop / Large Laptop**: 1440px+
    *   **Small Laptop / Large Tablet**: 1024px
    *   **Portrait Tablet (iPad)**: 768px
    *   **Standard Mobile (iPhone/Android)**: 375px - 480px
*   **Menu Interaction Test**: Open and close the mobile menu at 1024px and below. Confirm dropdown sub-menus slide out and close correctly.
*   **Horizontal Scroll Inspection**: Ensure `document.documentElement.clientWidth` matches `window.innerWidth` exactly with zero horizontal overflow on all 10 pages.

### Manual Verification
*   Verify that all B2B catalogs in `catalogue.html` wrap into 2 columns on iPad and 1 column on mobile.
*   Ensure that case study details spec tables wrap and scrolling triggers cleanly on small screens.
