@extends('layouts.app')

@section('content')
<section class="mb-0 p-md-5 bg-info" >
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-5">
      <div class="card rounded-3">
        <div class="card-body p-4">
          <div class="text-center mb-4">
            <h3></h3>
            <h3>Payment</h3>
          </div> <img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />              <img class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png" />
           
            
 <form action="{{route('card.store',$id)}}" method="post">
        @csrf
  
            <p class="fw-bold mb-4">Add new card:</p>

            <div class="form-outline mb-4"> 
   
               <input type="hidden" value="card" name="card">
              <input type="text" name="holder" id="formControlLgXsd" class="form-control form-control-lg"
                value="{{Auth::user()->nom_societe}}" />
              <label class="form-label" for="formControlLgXsd">Cardholder's Name</label>
            </div>

            <div class="row mb-4">
              <div class="col-7">
                <div class="form-outline"> 
       <input type="text" name="card_number" id="formControlLgXM" class="form-control form-control-lg"
                    value="1234 5678 1234 5678" />
                  <label class="form-label" for="formControlLgXM">Card Number</label>
                </div>
              </div>
              <div class="col-3">
                <div class="form-outline">
                  <input type="password"name="expire" id="formControlLgExpk" class="form-control form-control-lg"
                    placeholder="MM/YYYY" />
                  <label class="form-label" for="formControlLgExpk">Expire</label>
                </div>
              </div>
              <div class="col-2">
                <div class="form-outline">
                  <input type="password" name="cvv"id="formControlLgcvv" class="form-control form-control-lg"
                    placeholder="Cvv" />
                  <label class="form-label" for="formControlLgcvv">Cvv</label>
                </div>
              </div>
            </div>

            <input type="submit" class="btn btn-success btn-lg btn-block" value="Add card" name="submit">
  </form>
        </div>
      </div>
    </div>
  </div>
</section>
      @endsection