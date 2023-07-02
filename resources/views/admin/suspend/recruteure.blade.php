@extends('dashboard.admin')
@section('title')
    <h1 class="text-center container my-2"> LES RECRUTEURS SUSPEND ({{count($users)}})</h1> 
@endsection

@section('content4')


@if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
@endif


<table class="table table-striped container mt-5">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom de societe</th>
        <th scope="col">Email</th>
        <th scope="col">Nom du proprietaire</th>
        <th scope="col">nomber d'offres</th>
    </tr>
    </thead>
    <tbody>

    @foreach($users as $user)

    
    <tr>  
        <td>   <a href="{{route('show.recruteure',$user->id)}}" > {{ $user->id}}</a></td>   
        <td>  {{ $user->nom_societe}}</td>
        <td>{{ $user->email}}</td>
        <td>{{ $user->prenom}}  {{ $user->nom}}</td>
        <td><a href="{{route('show.recruteure.offres', $user->id)}}">{{count($user->offre)}}</a>
            </td>
        <td>
            <form action="{{ route('home.show', $user->id ) }}" method="get">
                @csrf
                <input type="submit" class="btn btn-danger mx-2" value="supprimer">
            </form>
        </td>
       
        <td>
        <form action="{{route('profile_recruteure.update', $user->id)}}" method="post">
                @method('put')
                @csrf
                <input type="hidden" name="suspend" value="unsuspend">
                <input type="submit" class="btn btn-primary mx-2" value="unsuspend">
            </form>
        </td>

    </tr>
  
    @endforeach
    
 
    </tbody>
</table>


@endsection