@extends('frontend.layouts.app')
@section('title', 'Contact | EBON Premium Aluminum Doors & Windows')
@section('frontend.content')

    <!-- ========================================================================
               2. SUBPAGE HERO BANNER
               ======================================================================== -->
    <section class="subpage-hero-banner"
        style="background: linear-gradient(135deg, var(--color-navy-dark), var(--color-navy-mid)); border-bottom: 2px solid var(--color-gold); padding: 150px 0 80px; position: relative; overflow: hidden; text-align: center;">
        <div
            style="position: absolute; top:0; left:0; width:100%; height:100%; opacity:0.1; background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;">
        </div>
        <div class="container" style="position: relative; z-index: 2;">
            <span class="section-subtitle" style="margin-bottom: 8px;">Partnership</span>
            <h1 style="color: #ffffff; font-size: 42px; text-transform: uppercase; font-family: var(--font-headers);">Connect
                With Ebon</h1>
            <p style="color: var(--color-text-muted-light); max-width: 600px; margin: 15px auto 0; font-size: 15px;">Send
                your blueprint dimensions or schedule a direct inspection at our Foshan manufacturing plants.</p>
        </div>
    </section>

    <!-- ========================================================================
               3. CONTACT LAYOUT: INFO DECK & DETAILED INTAKE FORM
               ======================================================================== -->
    <section class="contact-details-section" style="padding: 100px 0; background-color: #ffffff;">
        <div class="container" style="display: grid; grid-template-columns: 2fr 3fr; gap: 60px;">

            <!-- Left Column: Directory Details -->
            <div class="reveal-el">
                <span class="section-subtitle">Global Offices</span>
                <h2 class="section-title" style="text-align: left; margin-bottom: 40px;">B2B Directory</h2>

                <div style="display: flex; flex-direction: column; gap: 30px; margin-bottom: 50px;">

                    <!-- Direct Line 1: Foshan Factory -->
                    <div style="display: flex; gap: 20px; align-items: flex-start;">
                        <div
                            style="width: 50px; height: 50px; border-radius: 50%; background-color: rgba(197, 168, 109, 0.1); color: var(--color-gold); display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0;">
                            <i class="fas fa-industry"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 16px; margin-bottom: 6px; color: var(--color-navy-dark);">Foshan
                                Headquarters & Factory</h4>
                            <p
                                style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 8px;">
                                Guangdong Ebon Doors and Windows Co., Ltd. Songxia Industrial Park, Shishan Town, Nanhai
                                District, Foshan, Guangdong, China.</p>
                            <a href="tel:+86-13392787196"
                                style="font-size: 13px; color: var(--color-gold); font-weight: 600;"><i
                                    class="fas fa-phone-alt" style="margin-right: 6px;"></i> +86-13392787196</a>
                        </div>
                    </div>

                    <!-- Direct Line 2: Hong Kong Office -->
                    <div style="display: flex; gap: 20px; align-items: flex-start;">
                        <div
                            style="width: 50px; height: 50px; border-radius: 50%; background-color: rgba(197, 168, 109, 0.1); color: var(--color-gold); display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0;">
                            <i class="fas fa-ship"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 16px; margin-bottom: 6px; color: var(--color-navy-dark);">Hong Kong
                                Logistics Bureau</h4>
                            <p
                                style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 8px;">
                                Unit 12A, International Trade Tower, 348 Kwun Tong Road, Kowloon, Hong Kong.</p>
                            <a href="mailto:logistics@ebonwindow.com"
                                style="font-size: 13px; color: var(--color-gold); font-weight: 600;"><i
                                    class="fas fa-envelope" style="margin-right: 6px;"></i> logistics@ebonwindow.com</a>
                        </div>
                    </div>

                    <!-- Direct Line 3: Thailand Service Center -->
                    <div style="display: flex; gap: 20px; align-items: flex-start;">
                        <div
                            style="width: 50px; height: 50px; border-radius: 50%; background-color: rgba(197, 168, 109, 0.1); color: var(--color-gold); display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0;">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 16px; margin-bottom: 6px; color: var(--color-navy-dark);">Southeast Asia
                                Support Deck</h4>
                            <p
                                style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 8px;">
                                68/10 Sukhumvit Rd, Khlong Toei, Bangkok 10110, Thailand.</p>
                            <a href="https://wa.me/8613392787196" target="_blank"
                                style="font-size: 13px; color: var(--color-gold); font-weight: 600;"><i
                                    class="fab fa-whatsapp" style="margin-right: 6px;"></i> Whatsapp Live Support</a>
                        </div>
                    </div>

                </div>

                <!-- B2B Quick Email Links -->
                <div
                    style="background-color: var(--color-bg-light); border: 1px dashed rgba(197,168,109,0.3); padding: 30px; border-radius: var(--border-radius);">
                    <h4
                        style="font-size: 15px; margin-bottom: 12px; color: var(--color-navy-dark); text-transform: uppercase; font-family: var(--font-headers);">
                        Direct Sales Lines</h4>
                    <ul
                        style="font-size: 13px; color: var(--color-text-muted-dark); display: flex; flex-direction: column; gap: 10px;">
                        <li><strong>B2B Exports:</strong> <a href="mailto:sales@ebonwindow.com"
                                style="color: var(--color-navy-dark); font-weight: 500;">sales@ebonwindow.com</a></li>
                        <li><strong>Technical Consultation:</strong> <a href="mailto:engineer@ebonwindow.com"
                                style="color: var(--color-navy-dark); font-weight: 500;">engineer@ebonwindow.com</a></li>
                        <li><strong>WhatsApp Business:</strong> <span
                                style="color: var(--color-gold); font-weight: 600;">+86-13392787196</span></li>
                    </ul>
                </div>
            </div>

            <!-- Right Column: Advanced Project Intake Form -->
            <div class="reveal-el"
                style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); padding: 50px; border-radius: var(--border-radius); box-shadow: var(--box-shadow-premium);">
                <span class="section-subtitle">Project Questionnaire</span>
                <h3
                    style="font-size: 24px; margin-bottom: 30px; color: var(--color-navy-dark); font-family: var(--font-headers);">
                    Inquiry Specification Intake</h3>

                <form id="contactInquiryForm" class="inquiry-form-body"
                    style="display: flex; flex-direction: column; gap: 20px;">

                    <!-- Row 1: Name & Company -->
                    <div class="form-group-row" style="margin-bottom:0;">
                        <div class="form-group" style="margin-bottom:0;">
                            <label for="contactName" class="form-label" style="color: var(--color-navy-dark);">Contact Name
                                *</label>
                            <input type="text" id="contactName" class="form-input"
                                style="background-color: #ffffff; border-color: rgba(7,22,44,0.1); color: var(--color-text-dark);"
                                placeholder="e.g. John Smith" required>
                        </div>
                        <div class="form-group" style="margin-bottom:0;">
                            <label for="contactCompany" class="form-label" style="color: var(--color-navy-dark);">Company /
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
    </section>


@endsection
