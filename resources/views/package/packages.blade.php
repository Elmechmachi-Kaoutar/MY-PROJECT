
@extends('layouts.app')

@section('content')


@if(Auth()->user()->package_id!=0)



                    <div class="container my-5">
                        <div class="row row justify-content-center ">
                                <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <a href="{{route('demand.create')}}" class="text-decoration-none text-light">
                                        <div class="card-body m-4"> demand d'offre </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <a href="{{route('demand.index')}}" class="text-decoration-none text-light">
                                       <div class="card-body m-4">Mes Demands</div>
                                    </a>
                                    
                                   
                                </div>
                            </div>
                            </div>
                            
                            
                        </div>
</div>



@yield('content8')

@else
@vite(['resources/sass/package.scss'])

@if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
@endif



<div class="pt-5  mt-5">
    
<h1>CHOISISSEZ VOTRE FORFAIT ET PROFITEZ DES GRANDS AVANTAGES</h1>
    

    <div class="pricing p-5">
    @foreach($packages as $package)
    <a href="{{route('payment.create',$package->id)}}" class=" carddd text-decoration-none text-dark ">
    @if($package->type=='gold')
      <div class="plan popular   ">
      <span>Most Popular</span>
    @else
      <div class="plan  ">
    @endif
        <h2>{{$package->type}}</h2>
        <div class="price">{{$package->prix}} MAD/Mois</div>
        <ul class="features">
        @if($package->type=='premium')
            <li><i class="fas fa-check-circle"></i>
            @else
            <li><i class="fas fa-times-circle"></i>
            @endif {{$package->support}}</li>
          <li><i class="fas fa-check-circle"></i> {{$package->nb_offre}}</li>
          <li><i class="fas fa-check-circle"></i> {{$package->nb_candidat}}</li>
          <li><i class="fas fa-check-circle"></i>{{$package->delivery}}</li>
            @if($package->type=='premium')
            <li><i class="fas fa-check-circle"></i>
            @else
            <li><i class="fas fa-times-circle"></i>
            @endif {{$package->email}}</li>
        </ul>
        <button>Buy Now</button>
      </div>
      </a>
    @endforeach
</div>



@endif

      @endsection