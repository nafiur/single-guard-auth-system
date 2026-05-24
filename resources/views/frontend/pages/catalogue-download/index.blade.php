@extends('frontend.layouts.app')
@section('title', 'Catalogue Download | EBON Premium Aluminum Doors & Windows')
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
            <span class="section-subtitle" style="margin-bottom: 8px;">B2B Technical Vault</span>
            <h1 style="color: #ffffff; font-size: 42px; text-transform: uppercase; font-family: var(--font-headers);">
                Download Catalogues</h1>
            <p style="color: var(--color-text-muted-light); max-width: 600px; margin: 15px auto 0; font-size: 15px;">Browse
                and download our architectural catalogs, physical core specifications, and compliance certificates in
                high-resolution PDF format.</p>
        </div>
    </section>

    <!-- ========================================================================
           3. BREADCRUMBS BAR
           ======================================================================== -->
    <section class="breadcrumbs-section"
        style="padding: 20px 0; background-color: var(--color-bg-light); border-bottom: 1px solid rgba(7,22,44,0.05);">
        <div class="container">
            <div
                style="font-size: 13px; color: var(--color-text-muted-dark); display: flex; gap: 8px; align-items: center;">
                <a href="index.html" style="color: var(--color-navy-dark); font-weight: 500;">Home</a>
                <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                <span style="color: var(--color-gold); font-weight: 600;">Download Catalogues</span>
            </div>
        </div>
    </section>

    <!-- ========================================================================
           4. CATALOG RESOURCES VAULT
           ======================================================================== -->
    <section style="padding: 80px 0; background-color: #ffffff;">
        <div class="container">

            <!-- Category Filter Tabs -->
            <div style="display: flex; justify-content: center; gap: 15px; margin-bottom: 50px; flex-wrap: wrap;">
                <button class="btn-outline catalog-filter-btn active" data-cat="all"
                    style="border-radius: 30px; font-size: 12px; padding: 10px 24px;">All Publications</button>
                <button class="btn-outline catalog-filter-btn" data-cat="corporate"
                    style="border-radius: 30px; font-size: 12px; padding: 10px 24px;">Corporate & Info</button>
                <button class="btn-outline catalog-filter-btn" data-cat="doors"
                    style="border-radius: 30px; font-size: 12px; padding: 10px 24px;">Doors Collections</button>
                <button class="btn-outline catalog-filter-btn" data-cat="windows"
                    style="border-radius: 30px; font-size: 12px; padding: 10px 24px;">Windows Series</button>
                <button class="btn-outline catalog-filter-btn" data-cat="structural"
                    style="border-radius: 30px; font-size: 12px; padding: 10px 24px;">Glazing & Facades</button>
            </div>

            <!-- PDF Cards Grid -->
            <div id="catalogGrid"
                style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-bottom: 50px;">

                <!-- PDF 1: Corporate Brochure -->
                <div class="catalog-card reveal-el" data-category="corporate"
                    style="background-color: var(--color-bg-light); border-radius: var(--border-radius); border: 1px solid rgba(7,22,44,0.05); padding: 30px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: var(--box-shadow-premium); transition: var(--transition-smooth);">
                    <div>
                        <!-- Card Header Icon & Label -->
                        <div
                            style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                            <div
                                style="background-color: rgba(197, 168, 109, 0.1); width: 50px; height: 50px; border-radius: 8px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(197, 168, 109, 0.2);">
                                <i class="far fa-file-pdf" style="font-size: 24px; color: var(--color-gold);"></i>
                            </div>
                            <span
                                style="font-size: 10px; font-weight: 700; text-transform: uppercase; background: var(--color-navy-dark); color: var(--color-gold); padding: 4px 10px; border-radius: 20px;">12.4
                                MB</span>
                        </div>

                        <h3
                            style="font-size: 18px; color: var(--color-navy-dark); font-family: var(--font-headers); margin-bottom: 12px;">
                            Corporate Brand Catalogue 2026</h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Comprehensive profile of Guangdong Ebon operations, smart automation machinery scale, and global
                            structural project summaries since 2004.</p>

                        <!-- Details list -->
                        <div
                            style="border-top: 1px solid rgba(7,22,44,0.05); padding-top: 15px; margin-bottom: 25px; font-size: 12px; color: var(--color-text-muted-dark); display: flex; flex-direction: column; gap: 8px;">
                            <div><strong>Version:</strong> v4.2 Release (2026)</div>
                            <div><strong>Pages:</strong> 48 High-res pages</div>
                            <div><strong>Certification:</strong> CE / SGS / TUV Registered</div>
                        </div>
                    </div>

                    <a href="assets/catalogue_corporate_2026.pdf" download class="btn-primary"
                        style="justify-content: center; padding: 12px; font-size: 12px; width: 100%;">
                        Download Corporate PDF <i class="fas fa-download" style="margin-left: 6px;"></i>
                    </a>
                </div>

                <!-- PDF 2: Doors Catalog -->
                <div class="catalog-card reveal-el" data-category="doors"
                    style="background-color: var(--color-bg-light); border-radius: var(--border-radius); border: 1px solid rgba(7,22,44,0.05); padding: 30px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: var(--box-shadow-premium); transition: var(--transition-smooth);">
                    <div>
                        <div
                            style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                            <div
                                style="background-color: rgba(197, 168, 109, 0.1); width: 50px; height: 50px; border-radius: 8px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(197, 168, 109, 0.2);">
                                <i class="far fa-file-pdf" style="font-size: 24px; color: var(--color-gold);"></i>
                            </div>
                            <span
                                style="font-size: 10px; font-weight: 700; text-transform: uppercase; background: var(--color-navy-dark); color: var(--color-gold); padding: 4px 10px; border-radius: 20px;">8.2
                                MB</span>
                        </div>

                        <h3
                            style="font-size: 18px; color: var(--color-navy-dark); font-family: var(--font-headers); margin-bottom: 12px;">
                            Premium Doors Systems Catalog</h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Complete blueprints for heavy folding doors, heavy swing sliding profiles, glass thermal seal
                            drawings, and hardware lock configuration rules.</p>

                        <div
                            style="border-top: 1px solid rgba(7,22,44,0.05); padding-top: 15px; margin-bottom: 25px; font-size: 12px; color: var(--color-text-muted-dark); display: flex; flex-direction: column; gap: 8px;">
                            <div><strong>Version:</strong> v3.1 Release (2026)</div>
                            <div><strong>Pages:</strong> 36 CAD schematic pages</div>
                            <div><strong>System:</strong> Elite-120 Multi-fold standard</div>
                        </div>
                    </div>

                    <a href="assets/catalogue_doors_2026.pdf" download class="btn-primary"
                        style="justify-content: center; padding: 12px; font-size: 12px; width: 100%;">
                        Download Doors PDF <i class="fas fa-download" style="margin-left: 6px;"></i>
                    </a>
                </div>

                <!-- PDF 3: Windows Catalog -->
                <div class="catalog-card reveal-el" data-category="windows"
                    style="background-color: var(--color-bg-light); border-radius: var(--border-radius); border: 1px solid rgba(7,22,44,0.05); padding: 30px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: var(--box-shadow-premium); transition: var(--transition-smooth);">
                    <div>
                        <div
                            style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                            <div
                                style="background-color: rgba(197, 168, 109, 0.1); width: 50px; height: 50px; border-radius: 8px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(197, 168, 109, 0.2);">
                                <i class="far fa-file-pdf" style="font-size: 24px; color: var(--color-gold);"></i>
                            </div>
                            <span
                                style="font-size: 10px; font-weight: 700; text-transform: uppercase; background: var(--color-navy-dark); color: var(--color-gold); padding: 4px 10px; border-radius: 20px;">9.5
                                MB</span>
                        </div>

                        <h3
                            style="font-size: 18px; color: var(--color-navy-dark); font-family: var(--font-headers); margin-bottom: 12px;">
                            Outward Casement Window Series</h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Nylon PA66 strips thermal isolation models, concealed window hinge specs, storm rainwater
                            sealing structures, and Siegenia hardware sets.</p>

                        <div
                            style="border-top: 1px solid rgba(7,22,44,0.05); padding-top: 15px; margin-bottom: 25px; font-size: 12px; color: var(--color-text-muted-dark); display: flex; flex-direction: column; gap: 8px;">
                            <div><strong>Version:</strong> v5.0 Release (2026)</div>
                            <div><strong>Pages:</strong> 42 high fidelity spec sheets</div>
                            <div><strong>Rating:</strong> Class 8 Storm sealing integrity</div>
                        </div>
                    </div>

                    <a href="assets/catalogue_windows_2026.pdf" download class="btn-primary"
                        style="justify-content: center; padding: 12px; font-size: 12px; width: 100%;">
                        Download Windows PDF <i class="fas fa-download" style="margin-left: 6px;"></i>
                    </a>
                </div>

                <!-- PDF 4: Curtain Wall Facades -->
                <div class="catalog-card reveal-el" data-category="structural"
                    style="background-color: var(--color-bg-light); border-radius: var(--border-radius); border: 1px solid rgba(7,22,44,0.05); padding: 30px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: var(--box-shadow-premium); transition: var(--transition-smooth);">
                    <div>
                        <div
                            style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                            <div
                                style="background-color: rgba(197, 168, 109, 0.1); width: 50px; height: 50px; border-radius: 8px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(197, 168, 109, 0.2);">
                                <i class="far fa-file-pdf" style="font-size: 24px; color: var(--color-gold);"></i>
                            </div>
                            <span
                                style="font-size: 10px; font-weight: 700; text-transform: uppercase; background: var(--color-navy-dark); color: var(--color-gold); padding: 4px 10px; border-radius: 20px;">15.1
                                MB</span>
                        </div>

                        <h3
                            style="font-size: 18px; color: var(--color-navy-dark); font-family: var(--font-headers); margin-bottom: 12px;">
                            Vista Structural Facades Glazing</h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Dow Corning silicone integration details, heavy facade calculations, panoramic framing widths,
                            and impact load structural tests.</p>

                        <div
                            style="border-top: 1px solid rgba(7,22,44,0.05); padding-top: 15px; margin-bottom: 25px; font-size: 12px; color: var(--color-text-muted-dark); display: flex; flex-direction: column; gap: 8px;">
                            <div><strong>Version:</strong> v2.8 Release (2026)</div>
                            <div><strong>Pages:</strong> 54 Architectural detail plates</div>
                            <div><strong>Integrity:</strong> Structural Silicone Dow Corning standard</div>
                        </div>
                    </div>

                    <a href="assets/catalogue_facades_2026.pdf" download class="btn-primary"
                        style="justify-content: center; padding: 12px; font-size: 12px; width: 100%;">
                        Download Facades PDF <i class="fas fa-download" style="margin-left: 6px;"></i>
                    </a>
                </div>

                <!-- PDF 5: Green Building & U-Value Reports -->
                <div class="catalog-card reveal-el" data-category="corporate"
                    style="background-color: var(--color-bg-light); border-radius: var(--border-radius); border: 1px solid rgba(7,22,44,0.05); padding: 30px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: var(--box-shadow-premium); transition: var(--transition-smooth);">
                    <div>
                        <div
                            style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                            <div
                                style="background-color: rgba(197, 168, 109, 0.1); width: 50px; height: 50px; border-radius: 8px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(197, 168, 109, 0.2);">
                                <i class="far fa-file-pdf" style="font-size: 24px; color: var(--color-gold);"></i>
                            </div>
                            <span
                                style="font-size: 10px; font-weight: 700; text-transform: uppercase; background: var(--color-navy-dark); color: var(--color-gold); padding: 4px 10px; border-radius: 20px;">4.5
                                MB</span>
                        </div>

                        <h3
                            style="font-size: 18px; color: var(--color-navy-dark); font-family: var(--font-headers); margin-bottom: 12px;">
                            3i-Low-E Insulated Glass Report</h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Thermal radiation test sheets, gas-insulated triple low-E pane light transmittance grids, and
                            solar heat gain coefficient ratings.</p>

                        <div
                            style="border-top: 1px solid rgba(7,22,44,0.05); padding-top: 15px; margin-bottom: 25px; font-size: 12px; color: var(--color-text-muted-dark); display: flex; flex-direction: column; gap: 8px;">
                            <div><strong>Version:</strong> v1.5 Release (2026)</div>
                            <div><strong>Pages:</strong> 24 Lab compliance reports</div>
                            <div><strong>Performance:</strong> U-Value ≤ 1.1 W/m²K thermal efficiency</div>
                        </div>
                    </div>

                    <a href="assets/catalogue_lowe_2026.pdf" download class="btn-primary"
                        style="justify-content: center; padding: 12px; font-size: 12px; width: 100%;">
                        Download Glass Report <i class="fas fa-download" style="margin-left: 6px;"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>

@endsection
