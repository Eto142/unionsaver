@include('dashboard.header')

<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="form-head mb-4">
                    <h2 class="text-black font-w600 mb-0">Crypto</h2>
                                    </div>

                                   
                                        @if (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                                <b>Error!</b>{{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                                                                aria-label="Close"></button>
                                       </div>
                                        @elseif (session('status'))
                                        <div class="alert alert-success" role="alert">
                                        <b>Success!</b> {{ session('status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                <div class="row">
                    <div class="col-xl-9 col-xxl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card stacked-2">
                                    <div class="card-header flex-wrap border-0 pb-0 align-items-end">
                                        <div class="d-flex align-items-center mb-3 me-3">
                                            <svg class="me-3" width="68" height="68" viewbox="0 0 68 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M59.4999 31.688V19.8333C59.4999 19.0818 59.2014 18.3612 58.6701 17.8298C58.1387 17.2985 57.418 17 56.6666 17H11.3333C10.5818 17 9.86114 16.7014 9.32978 16.1701C8.79843 15.6387 8.49992 14.9181 8.49992 14.1666C8.49992 13.4152 8.79843 12.6945 9.32978 12.1632C9.86114 11.6318 10.5818 11.3333 11.3333 11.3333H56.6666C57.418 11.3333 58.1387 11.0348 58.6701 10.5034C59.2014 9.97208 59.4999 9.25141 59.4999 8.49996C59.4999 7.74851 59.2014 7.02784 58.6701 6.49649C58.1387 5.96514 57.418 5.66663 56.6666 5.66663H11.3333C9.07891 5.66663 6.9169 6.56216 5.32284 8.15622C3.72878 9.75028 2.83325 11.9123 2.83325 14.1666V53.8333C2.83325 56.0876 3.72878 58.2496 5.32284 59.8437C6.9169 61.4378 9.07891 62.3333 11.3333 62.3333H56.6666C57.418 62.3333 58.1387 62.0348 58.6701 61.5034C59.2014 60.9721 59.4999 60.2514 59.4999 59.5V47.6453C61.1561 47.0683 62.5917 45.9902 63.6076 44.5605C64.6235 43.1308 65.1693 41.4205 65.1693 39.6666C65.1693 37.9128 64.6235 36.2024 63.6076 34.7727C62.5917 33.3431 61.1561 32.265 59.4999 31.688ZM53.8333 56.6666H11.3333C10.5818 56.6666 9.86114 56.3681 9.32978 55.8368C8.79843 55.3054 8.49992 54.5847 8.49992 53.8333V22.1453C9.40731 22.4809 10.3658 22.6572 11.3333 22.6666H53.8333V31.1666H45.3333C43.0789 31.1666 40.9169 32.0622 39.3228 33.6562C37.7288 35.2503 36.8333 37.4123 36.8333 39.6666C36.8333 41.921 37.7288 44.083 39.3228 45.677C40.9169 47.2711 43.0789 48.1666 45.3333 48.1666H53.8333V56.6666ZM56.6666 42.5H45.3333C44.5818 42.5 43.8611 42.2015 43.3298 41.6701C42.7984 41.1387 42.4999 40.4181 42.4999 39.6666C42.4999 38.9152 42.7984 38.1945 43.3298 37.6632C43.8611 37.1318 44.5818 36.8333 45.3333 36.8333H56.6666C57.418 36.8333 58.1387 37.1318 58.6701 37.6632C59.2014 38.1945 59.4999 38.9152 59.4999 39.6666C59.4999 40.4181 59.2014 41.1387 58.6701 41.6701C58.1387 42.2015 57.418 42.5 56.6666 42.5Z" fill="#1EAAE7"></path>
                                            </svg>


                                            
                                            <div class="me-auto">
                                                <h5 class="fs-20 text-black font-w600">Main Balance</h5>
                                                <span class="text-num text-black font-w600">{{Auth::user()->currency}}{{number_format($balance, 2, '.', ',')}}</span>
                                            </div>
                                        </div>
                                        <div class="me-3 mb-3">
                                            <p class="fs-14 mb-1">ACC TYPE</p>
                                            <span class="text-black">{{Auth::user()->account_type}}</span>
                                        </div>
                                        <div class="me-3 mb-3">
                                            <p class="fs-14 mb-1">ACCOUNT OWNER</p>
                                            <span class="text-black">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                                        </div>
                                        <span class="fs-20 text-black font-w500 me-3 mb-3">{{Auth::user()->a_number}}</span>
                                    </div>



                                    
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <!--<div class="col-xl-3 mb-3 col-xxl-6 col-sm-6">-->
                                            <!--    <a class="btn btn-outline-primary rounded d-block btn-lg" data-bs-toggle="modal" data-bs-target="#crypto">+Crypto Deposit</a>-->
                                            <!--     <div class="modal fade" id="crypto">-->
                                            <!--        <div class="modal-dialog modal-dialog-centered" role="document">-->
                                            <!--            <div class="modal-content">-->
                                            <!--                <div class="modal-header">-->
                                            <!--                    <h5 class="modal-title">Crypto Deposit</h5>-->
                                            <!--                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>-->
                                            <!--                    </button>-->
                                            <!--                </div>-->
                                            <!--                <div class="modal-body">-->
                                            <!--                    <div class="alert alert-info mt-3"><small>-->
                                            <!--                        <i class="fa fa-info-circle"></i>&nbsp;Copy the address below and click 'Proceed' to complete action</small></div>-->
                                            <!--                    <form method="POST" action="https://moonpay.com">-->
                                            <!--                        <p id="server"></p>-->
                                            <!--                        <div id="content-one">-->
                                            <!--                            <div class="input-group mb-3 input-success-o">-->
                                            <!--                                <span class="input-group-text search_icon copy" id="copy-addr" data-clipboard-target="#wallet_addr"><i class="fa fa-copy"></i></label></span>-->
                                            <!--                                <input type="text" class="form-control" id="wallet_addr" value="1FpSrZ5NNLzGeX7384xWmrdqixt1UGPJxd" readonly>-->
                                            <!--                            </div>-->
                                
                                            <!--                            <button id="wait" class="btn btn-primary w-100">Proceed to Buy Crypto</button>-->
                                            <!--                        </div>   -->
                                            <!--                    </form>-->
                                            <!--                </div>-->
                                            <!--                <div class="modal-footer">-->
                                            <!--                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>-->
                                            <!--                </div>-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->

                                            

                                            <div class="col-xl-12 mb-3 col-xxl-12 col-sm-12">
                                                  <a class="btn btn-outline-primary rounded d-block btn-lg" href="{{route('crypto')}}">Crypto Withdrawal</a> 
                                                <br>
                                                <a class="btn btn-outline-primary rounded d-block btn-lg" href="{{route('crypto_deposit')}}">Crypto Deposit</a> 
                                                <div class="modal fade" id="fiat">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Check Deposit</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <center><img src="check.jpg" width="150px"></center>
                                                                
                                                                {{-- <div class="alert alert-info">
                                                                    <p>To make Check deposits please contact us via email or live support as monetary policies and regulations may vary with different geographic locations.</p>
                                                                </div> --}}

                                                                    <form action="{{route('make.deposit')}}" method="POST" enctype="multipart/form-data">
                                                                        @csrf <!-- Add this for CSRF protection -->
                                                                   
                                                               <p id="server"></p>
                                                               <input type="hidden" class="form-control" name="email" value=" {{ Auth::user()->email}}"/>
                                                               <div id="content-one">
                                                                   <div class="form-group mb-3">
                                                                       <label>Amount</label>
                                                                       <input id="pin_amount" type="number" name="amount" class="form-control" placeholder="Enter Amount" required>
                                                                   </div>
                                                                   
                                                                
                                                                   <div class="form-group">
                                                                    <label for="license">
                                                                        <i class="fa fa-id-card"></i>Upload Check Slip
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" id="license" name="front_cheque" class="custom-file-input" accept="image/*" required>
                                                                            <label class="custom-file-label" for="license">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                   
                                                                   <div class="form-group mb-3">
                                                                       <label>Transaction Pin</label>
                                                                       <input id="pin_account_number" placeholder="Enter Transaction Pin" type="number" name="transaction_pin" maxlength="4" class="form-control" Required>
                                                                   </div>
                                                           
                                                                   
                                                               </div>
                                                                
                                                                   <button type="submit" id="waitone" class="btn btn-primary w-100" >Proceed</button>
                                                            </div>
                                                        </form>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
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
                    </div>
                    <div class="col-xl-3 col-xxl-12">
                        <div class="row">
                            <div class="col-xl-12 col-xxl-6 col-sm-6">
                                <div class="card bg-primary">
                                    <div class="card-body p-3">
                                        <a href="{{route('bank')}}">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-white rounded-circle p-3 me-4">
                                                    <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g opacity="0.98" clip-path="">
                                                        <path d="M9.77812 2.0125C10.1062 2.69062 9.81641 3.51094 9.13828 3.83906C7.25156 4.74688 5.65469 6.15781 4.51719 7.92422C3.35234 9.73437 2.73438 11.8344 2.73438 14C2.73438 20.2125 7.7875 25.2656 14 25.2656C20.2125 25.2656 25.2656 20.2125 25.2656 14C25.2656 11.8344 24.6477 9.73437 23.4883 7.91875C22.3563 6.15234 20.7539 4.74141 18.8672 3.83359C18.1891 3.50547 17.8992 2.69063 18.2273 2.00703C18.5555 1.32891 19.3703 1.03906 20.0539 1.36719C22.4 2.49375 24.3852 4.24375 25.7906 6.44219C27.2344 8.69531 28 11.3094 28 14C28 17.7406 26.5453 21.257 23.8984 23.8984C21.257 26.5453 17.7406 28 14 28C10.2594 28 6.74297 26.5453 4.10156 23.8984C1.45469 21.2516 1.22342e-07 17.7406 1.66948e-07 14C1.99034e-07 11.3094 0.765625 8.69531 2.21484 6.44219C3.62578 4.24922 5.61094 2.49375 7.95156 1.36719C8.63516 1.04453 9.45 1.3289 9.77812 2.0125Z" fill="#1EAAE7"></path>
                                                        <path d="M8.67896 13.2726C8.41099 13.0047 8.27974 12.6547 8.27974 12.3047C8.27974 11.9547 8.41099 11.6047 8.67896 11.3367L12.1188 7.89685C12.6219 7.39373 13.2891 7.12029 13.9946 7.12029C14.7 7.12029 15.3727 7.3992 15.8704 7.89685L19.3102 11.3367C19.8461 11.8726 19.8461 12.7367 19.3102 13.2726C18.7743 13.8086 17.9102 13.8086 17.3743 13.2726L15.3563 11.2547L15.3563 19.0258C15.3563 19.7804 14.7438 20.3929 13.9891 20.3929C13.2344 20.3929 12.6219 19.7804 12.6219 19.0258L12.6219 11.2492L10.604 13.2672C10.079 13.8031 9.21489 13.8031 8.67896 13.2726Z" fill="#1EAAE7"></path>
                                                        </g>
                                                        <defs>
                                                        <clippath id="clip11">
                                                        <rect width="28" height="28" fill="white" transform="matrix(1.19249e-08 -1 -1 -1.19249e-08 28 28)"></rect>
                                                        </clippath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <span class="fs-20 text-white">Transfer </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-xxl-6 col-sm-6">
                                <div class="card bg-success">
                                    <div class="card-body p-3">
                                        <a href="{{route('transactions')}}">
                                            <div class="d-flex align-items-center">
                                            <span class="bg-white rounded-circle p-3 me-4">
                                                <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.1667 1.16669H5.83342C4.59574 1.16669 3.40875 1.65835 2.53358 2.53352C1.65841 3.40869 1.16675 4.59568 1.16675 5.83335V14C1.16675 14.3094 1.28966 14.6062 1.50846 14.825C1.72725 15.0438 2.024 15.1667 2.33341 15.1667H8.16675V25.6667C8.1662 25.8898 8.22965 26.1085 8.34959 26.2966C8.46952 26.4848 8.6409 26.6346 8.84342 26.7284C9.0464 26.8218 9.27195 26.855 9.49325 26.824C9.71455 26.7929 9.92228 26.699 10.0917 26.5534L13.4167 23.7067L16.7417 26.5534C16.9531 26.7341 17.222 26.8334 17.5001 26.8334C17.7782 26.8334 18.0471 26.7341 18.2584 26.5534L21.5834 23.7067L24.9084 26.5534C25.1197 26.7341 25.3887 26.8334 25.6667 26.8334C25.8355 26.8322 26.0023 26.7964 26.1567 26.7284C26.3593 26.6346 26.5306 26.4848 26.6506 26.2966C26.7705 26.1085 26.834 25.8898 26.8334 25.6667V5.83335C26.8334 4.59568 26.3418 3.40869 25.4666 2.53352C24.5914 1.65835 23.4044 1.16669 22.1667 1.16669ZM3.50008 12.8334V5.83335C3.50008 5.21452 3.74591 4.62102 4.1835 4.18344C4.62108 3.74585 5.21458 3.50002 5.83342 3.50002C6.45225 3.50002 7.04575 3.74585 7.48333 4.18344C7.92092 4.62102 8.16675 5.21452 8.16675 5.83335V12.8334H3.50008ZM24.5001 23.135L22.3417 21.28C22.1304 21.0993 21.8615 20.9999 21.5834 20.9999C21.3053 20.9999 21.0364 21.0993 20.8251 21.28L17.5001 24.1267L14.1751 21.28C13.9638 21.0993 13.6948 20.9999 13.4167 20.9999C13.1387 20.9999 12.8697 21.0993 12.6584 21.28L10.5001 23.135V5.83335C10.4986 5.01375 10.2813 4.20898 9.87008 3.50002H22.1667C22.7856 3.50002 23.3791 3.74585 23.8167 4.18344C24.2542 4.62102 24.5001 5.21452 24.5001 5.83335V23.135ZM22.1667 7.00002C22.1667 7.30944 22.0438 7.60619 21.825 7.82498C21.6062 8.04377 21.3095 8.16669 21.0001 8.16669H14.0001C13.6907 8.16669 13.3939 8.04377 13.1751 7.82498C12.9563 7.60619 12.8334 7.30944 12.8334 7.00002C12.8334 6.6906 12.9563 6.39386 13.1751 6.17506C13.3939 5.95627 13.6907 5.83335 14.0001 5.83335H21.0001C21.3095 5.83335 21.6062 5.95627 21.825 6.17506C22.0438 6.39386 22.1667 6.6906 22.1667 7.00002ZM22.1667 11.6667C22.1667 11.9761 22.0438 12.2729 21.825 12.4916C21.6062 12.7104 21.3095 12.8334 21.0001 12.8334H14.0001C13.6907 12.8334 13.3939 12.7104 13.1751 12.4916C12.9563 12.2729 12.8334 11.9761 12.8334 11.6667C12.8334 11.3573 12.9563 11.0605 13.1751 10.8417C13.3939 10.6229 13.6907 10.5 14.0001 10.5H21.0001C21.3095 10.5 21.6062 10.6229 21.825 10.8417C22.0438 11.0605 22.1667 11.3573 22.1667 11.6667ZM22.1667 16.3334C22.1667 16.6428 22.0438 16.9395 21.825 17.1583C21.6062 17.3771 21.3095 17.5 21.0001 17.5H14.0001C13.6907 17.5 13.3939 17.3771 13.1751 17.1583C12.9563 16.9395 12.8334 16.6428 12.8334 16.3334C12.8334 16.0239 12.9563 15.7272 13.1751 15.5084C13.3939 15.2896 13.6907 15.1667 14.0001 15.1667H21.0001C21.3095 15.1667 21.6062 15.2896 21.825 15.5084C22.0438 15.7272 22.1667 16.0239 22.1667 16.3334Z" fill="#2BC155"></path>
                                                </svg>
                                            </span>
                                            <span class="fs-20 text-white">View Transactions </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('dashboard.footer')
