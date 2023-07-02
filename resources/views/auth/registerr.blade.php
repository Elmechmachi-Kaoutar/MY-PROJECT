@extends('layouts.app')

@section('content')


<body class="boody">

<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class=" pt-3 text-center fs-4  text text-primary ">{{ __('Register recruteure') }}</div><hr  class="border border-primary border-3 rounded" >

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <input name="image"  type="hidden" id="image" value="NULL">
                        <input type="hidden" value="3" name="role_id">
                        <input type="hidden" value="O" name="package_id">


                        <h5 class="  text text-primary">Informations sur l'entreprise</h5>
                            <div class="row mb-3">
                            <label for="nom_societe" class="col-md-4 col-form-label text-md-end">{{ __('Nom de société ') }}</label>

                            <div class="col-md-6">
                                <input  id="nom_societe" type="text" class="form-control @error('nom_societe') is-invalid @enderror" name="nom_societe" value="{{ old('nom_societe') }}"  autocomplete="nom_societe" autofocus>

                                @error('nom_societe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="telephone" class="col-md-4 col-form-label text-md-end">{{ __('Telephone') }}</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="siege_social" class="col-md-4 col-form-label text-md-end">{{ __('Siege social') }}</label>

                            <div class="col-md-6">
                                <input id="siege_social" type="text" class="form-control @error('Siege social') is-invalid @enderror" name="siege_social" value="{{ old('siege_social') }}" required autocomplete="siege_social" autofocus>

                                @error('siege_social')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                                
                        <div class="row mb-3">
                            <label for="code_postal" class="col-md-4 col-form-label text-md-end">{{ __('Code postal') }}</label>

                            <div class="col-md-6">
                                <input id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ old('code_postal') }}" required autocomplete="code_postal" autofocus>

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
                                <select id="pays"  class="form-control @error('pays') is-invalid @enderror" name="pays" value="{{ old('pays') }}" required autocomplete="pays" autofocus>
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
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" rows="10" name="description" placeholder="Description">{{ old('description') }} </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr  class="border border-primary border-3 " >
                        
                        <h5 class="pt-3   text text-primary">logo </h5>
                        
                        <div class="row mb-3">
                            <label for="logo" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>
                            <div class="col-md-6">
                                <input class="form-control @error('logo') is-invalid @enderror" name="logo"  type="file" id="logo" name="logo">
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr  class="border border-primary border-3 rounded" >
                        <h5 class="pt-3   text text-primary">Informations de contact</h5>

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

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
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

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
                                <input id="t_contact" type="text" class="form-control @error('t_contact') is-invalid @enderror" name="t_contact" value="{{ old('t_contact') }}" required autocomplete="t_contact" autofocus>

                                @error('t_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr  class="border border-primary border-3 rounded" >
                        <h5 class="pt-3  text text-primary">Informations de connexion</h5> 

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
