<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><img src="assets/img/icone.png" alt="" class="img-fluid"><a href="#" style="color: #0b5e1e;">ADN</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul class="">
                <li class="nav-item me-lg-5">
                    <a class="nav-link {{ Route::currentRouteName() == 'welcome' ? ' active' : ''  }} px-0"
                        href="/">ACCEUIL</a>
                </li>
                {{-- <li><a href="#" style="color: #0b5e1e;">A PROPOS</a></li> --}}
                <li class="nav-item me-lg-5">
                    <a class="nav-link {{ Route::currentRouteName() == 'contact' ? ' active' : ''  }} px-0"
                        href="/contact-us">CONTACT</a>
                </li>
                <li class="dropdown"><a href="#"><span>S'INSCRIRE</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <li class="nav-item me-lg-5"><a href="/inscrire/create">Local (Benin)</a></li>
                      <li class="nav-item me-lg-5"><a href="/diaspora/create">Extérieur du pays</a></li>
                    </ul>
                  </li>
            </ul>
            
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="{{ route('login') }}" class="get-started-btn" style="background-color: #0b5e1e; color: #fff;">SE
            CONNECTER</a>

    </div>
</header><!-- End Header -->