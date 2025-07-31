@include('dashboard.header')
<div class="profile-container">
    <!-- Profile Header Section -->
    <div class="profile-header">
        <div class="cover-photo">
            <div class="profile-photo">
                <img src="{{ asset('uploads/display/' . (Auth::user()->display_picture ? Auth::user()->display_picture : 'avatar.jpg')) }}" alt="Profile Picture">
                <button class="edit-photo-btn" data-bs-toggle="tab" data-bs-target="#change-image">
                    <i class="fas fa-camera"></i>
                </button>
            </div>
        </div>
        <div class="profile-info">
            <h2>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h2>
            <p class="account-type">{{Auth::user()->account_type}} Account</p>
            <div class="profile-meta">
                <span><i class="fas fa-envelope"></i> {{Auth::user()->email}}</span>
                <span><i class="fas fa-phone"></i> {{Auth::user()->phone_number}}</span>
                <span><i class="fas fa-map-marker-alt"></i> {{Auth::user()->address}}</span>
            </div>
            <button class="btn btn-kyc" data-bs-toggle="modal" data-bs-target="#kycModal">
                <i class="fas fa-id-card"></i> KYC Verification
            </button>
        </div>
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

    <!-- Main Content -->
    <div class="profile-content">
        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button">
                    <i class="fas fa-user-circle"></i> Account
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button">
                    <i class="fas fa-shield-alt"></i> Security
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button">
                    <i class="fas fa-cog"></i> Settings
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="profileTabsContent">
            <!-- Account Tab -->
            <div class="tab-pane fade show active" id="account" role="tabpanel">
                <div class="account-section">
                    <div class="account-card">
                        <h3><i class="fas fa-info-circle"></i> Account Information</h3>
                        <div class="account-details">
                            <div class="detail-item">
                                <span class="detail-label">Account Number:</span>
                                <span class="detail-value">{{Auth::user()->a_number}}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Account Type:</span>
                                <span class="detail-value">{{Auth::user()->account_type}}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Account Purpose:</span>
                                <span class="detail-value">{{ Auth::user()->account_purpose ?? 'Not specified' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="account-card">
                        <h3><i class="fas fa-id-card"></i> Personal Information</h3>
                        <div class="account-details">
                            <div class="detail-item">
                                <span class="detail-label">Full Name:</span>
                                <span class="detail-value">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Date of Birth:</span>
                                <span class="detail-value">{{ Auth::user()->dob ? \Carbon\Carbon::parse(Auth::user()->dob)->format('M d, Y') : 'Not specified' }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Gender:</span>
                                <span class="detail-value">{{ Auth::user()->gender ?? 'Not specified' }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Nationality:</span>
                                <span class="detail-value">{{Auth::user()->country}}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Address:</span>
                                <span class="detail-value">{{Auth::user()->address}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Tab -->
            <div class="tab-pane fade" id="security" role="tabpanel">
                <div class="security-section">
                    <form id="user_password" action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div id="user_password_response"></div>
                        
                        <div class="form-group">
                            <label for="old_password">Current Password</label>
                            <div class="input-with-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="old_password" name="old_password" placeholder="Enter current password">
                            </div>
                            @error('old_password')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <div class="input-with-icon">
                                <i class="fas fa-key"></i>
                                <input type="password" id="new_password" name="new_password" placeholder="Enter new password">
                            </div>
                            @error('new_password')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm Password</label>
                            <div class="input-with-icon">
                                <i class="fas fa-check-circle"></i>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm new password">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-save">
                            <i class="fas fa-save"></i> Update Password
                        </button>
                    </form>
                </div>
            </div>

            <!-- Settings Tab -->
            <div class="tab-pane fade" id="settings" role="tabpanel">
                <div class="settings-section">
                    <form id="user_info" action="{{route('personal.details')}}" method="POST">
                        @csrf
                        <div id="user_info_response"></div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" value="{{Auth::user()->first_name}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" value="{{Auth::user()->last_name}}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="user_address">Address</label>
                            <textarea id="user_address" name="user_address">{{Auth::user()->address}}</textarea>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="user_phone">Phone</label>
                                <input type="text" id="user_phone" name="user_phone" value="{{Auth::user()->phone_number}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dob">Date of Birth</label>
                                <input type="date" id="dob" name="dob" value="{{Auth::user()->dob}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender">
                                    <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ Auth::user()->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-save">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </form>
                    
                    <div class="avatar-section">
                        <h3><i class="fas fa-image"></i> Profile Picture</h3>
                        <form id="update_avatar" action="{{route('personal.dp')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="avatar_response"></div>
                            <div class="avatar-upload">
                                <div class="current-avatar">
                                    <img src="{{ asset('uploads/display/' . (Auth::user()->display_picture ? Auth::user()->display_picture : 'avatar.jpg')) }}" alt="Current Avatar">
                                </div>
                                <div class="upload-controls">
                                    <label for="avatar-upload" class="btn btn-upload">
                                        <i class="fas fa-cloud-upload-alt"></i> Choose Image
                                    </label>
                                    <input id="avatar-upload" name="image" type="file" accept="image/*" required>
                                    <button type="submit" class="btn btn-save">
                                        <i class="fas fa-save"></i> Update Avatar
                                    </button>
                                    <p class="upload-note">Max file size: 5MB</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- KYC Verification Modal -->
    <div class="modal fade" id="kycModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-id-card"></i> KYC Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('upload.kyc') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="driver_license">Driver's License</label>
                            <input type="file" id="driver_license" name="driver_license" required>
                        </div>
                        <div class="form-group">
                            <label for="passport">Passport</label>
                            <input type="file" id="passport" name="pass" required>
                        </div>
                        <div class="form-group">
                            <label for="idCard">Residence ID Card</label>
                            <input type="file" id="idCard" name="card" required>
                        </div>
                        <button type="submit" class="btn btn-submit">
                            <i class="fas fa-paper-plane"></i> Submit Documents
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Profile Container */
    .profile-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }

    /* Profile Header */
    .profile-header {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        margin-bottom: 30px;
        position: relative;
    }

    .cover-photo {
        height: 180px;
        background: linear-gradient(135deg, #0f113fff 0%, #8f94fb 100%);
        position: relative;
    }

    .profile-photo {
        position: absolute;
        bottom: -60px;
        left: 40px;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 5px solid #fff;
        background: #fff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .profile-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .edit-photo-btn {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #0f113fff;
        color: white;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .edit-photo-btn:hover {
         background: #0f113fff;
        transform: scale(1.1);
    }

    .profile-info {
        padding: 80px 40px 30px;
    }

    .profile-info h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
        color: #2c3e50;
    }

    .account-type {
        color: #7f8c8d;
        font-size: 16px;
        margin-bottom: 15px;
    }

    .profile-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 20px;
    }

    .profile-meta span {
        display: flex;
        align-items: center;
        color: #555;
    }

    .profile-meta i {
        margin-right: 8px;
        color: #06093aff;
    }

    .btn-kyc {
        background: linear-gradient(135deg, #0d0f2eff 0%, #0c0f47ff 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-kyc:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(78, 84, 200, 0.3);
    }

    /* Profile Content */
    .profile-content {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    /* Navigation Tabs */
    .nav-tabs {
        border-bottom: 1px solid #eee;
        padding: 0 20px;
    }

    .nav-tabs .nav-item {
        margin-bottom: -1px;
    }

    .nav-tabs .nav-link {
        border: none;
        color: #7f8c8d;
        font-weight: 600;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-link i {
        font-size: 18px;
    }

    .nav-tabs .nav-link.active {
        color: #0b0d39ff;
        border-bottom: 3px solid #4e54c8;
        background: transparent;
    }

    .nav-tabs .nav-link:hover:not(.active) {
        color: #0e1143ff;
    }

    /* Tab Content */
    .tab-content {
        padding: 30px;
    }

    /* Account Section */
    .account-section {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .account-card {
        background: #f9fafc;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    }

    .account-card h3 {
        font-size: 18px;
        margin-bottom: 20px;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .account-card h3 i {
        color: #141751ff;
    }

    .account-details {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 15px;
    }

    .detail-item {
        display: flex;
        flex-direction: column;
    }

    .detail-label {
        font-size: 14px;
        color: #7f8c8d;
        margin-bottom: 5px;
    }

    .detail-value {
        font-size: 16px;
        font-weight: 500;
        color: #2c3e50;
    }

    /* Security Section */
    .security-section {
        max-width: 600px;
        margin: 0 auto;
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #2c3e50;
    }

    .input-with-icon {
        position: relative;
    }

    .input-with-icon i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #7f8c8d;
    }

    .input-with-icon input {
        width: 100%;
        padding: 12px 15px 12px 45px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .input-with-icon input:focus {
        border-color: #020420ff;
        box-shadow: 0 0 0 3px rgba(78, 84, 200, 0.2);
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        min-height: 100px;
        resize: vertical;
        transition: all 0.3s ease;
    }

    textarea:focus {
        border-color: #4e54c8;
        box-shadow: 0 0 0 3px rgba(78, 84, 200, 0.2);
    }

    select {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 15px;
        transition: all 0.3s ease;
    }

    select:focus {
        border-color: #4e54c8;
        box-shadow: 0 0 0 3px rgba(78, 84, 200, 0.2);
    }

    /* Avatar Section */
    .avatar-section {
        margin-top: 40px;
        padding-top: 30px;
        border-top: 1px solid #eee;
    }

    .avatar-section h3 {
        font-size: 18px;
        margin-bottom: 20px;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .avatar-section h3 i {
        color: #4e54c8;
    }

    .avatar-upload {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 30px;
    }

    .current-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        border: 5px solid #f1f3f6;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .current-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .upload-controls {
        flex: 1;
        min-width: 250px;
    }

    #avatar-upload {
        display: none;
    }

    .upload-note {
        font-size: 14px;
        color: #7f8c8d;
        margin-top: 10px;
    }

    /* Buttons */
    .btn-save {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(78, 84, 200, 0.3);
    }

    .btn-upload {
        background: #f1f3f6;
        color: #4e54c8;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-right: 15px;
    }

    .btn-upload:hover {
        background: #e1e5eb;
    }

    /* Modal Styles */
    .modal-content {
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }

    .modal-header {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
        color: white;
        border-bottom: none;
    }

    .modal-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-close {
        filter: invert(1);
    }

    .btn-submit {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        justify-content: center;
        margin-top: 15px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(78, 84, 200, 0.3);
    }

    /* Error Messages */
    .error-message {
        color: #e74c3c;
        font-size: 14px;
        margin-top: 5px;
        display: block;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .profile-info {
            padding: 80px 20px 20px;
        }
        
        .profile-photo {
            left: 20px;
            width: 120px;
            height: 120px;
            bottom: -50px;
        }
    }

    @media (max-width: 768px) {
        .profile-container {
            padding: 15px;
        }
        
        .profile-header {
            margin-bottom: 20px;
        }
        
        .cover-photo {
            height: 150px;
        }
        
        .profile-photo {
            width: 100px;
            height: 100px;
            bottom: -40px;
            left: 15px;
        }
        
        .profile-info {
            padding: 70px 15px 15px;
        }
        
        .profile-info h2 {
            font-size: 24px;
        }
        
        .profile-meta {
            flex-direction: column;
            gap: 10px;
        }
        
        .tab-content {
            padding: 20px 15px;
        }
        
        .account-details {
            grid-template-columns: 1fr;
        }
        
        .avatar-upload {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }
        
        .nav-tabs .nav-link {
            padding: 12px 15px;
            font-size: 14px;
        }
    }

    @media (max-width: 576px) {
        .profile-photo {
            width: 80px;
            height: 80px;
            bottom: -30px;
        }
        
        .edit-photo-btn {
            width: 30px;
            height: 30px;
            font-size: 12px;
        }
        
        .profile-info h2 {
            font-size: 20px;
        }
        
        .account-type {
            font-size: 14px;
        }
        
        .btn-kyc {
            padding: 8px 15px;
            font-size: 14px;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Initialize tooltips
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    // File input change handler for avatar upload
    document.getElementById('avatar-upload').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'No file chosen';
        document.querySelector('.upload-controls .btn-upload').textContent = fileName;
    });

    // Form submission handling (you can add AJAX submission here if needed)
    document.getElementById('user_info').addEventListener('submit', function(e) {
        // Add any custom validation or AJAX submission here
    });

    document.getElementById('user_password').addEventListener('submit', function(e) {
        // Add any custom validation or AJAX submission here
    });

    document.getElementById('update_avatar').addEventListener('submit', function(e) {
        // Add any custom validation or AJAX submission here
    });
</script>

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


