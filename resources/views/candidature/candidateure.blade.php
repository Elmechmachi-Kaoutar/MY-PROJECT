@extends('layouts.app')
@section('content')   




            <div class="container p-3 ">
        <div class="row text-center justify-content-center">
            <div>
            <div class="card shadow-lg ">
                <div class="card-body">
            
                <img class="img-fluid " src="{{asset('images/candidat/'.$CV->user->image)}}" alt="Card image cap">
            
            <div class="row text-center justify-content-center ">
                <h3 class="card-title">{{$CV->user->nom}}  {{$CV->user->prenom}}</h3>
                    <ul class=" justify-content-center">
                            <li style= "list-style-type: none;">
                                <b>Telephone : </b>
                                <h5>{{$CV->user->t_contact}}</h5>
                            </li>
                            <li style= "list-style-type: none;">
                                <b>ville: </b>
                                <h5>{{$CV->user->ville}}</h5>
                            </li>
                            <li style= "list-style-type: none;">
                                <b>email: </b>
                                <h5>{{$CV->user->email}}</h5>
                            </li>
                            <li style= "list-style-type: none;">
                                <b>cv: </b>
                                <a  href="{{ asset('images/candidat/cv/' . $CV->cv) }}">telecharger</a>
                            </li>
                            <li style= "list-style-type: none;">
                                <b>lettre de motivation : </b>
                                <a  href="{{ asset('images/candidat/lettre_motivation/' . $CV->lettre_motivation) }}">telecharger</a>

                            </li>

                    </ul> 
            </div>
                @php
                    $candidature=App\Models\Candidature::where('user_id',$CV->user->id)->first();

                @endphp
                
                    <div class="d-flex  justify-content-center py-5 ">

                <form action="{{route('show_candidature.update',$candidature->id)}}" method="post"  >
                @csrf
                @method('PUT')
                <input type="submit" class="btn btn-primary p-2" value="valider">
            </form>
            </div>


                </div>
            </div>
        </div></a>
    


@endsection 