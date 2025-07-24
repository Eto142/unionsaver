<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Union Saver Trust Bank | Account Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Union Saver Trust Bank Account Verification" name="description" />
    <meta content="Union Saver Trust Bank" name="author" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons CSS -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App CSS -->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    
    <!-- Custom CSS -->
    <style>
        .verification-container {
            max-width: 500px;
            margin: 0 auto;
        }
        .verification-code {
            letter-spacing: 5px;
            font-size: 2.2rem;
            padding: 15px;
            background: linear-gradient(135deg, #3a7bd5, #00d2ff);
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }
        .verification-input {
            font-size: 1.2rem;
            text-align: center;
            padding: 12px;
            letter-spacing: 2px;
        }
        .alert-note {
            border-left: 4px solid #3a7bd5;
            background-color: #f8f9fa;
        }
        .btn-verify {
            padding: 12px;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .auth-logo {
            margin-bottom: 2rem;
        }
        body {
            background-color: #f5f7fb;
        }
    </style>
</head>

<body>
    <!-- Language Selector -->
    <div class="gtranslate_wrapper"></div>
    <script>
        window.gtranslateSettings = {
            "default_language": "en",
            "detect_browser_language": true,
            "wrapper_selector": ".gtranslate_wrapper",
            "switcher_horizontal_position": "right",
            "switcher_vertical_position": "top",
            "alt_flags": {
                "en": "usa",
                "pt": "brazil",
                "es": "colombia",
                "fr": "quebec"
            }
        }
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="text-center mb-4">
                        <a href="index.html" class="d-block auth-logo">
                            <img src="{{asset('logo.png')}}" alt="Union Saver Trust Bank" height="40" class="auth-logo-dark mx-auto">
                            <img src="{{asset('logo.png')}}" alt="Union Saver Trust Bank" height="40" class="auth-logo-light mx-auto">
                        </a>
                    </div>
                    
                    <!-- Session Messages -->
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <h4 class="fw-bold">Welcome {{ Auth::user()->name }}</h4>
                                <p class="text-muted">Account Verification</p>
                            </div>

                            <div class="alert alert-note mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-2">
                                        <i class="mdi mdi-alert-circle-outline text-primary fs-4"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="text-danger fw-bold">*</span> Please confirm you are not a robot by verifying the auto-generated code below. This will enable you to access your <strong>User Dashboard</strong>.
                                    </div>
                                </div>
                            </div>

                            <!-- Verification Code Display -->
                            <div class="text-center mb-4">
                                <p class="text-muted mb-2">Your verification code:</p>
                                <div class="verification-code mx-auto">
                                    {{ Auth::user()->token }}
                                </div>
                            </div>

                            <!-- Verification Form -->
                            <form id="verifyForm" action="{{ route('code') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ Auth::user()->token }}">

                                <div class="mb-3">
                                    <label for="digit" class="form-label">Enter Verification Code</label>
                                    <input type="text" name="digit" id="digit" class="form-control verification-input" placeholder="••••••" required autocomplete="off" maxlength="6">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" id="verifyBtn" class="btn btn-primary btn-verify w-100">
                                        <span id="btnText">Verify Code</span>
                                        <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                                    </button>
                                </div>
                            </form>

                            <div class="text-center mt-3">
                                <p class="text-muted">Didn't receive a code?
                                    <a href="{{ route('resendCode', $id) }}" class="fw-semibold text-primary" id="resendLink">
                                        Resend Code <i class="bx bx-mail-send"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p class="text-muted">
                            &copy; <script>document.write(new Date().getFullYear())</script> Union Saver Trust Bank.
                            All rights reserved <i class="bx bx-check-shield text-success"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Toast Notification -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1005">
        <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <img src="{{asset('logo.png')}}" alt="" class="me-2" height="18">
                <strong class="me-auto">Error</strong>
                <small>Just now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-light text-dark" id="toastMessage"></div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    
    <!-- Custom Script -->
    <script>
        $(document).ready(function() {
            // Initialize Bootstrap Toast
            var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
            
            // Form submission handler
            $('#verifyForm').on('submit', function(e) {
                e.preventDefault();
                
                var btn = $('#verifyBtn');
                var btnText = $('#btnText');
                var btnSpinner = $('#btnSpinner');
                
                // Show loading state
                btn.prop('disabled', true);
                btnText.text('Verifying...');
                btnSpinner.removeClass('d-none');
                
                // Submit form via AJAX
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        } else if (response.error) {
                            $('#toastMessage').text(response.error);
                            errorToast.show();
                        }
                    },
                    error: function(xhr) {
                        var errorMessage = xhr.responseJSON && xhr.responseJSON.message 
                            ? xhr.responseJSON.message 
                            : 'An error occurred during verification.';
                        
                        $('#toastMessage').text(errorMessage);
                        errorToast.show();
                    },
                    complete: function() {
                        // Reset button state
                        btn.prop('disabled', false);
                        btnText.text('Verify Code');
                        btnSpinner.addClass('d-none');
                    }
                });
            });
            
            // Resend link handler
            $('#resendLink').on('click', function(e) {
                e.preventDefault();
                var link = $(this);
                var originalText = link.html();
                
                // Show loading state
                link.html('<span class="spinner-border spinner-border-sm" role="status"></span> Sending...');
                
                // Make the request
                $.get(link.attr('href'), function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Code Resent',
                            text: response.message,
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }
                }).fail(function() {
                    $('#toastMessage').text('Failed to resend code. Please try again.');
                    errorToast.show();
                }).always(function() {
                    // Restore original text
                    setTimeout(function() {
                        link.html(originalText);
                    }, 1000);
                });
            });
            
            // Auto-focus on the input field
            $('#digit').focus();
            
            // Input formatting - only allow numbers and auto-tab (if implementing multiple inputs)
            $('#digit').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>
</body>
</html>