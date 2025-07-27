@include('dashboard.header')

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>
        Dashboard - Union Saver Trust Bank </title>
    <meta name="description" content="Union Saver Trust Bank Mobile Banking">
    <meta name="keywords"
        content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="{{asset('asset/img/favicon.png" sizes="32x32') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('asset/img/icon/192x192.png')}}">
    <link rel="stylesheet" href="{{asset('asset/panel/css/style.css')}}">
    <link rel="manifest" href="__manifest.json">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



</head>

<body>

    <!-- loader -->
    <!--<div id="loader">-->
    <!--    <img src="asset/img/loading-icon.png" alt="icon" class="loading-icon">-->
    <!--</div>-->
    <!-- * loader -->

    <div id="loader">
        <span class="spinner-grow spinner-grow-sm me-05" role="status" aria-hidden="true" class="loading-icon"></span>
        Loading...
    </div>



    <!-- App Capsule -->
    <div id="appCapsule">
        <!-- App Header -->
        <div class="appHeader">
            <div class="left">
                <!--<a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">-->
                <!--    <ion-icon name="menu-outline"></ion-icon>-->
                <!--</a>-->
                <a href="" class="headerButton">
                    
                </a>
            </div>
            <div class="pageTitle">
                Union Saver Trust Bank Card </div>


            <div class="right">
                <a onclick="location.reload();" class="headerButton">
                    <ion-icon name="refresh"></ion-icon>
                </a>
                <!-- <a href="user/dashboard.php" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">New</span>
            </a> -->
            </div>
        </div>
        <!-- * App Header -->

        <!-- App Capsule -->
        <div class="section mt-3">


            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs capsuled" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#ngn" role="tab">
                                Virtual Card
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#usd" role="tab" disabled>
                               Physical Card (disabled)
                            </a>
                        </li>

                    </ul>
                </div>
            </div><br>

       

            @if (session('error'))
            <div class="alert box-bdr-red alert-dismissible fade show text-red" role="alert">
                                          <b>Error!</b>{{ session('error') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert"
                                              aria-label="Close"></button>
                  </div>
                  @elseif (session('status'))
                  <div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
                                          <b>Success!</b> {{ session('status') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                @forelse($details as $detail)
                @if($detail->status == 0)
                    <div class="tab-content mt-1">
                        <div class="tab-pane fade show active" id="ngn" role="tabpanel">
                            <div class="card-block mb-2" style="background-color: #305C89">
                                <div class="card-main">
                                    <div class="card-button dropdown">
                                        <!-- Display an image or icon indicating the card is under review -->
                                        <img src="under.png" alt="Under Review"
                                             class="image-block imaged w48 lazy animate">
                                    </div>
                                    <div class="balance">
                                        <h1 class="title">Card on Review</h1>
                                        <p>This card is currently under review and cannot be displayed.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Display the card details as usual -->
                    <div class="tab-content mt-1">
                        <div class="tab-pane fade show active" id="ngn" role="tabpanel">
                            <div class="card-block mb-2" style="background-color: #305C89">
                                <div class="card-main">
                                    <div class="card-button dropdown">
                                        <img src="mastercard.png" alt="img" class="image-block imaged w48 lazy animate">
                                    </div>
                                    <div class="balance">
                                        <img src="assets/images/logo2.png" alt="img" class="image-block imaged w48 lazy animate"
                                             width="800px">
                                        <h1 class="title">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
                                    </div>
                                    <div class="in">
                                        <div class="card-number">
                                            <span class="label">Card Number</span>
                                            {{ implode(' ', str_split($detail->card_number, 4)) }}
                                        </div>
                                        <div class="bottom">
                                            <div class="card-expiry">
                                                <span class="label">Expiry</span>
                                                {{ \Carbon\Carbon::parse($detail->card_expiry)->format('m/y') }}
                                            </div>
                                            <div class="card-ccv">
                                                <span class="label">CCV</span>
                                                {{ $detail->card_cvc }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <p>No Card Yet</p>
          
            



                  
                    <!-- Wallet Card -->





                    @endforelse
                    <div class="section mt-2">
                        <center>

                            <div class="card-body pb-1">

                                <a href="{{route('card_withdrawal')}}" type="button" class="btn btn-outline-dark me-1 mb-1">Card Withdrawal</a>
                            </div>
                            </form>
                        </center>
                    </div><br>


                    <div class="card">
                        <ul class="">
                            <li>
                                <a href="#" class="item">
                                    <div class="in">
                                        <div>Instant Access
                                            <div class="text-muted">
                                                Apply and activate instantly </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
<br>

                    <div class="card">
                        <ul class="">
                            <li>
                                <a href="#" class="item">
                                    <div class="in">
                                        <div>Safety
                                            <div class="text-muted">
                                                No physical handing. No risk of loss </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <br>

                    

                   <b>Personal Information</b>
                    <div class="card">
                        
                        <ul class="listview flush transparent image-listview text">
                            <li>
                                <a href="#" class="item">
                                    <div class="in">
                                        <div>First Name
                                            <div class="text-muted">
                                                {{Auth::user()->first_name}}
                                                </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="item">
                                    <div class="in">
                                        <div>Last Name
                                            <div class="text-muted">
                                                {{Auth::user()->last_name}} 
                                                 </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="item">
                                    <div class="in">
                                        <div>Date of Birth
                                            <div class="text-muted">
                                                {{Auth::user()->dob}} </div>
                                        </div>
                                    </div>
                                </a>
                            </li>


                            <li>
                                <a href="#" class="item">
                                    <div class="in">
                                        <div>Gender
                                            <div class="text-muted">
                                                {{Auth::user()->gender}}  </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="#" class="item">
                                    <div class="in">
                                        <div>Billing Address
                                            <div class="text-muted">
                                                illinois </div>
                                        </div>
                                    </div>
                                </a>
                            </li> --}}

                            

                        </ul>
                    </div>


                   

                    <div class="action-sheet-content">
                        <div class="form-group basic">
                            <a href="{{route('request.card', Auth::user()->id)}}" >  <button type="button" class="btn btn-primary btn-block btn-lg" data-bs-dismiss="modal">  Get It Now </button></a>
                        </div>

                   
        


                    <!-- * carousel single -->
                </div>


               


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * Transfer Limit Action Sheet -->


            <script>
                var data = null;
console.log(data);

function crypto_type(id) {
    for (var i = 0; i < data.length; i++) {
        if (id == data[i].id) {
            $("#wallet_address").val(data[i].wallet_address);
        }
    }
}
            </script>


            <script>
                //  Preloader
jQuery(window).on("load", function() {
    $("#preloader").fadeOut(2000);
    $("#main-wrapper").addClass("show");
});
            </script>

            <script src="asset/panel/js/main.js"></script>
            <!-- ========= JS Files =========  -->
            <!-- Bootstrap -->
            <script src="asset/panel/js/lib/bootstrap.bundle.min.js"></script>
            <!-- Ionicons -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
            <!-- Splide -->
            <script src="asset/panel/js/plugins/splide/splide.min.js"></script>
            <!-- Base Js File -->
            <script src="asset/panel/js/base.js"></script>



            <script>
                var style_url, url, token;
style_url = "asset/panel/css/";
url = "{{url('/')}}";
token = "{{Session::token()}}";
            </script>

</body>

</html>






        <!--**********************************
            Footer start
        ***********************************-->





        
        <style>
            /* Example CSS styles for the bottom header */
            .bottom-header {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: #ffffff;
                border-top: 1px solid #e0e0e0;
                padding: 10px 20px;
                box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1);
                z-index: 1000;
            }
    
            .bottom-header ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
    
            .bottom-header li {
                margin-right: 20px;
            }
    
            .bottom-header a {
                color: #333333;
                text-decoration: none;
                font-weight: bold;
            }
        </style>
    </head>
    
    <body>
        <!-- Your existing HTML content -->
    
        <!-- Bottom Header -->
        <div class="bottom-header">
            <ul>
                <li><ion-icon name="document-text-outline"></ion-icon><a href="{{route('dashboard')}}"> Overview</a></i></li>
                <li>  <ion-icon name="arrow-forward-outline"></ion-icon><a href="{{route('bank')}}"> Transfer</a></i></li>
                <li> <ion-icon name="card-outline"></ion-icon><a href="{{route('card')}}"> Cards</a></i></li>
                
                <li><ion-icon name="list"></ion-icon>
                    <a href="{{route('transactions')}}">History</a></i></li>
                <!-- Add more links as needed -->
            </ul>
            
        </div>
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <!-- Datatable -->
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/deznav-init.js')}}"></script>
    <script src="{{asset('js/demo.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--<script src="js/styleSwitcher.js"></script>-->
    <script src="{{asset('js/app/app.js')}}"></script>
 
    <script>
        (function($) {
            var table = $('#example5').DataTable({
                searching: false,
                paging: true,
                select: false,
                //info: false,         
                lengthChange: false

            });
            $('#example tbody').on('click', 'tr', function() {
                var data = table.row(this).data();

            });
        })(jQuery);
    </script>


</body>

</html>
<!-- Bottom Header -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.querySelector('.toggle-btn');
        const overlay = document.querySelector('.overlay');
        const balanceToggle = document.getElementById('balanceToggle');
        const balanceDisplay = document.querySelector('.balance-display');
        const animateElements = document.querySelectorAll('.animate-fadein');
        
        // Toggle sidebar
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
            document.body.classList.toggle('no-scroll');
        });
        
        // Close sidebar when clicking overlay
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
            document.body.classList.remove('no-scroll');
        });
        
      
        
        // Auto-hide sidebar on mobile when clicking a link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                if(window.innerWidth <= 1199) {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                    document.body.classList.remove('no-scroll');
                }
            });
        });
        
        // Initialize animations
        setTimeout(() => {
            animateElements.forEach(el => {
                el.style.opacity = '1';
            });
        }, 100);
        
        // Initialize spending chart
        const ctx = document.getElementById('spendingChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Transfers', 'Withdrawals', 'Payments', 'Deposits'],
                datasets: [{
                    data: [35, 25, 20, 20],
                    backgroundColor: [
                        '#4e54c8',
                        '#11998e',
                        '#f46b45',
                        '#6c757d'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 10,
                            padding: 20
                        }
                    }
                }
            }
        });
    });
    
    function triggerFileInput() {
        document.getElementById('profilePictureInput').click();
    }

    function uploadProfilePicture() {
        document.getElementById('uploadForm').submit();
    }
</script>

<style>
    /* Improved responsive styles */
    .container-fluid {
        padding-left: 15px;
        padding-right: 15px;
    }
    
    .dashboard-card {
        padding: 1.25rem;
        border-radius: 12px;
        background: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        margin-bottom: 0;
        height: 100%;
    }
    
    .card-title {
        font-size: 1.1rem;
        color: var(--secondary);
    }
    
    .balance-display {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--dark);
        transition: all 0.3s ease;
    }
    
    .account-status {
        font-size: 0.8rem;
        color: var(--success);
    }
    
    /* Card styles */
    .card-block {
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    
    /* Quick actions */
    .quick-actions-scroll {
        overflow-x: auto;
        padding-bottom: 10px;
    }
    
    .quick-actions-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 10px;
        min-width: 500px;
    }
    
    .quick-action {
        background: var(--white);
        border-radius: 8px;
        padding: 12px 8px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        transition: all 0.3s ease;
        color: var(--secondary);
        text-decoration: none;
    }
    
    .quick-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        color: var(--primary);
    }
    
    .action-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 8px;
        color: white;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        font-size: 1rem;
    }
    
    .action-label {
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    /* Transaction list */
    .transaction-list {
        max-height: 300px;
        overflow-y: auto;
    }
    
    .transaction-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    
    .transaction-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        color: white;
    }
    
    .icon-transfer {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
    }
    
    .icon-loan {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
    }
    
    .icon-card {
        background: linear-gradient(135deg, #6610f2 0%, #6f42c1 100%);
    }
    
    .icon-crypto {
        background: linear-gradient(135deg, #f7931a 0%, #ff9500 100%);
    }
    
    .icon-paypal {
        background: linear-gradient(135deg, #003087 0%, #009cde 100%);
    }
    
    .icon-skrill {
        background: linear-gradient(135deg, #7acb4a 0%, #5a9e2f 100%);
    }
    
    .icon-default {
        background: linear-gradient(135deg, #adb5bd 0%, #6c757d 100%);
    }
    
    .transaction-title {
        font-size: 0.95rem;
        margin-bottom: 2px;
        color: var(--dark);
    }
    
    .transaction-meta {
        font-size: 0.75rem;
        color: var(--gray);
    }
    
    .transaction-amount {
        font-weight: 600;
        text-align: right;
    }
    
    .amount-positive {
        color: var(--success);
    }
    
    .amount-negative {
        color: var(--danger);
    }
    
    .transaction-status {
        display: block;
        font-size: 0.7rem;
        font-weight: 500;
        margin-top: 2px;
    }
    
    .status-completed {
        color: var(--success);
    }
    
    .status-pending {
        color: var(--warning);
    }
    
    .status-failed {
        color: var(--danger);
    }
    
    /* Chart container */
    .chart-container {
        position: relative;
        height: 200px;
        margin: 0 auto;
    }
    
    /* Carousel */
    .carousel-advert {
        height: 150px;
        background-size: cover;
        background-position: center;
    }
    
    .carousel-control-prev, 
    .carousel-control-next {
        width: 30px;
        height: 30px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0,0,0,0.2);
        border-radius: 50%;
    }
    
    /* Bottom navigation */
    .bottom-header {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: white;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        z-index: 1000;
    }
    
    .bottom-header ul {
        display: flex;
        justify-content: space-around;
        padding: 0;
        margin: 0;
        list-style: none;
    }
    
    .bottom-header .link-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 8px 0;
        font-size: 0.7rem;
        color: var(--gray);
        text-decoration: none;
    }
    
    .bottom-header .link-item i {
        font-size: 1.1rem;
        margin-bottom: 4px;
    }
    
    .bottom-header .link-item a {
        color: var(--gray);
        text-decoration: none;
    }
    
    /* Responsive adjustments */
    @media (max-width: 767px) {
        .balance-display {
            font-size: 1.5rem;
        }
        
        .quick-actions-grid {
            grid-template-columns: repeat(6, 1fr);
            min-width: 100%;
        }
        
        .action-icon {
            width: 32px;
            height: 32px;
            font-size: 0.9rem;
        }
        
        .action-label {
            font-size: 0.7rem;
        }
        
        .transaction-icon {
            width: 36px;
            height: 36px;
            margin-right: 8px;
        }
        
        .transaction-title {
            font-size: 0.85rem;
        }
        
        .transaction-meta {
            font-size: 0.7rem;
        }
        
        .transaction-amount {
            font-size: 0.9rem;
        }
    }
    
    @media (min-width: 768px) {
        .carousel-advert {
            height: 200px;
        }
    }
</style>
</body>
</html>

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset('vendor/global/global.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Datatable -->
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('js/deznav-init.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--<script src="js/styleSwitcher.js"></script>-->
<script src="{{asset('js/app/app.js')}}"></script>

<script>
    (function($) {
        var table = $('#example5').DataTable({
            searching: false,
            paging: true,
            select: false,
            //info: false,         
            lengthChange: false

        });
        $('#example tbody').on('click', 'tr', function() {
            var data = table.row(this).data();

        });
    })(jQuery);
</script>


</body>

</html>
