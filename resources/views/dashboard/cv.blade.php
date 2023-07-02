@extends('layouts.app')
@section('content')   




<div class="container mt-5">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card ccard h-100">
    <div class="card-body gb-color1">
        <div class="account-settings">
            <div class="user-profile">
                <div class="user-avatar">
                
                    
                  
                <img src="{{ asset('images/candidat/'. $CV->user->image) }}" alt="Maxwell Admin">   
     
               
  
                </div>
                <h5 class="user-name mt-4">{{$CV->user->nom}} {{ $CV->user->prenom}}</h5>
                <h6 class="user-email">{{ $CV->user->email}}</h6>
         
               
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
   
  </div>
</nav>
<div class="tab-content  m-5" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
   
    <div class="card h-100">
    <div class="card-body">
        <div class="row gutters ">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            
                <h6 class="mb-2 text-primary">Informations de contact</h6>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>Nom:</b>
                    <div><label class="py-3" for="nom">{{ $CV->user->nom}}</label>
                    </div> 
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>Email:</b>
                    <div><label class="py-3" for="email">{{$CV->user->email}}</label></div>
            
                    
                    
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>prénom:</b>
                    <div><label class="py-3" for="phone">{{$CV->user->prenom}}</label></div>   
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>Telephone:</b>
                    <div><label class="py-3" for="website">{{$CV->user->t_contact}}</label></div>    
                </div>
            </div>
        </div>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mt-3 mb-2  text-primary">Addresse</h6>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>pays:</b>
                    <div><label class="py-3" for="pays">{{$CV->user->pays}}</label></div>    
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>Ville:</b>
                    <div> <label class="py-3" for="ciTy">{{$CV->user->ville}}</label></div>                   
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>Code postal:</b>
                    <div><label class="py-3" for="sTate">{{$CV->user->code_postal}}</label></div>       
             </div>
            </div>
            <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class=" pt-4 text-right">
               

                <form action="{{route('contact.store',$CV->user->id)}}" method="post">
                  @csrf
                  <input type="submit"  class="btn btn-primary mx-2" value="conatcter">
                 </form>
                         
                </div>
            </div>
        </div>
            
        </div>
        
    </div>
</div>
   
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
    
    <div class="card h-100">
    <div class="card-body">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

           
                <h6 class="mb-2 text-primary">Informations supplémentaires</h6>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>Niveau d'etude:</b>
                    <div><label class="py-3" for="niveau_experience">{{$CV->niveau_etude}}</label></div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>Niveau d'expérience:</b>
                    <div><label class="py-3" for="niveau_experience">{{$CV->niveau_experience}}</label></div>
                 </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>Secteur actuel:</b>
                    <div><label class="py-3" for="secteur_actuel">{{$CV->secteur_actuel}}</label></div>
                 </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>Rémunération actuelle:</b>
                    <div><label class="py-3" for="remuneration_actuelle">{{$CV->remuneration_actuelle}}</label></div>                  
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                     <b>cv: </b>
                     <a  href="{{ asset('images/candidat/cv/' . $CV->cv) }}">telecharger</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <b>lettre de motivation : </b>
                    <a  href="{{ asset('images/candidat/lettre_motivation/' . $CV->lettre_motivation) }}">telecharger</a>

                </div>
            </div>
            
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class=" pt-4 text-right">
               

                <form action="{{route('contact.store',$CV->user->id)}}" method="post">
                  @csrf
                  <input type="submit"  class="btn btn-primary mx-2" value="conatcter">
                 </form>
                         
                </div>
            </div>
        </div>
       
    </div>
</div>
  </div> 
  </div>
  </div>

</div>
</div>







@endsection 