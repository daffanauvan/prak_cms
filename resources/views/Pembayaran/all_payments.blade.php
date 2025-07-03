<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Semua Pembayaran - OnStreet Coffee</title>
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
            background: url('/img/g1.jpg') center right/cover no-repeat;
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
            padding: 40px 20px;
        }
        .admin-header {
            text-align: center;
            margin-bottom: 40px;
            max-width: 800px;
            width: 100%;
        }
        .admin-header h1 {
            color: #c59d5f;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }
        .admin-header p {
            color: rgba(255,255,255,0.9);
            font-size: 1.1rem;
            font-weight: 400;
        }
        .payments-container {
            max-width: 1200px;
            width: 100%;
        }
        .payment-card {
            background: rgba(255,255,255,0.97);
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.13);
            padding: 28px;
            margin-bottom: 24px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(255,255,255,0.2);
            animation: fadeInUp 0.6s cubic-bezier(.39,.575,.56,1.000);
        }
        .payment-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.18);
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: none; }
        }
        .payment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }
        .payment-id {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
        }
        .payment-date {
            color: #666;
            font-size: 0.95rem;
        }
        .payment-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .detail-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #c59d5f, #d4af7a);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
        }
        .detail-content h4 {
            font-size: 0.9rem;
            color: #666;
            margin: 0 0 4px 0;
            font-weight: 500;
        }
        .detail-content p {
            font-size: 1rem;
            color: #333;
            margin: 0;
            font-weight: 600;
        }
        .order-info {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 2px solid #c59d5f;
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
        }
        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .order-title {
            color: #c59d5f;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .status-lunas {
            background: #d4edda;
            color: #155724;
        }
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        .status-dibatalkan {
            background: #f8d7da;
            color: #721c24;
        }
        .order-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }
        .order-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .order-label {
            font-size: 0.85rem;
            color: #666;
            font-weight: 500;
        }
        .order-value {
            font-size: 1rem;
            color: #333;
            font-weight: 600;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .btn-success {
            background: #28a745;
            color: white;
        }
        .btn-warning {
            background: #ffc107;
            color: #212529;
        }
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: rgba(255,255,255,0.97);
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.13);
        }
        .empty-state i {
            font-size: 4rem;
            color: #c59d5f;
            margin-bottom: 20px;
            opacity: 0.7;
        }
        .empty-state h3 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .empty-state p {
            color: #666;
            font-size: 1rem;
        }
        @media (max-width: 768px) {
            .main-content { padding: 20px 10px; }
            .admin-header h1 { font-size: 2rem; }
            .payment-header { flex-direction: column; align-items: flex-start; gap: 10px; }
            .payment-details { grid-template-columns: 1fr; }
            .order-details { grid-template-columns: 1fr; }
            .action-buttons { flex-direction: column; }
            .bg-coffee { display: none !important; }
        }
    </style>
</head>
<body>
    <div class="bg-coffee"></div>
    <div class="main-content">
        <div class="admin-header">
            <h1>👨‍💼 Admin - Semua Pembayaran</h1>
            <p>Kelola dan monitor semua transaksi pembayaran</p>
        </div>
        
        <div class="payments-container">
            @if($pembayarans->count() > 0)
                @foreach($pembayarans as $pembayaran)
                    <div class="payment-card">
                        <div class="payment-header">
                            <div>
                                <div class="payment-id">Payment #{{ $pembayaran->ID }}</div>
                                <div class="payment-date">{{ $pembayaran->created_at }}</div>
                            </div>
                        </div>
                        
                        <div class="payment-details">
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fa fa-credit-card"></i>
                                </div>
                                <div class="detail-content">
                                    <h4>Metode Pembayaran</h4>
                                    <p>{{ $pembayaran->METODE_BAYAR }}</p>
                                </div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="detail-content">
                                    <h4>Tanggal Pembayaran</h4>
                                    <p>{{ $pembayaran->tanggal_bayar_formatted }}</p>
                                </div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fa fa-info-circle"></i>
                                </div>
                                <div class="detail-content">
                                    <h4>Status</h4>
                                    <p>{{ $pembayaran->STATUS_BAYAR }}</p>
                                </div>
                            </div>
                        </div>
                        
                        @if($pembayaran->order)
                            <div class="order-info">
                                <div class="order-header">
                                    <div class="order-title">📋 Detail Pesanan</div>
                                    <span class="status-badge {{ $pembayaran->status_badge_class }}">
                                        {{ $pembayaran->STATUS_BAYAR }}
                                    </span>
                                </div>
                                <div class="order-details">
                                    <div class="order-item">
                                        <div class="order-label">Order ID</div>
                                        <div class="order-value">#{{ $pembayaran->order->ID }}</div>
                                    </div>
                                    <div class="order-item">
                                        <div class="order-label">Nama Pemesan</div>
                                        <div class="order-value">{{ $pembayaran->order->NAMA }}</div>
                                    </div>
                                    <div class="order-item">
                                        <div class="order-label">Jenis Kopi</div>
                                        <div class="order-value">{{ $pembayaran->order->COFFEE }}</div>
                                    </div>
                                    <div class="order-item">
                                        <div class="order-label">Jumlah</div>
                                        <div class="order-value">{{ $pembayaran->order->JUMLAH }} cup</div>
                                    </div>
                                    <div class="order-item">
                                        <div class="order-label">Total Harga</div>
                                        <div class="order-value">{{ $pembayaran->order->total_harga_formatted }}</div>
                                    </div>
                                </div>
                                
                                <div class="action-buttons">
                                    @if($pembayaran->STATUS_BAYAR !== 'LUNAS')
                                        <form action="{{ route('admin.pembayaran.update-status', $pembayaran->ID) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="LUNAS">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-check"></i> Set Lunas
                                            </button>
                                        </form>
                                    @endif
                                    
                                    @if($pembayaran->STATUS_BAYAR !== 'PENDING')
                                        <form action="{{ route('admin.pembayaran.update-status', $pembayaran->ID) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="PENDING">
                                            <button type="submit" class="btn btn-warning">
                                                <i class="fa fa-clock"></i> Set Pending
                                            </button>
                                        </form>
                                    @endif
                                    
                                    @if($pembayaran->STATUS_BAYAR !== 'DIBATALKAN')
                                        <form action="{{ route('admin.pembayaran.update-status', $pembayaran->ID) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="DIBATALKAN">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-times"></i> Batalkan
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="order-info">
                                <p style="color: #666; margin: 0;">Data pesanan tidak ditemukan.</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <i class="fa fa-credit-card"></i>
                    <h3>Belum Ada Pembayaran</h3>
                    <p>Belum ada data pembayaran yang tersimpan dalam sistem.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html> 