@extends('layouts.app')
@section('content')   
      
  
    @if((Auth::user()->role_id)==3)
    <h1 class="row text-center justify-content-center pt-5 ">  MES OFFRES    </h1>

    @foreach($offres as $offre)

    @php                   
        $candidaturs = \App\Models\Candidature::where('offre_id', $offre->id)->get();
        if($candidaturs) $nb=count($candidaturs);
    @endphp

    @if(session('message'))
    <div class="alert alert-success text-center">{{session('message')}}</div>
@endif 

    <div class="container pt-3 mt-5 ">
        <div class="row text-center justify-content-center">
          <div>
            <div class="card  shadow-lg">
              
              <div class="card-body">
                <h3 class="card-title">{{$offre->title}}</h3>
                  <h5 class="card-title">    {{$offre->salaire}}</h5>
                  <p class="card-text"> {{\Illuminate\Support\Str::limit($offre->description, $limit = 400, $end = '...')}}</p>
                </div>
                <div class="card-footer d-flex py-3 ">
                    <div class="delete_edit d-flex ">
                          <form action="{{route('offre.destroy',$offre->id)}}" method="post">
                              @method('DELETE')
                              @csrf
                              <input type="submit" class="btn btn-danger  mx-2"  value="supprimer">
                              <input type="hidden" value=1 name="submit">
                          </form>    
                          <a href="{{route('offre.edit',$offre->id)}}" class="px-4 btn btn-success">modifier</a>
                          <a href="{{route('offre.show',$offre)}}" class="mx-2 btn btn-primary">détails</a>

                    </div>
                    <a  href="{{route('show_candidature.show',$offre->id)}} " ><button type="button" class="btn btn-primary position-relative">
                    <i class="bi bi-person-lines-fill text-light"></i>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                      {{$nb}}+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                  </a>      
                </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif


      @if((Auth::user()->role_id)==2)

      <section class="ml-5 py-5 bg-primary text-light " id="about">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-lg-8  text-center">
                        <h2 class="text-white ">Trouvez votre futur job parmi {{count($toute_offres)}} postes ouverts</h2>
                        <hr class="divider divider-light" /> 
                            <form action="{{route('rechercher')}}" method="post"> 
                            @method('POST')
                            @csrf
                            <div class="container d-flex  my-3 ">
                                 
                                <select name="type_contrat[]" data-placeholder="Contrat"  autocomplete="type_contrat" autofocus class="  form-control select2  form-control @error('type_contrat') is-invalid @enderror " multiple="">
                                    @foreach($contrats as $contrat)
                                    <option value="{{$contrat}}">{{$contrat}}</option>
                                    @endforeach
                                    
                                    @error('contart')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </select> 
                                <select  name="secteur[]"  data-placeholder="secteur"  autocomplete="secteur" autofocus  class=" form-control select2  form-control @error('secteur') is-invalid @enderror "  multiple="" >
                                    @foreach($secteurs as $secteur)
                                        <option value="{{$secteur}}">{{$secteur}}</option>
                                    @endforeach
                                    @error('secteur')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </select> 
                                <select  name="ville[]"  data-placeholder="Ville"  autocomplete="ville" autofocus   class="form-control select2  form-control @error('ville') is-invalid @enderror "  multiple="" >
                                    @foreach($cities as $city)
                                        <option value="{{$city}}">{{$city}}</option>
                                    @endforeach
                                    @error('ville')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </select>     
                            </div> 
                               
                                <input type="submit" class="btn  btn-xl bg-white text-dark" value="RECHERCHER" >
                            </div>
                          </form>  
                        </div>
                    </div>
                </section>

        
      <h1 class="row text-center justify-content-center my-5">  TOUTE LES OFFRES    </h1>

      <div class="container p-3  ">
        <div class="row text-center justify-content-center"> 
            @foreach($offres as $offre)
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