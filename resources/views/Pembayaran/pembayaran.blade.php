<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran - OnStreet Coffee</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow-x: hidden;
        }
        .bg-coffee {
            position: fixed;
            right: 0; top: 0; bottom: 0;
            width: 420px;
            background: url('/img/g5.jpg') center right/cover no-repeat;
            opacity: 0.13;
            z-index: 0;
            pointer-events: none;
            border-radius: 0 0 0 300px;
            filter: blur(1.5px);
            display: none;
        }
        @media (min-width: 900px) {
            .bg-coffee { display: block; }
        }
        .main-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }
        .pay-card {
            background: rgba(255,255,255,0.97);
            border-radius: 22px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.13);
            padding: 48px 36px 36px 36px;
            margin-top: 60px;
            max-width: 520px;
            width: 100%;
            animation: fadeInUp 0.8s cubic-bezier(.39,.575,.56,1.000);
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: none; }
        }
        .pay-card h1 {
            color: #c59d5f;
            text-align: center;
            margin-bottom: 8px;
            font-weight: 700;
            letter-spacing: 1px;
            font-size: 2.2rem;
        }
        .pay-card .subtitle {
            text-align: center;
            color: #764ba2;
            font-size: 1.08em;
            margin-bottom: 28px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        .order-summary {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 2px solid #c59d5f;
            border-radius: 15px;
            padding: 22px 20px 12px 20px;
            margin-bottom: 28px;
            box-shadow: 0 5px 15px rgba(197, 157, 95, 0.12);
        }
        .order-summary-title {
            color: #c59d5f;
            font-weight: 600;
            font-size: 1.15em;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }
        .order-summary-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .order-summary-list li {
            display: flex;
            align-items: center;
            margin-bottom: 7px;
            color: #444;
            font-size: 1em;
        }
        .order-summary-list li i {
            color: #c59d5f;
            margin-right: 10px;
            min-width: 18px;
            text-align: center;
        }
        .form-group { margin-bottom: 20px; position: relative; }
        .form-label { display: block; margin-bottom: 6px; color: #555; font-weight: 500; }
        .input-icon {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #c59d5f;
            font-size: 1.1em;
            opacity: 0.8;
        }
        .form-control, .form-select {
            width: 100%;
            padding: 13px 16px 13px 38px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1em;
            background: #f8f9fa;
            transition: border 0.3s, box-shadow 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #c59d5f;
            outline: none;
            box-shadow: 0 0 0 2px #c59d5f33;
        }
        .form-control[readonly] {
            background: #eee;
            color: #888;
        }
        .btn-pay {
            width: 100%;
            background: linear-gradient(45deg, #c59d5f, #d4af7a);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 15px;
            font-size: 1.1em;
            font-weight: 600;
            margin-top: 10px;
            transition: background 0.3s, transform 0.2s;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(197,157,95,0.13);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .btn-pay i { font-size: 1.1em; }
        .btn-pay:hover {
            background: #b08d4f;
            transform: translateY(-2px) scale(1.03);
        }
        .success-message {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 7px;
            padding: 10px 0;
            margin-bottom: 18px;
            text-align: center;
            font-size: 15px;
        }
        .error-message {
            color: #d9534f;
            font-size: 14px;
            margin-top: 4px;
        }
        @media (max-width: 600px) {
            .pay-card { padding: 32px 10px; margin-top: 20px; }
            .bg-coffee { display: none !important; }
        }
    </style>
</head>
<body>
    <div class="bg-coffee"></div>
    <div class="main-content">
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="{{ route('orders.index') }}" style="color: rgba(255,255,255,0.9); text-decoration: none; font-size: 0.95rem;">
                <i class="fa fa-history"></i> Lihat Riwayat Pemesanan
            </a>
        </div>
        <div class="pay-card">
            <h1>💳 Pembayaran</h1>
            <div class="subtitle">Konfirmasi dan selesaikan pembayaran pesanan kopimu</div>
            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif
            <div class="order-summary">
                <div class="order-summary-title">Ringkasan Pesanan</div>
                <ul class="order-summary-list">
                    <li><i class="fa fa-user"></i> <b>Nama:</b> {{ session('nama') }}</li>
                    <li><i class="fa fa-coffee"></i> <b>Kopi:</b> {{ session('kopi') }}</li>
                    <li><i class="fa fa-sort-numeric-up"></i> <b>Jumlah:</b> {{ session('jumlah') }}</li>
                    <li><i class="fa fa-money-bill-wave"></i> <b>Total:</b> Rp {{ number_format(session('total', 0), 0, ',', '.') }}</li>
                </ul>
            </div>
            <form action="{{ url('/pembayaran') }}" method="POST">
                @csrf
                <div class="form-group">
                    <span class="input-icon"><i class="fa fa-credit-card"></i></span>
                    <select name="METODE_BAYAR" id="METODE_BAYAR" class="form-select">
                        <option value="">-- Pilih Metode Pembayaran --</option>
                        <option value="Transfer Bank" {{ old('METODE_BAYAR') == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                        <option value="E-Wallet" {{ old('METODE_BAYAR') == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                        <option value="Kartu Kredit" {{ old('METODE_BAYAR') == 'Kartu Kredit' ? 'selected' : '' }}>Kartu Kredit</option>
                    </select>
                    @error('METODE_BAYAR') <div class="error-message">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <span class="input-icon"><i class="fa fa-info-circle"></i></span>
                    <select name="STATUS_BAYAR" id="STATUS_BAYAR" class="form-select">
                        <option value="">-- Pilih Status Pembayaran --</option>
                        <option value="Pending" {{ old('STATUS_BAYAR') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                    @error('STATUS_BAYAR') <div class="error-message">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn-pay"><i class="fa fa-paper-plane"></i> Kirim Pembayaran</button>
            </form>
        </div>
    </div>
</body>
</html>
