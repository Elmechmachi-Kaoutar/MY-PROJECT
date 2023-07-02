@extends('layouts.bootstrap')

@section('content3')

<section class="py-5 bg-primary text-light " id="about">
            <div class="container pt-5">
                <div class="row justify-content-center  pt-4">
                    <div class="col-lg-8  text-center">
                        <h2 class="text-white ">Trouvez votre futur job parmi {{count($toute_offres)}} postes ouverts</h2>
                        <hr class="divider divider-light" /> 
                            <form action="{{route('rechercher')}}" method="post"> 
                            @method('POST')
                            @csrf
                            <div class="container d-flex  my-3 ">
                                <select name="type_contrat[]" data-placeholder="Contrat"  class="  form-control select2  form-control @error('contart') is-invalid @enderror " multiple="">
                                    @foreach($contrats as $contrat)
                                    <option value="{{$contrat}}">{{$contrat}}</option>
                                    @endforeach
                                </select> 
                                <select  name="secteur[]"  data-placeholder="secteur"   class=" form-control select2  form-control @error('secteur') is-invalid @enderror "  multiple="" >
                                    @foreach($secteurs as $secteur)
                                        <option value="{{$secteur}}">{{$secteur}}</option>
                                    @endforeach
                                </select> 
                                <select  name="ville[]"  data-placeholder="Ville"   class="form-control select2  form-control @error('ville') is-invalid @enderror "  multiple="" >
                                    @foreach($cities as $city)
                                        <option value="{{$city}}">{{$city}}</option>
                                    @endforeach
                                </select> 
                            
                            </div> 
                                <input type="submit" class="btn  btn-xl bg-white text-dark " value="RECHERCHER" >
                            </div>
                          </form>  
                        </div>
                    </div>
                </section>

<h1 class="row text-center justify-content-center my-5">  TOUTE LES OFFRES    </h1>
@if($result)
<div class="container p-3  ">
  <div class="row text-center justify-content-center"> 
      @foreach($result as $offre)
      <a href="{{route('offre.show',$offre)}}" class="text-decoration-none text-dark col-md-6 col-lg-4 mb-5">
      <div class="card cardd shadow-lg ">
      <img class="img-fluid " src="{{asset('images/recruteure/'.$offre->user->logo)}}" alt="Card image cap">

        <div class="card-body">
          <h3 class="card-title"> {{\Illuminate\Support\Str::limit($offre->title, $limit = 30, $end = '...')}} </h3>
            <h5 class="card-title"> {{$offre->user->nom_societe}} </h5>
            <p class="card-text"> {{\Illuminate\Support\Str::limit($offre->description, $limit = 300, $end = '...')}}</p>
          </div>
          <div class="card-footer">
            <small class="text-muted"> {{$offre->created_at}}</small>
          </div>
      </div>
    </deeiv>
    </a>
  @endforeach
</div>
</div>
@endif
 @endsection