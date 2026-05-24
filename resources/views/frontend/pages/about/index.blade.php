@extends('frontend.layouts.app')
@section('title', 'Home – EBON')
@section('frontend.content')
    <!-- ========================================================================
           2. SUBPAGE HERO BANNER
           ======================================================================== -->
    <section class="subpage-hero-banner"
        style="background: linear-gradient(135deg, var(--color-navy-dark), var(--color-navy-mid)); border-bottom: 2px solid var(--color-gold); padding: 150px 0 80px; position: relative; overflow: hidden; text-align: center;">
        <div
            style="position: absolute; top:0; left:0; width:100%; height:100%; opacity:0.1; background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;">
        </div>
        <div class="container" style="position: relative; z-index: 2;">
            <span class="section-subtitle" style="margin-bottom: 8px;">Since 2004</span>
            <h1 style="color: #ffffff; font-size: 42px; text-transform: uppercase; font-family: var(--font-headers);">About
                Ebon Window</h1>
            <p style="color: var(--color-text-muted-light); max-width: 600px; margin: 15px auto 0; font-size: 15px;">
                Guangdong Ebon Doors and Windows Industrial Co., Ltd is an innovation-driven B2B leader in high-performance
                thermal break solutions.</p>
        </div>
    </section>

    <!-- ========================================================================
           3. INTRO DETAILS & FACTORY SCALE
           ======================================================================== -->
    <section class="about-detail-section" style="padding: 100px 0; background-color: #ffffff;">
        <div class="container" style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
            <div class="reveal-el">
                <span class="section-subtitle">Manufacturing Capacity</span>
                <h2 class="section-title" style="text-align: left; margin-bottom: 30px;">World-Class Intelligent Bases</h2>
                <p style="color: var(--color-text-muted-dark); font-size: 15px; line-height: 1.7; margin-bottom: 20px;">EBON
                    manages four modern intelligent production bases spanning over **100,000 square meters** of smart
                    warehouse structures. Equipped with precision automated cutting lines, structural welding facilities,
                    and insulated glass glazing cleanrooms, EBON operates at absolute manufacturing efficiency to support
                    global real estate pipelines.</p>
                <p style="color: var(--color-text-muted-dark); font-size: 15px; line-height: 1.7; margin-bottom: 20px;">By
                    employing German standard mechanical tolerances and utilizing ultra-pure thermal insulation polyamide
                    strips (PA66GF25), our products boast supreme air-tightness, wind load resistance, and solar insulation
                    ratings.</p>
            </div>
            <div class="reveal-el" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); padding: 30px; border-radius: var(--border-radius); text-align: center;">
                    <i class="fas fa-layer-group"
                        style="font-size: 32px; color: var(--color-gold); margin-bottom: 15px;"></i>
                    <h4 style="font-size: 16px; margin-bottom: 8px;">German Standards</h4>
                    <p style="font-size: 12px; color: var(--color-text-muted-dark);">Engineered using precise European
                        manufacturing tolerances.</p>
                </div>
                <div
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); padding: 30px; border-radius: var(--border-radius); text-align: center;">
                    <i class="fas fa-leaf" style="font-size: 32px; color: var(--color-gold); margin-bottom: 15px;"></i>
                    <h4 style="font-size: 16px; margin-bottom: 8px;">Green Building</h4>
                    <p style="font-size: 12px; color: var(--color-text-muted-dark);">Contributing points to LEED/BREEAM
                        certified projects.</p>
                </div>
                <div
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); padding: 30px; border-radius: var(--border-radius); text-align: center;">
                    <i class="fas fa-shield-alt"
                        style="font-size: 32px; color: var(--color-gold); margin-bottom: 15px;"></i>
                    <h4 style="font-size: 16px; margin-bottom: 8px;">CE Certified</h4>
                    <p style="font-size: 12px; color: var(--color-text-muted-dark);">Completely accredited for exports into
                        the European Union.</p>
                </div>
                <div
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); padding: 30px; border-radius: var(--border-radius); text-align: center;">
                    <i class="fas fa-shipping-fast"
                        style="font-size: 32px; color: var(--color-gold); margin-bottom: 15px;"></i>
                    <h4 style="font-size: 16px; margin-bottom: 8px;">Global Delivery</h4>
                    <p style="font-size: 12px; color: var(--color-text-muted-dark);">Heavy B2B export experience with secure
                        shipping workflows.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
           4. DEVELOPMENT TIMELINE
           ======================================================================== -->
    <section class="timeline-section" style="padding: 100px 0; background-color: var(--color-navy-dark); color: #ffffff;">
        <div class="container">
            <div class="section-title-wrap reveal-el">
                <span class="section-subtitle">Chronology</span>
                <h2 class="section-title" style="color: #ffffff;">Corporate History</h2>
            </div>

            <div
                style="display: flex; justify-content: space-between; position: relative; padding: 40px 0; overflow-x: auto; gap: 40px; scrollbar-width: none;">
                <div
                    style="position: absolute; top: 82px; left: 0; width: 100%; height: 2px; background: var(--glass-border); z-index: 1;">
                </div>

                <!-- Year 1 -->
                <div style="flex: 1; min-width: 200px; text-align: center; position: relative; z-index: 2;"
                    class="reveal-el delay-100">
                    <h3 style="color: var(--color-gold); font-size: 24px; margin-bottom: 15px;">2004</h3>
                    <div
                        style="width: 16px; height: 16px; border-radius: 50%; background: var(--color-gold); border: 4px solid var(--color-navy-dark); margin: 0 auto 20px;">
                    </div>
                    <h4 style="font-size: 15px; margin-bottom: 6px; color: #ffffff;">Foundation</h4>
                    <p style="font-size: 12px; color: var(--color-text-muted-light);">Ebon established in Foshan, starting
                        window fabrication services.</p>
                </div>
                <!-- Year 2 -->
                <div style="flex: 1; min-width: 200px; text-align: center; position: relative; z-index: 2;"
                    class="reveal-el delay-200">
                    <h3 style="color: var(--color-gold); font-size: 24px; margin-bottom: 15px;">2012</h3>
                    <div
                        style="width: 16px; height: 16px; border-radius: 50%; background: var(--color-gold); border: 4px solid var(--color-navy-dark); margin: 0 auto 20px;">
                    </div>
                    <h4 style="font-size: 15px; margin-bottom: 6px; color: #ffffff;">Intelligent Bases</h4>
                    <p style="font-size: 12px; color: var(--color-text-muted-light);">Constructed 2 new modern smart
                        manufacturing bases in Guangdong.</p>
                </div>
                <!-- Year 3 -->
                <div style="flex: 1; min-width: 200px; text-align: center; position: relative; z-index: 2;"
                    class="reveal-el delay-300">
                    <h3 style="color: var(--color-gold); font-size: 24px; margin-bottom: 15px;">2018</h3>
                    <div
                        style="width: 16px; height: 16px; border-radius: 50%; background: var(--color-gold); border: 4px solid var(--color-navy-dark); margin: 0 auto 20px;">
                    </div>
                    <h4 style="font-size: 15px; margin-bottom: 6px; color: #ffffff;">3i-Low-E Tech</h4>
                    <p style="font-size: 12px; color: var(--color-text-muted-light);">Patented ultra-insulated triple pane
                        glass structures.</p>
                </div>
                <!-- Year 4 -->
                <div style="flex: 1; min-width: 200px; text-align: center; position: relative; z-index: 2;"
                    class="reveal-el delay-300">
                    <h3 style="color: var(--color-gold); font-size: 24px; margin-bottom: 15px;">2026</h3>
                    <div
                        style="width: 16px; height: 16px; border-radius: 50%; background: var(--color-gold); border: 4px solid var(--color-navy-dark); margin: 0 auto 20px;">
                    </div>
                    <h4 style="font-size: 15px; margin-bottom: 6px; color: #ffffff;">Global B2B Leader</h4>
                    <p style="font-size: 12px; color: var(--color-text-muted-light);">Ebon systems installed in commercial
                        structures across 60+ countries.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
           5. CERTIFICATIONS GRID
           ======================================================================== -->
    <section class="certifications-section" style="padding: 100px 0; background-color: #ffffff;">
        <div class="container">
            <div class="section-title-wrap reveal-el">
                <span class="section-subtitle">Accreditations</span>
                <h2 class="section-title">International B2B Credentials</h2>
            </div>

            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px;">
                <!-- Cert 1 -->
                <div style="text-align: center; padding: 20px; border: 1px solid rgba(7, 22, 44, 0.08); border-radius: var(--border-radius);"
                    class="reveal-el delay-100">
                    <div
                        style="width: 80px; height: 80px; border-radius: 50%; background: rgba(197,168,109,0.1); color: var(--color-gold); display: flex; align-items: center; justify-content: center; font-size: 30px; margin: 0 auto 20px;">
                        <i class="fas fa-stamp"></i></div>
                    <h3 style="font-size: 16px; margin-bottom: 8px;">CE Compliance</h3>
                    <p style="font-size: 12px; color: var(--color-text-muted-dark);">Fully certified to meet all European
                        health, safety, and environmental standards.</p>
                </div>
                <!-- Cert 2 -->
                <div style="text-align: center; padding: 20px; border: 1px solid rgba(7, 22, 44, 0.08); border-radius: var(--border-radius);"
                    class="reveal-el delay-200">
                    <div
                        style="width: 80px; height: 80px; border-radius: 50%; background: rgba(197,168,109,0.1); color: var(--color-gold); display: flex; align-items: center; justify-content: center; font-size: 30px; margin: 0 auto 20px;">
                        <i class="fas fa-clipboard-check"></i></div>
                    <h3 style="font-size: 16px; margin-bottom: 8px;">SGS Inspected</h3>
                    <p style="font-size: 12px; color: var(--color-text-muted-dark);">Third-party verified for material
                        strength, wind resistance, and structural tolerances.</p>
                </div>
                <!-- Cert 3 -->
                <div style="text-align: center; padding: 20px; border: 1px solid rgba(7, 22, 44, 0.08); border-radius: var(--border-radius);"
                    class="reveal-el delay-300">
                    <div
                        style="width: 80px; height: 80px; border-radius: 50%; background: rgba(197,168,109,0.1); color: var(--color-gold); display: flex; align-items: center; justify-content: center; font-size: 30px; margin: 0 auto 20px;">
                        <i class="fas fa-globe-americas"></i></div>
                    <h3 style="font-size: 16px; margin-bottom: 8px;">ISO 9001:2015</h3>
                    <p style="font-size: 12px; color: var(--color-text-muted-dark);">Stringent international quality control
                        standards maintained at all bases.</p>
                </div>
                <!-- Cert 4 -->
                <div style="text-align: center; padding: 20px; border: 1px solid rgba(7, 22, 44, 0.08); border-radius: var(--border-radius);"
                    class="reveal-el delay-300">
                    <div
                        style="width: 80px; height: 80px; border-radius: 50%; background: rgba(197,168,109,0.1); color: var(--color-gold); display: flex; align-items: center; justify-content: center; font-size: 30px; margin: 0 auto 20px;">
                        <i class="fas fa-leaf"></i></div>
                    <h3 style="font-size: 16px; margin-bottom: 8px;">Green Building</h3>
                    <p style="font-size: 12px; color: var(--color-text-muted-dark);">Awarded environmental product
                        declaration credentials for low carbon index.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
