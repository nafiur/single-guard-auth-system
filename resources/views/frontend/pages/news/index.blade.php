@extends('frontend.layouts.app')
@section('title', 'News | EBON Premium Aluminum Doors & Windows')
@section('frontend.content')

    <!-- ========================================================================
               2. SUBPAGE HERO BANNER
               ======================================================================== -->
    <section class="subpage-hero-banner"
        style="background: linear-gradient(135deg, var(--color-navy-dark), var(--color-navy-mid)); border-bottom: 2px solid var(--color-gold); padding: 150px 0 80px; position: relative; overflow: hidden; text-align: center;">
        <div
            style="position: absolute; top:0; left:0; width:100%; height:100%; opacity:0.1; background-image: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;">
        </div>
        <div class="container" style="position: relative; z-index: 2;">
            <span class="section-subtitle" style="margin-bottom: 8px;">Newsroom</span>
            <h1 style="color: #ffffff; font-size: 42px; text-transform: uppercase; font-family: var(--font-headers);">Ebon
                Industry News</h1>
            <p style="color: var(--color-text-muted-light); max-width: 600px; margin: 15px auto 0; font-size: 15px;">Discover
                technical updates, sustainable glazing innovations, and Ebon's recent international achievements.</p>
        </div>
    </section>

    <!-- ========================================================================
               3. NEWS GRID & ARTICLES LIST
               ======================================================================== -->
    <section class="news-list-section" style="padding: 100px 0; background-color: #ffffff;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">

                <!-- Article 1 -->
                <div class="news-featured-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--box-shadow-premium); display: flex; flex-direction: column; height: 100%;">
                    <div style="height: 220px; overflow: hidden; position: relative;">
                        <a href="news-detail.html?id=quality-brand-2025" style="display: block; width: 100%; height: 100%;">
                            <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=800&q=80"
                                alt="Ebon Reputation Benchmark Award"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow);">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-gold); color: var(--color-navy-dark); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px;">Corporate
                            Award</span>
                    </div>
                    <div style="padding: 30px; display: flex; flex-direction: column; flex-grow: 1;">
                        <span
                            style="font-size: 12px; color: var(--color-text-muted-dark); font-weight: 500; margin-bottom: 12px; display: block;">Oct
                            21, 2025</span>
                        <h3 style="font-size: 18px; margin-bottom: 12px; line-height: 1.4;"><a
                                href="news-detail.html?id=quality-brand-2025"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">Ebon
                                Tongtai Wins Home Consumer Reputation benchmark award</a></h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Recognized by major building and home organizations in Foshan for outstanding commitment to
                            green architectural standards and insulated manufacturing safety.</p>
                        <a href="news-detail.html?id=quality-brand-2025"
                            style="color: var(--color-gold); font-size: 13px; font-weight: 600; margin-top: auto; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; transition: var(--transition-fast);">Read
                            Full Article <i class="fas fa-chevron-right" style="font-size: 10px;"></i></a>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="news-featured-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--box-shadow-premium); display: flex; flex-direction: column; height: 100%;">
                    <div style="height: 220px; overflow: hidden; position: relative;">
                        <a href="news-detail.html?id=lowe-insulation-king"
                            style="display: block; width: 100%; height: 100%;">
                            <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80"
                                alt="3i-Low-E Glazing Systems"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow);">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-gold); color: var(--color-navy-dark); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px;">Glazing
                            Science</span>
                    </div>
                    <div style="padding: 30px; display: flex; flex-direction: column; flex-grow: 1;">
                        <span
                            style="font-size: 12px; color: var(--color-text-muted-dark); font-weight: 500; margin-bottom: 12px; display: block;">Sep
                            12, 2025</span>
                        <h3 style="font-size: 18px; margin-bottom: 12px; line-height: 1.4;"><a
                                href="news-detail.html?id=lowe-insulation-king"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">The
                                King of Thermal Insulation Performance: 3i-Low-E Glass Systems</a></h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            A comprehensive whitepaper breaking down how our multi-pane architectural glazing systems retain
                            heat in winter and isolate high temperature solar beams in tropical summers.</p>
                        <a href="news-detail.html?id=lowe-insulation-king"
                            style="color: var(--color-gold); font-size: 13px; font-weight: 600; margin-top: auto; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; transition: var(--transition-fast);">Read
                            Full Article <i class="fas fa-chevron-right" style="font-size: 10px;"></i></a>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="news-featured-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--box-shadow-premium); display: flex; flex-direction: column; height: 100%;">
                    <div style="height: 220px; overflow: hidden; position: relative;">
                        <a href="news-detail.html?id=top-10-brands" style="display: block; width: 100%; height: 100%;">
                            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80"
                                alt="Top 10 Influential Brands"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow);">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-gold); color: var(--color-navy-dark); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px;">Brand
                            Recognition</span>
                    </div>
                    <div style="padding: 30px; display: flex; flex-direction: column; flex-grow: 1;">
                        <span
                            style="font-size: 12px; color: var(--color-text-muted-dark); font-weight: 500; margin-bottom: 12px; display: block;">Aug
                            25, 2025</span>
                        <h3 style="font-size: 18px; margin-bottom: 12px; line-height: 1.4;"><a
                                href="news-detail.html?id=top-10-brands"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">Ebon
                                Tongtai Re-elected as Top 10 Influential Brands of Aluminum Alloy Systems</a></h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            EBON maintains its position in the premium ranks of China's aluminum system industry, recognized
                            for our innovative double weather-seal patents.</p>
                        <a href="news-detail.html?id=top-10-brands"
                            style="color: var(--color-gold); font-size: 13px; font-weight: 600; margin-top: auto; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; transition: var(--transition-fast);">Read
                            Full Article <i class="fas fa-chevron-right" style="font-size: 10px;"></i></a>
                    </div>
                </div>

                <!-- Article 4 -->
                <div class="news-featured-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--box-shadow-premium); display: flex; flex-direction: column; height: 100%;">
                    <div style="height: 220px; overflow: hidden; position: relative;">
                        <a href="news-detail.html?id=nylon-integrity" style="display: block; width: 100%; height: 100%;">
                            <img src="https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=800&q=80"
                                alt="Nylon PA66 strips"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow);">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-gold); color: var(--color-navy-dark); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px;">Material
                            R&D</span>
                    </div>
                    <div style="padding: 30px; display: flex; flex-direction: column; flex-grow: 1;">
                        <span
                            style="font-size: 12px; color: var(--color-text-muted-dark); font-weight: 500; margin-bottom: 12px; display: block;">Jul
                            04, 2025</span>
                        <h3 style="font-size: 18px; margin-bottom: 12px; line-height: 1.4;"><a
                                href="news-detail.html?id=nylon-integrity"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">Advanced
                                PA66 Nylon Insulation Strips: Material Integrity</a></h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Why EBON exclusively utilizes high-grade German import-grade polyamide strips reinforced with
                            glass fiber (PA66GF25) for extreme thermal barrier security.</p>
                        <a href="news-detail.html?id=nylon-integrity"
                            style="color: var(--color-gold); font-size: 13px; font-weight: 600; margin-top: auto; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; transition: var(--transition-fast);">Read
                            Full Article <i class="fas fa-chevron-right" style="font-size: 10px;"></i></a>
                    </div>
                </div>

                <!-- Article 5 -->
                <div class="news-featured-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--box-shadow-premium); display: flex; flex-direction: column; height: 100%;">
                    <div style="height: 220px; overflow: hidden; position: relative;">
                        <a href="news-detail.html?id=wind-resistance" style="display: block; width: 100%; height: 100%;">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80"
                                alt="Wind load engineering"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow);">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-gold); color: var(--color-navy-dark); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px;">Structural
                            Engineering</span>
                    </div>
                    <div style="padding: 30px; display: flex; flex-direction: column; flex-grow: 1;">
                        <span
                            style="font-size: 12px; color: var(--color-text-muted-dark); font-weight: 500; margin-bottom: 12px; display: block;">Jun
                            18, 2025</span>
                        <h3 style="font-size: 18px; margin-bottom: 12px; line-height: 1.4;"><a
                                href="news-detail.html?id=wind-resistance"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">Custom
                                Heavy-Duty Sliding Assemblies for Wind Load Resistance</a></h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            Detailed analysis of Ebon's multi-point locking hardware setups and structural wind resistance
                            calculations, engineered for high-altitude coastal skyscrapers.</p>
                        <a href="news-detail.html?id=wind-resistance"
                            style="color: var(--color-gold); font-size: 13px; font-weight: 600; margin-top: auto; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; transition: var(--transition-fast);">Read
                            Full Article <i class="fas fa-chevron-right" style="font-size: 10px;"></i></a>
                    </div>
                </div>

                <!-- Article 6 -->
                <div class="news-featured-card reveal-el"
                    style="background-color: var(--color-bg-light); border: 1px solid rgba(7, 22, 44, 0.05); border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--box-shadow-premium); display: flex; flex-direction: column; height: 100%;">
                    <div style="height: 220px; overflow: hidden; position: relative;">
                        <a href="news-detail.html?id=carbon-neutral" style="display: block; width: 100%; height: 100%;">
                            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80"
                                alt="Green manufacturing bases"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow);">
                        </a>
                        <span
                            style="position: absolute; top: 15px; left: 15px; background: var(--color-gold); color: var(--color-navy-dark); font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 10px; border-radius: 20px;">Eco
                            Standards</span>
                    </div>
                    <div style="padding: 30px; display: flex; flex-direction: column; flex-grow: 1;">
                        <span
                            style="font-size: 12px; color: var(--color-text-muted-dark); font-weight: 500; margin-bottom: 12px; display: block;">May
                            30, 2025</span>
                        <h3 style="font-size: 18px; margin-bottom: 12px; line-height: 1.4;"><a
                                href="news-detail.html?id=carbon-neutral"
                                style="color: var(--color-navy-dark); text-decoration: none; transition: var(--transition-fast);">EBON
                                commits to Carbon-Neutral smart manufacturing</a></h3>
                        <p
                            style="font-size: 13px; color: var(--color-text-muted-dark); line-height: 1.6; margin-bottom: 20px;">
                            EBON launches rooftop solar cells across our Foshan bases to cut electrical overheads and supply
                            low carbon systems for global builders.</p>
                        <a href="news-detail.html?id=carbon-neutral"
                            style="color: var(--color-gold); font-size: 13px; font-weight: 600; margin-top: auto; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; transition: var(--transition-fast);">Read
                            Full Article <i class="fas fa-chevron-right" style="font-size: 10px;"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
