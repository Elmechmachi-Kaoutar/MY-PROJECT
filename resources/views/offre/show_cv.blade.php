

@extends('layouts.app')
@section('content')   
      
    @if(isset($cvs))
    <h1 class="text-center container my-5"> LES CV </h1>


<table class="table table-striped container mt-5">
    <thead>
   
    <tr>
        <th scope="col">id</th>
        <th scope="col">nom </th>
        <th scope="col">prenom</th>
        <th scope="col">cv</th>
        <th scope="col">lettre de motivation</th>
    
    </tr>
    </thead>
    <tbody>

        @foreach($cvs as $cv)
       
        <tr>  
          
        <td> <a href="{{route('cv.show',$cv->user->id)}}">{{$cv->user->id}}</a></td>

        <td>{{$cv->user->nom}}</td>
        <td>{{$cv->user->prenom}}</td>
        <td> <a  href="{{ asset('images/candidat/cv/' . $cv->cv) }}">telecharger</a></td>
        <td> <a  href="{{ asset('images/candidat/lettre_motivation/' . $cv->lettre_motivation) }}">telecharger</a></td>
        
        <!-- <td>
          <form action="{{route('contact.store',$cv->user->id)}}" method="post" >
              @csrf
              <input type="submit" class="btn btn-success mx-2" value="contacter">  
          </form>
        </td> -->
        
        <td> <a class="btn btn-success mx-2" href="{{route('cv.show',$cv->user->id)}}">détails</a></td>
        

    </tr>
 
    
      @endforeach
    
    @else
      <h1>walo</h1>
    @endif
</table>

@endsection 