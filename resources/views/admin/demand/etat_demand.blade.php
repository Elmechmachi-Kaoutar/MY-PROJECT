@extends('dashboard.admin')

@section('content4')
      
@if(session('message'))
    <div class="alert alert-success text-center">{{ session('message') }}</div>
@endif 
 
    <h1 class="row text-center justify-content-center pt-5 ">  LES DEMANDS    </h1>

    @foreach($demands as $offre)
    @if($offre->etat!='')

    <section class="main-details m-5">
    <div class="container">
        <div class="details-content">
            <div class="header-details">

                
                
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
                        <li class="mb-3" >
                            <b>état: </b>
                            <h5>{{$offre->etat}}</h5>
                        </li>
                    </ul> 
                </div>
                
                    <div class="the-content p-4 fs-5 mt-4 mx-5">
                    <div><h2 class="offer-title m-auto px-3">{{$offre->title}}</h2></div>
                    <div>{{$offre->description}}</div>
                     
                    </div>

                    </div>
                    
                          <a href="{{route('demand.edit',$offre->id)}}" class="px-4 btn btn-success">modifier  l'état</a>
                    </div>
                      
@endif
            </div>
            
          

</section>
@endforeach
@endsection 