@extends('frontend.layouts.app')
@section('title', 'Home – EBON')
@section('frontend.content')
    <!-- ========================================================================
                       2. HERO SLIDER SECTION
                       ======================================================================== -->
    <section class="hero-slider-section">
        <div class="slider-wrapper">
            <!-- Slide 1: Generated Image -->
            <div class="slide active">
                <div class="slide-bg" style="background-image: url('{{ asset('frontend/assets/hero_villa.png') }}');">
                </div>
                <div class="container">
                    <div class="slide-content">
                        <span class="slide-tag">Innovation Glazing</span>
                        <h1 class="slide-title">Exploring Beauty,<br>Offering Novelty</h1>
                        <p class="slide-desc">Providing premium high-performance insulating doors and windows for global
                            modern architecture. Engineered with precision, designed for longevity.</p>
                        <div class="slide-actions">
                            <button class="btn-primary open-quote-modal">Request Consultation</button>
                            <a href="products.html" class="btn-outline">Explore Catalog</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Insulated Systems -->
            <div class="slide">
                <div class="slide-bg" style="background-image: url('{{ asset('frontend/assets/hero_insulated.jpg') }}');">
                </div>
                <div class="container">
                    <div class="slide-content">
                        <span class="slide-tag">Thermal Efficiency</span>
                        <h1 class="slide-title">Ultra Insulated<br>3i-LOW-E Glass</h1>
                        <p class="slide-desc">Our CE-certified double and triple glazing systems block 97% of UV rays,
                            maintaining ambient room temperature 10°C cooler in summer.</p>
                        <div class="slide-actions">
                            <button class="btn-primary open-quote-modal">Get Quote</button>
                            <a href="about.html" class="btn-outline">Technical Specs</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Global Projects -->
            <div class="slide">
                <div class="slide-bg"
                    style="background-image: url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1920&q=80');">
                </div>
                <div class="container">
                    <div class="slide-content">
                        <span class="slide-tag">International Standards</span>
                        <h1 class="slide-title">Architectural Glass<br>Project Portfolio</h1>
                        <p class="slide-desc">From luxury villas in the Philippines to 5-star hotels in Thailand, EBON
                            delivers structural integrity and premium aesthetic solutions.</p>
                        <div class="slide-actions">
                            <a href="cases.html" class="btn-primary">View Case Studies</a>
                            <button class="btn-outline open-quote-modal">Partner With Us</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <button class="slider-control slider-prev" aria-label="Previous Slide"><i class="fas fa-chevron-left"></i></button>
        <button class="slider-control slider-next" aria-label="Next Slide"><i class="fas fa-chevron-right"></i></button>

        <!-- Slider Dots -->
        <div class="slider-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </section>

    <!-- ========================================================================
                       3. METRICS / STATS CARD GRID
                       ======================================================================== -->
    <section class="metrics-section">
        <div class="container">
            <div class="metrics-header reveal-el">
                <h3>Ebon Tongtai - Engineering Absolute Quality</h3>
            </div>

            <div class="metrics-grid">
                <!-- Stat 1 -->
                <div class="metric-card reveal-el delay-100">
                    <div class="metric-icon-wrap">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="metric-number">20+</div>
                    <div class="metric-title">Years of Commitment</div>
                    <p class="metric-desc">Deeply committed to manufacturing high-performance system windows and doors
                        since 2004.</p>
                </div>
                <!-- Stat 2 -->
                <div class="metric-card reveal-el delay-200">
                    <div class="metric-icon-wrap">
                        <i class="fas fa-industry"></i>
                    </div>
                    <div class="metric-number">100k ㎡</div>
                    <div class="metric-title">Smart Bases</div>
                    <p class="metric-desc">Four highly integrated modern intelligent manufacturing bases supporting
                        global supply chains.</p>
                </div>
                <!-- Stat 3 -->
                <div class="metric-card reveal-el delay-300">
                    <div class="metric-icon-wrap">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="metric-number">200+</div>
                    <div class="metric-title">Patent Credentials</div>
                    <p class="metric-desc">Advanced patents covering thermal-break frames, multi-lock safety
                        mechanisms, and air tightness.</p>
                </div>
                <!-- Stat 4 -->
                <div class="metric-card reveal-el delay-300">
                    <div class="metric-icon-wrap">
                        <i class="fas fa-wind"></i>
                    </div>
                    <div class="metric-number">≥97%</div>
                    <div class="metric-title">UV Shield Blocking</div>
                    <p class="metric-desc">Advanced 3i-Low-E glass structures blocking over 97% of UV rays for supreme
                        insulation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
                       4. COMPANY SHOWCASE / VIDEO INTRO
                       ======================================================================== -->
    <section class="intro-section">
        <div class="container">
            <div class="intro-media reveal-el">
                <img src="https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=800&q=80"
                    alt="Ebon Advanced Factory and Profiles">
                <button class="video-play-btn" aria-label="Play Corporate Video">
                    <i class="fas fa-play"></i>
                </button>
            </div>

            <div class="intro-text reveal-el">
                <span class="section-subtitle">Corporate Overview</span>
                <h2 class="section-title">Ebon Tongtai Windows & Doors</h2>
                <p>Founded in 2004 and headquartered in Foshan, Guangdong—the premium aluminum capital of China—EBON has
                    consistently driven product innovation in architectural glass. Specializing in R&D, structural
                    design, customized fabrication, and international logistics delivery of mid-to-high-end thermal
                    break products.</p>

                <div class="intro-bullets">
                    <div class="bullet-item">
                        <i class="fas fa-check-circle bullet-icon"></i>
                        <div>
                            <h4 class="bullet-title">SGS & CE Certification</h4>
                            <p class="bullet-desc">Complying with stringent international B2B quality standards.</p>
                        </div>
                    </div>
                    <div class="bullet-item">
                        <i class="fas fa-check-circle bullet-icon"></i>
                        <div>
                            <h4 class="bullet-title">Thermal-Break Tech</h4>
                            <p class="bullet-desc">Saves up to 35% in building HVAC electricity consumption.</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('frontend.about.index') }}" class="btn-primary">Learn More About Ebon</a>
            </div>
        </div>
    </section>

    <!-- ========================================================================
                       5. PRODUCT SELECTION GRID
                       ======================================================================== -->
    <section class="products-section">
        <div class="container">
            <div class="section-title-wrap reveal-el">
                <span class="section-subtitle">Our Portfolios</span>
                <h2 class="section-title">Main Product Systems</h2>
            </div>

            <div class="products-grid">
                <!-- Cat 1 -->
                <div class="product-cat-card reveal-el delay-100">
                    <div class="cat-card-bg"
                        style="background-image: url('https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="cat-card-content">
                        <h3 class="cat-card-title">Casement Doors</h3>
                        <p class="cat-card-desc">High-strength heavy duty aluminum swing and sliding door profiles with
                            seamless double weather seals.</p>
                        <a href="{{ route('frontend.products.index') }}?cat=doors" class="cat-card-btn">View Models <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <!-- Cat 2 -->
                <div class="product-cat-card reveal-el delay-200">
                    <div class="cat-card-bg"
                        style="background-image: url('https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="cat-card-content">
                        <h3 class="cat-card-title">Insulated Windows</h3>
                        <p class="cat-card-desc">Outward/Inward opening and sliding windows incorporating robust nylon
                            insulation strips.</p>
                        <a href="{{ route('frontend.products.index') }}?cat=windows" class="cat-card-btn">View Models <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <!-- Cat 3 -->
                <div class="product-cat-card reveal-el delay-300">
                    <div class="cat-card-bg"
                        style="background-image: url('https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="cat-card-content">
                        <h3 class="cat-card-title">Architectural Glass</h3>
                        <p class="cat-card-desc">Slick modern structural glazing, curtain walls, and custom panoramic
                            structural systems.</p>
                        <a href="{{ route('frontend.products.index') }}?cat=glazing" class="cat-card-btn">View Models <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
                       6. INTERNATIONAL PROJECTS MASONRY
                       ======================================================================== -->
    <section class="portfolio-section">
        <div class="container">
            <div class="section-title-wrap reveal-el">
                <span class="section-subtitle">Case Studies</span>
                <h2 class="section-title">International Project Portfolio</h2>
            </div>

            <div class="portfolio-grid">
                <!-- Case 1 -->
                <div class="portfolio-card reveal-el delay-100">
                    <div class="portfolio-media">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=600&q=80"
                            alt="Philippines Luxury Villa Project">
                        <div class="portfolio-hover-overlay">
                            <a href="{{ route('frontend.cases.show', ['id' => 'philippines-villa']) }}"
                                class="portfolio-link-btn"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-details">
                        <span class="portfolio-cat">Residential Villa</span>
                        <h3 class="portfolio-title"><a
                                href="{{ route('frontend.cases.show', ['id' => 'philippines-villa']) }}"
                                style="color: inherit; text-decoration: none; transition: var(--transition-fast);">Philippines
                                - Luxury Ocean Villa</a></h3>
                    </div>
                </div>
                <!-- Case 2 -->
                <div class="portfolio-card reveal-el delay-200">
                    <div class="portfolio-media">
                        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=600&q=80"
                            alt="Thailand Commercial Resort Project">
                        <div class="portfolio-hover-overlay">
                            <a href="{{ route('frontend.cases.show', ['id' => 'thailand-pavilion']) }}"
                                class="portfolio-link-btn"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-details">
                        <span class="portfolio-cat">Hospitality</span>
                        <h3 class="portfolio-title"><a
                                href="{{ route('frontend.cases.show', ['id' => 'thailand-pavilion']) }}"
                                style="color: inherit; text-decoration: none; transition: var(--transition-fast);">Thailand
                                - Five-Star Resort Pavilion</a></h3>
                    </div>
                </div>
                <!-- Case 3 -->
                <div class="portfolio-card reveal-el delay-300">
                    <div class="portfolio-media">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=600&q=80"
                            alt="West Africa Corporate Glazing Project">
                        <div class="portfolio-hover-overlay">
                            <a href="{{ route('frontend.cases.show', ['id' => 'west-africa']) }}"
                                class="portfolio-link-btn"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-details">
                        <span class="portfolio-cat">Corporate Building</span>
                        <h3 class="portfolio-title"><a href="{{ route('frontend.cases.show', ['id' => 'west-africa']) }}"
                                style="color: inherit; text-decoration: none; transition: var(--transition-fast);">West
                                Africa - High-end Residential Glazing</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
                       7. LATEST NEWS FEED
                       ======================================================================== -->
    <section class="news-section">
        <div class="container">
            <div class="section-title-wrap reveal-el">
                <span class="section-subtitle">Updates</span>
                <h2 class="section-title">The Latest News</h2>
            </div>

            <div class="news-grid">
                <!-- Left Main Card -->
                <div class="news-featured-card reveal-el">
                    <div class="news-media">
                        <a href="{{ route('frontend.news.show', ['id' => 'quality-brand-2025']) }}"
                            style="display: block; width: 100%; height: 100%;">
                            <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=800&q=80"
                                alt="Award Ceremony Image" style="width: 100%; height: 100%; object-fit: cover;">
                        </a>
                    </div>
                    <div class="news-content">
                        <span class="news-date">Oct, 21, 2025</span>
                        <h3 class="news-title"><a
                                href="{{ route('frontend.news.show', ['id' => 'quality-brand-2025']) }}">Ebon Tongtai Wins
                                "2025 Home Consumer Reputation List – Quality Benchmark Brand"</a></h3>
                        <p class="news-excerpt">Recognized by major building and home organizations in Foshan for
                            outstanding commitment to green architectural standards and insulated manufacturing safety.
                        </p>
                        <a href="{{ route('frontend.news.show', ['id' => 'quality-brand-2025']) }}" class="btn-outline"
                            style="align-self: flex-start; padding: 10px 20px; font-size: 12px; text-decoration: none;">Read
                            Article</a>
                    </div>
                </div>

                <!-- Right column list -->
                <div class="news-list">
                    <!-- Item 1 -->
                    <div class="news-item-horizontal reveal-el delay-100">
                        <div class="news-h-media">
                            <a href="{{ route('frontend.news.show', ['id' => 'lowe-insulation-king']) }}"
                                style="display: block; width: 100%; height: 100%;">
                                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=300&q=80"
                                    alt="Low-E Glass Performance Illustration"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                        </div>
                        <div class="news-h-content">
                            <span class="news-date">Sep, 12, 2025</span>
                            <h4 class="news-h-title"><a
                                    href="{{ route('frontend.news.show', ['id' => 'lowe-insulation-king']) }}">The King of
                                    Thermal Insulation Performance: 3i-Low-E Glass Systems</a></h4>
                            <a href="{{ route('frontend.news.show', ['id' => 'lowe-insulation-king']) }}"
                                style="color: var(--color-gold); font-size: 13px; font-weight:600; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">Read
                                More <i class="fas fa-chevron-right" style="font-size:10px;"></i></a>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="news-item-horizontal reveal-el delay-200">
                        <div class="news-h-media">
                            <a href="{{ route('frontend.news.show', ['id' => 'top-10-brands']) }}"
                                style="display: block; width: 100%; height: 100%;">
                                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=300&q=80"
                                    alt="Corporate Showroom Showcase"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                        </div>
                        <div class="news-h-content">
                            <span class="news-date">Aug, 25, 2025</span>
                            <h4 class="news-h-title"><a
                                    href="{{ route('frontend.news.show', ['id' => 'top-10-brands']) }}">Ebon Tongtai
                                    Re-elected as Top 10 Influential Brands of Aluminum Alloy Systems</a></h4>
                            <a href="{{ route('frontend.news.show', ['id' => 'top-10-brands']) }}"
                                style="color: var(--color-gold); font-size: 13px; font-weight:600; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">Read
                                More <i class="fas fa-chevron-right" style="font-size:10px;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
