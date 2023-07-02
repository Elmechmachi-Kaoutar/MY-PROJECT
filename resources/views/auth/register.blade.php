@extends('layouts.app')

@section('content')
<body class="boody">
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class=" pt-3 text-center fs-4  text text-primary ">{{ __('Register Candidat') }}</div>
                <hr  class="border border-primary border-3" >
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}"enctype="multipart/form-data">  
                        
                    @csrf
                    <input type="hidden" name="description" value="NULL">
                    <input type="hidden" name="nom_societe" value="NULL" >
                    <input type="hidden" name="siege_social" value="NULL" >
                    <input type="hidden" name="telephone" value="NULL">
                    <input type="hidden" name="logo" value="NULL">
                    <input type="hidden" name="role_id" value="2" >
                    <input type="hidden" name="package_id" value="0" >


                    <h5 class="  text text-primary">Informations de contact</h5>

                    <div class="row mb-3">
                        <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('nom') }}</label>

                        <div class="col-md-6">
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}"  autocomplete="nom" autofocus>

                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('prenom') }}</label>

                        <div class="col-md-6">
                            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" autocomplete="prenom" autofocus>

                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                        
                    <div class="row mb-3">
                            <label for="t_contact" class="col-md-4 col-form-label text-md-end">{{ __('Telephone') }}</label>

                            <div class="col-md-6">
                                <input id="t_contact" type="text" class="form-control @error('t_contact') is-invalid @enderror" name="t_contact" value="{{ old('t_contact') }}" autocomplete="t_contact" autofocus>

                                @error('t_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                                
                        <div class="row mb-3">
                            <label for="code_postal" class="col-md-4 col-form-label text-md-end">{{ __('Code postal') }}</label>

                            <div class="col-md-6">
                                <input id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ old('code_postal') }}" autocomplete="code_postal" autofocus>

                                @error('code_postal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="pays" class="col-md-4 col-form-label text-md-end">{{ __('Pays') }}</label>

                            <div class="col-md-6">
                                <select id="pays"  class="form-control @error('pays') is-invalid @enderror" name="pays" value="{{ old('pays') }}"  autocomplete="pays" autofocus>
                                    <option value="maroc">maroc</option>
                                </select>

                                @error('pays')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="ville" class="col-md-4 col-form-label text-md-end">{{ __('Ville') }}</label>

                            <div class="col-md-6">

                            <select id="ville"  class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}"  autocomplete="ville" autofocus>
                                @foreach ($cities as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>

                                @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <hr  class="border border-primary border-3 " >
                        <h5 class="pt-3   text text-primary">image </h5>
                        
                        <div class="row mb-3">
                            <label for="image"  class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr  class="border border-primary border-3 " >
                 
                        <h5 class="pt-3   text text-primary">Informations de connexion</h5> 

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection
