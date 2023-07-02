<div id="layoutSidenav">

            <div id="layoutSidenav_nav">
             <div class="text-center ">
                 <h3 class="p-2  "><a href="/" class="text-decoration-none">MY JOB</a></h3>
             </div>
                <nav class="sb-sidenav accordion  navbar-admin-color " id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        
                        <div class="nav">
                        
                            <a class="nav-link text-light hhh" href="/home">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Tableau de bord
                            </a>
                     
                            <a class="nav-link collapsed  text-light hhh" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Utilisateurs
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav bg-dark">
                                    <a class="nav-link text-light hohoho" href="{{route('candidat')}}">candidats</a>
                                    <a class="nav-link text-light hohoho" href="{{route('recruteure')}}">recruteurs</a>
                                </nav>
                            </div>
                            <a class="nav-link text-light hhh" href="{{ route('demand.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Les Demands
                            </a>

                           
                            <a class="nav-link collapsed  text-light hhh" href="#" data-bs-toggle="collapse" data-bs-target="#collapselayoutss" aria-expanded="false" aria-controls="collapselayoutss">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Comptes suspendus
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapselayoutss" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav bg-dark">
                                    <a class="nav-link text-light hohoho" href="{{route('suspend_candidat')}}">candidats</a>
                                    <a class="nav-link text-light hohoho" href="{{route('suspend_recruteure')}}">recruteurs</a>
                                </nav>
                            </div>
                        

                            <a class="nav-link text-light hhh" href="{{route('demands')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Nouveaux recruteurs
                            </a>
                            <a class="nav-link text-light hhh" href="{{route('packages.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Packages
                            </a>
                          

                          

            </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>