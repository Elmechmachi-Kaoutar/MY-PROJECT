@extends('layouts.app')

@section('content')



    <div class="container">

    <div class="container ">
        <div class="row justify-content-center  py-5">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="container my-5">
                        <div class="row justify-content-center  ">
                            <div class="col-6 col-md-4 ">
                                <img src="{{ asset('images/candidat/'. Auth::user()->image) }}"class="img-fluid rounded-circle shadow-lg">
                            </div>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


    <div class="d-flex  justify-content-center py-5 ">
        <h1>{{ __('Les offres du moment ') }}</h1>
    </div> 



    <div class="container p-3  ">
        <div class="row text-center justify-content-center"> 
            @foreach($lastFiveCreatedAt as $offre)
            <a href="{{route('offre.show',$offre)}}" class="text-decoration-none text-dark col-md-6 col-lg-4 mb-5">
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
          </deeiv>
          </a>
        @endforeach
      </div>
      </div>

    </div>
</div>




@endsection
