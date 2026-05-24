/* 
========================================================================
   EBON WINDOW - CLIENT INTERACTION MOTOR (VANILLA JS)
========================================================================
*/

document.addEventListener('DOMContentLoaded', () => {
    
    // ==========================================
    // 1. STICKY HEADER & NAV ACTIVE STATES
    // ==========================================
    const header = document.querySelector('.site-header');
    
    const handleScroll = () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    };
    
    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Trigger on load in case page is already scrolled

    // Mobile Navbar Drawer Toggle
    const mobileMenuBtn = document.querySelector('.btn-mobile-menu');
    const navMenu = document.querySelector('.nav-menu');
    
    mobileMenuBtn.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        const icon = mobileMenuBtn.querySelector('i');
        if (navMenu.classList.contains('active')) {
            icon.className = 'fas fa-times';
        } else {
            icon.className = 'fas fa-bars';
        }
    });

    // Mobile Dropdown expansion
    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
        const link = item.querySelector('.nav-link');
        const dropdown = item.querySelector('.dropdown-menu');
        
        if (dropdown) {
            link.addEventListener('click', (e) => {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    item.classList.toggle('active');
                }
            });
        }
    });

    // ==========================================
    // 2. HERO CAROUSEL / SLIDER MOTOR
    // ==========================================
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.slider-prev');
    const nextBtn = document.querySelector('.slider-next');
    let currentSlide = 0;
    let slideInterval;
    const intervalTime = 6000; // 6 seconds

    const showSlide = (index) => {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        currentSlide = index;
    };

    const nextSlide = () => {
        let nextIndex = currentSlide + 1;
        if (nextIndex >= slides.length) {
            nextIndex = 0;
        }
        showSlide(nextIndex);
    };

    const prevSlide = () => {
        let prevIndex = currentSlide - 1;
        if (prevIndex < 0) {
            prevIndex = slides.length - 1;
        }
        showSlide(prevIndex);
    };

    // Auto Rotation Controller
    const startSlideShow = () => {
        slideInterval = setInterval(nextSlide, intervalTime);
    };

    const resetSlideShow = () => {
        clearInterval(slideInterval);
        startSlideShow();
    };

    // Controls listeners
    if (nextBtn && prevBtn) {
        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetSlideShow();
        });

        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetSlideShow();
        });
    }

    // Dots listeners
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            resetSlideShow();
        });
    });

    // Initialize slider if slides exist
    if (slides.length > 0) {
        startSlideShow();
    }

    // ==========================================
    // 3. INTERACTIVE QUOTE MODAL POPUP
    // ==========================================
    const quoteModal = document.getElementById('quoteModal');
    const openModalBtns = document.querySelectorAll('.open-quote-modal');
    const closeModalBtn = document.querySelector('.close-modal-btn');
    const inquiryForm = document.getElementById('inquiryForm');

    const openModal = () => {
        quoteModal.classList.add('active');
        document.body.style.overflow = 'hidden'; // Lock background scrolling
    };

    const closeModal = () => {
        quoteModal.classList.remove('active');
        document.body.style.overflow = '';
    };

    openModalBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            openModal();
        });
    });

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closeModal);
    }

    // Close when clicking outside of the card
    window.addEventListener('click', (e) => {
        if (e.target === quoteModal) {
            closeModal();
        }
    });

    // Handle quote submission
    if (inquiryForm) {
        inquiryForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Gather values
            const name = document.getElementById('inquiryName').value;
            const email = document.getElementById('inquiryEmail').value;
            const message = document.getElementById('inquiryMessage').value;
            
            if (name && email && message) {
                // Visual feedback
                const submitBtn = inquiryForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
                
                setTimeout(() => {
                    submitBtn.innerHTML = '<i class="fas fa-check"></i> Submitted Successfully!';
                    submitBtn.style.background = '#4caf50';
                    submitBtn.style.borderColor = '#4caf50';
                    
                    setTimeout(() => {
                        // Reset Form
                        inquiryForm.reset();
                        closeModal();
                        
                        // Restore button
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                        submitBtn.style.background = '';
                        submitBtn.style.borderColor = '';
                    }, 1500);
                }, 1200);
            }
        });
    }

    // ==========================================
    // 4. INTERSECTION OBSERVER FOR SCROLL REVEALS
    // ==========================================
    const revealElements = document.querySelectorAll('.reveal-el');
    
    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target); // Reveal only once
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        });
        
        revealElements.forEach(el => revealObserver.observe(el));
    } else {
        // Fallback for older browsers
        revealElements.forEach(el => el.classList.add('revealed'));
    }

    // ==========================================
    // 5. ACCESSIBILITY / EXTRA DECORATIONS
    // ==========================================
    // Add subtle shadow transition to header search trigger
    const searchTrigger = document.querySelector('.floating-btn i.fa-search');
    if (searchTrigger) {
        searchTrigger.parentElement.addEventListener('click', () => {
            alert('Global B2B catalog search index loaded! Try searching in the main website.');
        });
    }

    // ==========================================
    // 6. DYNAMIC CATALOG TAB FILTER MOTOR
    // ==========================================
    const filterButtons = document.querySelectorAll('.filter-tab-btn');
    const productCards = document.querySelectorAll('.product-item-card');

    if (filterButtons.length > 0) {
        const filterProducts = (filterValue) => {
            // Update buttons active class
            filterButtons.forEach(btn => {
                if (btn.getAttribute('data-filter') === filterValue) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });

            // Filter cards
            productCards.forEach(card => {
                const category = card.getAttribute('data-category');
                if (filterValue === 'all' || category === filterValue) {
                    card.style.display = '';
                    // Re-trigger scroll reveal entry transition if card supports it
                    setTimeout(() => {
                        card.classList.add('revealed');
                    }, 50);
                } else {
                    card.style.display = 'none';
                }
            });
        };

        // Attach click listeners to filter tabs
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const filterValue = btn.getAttribute('data-filter');
                filterProducts(filterValue);
            });
        });

        // Read URL query parameter "?cat=" to auto-filter on load
        const urlParams = new URLSearchParams(window.location.search);
        const categoryParam = urlParams.get('cat');
        
        if (categoryParam) {
            // Standardizing mapping just in case parameter naming deviates
            let mappedFilter = categoryParam;
            if (categoryParam === 'thermal') mappedFilter = 'windows'; // Map thermal systems to windows or catalog standard
            
            // Check if a tab exists for the parameter
            const targetTab = document.querySelector(`.filter-tab-btn[data-filter="${mappedFilter}"]`);
            if (targetTab) {
                filterProducts(mappedFilter);
            }
        }
    }

    // ==========================================
    // 7. CONTACT PAGE LEAD INTAKE MOTOR
    // ==========================================
    const contactForm = document.getElementById('contactInquiryForm');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Premium Submission Visual Feedback
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing CAD Request...';
            
            setTimeout(() => {
                submitBtn.innerHTML = '<i class="fas fa-check"></i> Project Request Submitted!';
                submitBtn.style.background = '#4caf50';
                submitBtn.style.borderColor = '#4caf50';
                
                // Show notification overlay alert
                const alertBanner = document.createElement('div');
                alertBanner.style.position = 'fixed';
                alertBanner.style.top = '100px';
                alertBanner.style.right = '30px';
                alertBanner.style.background = 'var(--color-navy-dark)';
                alertBanner.style.border = '2px solid var(--color-gold)';
                alertBanner.style.color = '#ffffff';
                alertBanner.style.padding = '20px 30px';
                alertBanner.style.borderRadius = '8px';
                alertBanner.style.boxShadow = '0 15px 30px rgba(0,0,0,0.3)';
                alertBanner.style.zIndex = '9999';
                alertBanner.style.fontFamily = 'var(--font-headers)';
                alertBanner.style.transition = 'all 0.5s ease';
                alertBanner.innerHTML = `
                    <h5 style="color: var(--color-gold); font-size:14px; margin-bottom:5px;"><i class="fas fa-envelope-open-text"></i> System Connected</h5>
                    <p style="font-size:12px; margin:0;">Guangdong Ebon database captured lead. Technical engineers will follow up within 1 business day.</p>
                `;
                document.body.appendChild(alertBanner);
                
                setTimeout(() => {
                    alertBanner.style.opacity = '0';
                    alertBanner.style.transform = 'translateY(-20px)';
                    setTimeout(() => alertBanner.remove(), 500);
                }, 4000);
                
                setTimeout(() => {
                    // Reset Form
                    contactForm.reset();
                    
                    // Restore button
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                    submitBtn.style.background = '';
                    submitBtn.style.borderColor = '';
                }, 1500);
            }, 1500);
        });
    }

    // ==========================================
    // 8. DYNAMIC PRODUCT DETAIL LOADER
    // ==========================================
    const detailTitle = document.getElementById('detailTitle');
    if (detailTitle) {
        // Products Database
        const productsDb = {
            'folding-door': {
                title: 'Premium Double Folding Door (Elite-120 Series)',
                badge: 'Heavy Swing',
                breadcrumb: 'Premium Double Folding Door',
                description: 'Advanced heavy-duty aluminum folding door system built with an ultra-slim perimeter frame and premium German GU multi-fold hardware assemblies. Offering smooth sliding operations, exceptional thermal isolation, and robust wind sealing, it is engineered to integrate grand interior halls with premium exterior spaces.',
                profile: '6063-T5 Thermal-Break Alloy (2.0-3.0mm profiles)',
                glazing: '6mm + 12Ar + 6mm Double Pane Tempered Low-E',
                uvalue: '≤ 1.4 W/m²K',
                wind: 'Class 8 (Typhoon Resistant)',
                cert: 'CE / SGS / AS2047 Standard',
                image: 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80',
                thumb: 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=200&q=80',
                video: 'https://assets.mixkit.co/videos/preview/mixkit-architectural-drone-shot-of-a-modern-residential-house-41551-large.mp4'
            },
            'casement-window': {
                title: 'EBON Series-80 Casement System',
                badge: 'Thermal break',
                breadcrumb: 'Outward Casement Window',
                description: 'Advanced thermal break outward-opening casement window incorporating co-molded nylon polyamide heat barriers (PA66GF25) and concealed heavy-duty hinge tracks. It is engineered with triple-pane insulated gas cavities for maximum environmental shielding and decibel cancellation properties in premium developments.',
                profile: '6063-T5 Alloy (1.8mm sash profile)',
                glazing: '5mm + 9Ar + 5mm + 9Ar + 5mm Triple-Pane 3i-Low-E',
                uvalue: '≤ 1.2 W/m²K',
                wind: 'Class 8 (Extreme Sealing)',
                cert: 'CE / SGS / ISO 9001',
                image: 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=800&q=80',
                thumb: 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=200&q=80',
                video: 'https://assets.mixkit.co/videos/preview/mixkit-modern-apartment-building-facade-44326-large.mp4'
            },
            'glass-wall': {
                title: 'Vista-150 Facade Glazing System',
                badge: 'Facade Glazing',
                breadcrumb: 'Structural Glass Wall',
                description: 'Panoramic floor-to-ceiling curtain wall framing profile offering seamless architectural integration. Features robust structural mullions co-extruded with triple insulated laminated safety glass panels. Coated with Dow Corning structural silicon sealants to deliver unmatched wind resistance and architectural visual brilliance.',
                profile: 'Structural Aluminum Alloy 6061-T6 (2.5-3.0mm thickness)',
                glazing: '8mm Tempered + 1.52PVB + 8mm + 12Ar + 8mm Low-E Laminate',
                uvalue: '≤ 1.1 W/m²K',
                wind: 'Class 9 (Hurricane & High-Rise Grade)',
                cert: 'CE / AAMA / ASTM Certified',
                image: 'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=800&q=80',
                thumb: 'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=200&q=80',
                video: 'https://assets.mixkit.co/videos/preview/mixkit-skyscrapers-and-modern-office-buildings-42646-large.mp4'
            }
        };

        // Extract ID parameter
        const urlParams = new URLSearchParams(window.location.search);
        let prodId = urlParams.get('id');

        // Fallback if ID is invalid or not in database
        if (!prodId || !productsDb[prodId]) {
            prodId = 'casement-window'; // default product
        }

        const product = productsDb[prodId];

        // Populate details
        detailTitle.textContent = product.title;
        document.getElementById('detailDesc').textContent = product.description;
        document.getElementById('detailBadge').textContent = product.badge;
        document.getElementById('detailBreadcrumb').textContent = product.breadcrumb;
        
        document.getElementById('specProfile').textContent = product.profile;
        document.getElementById('specGlazing').textContent = product.glazing;
        document.getElementById('specUvalue').textContent = product.uvalue;
        document.getElementById('specWind').textContent = product.wind;
        document.getElementById('specCert').textContent = product.cert;

        const mainImg = document.getElementById('detailMainImg');
        const thumbImg = document.getElementById('detailThumb1');
        
        if (mainImg) mainImg.src = product.image;
        if (thumbImg) thumbImg.src = product.thumb;

        // Interactive Video Swapper
        const videoPlayerContainer = document.getElementById('videoPlayerContainer');
        const detailVideo = document.getElementById('detailVideo');
        const videoThumbBtn = document.getElementById('videoThumbBtn');

        if (thumbImg && videoPlayerContainer && mainImg && detailVideo) {
            // Restore Image View
            thumbImg.parentElement.addEventListener('click', () => {
                detailVideo.pause();
                videoPlayerContainer.style.display = 'none';
                mainImg.style.display = 'block';
                thumbImg.parentElement.style.borderColor = 'var(--color-gold)';
                thumbImg.parentElement.style.opacity = '1';
                if (videoThumbBtn) {
                    videoThumbBtn.style.borderColor = 'rgba(7,22,44,0.1)';
                    videoThumbBtn.style.opacity = '0.7';
                }
            });
        }

        if (videoThumbBtn && videoPlayerContainer && mainImg && detailVideo) {
            // Trigger Video View
            videoThumbBtn.addEventListener('click', () => {
                mainImg.style.display = 'none';
                videoPlayerContainer.style.display = 'block';
                detailVideo.src = product.video;
                detailVideo.play().catch(err => console.log('Auto-play blocked:', err));
                videoThumbBtn.style.borderColor = 'var(--color-gold)';
                videoThumbBtn.style.opacity = '1';
                if (thumbImg) {
                    thumbImg.parentElement.style.borderColor = 'rgba(7,22,44,0.1)';
                    thumbImg.parentElement.style.opacity = '0.7';
                }
            });
        }
    }

    // ==========================================
    // 9. DYNAMIC CASE DETAIL LOADER
    // ==========================================
    const casesDb = {
        'philippines-villa': {
            title: 'Luxury Ocean Villa',
            subtitle: 'Oceanic Residence',
            country: 'Philippines',
            system: '120 Series Heavy Slide',
            glazing: '8mm + 12Ar + 8mm Double Tempered Low-E',
            wind: 'Class 8 (Extreme Typhoon Resistant)',
            client: 'Private Luxury Estate',
            volume: '850 Square Meters',
            year: '2024',
            description: 'Designed specifically to withstand severe coastal typhoons in the Pacific. The Oceanic Residence is equipped with heavy-duty structural frames and triple-sealed interlocking doors, delivering unparalleled structural safety without compromising panoramic views of the ocean.',
            concept: 'The primary challenge was balancing maximum visual clarity with extreme wind force security. Ebon engineered a customized reinforced core profile for the Elite-120 system, incorporating vertical reinforcing steel mullions inside the aluminum chambers.',
            performance: 'Certified thermal conductivity U-Value ≤ 1.4 W/m²K, water tightness ≥ 700 Pa, acoustic reduction rating of 38dB, and wind pressure resistance of up to 5.0 kPa.',
            logistics: 'Direct cargo shipment from Foshan smart base to Manila harbor, utilizing custom vacuum-sealed B2B packing frames to guarantee zero glass fracture during maritime transit.',
            image: 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=800&q=80',
            video: 'https://assets.mixkit.co/videos/preview/mixkit-architectural-drone-shot-of-a-modern-residential-house-41551-large.mp4'
        },
        'thailand-pavilion': {
            title: 'Five-Star Resort Pavilion',
            subtitle: 'Hospitality Pavilion',
            country: 'Thailand',
            system: 'Panoramic Glass Wall Facade',
            glazing: 'Triple-Silver Low-E High-Transmittance',
            wind: 'Class 7 (Tropical Monsoon Grade)',
            client: 'Six Senses Hospitality Group',
            volume: '2,400 Square Meters',
            year: '2025',
            description: 'Built for high tropical temperatures, this resort pavilion utilizes Ebon\'s minimalist structural glazing, maximizing aesthetic transparency while blocking high-wavelength solar heat rays for guest comfort.',
            concept: 'Achieving an "invisible frame" structure that maintains optimal solar shielding. The resort features custom-designed spider fittings and narrow-edge structural silicon glues (Dow Corning 995) to create seamless, endless glazing walls.',
            performance: 'Shading Coefficient SC = 0.28, solar heat gain coefficient SHGC = 0.22, visible light transmittance VLT = 68%, cutting HVAC electrical loads by over 40% in hot season peaks.',
            logistics: 'Delivered in three phase-locked containers directly to Phuket via cross-border land freight, accompanied by local installation supervisors from our engineering team.',
            image: 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80',
            video: 'https://assets.mixkit.co/videos/preview/mixkit-modern-apartment-building-facade-44326-large.mp4'
        },
        'west-africa': {
            title: 'High-end Residential Estates',
            subtitle: 'Estates Glazing',
            country: 'West Africa',
            system: '70 Series Casement Windows & Entry Swing Doors',
            glazing: 'Double Pane Standard Insulated Low-E',
            wind: 'Class 7 (Seaside Corrosion Grade)',
            client: 'Elara Developers Group',
            volume: '4,200 Square Meters',
            year: '2023',
            description: 'A large estate project comprising 45 premium coastal villas, all utilizing customized Ebon insulated casement profiles engineered with high-density anti-corrosion marine powder coatings.',
            concept: 'Mitigating high saline humidity and ocean breeze corrosion while maintaining standard cost efficiencies for massive residential volumes. Ebon applied double-layer fluorocarbon spray treatments on the frames.',
            performance: 'Acoustic cancellation up to 35dB, air permeability Class 4, salt-spray chamber test resistance surpassing 2,000 hours of continuous direct exposure.',
            logistics: 'Bulk shipping container coordination, with localized wooden crates customized to enable container packing optimization, cutting transport costs by 15%.',
            image: 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80',
            video: 'https://assets.mixkit.co/videos/preview/mixkit-skyscrapers-and-modern-office-buildings-42646-large.mp4'
        },
        'romania-church': {
            title: 'Modern Commercial Glass Pavilion',
            subtitle: 'Commercial Center',
            country: 'Romania',
            system: 'Structural Facade Glazing',
            glazing: 'Triple-Pane 3i-Low-E Insulating Glass',
            wind: 'Class 8 (Snow & Gale Resistant)',
            client: 'Klausen Commercial Holdings',
            volume: '1,650 Square Meters',
            year: '2024',
            description: 'A high-rise commercial pavilion located in extreme winter environments, outfitted with triple-glazing profiles to minimize building energy leakage.',
            concept: 'Preventing severe structural glass condensation and keeping interior heat locked. Ebon engineered argon gas-filled cavities and custom warm-edge spacers inside the triple-layered panes.',
            performance: 'U-Value ≤ 1.1 W/m²K, Sound attenuation rating of 42dB, structural frame deflection class L/180 under extreme wind-snow loads.',
            logistics: 'Shipped via China-Europe Railway Express directly to Bucharest in custom steel transport racks, cutting freight lead time from 40 days to just 16 days.',
            image: 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80',
            video: 'https://assets.mixkit.co/videos/preview/mixkit-skyscrapers-and-modern-office-buildings-42646-large.mp4'
        },
        'foshan-office': {
            title: 'Guangdong Smart Base Office',
            subtitle: 'Corporate Headquarters',
            country: 'China',
            system: 'Motorized Smart Slide 150 Series',
            glazing: 'Electrochromic Smart Tinting Double Glass',
            wind: 'Class 8 (Typhoon Grade)',
            client: 'EBON Tongtai Corp.',
            volume: '1,200 Square Meters',
            year: '2025',
            description: 'Our own smart administrative office and showroom, representing Ebon\'s state-of-the-art developments in invisible frames, motorized glass tracks, and automatic security sensors.',
            concept: 'Creating an ultra-minimalist B2B showroom utilizing localized smart technologies. Features ultra-slim 18mm vertical sightlines and motorized smart glass controlled by smartphone or wall panel.',
            performance: 'Automatic tinting controls solar heat transmission from 10% to 65% dynamically, U-Value of 1.3 W/m²K, motorized slide operations rated for 500,000 continuous opening cycles.',
            logistics: 'Direct localized production and assembly within Ebon\'s Foshan smart manufacturing lines, featuring precision overhead crane crane-track installation setups.',
            image: 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80',
            video: 'https://assets.mixkit.co/videos/preview/mixkit-modern-apartment-building-facade-44326-large.mp4'
        },
        'australia-passive': {
            title: 'Melbourne Ecological Residence',
            subtitle: 'Passive House',
            country: 'Australia',
            system: 'Tilt & Turn 80 Series Windows & Heavy Swing Doors',
            glazing: 'Low-E Argon Triple Pane (U = 0.9)',
            wind: 'Class 8 (Ecological Air Sealing)',
            client: 'GreenLife Residential Melbourne',
            volume: '540 Square Meters',
            year: '2024',
            description: 'An ecological residence complying with strict Aussie green-building standards and Australian AS2047 specifications. Utilizes high-sealing Ebon Tilt-and-Turn technologies.',
            concept: 'Meeting strict passive house air-tightness levels (ACH50 ≤ 0.6) with custom B2B structural profiles. Ebon combined a multi-cavity nylon polyamide thermal break with triple compression seal gas gaskets.',
            performance: 'U-Value ≤ 0.9 W/m²K (highly competitive thermal barrier), acoustic dampening of 40dB, water tightness rating exceeding 800 Pa.',
            logistics: 'Vacuum packed in specialized padded shipping crates and exported directly to Melbourne port with complete AS2047 performance compliance certificates.',
            image: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80',
            video: 'https://assets.mixkit.co/videos/preview/mixkit-architectural-drone-shot-of-a-modern-residential-house-41551-large.mp4'
        }
    };

    const caseTitle = document.getElementById('caseTitle');
    if (caseTitle) {
        // Extract ID parameter
        const urlParams = new URLSearchParams(window.location.search);
        let caseId = urlParams.get('id');

        // Fallback
        if (!caseId || !casesDb[caseId]) {
            caseId = 'philippines-villa';
        }

        const project = casesDb[caseId];

        // Hydrate DOM
        caseTitle.textContent = project.title;
        document.getElementById('caseTitleSub').textContent = project.subtitle;
        document.getElementById('caseCountryBadge').textContent = project.country;
        document.getElementById('caseDesc').textContent = project.description;
        document.getElementById('caseConcept').textContent = project.concept;
        document.getElementById('casePerformance').textContent = project.performance;
        document.getElementById('caseLogistics').textContent = project.logistics;

        document.getElementById('specCountry').textContent = project.country;
        document.getElementById('specClient').textContent = project.client;
        document.getElementById('specSystem').textContent = project.system;
        document.getElementById('specGlazing').textContent = project.glazing;
        document.getElementById('specWind').textContent = project.wind;
        document.getElementById('specVolume').textContent = project.volume;
        document.getElementById('specYear').textContent = project.year;

        const mainImg = document.getElementById('caseMainImg');
        const thumb1 = document.getElementById('caseThumb1');
        
        if (mainImg) mainImg.src = project.image;
        if (thumb1) thumb1.src = project.image;

        // Video Toggles
        const videoPlayerContainer = document.getElementById('caseVideoPlayerContainer');
        const caseVideo = document.getElementById('caseVideo');
        const videoThumbBtn = document.getElementById('caseVideoThumbBtn');

        if (thumb1 && videoPlayerContainer && mainImg && caseVideo) {
            thumb1.parentElement.addEventListener('click', () => {
                caseVideo.pause();
                videoPlayerContainer.style.display = 'none';
                mainImg.style.display = 'block';
                thumb1.parentElement.style.borderColor = 'var(--color-gold)';
                thumb1.parentElement.style.opacity = '1';
                if (videoThumbBtn) {
                    videoThumbBtn.style.borderColor = 'rgba(7,22,44,0.1)';
                    videoThumbBtn.style.opacity = '0.7';
                }
            });
        }

        if (videoThumbBtn && videoPlayerContainer && mainImg && caseVideo) {
            videoThumbBtn.addEventListener('click', () => {
                mainImg.style.display = 'none';
                videoPlayerContainer.style.display = 'block';
                caseVideo.src = project.video;
                caseVideo.play().catch(err => console.log('Auto-play blocked:', err));
                videoThumbBtn.style.borderColor = 'var(--color-gold)';
                videoThumbBtn.style.opacity = '1';
                if (thumb1) {
                    thumb1.parentElement.style.borderColor = 'rgba(7,22,44,0.1)';
                    thumb1.parentElement.style.opacity = '0.7';
                }
            });
        }
    }

    // ==========================================
    // 10. DYNAMIC NEWS DETAIL LOADER
    // ==========================================
    const newsDb = {
        'quality-brand-2025': {
            title: 'Ebon Tongtai Wins "2025 Home Consumer Reputation List – Quality Benchmark Brand"',
            category: 'Corporate Award',
            date: 'Oct 21, 2025',
            author: 'Corporate Relations Dept.',
            image: 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=800&q=80',
            intro: 'Guangdong Ebon Tongtai Systems has officially been awarded the "Quality Benchmark Brand" on the 2025 Home Consumer Reputation List. This prestigious recognition underscores our continuous efforts to deliver world-class aluminum structural doors and thermal-break window systems.',
            content: `
                <p>The selection process was jointly organized by several major building and home consumer associations in Foshan—the world's capital of premium aluminum manufacturing. Through extensive data reviews, direct consumer reviews, and independent lab quality testing, EBON was chosen for its outstanding B2B supply chain integrity, high customer satisfaction scores, and green manufacturing compliance standards.</p>
                
                <h3>Industry Leading B2B Supply Chain Commitments</h3>
                <p>Since our inception in 2004, Ebon has focused on building an integrated technical enterprise. By combining raw aluminum extrusion, custom precision CNC machining, double/triple pane insulated glass production, and automated warehousing under a single brand, we ensure our global partners receive uniform quality standards across every single square meter shipped.</p>
                
                <p>Furthermore, Ebon was highly praised for its strict environmental safety protocols. All Ebon aluminum extrusions undergo chemical testing to ensure zero heavy metal runoffs, and our smart powder coating systems use 100% VOC-free ecological sprays, matching global compliance metrics such as CE, SGS, and TUV.</p>
                
                <blockquote style="border-left: 4px solid var(--color-gold); padding: 15px 25px; margin: 30px 0; background-color: var(--color-bg-light); font-style: italic; color: var(--color-navy-dark); font-size: 15px; border-radius: 4px;">"Winning the Quality Benchmark Brand is not just an award for Ebon—it is proof that B2B structural systems can be manufactured sustainably and achieve extreme quality benchmarks under a unified, high-integrity smart plant footprint."<br><small style="color: var(--color-text-muted-dark); display:block; margin-top:5px; font-weight:600;">— Mr. Deng, Executive General Manager of Guangdong Ebon</small></blockquote>
                
                <h3>Looking Forward to 2026</h3>
                <p>As we head into the next physical release cycle, Ebon commits to expanding its robotic automation lines even further. We will introduce new dual-arm high-speed automated seal injection stations, ensuring that our double and triple insulated pane perimeter seals are co-extruded with absolute micro-level accuracy, delivering unmatched lifespan and argon gas retention rates for modern green skyscrapers.</p>
            `
        },
        'lowe-insulation-king': {
            title: 'The King of Thermal Insulation Performance: 3i-Low-E Glass Systems',
            category: 'Glazing Science',
            date: 'Sep 12, 2025',
            author: 'R&D Engineering Center',
            image: 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80',
            intro: 'Modern high-rise commercial structures and luxury residential estates face a massive ecological challenge: energy loss. Discover how Ebon\'s proprietary 3i-Low-E glass structures serve as the ultimate thermal barrier, cutting HVAC electrical bills drastically.',
            content: `
                <p>According to international building energy studies, windows and doors are responsible for up to 40% of a building's overall heating and cooling loss. High solar heat gain during tropical summers and rapid indoor heat bleed during harsh winters push localized HVAC units to their limits, inflating energy grids and violating LEED or BREEAM carbon footprints. Ebon's R&D department has engineered the ultimate answer: the 3i-Low-E Multi-Pane System.</p>
                
                <h3>What is 3i-Low-E Glass?</h3>
                <p>At its core, 3i-Low-E (Triple-Insulated Low Emissivity) glass is an architectural masterpiece. It features multiple micro-thin layers of metallic silver co-deposited onto high-transmittance float glass via vacuum magnetron sputtering. These silver layers act as a microscopic thermal mirror—reflecting high-temperature infrared solar radiation away from the building while permitting visible light waves to pass cleanly.</p>
                
                <table class="premium-news-table" style="width: 100%; border-collapse: collapse; margin: 30px 0; font-size: 13px; text-align: left; font-family: var(--font-headers);">
                    <thead>
                        <tr style="background: var(--color-navy-dark); color: #ffffff; border-bottom: 2px solid var(--color-gold);">
                            <th style="padding: 12px; font-weight:600;">Glazing Configuration</th>
                            <th style="padding: 12px; font-weight:600;">U-Value (W/m²K)</th>
                            <th style="padding: 12px; font-weight:600;">Solar Heat Gain (SHGC)</th>
                            <th style="padding: 12px; font-weight:600;">Light Trans. (VLT)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid rgba(7,22,44,0.08); background: #ffffff;">
                            <td style="padding: 12px; font-weight:600;">Single Pane Standard Glass</td>
                            <td style="padding: 12px;">5.8</td>
                            <td style="padding: 12px;">0.82</td>
                            <td style="padding: 12px;">90%</td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(7,22,44,0.08); background: rgba(7,22,44,0.02);">
                            <td style="padding: 12px; font-weight:600;">Double Pane Standard Insulated</td>
                            <td style="padding: 12px;">2.7</td>
                            <td style="padding: 12px;">0.70</td>
                            <td style="padding: 12px;">81%</td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(7,22,44,0.08); background: #ffffff;">
                            <td style="padding: 12px; font-weight:600;">Double Pane Low-E (Argon)</td>
                            <td style="padding: 12px;">1.4</td>
                            <td style="padding: 12px;">0.35</td>
                            <td style="padding: 12px;">72%</td>
                        </tr>
                        <tr style="background: rgba(197, 168, 109, 0.1); border-bottom: 2px solid var(--color-gold);">
                            <td style="padding: 12px; font-weight:700; color: var(--color-navy-dark);">Ebon 3i-Low-E Triple Pane</td>
                            <td style="padding: 12px; font-weight:700; color: var(--color-gold);">≤ 1.1</td>
                            <td style="padding: 12px; font-weight:700; color: var(--color-navy-dark);">0.22</td>
                            <td style="padding: 12px; font-weight:700; color: var(--color-navy-dark);">68%</td>
                        </tr>
                    </tbody>
                </table>
                
                <h3>Triple Environmental Protection Chambers</h3>
                <p>In addition to the sputtering coatings, Ebon configures its double and triple glass units with hermetically sealed gas chambers. We extract ambient air and inject 95% concentration high-purity Argon gas. Argon is a heavy, slow-moving noble gas that dramatically limits conductive thermal heat flow between the external and internal panes.</p>
                
                <blockquote style="border-left: 4px solid var(--color-gold); padding: 15px 25px; margin: 30px 0; background-color: var(--color-bg-light); font-style: italic; color: var(--color-navy-dark); font-size: 15px; border-radius: 4px;">"By combining metallic silver thermal mirrors with slow-moving Argon gas chambers, Ebon's 3i systems effectively reflect the extreme solar heat of a tropical summer and lock interior heating during severe sub-zero winters, achieving passive house requirements globally."<br><small style="color: var(--color-text-muted-dark); display:block; margin-top:5px; font-weight:600;">— Dr. Zheng, Chief Glazing R&D Officer</small></blockquote>
                
                <p>Furthermore, Ebon eliminates the traditional metallic warm-edge spacers which usually act as a heat-leak bridge. We exclusively utilize high-density polyurethane warm-edge spacer locks, guaranteeing that the pane perimeters remain insulated and entirely dry—preventing standard condensation and mold issues over decades of service.</p>
            `
        },
        'top-10-brands': {
            title: 'Ebon Tongtai Re-elected as Top 10 Influential Brands of Aluminum Alloy Systems',
            category: 'Brand Recognition',
            date: 'Aug 25, 2025',
            author: 'Industry Brand Index',
            image: 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80',
            intro: 'For the fifth consecutive year, Guangdong Ebon Tongtai Systems has successfully defended its position as a "Top 10 Influential Brand of Aluminum Alloy Systems" at the annual Huateng Cup big data awards ceremony.',
            content: `
                <p>The Huateng Cup is widely recognized as the most rigorous and authoritative industry evaluation system in China's building material sector. Organized by top-tier architectural publications and structural glass research panels, the awards use an objective big data index rating brand awareness, quality compliance, corporate scale, R&D patent counts, and B2B export volume.</p>
                
                <h3>Double Weather-Seal Patent Innovation</h3>
                <p>A primary factor behind Ebon's top rank this year was our newly approved B2B hardware patent: the **Double Weather-Seal Co-extruded Gasket System**. Traditional casement frames rely on single compression points, which gradually loosen and leak air or rainwater during major storm gusts. Ebon's new design combines two separate co-extruded EPDM gaskets with a multi-point German GU hardware locking assembly.</p>
                
                <p>This structural setup creates a specialized pressure-equalization air chamber inside the window perimeter sash, draining heavy rain instantly away via concealed weep tracks while blocking wind speeds of up to Class 9 (hurricane strength).</p>
                
                <blockquote style="border-left: 4px solid var(--color-gold); padding: 15px 25px; margin: 30px 0; background-color: var(--color-bg-light); font-style: italic; color: var(--color-navy-dark); font-size: 15px; border-radius: 4px;">"A premium brand is built on persistent research. At Ebon, we invest over 8% of our yearly revenue directly into hardware tolerances, extrusion tooling, and thermal barrier polymers."<br><small style="color: var(--color-text-muted-dark); display:block; margin-top:5px; font-weight:600;">— Chief Architect Mr. Wang</small></blockquote>
                
                <h3>Global Export Growth</h3>
                <p>The evaluation panel also commended Ebon's exceptional B2B international shipping logistics network. Over the past twelve months, Ebon has exported over 220,000 square meters of structural glazing and thermal casements to 32 countries, including luxury villa projects in Australia, resort pavilions in Southeast Asia, and massive residential estates in West Africa.</p>
            `
        },
        'nylon-integrity': {
            title: 'Advanced PA66 Nylon Insulation Strips: Material Integrity',
            category: 'Material R&D',
            date: 'Jul 04, 2025',
            author: 'Material Science Lab',
            image: 'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=800&q=80',
            intro: 'Not all thermal break systems are created equal. Discover why Guangdong Ebon exclusively utilizes high-grade German import-grade polyamide strips reinforced with glass fiber (PA66GF25) for extreme thermal barrier security.',
            content: `
                <p>The secret behind any thermal-break window or door is the insulating strip. This strip physically connects the outer aluminum profile (exposed to cold/heat) with the inner aluminum profile (exposed to the climate-controlled interior). If this strip fails or bleeds heat, the entire window system becomes a major energy drain. Ebon's Material Science Lab takes a look at why polyamide strips are the elite choice.</p>
                
                <h3>Polyamide (PA66) vs. Low-Grade PVC</h3>
                <p>Many generic aluminum systems cut manufacturing costs by utilizing PVC (Polyvinyl Chloride) insulation strips. PVC is a cheap, fragile plastic that degrades rapidly under solar UV exposure and high thermal variations, causing the window sash to lose air tightness or structurally deform over time. Ebon exclusively utilizes German import-grade **Polyamide 66 reinforced with 25% glass fiber (PA66GF25)**.</p>
                
                <p>PA66GF25 has an identical coefficient of thermal expansion as aluminum alloy itself. This means that when the window frame heats up under the direct sun or cools down in freezing winter storms, the polyamide strip expands and contracts at the exact same rate as the metal—preventing frame warping, structural stress fractures, and seal separation.</p>
                
                <blockquote style="border-left: 4px solid var(--color-gold); padding: 15px 25px; margin: 30px 0; background-color: var(--color-bg-light); font-style: italic; color: var(--color-navy-dark); font-size: 15px; border-radius: 4px;">"Utilizing low-grade PVC is an unacceptable safety risk for high-rise commercial structures. Polyamide PA66GF25 guarantees that the structural frame maintains extreme mechanical seal integrity under severe wind forces and solar exposure for over 30 years."<br><small style="color: var(--color-text-muted-dark); display:block; margin-top:5px; font-weight:600;">— Dr. Werner, Lead Materials Consultant</small></blockquote>
                
                <h3>Advanced Multi-Cavity Extrusion Profiles</h3>
                <p>Ebon has evolved this technology by extruding the PA66 strips into multi-cavity insulation chambers filled with specialized polyurethane foams. This multi-chambered layout splits the thermal flow path into several independent isolated zones, achieving an incredibly low thermal conductivity rating and contributing to supreme B2B passive house certifications.</p>
            `
        },
        'wind-resistance': {
            title: 'Custom Heavy-Duty Sliding Assemblies for Wind Load Resistance',
            category: 'Structural Engineering',
            date: 'Jun 18, 2025',
            author: 'Structural Engineering Team',
            image: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80',
            intro: 'For high-altitude coastal skyscrapers and seaside villas, wind load resistance is the ultimate engineering parameter. Learn how Ebon\'s custom multi-point locking setups and reinforced alloy framing achieve Class 9 hurricane ratings.',
            content: `
                <p>As modern architects push for panoramic floor-to-ceiling glass wall facades, structural engineers must deal with a dangerous force: wind pressure. High-rise buildings face wind forces that multiply exponentially as altitude increases, creating massive suction pressures on glass panes. Ebon\'s structural engineers break down how we reinforce our systems to meet Class 9 typhoon standards.</p>
                
                <h3>Premium 6063-T5 Structural Aluminum Alloy</h3>
                <p>A premium window starts with the metal. Ebon exclusively extrudes its profiles using high-purity **6063-T5 structural aluminum alloy** with sash wall thicknesses ranging between 1.8mm and 3.0mm. This alloy undergoes specialized heat-treatment tempering processes to increase yield strength and structural deflection limits, ensuring the frame does not warp under extreme wind gusts.</p>
                
                <h3>Concealed German Multi-Point Locking Systems</h3>
                <p>Traditional sliding systems lock at a single side point, leaving the upper and lower edges vulnerable to wind-suction drafts. Ebon integrates custom multi-point locking systems sourced from German industry giants like Siegenia or Roto. When locked, high-strength steel hook bolts engage across multiple points on the top, bottom, and side tracks—drawing the window sash tight against triple EPDM compression seals.</p>
                
                <blockquote style="border-left: 4px solid var(--color-gold); padding: 15px 25px; margin: 30px 0; background-color: var(--color-bg-light); font-style: italic; color: var(--color-navy-dark); font-size: 15px; border-radius: 4px;">"Wind sealing is not just about glass thickness—it is a unified system of frame wall density, co-extruded compression gaskets, and high-strength multi-point metal locks working together."<br><small style="color: var(--color-text-muted-dark); display:block; margin-top:5px; font-weight:600;">— Chief Structural Engineer Mr. Chen</small></blockquote>
                
                <h3>Friction Stay Hinges and Safety Systems</h3>
                <p>For outward-opening casements, wind gusts can rip a standard window sash from its track. Ebon solves this by integrating heavy-duty stainless steel (SUS304) friction stay hinges capable of holding sashes weighing up to 180kg, combined with safety drop-catcher cables that guarantee the glass panel remains secured even in extreme typhoon gusts.</p>
            `
        },
        'carbon-neutral': {
            title: 'EBON Commits to Carbon-Neutral Smart Manufacturing',
            category: 'Eco Standards',
            date: 'May 30, 2025',
            author: 'Sustainability Board',
            image: 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80',
            intro: 'Guangdong Ebon Tongtai has officially launched its first carbon-neutral smart manufacturing base in Foshan, deploying massive rooftop solar grids and recycling water filtration loops.',
            content: `
                <p>As global construction guidelines adapt to combat climate change, B2B suppliers must match these goals. Real estate developers and corporate builders now analyze the "embodied carbon" of windows and doors as part of green building certifications like LEED, DGNB, and BREEAM. Ebon has risen to the occasion by investing over $12 million to transform our major production lines into a green smart base.</p>
                
                <h3>1.6 Megawatts Rooftop Solar Installation</h3>
                <p>Ebon has fully covered the roofs of our automated extrusion and assembly plants with high-efficiency monocrystalline solar cells. Operating at a peak capacity of 1.6 Megawatts, this solar array generates over 45% of the plant's overall electrical overheads during daylight production runs, reducing greenhouse gas emissions by up to 1,800 tons annually.</p>
                
                <h3>Zero-Waste Water Filtration Loops</h3>
                <p>Extruded aluminum cooling and glass washing stations consume massive amounts of water. Ebon has installed a state-of-the-art multi-stage closed filtration loop that captures, filters, and recycles 98% of overall industrial water usage—preventing waste discharge and ensuring zero local environmental footprint.</p>
                
                <blockquote style="border-left: 4px solid var(--color-gold); padding: 15px 25px; margin: 30px 0; background-color: var(--color-bg-light); font-style: italic; color: var(--color-navy-dark); font-size: 15px; border-radius: 4px;">"Sustainable architecture starts at the manufacturing base. By reducing our fabrication carbon footprint, Ebon helps global developers achieve green building points from day one."<br><small style="color: var(--color-text-muted-dark); display:block; margin-top:5px; font-weight:600;">— Mrs. Liang, Director of Sustainability</small></blockquote>
                
                <h3>Eco-Friendly Packaging & Powder Coating</h3>
                <p>We have also eliminated traditional plastic bubble wrapping, replacing it with 100% biodegradable honey-comb paper packing frames. In addition, our automated powder-coating lines recycle 99% of oversprayed paint powders, using a thermal filtration process that releases zero toxic emissions into the atmosphere.</p>
            `
        }
    };

    const newsTitle = document.getElementById('newsTitle');
    if (newsTitle) {
        const urlParams = new URLSearchParams(window.location.search);
        let newsId = urlParams.get('id');

        if (!newsId || !newsDb[newsId]) {
            newsId = 'lowe-insulation-king'; // Default article
        }

        const article = newsDb[newsId];

        // Hydrate DOM
        newsTitle.textContent = article.title;
        document.getElementById('newsCategory').textContent = article.category;
        document.getElementById('newsDate').textContent = article.date;
        document.getElementById('newsAuthor').textContent = article.author;
        document.getElementById('newsIntro').textContent = article.intro;
        document.getElementById('newsContent').innerHTML = article.content;

        const mainImg = document.getElementById('newsMainImg');
        if (mainImg) mainImg.src = article.image;

        // Render Related articles sidebar
        const relatedArticles = document.getElementById('relatedArticles');
        if (relatedArticles) {
            let html = '';
            let count = 0;
            for (const key in newsDb) {
                if (key !== newsId && count < 3) {
                    const item = newsDb[key];
                    html += `
                        <div class="sidebar-article-item" style="display: flex; gap: 15px; align-items: center; border-bottom: 1px solid rgba(7,22,44,0.05); padding-bottom: 15px; margin-bottom: 15px;">
                            <img src="${item.image}" alt="${item.title}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 6px;">
                            <div style="flex:1;">
                                <span style="font-size: 10px; color: var(--color-gold); font-weight: 700; text-transform: uppercase; display:block; margin-bottom:3px;">${item.category}</span>
                                <h5 style="font-size: 13px; line-height: 1.4; margin: 0 0 4px 0;"><a href="news-detail.html?id=${key}" style="color: var(--color-navy-dark); font-weight:600; transition: var(--transition-fast);">${item.title}</a></h5>
                                <span style="font-size: 11px; color: var(--color-text-muted-dark);">${item.date}</span>
                            </div>
                        </div>
                    `;
                    count++;
                }
            }
            relatedArticles.innerHTML = html;
        }
    }

});
