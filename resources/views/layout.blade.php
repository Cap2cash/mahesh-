<html>
    <head>
        <link href="{{ asset('public/assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('public/assets/css/styles.css') }}" rel="stylesheet">
         <script src="{{ asset('public/assets/bootstrap/jquery.min.js') }}"></script>
        <script src="{{ asset('public/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    </head>
    <body>
<br>
        <div class="col-sm-10">
            <div class="d-flex align-items-center justify-content-center pb-4">
                <a type="button" class="btn btn-outline-danger" href="{{ Route('home') }}">Users</a> &nbsp;&nbsp;
                <a type="button" class="btn btn-outline-danger" href="{{ Route('withdraw') }}">Withdraw</a>&nbsp;&nbsp;
                <a type="button" class="btn btn-outline-danger" href="{{ Route('logout') }}">Logout</a>
            </div>
        </div>
        @yield('innerpage')
    </body>


 </html>
