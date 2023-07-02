@extends('layouts.app')

@section('content')
@php
     $id = auth()->user()->id;
     $cvExists = \App\Models\InfoCandidat::where('user_id', $id)->exists();
@endphp
<div class="container mt-5">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card ccard h-100">
    <div class="card-body gb-color">
        <div class="account-settings">
            <div class="user-profile">
                
                <div class="user-avatar">
                <form method="POST" action="{{ route('profile_candidat.update',Auth::user()->id ) }}" enctype="multipart/form-data">  
            @method('PUT')
            @csrf
                    <img src="{{ asset('images/candidat/'. Auth::user()->image) }}" alt="Maxwell Admin">
                </div>
                
                <h5 class="user-name">{{Auth::user()->nom}} {{Auth::user()->prenom}}</h5>
                <h6 class="user-email mb-5">{{Auth::user()->email}}</h6>
                <input class="form-control my-3" name="image"  type="file" id="image">
            </div>
            
        </div>
    </div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<nav >
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Informations de contact</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Informations supplémentaires</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Paramétre du compte</button>
   
  </div>
</nav>
<div class="tab-content  m-5" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
   
    <div class="card h-100">
    <div class="card-body">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          
            
                <h6 class="mb-2 text-primary">Informations de contact</h6>
                
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label class="py-3" for="nom">Nom</label>
                    <input id="nom" type="text" class="form-control form-control @error('nom') is-invalid @enderror" name="nom" value="{{Auth::user()->nom}}" required autocomplete="nom" >
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label class="py-3" for="email">Email</label>
                    <input type="email" id="email" class="form-control form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label class="py-3" for="phone">prénom</label>
                    <input id="t_contact" type="text" class="form-control @error('t_contact') is-invalid @enderror" name="prenom" value="{{Auth::user()->prenom}}" required autocomplete="prenom" >    
                    @error('t_contact')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label class="py-3" for="website">Telephone</label>
                    <input id="t_contact" type="text" class="form-control @error('t_contact') is-invalid @enderror" name="t_contact" value="{{Auth::user()->t_contact}}" required autocomplete="t_contact" >   
                        @error('t_contact')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
            </div>
        </div>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mt-3 mb-2  text-primary">Addresse</h6>
               
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                <label class="py-3" for="pays">pays</label>pays
                    <select id="pays"  class="form-control @error('pays') is-invalid @enderror" name="pays" required autocomplete="pays"  >
                                    <option value="maroc">Maroc</option>
                            </select>
                            @error('pays')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label class="py-3" for="ciTy">Ville</label>
                    <select id="ville"  class="form-control @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville"  >
                                @foreach ($cities as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>

                                @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror               </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label class="py-3" for="sTate">Code postal</label>
                    <input id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{Auth::user()->code_postal}}" required autocomplete="code_postal" >     
                    @error('code_postal')
                       <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                        </span>
                     @enderror              </div>
            </div>
            
        </div>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class=" pt-4 text-right">
                    
                    <button type="submit" id="submit" name="submit" class="btn  btn-primary">enregistrer</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
   
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
    
    <div class="card h-100">
    <div class="card-body">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            @if($cvExists)    
            <form method="POST" action="{{ route('deposer-mon-cv.update',Auth::user()->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @else
            <form method="POST" action="{{ route('deposer-mon-cv.store')}}" enctype="multipart/form-data">  
            @csrf
            @endif
            <input type="hidden" value="E" name="store">
            
                <h6 class="mb-2 text-primary">Informations supplémentaires</h6>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label class="py-3" for="niveau_experience">Niveau d'etude</label>
                    <select id="niveau_etude"  class="form-control"  name="niveau_etude" required autocomplete="niveau_etude"  >
                                    @foreach($etuds as $etud)
                                    <option value="{{$etud}}">{{$etud}}</option>   
                                    @endforeach
                                  
                               
                            </select>

                                
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label class="py-3" for="niveau_experience">Niveau d'expérience</label>
                    <select id="niveau_experience"  class="form-control"  name="niveau_experience" required autocomplete="niveau_experience"  >
                               
                                    @foreach($experiences as $experience)
                                    <option value="{{$experience}}">{{$experience}}</option>
                                    @endforeach
                                    
                                  
                               
                            </select>

                                
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label class="py-3" for="secteur_actuel">Secteur actuel</label>
                    <select id="secteur_actuel"  class="form-control"  name="secteur_actuel" required autocomplete="secteur_actuel"  >
                                    @foreach($secteurs as $secteur)
                                    <option value="{{$secteur}}">{{$secteur}}</option>
                                   @endforeach
                            </select>

                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label class="py-3" for="remuneration_actuelle">Rémunération actuelle</label>
                    <select id="remuneration_actuelle"  class="form-control"  name="remuneration_actuelle" required autocomplete="remuneration_actuelle"  >
                                    @foreach($moneys as $money)
                                    <option value="{{$money}}">{{$money}}</option>
                                    @endforeach                    
                    </select>                   
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    
                   
                     @if($cvExists )
                     <label class="py-3" for="website"> <a  href="{{ asset('images/candidat/cv/' . Auth::user()->info->cv )}}">Mon CV</a></label>
                    
                     @else
                     <label class="py-3" for="website">Mon CV</label>
                     @endif 
                    <input id="cv" type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" autocomplete="cv" >
                    @error('cv')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                
                     @if($cvExists )
                     <label class="py-3" for="website"> <a  href="{{ asset('images/candidat/lettre_motivation/' . Auth::user()->info->lettre_motivation)}}">Lettre de motivation</a></label>
                    
                     @else
                     <label class="py-3" for="website">Lettre de motivation</label>
                     @endif 
                    <input id="lettre_motivation" type="file" class="form-control @error('lettre_motivation') is-invalid @enderror" name="lettre_motivation"  autocomplete="lettre_motivation" >
                    @error('lettre_motivation')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class=" pt-4 text-right">
                    
                @if($cvExists ) 
                   <button type="submit" id="submit" name="submit" class="btn  btn-primary">modifier</button>
                @else
                <button type="submit" id="submit" name="submit" class="btn  btn-primary">deposer</button>
                @endif
                
                </div>
            </div>
        </div>
        </form>
        @if($cvExists=='NULL' ) 
                <form action="{{ route('deposer-mon-cv.destroy',$id )}}" method="post">
                @method('DELETE')
                @csrf
                    <button type="submit" id="submit" name="submit" class="btn  btn-danger mt-2">supprimer</button>
                    <input type="hidden" value=1 name="submit">
                </form>
                @endif
    </div>
</div>
  </div> 
  </div>
  </div>
            
            <div class="tab-pane fade container gb-color m-5" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                <form action="{{ route('home.show', ['id' => Auth::user()->id]) }}" method="get">
                    @csrf
                    <div class ="p-3">
                         <label class="d-block text-danger">Supprimer le compte</label>
                    <p class="text-muted font-size-sm">Une fois que vous avez supprimé votre compte, il n'y a plus de retour en arrière. Soyez certain.</p>
                        
                    <button class="btn btn-danger" type="submit">Supprimer le compte</button>
                    </div>
                   
            </form>
            </div>

</div>
</div>

@endsection