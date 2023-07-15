{{-- HEADER AND FOOTER +EXTENDS NAVBAR AND CONTENT --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="site d'information sur l'intelligence artificielle" name="description">
    <meta content="intelligence artificielle, big data, apprentissage, reseau, neurones, machine,donnees, langage" name="keywords">
    <meta content="width=50%, initial-scale=1" name="viewport">
    <meta content="index,follow" name="robots">


</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">Evenement</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->


            <li class="nav-item dropdown">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src=<?php echo asset("assets/img/profile-img.jpg")?> alt="Profile" class="rounded-circle">
                    {{-- <span class="d-none d-md-block dropdown-toggle ps-2">{{session('employe')->nom }} {{session('employe')->prenom }}</span> --}}Mety tsara ve
                  </a>

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                      {{-- <h6>{{session('employe')->nom }} {{session('employe')->prenom }}</h6> --}}
                    </li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>

                    <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('Employe/deconnexion')}}">
                    <i class="bi bi-box-arrow-righ"></i>
                        <span>Deconnexion</span>
                    </a>
                    </li>
            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">


                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">



                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->

    @include('forme.navbar-user')


<main id="main" class="main">
        <div class="row">
            <div class="col-lg-3">
                <div class="@yield('type_message')" role="alert">
                        @yield('message')
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>

        @yield('content')


</main>
</main>
<!-- ======= Footer ======= -->
</body>
@include('css.js')
</html>
