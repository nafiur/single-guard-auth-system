@extends('frontend.layouts.app')
@section('title', 'Case Studies – EBON')
@section('frontend.content')

    <!-- ========================================================================
           2. SUBPAGE HERO BANNER
           ======================================================================== -->
    <section class="subpage-hero-banner"
        style="background: linear-gradient(135deg, var(--color-navy-dark), var(--color-navy-mid)); border-bottom: 2px solid var(--color-gold); padding: 150px 0 80px; position: relative; overflow: hidden; text-align: center;">
        <div
            style="position: absolute; top:0; left:0; width:100%; height:100%; opacity:0.1; background-image: url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;">
        </div>
        <div class="container" style="position: relative; z-index: 2;">
            <span class="section-subtitle" style="margin-bottom: 8px;">Case Studies</span>
            <h1 style="color: #ffffff; font-size: 42px; text-transform: uppercase; font-family: var(--font-headers);">Global
                Achievements</h1>
            <p style="color: var(--color-text-muted-light); max-width: 600px; margin: 15px auto 0; font-size: 15px;">A
                collection of structural masterpieces built in cooperation with international developers, architects, and
                designers.</p>
        </div>
    </section>

    <!-- ========================================================================
           3. CASE PORTFOLIO GALLERY MASONRY
           ======================================================================== -->
    <section class="cases-gallery-section" style="padding: 100px 0; background-color: #ffffff;">
        <div class="container">
            <div class="portfolio-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">

                <!-- Project 1 -->
                <div class="portfolio-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); overflow: hidden; border-radius: var(--border-radius); transition: var(--transition-smooth);">
                    <div style="height: 260px; overflow: hidden; position: relative;">
                        <a href="case-detail.html?id=philippines-villa"
                            style="display: block; height: 100%; overflow: hidden;">
                            <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=800&q=80"
                                alt="Philippines Luxury Villa Project"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-navy-dark); color: var(--color-gold); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; border: 1px solid var(--glass-border);">Philippines</span>
                    </div>
                    <div style="padding: 30px;">
                        <span
                            style="font-size: 11px; text-transform: uppercase; letter-spacing: 2px; color: var(--color-gold); font-weight: 700; display: block; margin-bottom: 8px;">Oceanic
                            Residence</span>
                        <h3
                            style="font-size: 18px; margin-bottom: 12px; color: var(--color-navy-dark); font-family: var(--font-headers);">
                            <a href="case-detail.html?id=philippines-villa"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">Luxury
                                Ocean Villa</a>
                        </h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Designed to withstand severe typhoons. Integrated with 120 Series Multi-Slide Thermal Systems
                            and 8mm + 12Ar + 8mm double-tempered structural glass.</p>

                        <div
                            style="display: flex; flex-direction: column; gap: 8px; border-top: 1px dashed rgba(7,22,44,0.1); padding-top: 15px; margin-bottom: 20px; font-size: 12px; color: var(--color-text-muted-dark);">
                            <div><strong>System:</strong> 120 Series Heavy Slide</div>
                            <div><strong>Glazing:</strong> Low-E Double Pane (Argon)</div>
                            <div><strong>Wind Class:</strong> Class 8 (Extreme Typhoon Resistant)</div>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <a href="case-detail.html?id=philippines-villa" class="btn-outline"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; text-decoration: none; border-radius: 4px;">
                                View Specs <i class="fas fa-search-plus" style="margin-left: 6px;"></i>
                            </a>
                            <button class="btn-primary open-quote-modal"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; border-radius: 4px;">
                                Inquire Spec
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="portfolio-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); overflow: hidden; border-radius: var(--border-radius); transition: var(--transition-smooth);">
                    <div style="height: 260px; overflow: hidden; position: relative;">
                        <a href="case-detail.html?id=thailand-pavilion"
                            style="display: block; height: 100%; overflow: hidden;">
                            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80"
                                alt="Thailand Resort Project"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-navy-dark); color: var(--color-gold); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; border: 1px solid var(--glass-border);">Thailand</span>
                    </div>
                    <div style="padding: 30px;">
                        <span
                            style="font-size: 11px; text-transform: uppercase; letter-spacing: 2px; color: var(--color-gold); font-weight: 700; display: block; margin-bottom: 8px;">Hospitality
                            Pavilion</span>
                        <h3
                            style="font-size: 18px; margin-bottom: 12px; color: var(--color-navy-dark); font-family: var(--font-headers);">
                            <a href="case-detail.html?id=thailand-pavilion"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">Five-Star
                                Resort Pavilion</a>
                        </h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Panoramic floor-to-ceiling facades with concealed frames designed for maximum visibility. Blocks
                            98% of high sun tropical radiation.</p>

                        <div
                            style="display: flex; flex-direction: column; gap: 8px; border-top: 1px dashed rgba(7,22,44,0.1); padding-top: 15px; margin-bottom: 20px; font-size: 12px; color: var(--color-text-muted-dark);">
                            <div><strong>System:</strong> Panoramic Glass Wall</div>
                            <div><strong>Glazing:</strong> Triple-Silver Low-E High-Trans</div>
                            <div><strong>Shading Coeff:</strong> SC = 0.28 (Extreme Thermal Insulation)</div>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <a href="case-detail.html?id=thailand-pavilion" class="btn-outline"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; text-decoration: none; border-radius: 4px;">
                                View Specs <i class="fas fa-search-plus" style="margin-left: 6px;"></i>
                            </a>
                            <button class="btn-primary open-quote-modal"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; border-radius: 4px;">
                                Inquire Spec
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="portfolio-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); overflow: hidden; border-radius: var(--border-radius); transition: var(--transition-smooth);">
                    <div style="height: 260px; overflow: hidden; position: relative;">
                        <a href="case-detail.html?id=west-africa" style="display: block; height: 100%; overflow: hidden;">
                            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80"
                                alt="West Africa Residential Glazing"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-navy-dark); color: var(--color-gold); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; border: 1px solid var(--glass-border);">West
                            Africa</span>
                    </div>
                    <div style="padding: 30px;">
                        <span
                            style="font-size: 11px; text-transform: uppercase; letter-spacing: 2px; color: var(--color-gold); font-weight: 700; display: block; margin-bottom: 8px;">Estates
                            Glazing</span>
                        <h3
                            style="font-size: 18px; margin-bottom: 12px; color: var(--color-navy-dark); font-family: var(--font-headers);">
                            <a href="case-detail.html?id=west-africa"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">High-end
                                Residential Estates</a>
                        </h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            A large housing estate project outfitted with thermal-break 70 Series Casement Windows and heavy
                            aluminum exterior swing entry doors.</p>

                        <div
                            style="display: flex; flex-direction: column; gap: 8px; border-top: 1px dashed rgba(7,22,44,0.1); padding-top: 15px; margin-bottom: 20px; font-size: 12px; color: var(--color-text-muted-dark);">
                            <div><strong>System:</strong> 70 Series Casement Windows</div>
                            <div><strong>Glazing:</strong> Double Pane Standard Low-E</div>
                            <div><strong>Export Volume:</strong> 4,200 Square Meters</div>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <a href="case-detail.html?id=west-africa" class="btn-outline"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; text-decoration: none; border-radius: 4px;">
                                View Specs <i class="fas fa-search-plus" style="margin-left: 6px;"></i>
                            </a>
                            <button class="btn-primary open-quote-modal"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; border-radius: 4px;">
                                Inquire Spec
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="portfolio-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); overflow: hidden; border-radius: var(--border-radius); transition: var(--transition-smooth);">
                    <div style="height: 260px; overflow: hidden; position: relative;">
                        <a href="case-detail.html?id=romania-church"
                            style="display: block; height: 100%; overflow: hidden;">
                            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80"
                                alt="Romania Glass Pavilion"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-navy-dark); color: var(--color-gold); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; border: 1px solid var(--glass-border);">Romania</span>
                    </div>
                    <div style="padding: 30px;">
                        <span
                            style="font-size: 11px; text-transform: uppercase; letter-spacing: 2px; color: var(--color-gold); font-weight: 700; display: block; margin-bottom: 8px;">Commercial
                            Center</span>
                        <h3
                            style="font-size: 18px; margin-bottom: 12px; color: var(--color-navy-dark); font-family: var(--font-headers);">
                            <a href="case-detail.html?id=romania-church"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">Modern
                                Commercial Glass Pavilion</a>
                        </h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Built for extreme cold winters. Implements structural triple pane insulating systems with
                            superior Soundproof Acoustic rating of 42dB.</p>

                        <div
                            style="display: flex; flex-direction: column; gap: 8px; border-top: 1px dashed rgba(7,22,44,0.1); padding-top: 15px; margin-bottom: 20px; font-size: 12px; color: var(--color-text-muted-dark);">
                            <div><strong>System:</strong> Structural Facade Glazing</div>
                            <div><strong>Glazing:</strong> Triple-Pane 3i-Low-E Insulating</div>
                            <div><strong>U-Value:</strong> 1.1 W/m²K (Supreme Heat Retention)</div>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <a href="case-detail.html?id=romania-church" class="btn-outline"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; text-decoration: none; border-radius: 4px;">
                                View Specs <i class="fas fa-search-plus" style="margin-left: 6px;"></i>
                            </a>
                            <button class="btn-primary open-quote-modal"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; border-radius: 4px;">
                                Inquire Spec
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Project 5 -->
                <div class="portfolio-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); overflow: hidden; border-radius: var(--border-radius); transition: var(--transition-smooth);">
                    <div style="height: 260px; overflow: hidden; position: relative;">
                        <a href="case-detail.html?id=foshan-office"
                            style="display: block; height: 100%; overflow: hidden;">
                            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80"
                                alt="Foshan Office Glazing"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-navy-dark); color: var(--color-gold); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; border: 1px solid var(--glass-border);">China</span>
                    </div>
                    <div style="padding: 30px;">
                        <span
                            style="font-size: 11px; text-transform: uppercase; letter-spacing: 2px; color: var(--color-gold); font-weight: 700; display: block; margin-bottom: 8px;">Corporate
                            Headquarters</span>
                        <h3
                            style="font-size: 18px; margin-bottom: 12px; color: var(--color-navy-dark); font-family: var(--font-headers);">
                            <a href="case-detail.html?id=foshan-office"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">Guangdong
                                Smart Base Office</a>
                        </h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Our own smart administrative office showroom. Represents our maximum capability in invisible
                            frames and motorized thermal glass sliding panels.</p>

                        <div
                            style="display: flex; flex-direction: column; gap: 8px; border-top: 1px dashed rgba(7,22,44,0.1); padding-top: 15px; margin-bottom: 20px; font-size: 12px; color: var(--color-text-muted-dark);">
                            <div><strong>System:</strong> Motorized Smart Slide 150 Series</div>
                            <div><strong>Glazing:</strong> Electrochromic Smart Glass Tinting</div>
                            <div><strong>Frame Width:</strong> Ultra Slim 18mm Face Width</div>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <a href="case-detail.html?id=foshan-office" class="btn-outline"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; text-decoration: none; border-radius: 4px;">
                                View Specs <i class="fas fa-search-plus" style="margin-left: 6px;"></i>
                            </a>
                            <button class="btn-primary open-quote-modal"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; border-radius: 4px;">
                                Inquire Spec
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Project 6 -->
                <div class="portfolio-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); overflow: hidden; border-radius: var(--border-radius); transition: var(--transition-smooth);">
                    <div style="height: 260px; overflow: hidden; position: relative;">
                        <a href="case-detail.html?id=australia-passive"
                            style="display: block; height: 100%; overflow: hidden;">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80"
                                alt="Australia Passive House Project"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-navy-dark); color: var(--color-gold); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; border: 1px solid var(--glass-border);">Australia</span>
                    </div>
                    <div style="padding: 30px;">
                        <span
                            style="font-size: 11px; text-transform: uppercase; letter-spacing: 2px; color: var(--color-gold); font-weight: 700; display: block; margin-bottom: 8px;">Passive
                            House</span>
                        <h3
                            style="font-size: 18px; margin-bottom: 12px; color: var(--color-navy-dark); font-family: var(--font-headers);">
                            <a href="case-detail.html?id=australia-passive"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">Melbourne
                                Ecological Residence</a>
                        </h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Strict compliance with ecological BREEAM guidelines. Incorporates high-density gas-filled
                            insulation chambers and German hardware accessories.</p>

                        <div
                            style="display: flex; flex-direction: column; gap: 8px; border-top: 1px dashed rgba(7,22,44,0.1); padding-top: 15px; margin-bottom: 20px; font-size: 12px; color: var(--color-text-muted-dark);">
                            <div><strong>System:</strong> Tilt & Turn 80 Series Windows</div>
                            <div><strong>Glazing:</strong> Low-E Argon Triple Pane (U = 0.9)</div>
                            <div><strong>Eco Rating:</strong> Certified Passive House Compatible</div>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <a href="case-detail.html?id=australia-passive" class="btn-outline"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; text-decoration: none; border-radius: 4px;">
                                View Specs <i class="fas fa-search-plus" style="margin-left: 6px;"></i>
                            </a>
                            <button class="btn-primary open-quote-modal"
                                style="flex: 1; padding: 12px; font-size: 11px; justify-content: center; border-radius: 4px;">
                                Inquire Spec
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
