@extends('masterview')
@section('title',"Account")
@section('content')
<div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Get more things done with our MMS</h3>
                    <p>Access to the most powerfull tool to manage your Mortuary shop</p>
                    <img src="{{ asset('img/graphic5.svg')}}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="#">
                                <div class="logo">
                                    <img class="logo-size" src="{{ asset('img/logo-light.svg') }}" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="page-links">
                            <a id='loginlink' href="#" class="active">Login</a>
                            <!--<a id='registerlink' href='#'>Register</a>-->
                        </div>
                        <form id="loginform" data-action="account/login" enctype="multipart/form-data">
                            <input type='hidden' id='dashboardroute' data-action="{{route('dbroute')}}" ></input>
                                <input class="form-control" data-action="account/validateusername" type="text" id='username' name="username" placeholder="Username" required>
                                <p class='usernamemessage'></p><br>
                                <input class="form-control password" data-action="account/validatepassword" type="password" name="password" placeholder="Password" required>
                                <img class='password-eye' src="{{ asset('img/passwordeye.png')}}"/>
                                <p class='passwordmessage'></p>
                                <div class="form-button">
                                    <button id="submit" type="submit" class="ibtn">Login</button> <a href="forget9.html">Forget password?</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='js/accountjs.js' type='module'></script>
@endsection