<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZiCorp | Karnataka Agency</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
               rel="stylesheet"> -->
    <link href={{asset('assets/dist/css/adminlte.min.css')}} rel=stylesheet>
    <link href={{asset('assets/plugins/fontawesome-free/css/all.css')}} rel=stylesheet>
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Resonsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom-style.css')}}">
</head>

<body class="hold-transition login-page">
    <style>
        canvas {
            max-width: 100%;
        }
        .card-primary.card-outline {
            border-top: 3px solid #007bff;
            border-left: 4px solid #007bff;
        }
    </style>

    <div class="login-box">
        <div class="login-box">
            @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                    @foreach($errors->all() as $error)
                        <span>{{ $error }}</span><br/>
                    @endforeach
                </div>
            @endif

            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable __web-inspector-hide-shortcut__">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                    {{ Session::get('success') }}
                </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                    {{ Session::get('error') }}
                </div>
            @endif
            
            <div class="card card-outline card-primary">
                <div class="card-header text-center CardHeaderBackground">
                    <a href="" class="h1">
                        <img src="{{ URL::asset("assets/img/logo-bgWhite.png") }}" alt="" style="width: 45%">
                    </a>
                </div>

                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="{{ route('allUsers.login') }}" method="post" id="loginForm">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" id="email">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                        </div>
                        <div id="email_validation_message"></div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                        </div>
                        <div id="password_validation_message"></div>

                        {{-- <div class="d-flex align-items-center">
                            <div class=row>
                                <div class="col-xs-6"><canvas id="captcha" width="200" height="80"></canvas></div>

                                <div class="col-xs-6 CaptchaReloadImagePadding">
                                    <button type="button" class="btn btn-secondary" id="refresh-captcha"><i class="fa fa-refresh"></i></button>
                                </div>
                            </div>
                        </div> --}}

                        <div class="mb-5">
                            {{-- <label for="captcha-input" class="form-label">Enter Captcha</label>
                            <input type="text" class="form-control" id="captcha-input" required> --}}

                            {{-- {!! NoCaptcha::renderJs() !!} --}}
                            {{-- {!! NoCaptcha::display() !!} --}}
                            {{-- {!! NoCaptcha::display(['data-theme' => 'dark']) !!} --}}
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>

                    <p class="mb-1"><a href="forgot-password.html">I forgot my password</a></p>
                </div>
            </div>
        </div>
    </div>

    
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="{{asset('assets/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery.form.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>

    {{-- For Captcha --}}
    <script>
        $(document).ready(function () {
            // Generate captcha on page load
            generateCaptcha();
            // Handle captcha refresh button click
            $("#refresh-captcha").click(function () {
                generateCaptcha();
                $("#captcha-input").val("");
            });
            // Handle form submit
            $("#captcha-form").submit(function (event) {
                event.preventDefault();

                // Validate captcha
                var captchaInput = $("#captcha-input").val();
                var captchaCode = sessionStorage.getItem("captchaCode");
                if (captchaInput != captchaCode) {
                    alert("Invalid captcha code. Please try again.");
                    generateCaptcha();
                    $("#captcha-input").val("");
                    return;
                }
                // Form validation successful, submit form
                alert("Form submitted successfully.");
                $("#captcha-form").trigger("reset");
                generateCaptcha();
            });

            // Define the function generateCaptcha()
            function generateCaptcha() {
                // Get the canvas element with ID captcha and create an instance of its canvas rendering context
                var a = $("#captcha")[0],
                    b = a.getContext("2d");
                // Clear the canvas
                b.clearRect(0, 0, a.width, a.height);
                // Define the string of characters that can be included in the captcha
                var f = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
                    e = "",
                    g = -45,
                    h = 45,
                    i = h - g,
                    j = 20,
                    k = 30,
                    l = k - j;
                // Generate each character of the captcha
                for (var m = 0; m < 6; m++) {
                    // Select random letter from the pool to be part of the captcha
                    var n = f.charAt(Math.floor(Math.random() * f.length));
                    e += n;

                    // Set up the text formatting
                    b.font = j + Math.random() * l + "px Arial";
                    b.textAlign = "center";
                    b.textBaseline = "middle";

                    // Set the color of the text
                    b.fillStyle = "rgb(" + Math.floor(Math.random() * 256) + "," + Math.floor(Math.random() * 256) + "," + Math.floor(Math.random() * 256) + ")";

                    // Add the character to the canvas
                    var o = g + Math.random() * i;
                    b.translate(20 + m * 30, a.height / 2);
                    b.rotate(o * Math.PI / 180);
                    b.fillText(n, 0, 0);
                    b.rotate(-1 * o * Math.PI / 180);
                    b.translate(-(20 + m * 30), -1 * a.height / 2);
                }
                // Set the captcha code in session storage
                sessionStorage.setItem("captchaCode", e);
            }
        })
    </script>

    {{-- Client side validation --}}
    <script>
        $(document).ready(function() {
            // For Close button
            var closebtns = document.getElementsByClassName("close");
            var i;

            for (i = 0; i < closebtns.length; i++) {
                closebtns[i].addEventListener("click", function() {
                    this.parentElement.style.display = 'none';
                });
            }

            // Client side validation            
            $('#loginForm').validate({
                rules: {
                    email: {
                        required    : true,
                        email       : true
                    },
                    password: {
                        required    : true
                    }
                },
                messages: {
                    email: {
                        required    : "Please, provide email",
                        email       : "Please, provide valid email"
                    },
                    password: {
                        required    : "Please, provide password"
                    }
                },
                errorPlacement: function(error, element) {
                    // error.insertAfter($(element));
                    error.insertAfter($('#' + $(element).prop('id') + '_validation_message'));
                    // alert($(element).prop('id'));
                },
                submitHandler: function(form) {
                    form.submit();
                }
            })

        });
    </script>

</body>

</html>