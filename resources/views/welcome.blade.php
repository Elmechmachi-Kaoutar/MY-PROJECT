@extends('layouts.bootstrap')

@section('content3')

        <header class="masthead" id="page-top">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">VOTRE ENDROIT PRÉFÉRÉ POUR TROUVER L'EMPLOI DE VOS RÊVES</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Start Bootstrap can help you build better websites using the Bootstrap framework! Just download a theme and start customizing, no strings attached!</p>
                        <a class="btn text-light btn-xl"  href="#about">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>

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



  <section class="about section-padding" id="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-12 col-12">
					<div class="about-img"><img alt="" class="img-fluid"  src="{{asset('images/home/1.jpg')}}"></div>
				</div>
				<div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
					<div class="about-text">
						<h2>Nous fournissons la meilleure qualité Services jamais</h2>
						<p>Nous savons que la recherche d'un travail peut être un processus difficile et stressant, 
              c'est pourquoi nous sommes là pour vous aider à chaque étape du chemin. Que vous soyez à la recherche d'un emploi à temps plein, 
              à temps partiel ou d'un stage, nous avons des offres d'emploi pour répondre à vos besoins.Il ne manque plus que vous, rejoignez-nous</p><a class="btn  text-light btn-xl" href="/sinscrire">s'inscrire</a>
					</div>
				</div>
			</div>
		</div>
	</section>


  <section class="portfolio " id="portfolio">
  <div class="d-flex  justify-content-center py-5 ">
        <h1>{{ __('Les offres du moment ') }}</h1>
    </div> 


	<div class="container p-3  ">
        <div class="row text-center justify-content-center"> 
            @foreach($offres as $offre)
            <a href="{{route('offre.show',$offre)}}" class="text-decoration-none text-dark col-md-6 col-lg-3 mb-5">
            <div class="card cardd shadow-lg">
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
        </a>
        @endforeach
    </div>
        </div>
        </div>
	</section>


 
  




  <!-- team starts -->
	<section class="team " id="team">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header text-center pb-5">
						<h2> LES ENTREPRISES QUI RECRUTENT </h2>
					
					</div>
				</div>
			</div>
			<div class="row">
			@foreach($societes as $societe)
			<div class="col-md-6 col-sm-1 col-lg-3 mb-5 ">
                <div class="card shadow-lg">

                    <img class="img-fluid " src="{{asset('images/recruteure/'.$societe->logo)}}" alt="Card image cap">
                        <div class="card-body ">
                                <b class="card-title d-block-non">{{$societe->nom_societe}}</b>
                        </div>
                </div>
            </div>
			@endforeach
			</div>
		</div>
	</section>

  <script src="js/bootstrap.bundle.min.js"></script> 
</html>

@include('layouts.footer')
@endsection