@extends('dashboard.admin')

@section('title')
    <h1 class="text-center container my-2"> LES CANDIDAT SUSPEND ({{count($users)}})</h1> 
@endsection

@section('content4')

@if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
@endif


<table class="table table-striped container mt-5">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">nom</th>
        <th scope="col">prenom</th>
        <th scope="col">email</th>
        <th scope="col">cv</th>
        <th scope="col">lettre de motivation</th>
    </tr>
    </thead>
    <tbody>

    @foreach($users as $user)
  

    <tr>  
    <td>   <a href="{{route('show.candidat',$user->id)}}"   class="btn btn-success mx-2" > détails</a></td>   
        <td>{{ $user->nom}}</td>
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
        <form action="{{route('profile_candidat.update', $user->id)}}" method="post">
                @method('put')
                @csrf
                <input type="hidden" name="unsuspend" value="unsuspend">
                <input type="submit" class="btn btn-primary mx-2" value="annuler le suspendre">
            </form>
        </td>
        

    </tr>
    
    @endforeach
    </tbody>
</table>



@endsection