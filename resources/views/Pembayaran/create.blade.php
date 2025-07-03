<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f7e9d7 0%, #c59d5f 100%);
            min-height: 100vh;
            font-family: 'Poppins', Arial, sans-serif;
        }
        .payment-card {
            max-width: 480px;
            margin: 50px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.13);
            padding: 36px 28px 28px 28px;
            position: relative;
            animation: fadeInUp 0.7s cubic-bezier(.39,.575,.56,1.000);
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: none; }
        }
        .payment-title {
            text-align: center;
            color: #c59d5f;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 18px;
        }
        .order-summary {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 2px solid #c59d5f;
            border-radius: 12px;
            padding: 18px 20px;
            margin-bottom: 28px;
        }
        .order-summary h5 {
            color: #c59d5f;
            font-weight: 600;
            margin-bottom: 12px;
        }
        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 7px;
            font-size: 1rem;
        }
        .order-item:last-child {
            font-weight: 700;
            color: #c59d5f;
        }
        .form-label {
            font-weight: 500;
            color: #333;
        }
        .form-control[readonly] {
            background-color: #f8f9fa;
            border-color: #c59d5f;
            color: #333;
        }
        .metode-group {
            display: flex;
            gap: 18px;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }
        .metode-option {
            flex: 1 1 120px;
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 14px 10px;
            text-align: center;
            cursor: pointer;
            transition: border 0.2s, box-shadow 0.2s;
            position: relative;
        }
        .metode-option.selected, .metode-option:hover {
            border: 2px solid #c59d5f;
            box-shadow: 0 2px 10px rgba(197,157,95,0.08);
        }
        .metode-option input[type="radio"] {
            display: none;
        }
        .metode-icon {
            font-size: 1.7rem;
            color: #c59d5f;
            margin-bottom: 6px;
        }
        .btn-payment {
            background: linear-gradient(45deg, #c59d5f, #d4af7a);
            color: white;
            border: none;
            padding: 15px 0;
            font-size: 1.15rem;
            font-weight: 600;
            border-radius: 10px;
            width: 100%;
            margin-top: 18px;
            box-shadow: 0 4px 16px rgba(197,157,95,0.13);
            transition: background 0.2s, transform 0.2s;
        }
        .btn-payment:hover {
            background: #b08d4f;
            transform: translateY(-2px);
        }
        .success-message {
            color: #198754;
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 18px;
            text-align: center;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.97rem;
            margin-top: 5px;
        }
        @media (max-width: 600px) {
            .payment-card { padding: 18px 5vw; }
            .order-summary { padding: 12px 5vw; }
            .metode-group { flex-direction: column; gap: 10px; }
        }
    </style>
</head>
<body>
    <div class="payment-card">
        <div class="payment-title"><i class="fa fa-credit-card"></i> Pembayaran</div>
        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif
        <div class="order-summary">
            <h5>Ringkasan Pesanan</h5>
            <div class="order-item"><span>Nama:</span><span>{{ session('nama') }}</span></div>
            <div class="order-item"><span>Kopi:</span><span>{{ session('kopi') }}</span></div>
            <div class="order-item"><span>Jumlah:</span><span>{{ session('jumlah') }} cup</span></div>
            <div class="order-item"><span>Total:</span><span>Rp {{ number_format(session('total', 0), 0, ',', '.') }}</span></div>
        </div>
        <form action="{{ route('order.proses_pembayaran') }}" method="POST">
            @csrf
            <input type="hidden" name="NAMA" value="{{ session('nama') }}">
            <input type="hidden" name="COFFEE" value="{{ session('kopi') }}">
            <input type="hidden" name="JUMLAH" value="{{ session('jumlah') }}">
            <input type="hidden" name="TOTAL" value="{{ session('total') }}">
            <input type="hidden" name="STATUS_BAYAR" value="Pending">
            <label class="form-label mb-2">Pilih Metode Pembayaran</label>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="metode_pembayaran" id="bank" value="bank" required>
                    <label class="form-check-label" for="bank"><i class="fa fa-university"></i> Transfer Bank</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="metode_pembayaran" id="ewallet" value="ewallet">
                    <label class="form-check-label" for="ewallet"><i class="fa fa-mobile-alt"></i> E-Wallet</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="metode_pembayaran" id="kartu" value="kartu">
                    <label class="form-check-label" for="kartu"><i class="fa fa-credit-card"></i> Kartu Kredit</label>
                </div>
            </div>
            @error('metode_pembayaran') <div class="error-message">{{ $message }}</div> @enderror
            <button type="submit" class="btn-payment"><i class="fa fa-arrow-right"></i> Proses Pembayaran</button>
        </form>
    </div>
</body>
</html>
