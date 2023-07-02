@extends('layouts.app')

@section('content')

<div class="container mt-5">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card ccard h-100">
	<div class="card-body gb-color2">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
                <form method="POST" action="{{ route('profile_recruteure.update',Auth::user()->id ) }}" enctype="multipart/form-data">  
                    @method('PUT')
                    @csrf
                    <div class="my-4">
					<img src="{{ asset('images/recruteure/'. Auth::user()->logo) }}" alt="Maxwell Admin">

                    </div>
                    <h5 class="user-name">{{Auth::user()->nom_societe}}</h5>
				<h6 class="user-email mb-3">{{Auth::user()->email}}</h6>
              
                                <input class="form-control" name="logo"  type="file" id="logo">
                           
				</div>
                <h5 class="user-name mt-5">Description</h5>
                <textarea class="form-control" rows="10" name="description" placeholder="Description"  required >{{Auth::user()->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
               </div>
			
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<nav >
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Informations d'entreprise</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Informations de contact</button>
    <button class="nav-link" id="nav-payment-tab" data-bs-toggle="tab" data-bs-target="#nav-payment" type="button" role="tab" aria-controls="nav-payment" aria-selected="false">Informations de payment</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Paramétre du compte</button>
   
  </div>
</nav>
<div class="tab-content m-5" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
   
    <div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            
				<h6 class="mb-2 text-primary">Informations d'entreprise</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label class="py-3" for="nom_societe">Nom de société</label>
					<input id="nom_societe" type="text" class="form-control form-control @error('nom_societe') is-invalid @enderror" name="nom_societe" value="{{Auth::user()->nom_societe}}" required autocomplete="nom_societe" autofocus>
                    @error('nom_societe')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                     @enderror
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label class="py-3" for="email">Email</label>
					<input type="email" id="email" class="form-control form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                     @enderror
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label class="py-3" for="siege_social">Siege social</label>
                    <input id="siege_social" type="text" class="form-control @error('siege_social') is-invalid @enderror" name="siege_social" value="{{Auth::user()->siege_social}}" required autocomplete="siege_social" autofocus>	
                    @error('siege_social')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
            	</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label class="py-3" for="telephone">Telephone</label>
					<input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{Auth::user()->telephone}}" required autocomplete="telephone" autofocus>	
                    @error('telephone')
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
					<label class="py-3" for="Street">Pays</label>
          <select  name="pays" class="form-control  form-control @error('pays') is-invalid @enderror " >
                          
                                    <option value="maroc" > maroc</option>
                           
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
                            <select  name="ville[]" class="form-control select2  form-control @error('ville') is-invalid @enderror "  multiple="" >
                                @foreach($cities as $city)
                                    <option value="{{$city}}" @if(in_array($city,$selectedville)) selected @endif> {{$city}}</option>
                                @endforeach
                            </select>

                                @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label class="py-3" for="sTate">Code postal</label>
                    <input id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{Auth::user()->code_postal}}" required autocomplete="code_postal" autofocus>		
                	@error('code_postal')
                       <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                        </span>
                     @enderror				</div>
			</div>
			
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class=" pt-4 text-right">
					
					<button type="submit" id="submit" name="submit" class="btn  btn-primary">enregistrer</button>
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
           
				<h6 class="mb-2 text-primary">Informations de contact</h6>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label class="py-3" for="nom">Nom</label>
					<input id="nom" type="text" class="form-control form-control @error('nom') is-invalid @enderror" name="nom" value="{{Auth::user()->nom}}" required autocomplete="nom" autofocus>
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                     @enderror
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label class="py-3" for="phone">prénom</label>
                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{Auth::user()->prenom}}" required autocomplete="prenom" autofocus>	
                    @error('prenom')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
            	</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label class="py-3" for="website">Telephone</label>
					<input id="t_contact" type="text" class="form-control @error('t_contact') is-invalid @enderror" name="t_contact" value="{{Auth::user()->t_contact}}" required autocomplete="t_contact" autofocus>	
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
				<div class=" pt-4 text-right">
					
					<button type="submit" id="submit" name="submit" class="btn  btn-primary">enregistrer</button>
				</div>
			</div>
		</div>
			
		
        </form>
	</div>
</div>







  </div> 
  </div>
  </div>

  <div class="tab-pane fade show active" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab" tabindex="0">
  @if(!Auth()->user()->card)


  @if(session('msg'))
    <div class="alert alert-success text-center">{{ session('msg') }}</div>
@endif
 
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-8">
      <div class="card rounded-3">
        <div class="card-body p-4">
          <div class="text-center mb-4">
            <h3></h3>
            <h3>Payment</h3>
          </div> <img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />              <img class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png" />
        
 <form action="{{route('card.store',0)}}" method="post">
        @csrf
            <p class="fw-bold mb-4">Add new card:</p>

            <div class="form-outline mb-4"> 
   
               
              <input type="text" name="holder" id="formControlLgXsd" class="form-control form-control-lg"
                value="Anna Doe" />
              <label class="form-label" for="formControlLgXsd">Cardholder's Name</label>
            </div>

            <div class="row mb-4">
              <div class="col-7">
                <div class="form-outline"> 
       <input type="text" name="card_number" id="formControlLgXM" class="form-control form-control-lg"
                    value="1234 5678 1234 5678" />
                  <label class="form-label" for="formControlLgXM">Card Number</label>
                </div>
              </div>
              <div class="col-3">
                <div class="form-outline">
                  <input type="password"name="expire" id="formControlLgExpk" class="form-control form-control-lg"
                    placeholder="MM/YYYY" />
                  <label class="form-label" for="formControlLgExpk">Expire</label>
                </div>
              </div>
              <div class="col-2">
                <div class="form-outline">
                  <input type="password" name="cvv"id="formControlLgcvv" class="form-control form-control-lg"
                    placeholder="Cvv" />
                  <label class="form-label" for="formControlLgcvv">Cvv</label>
                </div>
              </div>
            </div>

            <input type="submit" class="btn btn-success btn-lg btn-block" value="Add card" name="submit">
  </form>
        </div>
      </div>
    </div>
  </div>

@else

<div class="row d-flex justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-8">
      <div class="card rounded-3">
        <div class="card-body p-4">
          <div class="text-center mb-4">
            <h3></h3>
            <h3>Payment</h3>
          </div> <img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />              <img class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png" />

          <p class="fw-bold mb-4 pb-2">Saved cards:</p> 

             <div class="d-flex flex-row align-items-center mb-4 pb-1">
             
              <div class="flex-fill mx-3">
                <div class="form-outline">
                  <input type="text" id="formControlLgXc" class="form-control form-control-lg"
                    value="**** **** **** 3193" disa/>
                  <label class="form-label" for="formControlLgXc">Card Number</label>
                </div>
              </div>
              <form action="{{route('delete.destroy',Auth()->user()->card->id)}}" method="post">
                              @method('DELETE')
                              @csrf
                              <input type="submit" class="btn btn-danger  mx-2"  value="supprimer la carte">
                              <input type="hidden" value=1 name="submit">
                          </form>  
            </div> 
        </div>
      </div>
    </div>
  </div>

@endif

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