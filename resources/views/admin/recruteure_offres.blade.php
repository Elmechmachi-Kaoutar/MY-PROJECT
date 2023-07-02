
    
@extends('dashboard.admin')



@section('title')
    <h1 class="text-center container my-2"> LES OFFRES ( {{count($offres)}} )</h1> 
@endsection
@section('content4')   


    @foreach($offres as $offre)
    <div class="container p-3  ">
            <div class="row text-center justify-content-center col-lg-12">
            <div>
                <div class="card shadow-lg">
       
                <div class="card-body">
                    <h3 class="card-title">{{$offre->title}}</h3>
                    <h5 class="card-title">    {{$offre->salaire}}</h5>
                    <p class="card-text"> {{$offre->description}}</p>
                    </div>
                
                        <div class="card-footer d-flex justify-content-center ">
                        <form action="{{route('offre.destroy',$offre->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-danger  mx-2"  value="supprimer">
                            <input type="hidden" value=1 name="submit">
                        </form>    
                     
                        </div>
                        
                </div>
            </div>
            </div>
        </div>
        @endforeach
@endsection   