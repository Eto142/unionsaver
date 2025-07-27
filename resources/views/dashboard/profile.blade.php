@include('dashboard.header')
<div class="content-body">
    <div class="container-fluid">
        <div class="form-head mb-4">
            <h2 class="text-black font-w600 mb-0">Profile</h2>
        </div>
        
        <!-- Alert Messages -->
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Profile Header Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ asset('uploads/display/' . (Auth::user()->display_picture ? Auth::user()->display_picture : 'avatar.jpg')) }}" class="img-fluid rounded-circle" alt="Profile Picture">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                                    <p>{{Auth::user()->account_type}} Account</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{Auth::user()->email}}</h4>
                                    <p>Email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- KYC Verification Modal -->
        <div class="modal fade" id="kycModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">KYC Verification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('upload.kyc') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="driver_license" class="form-label">Driver's License</label>
                                <input type="file" class="form-control" id="driver_license" name="driver_license" required>
                            </div>
                            <div class="mb-3">
                                <label for="passport" class="form-label">Passport</label>
                                <input type="file" class="form-control" id="passport" name="pass" required>
                            </div>
                            <div class="mb-3">
                                <label for="idCard" class="form-label">Residence ID Card</label>
                                <input type="file" class="form-control" id="idCard" name="card" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Tabs Section -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#about-me" data-bs-toggle="tab" class="nav-link active show">Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#my-posts" data-bs-toggle="tab" class="nav-link">Authentification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Setting</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#change-image" data-bs-toggle="tab" class="nav-link">Change Avatar</a>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#kycModal">KYC Verification</button>
                                    </li>
                                </ul>
                                
                                <div class="tab-content">
                                    <!-- Account Tab -->
                                    <div id="about-me" class="tab-pane fade active show">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Account Description</h4>
                                                <p class="mb-2">Purpose: {{ Auth::user()->account_purpose ?? 'Not specified' }}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="profile-lang mb-5">
                                            <h4 class="text-primary mb-2">Account Number</h4>
                                            <span class="text-muted pe-3 f-s-16">{{Auth::user()->a_number}}</span>
                                        </div>

                                        <div class="profile-lang mb-5">
                                            <h4 class="text-primary mb-2">Account Type</h4>
                                            <span class="text-muted pe-3 f-s-16">{{Auth::user()->account_type}}</span>
                                        </div>
                                        
                                        <div class="profile-personal-info">
                                            <h4 class="text-primary mb-4">Personal Information</h4>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Name <span class="float-end">:</span></h5>
                                                </div>
                                                <div class="col-sm-9 col-7">
                                                    <span>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Email <span class="float-end">:</span></h5>
                                                </div>
                                                <div class="col-sm-9 col-7">
                                                    <span>{{Auth::user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Phone <span class="float-end">:</span></h5>
                                                </div>
                                                <div class="col-sm-9 col-7">
                                                    <span>{{Auth::user()->phone_number}}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Nationality <span class="float-end">:</span></h5>
                                                </div>
                                                <div class="col-sm-9 col-7">
                                                    <span>{{Auth::user()->country}}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Address <span class="float-end">:</span></h5>
                                                </div>
                                                <div class="col-sm-9 col-7">
                                                    <span>{{Auth::user()->address}}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Date of Birth <span class="float-end">:</span></h5>
                                                </div>
                                                <div class="col-sm-9 col-7">
                                                    <span>{{ Auth::user()->dob ? \Carbon\Carbon::parse(Auth::user()->dob)->format('M d, Y') : 'Not specified' }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Gender <span class="float-end">:</span></h5>
                                                </div>
                                                <div class="col-sm-9 col-7">
                                                    <span>{{ Auth::user()->gender ?? 'Not specified' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Authentication Tab -->
                                    <div id="my-posts" class="tab-pane fade">
                                        <div class="my-post-content pt-3">
                                            <form id="user_password" action="{{ route('update-password') }}" method="POST">
                                                @csrf
                                                <div id="user_password_response"></div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Current Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="old_password">
                                                        @error('old_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">New Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="new_password">
                                                        @error('new_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Confirm Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="new_password_confirmation">
                                                    </div>
                                                </div>
                                                <div class="mt-4 w-100">
                                                    <button id="btnPassword" type="submit" class="btn btn-success float-end">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Settings Tab -->
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Account Setting</h4>
                                                <form id="user_info" action="{{route('personal.details')}}" method="POST">
                                                    @csrf
                                                    <div id="user_info_response"></div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">First Name</label>
                                                            <input type="text" name="first_name" class="form-control" value="{{Auth::user()->first_name}}">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Last Name</label>
                                                            <input type="text" name="last_name" class="form-control" value="{{Auth::user()->last_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <textarea name="user_address" class="form-control">{{Auth::user()->address}}</textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Phone</label>
                                                            <input type="text" name="user_phone" class="form-control" value="{{Auth::user()->phone_number}}">
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Date of Birth</label>
                                                            <input type="date" name="dob" class="form-control" value="{{Auth::user()->dob}}">
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Gender</label>
                                                            <select name="gender" class="form-control">
                                                                <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                                <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                                <option value="Other" {{ Auth::user()->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button id="btn1" class="btn btn-primary" type="submit">Save Data</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Change Avatar Tab -->
                                    <div id="change-image" class="tab-pane fade">
                                        <form id="update_avatar" action="{{route('personal.dp')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div id="avatar_response" class="mb-5 mt-4"></div>
                                                <div class="mb-3 col-xl-12">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <img class="me-3 rounded-circle me-0 me-sm-3" src="{{ asset('uploads/display/' . (Auth::user()->display_picture ? Auth::user()->display_picture : 'avatar.jpg')) }}" width="55" height="55" alt="Current Avatar">
                                                        <div class="flex-grow-1">
                                                            <h4 class="mb-0">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                                                            <p class="mb-0">Max file size is 5mb</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="avatar" class="form-label">Select New Avatar</label>
                                                        <input name="image" type="file" accept="image/*" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-success">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include necessary JavaScript libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bottom Header -->
<div class="bottom-header">
    <ul>
        <li>
            <div class="link-item">
                <i class="fas fa-tachometer-alt"></i>
                <a href="{{route('dashboard')}}">Overview</a>
            </div>
        </li>
        <li>
            <div class="link-item">
                <i class="fas fa-exchange-alt"></i>
                <a href="{{route('bank')}}">Transfer</a>
            </div>
        </li>
        <li>
            <div class="link-item">
                <i class="fas fa-credit-card"></i>
                <a href="{{route('card')}}">Cards</a>
            </div>
        </li>
        <li>
            <div class="link-item">
                <i class="fas fa-history"></i>
                <a href="{{route('transactions')}}">History</a>
            </div>
        </li>
        <li>
            <div class="link-item">
                <i class="fas fa-sign-out-alt"></i>
                <a href="{{route('logOut')}}">Logout</a>
            </div>
        </li>
    </ul>
</div>

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


