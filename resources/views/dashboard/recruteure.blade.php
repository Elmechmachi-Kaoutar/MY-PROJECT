@extends('layouts.app')

@section('content')




@if(isset($msg))
    <div class="alert alert-success text-center">{{$msg}}</div>
@endif  
@if(session('message'))
    <div class="alert alert-danger text-center">{{session('message')}}</div>
@endif 
@if(Auth::user()->valide==true)


    <div class="container ">
        <div class="row justify-content-center  py-5">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="container my-5">
                        <div class="row justify-content-center  ">
                            <div class="col-6 col-md-4 ">
                                <img src="{{ asset('images/recruteure/'. Auth::user()->logo) }}"class="img-fluid rounded-circle shadow-lg">
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




                    
    
@else


    <div class="container  my-5">
        <div class="row justify-content-center  py-5 ">
            <div class="col-md-8">
                <div class="card shadow-lg bg-success " >
                    <div class="container my-5">
                        <div class="row justify-content-center  ">

                            <div class="px-5 text-light">
                                <h5>Votre compte est en cours de traitement. Lorsque votre compte sera accepté, nous vous enverrons un message à  <b>{{Auth::user()->email}}</b></h5>  <br> <h6> Merci d'avoir rejoint notre site.</h6> <br>  équipe "MYJOB"
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


@endif

@endsection