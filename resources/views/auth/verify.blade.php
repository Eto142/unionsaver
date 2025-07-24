<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Union Saver Trust Bank | Human Verification</title>
    <meta name="description" content="Complete human verification to access your account">
    <meta name="author" content="Union Saver Trust Bank">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Icons CSS -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet">
    <!-- App CSS -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet">
    
    <!-- Custom Verification CSS -->
    <style>
        :root {
            --primary-color: #3a7bd5;
            --secondary-color: #00d2ff;
            --dark-color: #1a237e;
            --light-color: #f5f7fb;
            --danger-color: #ff5252;
            --success-color: #4caf50;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        
        .verification-container {
            max-width: 480px;
            margin: 0 auto;
            perspective: 1000px;
        }
        
        .verification-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform-style: preserve-3d;
            transition: all 0.5s ease;
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            overflow: hidden;
        }
        
        .verification-card:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .verification-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .verification-header::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
            animation: shine 3s infinite linear;
        }
        
        @keyframes shine {
            0% { transform: rotate(30deg) translate(-30%, -30%); }
            100% { transform: rotate(30deg) translate(30%, 30%); }
        }
        
        .verification-title {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            position: relative;
        }
        
        .verification-subtitle {
            font-weight: 400;
            opacity: 0.9;
            font-size: 0.9rem;
        }
        
        .robot-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .verification-body {
            padding: 30px;
        }
        
        .verification-alert {
            background-color: rgba(58, 123, 213, 0.1);
            border-left: 4px solid var(--primary-color);
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 25px;
            position: relative;
        }
        
        .verification-alert::after {
            content: "⚠️";
            position: absolute;
            top: -12px;
            left: -12px;
            font-size: 1.5rem;
        }
        
        .verification-code-container {
            margin: 25px 0;
            text-align: center;
        }
        
        .verification-code {
            display: inline-block;
            font-family: 'Courier New', monospace;
            font-size: 2.2rem;
            font-weight: 700;
            letter-spacing: 8px;
            color: var(--dark-color);
            padding: 15px 25px;
            background: linear-gradient(135deg, #f5f7fa, #e4e8eb);
            border-radius: 8px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px dashed var(--primary-color);
            transform: skewX(-10deg);
            text-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .verification-code::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: scanning 2s infinite;
        }
        
        @keyframes scanning {
            100% { left: 100%; }
        }
        
        .verification-form .form-control {
            font-size: 1.2rem;
            text-align: center;
            padding: 12px;
            letter-spacing: 3px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .verification-form .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(58, 123, 213, 0.2);
        }
        
        .verification-form .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
        }
        
        .btn-verify {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            border-radius: 6px;
            color: white;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-verify:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(58, 123, 213, 0.4);
        }
        
        .btn-verify::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(30deg);
            transition: all 0.3s ease;
        }
        
        .btn-verify:hover::after {
            left: 100%;
        }
        
        .resend-link {
            color: var(--primary-color);
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .resend-link:hover {
            color: var(--dark-color);
            text-decoration: none;
        }
        
        .footer-text {
            color: #6c757d;
            font-size: 0.85rem;
        }
        
        .bank-logo {
            height: 40px;
            margin-bottom: 20px;
        }
        
        /* Loading animation */
        .spinner-track {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            vertical-align: middle;
            margin-left: 8px;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .verification-code {
                font-size: 1.8rem;
                letter-spacing: 5px;
                padding: 12px 20px;
            }
            
            .verification-body {
                padding: 20px;
            }
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
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="text-center mb-4">
                        <a href="index.html" class="d-block">
                            <img src="{{asset('logo.png')}}" alt="Union Saver Trust Bank" class="bank-logo">
                        </a>
                    </div>
                    
                    <!-- Session Messages -->
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                        <i class="mdi mdi-alert-circle-outline me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="mdi mdi-check-circle-outline me-2"></i>
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="verification-container">
                        <div class="verification-card">
                            <div class="verification-header">
                                <div class="robot-icon">
                                    <i class="mdi mdi-robot"></i>
                                </div>
                                <h3 class="verification-title">HUMAN VERIFICATION REQUIRED</h3>
                                <p class="verification-subtitle">Prove you're not a robot to continue</p>
                            </div>
                            
                            <div class="verification-body">
                                <div class="verification-alert">
                                    <strong>SECURITY NOTICE:</strong> To protect your account from automated attacks, please verify the security code below. This one-time verification ensures secure access to your User Dashboard.
                                </div>
                                
                                <div class="text-center mb-4">
                                    <h5 class="text-muted mb-3">WELCOME, {{ strtoupper(Auth::user()->name) }}</h5>
                                    <p class="text-muted">Your verification token:</p>
                                </div>
                                
                                <div class="verification-code-container">
                                    <div class="verification-code">
                                        {{ Auth::user()->token }}
                                    </div>
                                </div>
                                
                                <form id="verifyForm" action="{{ route('code') }}" method="POST" class="verification-form">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ Auth::user()->token }}">
                                    
                                    <div class="mb-4">
                                        <label for="verificationCode" class="form-label">ENTER VERIFICATION CODE</label>
                                        <input type="text" 
                                               name="digit" 
                                               id="verificationCode" 
                                               class="form-control" 
                                               placeholder="••••••" 
                                               required 
                                               autocomplete="off"
                                               maxlength="6"
                                               pattern="[0-9]*"
                                               inputmode="numeric">
                                        <div class="form-text">Type the 6-digit code displayed above</div>
                                    </div>
                                    
                                    <div class="d-grid gap-2">
                                        <button type="submit" id="verifyBtn" class="btn btn-verify btn-lg">
                                            <span id="btnText">VERIFY IDENTITY</span>
                                            <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                                        </button>
                                    </div>
                                </form>
                                
                                <div class="text-center mt-4">
                                    <p class="text-muted">Didn't receive a code? 
                                        <a href="{{ route('resendCode', $id) }}" class="resend-link" id="resendLink">
                                            <i class="mdi mdi-reload"></i> RESEND CODE
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <p class="footer-text">
                                &copy; <script>document.write(new Date().getFullYear())</script> Union Saver Trust Bank. 
                                All rights reserved <i class="mdi mdi-shield-check text-success"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Toast Notification -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1005">
        <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="mdi mdi-alert-circle-outline me-2"></i>
                    <span id="toastMessage"></span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
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
    
    <!-- Verification Script -->
    <script>
        $(document).ready(function() {
            // Initialize Bootstrap Toast
            const errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
            
            // Auto-focus on the verification code input
            $('#verificationCode').focus();
            
            // Input validation - only allow numbers
            $('#verificationCode').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
            
            // Form submission handler
            $('#verifyForm').on('submit', function(e) {
                e.preventDefault();
                
                const btn = $('#verifyBtn');
                const btnText = $('#btnText');
                const btnSpinner = $('#btnSpinner');
                const formData = $(this).serialize();
                
                // Show loading state
                btn.prop('disabled', true);
                btnText.html('VERIFYING... <span class="spinner-track"></span>');
                
                // Submit form via AJAX
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.redirect) {
                            // Add success animation before redirect
                            btnText.html('<i class="mdi mdi-check-circle"></i> VERIFIED!');
                            btn.removeClass('btn-primary').addClass('btn-success');
                            
                            setTimeout(function() {
                                window.location.href = response.redirect;
                            }, 1000);
                        } else if (response.error) {
                            showError(response.error);
                        }
                    },
                    error: function(xhr) {
                        const errorMessage = xhr.responseJSON && xhr.responseJSON.message 
                            ? xhr.responseJSON.message 
                            : 'An error occurred during verification. Please try again.';
                        showError(errorMessage);
                    },
                    complete: function() {
                        // Reset button state after 1.5 seconds
                        setTimeout(function() {
                            btn.prop('disabled', false);
                            btnText.text('VERIFY IDENTITY');
                            btnSpinner.addClass('d-none');
                        }, 1500);
                    }
                });
            });
            
            // Resend link handler
            $('#resendLink').on('click', function(e) {
                e.preventDefault();
                const link = $(this);
                const originalHtml = link.html();
                
                // Show loading state
                link.html('<span class="spinner-border spinner-border-sm" role="status"></span> SENDING...');
                
                // Make the request
                $.get(link.attr('href'))
                    .done(function(response) {
                        if (response.success) {
                            // Show success message
                            Swal.fire({
                                title: 'CODE RESENT',
                                text: response.message,
                                icon: 'success',
                                timer: 3000,
                                showConfirmButton: false,
                                background: 'linear-gradient(135deg, #ffffff, #f8f9fa)',
                                backdrop: `
                                    rgba(0,0,0,0.5)
                                    url("/images/robot-verify.gif")
                                    center top
                                    no-repeat
                                `
                            });
                            
                            // Update the verification code display
                            if (response.new_token) {
                                $('.verification-code').text(response.new_token);
                                $('input[name="token"]').val(response.new_token);
                                
                                // Add visual feedback
                                const codeElement = $('.verification-code');
                                codeElement.css('transform', 'scale(1.1)');
                                setTimeout(function() {
                                    codeElement.css('transform', 'scale(1)');
                                }, 300);
                            }
                        }
                    })
                    .fail(function() {
                        showError('Failed to resend code. Please try again later.');
                    })
                    .always(function() {
                        // Restore original text after 1 second
                        setTimeout(function() {
                            link.html(originalHtml);
                        }, 1000);
                    });
            });
            
            // Function to show error messages
            function showError(message) {
                $('#toastMessage').text(message);
                errorToast.show();
                
                // Add shake animation to form
                $('#verifyForm').addClass('animate__animated animate__headShake');
                setTimeout(function() {
                    $('#verifyForm').removeClass('animate__animated animate__headShake');
                }, 1000);
            }
            
            // Add scanning animation to verification code
            setInterval(function() {
                $('.verification-code').toggleClass('scanning');
            }, 2000);
        });
    </script>
</body>
</html>