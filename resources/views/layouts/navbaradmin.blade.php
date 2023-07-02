<nav class="sb-topnav navbar navbar-expand navbar-admin-color shadow-sm">
            <!-- Navbar Brand-->
            
            <!-- Sidebar Toggle-->
            @unless(Request::is('/'))
        @if(Auth::check() && Auth::user()->role_id==2 )
            @include('layouts.sidebar')
        @elseif(Auth::check() && Auth::user()->role_id==1 )
        @include('layouts.sidebaradmin')
        @elseif(Auth::check() && Auth::user()->role_id==3 )
        @include('layouts.sidebar_recruteure')
        @endif
        @endunless

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top ">
            <div class="container">
           
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                     

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-5">
                        <!-- Authentication Links -->
                        @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">

                                        <a class="nav-link" href="{{ route('login') }}"><span class="nav-link text text-primary "  >Se connecter</span></a>
                                    </li>
    

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link text text-primary " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> S'inscrire</a> 
                                @endif
                                @if (Route::has('register'))
                                    <ul class="dropdown-menu">
                                            <li><a class="dropdown-item text text-primary" href="{{ route('register') }}">Candidat</a></li>
                                            <li><a class="dropdown-item text text-primary" href="{{ route('registerr') }}">Recruteure</a></li>          
                                    </ul>
                                @endif
                            </li>
                        </ul>  
                    </div>   
                            
                            @else
                            
                            
                        
                        @if((Auth::user()->role_id )==3)
                            <a   class="nav-link text text-primary  "  role="button"  aria-haspopup="true"    href="{{route('offre.index')}}">mes offre </a> 
                            <a   class="nav-link text text-primary "  role="button"  aria-haspopup="true"    href="{{route('offre.create')}}">poster un offre </a> 
                            <a   class="nav-link text text-primary"  role="button"  aria-haspopup="true"    href="{{route('deposer-mon-cv.index')}}">les cv </a> 
                        @elseif((Auth::user()->role_id )==2)
                            <a   class="nav-link text text-primary"  role="button"  aria-haspopup="true"    href="{{route('offre.index')}}">tout les offre </a> 
                            <a   class="nav-link text text-primary"  role="button"  aria-haspopup="true"    href="{{route('show_candidature.show',Auth::user()->id)}}">mes candidateures</a>



                            
                            @php
                                $id = auth()->user()->id;
                                $cvExists = \App\Models\InfoCandidat::where('user_id', $id)->exists();
                            @endphp

                            @if($cvExists)
                            <a  class="nav-link text text-primary"  role="button"  aria-haspopup="true"    href="{{route('deposer-mon-cv.edit',Auth::user()->id)}}"> mon CV </a> 
                            @else
                            <a  class="nav-link text text-primary"  role="button"  aria-haspopup="true"    href="{{route('deposer-mon-cv.edit',Auth::user()->id)}}"> deposer mon CV </a> 
                            @endif

                            @elseif((Auth::user()->role_id )==1)
                           

                        @endif

                            
                            <li class="nav-item dropdown">
                                
                        
                        @if((Auth::user()->role_id )==2 ||(Auth::user()->role_id )==1)
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text text-primary" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nom }}
                                </a>
                        @elseif((Auth::user()->role_id )==3)
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text text-primary" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nom_societe }}
                                </a>
                        @endif

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item text text-primary" href="/home">
                                        {{ __('tableau de bord') }}
                                    </a>
                                    @if((Auth::user()->role_id )==2)
                                <a class="dropdown-item text text-primary" href="{{route('profile_candidat.index')}}">
                                        {{ __('profil') }}
                                    </a>
                                    @endif 
                                    @if((Auth::user()->role_id )==3)
                                <a class="dropdown-item text text-primary" href="{{route('profile_recruteure.index')}}">
                                        {{ __('profile') }}
                                    </a>
                                    @endif 
                                    <a class="dropdown-item text text-primary" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        @if(Auth::check())
                                
                                @endif

                    </ul>
                </div>
            </div>
            
        </nav>
        </nav>
        