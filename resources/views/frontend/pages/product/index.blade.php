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
           3. INTERACTIVE PRODUCT FILTER SYSTEM
           ======================================================================== -->
    <section class="catalog-filter-section" style="padding: 100px 0; background-color: #ffffff;">
        <div class="container">

            <!-- Filters Tabs Header -->
            <div style="display: flex; justify-content: center; gap: 15px; margin-bottom: 50px; flex-wrap: wrap;">
                <button class="btn-outline filter-tab-btn active" data-filter="all"
                    style="border-radius: 30px; font-size: 12px; padding: 10px 24px;">All Products</button>
                <button class="btn-outline filter-tab-btn" data-filter="doors"
                    style="border-radius: 30px; font-size: 12px; padding: 10px 24px;">Doors Series</button>
                <button class="btn-outline filter-tab-btn" data-filter="windows"
                    style="border-radius: 30px; font-size: 12px; padding: 10px 24px;">Windows Series</button>
                <button class="btn-outline filter-tab-btn" data-filter="glazing"
                    style="border-radius: 30px; font-size: 12px; padding: 10px 24px;">Architectural Glazing</button>
            </div>

            <!-- Grid of Cards -->
            <div class="products-catalog-grid"
                style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-bottom: 80px;">

                <!-- Product 1: Doors -->
                <div class="product-item-card reveal-el" data-category="doors"
                    style="background-color: var(--color-bg-light); border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--box-shadow-premium); border: 1px solid rgba(7,22,44,0.05);">
                    <div style="height: 240px; overflow: hidden; position: relative;">
                        <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=600&q=80"
                            alt="Double Fold Doors" style="width: 100%; height: 100%; object-fit: cover;">
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-navy-dark); color: var(--color-gold); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; border: 1px solid var(--glass-border);">Heavy
                            Swing</span>
                    </div>
                    <div style="padding: 30px;">
                        <h3 style="font-size: 18px; margin-bottom: 12px;">Premium Double Folding Door</h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Designed with ultra slim boundaries and multi-fold tracking assemblies to blend interior space
                            seamlessly with out-of-doors gardens.</p>
                        <div style="display: flex; gap: 10px;">
                            <a href="product-detail.html?id=folding-door" class="btn-outline"
                                style="flex: 1; padding: 12px 0; font-size: 11px; justify-content: center; text-decoration: none; border-radius: 4px;">View
                                Specs</a>
                            <button class="btn-primary open-quote-modal"
                                style="flex: 1; padding: 12px 0; font-size: 11px; justify-content: center; border-radius: 4px;">Get
                                Quote</button>
                        </div>
                    </div>
                </div>

                <!-- Product 2: Windows -->
                <div class="product-item-card reveal-el" data-category="windows"
                    style="background-color: var(--color-bg-light); border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--box-shadow-premium); border: 1px solid rgba(7,22,44,0.05);">
                    <div style="height: 240px; overflow: hidden; position: relative;">
                        <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=600&q=80"
                            alt="Outward Opening Window" style="width: 100%; height: 100%; object-fit: cover;">
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-navy-dark); color: var(--color-gold); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; border: 1px solid var(--glass-border);">Thermal
                            break</span>
                    </div>
                    <div style="padding: 30px;">
                        <h3 style="font-size: 18px; margin-bottom: 12px;">Outward Casement Window</h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Integrated with nylon PA66 heat insulation barriers and concealed hinge tracks for elegant high
                            tightness security sealing.</p>
                        <div style="display: flex; gap: 10px;">
                            <a href="product-detail.html?id=casement-window" class="btn-outline"
                                style="flex: 1; padding: 12px 0; font-size: 11px; justify-content: center; text-decoration: none; border-radius: 4px;">View
                                Specs</a>
                            <button class="btn-primary open-quote-modal"
                                style="flex: 1; padding: 12px 0; font-size: 11px; justify-content: center; border-radius: 4px;">Get
                                Quote</button>
                        </div>
                    </div>
                </div>

                <!-- Product 3: Glazing -->
                <div class="product-item-card reveal-el" data-category="glazing"
                    style="background-color: var(--color-bg-light); border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--box-shadow-premium); border: 1px solid rgba(7,22,44,0.05);">
                    <div style="height: 240px; overflow: hidden; position: relative;">
                        <img src="https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=600&q=80"
                            alt="Custom Facades" style="width: 100%; height: 100%; object-fit: cover;">
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-navy-dark); color: var(--color-gold); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; border: 1px solid var(--glass-border);">Facade
                            Glazing</span>
                    </div>
                    <div style="padding: 30px;">
                        <h3 style="font-size: 18px; margin-bottom: 12px;">Structural Glass Wall</h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Panoramic floor-to-ceiling curtain wall profiles offering extreme wind resistance ratings for
                            architectural commercial structures.</p>
                        <div style="display: flex; gap: 10px;">
                            <a href="product-detail.html?id=glass-wall" class="btn-outline"
                                style="flex: 1; padding: 12px 0; font-size: 11px; justify-content: center; text-decoration: none; border-radius: 4px;">View
                                Specs</a>
                            <button class="btn-primary open-quote-modal"
                                style="flex: 1; padding: 12px 0; font-size: 11px; justify-content: center; border-radius: 4px;">Get
                                Quote</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Comparison Matrix Table -->
            <div class="technical-table-wrap reveal-el" style="margin-top: 60px;">
                <div class="section-title-wrap">
                    <span class="section-subtitle">Data Matrix</span>
                    <h2 class="section-title">Technical Specifications</h2>
                </div>

                <div style="overflow-x: auto;">
                    <table
                        style="width: 100%; border-collapse: collapse; min-width: 800px; font-size: 14px; text-align: left;">
                        <thead>
                            <tr
                                style="background-color: var(--color-navy-dark); color: #ffffff; border-bottom: 3px solid var(--color-gold);">
                                <th style="padding: 18px 24px; font-family: var(--font-headers); font-weight: 600;">System
                                    Type</th>
                                <th style="padding: 18px 24px; font-family: var(--font-headers); font-weight: 600;">Profile
                                    Material</th>
                                <th style="padding: 18px 24px; font-family: var(--font-headers); font-weight: 600;">
                                    Thickness</th>
                                <th style="padding: 18px 24px; font-family: var(--font-headers); font-weight: 600;">Glazing
                                    Specs</th>
                                <th style="padding: 18px 24px; font-family: var(--font-headers); font-weight: 600;">U-Value
                                    Performance</th>
                                <th style="padding: 18px 24px; font-family: var(--font-headers); font-weight: 600;">
                                    Certification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid rgba(7, 22, 44, 0.08);">
                                <td style="padding: 18px 24px; font-weight: 600; color: var(--color-navy-dark);">Folding
                                    Doors</td>
                                <td style="padding: 18px 24px;">6063-T5 Premium Aluminum</td>
                                <td style="padding: 18px 24px;">2.0mm - 3.0mm</td>
                                <td style="padding: 18px 24px;">5mm + 12Ar + 5mm Low-E Double</td>
                                <td style="padding: 18px 24px; font-weight: 600; color: var(--color-gold);">1.6 W/m²K</td>
                                <td style="padding: 18px 24px;"><span
                                        style="background: rgba(76,175,80,0.1); color:#4caf50; padding: 4px 10px; border-radius: 12px; font-size: 11px; font-weight:700;">CE
                                        / SGS</span></td>
                            </tr>
                            <tr
                                style="border-bottom: 1px solid rgba(7, 22, 44, 0.08); background-color: var(--color-bg-light);">
                                <td style="padding: 18px 24px; font-weight: 600; color: var(--color-navy-dark);">Casement
                                    Windows</td>
                                <td style="padding: 18px 24px;">6063-T5 Premium Aluminum</td>
                                <td style="padding: 18px 24px;">1.4mm - 1.8mm</td>
                                <td style="padding: 18px 24px;">5mm + 9Ar + 5mm + 9Ar + 5mm Triple</td>
                                <td style="padding: 18px 24px; font-weight: 600; color: var(--color-gold);">1.2 W/m²K</td>
                                <td style="padding: 18px 24px;"><span
                                        style="background: rgba(76,175,80,0.1); color:#4caf50; padding: 4px 10px; border-radius: 12px; font-size: 11px; font-weight:700;">CE
                                        / ISO</span></td>
                            </tr>
                            <tr style="border-bottom: 1px solid rgba(7, 22, 44, 0.08);">
                                <td style="padding: 18px 24px; font-weight: 600; color: var(--color-navy-dark);">Curtain
                                    Glass Walls</td>
                                <td style="padding: 18px 24px;">6063-T6 Structural Profile</td>
                                <td style="padding: 18px 24px;">2.5mm - 3.0mm</td>
                                <td style="padding: 18px 24px;">6mm Low-E + 12Ar + 6mm Tempered</td>
                                <td style="padding: 18px 24px; font-weight: 600; color: var(--color-gold);">1.4 W/m²K</td>
                                <td style="padding: 18px 24px;"><span
                                        style="background: rgba(76,175,80,0.1); color:#4caf50; padding: 4px 10px; border-radius: 12px; font-size: 11px; font-weight:700;">CE
                                        / SGS</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

@endsection
