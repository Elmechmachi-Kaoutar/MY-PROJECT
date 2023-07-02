




@extends('dashboard.admin')

@section('title')
    <h1 class="text-center container "> LES PACKAGES</h1> 
@endsection



@section('content4')

@vite(['resources/sass/package.scss'])

@if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
@endif



<div class="pt-5  mt-5">


    <div class="pricing p-5">
    @foreach($packages as $package)
    <a  href="{{route('packages.edit', $package->id)}}" class=" carddd text-decoration-none text-dark">
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


      @endsection