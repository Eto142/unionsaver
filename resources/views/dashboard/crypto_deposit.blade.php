
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Crypto Payments</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap">
	<link rel="SHORTCUT ICON" href="https://coin-images.coingecko.com/coins/images/16813/large/zpay.png?1696516382">
    <style>
        :root {
            --primary: #6F42C1;
            --primary-dark: #5a2d91;
            --secondary: #4C6EF5;
            --accent: #FF6F61;
            --light: #F8F9FA;
            --dark: #212529;
            --gray: #6C757D;
            --border-radius: 12px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e6e9f0 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--dark);
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 100%;
            max-width: 480px;
            overflow: hidden;
            position: relative;
        }

        .header-bar {
            height: 8px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .content {
            padding: 30px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 200px;
            height: auto;
        }

        h1 {
            font-size: 24px;
            color: var(--primary);
            margin-bottom: 10px;
            text-align: center;
            font-weight: 600;
        }

        .subtitle {
            font-size: 15px;
            color: var(--gray);
            text-align: center;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            color: var(--dark);
            font-weight: 500;
        }

        input, select {
            width: 100%;
            padding: 12px 15px;
            font-size: 15px;
            border: 2px solid #E9ECEF;
            border-radius: var(--border-radius);
            background-color: white;
            transition: var(--transition);
        }

        input:focus, select:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(111, 66, 193, 0.2);
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 40px;
        }

        button {
            background-color: var(--primary);
            color: white;
            padding: 14px;
            font-size: 16px;
            font-weight: 500;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            width: 100%;
            transition: var(--transition);
            margin-top: 10px;
        }

        button:hover {
            background-color: var(--primary-dark);
        }

        #usdt-network {
            display: none;
            margin-top: 15px;
        }

        .network-badge {
            display: inline-block;
            padding: 3px 8px;
            background-color: var(--light);
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            color: var(--primary);
            margin-left: 8px;
        }

        /* Payment Result Section */
        #result {
            display: none;
        }

        .qr-container {
            background-color: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin: 20px 0;
            text-align: center;
        }

        #qrCode {
            width: 200px;
            height: 200px;
            margin: 0 auto;
            border: 1px solid #eee;
            border-radius: 8px;
        }

        .address-container {
            margin: 20px 0;
        }

        #address {
            width: 100%;
            padding: 12px 15px;
            font-size: 14px;
            border: 2px solid #E9ECEF;
            border-radius: var(--border-radius);
            background-color: #F8F9FA;
            font-family: monospace;
            text-align: center;
            margin-bottom: 10px;
        }

        #copyBtn {
            background-color: var(--secondary);
        }

        #copyBtn:hover {
            background-color: #3a56d0;
        }

        .transaction-info {
            background-color: #F8F9FA;
            padding: 15px;
            border-radius: var(--border-radius);
            margin: 20px 0;
            font-size: 14px;
            line-height: 1.6;
        }

        .go-back-btn {
            background-color: var(--accent);
            margin-top: 15px;
        }

        .go-back-btn:hover {
            background-color: #e55b51;
        }

        footer {
            margin-top: 25px;
            font-size: 13px;
            color: var(--gray);
            text-align: center;
        }

        footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        @media (max-width: 480px) {
            .content {
                padding: 25px 20px;
            }
            
            h1 {
                font-size: 22px;
            }
            
            #qrCode {
                width: 180px;
                height: 180px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-bar"></div>
        
        <div class="content">
            <div class="logo-container">
                <img class="logo" src="https://miro.medium.com/v2/resize:fit:1400/1*GKtTwu6zs9e9e0bsBMZIgQ.jpeg" alt="ZPay Logo">
            </div>
            
            <h1>Secure & Easy Payments</h1>
            <p class="subtitle">Pay safely and quickly in just a few clicks.<br>Enter the amount below to get started.</p>
            
            <!-- Payment Form -->
            <form id="cryptoForm">
                <div class="form-group">
                    <label for="amount">Enter Amount (Min. $50 USD)</label>
                    <input type="number" name="amount" id="amount" min="50" placeholder="50.00" required>
                </div>
                
                <div class="form-group">
                    <label for="currency">Select Cryptocurrency</label>
                    <select name="currency" id="currency" onchange="toggleNetworkOptions()">
                        <option value="BTC">Bitcoin (BTC)</option>
                        <option value="ETH">Ethereum (ETH)</option>
                        <option value="USDT">Tether (USDT)</option>
                        <option value="USDC">USDC (USD Coin)</option>
                        <option value="SOL">Solana (SOL)</option>
                        <option value="BNB">Binance Coin (BNB)</option>
                        <option value="DOGE">Dogecoin (DOGE)</option>
                        <option value="LTC">Litecoin (LTC)</option>
                        <option value="TON">TON (The Open Network)</option>
                        <option value="POLYGON">Polygon (MATIC)</option>
                        <option value="TRX">Tron (TRX)</option>
                    </select>
                </div>
                
                <div id="usdt-network">
                    <div class="form-group">
                        <label for="network">Select Network <span class="network-badge">USDT Only</span></label>
                        <select name="network" id="network">
                            <option value="ERC20">ERC20 (Ethereum)</option>
                            <option value="TRC20">TRC20 (Tron)</option>
                            <option value="BEP20">BEP20 (Binance Smart Chain)</option>
                            <option value="POLYGON">Polygon</option>
                        </select>
                    </div>
                </div>
                
                <button type="button" onclick="generateAddress()">Generate Payment Address</button>
            </form>
            
            <!-- Payment Result -->
            <div id="result">
                <h2><center>Complete Your Payment</center></h2>
                <p class="subtitle">Scan the QR code or copy the address below</p>
                
                <div class="qr-container">
                    <img id="qrCode" src="" alt="QR Code">
                </div>
                
                <div class="address-container">
                    <input type="text" id="address" readonly>
                    <button id="copyBtn" onclick="copyAddress()">Copy Address</button>
                </div>
                
                <div class="transaction-info" id="transactionInfo">
                    Send $50.00 to the address above.<br>
                    You will be automatically redirected after the transaction is successful.
                </div>
                
                <button class="go-back-btn" onclick="goBack()">Change Payment Method</button>
            </div>
            
            <footer>
                Powered by <a href="#">ZPay</a>
            </footer>
        </div>
    </div>

    <script>
        function toggleNetworkOptions() {
            var currency = document.getElementById('currency').value;
            var networkOptions = document.getElementById('usdt-network');
            networkOptions.style.display = currency === 'USDT' ? 'block' : 'none';
        }

        function updateAmountMessage() {
            var amount = document.getElementById('amount').value;
            var currency = document.getElementById('currency').value;
            var messageElement = document.getElementById('transactionInfo');
            
            var networkInfo = currency === 'USDT' ? ' (' + document.getElementById('network').value + ')' : '';
            messageElement.innerHTML = 
                `Send $${amount} worth of ${currency}${networkInfo} to the address above.<br>
                Transaction typically completes in 2-5 minutes.`;
        }

        function generateAddress() {
            var amount = document.getElementById('amount').value;
            if (!amount || amount < 50) {
                alert('Please enter an amount of at least $50');
                return;
            }

            var btn = document.querySelector('#cryptoForm button');
            btn.disabled = true;
            btn.textContent = 'Generating...';

            var currency = document.getElementById('currency').value;
            var network = currency === 'USDT' ? document.getElementById('network').value : '';

            var payload = {
                currency: currency,
                amount: amount,
                merchant: 'IC58V9-VWLJRD-CJX8XZ-ZEGHYX',
                orderId: 'ORD-' + Date.now(),
                callbackUrl: 'https://example.com/callback',
                email: 'customer@example.com'
            };

            if (network) payload.network = network;

            fetch('https://api.oxapay.com/merchants/request/staticaddress', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(payload)
            })
            .then(response => response.json())
            .then(data => {
                if (data.result === 100) {
                    document.getElementById('address').value = data.address;
                    document.getElementById('qrCode').src = 
                        "https://api.qrserver.com/v1/create-qr-code/?data=" + 
                        encodeURIComponent(data.address) + "&size=300x300";
                    
                    document.getElementById('cryptoForm').style.display = 'none';
                    document.getElementById('result').style.display = 'block';
                    updateAmountMessage();
                } else {
                    alert('Error: ' + (data.message || 'Failed to generate address'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = 'Generate Payment Address';
            });
        }

        function copyAddress() {
            var addressInput = document.getElementById('address');
            addressInput.select();
            
            navigator.clipboard.writeText(addressInput.value)
                .then(() => {
                    var copyBtn = document.getElementById('copyBtn');
                    copyBtn.textContent = 'Copied!';
                    setTimeout(() => copyBtn.textContent = 'Copy Address', 2000);
                })
                .catch(err => {
                    console.error('Copy failed:', err);
                    alert("Failed to copy. Please try again.");
                });
        }

        function goBack() {
            document.getElementById('result').style.display = 'none';
            document.getElementById('cryptoForm').style.display = 'block';
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleNetworkOptions();
            document.getElementById('amount').addEventListener('input', updateAmountMessage);
        });
    </script>

</body>
</html>