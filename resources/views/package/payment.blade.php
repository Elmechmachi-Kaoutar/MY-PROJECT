




      @extends('layouts.app')

@section('content')


@if(session('error'))
    <div class="alert alert-danger text-center">{{ session('error') }}</div>
@endif

@php
$tax=9.99;
$discount=10;
$total=$package->prix-(($discount/100)*$package->prix)+$tax;
@endphp

<section class="p-4 p-md-5" >
  
  
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-5">
      <div class="card rounded-3">
        <div class="card-body p-4">
          <div class="text-center mb-4">
            <h3></h3>
            <h3 class="title">Checkout</h3>
          </div>
          <div class="receipt-box">
            
        <table class="table">
          <tr>
          
            <td>package </td>
            <td>{{$package->type}}</td>
          </tr>
          <tr>
            <td>prix</td>
            <td>{{$package->prix}} MAD</td>
          </tr>
          <tr>
            <td>Discount</td>
            <td>{{$discount}}%</td>
          </tr>
          <tr>
            <td>Tax</td>
            <td>{{$tax}} MAD</td>
          </tr>
          <tfoot >
            <tr >
              <td><h6 class="mt-3">TOTAL</h6></td>
              <td >  <h6 class="mt-3">{{$total}}</h6></td>
            </tr>
          </tfoot>
        </table>
      </div>
       

            <p class="fw-bold mb-4">votre carte:</p>

            <div class="form-outline mb-4">
              <input type="text" id="formControlLgXsd" class="form-control form-control-lg"
                value="{{auth()->user()->card->holder}}" disabled  />
                
              <label class="form-label" for="formControlLgXsd">Cardholder's Name</label>
            </div>

            <div class="row mb-4">

  
              <div class="col-7">
                <div class="form-outline"> 
        <form action="{{route('card.store',$package->id)}}" method="post">
        @csrf
                  <input type="hidden" name="card" value="payment">
                  <input type="text" name="card_number" id="formControlLgXM" class="form-control form-control-lg"
                  value="{{auth()->user()->card->card_number}}" disabled />
                  <label class="form-label" for="formControlLgXM">Card Number</label>
                </div>
              </div>
              <div class="col-3">
                <div class="form-outline">
                  <input type="text"name="expire" id="formControlLgExpk" class="form-control form-control-lg"
                  value="{{auth()->user()->card->expire}}" disabled />
                  <label class="form-label" for="formControlLgExpk">Expire</label>
                </div>
              </div>
              <div class="col-2">
                <div class="form-outline">
                  <input type="text" name="cvv"id="formControlLgcvv" class="form-control form-control-lg"
                  value="{{auth()->user()->card->cvv}}"disabled />
                  <label class="form-label" for="formControlLgcvv">Cvv</label>
                </div>
              </div>
            </div>

            <input type="submit" class="btn btn-success btn-lg btn-block" value="payer" name="submit">
  </form>
        </div>
      </div>
    </div>
  </div>
</section>
      @endsection