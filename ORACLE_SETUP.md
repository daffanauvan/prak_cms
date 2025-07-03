# Setup Database Oracle untuk OnStreet Coffee

## Konfigurasi Database

### 1. File .env
Buat file `.env` di root project dengan konfigurasi berikut:

```env
APP_NAME="OnStreet Coffee"
APP_ENV=local
APP_KEY=base64:your-app-key-here
APP_DEBUG=true
APP_URL=http://localhost

# Database Oracle Configuration
DB_CONNECTION=oracle
DB_HOST=localhost
DB_PORT=1521
DB_DATABASE=XEPDB1
DB_USERNAME=Nauvan
DB_PASSWORD=241220074
DB_TNS=
DB_SCHEMA_PREFIX=
```

### 2. Install Oracle Database Driver
```bash
composer require yajra/laravel-oci8
```

### 3. Struktur Tabel Oracle

#### Tabel ORDERS
```sql
CREATE TABLE ORDERS (
    ID NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    NAMA VARCHAR2(255) NOT NULL,
    COFFEE VARCHAR2(255) NOT NULL,
    JUMLAH NUMBER NOT NULL,
    TOTAL_HARGA NUMBER(10,2) NOT NULL,
    CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UPDATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### Tabel PEMBAYARAN
```sql
CREATE TABLE PEMBAYARAN (
    ID NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    ID_ORDER NUMBER NOT NULL,
    TANGGAL_BAYAR DATE NOT NULL,
    METODE_BAYAR VARCHAR2(255) NOT NULL,
    STATUS_BAYAR VARCHAR2(255) NOT NULL,
    CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UPDATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_pembayaran_order FOREIGN KEY (ID_ORDER) REFERENCES ORDERS(ID)
);
```

### 4. Model Configuration

#### Order Model (app/Models/Order.php)
- Table: `ORDERS`
- Primary Key: `ID`
- Fillable: `['NAMA', 'COFFEE', 'JUMLAH', 'TOTAL_HARGA']`

#### Pembayaran Model (app/Models/Pembayaran.php)
- Table: `PEMBAYARAN`
- Primary Key: `ID`
- Fillable: `['ID_ORDER', 'TANGGAL_BAYAR', 'METODE_BAYAR', 'STATUS_BAYAR']`

### 5. Controller Features

#### PembayaranController
- `store()`: Menyimpan data pembayaran ke Oracle
- `allPayments()`: Menampilkan semua pembayaran (admin)
- `updateStatus()`: Update status pembayaran
- `status()`: Menampilkan status transaksi

### 6. Routes
```php
// Pembayaran routes
Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('/pembayaran/proses/{metode}', [PembayaranController::class, 'proses'])->name('pembayaran.proses');

// Admin routes
Route::get('/admin/pembayaran', [PembayaranController::class, 'allPayments'])->name('admin.pembayaran');
Route::put('/admin/pembayaran/{id}/status', [PembayaranController::class, 'updateStatus'])->name('admin.pembayaran.update-status');
```

### 7. Features yang Tersedia

#### Halaman Pembayaran
- Form pembayaran dengan validasi
- Ringkasan pesanan
- Pilihan metode pembayaran
- Status pembayaran

#### Halaman Admin
- Lihat semua pembayaran
- Update status pembayaran
- Filter berdasarkan status

#### Halaman Status Transaksi
- Struk pembayaran yang bisa dicetak
- Detail lengkap pesanan dan pembayaran
- Status badge yang informatif

#### Halaman Riwayat Pemesanan
- Riwayat semua pesanan
- Detail pembayaran terkait
- Status pembayaran yang jelas

### 8. Error Handling
- Try-catch untuk operasi database
- Logging error untuk debugging
- User-friendly error messages
- Redirect dengan pesan error/success

### 9. Security Features
- Validasi input
- CSRF protection
- Session management
- Database connection error handling

### 10. Testing
Untuk test koneksi database:
```php
php artisan tinker
DB::connection()->getPdo();
```

Jika berhasil, akan menampilkan objek PDO connection. 