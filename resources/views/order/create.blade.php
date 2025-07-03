<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Kopi - OnStreet Coffee</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f7e9d7 0%, #c59d5f 100%);
            min-height: 100vh;
            color: #333;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .header-top {
            background: linear-gradient(45deg, #c59d5f, #d4af7a);
            color: white;
            padding: 8px 0;
            font-size: 14px;
        }

        .header-top ul {
            list-style: none;
            display: flex;
            justify-content: flex-end;
            gap: 30px;
            margin: 0;
            padding: 0 50px;
        }

        .header-top a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .header-top a:hover {
            opacity: 0.8;
        }

        .header-main {
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 50px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 40px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
        }

        .nav-menu a:hover,
        .nav-menu .menu-active a {
            color: #c59d5f;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #c59d5f;
            transition: width 0.3s;
        }

        .nav-menu a:hover::after,
        .nav-menu .menu-active a::after {
            width: 100%;
        }

        .main-content {
            margin-top: 120px;
            padding: 50px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .page-title h1 {
            font-size: 3rem;
            font-weight: 700;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 10px;
        }

        .page-title p {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.9);
            font-weight: 300;
        }

        .order-card {
            max-width: 500px;
            margin: 40px auto 30px auto;
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

        .order-title {
            text-align: center;
            color: #c59d5f;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .progress {
            height: 10px;
            margin-bottom: 28px;
            background: #f8f9fa;
        }

        .progress-bar {
            background: linear-gradient(90deg, #c59d5f 0%, #d4af7a 100%);
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .input-group-text {
            background: #f8f9fa;
            color: #c59d5f;
            border: 1px solid #e9ecef;
        }

        .form-control:focus {
            border-color: #c59d5f;
            box-shadow: 0 0 0 2px #c59d5f33;
        }

        .price-display {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 2px solid #c59d5f;
            border-radius: 12px;
            padding: 18px 20px;
            margin-bottom: 18px;
            text-align: center;
        }

        .total-price {
            font-size: 2rem;
            font-weight: 700;
            color: #c59d5f;
            margin-bottom: 8px;
        }

        .price-breakdown {
            color: #666;
            font-size: 0.97rem;
        }

        .btn-order {
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

        .btn-order:hover {
            background: #b08d4f;
            transform: translateY(-2px);
        }

        .menu-section {
            max-width: 1100px;
            margin: 40px auto 30px auto;
        }

        .menu-title {
            color: #c59d5f;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 18px;
            text-align: center;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
        }

        .menu-item {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            padding: 18px 16px 14px 16px;
            text-align: center;
            transition: box-shadow 0.2s, transform 0.2s;
        }

        .menu-item:hover {
            box-shadow: 0 8px 32px rgba(197,157,95,0.13);
            transform: translateY(-4px);
        }

        .menu-img {
            border-radius: 10px;
            width: 100%;
            height: 140px;
            object-fit: cover;
            margin-bottom: 12px;
        }

        .menu-item h5 {
            font-weight: 700;
            color: #c59d5f;
            margin-bottom: 6px;
        }

        .menu-item .price {
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .menu-item p {
            color: #666;
            font-size: 0.97rem;
        }

        @media (max-width: 600px) {
            .order-card { padding: 18px 5vw; }
            .menu-section { padding: 0 2vw; }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-top">
            <ul>
                <li><a href="/orders/history"><i class="fa fa-history"></i> Riwayat Pesanan</a></li>
                <li><a href="/"><i class="fa fa-home"></i> Beranda</a></li>
            </ul>
        </div>
        <div class="header-main">
            <div class="logo">
                <img src="/img/logo.png" alt="OnStreet Coffee">
            </div>
            <ul class="nav-menu">
                <li class="menu-active"><a href="/order">Order</a></li>
                <li><a href="/coffees"><i class="fa fa-coffee"></i> Menu</a></li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
            <div class="page-title">
                <h1><i class="fa fa-mug-hot"></i> Pesan Kopi</h1>
                <p>Isi form di bawah untuk memesan kopi favoritmu!</p>
            </div>
            <div class="order-card">
                <div class="order-title">Form Pemesanan</div>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 33%"></div>
                </div>
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin-bottom:0;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('orders.store') }}" id="orderForm">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label"><i class="fa fa-user"></i> Nama</label>
                        <input type="text" class="form-control" id="nama" name="NAMA" placeholder="Nama Pemesan" value="{{ old('NAMA') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kopi" class="form-label"><i class="fa fa-coffee"></i> Pilih Kopi</label>
                        <select class="form-select" id="kopi" name="COFFEE" required>
                            <option value="" disabled selected>Pilih kopi favoritmu</option>
                            <option value="Cappuccino" data-harga="25000">☕ Cappuccino - Rp 25.000</option>
                            <option value="Americano" data-harga="18000">☕ Americano - Rp 18.000</option>
                            <option value="Espresso" data-harga="17000">☕ Espresso - Rp 17.000</option>
                            <option value="Macchiato" data-harga="28000">☕ Macchiato - Rp 28.000</option>
                            <option value="Mocha" data-harga="28000">☕ Mocha - Rp 28.000</option>
                            <option value="Coffee Latte" data-harga="28000">☕ Coffee Latte - Rp 28.000</option>
                            <option value="Piccolo Latte" data-harga="30000">☕ Piccolo Latte - Rp 30.000</option>
                            <option value="Ristretto" data-harga="28000">☕ Ristretto - Rp 28.000</option>
                            <option value="Affogato" data-harga="32000">☕ Affogato - Rp 32.000</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label"><i class="fa fa-sort-numeric-up"></i> Jumlah</label>
                        <div class="input-group">
                            <button type="button" class="btn btn-outline-secondary" id="minusBtn"><i class="fa fa-minus"></i></button>
                            <input type="number" class="form-control text-center" id="jumlah" name="JUMLAH" value="1" min="1" required style="max-width:80px;">
                            <button type="button" class="btn btn-outline-secondary" id="plusBtn"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="price-display">
                            <span><i class="fa fa-money-bill-wave"></i> Total Harga:</span>
                            <span id="totalHarga" style="float:right;font-weight:700;color:#c59d5f;">Rp 0</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-payment w-100 mt-3"><i class="fa fa-arrow-right"></i> Pesan Sekarang</button>
                </form>
            </div>
            <div class="menu-section mt-5">
                <div class="menu-title text-center mb-4" style="font-size:1.5rem;font-weight:600;color:#c59d5f;">Menu Kopi Kami</div>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0" style="border-radius:14px;">
                            <img src="/img/g1.jpg" class="card-img-top" alt="Cappuccino" style="height:120px;object-fit:cover;border-top-left-radius:14px;border-top-right-radius:14px;">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-1" style="color:#c59d5f;font-weight:600;">Cappuccino</h6>
                                <div class="fw-bold" style="color:#b08d4f;">Rp 25.000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0" style="border-radius:14px;">
                            <img src="/img/g2.jpg" class="card-img-top" alt="Americano" style="height:120px;object-fit:cover;border-top-left-radius:14px;border-top-right-radius:14px;">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-1" style="color:#c59d5f;font-weight:600;">Americano</h6>
                                <div class="fw-bold" style="color:#b08d4f;">Rp 18.000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0" style="border-radius:14px;">
                            <img src="/img/g3.jpg" class="card-img-top" alt="Espresso" style="height:120px;object-fit:cover;border-top-left-radius:14px;border-top-right-radius:14px;">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-1" style="color:#c59d5f;font-weight:600;">Espresso</h6>
                                <div class="fw-bold" style="color:#b08d4f;">Rp 17.000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0" style="border-radius:14px;">
                            <img src="/img/g4.jpg" class="card-img-top" alt="Macchiato" style="height:120px;object-fit:cover;border-top-left-radius:14px;border-top-right-radius:14px;">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-1" style="color:#c59d5f;font-weight:600;">Macchiato</h6>
                                <div class="fw-bold" style="color:#b08d4f;">Rp 28.000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0" style="border-radius:14px;">
                            <img src="/img/g5.jpg" class="card-img-top" alt="Mocha" style="height:120px;object-fit:cover;border-top-left-radius:14px;border-top-right-radius:14px;">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-1" style="color:#c59d5f;font-weight:600;">Mocha</h6>
                                <div class="fw-bold" style="color:#b08d4f;">Rp 28.000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0" style="border-radius:14px;">
                            <img src="/img/b1.jpg" class="card-img-top" alt="Coffee Latte" style="height:120px;object-fit:cover;border-top-left-radius:14px;border-top-right-radius:14px;">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-1" style="color:#c59d5f;font-weight:600;">Coffee Latte</h6>
                                <div class="fw-bold" style="color:#b08d4f;">Rp 28.000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0" style="border-radius:14px;">
                            <img src="/img/g7.jpeg" class="card-img-top" alt="Piccolo Latte" style="height:120px;object-fit:cover;border-top-left-radius:14px;border-top-right-radius:14px;">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-1" style="color:#c59d5f;font-weight:600;">Piccolo Latte</h6>
                                <div class="fw-bold" style="color:#b08d4f;">Rp 30.000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0" style="border-radius:14px;">
                            <img src="/img/g8.jpg" class="card-img-top" alt="Ristretto" style="height:120px;object-fit:cover;border-top-left-radius:14px;border-top-right-radius:14px;">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-1" style="color:#c59d5f;font-weight:600;">Ristretto</h6>
                                <div class="fw-bold" style="color:#b08d4f;">Rp 28.000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0" style="border-radius:14px;">
                            <img src="/img/g4.jpg" class="card-img-top" alt="Affogato" style="height:120px;object-fit:cover;border-top-left-radius:14px;border-top-right-radius:14px;">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-1" style="color:#c59d5f;font-weight:600;">Affogato</h6>
                                <div class="fw-bold" style="color:#b08d4f;">Rp 32.000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Harga kopi
        const hargaKopi = {
            'Cappuccino': 25000,
            'Americano': 18000,
            'Espresso': 17000,
            'Macchiato': 28000,
            'Mocha': 28000,
            'Coffee Latte': 28000,
            'Piccolo Latte': 30000,
            'Ristretto': 28000,
            'Affogato': 32000
        };
        const kopiSelect = document.getElementById('kopi');
        const jumlahInput = document.getElementById('jumlah');
        const totalHarga = document.getElementById('totalHarga');
        const minusBtn = document.getElementById('minusBtn');
        const plusBtn = document.getElementById('plusBtn');

        function updateTotal() {
            const kopi = kopiSelect.value;
            const jumlah = parseInt(jumlahInput.value) || 1;
            const harga = hargaKopi[kopi] || 0;
            totalHarga.textContent = 'Rp ' + (harga * jumlah).toLocaleString('id-ID');
        }
        kopiSelect.addEventListener('change', updateTotal);
        jumlahInput.addEventListener('input', updateTotal);
        minusBtn.addEventListener('click', function() {
            let val = parseInt(jumlahInput.value) || 1;
            if(val > 1) jumlahInput.value = val - 1;
            updateTotal();
        });
        plusBtn.addEventListener('click', function() {
            let val = parseInt(jumlahInput.value) || 1;
            jumlahInput.value = val + 1;
            updateTotal();
        });
        // Inisialisasi
        updateTotal();
    </script>
</body>
</html>

