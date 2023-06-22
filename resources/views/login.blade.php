<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link id="callCss" rel="stylesheet" href="{{URL::asset("themes/bootshop/bootstrap.min.css")}}" media="screen"/>
    <link href="{{URL::asset("themes/css/base.css")}}" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->
    <link href="{{URL::asset("themes/css/bootstrap-responsive.min.css")}}" rel="stylesheet"/>
    <link href="{{URL::asset("themes/css/font-awesome.css")}}" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->
</head>
<section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">

                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="login_check" method="post">
                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #0a0a0a;"></i>
                                        <span class="h1 fw-bold mb-0">Logo</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form2Example17" placeholder="User Name" name="username" class="form-control form-control-lg">
                                        @if($errors->has("username"))
                                        {{$errors->first("username")}}
                                        @endif
                                        <label class="form-label" for="form2Example17"></label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form2Example27" placeholder="Password"  name="password" class="form-control form-control-lg">
                                        @if($errors->has("password"))
                                            {{$errors->first("password")}}
                                        @endif
                                        <label class="form-label" for="form2Example27"></label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit" >Login</button>
                                    </div>

                                    <a class="small text-muted" href="#!">Forgot password?</a>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
