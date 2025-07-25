@include('dashboard.header')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Transaction History</h4>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter Transactions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                <li><a class="dropdown-item" href="#">All Transactions</a></li>
                                <li><a class="dropdown-item" href="#">Deposits</a></li>
                                <li><a class="dropdown-item" href="#">Withdrawals</a></li>
                                <li><a class="dropdown-item" href="#">Transfers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-responsive-md">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Transaction</th>
                                        <th>Details</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaction as $details)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="transaction-icon me-3">
                                                    @if($details->transaction == 'Bank Transfer')
                                                    <div class="bg-primary bg-opacity-10 p-2 rounded"><i class="fas fa-exchange-alt text-primary"></i></div>
                                                    @elseif($details->transaction == 'Loan')
                                                    <div class="bg-success bg-opacity-10 p-2 rounded"><i class="fas fa-hand-holding-usd text-success"></i></div>
                                                    @elseif($details->transaction == 'Card')
                                                    <div class="bg-info bg-opacity-10 p-2 rounded"><i class="fas fa-credit-card text-info"></i></div>
                                                    @elseif($details->transaction == 'Crypto Withdrawal')
                                                    <div class="bg-warning bg-opacity-10 p-2 rounded"><i class="fab fa-bitcoin text-warning"></i></div>
                                                    @elseif($details->transaction == 'Paypal Withdrawal')
                                                    <div class="bg-secondary bg-opacity-10 p-2 rounded"><i class="fab fa-paypal text-secondary"></i></div>
                                                    @elseif($details->transaction == 'Skrill Withdrawal')
                                                    <div class="bg-dark bg-opacity-10 p-2 rounded"><i class="fas fa-wallet text-dark"></i></div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">{{ $details->transaction }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-dark">{{ Str::limit($details->transaction_description, 30) }}</span>
                                        </td>
                                        <td>
                                            <span class="font-w600 @if(in_array($details->transaction, ['Bank Transfer', 'Paypal Withdrawal', 'Skrill Withdrawal', 'Crypto Withdrawal'])) text-danger @elseif($details->transaction == 'Loan') text-success @endif">
                                                @if(in_array($details->transaction, ['Bank Transfer', 'Paypal Withdrawal', 'Skrill Withdrawal', 'Crypto Withdrawal']))-@elseif($details->transaction == 'Loan')+@endif
                                                {{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($details->transaction_status == '1')
                                            <span class="badge light badge-success">Successful</span>
                                            @elseif($details->transaction_status == '0')
                                            <span class="badge light badge-warning">Pending</span>
                                            @else
                                            <span class="badge light badge-danger">Failed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ \Carbon\Carbon::parse($details->created_at)->format('M d, Y h:i A') }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="show-entries">
                                <span>Showing 1 to {{ count($transaction) }} of {{ count($transaction) }} entries</span>
                            </div>
                            <nav>
                                <ul class="pagination pagination-circle">
                                    <li class="page-item page-indicator">
                                        <a class="page-link" href="javascript:void(0)">
                                            <i class="fas fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">4</a>
                                    </li>
                                    <li class="page-item page-indicator">
                                        <a class="page-link" href="javascript:void(0)">
                                            <i class="fas fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
