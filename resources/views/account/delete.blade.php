@extends('dashboard.admin')
@section('title')
    <h1 class="text-center container "> SUPPRESSION DE COMPTE</h1> 
@endsection

@section('content4')

@if(session('error'))
    <div class="alert alert-danger text-center">{{ session('error') }}</div>
@endif







<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">{{ __("S'inscrire") }}</div>

                <div class="card-body">
                    
                    @if((($user->role_id)==3) || ((Auth::user()->role_id)==1) )
                        <form method="POST" action="{{ route('profile_recruteure.destroy',$user->id) }}">
                            @method('DELETE')
                            @csrf
                    @elseif(($user->role_id)==2)
                        <form method="POST" action="{{ route('profile_candidat.destroy', Auth::user()->id) }}">
                            @method('DELETE')
                            @csrf
                @endif
                    
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('comfirme') }}
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
