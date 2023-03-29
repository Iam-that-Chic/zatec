@extends('layouts.landing')
@section('content')
<div class="container mt-4"> 
    <div class="row d-flex justify-content-center"> 
        <div class="col-md-9"> 
            <div class="card p-4 mt-3"> 
                <h3 class="heading mt-5 text-center">ZATEC</h3> 
                <h6 class="heading mt-8 text-center">GOOGLE AUTH AND LASTFM API INTERGRATION</h6> 
              <br/>
            <div class="mb-4"><a href="{{ route('google-auth') }}" class="form-control btn btn-outline-danger btn-block"><i
                class="fa fa-google"></i> Google Login </a><br></div>
        </div> 
    </div> 
</div> 
</div>
@endsection