



@extends('layouts.app')

@section('content')   

<h1 class="row text-center justify-content-center mt-4 ">créer une nouvelle offre</h1>

    
    <div class="container my-5 p-5 shadow-lg rounded-5 bg-light">
    <div class="row justify-content-center ">


    <form method="POST" action="{{ route('offre.store')}}">
        @csrf

  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">        <label class="form-label" for="form6Example1">ville</label>
      <select  name="ville[]"  class=" select2  form-control @error('ville') is-invalid @enderror "  multiple="" >
                                @foreach($cities as $city)
                                    <option value="{{$city}}">{{$city}}</option>
                                @endforeach
                            </select>
                                @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

      </div>
    </div>
    <div class="col">
      <div class="form-outline"> <label class="form-label" for="form6Example2">langue</label>
      
        <select name="cities[]"    multiple=""  class="form-control @error('ville') is-invalid @enderror  select2 ">
                                @foreach($langues as $langue)
                                    <option value="{{$langue}}">{{$langue}}</option>
                                @endforeach   
                                  
                        </select>
                            @error('langue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
       
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">      <label class="form-label" for="form6Example1">niveau d'experience</label>
      <select id="niveau_experience" value="{{ old('niveau_experience') }}"  type="text" class="form-control @error('niveau_experience') is-invalid @enderror" name="niveau_experience"  autocomplete="current-niveau_experience">

@foreach($experiences as $niveau_experience)
    <option value="{{$niveau_experience}}">{{$niveau_experience}}</option>
@endforeach

</select>
@error('niveau_experience')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
  
      </div>
    </div>
    <div class="col">
      <div class="form-outline">   <label class="form-label" for="form6Example2">niveau d'etude</label>
      <select id="niveau_etude" type="text" value="{{ old('niveau_etude') }}"  class="form-control @error('niveau_etude') is-invalid @enderror" name="niveau_etude"  autocomplete="current-niveau_etude" >
                                @foreach($etuds as $niveau_etude)
                                    <option value="{{$niveau_etude}}">{{$niveau_etude}}</option>
                                @endforeach
                            </select>
                            @error('niveau_etude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
     
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">        <label class="form-label" for="form6Example1">type de contrat</label>

      <select id="type_contrat" type="text" value="{{ old('type_contrat') }}"  class="form-control @error('type_contrat') is-invalid @enderror" name="type_contrat"  autocomplete="current-type_contrat" >
                                @foreach($type_contrats as $type_contrat)
                                    <option value="{{$type_contrat}}">{{$type_contrat}}</option>
                                @endforeach
                            </select>
                            @error('type_contrat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
      </div>
    </div>
    <div class="col">
      <div class="form-outline">        <label class="form-label" for="form6Example2">salaire</label>

      <select id="salaire" type="text" value="{{ old('salaire') }}"  class="form-control @error('salaire') is-invalid @enderror" name="salaire"  autocomplete="current-salaire" >
                                @foreach($salaires as $salaire)
                                    <option value="{{$salaire}}">{{$salaire}}</option>
                                @endforeach
                            </select>
                                @error('salaire')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
      </div>
    </div>
  </div>  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">        <label class="form-label" for="form6Example1">secteur</label>

      <select id="secteur" type="text" value="{{ old('secteur') }}"  class="form-control @error('secteur') is-invalid @enderror" name="secteur"  autocomplete="current-secteur" >
                                @foreach($secteurs as $secteur)
                                    <option value="{{$secteur}}">{{$secteur}}</option>
                                @endforeach
                            </select>
                                @error('secteur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
      </div>
    </div>
    <div class="col">
      <div class="form-outline">        <label class="form-label" for="form6Example2">titre</label>

      <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autocomplete="title" autofocus>

@error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
      </div>
    </div>
  </div>
  <!-- Message input -->
  <div class="form-outline mb-4">    <label class="form-label" for="form6Example7">description</label>

  <textarea cols="30" rows="10" id="description" type="description" value="{{ old('description') }}"  class="form-control @error('description') is-invalid @enderror" name="description"  autocomplete="current-description"></textarea>

@error('description')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
  </div>



  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">enregitrer</button>
</form>
    </div>
</div>



@endsection



