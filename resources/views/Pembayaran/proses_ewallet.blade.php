<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran E-Wallet</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            min-height: 100vh; 
            margin:0; 
        }
        .container { 
            max-width: 500px; 
            margin: 60px auto; 
            background: #fff; 
            border-radius: 18px; 
            box-shadow: 0 8px 32px rgba(0,0,0,0.12); 
            padding: 40px 30px; 
        }
        h2 { 
            color: #c59d5f; 
            text-align: center; 
            margin-bottom: 20px; 
        }
        .ewallet-info { 
            background: #f8f9fa; 
            border-radius: 10px; 
            padding: 20px; 
            margin-bottom: 25px; 
            border-left: 4px solid #c59d5f; 
        }
        .ewallet-info strong { 
            color: #764ba2; 
        }
        .steps { 
            margin-bottom: 20px; 
        }
        .steps li { 
            margin-bottom: 10px; 
        }
        .btn-container {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        .btn {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 1.1em;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-primary {
            background: linear-gradient(45deg, #c59d5f, #d4af7a);
            color: #fff;
        }
        .btn-secondary {
            background: #6c757d;
            color: #fff;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .payment-summary {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 2px solid #c59d5f;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .payment-summary h4 {
            color: #c59d5f;
            margin-bottom: 15px;
            text-align: center;
        }
        .payment-detail {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .payment-detail:last-child {
            border-top: 1px solid #dee2e6;
            padding-top: 8px;
            margin-top: 8px;
            font-weight: 600;
            color: #c59d5f;
        }
        .ewallet-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }
        .ewallet-option {
            background: #fff;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .ewallet-option:hover {
            border-color: #c59d5f;
            transform: translateY(-2px);
        }
        .ewallet-option.active {
            border-color: #c59d5f;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fa fa-mobile-alt"></i> E-Wallet</h2>
        
        @if(!session('order_id'))
            <div style="color: red; font-weight: bold; margin-bottom: 20px;">
                Data pesanan tidak ditemukan. Silakan pesan ulang.
            </div>
        @endif
        
        <div class="payment-summary">
            <h4><i class="fa fa-receipt"></i> Ringkasan Pembayaran</h4>
            <div class="payment-detail">
                <span>Total Pesanan:</span>
                <span>Rp {{ number_format(session('total', 0), 0, ',', '.') }}</span>
            </div>
            <div class="payment-detail">
                <span>Metode Pembayaran:</span>
                <span>{{ session('metode_bayar', 'Tidak diketahui') }}</span>
            </div>
        </div>
        
        <div class="ewallet-info">
            <p><strong><i class="fa fa-info-circle"></i> Pilih E-Wallet yang tersedia:</strong></p>
            <div class="ewallet-options">
                <div class="ewallet-option active">
                    <i class="fa fa-qrcode" style="font-size: 2em; color: #00c851;"></i>
                    <p><strong>GoPay</strong></p>
                </div>
                <div class="ewallet-option">
                    <i class="fa fa-qrcode" style="font-size: 2em; color: #007bff;"></i>
                    <p><strong>OVO</strong></p>
                </div>
                <div class="ewallet-option">
                    <i class="fa fa-qrcode" style="font-size: 2em; color: #ff6b35;"></i>
                    <p><strong>DANA</strong></p>
                </div>
                <div class="ewallet-option">
                    <i class="fa fa-qrcode" style="font-size: 2em; color: #28a745;"></i>
                    <p><strong>LinkAja</strong></p>
                </div>
            </div>
        </div>
        
        <ol class="steps">
            <li>Pilih E-Wallet yang ingin digunakan.</li>
            <li>Scan QR Code yang muncul di layar.</li>
            <li>Lakukan pembayaran sesuai total pesanan.</li>
            <li>Tunggu konfirmasi pembayaran.</li>
        </ol>
        
        <div class="btn-container">
            <form action="{{ route('pembayaran.complete') }}" method="POST" style="flex: 1;">
                @csrf
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i> Selesaikan Pembayaran
                </button>
            </form>
            <a href="/" class="btn btn-secondary">
                <i class="fa fa-home"></i> Beranda
            </a>
        </div>
    </div>
</body>
</html> 