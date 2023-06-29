{{-- NAVBAR --}}
<aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav1" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-circle-window-reverse"></i><span>Tous</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                <ul id="tables-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('TypeEvenement/index') }}">
                      <i class="bi bi-circle"></i><span>Type d'evenement</span>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ url('Evenement/index') }}">
                            <i class="bi bi-circle"></i><span>Les evenements</span>
                        </a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link collapsed" href="{{ url('Ticketing/index') }}">
                          <i class="bi bi-circle"></i><span>Ticketing</span>
                        </a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link collapsed" href="{{ url('Artiste/index') }}">
                          <i class="bi bi-circle"></i><span>Artiste</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ url('Type/index') }}">
                            <i class="bi bi-circle"></i><span>Type</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ url('Sonorisation/index') }}">
                         <i class="bi bi-circle"></i><span>Sonorisation</span>
                       </a>
                   </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ url('Logistique/index') }}">
                            <i class="bi bi-circle"></i><span>Logistique</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ url('CategoriePlace/index') }}">
                            <i class="bi bi-circle"></i><span>Categorie Place</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ url('TypeLieu/index') }}">
                            <i class="bi bi-circle"></i><span>Type de lieu</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ url('Lieu/index') }}">
                            <i class="bi bi-circle"></i><span>Lieu</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ url('Autredepense/index') }}">
                            <i class="bi bi-circle"></i><span>Autre depense</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ url('Taxe/index') }}">
                            <i class="bi bi-circle"></i><span>Taxe</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
</aside>
