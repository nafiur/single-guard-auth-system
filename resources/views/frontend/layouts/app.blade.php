<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>EBON | High-Performance Insulating Doors & Windows | Aluminum Systems</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="EBON Doors & Windows Industrial Co. provides premium, high-performance insulating aluminum alloy doors and windows. CE-certified triple pane 3i-LOW-E thermal systems for global architectural projects.">
    <meta name="keywords"
        content="insulating doors and windows, aluminum alloy systems, 3i-LOW-E glass, CE certified windows, thermal break doors">

    <!-- Open Graph B2B Tags -->
    <meta property="og:title" content="EBON | Premium High-Performance Aluminum Doors & Windows">
    <meta property="og:description"
        content="Discover CE-certified, ultra-insulated glass systems delivering supreme thermal efficiency and aesthetic elegance. Architect catalog inside.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ebonwindow.com/">

    <!-- Premium Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style.css') }}">
</head>

<body>

    <!-- ========================================================================
       1. STICKY HEADER
       ======================================================================== -->

    @include('frontend.layouts.header')

    @yield('frontend.content')

    <!-- ========================================================================
       8. LEAD CAPTURE & FOOTER WRAPPER
       ======================================================================== -->
    <div class="inquiry-footer-wrapper">

        <!-- CTA inquiry section -->
        <section class="inquiry-cta-block reveal-el">
            <div class="container">
                <div class="cta-text">
                    <h3>Ready to Begin Your Project?</h3>
                    <p>Contact our structural glass engineers for customized B2B specifications and dynamic CAD designs.
                    </p>
                </div>
                <button class="btn-primary open-quote-modal" style="padding: 16px 36px; font-size: 15px;">
                    Get A Free Quote <i class="fas fa-paper-plane" style="margin-left: 8px;"></i>
                </button>
            </div>
        </section>

        <!-- Main Footer links -->
        @include('frontend.layouts.footer')

        <!-- Bottom bar -->
        <div class="footer-bottom">
            <div class="container">
                <p>Copyright © 2026 Guangdong EBON Doors and Windows Industrial Co., Ltd. - All Rights Reserved. | <a
                        href="#">Privacy Policy</a></p>
            </div>
        </div>
    </div>

    <!-- ========================================================================
       9. INTERACTIVE FLOATING SIDEBAR WIDGETS
       ======================================================================== -->
    <div class="floating-widgets">
        <!-- Tel Widget -->
        <a href="tel:+86-13392787196" class="floating-btn" aria-label="Call Ebon Support">
            <i class="fas fa-phone"></i>
            <span class="floating-tooltip">Call: +86-13392787196</span>
        </a>
        <!-- Whatsapp Widget -->
        <a href="https://wa.me/8613392787196" target="_blank" class="floating-btn" aria-label="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
            <span class="floating-tooltip">WhatsApp Live</span>
        </a>
        <!-- Dynamic Quote trigger -->
        <button class="floating-btn open-quote-modal" aria-label="Open Quote Form">
            <i class="fas fa-file-invoice"></i>
            <span class="floating-tooltip">Get Free Quote</span>
        </button>
        <!-- Search Trigger placeholder -->
        <button class="floating-btn" aria-label="Search Catalog">
            <i class="fas fa-search"></i>
            <span class="floating-tooltip">Search Catalog</span>
        </button>
    </div>

    <!-- ========================================================================
       10. QUOTE MODAL POPUP DIALOG
       ======================================================================== -->
    <div id="quoteModal" class="popup-modal-overlay">
        <div class="quote-modal-box">
            <button class="close-modal-btn" aria-label="Close Inquiry Dialog"><i class="fas fa-times"></i></button>
            <div class="modal-header">
                <h3>Get a Free Quote</h3>
                <p>Submit your project specification and we will reply within 1 business day.</p>
            </div>

            <form id="inquiryForm" class="inquiry-form-body" style="display: flex; flex-direction: column; gap: 20px;">

                <!-- Row 1: Name & Company -->
                <div class="form-group-row" style="margin-bottom:0;">
                    <div class="form-group" style="margin-bottom:0;">
                        <label for="contactName" class="form-label" style="color: var(--color-navy-dark);">Contact
                            Name
                            *</label>
                        <input type="text" id="contactName" class="form-input"
                            style="background-color: #ffffff; border-color: rgba(7,22,44,0.1); color: var(--color-text-dark);"
                            placeholder="e.g. John Smith" required>
                    </div>
                    <div class="form-group" style="margin-bottom:0;">
                        <label for="contactCompany" class="form-label" style="color: var(--color-navy-dark);">Company
                            /
                            Contractor</label>
                        <input type="text" id="contactCompany" class="form-input"
                            style="background-color: #ffffff; border-color: rgba(7,22,44,0.1); color: var(--color-text-dark);"
                            placeholder="e.g. Apex Developments">
                    </div>
                </div>

                <!-- Row 2: Email & Phone -->
                <div class="form-group-row" style="margin-bottom:0;">
                    <div class="form-group" style="margin-bottom:0;">
                        <label for="contactEmail" class="form-label" style="color: var(--color-navy-dark);">Email
                            Address *</label>
                        <input type="email" id="contactEmail" class="form-input"
                            style="background-color: #ffffff; border-color: rgba(7,22,44,0.1); color: var(--color-text-dark);"
                            placeholder="john@apex.com" required>
                    </div>
                    <div class="form-group" style="margin-bottom:0;">
                        <label for="contactPhone" class="form-label" style="color: var(--color-navy-dark);">WhatsApp
                            Number *</label>
                        <input type="tel" id="contactPhone" class="form-input"
                            style="background-color: #ffffff; border-color: rgba(7,22,44,0.1); color: var(--color-text-dark);"
                            placeholder="e.g. +1 555-0199" required>
                    </div>
                </div>

                <!-- Row 3: Building Type & Finish Required -->
                <div class="form-group-row" style="margin-bottom:0;">
                    <div class="form-group" style="margin-bottom:0;">
                        <label for="buildingType" class="form-label" style="color: var(--color-navy-dark);">Building
                            Architecture *</label>
                        <select id="buildingType" class="form-input"
                            style="background-color: #ffffff; border-color: rgba(7,22,44,0.1); color: var(--color-text-dark); height: 48px;"
                            required>
                            <option value="" disabled selected>Select Building Type</option>
                            <option value="Villa">Luxury Private Villa</option>
                            <option value="Hotel">Hotel / Resort Pavilion</option>
                            <option value="Commercial">Commercial Office Complex</option>
                            <option value="Apartment">Residential Estate / Apartment</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom:0;">
                        <label for="profileFinish" class="form-label" style="color: var(--color-navy-dark);">Aluminum
                            Profile Finish</label>
                        <select id="profileFinish" class="form-input"
                            style="background-color: #ffffff; border-color: rgba(7,22,44,0.1); color: var(--color-text-dark); height: 48px;">
                            <option value="" disabled selected>Select Finish Type</option>
                            <option value="Powder">Powder Coating (Standard)</option>
                            <option value="PVDF">Fluorocarbon PVDF Paint</option>
                            <option value="Anodized">Anodized Oxidized Surface</option>
                            <option value="Wood">Wood-Grain Heat Transfer</option>
                        </select>
                    </div>
                </div>

                <!-- Row 4: Project Volume -->
                <div class="form-group">
                    <label for="projectVolume" class="form-label" style="color: var(--color-navy-dark);">Estimated
                        Window/Glazing Sizing *</label>
                    <select id="projectVolume" class="form-input"
                        style="background-color: #ffffff; border-color: rgba(7,22,44,0.1); color: var(--color-text-dark); height: 48px;"
                        required>
                        <option value="" disabled selected>Select Sizing Category</option>
                        <option value="Small">Under 50 Square Meters</option>
                        <option value="Medium">50 - 200 Square Meters</option>
                        <option value="Large">200 - 500 Square Meters</option>
                        <option value="Enterprise">Over 500 Square Meters</option>
                    </select>
                </div>

                <!-- Row 5: Detailed Specifications -->
                <div class="form-group">
                    <label for="contactMessage" class="form-label" style="color: var(--color-navy-dark);">Detailed
                        Project Specifications & Requirements *</label>
                    <textarea id="contactMessage" class="form-textarea"
                        style="background-color: #ffffff; border-color: rgba(7,22,44,0.1); color: var(--color-text-dark);"
                        placeholder="Please describe the window quantities, double/triple glazing low-e targets, safety lock system requirements, and target shipping schedule..."
                        required></textarea>
                </div>

                <!-- CAD Blueprint Upload Hint -->
                <div
                    style="display: flex; gap: 12px; align-items: center; background-color: rgba(197, 168, 109, 0.1); border: 1px solid var(--color-gold); padding: 15px; border-radius: 6px;">
                    <i class="fas fa-file-pdf" style="font-size: 24px; color: var(--color-gold);"></i>
                    <p style="font-size: 11px; line-height: 1.4; color: var(--color-text-dark);"><strong>CAD Drawing
                            Support:</strong> Please submit this form. Our engineers will reply via email requesting
                        structural blueprints (PDF/DWG formats) to generate the free architectural design.</p>
                </div>

                <!-- Submit Inquiry button -->
                <button type="submit" class="btn-primary"
                    style="width: 100%; justify-content: center; padding: 15px; border-radius: 30px; margin-top: 10px;">
                    Submit Project Blueprint Request <i class="fas fa-paper-plane" style="margin-left: 8px;"></i>
                </button>

            </form>
        </div>
    </div>



    <!-- Client Script -->
    <script src="{{ asset('frontend/assets/app.js') }}"></script>
</body>

</html>
