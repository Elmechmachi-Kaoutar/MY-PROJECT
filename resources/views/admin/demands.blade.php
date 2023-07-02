@extends('dashboard.admin')

@section('title')
    <h1 class="text-center container my-2"> NOUVEAUX RECRUTEURS</h1> 
@endsection

@section('content4')

@if(session('success'))
    <div class="alert alert-primary text-center">{{ session('success') }}</div>
@endif



<table class="table table-striped container mt-5">
    <thead>
    <tr>
    <th scope="col">détails</th>
        <th scope="col">Nom de societe</th>
        <th scope="col">Email</th>
        <th scope="col">Nom du proprietaire</th>
    </tr>
    </thead>
    <tbody>

    @foreach($users as $user)
    @if(!$user->valide)
    
    <tr>  
    <td>   <a href="{{route('show.recruteure',$user->id)}}"  class="btn btn-success mx-2" > détails</a></td>  
        <td>  {{ $user->nom_societe}}</td>
        <td>{{ $user->email}}</td>
        <td>{{ $user->prenom}}  {{ $user->nom}}</td>
            </td>
        <td>
          
        <form action="{{route('profile_recruteure.update', $user->id)}}" method="post">
                @method('put')
                @csrf
                <input type="hidden" value="valide" name="valide">
                <input type="submit" class="btn btn-primary mx-2" value="accepter">
            </form>
        </td>

    </tr>
    @endif
    @endforeach
    
 
    </tbody>
</table>



@endsection