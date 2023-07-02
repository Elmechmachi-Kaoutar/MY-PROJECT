

@extends('layouts.app')



@section('content')

@if(session('error'))
    <div class="alert alert-danger text-center mt-4">{{ session('error') }}</div>
@endif

<body class="boody">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-floating mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror               
                  <label for="floatingInput">Email address</label>
                </div>

                <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  >
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  <label for="floatingPassword">Password</label>
                </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Remember password
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                  in</button>
              </div>
              <hr class="my-4">
              <div class="d-grid mb-2">
                <buton class="btn-login text-uppercase fw-bold" >
                  <i class="fab fa-gooe me-2"></i> 
                </buton>
              </div>
              <div class="d-grid">
                <buttn class="btn-login text-uppercase "  >
                  <i class="fab fa-facebok-f me-2"></i> 
                </buttn>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>




@endsection

