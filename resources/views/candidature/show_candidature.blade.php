@extends('layouts.app')

@section('content')

@if(session('message'))
<div class="alert alert-success text-center" >{{ session('message') }}</div>
@endif

@if(Auth::user()->role_id==3)
<h1 class="text-center container my-5"> LES CANDIDATS ( {{count($candidatures)}} )</h1>


<table class="table table-striped container mt-5">
    <thead>
   
    <tr>
        <th scope="col">id </th>
        <th scope="col">nom</th>
        <th scope="col">prenom</th>
        <th scope="col">cv</th>
        <th scope="col">lettre de motivation</th>
        <th scope="col">statut</th>
    </tr>
    </thead>
    <tbody>



    @foreach($candidatures as $candidature)
    <tr>  
        
        <td><a href="{{route('deposer-mon-cv.show',$candidature->id)}}" class="btn btn-success p-2">détails</a> </td>
        <td>   {{$candidature->user->nom}}</td>
        <td>{{$candidature->user->prenom}}</td>
        <td><a  href="{{ asset('images/candidat/cv/' .$candidature->user->info->cv) }}">telecharger <i class="bi bi-file-earmark-arrow-down-fill"></i></a>
        </td>
        <td><a  href="{{ asset('images/candidat/lettre_motivation/' .$candidature->user->info->lettre_motivation) }}">telecharger <i class="bi bi-file-earmark-arrow-down-fill"></i></a></td>

        @if(($candidature->valider))
        <td> valider</td>
        @else
        <td> --------</td>
        @endif
        <td>
            <form action="{{route('show_candidature.update',$candidature->id)}}" method="post"  >
                @csrf
                @method('PUT')
                <input type="submit" class="btn btn-primary p-2" value="valider">
            </form>
        </td>
        
    </tr>

    @endforeach
    @endif



    @if(Auth::user()->role_id==2)

</table>
<h1 class="text-center container my-5"> MES CANDIDATURES  </h1>


<table class="table table-striped container mt-5">
    <thead>
    
    <tr>
        
        <th scope="col">Date </th>
        <th scope="col">nome societe</th>
        <th scope="col">offre</th>
        <th scope="col">status</th>
    
    </tr>
    </thead>
    <tbody>



  @foreach($candidatures as $candidature)

    <tr>  
        
        <td>{{$candidature->created_at}}</td>
        <td>{{$candidature->offre->user->nom_societe}}</td>
        <td>  {{$candidature->offre->title}}</td>
        @if(($candidature->valider))
        <td> valider</td>
        @else
        <td> --------</td>
        @endif
        <td>
        
        <td>
            <form action="{{route('show_candidature.destroy',$candidature->id)}}" method="post">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn btn-danger mx-2" value="supprimer">
            </form>
        </td>
        

    </tr>

    @endforeach
   @endif
    </tbody>
</table>



@endsection