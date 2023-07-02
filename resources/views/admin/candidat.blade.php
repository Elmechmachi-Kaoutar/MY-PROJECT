@extends('dashboard.admin')

@section('title')
    <h1 class="text-center container my-2"> LES CANDIDATS  ({{count($users)}})</h1> 
@endsection

@section('content4')

@if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
@endif


<table class="table table-striped container mt-5">
    <thead>
    <tr>
        <th scope="col">détails</th>
        <th scope="col">nom</th>
        <th scope="col">prenom</th>
        <th scope="col">email</th>
        <th scope="col">cv</th>
        <th scope="col">lettre de motivation</th>
    </tr>
    </thead>
    <tbody>

    @foreach($users as $user)
    @if($user->suspend==false)

    <tr>  
        <td>   <a href="{{route('show.candidat',$user->id)}}"   class="btn btn-success mx-2" > détails</a></td>   
        <td>  {{ $user->nom}}</td>
        <td>{{ $user->prenom}}</td>
        <td>{{ $user->email}}</td>
        <td>@if(!($user->info))
                ---
                @else
                <a  href="{{ asset('images/candidat/cv/' . $user->info->cv) }}">telecharger <i class="bi bi-file-earmark-arrow-down-fill"></i></a>
            @endif

        </td>
        <td>@if(!($user->info))
                ---
                @else
                <a  href="{{ asset('images/candidat/lettre_motivation/' . $user->info->lettre_motivation) }}">telecharger <i class="bi bi-file-earmark-arrow-down-fill"></i></a>
            @endif

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
                <input type="hidden" name="suspend" value="suspend">
                <input type="submit" class="btn btn-secondary mx-2" value="suspend">
            </form>
        </td>
        

    </tr>
    @endif
    @endforeach
    </tbody>
</table>



@endsection