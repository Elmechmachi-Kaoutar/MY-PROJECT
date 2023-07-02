@extends('package.packages')

@section('content8') 

@if(session('message'))
    <div class="alert alert-success text-center">{{ session('message') }}</div>
@endif 

<hr>

<h1 class="row text-center justify-content-center pt-5 ">  MES DEMANDS ({{count($demands)}}/{{$package->nb_offre}})    </h1>

@if((Auth::user()->role_id)==3)
    @foreach($demands  as $offre)

 
    <div class="container pt-3 mt-2 ">
        <div class="row text-center justify-content-center">
          <div>
            <div class="card  shadow-lg">
              
              <div class="card-body">
                <h3 class="card-title">{{$offre->title}}</h3>
                  <h5 class="card-title">    {{$offre->salaire}}</h5>
                  <p class="card-text"> {{\Illuminate\Support\Str::limit($offre->description, $limit = 400, $end = '...')}}</p>
                </div>
                <div class="card-footer d-flex py-3 ">
                    <div class="delete_edit d-flex ">
                    @if($offre->etat=='')
                            <form action="{{route('demand.destroy',$offre->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger  mx-2"  value="supprimer">
                                
                            </form>    
                            <a href="{{route('demand.edit',$offre->id)}}" class="px-4 btn btn-success">modifier</a>
                    @endif
                    </div>

                    
                    <a  href="{{route('show_candidature.show',$offre->id)}} " ><button type="button" class="btn btn-primary position-relative">
                   <i class="bi bi-person-fill-check text-light "></i>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                      +
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                  </a>  
                  
                 
                   @if($offre->etat!=='')
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success px-5 py-2">
                      {{$offre->etat}}
                        <span class="visually-hidden">unread messages</span>
                      </span>
                   @endif
                </div>
              
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif
@endsection 
