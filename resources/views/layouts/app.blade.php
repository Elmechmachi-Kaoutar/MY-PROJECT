<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MY JOB</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> 

 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- CSS -->

    @livewireStyles

    <!-- Scripts -->
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/sass/app2.scss', 'resources/js/app2.js'])
    @vite(['resources/sass/slide.scss', 'resources/js/slide.js'])
  

    @vite(['resources/sass/chat.scss'])


    
</head>

<body>
        @unless(Request::is('/'))
        @if(Auth::check() && Auth::user()->role_id==2 )
        @if(Auth::user()->suspend==0 )
        @include('layouts.sidebar')
        @endif
        @elseif(Auth::check() && Auth::user()->role_id==1 )
        @include('layouts.sidebaradmin')
        @elseif(Auth::check() && Auth::user()->role_id==3 )
        @if(Auth::user()->suspend==0 )
        @include('layouts.sidebar_recruteure')
        @endif
        @endif
        @endunless
        @php
          if(Auth::check()){
            $valide=Auth::user()->valide;
          }
                       
        @endphp
       

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top ">
            <div class="container">
                <a class="navbar-brand " href="{{ url('/') }}">
                <span class="text text-primary ">My</span>Job</a>
                </a>
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav px-5">
                    @if(Auth::check())
                    @if(Auth::user()->suspend==false )
                        @if((Auth::user()->role_id )==3)

                            <a   role="button"  aria-haspopup="true"    href="{{route('packages.index')}}" @if(!$valide) onclick="return false;" class="nav-link text  text-secandary" @else class="nav-link text text-warning " @endif><i class='fas fa-crown'></i> premium </a> 
                            
                     @endif
                     @endif
                     @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                            
                        @if(Auth::check())
                        @if(Auth::user()->suspend==false )
                        @if((Auth::user()->role_id )==3)
                            <a     role="button"  aria-haspopup="true"    href="{{route('offre.index')}}" @if(!$valide) onclick="return false;" class="nav-link text text-secondary  " @else class="nav-link text text-primary" @endif>mes offre </a> 
                            <a     role="button"  aria-haspopup="true"    href="{{route('offre.create')}}"  @if(!$valide) onclick="return false;" class="nav-link text text-secondary  " @else class="nav-link text text-primary" @endif>poster un offre </a> 
                            <a     role="button"  aria-haspopup="true"    href="{{route('deposer-mon-cv.index')}}"  @if(!$valide) onclick="return false;" class="nav-link text text-secondary  " @else class="nav-link text text-primary" @endif>les cv </a> 
                            
                            @elseif((Auth::user()->role_id )==2)
                            <a   class="nav-link text text-primary"  role="button"  aria-haspopup="true"    href="{{route('offre.index')}}">tout les offre </a> 
                            <a   class="nav-link text text-primary"  role="button"  aria-haspopup="true"    href="{{route('show_candidature.show',Auth::user()->id)}}">mes candidatures</a>



                            
                            @php
                                $id = auth()->user()->id;
                                $cvExists = \App\Models\InfoCandidat::where('user_id', $id)->exists();
                            @endphp

                            @if($cvExists)
                            <a  class="nav-link text text-primary"  role="button"  aria-haspopup="true"    href="{{route('deposer-mon-cv.edit',Auth::user()->id)}}"> mon CV </a> 
                            @else
                            <a  class="nav-link text text-primary"  role="button"  aria-haspopup="true"    href="{{route('deposer-mon-cv.edit',Auth::user()->id)}}"> déposer CV </a> 
                            @endif

                            @elseif((Auth::user()->role_id )==1)
                            <a   class="nav-link text text-primary"  role="button"  aria-haspopup="true"    href="{{route('candidat')}}">les candidats </a> 
                            <a   class="nav-link text text-primary"  role="button"  aria-haspopup="true"    href="{{route('recruteure')}}">les recruteurs </a> 

                        @endif
                        @endif
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
                                    @if(Auth::user()->suspend==false )
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
        

        <div  class="mt-4">

            <main class="pt-3 pl-5 ">
    
                    @yield('content') 
            </main> 
        </div>
    </div>
    
            <footer>
                @include('layouts.footer')
            </footer>
        
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script>
        
        $('.select2').select2({
        closeOnSelect: false
        });
     
    </script>
      @livewireScripts

</body>
</html>