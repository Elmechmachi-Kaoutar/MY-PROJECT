
@extends('dashboard.admin')

@section('content4')   

<h1 class="row text-center justify-content-center my-5">modifie les package</h1>

    
    <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             

                <div class="card-body my-5">
                <form method="POST" action="{{route('packages.update',$package->id )}}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('prix/mois') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="prix" value="{{ $package->prix }}" autocomplete="title" autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __("nombre d'offre") }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="nb_offre" value="{{ $package->nb_offre }}" autocomplete="title" autofocus>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __("delivery") }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="delivery" value="{{ $package->delivery }}" autocomplete="title" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __("email support") }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="email" value="{{ $package->email }}" autocomplete="title" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __(" premuim support") }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="support" value="{{ $package->support }}" autocomplete="title" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __("nombre candiat par demand") }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="nb_candidat" value="{{ $package->nb_candidat}}" autocomplete="title" autofocus>
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



@endsection

