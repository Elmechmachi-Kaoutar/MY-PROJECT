@extends('dashboard.admin')

@section('content4')





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
                    <li class="mb-3" >
                        <b>état: </b>
                        <h5>{{$offre->etat}}</h5>
                    </li>
                </ul> 
            </div>
            
                <div class="the-content p-4 fs-5 mt-4 mx-5" >
                <div><h2 class="offer-title m-auto px-3">{{$offre->title}}</h2></div>
                <div>{{$offre->description}}</div>
                 
                </div>

           

        </div>
        
      

</section>




@endsection






<!-- 








<h1 class="row text-center justify-content-center my-5">modefier  l'offre</h1>

    <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             

                <div class="card-body my-5">
                <form method="POST" action="{{route('demand.update', $offre->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                        <label for="etat" class="col-md-4 col-form-label text-md-end">{{ __("l'état de la demande") }}</label>

                        <div class="col-md-6">
                            <select id="etat" type="text"   class="form-control @error('niveau_etude') is-invalid @enderror" name="etat"  autocomplete="current-niveau_etude" >
                                
                                    <option value=""></option>
                                    <option value="treatment de  CVS">treatment de  CVS</option>
                                    <option value="les entretien">les entretien</option>
                                    <option value="envoi le candidat">envoi le candidat</option>
                        
                            </select>
                        
                        </div>
                        </div> 
        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('enregitrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 -->
