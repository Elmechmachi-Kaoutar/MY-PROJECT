

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MY JOB</title>

    @vite(['resources/sass/slide.scss', 'resources/js/slide.js'])
    @vite(['resources/sass/app2.scss', 'resources/js/app2.js'])
    @vite(['resources/sass/app.scss'])
    @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])

    
    <style>
        .list{
            height: 400px; /* Set a fixed height */
            overflow-y: scroll; /* Enable scrolling */
        }
        .card {
    position: relative;
    overflow: hidden;
}

.card:hover .image-wrapper img {
    filter: brightness(0.5) invert(0.1); /* Apply filter on hover */
}

.card-links {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translate(0, -50%);
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
    text-align: center;
    width: 100%;
}

.card:hover .card-links {
    opacity: 1;
    pointer-events: auto;
}

.card-link {
    display: block;
    text-align: center;
    background-color: #00BFFF;
    color: #ffffff;
    padding: 100px 30px 100px 30px ;
    margin-bottom: 100px;
    border-radius: 10px;
    font-size: 16px;
}

.image-wrapper {
    position: relative;
}

.image-wrapper img {
    transition: filter 0.4s ease; /* Add transition for smooth effect */
}



.cardd-link {
    display: block;
    text-align: center;
    background-color: #ffffff;
    color: #000000;
    padding: 250px 30px 10px 30px ;
    margin:  0 10 80 0;
    border-radius: 10px;
    font-size: 18px;
    width: 100%; /* Add this line to set the width */
    
}




    </style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">





</head>

<body class="sb-nav-fixed">

@include('layouts.navbaradmin')
        @include('layouts.sidebaradmin')

      
            <div id="layoutSidenav_content">
                <main class="mx-5">
                    <div class="container-fluid p-5" >
                     
                    @if(!Request::routeIs('home')) 
                    <ol class="breadcrumb  " style="background-color: #fd7e14 ;">
                    <h3 class=" text-center container text-light">   @yield('title') </h3>
                    </ol>
                    @else
                    <ol class="breadcrumb py-4 " style="background-color: #fd7e14 ;">
                    <h3 class=" text-center container text-light">   Tableau de bord </h3>
                    </ol>
                    <div class="container">
        
            <div class="card-columns">

            <div class="card carddd" style="background-color: #00BFFF;">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="image-wrapper">
                            <img src="{{asset('images/admin/suspend.jpg')}}" class="card-img-top" alt="Accroche HTML">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">COMPTES SUSPENDUS</h3>
                        </div>
                    </a>
                    <div class="card-links d-flex justify-content-center align-items-center">
                        <a href="{{route('suspend_candidat')}}" class="card-link">candidat</a>
                        <a href="{{route('suspend_recruteure')}}" class="card-link">recruteur</a>
                    </div>
                </div>  

             
            
                <div class="card carddd " style="background-color:  #fd7e14;">
                <a href="{{ route('demand.index') }}" class="text-decoration-none text-dark">
                    <img src="{{asset('images/admin/demands.jpg')}}" class="card-img-top" alt="Accroche HTML">
                    <div class="card-body ">
                        <h3 class="card-title">LES DEMANDS </h5>
                    </div>
                    </a>
                </div>

                <div class="card  bg-primary text-light">
                    <div class="card-body">
                        <h3 class="card-title text-center container my-5">BONJOUR ADMIN</h5>
                    </div>
                </div>
        
            

                  <div class="card carddd" style="background-color: 	#00BFFF;">
                    <a href="{{route('packages.index')}}" class="text-decoration-none text-dark">
                        <img src="{{asset('images/admin/pack.jpg')}}" class="card-img-top" alt="Accroche HTML">
                        <div class="card-body">
                            <h3 class="card-title">PACKAGES</h5>
                        </div>
                    </a>
                </div>


                <div class="card carddd" style="background-color: #00BFFF;">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="image-wrapper">
                            <img src="{{asset('images/admin/users.jpg')}}" class="card-img-top" alt="Accroche HTML">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">UTILISATEURS</h3>
                        </div>
                    </a>
                    <div class="card-links d-flex justify-content-center align-items-center">
                        <a href="{{route('candidat')}}" class="card-link">candidat</a>
                        <a href="{{route('recruteure')}}" class="card-link">recruteur</a>
                    </div>
                </div>



                
                
                <div class="card carddd" style="background-color:  #fd7e14;">
                <a href="{{route('demands')}}" class="text-decoration-none text-dark">
                    <img src="{{asset('images/admin/newusers.jpg')}}" class="card-img-top" alt="Accroche HTML">
                    <div class="card-body">
                        <h3 class="card-title">NOUVEAUX RECRUTEURS</h5>
                    </div>
                    </a>
                </div>

            </div>
        </div>
                           
                        <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card carddd mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card carddd mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> -->

                        @endif
                        <div class="card carddd mb-4">
                          
                            @yield('content4')
                        </div>

                    </div>
                </main>
               
            </div>
            
            
        </div>
         
          </body>







