<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Union Saver Trust Bank| ACCOUNT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>
 <!-- Top Right -->
                       <div class="gtranslate_wrapper"></div> <script>window.gtranslateSettings = {"default_language":"en","detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","switcher_vertical_position":"top","alt_flags":{"en":"usa","pt":"brazil","es":"colombia","fr":"quebec"}}</script> <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
                    </div>
<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5 text-muted">
                        <a href="index.html" class="d-block auth-logo">
                            <img src="{{asset('logo.png')}}" alt="" height="20" class="auth-logo-dark mx-auto">
                            <img src="{{asset('logo.png')}}" alt="" height="20" class="auth-logo-light mx-auto">
                        </a>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">

                            <div class="p-2">
                                <div class="text-center">
                                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                            @endif

                            @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                            @endif

                               <div class="avatar-md mx-auto">                                         
    <div class="avatar-title rounded-circle bg-light border border-3 border-success shadow-sm">                                             
        <i class="bx bxs-robot h1 mb-0 text-success"></i>                                         
    </div>                                     
</div>                                     
<div class="p-2 mt-4 text-center">                                          
    <h4 class="fw-bold text-dark">Robot Verification</h4>                                         
    <p class="mb-4 text-muted">
        For security purposes, please verify you're a real person by entering the challenge code below.
    </p>   

    <div class="mb-4">
        <div class="d-inline-block bg-dark text-white fw-bold px-4 py-3 rounded-3 shadow" style="letter-spacing: 2px; font-size: 1.5rem;">
            {{ Auth::User()->token }}
        </div>
        <small class="d-block mt-2 text-secondary">This is your verification token</small>
    </div>                                          

    <form action="{{ route('code') }}" method="POST">                                            
        @csrf                                            
        <input type="hidden" id="token" name="token" value="{{ Auth::User()->token }}">                                                                                                                                                                                       
        <div class="mb-3">                                                         
            <label for="digit4-input" class="visually-hidden">Verification Code</label>                                                         
            <input type="text" class="form-control form-control-lg text-center border border-success rounded shadow-sm two-step" name="digit" placeholder="Enter Code Here" required>                                                     
        </div>                                                 
</div>                                                                                           
<div class="mt-4 text-center">                                                 
    <button type="submit" id="send" onclick='send(this)' class="btn btn-success w-md shadow">
        Confirm Identity
    </button>                                             
</div>                                         
</form>                                     
</div>                                  
</div>                             
</div>                          
</div>                     

<div class="mt-5 text-center">                         
    <p class="response text-danger"></p>                         
    <p class="text-muted">Didn’t receive the challenge code?                             
        <a id="otp" href="{{route('resendCode',$id)}}" class="fw-bold text-primary"> 
            Resend <i class='bx bx-refresh'></i> 
        </a>                         
    </p>                         
    <p class="text-muted">
        © <script>document.write(new Date().getFullYear())</script> 
        Union Saver Trust Bank <i class="bx bx-check-shield text-success"></i>
    </p>                     
</div>                 
</div>             
</div>

        </div>
    </div>

    <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <div class="position-fixed top-0 end-0 p-2" style="z-index: 1005">
        <div id="ErrorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{asset('logo.png')}}" alt="" class="me-2" height="18">
                <strong class="me-auto">Error</strong>
                <small>Now..</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" style="background-color:red;">

            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

    <!-- validation init -->
    <script src="{{asset('assets/js/pages/validation.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <!-- Bootstrap Toasts Js -->
    <script src="{{asset('assets/js/pages/bootstrap-toastr.init.js')}}"></script>

</body>

</html>
<script>
    $(document).ready(function() {
        $('#verify_form').on('submit', function(e) {
            e.preventDefault();

            var digit1 = $('#digit1').val();
            var digit2 = $('#digit2').val();
            var digit3 = $('#digit3').val();
            var digit4 = $('#digit4').val();

            if (digit1 == "" || digit2 == "" || digit3 == "" || digit4 == "") {
                $(".toast-body").html('All field required');
                $("#ErrorToast").toast("show");
                return false;
            }
            $.ajax({
                type: "POST",
                url: '{{ route("code") }}',
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    $(".response").html(data.content);
                    if (data.content == 'successful') {
                        $(".response").html(data.message);
                        window.location = data.redirect;
                    } else
                    if (data.content == 'Error') {
                        $(".response").html(data.content);
                    }
                },
                // error: function(data, errorThrown) {
                //     Swal.fire('The Internet?', 'Check network connection!', 'question');
                // }
            });

        });
    });


    $('#otp').click(function() {
        var email = $('#email').val();
        var hash = $('#hash').val();
        var uname = $('#uname').val();
        $.ajax({
            type: 'POST',
            url: '',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                $('.response').html(data.content);
                if (data.content == 'Successful') {
                    $('.response').html(data.content);
                   
                } else
                if (data.content == 'Error') {
                    $('.response').html(data.content);
                }
            },
            error: function(data, errorThrown) {
                Swal.fire('The Internet?', 'Network Anormaly !', 'question');
                return false;
            }
        });
    });

    function send(id) {
        id.innerHTML = "Confirming..<div class='spinner-border spinner-border-sm' role='status'><span class='sr-only'>Loading...</span></div>";
        setTimeout(function() {
            id.innerHTML = "confirm";
        }, 2000);
    }

    function otp(id) {
        id.innerHTML = "Please wait..<div class='spinner-border spinner-border-sm' role='status'><span class='sr-only'>Loading...</span></div>";
        setTimeout(function() {
            id.innerHTML = "Resend <i class='bx bx-mail-send'></i>";
        }, 2000);
    }
</script>