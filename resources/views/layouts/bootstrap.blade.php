<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MY JOB</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> 
    <!-- Scripts -->
    @vite(['resources/sass/slide.scss', 'resources/js/slide.js'])
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/sass/app2.scss', 'resources/js/app2.js'])
    
</head>
<body>
                @unless(Request::is('/'))
                @if(Auth::check() && Auth::user()->role_id==2)
                    @include('layouts.sidebar')
                @endif
                @endunless
     <!-- Navigation-->
    @if(Request::routeIs('rechercher')) 
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top ">
    @else
   <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
     @endif 
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">MY JOB</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    @guest
                    @if (Route::has('login'))
                        <li class="nav-item"><a class="nav-link"  href="{{ route('login') }}">se connecter</a></li>
                    @endif
                        <li class="nav-item  dropdown">
                            <a class="nav-link" href="#services" data-bs-toggle="dropdown" aria-expanded="false"  href="#" role="button">S'inscrire</a>
                            @if (Route::has('register'))
                            <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text text-primary" href="{{ route('register') }}">Candidat</a></li>
                                        <li><a class="dropdown-item text text-primary" href="{{ route('registerr') }}">Recruteure</a></li>
                            </ul>
                            @endif
                        </li>
                
                    @endguest

                    @if(Auth::check())
                    @if((Auth::user()->role_id )==3)
                    
                    @if(Auth::user()->valide)
                    @if(Auth::user()->suspend==false)
                        <li class="nav-item"><a class="nav-link" href="{{route('offre.index')}}">mes offre</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('offre.create')}}">poster un offre </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('deposer-mon-cv.index')}}">les cv</a> </li>
                    @endif
                    @endif   

                        <li class="nav-item  dropdown">
                            <a class="nav-link " href="#services" data-bs-toggle="dropdown" aria-expanded="false"  href="#" role="button">{{ Auth::user()->nom_societe }}</a>
                        
                                    <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text text-primary"  href="/home">{{ __('tableau de bord') }}</a></li>
                                                @if(Auth::user()->suspend==false)
                                                @if((Auth::user()->role_id )==2)
                                                <li><a class="dropdown-item text text-primary" href="{{route('profile_candidat.index')}}">
                                                {{ __('profile') }}</a></li>
                                                @endif
                                                @if((Auth::user()->role_id )==3)
                                                <li><a class="dropdown-item text text-primary" href="{{route('profile_recruteure.index')}}">
                                                {{ __('profile') }}</a></li>

                                                @endif
                                                @endif
                                                <li><a class="dropdown-item text text-primary"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Se déconnecter') }}</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                    
                                    </ul>
                                    </a>
                                   
                               </li>
                    </ul>
                @elseif((Auth::user()->role_id )==2)
                @if(Auth::user()->suspend==false)
                <li class="nav-item"><a class="nav-link"href="{{route('offre.index')}}">tout les offre</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('show_candidature.show',Auth::user()->id)}}">mes candidateures</a></li>

                  

                @php
                                $id = auth()->user()->id;
                                $cvExists = \App\Models\InfoCandidat::where('user_id', $id)->exists();
                @endphp

                
                            @if($cvExists)
                            <li class="nav-item"><a class="nav-link"  href="{{route('deposer-mon-cv.edit',Auth::user()->id)}}"> mon CV</a></li>
                            @else
                            <li class="nav-item"><a class="nav-link" href="{{route('deposer-mon-cv.edit',Auth::user()->id)}}"> deposer mon CV</li>
                            @endif
                            @endif
                            @elseif((Auth::user()->role_id )==1)
                            <li class="nav-item"><a class="nav-link" href="{{route('candidat')}}">les candidats</a></li>  
                            <li class="nav-item"><a class="nav-link" href="{{route('recruteure')}}">les recruteurs</a></li>

                @endif
         
               
                            <!-- ****************************************************** -->
                        
                        @if((Auth::user()->role_id )==2 ||(Auth::user()->role_id )==1)
                        <li class="nav-item  dropdown">
                       
                            <a class="nav-link" href="#services" data-bs-toggle="dropdown" aria-expanded="false"  href="#" role="button">{{ Auth::user()->nom }}</a>
                        
                                    <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text text-primary"  href="/home">{{ __('tableau de bord') }}</a></li>
                                                @if(Auth::user()->suspend==false)
                                                @if((Auth::user()->role_id )==2)
                                                <li><a class="dropdown-item text text-primary" href="{{route('profile_candidat.index')}}">
                                                {{ __('profile') }}</a></li>
                                                @endif
                                                @if((Auth::user()->role_id )==3)
                                                <li><a class="dropdown-item text text-primary" href="{{route('profile_recruteure.index')}}">
                                                {{ __('profile') }}</a></li>

                                                @endif
                                                @endif
                                                <li><a class="dropdown-item text text-primary"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Se déconnecter') }}</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                    
                                    </ul>
                                   
                                </li>
                                @endif 
                                
                            <!-- ****************************************************** -->
 @endif
 
                </div>
            </div>
        </nav>
       

        <main  class="mb-5">
            @yield('content3')
        </main>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script>
        
        $('.select2').select2({
        closeOnSelect: false
        
        });
     
    </script>
        



</body>
</html>

