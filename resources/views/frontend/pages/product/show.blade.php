@extends('frontend.layouts.app')
@section('title', 'Products | EBON Premium Aluminum Doors & Windows')
@section('frontend.content')


    <!-- ========================================================================
                                       2. SUBPAGE HERO BANNER
                                       ======================================================================== -->
    <section class="subpage-hero-banner"
        style="background: linear-gradient(135deg, var(--color-navy-dark), var(--color-navy-mid)); border-bottom: 2px solid var(--color-gold); padding: 150px 0 80px; position: relative; overflow: hidden; text-align: center;">
        <div
            style="position: absolute; top:0; left:0; width:100%; height:100%; opacity:0.1; background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;">
        </div>
        <div class="container" style="position: relative; z-index: 2;">
            <span class="section-subtitle" style="margin-bottom: 8px;">Specifications</span>
            <h1 style="color: #ffffff; font-size: 42px; text-transform: uppercase; font-family: var(--font-headers);">Product
                System Catalog</h1>
            <p style="color: var(--color-text-muted-light); max-width: 600px; margin: 15px auto 0; font-size: 15px;">Advanced
                thermal break structures and architectural profiles customized for extreme weather conditions.</p>
        </div>
    </section>

    <!-- ========================================================================
                               2. BREADCRUMBS BAR
                               ======================================================================== -->
    <section class="breadcrumbs-section"
        style="padding: 120px 0 20px; background-color: var(--color-bg-light); border-bottom: 1px solid rgba(7,22,44,0.05);">
        <div class="container">
            <div
                style="font-size: 13px; color: var(--color-text-muted-dark); display: flex; gap: 8px; align-items: center;">
                <a href="index.html" style="color: var(--color-navy-dark); font-weight: 500;">Home</a>
                <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                <a href="products.html" style="color: var(--color-navy-dark); font-weight: 500;">Products</a>
                <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                <span id="detailBreadcrumb" style="color: var(--color-gold); font-weight: 600;">Product Detail</span>
            </div>
        </div>
    </section>

    <!-- ========================================================================
                               3. PRODUCT SYSTEM DETAILS (2-COLUMN SUMMARY)
                               ======================================================================== -->
    <section class="product-summary-section" style="padding: 60px 0; background-color: #ffffff;">
        <div class="container" style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: flex-start;">

            <!-- Left Column: Media Showcase & CAD Drawing -->
            <div class="reveal-el">
                <!-- Large Image Display & Video Container -->
                <div
                    style="border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--box-shadow-premium); border: 1px solid rgba(7,22,44,0.05); margin-bottom: 30px; position: relative;">
                    <img id="detailMainImg"
                        src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=800&q=80"
                        alt="Product Display" style="width: 100%; height: 450px; object-fit: cover;">
                    <div id="videoPlayerContainer" style="display: none; width: 100%; height: 450px; background: #000;">
                        <video id="detailVideo" controls style="width: 100%; height: 100%; object-fit: cover;"></video>
                    </div>
                </div>

                <!-- Assembly Thumbnails -->
                <div style="display: flex; gap: 15px; margin-bottom: 40px;">
                    <div
                        style="flex: 1; height: 100px; border-radius: 6px; overflow: hidden; border: 2px solid var(--color-gold); cursor: pointer;">
                        <img id="detailThumb1"
                            src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=200&q=80"
                            alt="Completed view" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="flex: 1; height: 100px; border-radius: 6px; overflow: hidden; border: 1px solid rgba(7,22,44,0.1); cursor: pointer; opacity: 0.7;"
                        onclick="alert('Drawing sheet previewing! DWG file index loaded.');">
                        <div
                            style="background-color: var(--color-navy-dark); color: var(--color-gold); width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 10px;">
                            <i class="fas fa-drafting-compass" style="font-size: 20px; margin-bottom: 6px;"></i>
                            <span style="font-size: 10px; font-weight: 700; text-transform: uppercase;">CAD Cross
                                Section</span>
                        </div>
                    </div>
                    <div id="videoThumbBtn"
                        style="flex: 1; height: 100px; border-radius: 6px; overflow: hidden; border: 1px solid rgba(7,22,44,0.1); cursor: pointer; opacity: 0.7;">
                        <div
                            style="background-color: var(--color-navy-dark); color: var(--color-gold); width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 10px;">
                            <i class="fas fa-play-circle" style="font-size: 22px; margin-bottom: 6px;"></i>
                            <span style="font-size: 10px; font-weight: 700; text-transform: uppercase;">Product Video</span>
                        </div>
                    </div>
                </div>

                <!-- CAD Blueprint Technical Spec Panel -->
                <div
                    style="background-color: var(--color-navy-dark); border: 1px solid var(--glass-border); border-radius: var(--border-radius); padding: 40px; color: #ffffff;">
                    <h4
                        style="color: var(--color-gold); font-family: var(--font-headers); font-size: 16px; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1.5px; border-bottom: 1px solid var(--glass-border); padding-bottom: 12px;">
                        <i class="fas fa-microchip" style="margin-right: 8px;"></i> Integrated Structural Core
                    </h4>
                    <p
                        style="font-size: 13px; color: var(--color-text-muted-light); line-height: 1.6; margin-bottom: 20px;">
                        EBON's proprietary insulation extrusion is co-molded using EPDM foaming strips and high-purity glass
                        fiber reinforced polyamide strip locks, creating structural isolation chambers that cut sound and
                        energy bleed drastically.</p>
                    <div
                        style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; font-size: 12px; color: var(--color-text-muted-light);">
                        <div><strong style="color: #ffffff;">Seal System:</strong> 3-Channel Co-extruded EPDM</div>
                        <div><strong style="color: #ffffff;">Hardware Fit:</strong> German Standard C-Groove</div>
                        <div><strong style="color: #ffffff;">Acoustic Cut:</strong> Sound Reduction ≥ 40 dB</div>
                        <div><strong style="color: #ffffff;">Glazing Depth:</strong> Up to 48mm Structural Glass</div>
                    </div>
                </div>
            </div>

            <!-- Right Column: System Spec Description & Quotation Trigger -->
            <div class="reveal-el">
                <span id="detailBadge"
                    style="background: rgba(197, 168, 109, 0.1); color: var(--color-gold); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 6px 14px; border-radius: 20px; border: 1px solid var(--color-gold); display: inline-block; margin-bottom: 20px;">Thermal
                    break</span>

                <h1 id="detailTitle"
                    style="font-size: 32px; color: var(--color-navy-dark); font-family: var(--font-headers); line-height: 1.2; margin-bottom: 15px;">
                    EBON Series-80 Casement System</h1>

                <p id="detailDesc"
                    style="color: var(--color-text-muted-dark); font-size: 15px; line-height: 1.7; margin-bottom: 35px;">
                    Advanced thermal break structures incorporating nylon heat barriers and triplepane structural glazing,
                    designed to achieve maximum insulation performance across low temperature environments.</p>

                <!-- Quick Param Data Grid -->
                <div
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); border-radius: var(--border-radius); padding: 30px; margin-bottom: 40px;">
                    <h4
                        style="font-size: 14px; text-transform: uppercase; color: var(--color-navy-dark); letter-spacing: 1px; margin-bottom: 20px; font-family: var(--font-headers);">
                        Specification Matrix</h4>

                    <div style="display: flex; flex-direction: column; gap: 15px;">

                        <div
                            style="display: flex; justify-content: space-between; font-size: 13px; border-bottom: 1px solid rgba(7,22,44,0.05); padding-bottom: 10px;">
                            <span style="color: var(--color-text-muted-dark);">Profile Aluminum Material</span>
                            <strong id="specProfile" style="color: var(--color-navy-dark);">6063-T5 Alloy (1.8mm
                                sash)</strong>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; font-size: 13px; border-bottom: 1px solid rgba(7,22,44,0.05); padding-bottom: 10px;">
                            <span style="color: var(--color-text-muted-dark);">Double/Triple Glazing Assembly</span>
                            <strong id="specGlazing" style="color: var(--color-navy-dark);">5mm + 9Ar + 5mm + 9Ar + 5mm
                                Triple</strong>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; font-size: 13px; border-bottom: 1px solid rgba(7,22,44,0.05); padding-bottom: 10px;">
                            <span style="color: var(--color-text-muted-dark);">Thermal Conductivity (U-Value)</span>
                            <strong id="specUvalue" style="color: var(--color-gold); font-weight: 700;">≤ 1.2 W/m²K</strong>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; font-size: 13px; border-bottom: 1px solid rgba(7,22,44,0.05); padding-bottom: 10px;">
                            <span style="color: var(--color-text-muted-dark);">Wind Load Resistance Grade</span>
                            <strong id="specWind" style="color: var(--color-navy-dark);">Class 8 (Typhoon
                                Strength)</strong>
                        </div>

                        <div style="display: flex; justify-content: space-between; font-size: 13px; padding-bottom: 5px;">
                            <span style="color: var(--color-text-muted-dark);">Accredited Certification</span>
                            <strong id="specCert" style="color: var(--color-navy-dark);">CE / SGS / ISO 9001</strong>
                        </div>

                    </div>
                </div>

                <!-- B2B Actions Panel -->
                <div style="display: flex; gap: 20px;">
                    <button class="btn-primary open-quote-modal" style="flex: 3; justify-content: center; padding: 16px;">
                        Request CAD Quote <i class="fas fa-file-invoice" style="margin-left: 8px;"></i>
                    </button>
                    <a href="contact.html" class="btn-outline" style="flex: 2; justify-content: center; padding: 15px;">
                        Direct Consultation
                    </a>
                </div>
            </div>

        </div>
    </section>


@endsection
