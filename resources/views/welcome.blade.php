@extends('layouts.auth')
@section('content')
    <!-- login -->

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div id="account" class="account">
        <div class="container flex_container">
            <div>
                <div class="account_header text-center pt-3">
                    <h2>
                       ZATEC
                    </h2>
                    <p class="color_pc" style="max-width: 450px;">
                        LASTFM AND GOOGLE API INTEGRATION

                    </p>
                </div>
                <div class="account_box border-1 border" style="max-width: 450px;">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-4"><a href="{{ route('google-auth') }}" class="form-control btn btn-outline-danger btn-block"><i
                                class="fa fa-google"></i> Login/Register with Google</a><br></div>
                   
                    <br>
               
                    <hr />
                    <div class=" new_account pb-3">
                        <p class="m-0 text-center">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end of login -->


@endsection
