@extends('layouts.app')
@section('content') 



<!-- Start main details section -->

@if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
@endif

<section class="main-details m-5">
    <div class="container">
        <div class="details-content">
            <div class="header-details">

                <div class="logo  d-flex mb-5  shadow-lg">
                    <img  src="{{asset('images/recruteure/'.$offre->user->logo)}}" style="max-width: 150px;" class="img-responsive" alt="logo">
                    <h2 class="offer-title m-auto px-3">{{$offre->title}}</h2>
                </div>
                
                <div class="header-info  shadow-lg p-5  d-flex">
                        
                    <div class="location pb-5 ">
                        <div class="mb-4"><img src="https://www.m-job.ma/themes/m-job/assets/images/location-gray.png" alt="#">

                        <b >{{$offre->ville}}</b>
                    </div>
                        
                    
                    <ul class="list-details">
                        <li class="mb-3">
                            <b>Société: </b>
                            <h5>{{$offre->user->nom_societe}}</h5>
                        </li>
                        <li class="mb-3">
                            <b>Type de contrat: </b>
                            <h5> {{$offre->type_contrat}}</h5>
                        </li>
                        <li class="mb-3">
                            <b>Salaire: </b>
                            <h5>{{$offre->salaire}}</h5>
                        </li>
                        <li class="mb-3">
                            <b>d'niveau_experience: </b>
                            <h5>{{$offre->niveau_experience}}</h5>
                        </li>
                        <li class="mb-3" >
                            <b>Neveau d'etude: </b>
                            <h5>{{$offre->niveau_etude}}</h5>
                        </li>
                    </ul> 
                </div>
                    <div class="the-content p-4 fs-5 mt-4 mx-5" > {{$offre->description}}</div>

                </div>
            </div>
            
            @if(Auth::check()&&((Auth::user()->role_id)==2))
            <div class="d-flex  justify-content-center py-5 ">
            @if(isset(Auth::user()->info))
            <form method="POST" action="{{ route('candidature.store',$offre->id ) }}" enctype="multipart/form-data">  
                    @method('POST')
                    @csrf
                    <button type="submit" class="text-decoration-none bg-primary py-3 px-4 text-light rounded-3" >
                                    {{ __('Postuler') }}
                    </button>
            </form>
            @else
            <a href="{{route('candidature.index',$offre->id)}}" class="text-decoration-none bg-primary py-3 px-4 text-light rounded-3">Postuler (cv)</a>
            @endif
        </div>
            @endif

</section>

@endsection  