<header class="site-header">
    <div class="container">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-logo" aria-label="Ebon Home">
            <img src="{{ asset('frontend/assets/logo.png') }}" alt="EBON Logo" class="brand-logo-img">
        </a>

        <!-- Desktop Navigation Menu -->
        <nav class="main-navigation">
            <ul class="nav-menu">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active">Home</a></li>
                <li class="nav-item"><a href="{{ route('frontend.about.index') }}" class="nav-link">About Us</a></li>
                <li class="nav-item">
                    <a href="{{ route('frontend.products.index') }}" class="nav-link">Products <i
                            class="fas fa-chevron-down" style="font-size: 10px; margin-left: 4px;"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('frontend.products.index') }}?cat=doors" class="dropdown-link">Doors
                                Series</a>
                        </li>
                        <li><a href="{{ route('frontend.products.index') }}?cat=windows" class="dropdown-link">Windows
                                Series</a></li>
                        <li><a href="{{ route('frontend.products.index') }}?cat=thermal"
                                class="dropdown-link">Thermal-Break
                                Systems</a></li>
                        <li><a href="{{ route('frontend.products.index') }}?cat=glazing" class="dropdown-link">Custom
                                Glazing</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="{{ route('frontend.catalogue-download.index') }}"
                        class="nav-link">Download Catalogue</a>
                </li>
                <li class="nav-item"><a href="{{ route('frontend.cases.index') }}" class="nav-link">Cases</a></li>
                <li class="nav-item"><a href="{{ route('frontend.news.index') }}" class="nav-link">News</a></li>
                <li class="nav-item"><a href="{{ route('frontend.contact.index') }}" class="nav-link">Contact Us</a>
                </li>
            </ul>
        </nav>

        <!-- Header Right Utilities -->
        <div class="header-actions">
            <div class="lang-selector" aria-label="Select Language">
                <i class="fas fa-globe"></i>
                <span>EN</span>
                <i class="fas fa-caret-down"></i>
            </div>
            <button class="btn-primary open-quote-modal"
                style="padding: 10px 20px; font-size: 12px; border-radius: 20px;">
                Get A Quote
            </button>
            <button class="btn-mobile-menu" aria-label="Toggle Mobile Navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</header>
