@include('dashboard.header')
<div class="content-body">
    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <h4 class="text-black font-w600 mb-3 mb-md-0">Transaction History</h4>
            
            <!-- Search Box -->
            <div class="w-100 w-md-auto">
                <div class="input-group search-box">
                    <input type="text" id="transactionSearch" class="form-control" placeholder="Search transactions...">
                    <button class="btn btn-outline-primary" type="button" id="searchButton">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="transactionTable">
                        <thead class="bg-light">
                            {{-- <tr>
                                <th width="70px" class="text-center">Type</th>
                                <th>Details</th>
                                <th width="180px" class="text-end pe-4">Amount</th>
                                <th width="120px">Status</th>
                            </tr> --}}
                        </thead>
                        <tbody>
                            @foreach($transaction as $details)
                            <tr>
                                <!-- Transaction Type Icon -->
                                <td class="text-center align-middle">
                                    @if($details->transaction == 'Bank Transfer')
                                    <div class="transaction-icon bg-success-light text-success">
                                        <i class="fas fa-university"></i> <!-- Bank building icon -->
                                    </div>
                                    @elseif($details->transaction == 'Loan')
                                    <div class="transaction-icon bg-primary-light text-primary">
                                        <i class="fas fa-hand-holding-usd"></i> <!-- Hand holding money -->
                                    </div>
                                    @elseif($details->transaction == 'Card')
                                    <div class="transaction-icon bg-dark-light text-dark">
                                        <i class="fas fa-credit-card"></i> <!-- Credit card icon -->
                                    </div>
                                    @elseif($details->transaction == 'Crypto Withdrawal')
                                    <div class="transaction-icon bg-warning-light text-warning">
                                        <i class="fab fa-bitcoin"></i> <!-- Bitcoin icon -->
                                    </div>
                                    @elseif($details->transaction == 'Paypal Withdrawal')
                                    <div class="transaction-icon bg-info-light text-info">
                                        <i class="fab fa-cc-paypal"></i> <!-- PayPal logo -->
                                    </div>
                                    @elseif($details->transaction == 'Skrill Withdrawal')
                                    <div class="transaction-icon bg-purple-light text-purple">
                                        <i class="fas fa-money-bill-wave"></i> <!-- Money bill wave -->
                                    </div>
                                    @elseif($details->transaction == 'Deposit')
                                    <div class="transaction-icon bg-success-light text-success">
                                        <i class="fas fa-money-bill-transfer"></i> <!-- Money transfer -->
                                    </div>
                                    @elseif($details->transaction == 'Payment')
                                    <div class="transaction-icon bg-danger-light text-danger">
                                        <i class="fas fa-receipt"></i> <!-- Payment receipt -->
                                    </div>
                                    @else
                                    <div class="transaction-icon bg-secondary-light text-secondary">
                                        <i class="fas fa-exchange-alt"></i> <!-- Default transaction icon -->
                                    </div>
                                    @endif
                                </td>
                                
                                <!-- Transaction Details -->
                                <td class="align-middle">
                                    <div class="d-flex flex-column">
                                        <strong class="text-dark">{{$details->transaction}}</strong>
                                        <span class="text-muted small">{{$details->transaction_description}}</span>
                                        <small class="text-muted">{{$details->created_at}}</small>
                                    </div>
                                </td>
                                
                                <!-- Amount -->
                                <td class="text-end align-middle pe-4">
                                    <span class="font-w600 @if($details->transaction == 'Bank Transfer' || 
                                                             $details->transaction == 'Paypal Withdrawal' || 
                                                             $details->transaction == 'Skrill Withdrawal' || 
                                                             $details->transaction == 'Crypto Withdrawal' ||
                                                             $details->transaction == 'Payment') text-danger @else text-success @endif">
                                        @if($details->transaction == 'Bank Transfer' || 
                                            $details->transaction == 'Paypal Withdrawal' || 
                                            $details->transaction == 'Skrill Withdrawal' || 
                                            $details->transaction == 'Crypto Withdrawal' ||
                                            $details->transaction == 'Payment')-
                                        @elseif($details->transaction == 'Loan' || 
                                               $details->transaction == 'Deposit')+
                                        @endif 
                                        {{Auth::user()->currency}}
                                        {{number_format($details->transaction_amount, 2, '.', ',')}}
                                    </span>
                                </td>
                                
                                <!-- Status -->
                                <td class="align-middle">
                                    @if($details->transaction_status == '1')
                                    <span class="badge bg-success-light text-success rounded-pill py-2 px-3">Completed</span>
                                    @elseif($details->transaction_status == '0')
                                    <span class="badge bg-warning-light text-warning rounded-pill py-2 px-3">Pending</span>
                                    @elseif($details->transaction_status == '2')
                                    <span class="badge bg-info-light text-info rounded-pill py-2 px-3">Processing</span>
                                    @elseif($details->transaction_status == '3')
                                    <span class="badge bg-secondary-light text-secondary rounded-pill py-2 px-3">Cancelled</span>
                                    @else
                                    <span class="badge bg-danger-light text-danger rounded-pill py-2 px-3">Failed</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center p-3 border-top">
                    <div class="text-muted small">
                        Showing <span id="showingFrom">1</span> to <span id="showingTo">10</span> of <span id="totalRecords">{{ count($transaction) }}</span> entries
                    </div>
                    <nav>
                        <ul class="pagination pagination-sm mb-0" id="pagination">
                            <!-- Pagination will be added here by JavaScript -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include required CSS and JS -->


<style>
    /* Transaction Icon Styles */
    .transaction-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        font-size: 16px;
    }
    
    /* Light background colors */
    .bg-success-light { background-color: rgba(25, 135, 84, 0.1); }
    .bg-primary-light { background-color: rgba(13, 110, 253, 0.1); }
    .bg-warning-light { background-color: rgba(255, 193, 7, 0.1); }
    .bg-info-light { background-color: rgba(13, 202, 240, 0.1); }
    .bg-purple-light { background-color: rgba(111, 66, 193, 0.1); }
    .bg-dark-light { background-color: rgba(33, 37, 41, 0.1); }
    .bg-danger-light { background-color: rgba(220, 53, 69, 0.1); }
    .bg-secondary-light { background-color: rgba(108, 117, 125, 0.1); }
    
    /* Table row hover effect */
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }
    
    /* Search box styling */
    .search-box {
        max-width: 300px;
    }
    
    /* Status badge styling */
    .badge {
        font-weight: 500;
        letter-spacing: 0.5px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .transaction-icon {
            width: 36px;
            height: 36px;
            font-size: 14px;
        }
        
        .search-box {
            max-width: 100%;
        }
        
        .badge {
            padding: 0.25rem 0.5rem !important;
            font-size: 0.75rem;
        }
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize variables
    const rowsPerPage = 10;
    const $table = $('#transactionTable');
    const $rows = $table.find('tbody tr');
    const totalRows = $rows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);
    
    // Initialize pagination
    function initPagination() {
        const $pagination = $('#pagination');
        $pagination.empty();
        
        // Previous button
        $pagination.append(`
            <li class="page-item" id="prevPage">
                <a class="page-link" href="#" aria-label="Previous">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
        `);
        
        // Page numbers
        const maxVisiblePages = 5;
        let startPage = 1;
        let endPage = totalPages;
        
        if (totalPages > maxVisiblePages) {
            startPage = Math.max(1, Math.min(
                $('.page-item.active .page-link').data('page') - Math.floor(maxVisiblePages / 2),
                totalPages - maxVisiblePages + 1
            ));
            endPage = startPage + maxVisiblePages - 1;
        }
        
        for (let i = startPage; i <= endPage; i++) {
            $pagination.append(`
                <li class="page-item">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `);
        }
        
        // Next button
        $pagination.append(`
            <li class="page-item" id="nextPage">
                <a class="page-link" href="#" aria-label="Next">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        `);
        
        // Set first page as active
        $('.page-link[data-page="1"]').parent().addClass('active');
        updateShowingText(1);
    }
    
    // Show specific page
    function showPage(page) {
        $rows.hide();
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        
        $rows.slice(start, end).show();
        
        // Update active state in pagination
        $('.page-item').removeClass('active');
        $(`.page-link[data-page="${page}"]`).parent().addClass('active');
        
        // Disable prev/next buttons when appropriate
        $('#prevPage').toggleClass('disabled', page === 1);
        $('#nextPage').toggleClass('disabled', page === totalPages);
        
        updateShowingText(page);
    }
    
    // Update showing X-Y of Z text
    function updateShowingText(page) {
        const start = (page - 1) * rowsPerPage + 1;
        const end = Math.min(page * rowsPerPage, totalRows);
        $('#showingFrom').text(start);
        $('#showingTo').text(end);
    }
    
    // Search functionality
    $('#transactionSearch').on('keyup', function() {
        const searchText = $(this).val().toLowerCase();
        
        $rows.each(function() {
            const rowText = $(this).text().toLowerCase();
            $(this).toggle(rowText.includes(searchText));
        });
        
        // Update pagination after search
        initPagination();
    });
    
    // Pagination click handlers
    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        
        if ($(this).parent().hasClass('disabled')) return;
        
        if ($(this).parent().attr('id') === 'prevPage') {
            const currentPage = $('.page-item.active .page-link').data('page');
            if (currentPage > 1) showPage(currentPage - 1);
        } else if ($(this).parent().attr('id') === 'nextPage') {
            const currentPage = $('.page-item.active .page-link').data('page');
            if (currentPage < totalPages) showPage(currentPage + 1);
        } else {
            const page = $(this).data('page');
            showPage(page);
        }
    });
    
    // Initialize everything
    initPagination();
    showPage(1);
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
