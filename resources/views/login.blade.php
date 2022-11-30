<html>
    <head>
        <link href="{{ asset('public/assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('public/assets/css/styles.css') }}" rel="stylesheet">
    </head>
    <body>

            <section class="h-100 gradient-form" style="background-color: rgb(238, 238, 238);">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="{{ asset('public/assets/img/logo.png') }}"
                                        style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Cap2Cash</h4>
                                </div>

                                <form action="{{ route('checklogin') }}" method="POST">
                                    @csrf

                                <p>Please login to your account</p>

                                <div class="form-outline mb-4">
                                    <input type="text" name="contact" id="form2Example11" class="form-control"
                                    placeholder="Phone Number" required/>
                                    <label class="form-label" for="form2Example11">Username</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form2Example22" class="form-control"  required/>
                                    <label class="form-label" for="form2Example22">Password</label>
                                </div>

                                <div class="form-group mb-3">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="text-center pt-1 mb-5 pb-1">
                                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                                    in</button>
                                </div>

                                </form>
                            </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Welcome to Cap 2 Cash</h4>
                                <p class="small mb-0">Online Money Earning Platform</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>

</body>
</html>

