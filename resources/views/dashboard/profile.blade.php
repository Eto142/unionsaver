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


