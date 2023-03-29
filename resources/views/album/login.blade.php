@extends('layouts.landing')
@section('content')
<div class="container mt-4"> 
    <div class="row d-flex justify-content-center"> 
        <div class="col-md-9"> 
            <div class="card p-4 mt-3"> 
                <h3 class="heading mt-5 text-center">ZATEC</h3> 
                <h6 class="heading mt-8 text-center">GOOGLE AUTH AND LASTFM API INTERGRATION</h6> 
                <div class="d-flex justify-content-center px-5"> 
                    <div class="search"> 
                            <div class="mb-4"><a href="{{ route('google-auth') }}" class="form-control btn btn-outline-danger btn-block"><i
                                class="fa fa-google"></i> Login with Google</a><br></div>
                    </div> 
                </div> 
            <div class="row mt-4 g-1 px-4 mb-5"> 
                <div class="col-md-2"> 
                    <div class="card-inner p-3 d-flex flex-column align-items-center"> 
                        <img src="{{ asset('images/Black-album-vector-04.jpg') }}" width="50"> 
                        <div class="text-center mg-text"> 
                            <span class="mg-text">Albums</span> 
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-2"> 
                    <div class="card-inner p-3 d-flex flex-column align-items-center"> 
                        <img src="{{ asset('images/istockphoto-1181031334-612x612.jpg') }}" width="50"> 
                        <div class="text-center mg-text"> 
                            <span class="mg-text">Artists</span> 
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-2"> 
                    <div class="card-inner p-3 d-flex flex-column align-items-center"> 
                        <img src="{{ asset('images/83819107-live-music-concert-icon-vector-illustration-design-graphic.webp') }}" width="50"> 
                        <div class="text-center mg-text"> 
                            <span class="mg-text">Live</span> 
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-2"> 
                    <div class="card-inner p-3 d-flex flex-column align-items-center"> 
                        <img src="{{ asset('images/musiccharts.jpg') }}" width="50"> 
                        <div class="text-center mg-text"> 
                            <span class="mg-text">Charts</span> 
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-2"> 
                    <div class="card-inner p-3 d-flex flex-column align-items-center"> 
                        <img src="{{ asset('images/events.jpg') }}" width="50"> 
                        <div class="text-center mg-text"> 
                            <span class="mg-text">Events</span> 
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-2"> 
                    <a href="" data-toggle="modal" data-target="#contactModal">
                    <div class="card-inner p-3 d-flex flex-column align-items-center"> 
                        <img src="{{ asset('images/contact.jpeg') }}" width="50"> 
                        <div class="text-center mg-text"> 
                            <span class="mg-text">Contact</span> 
                        </div> 
                    </div> 
                </button>
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
</div>

<!--contact modal -->
  <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Contact US</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          +263 775 017 342 <br/>
          info@zatec.com<br/>
          11 some address in here,<br/>
          Harare, Zimbabwe
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection