@extends('package.packages')

@section('content8') 

@if(Auth()->user()->package_id && $package)
@if($nb_demand>=$package->nb_offre)  

<div class="row text-center justify-content-center my-5 gb-color" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
    
        <div class="p-4">
        
        <p class="text-muted font-size-sm">Vous avez dépassé le nombre de demandes autorisées. Veuillez renouveler votre abonnement</p>
               
        <a class="btn btn-danger" href="{{route('packages.index')}}">Payer</a>
        </div>
   </form>
  </div>
@else
<h1 class="row text-center justify-content-center my-5">créer une nouvelle demande </h1>

    
    <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             

                <div class="card-body my-5">
                    <form method="POST" action="{{ route('demand.store')}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('titre') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>

                            <div class="col-md-6">
                                <textarea cols="30" rows="10" id="description" type="description" value="{{ old('description') }}"  class="form-control @error('description') is-invalid @enderror" name="description"  autocomplete="current-description"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="secteur" class="col-md-4 col-form-label text-md-end">{{ __('secteur') }}</label>

                            <div class="col-md-6">
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

                        <div class="row mb-3">
                            <label for="ville" class="col-md-4 col-form-label text-md-end">{{ __('ville') }}</label>

                            <div class="col-md-6">
                            <select  name="ville[]"  class="form-control select2  form-control @error('ville') is-invalid @enderror "  multiple="" >
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


                        <div class="row mb-3">
                            <label for="salaire" class="col-md-4 col-form-label text-md-end">{{ __('salaire') }}</label>

                            <div class="col-md-6">
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

                            
                        <div class="row mb-3">
                        <label for="type_contrat" class="col-md-4 col-form-label text-md-end">{{ __('type de contrat') }}</label>

                        
                        <div class="col-md-6">
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


                        <div class="row mb-3">
                        <label for="niveau_etude" class="col-md-4 col-form-label text-md-end">{{ __("niveau d'etude") }}</label>

                        <div class="col-md-6">
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


                        <div class="row mb-3">
                        <label for="niveau_experience" class="col-md-4 col-form-label text-md-end">{{ __("niveau d'experience") }}</label>

                        <div class="col-md-6">
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

                        <div class="row mb-3">
                        <label for="langue" class="col-md-4 col-form-label text-md-end">{{ __('langue') }}</label>

                        <div class="col-md-6">
                        <select name="langues[]"    multiple=""  class="form-control @error('ville') is-invalid @enderror  form-control select2 ">
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


@endif
@endif



@endsection