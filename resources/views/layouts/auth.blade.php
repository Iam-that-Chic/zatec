<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <!-- Fonts -->
    <style>
        /* login */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap");



        * {
            font-family: "Poppins", sans-serif;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-size: .9rem;
        }

        #account {
            background-image: url("../img/seemless/dot-grid.png");
            background-repeat: repeat;
            background-attachment: fixed;
            min-height: 100vh;
            width: 100%
        }

        #account .password_field {
            position: relative;
        }

        #account .password_field span {
            position: absolute;
            right: 5px;
            top: 5px;
            padding: 5px;
            z-index: 5;
            cursor: pointer;
        }

        #account .flex_container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;

        }



        #account .account_header p {
            max-width: 600px;
        }

        #account .account_box {
            width: 100%;
            max-width: 600px;
            padding: 2rem;
            border-radius: 20px;
            background-color: #fff;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }

        #account .account_box h5 {
            margin: 0 0 1.5rem 0;
            font-size: 1rem;
        }

        #account .account_box .auth_input,
        #account .account_box .row input {
            border-radius: 0;
            outline: none;
            border: 1px solid var(--gc_shade_100);
            box-shadow: none;
            background-color: rgb(235, 231, 231);
            font-size: 0.9rem;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-bottom: 1px solid var(--gc_shade);
        }

        #account .account_box .auth_input:focus,
        #account .account_box .row input:focus {
            border-bottom: 1px solid var(--pc_shade);
        }

        #account .account_box input::placeholder {
            font-size: 0.9rem;
        }



        #account .account_box .account_bottom .account_link {
            background-color: green;
            color: #fff;
            border: var(--lc_shade) 1px solid;
            transition: all 0.3s ease;
        }

        #account .account_box .account_bottom .account_link:hover {
            background-color: var(--pc_shade);
            border: 1px solid var(--pc_shade);
        }

        #account .account_box .account_bottom input {
            box-shadow: none;
            border: 1px solid var(--gc_shade);
        }

        #account .account_box select {
            border: 1px solid var(--gc_shade);
            box-shadow: none;
            border-radius: 0px;
        }


        #account .account_box .account_bottom label {
            font-size: 0.9rem;
        }

        #account .account_box .new_account p {
            font-size: 0.9rem;
        }

        #account .account_box .new_account p a {
            color: var(--pc_shade);
            font-weight: 500;
            font-style: normal;
            text-decoration: none;
            transform: .3s all ease;
        }

        #account .account_box .new_account p a:hover {
            color: var(--lc_shade);
        }

        #account .account_box .account_bottom label a {
            color: var(--pc_shade);
        }

        #account .account_box .account_bottom .form-check-input:checked {
            background-color: var(--pc_shade);
            border-color: var(--pc_shade);
        }

        #account .login_button {
            background-color: var(--pc_shade);
            text-transform: uppercase;
            font-weight: 500;
            color: #fff;
            transition: .3s ease all;
        }

        #account .login_button:hover {
            background-color: var(--bc_shade);
        }

        #account .google_auth {
            border: 1px solid var(--rc_shade);
            color: var(--rc_shade);
            transition: .3s ease all;
        }

        #account .google_auth:hover {
            color: #fff;
            background-color: var(--rc_shade);
        }

        #account .forgot_password {
            color: var(--rc_shade);
            text-decoration: none;
            font-weight: 500;
            font-size: .9rem;
        }


        /* end of login */

        .card {
            height: auto;
        }



        .wrapper {
            position: relative;
            width: 100%;
            overflow: auto;
        }

        .footer {
            border-top: 1px solid #e7e7e7;
        }

        footer {
            padding: 10px 0;
            position: relative;
            width: 100%;
        }

        footer ul li {
            display: inline-block;
        }

        footer ul li a {
            color: inherit;
            padding: 15px;
            font-weight: 500;
            font-size: 12px;
            text-transform: uppercase;
            border-radius: 3px;
            text-decoration: none;
            position: relative;
            display: block;
        }

        footer .copyright {
            padding: 15px;
            font-size: 14px;
            margin: 0;
        }
    </style>
    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <!----css3---->
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
    <!-- bootstrap select -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css " rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <!-- Scripts -->
    <title>Account</title>
</head>

<body class="account">
    <div class="wrapper">
        <div class="body-overlay">


            <div class="py-12 card">

                <!-- Page Content -->
                @yield('content')



            </div>
        </div>
    </div>
</body>



</html>
