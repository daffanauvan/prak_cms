<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - OnStreet Coffee</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main-wrap {
            display: flex;
            background: rgba(255,255,255,0.97);
            border-radius: 22px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.13);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
        }
        .register-illustration {
            display: none;
            background: linear-gradient(135deg, #c59d5f 0%, #d4af7a 100%);
            align-items: center;
            justify-content: center;
            flex: 1;
            min-width: 300px;
            padding: 40px 20px;
        }
        .register-illustration img {
            width: 100%;
            max-width: 220px;
            display: block;
            margin: 0 auto 20px auto;
        }
        .register-container {
            flex: 1;
            padding: 48px 36px 36px 36px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .logo {
            text-align: center;
            margin-bottom: 18px;
        }
        .logo img {
            width: 70px;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(197,157,95,0.15);
        }
        .register-container h2 {
            color: #c59d5f;
            text-align: center;
            margin-bottom: 25px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; margin-bottom: 6px; color: #555; font-weight: 500; }
        .form-control {
            width: 100%;
            padding: 13px 16px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1em;
            transition: border 0.3s, box-shadow 0.3s;
            background: #f8f9fa;
        }
        .form-control:focus {
            border-color: #c59d5f;
            outline: none;
            box-shadow: 0 0 0 2px #c59d5f33;
        }
        .btn-register {
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
        }
        .btn-register:hover {
            background: #b08d4f;
            transform: translateY(-2px) scale(1.03);
        }
        .login-link {
            text-align: center;
            margin-top: 18px;
        }
        .login-link a {
            color: #764ba2;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }
        .login-link a:hover { text-decoration: underline; color: #c59d5f; }
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-bottom: 10px;
            text-align: center;
        }
        @media (min-width: 900px) {
            .register-illustration { display: flex; }
        }
        @media (max-width: 600px) {
            .main-wrap { flex-direction: column; box-shadow: none; border-radius: 0; }
            .register-container { padding: 32px 12px; }
        }
    </style>
</head>
<body>
    <div class="main-wrap">
        <div class="register-illustration">
            <img src="/img/logo.png" alt="OnStreet Coffee">
            <div style="color:#fff; text-align:center; font-size:1.1em; font-weight:500; margin-top:18px;">Gabung bersama kami<br>OnStreet Coffee</div>
        </div>
        <div class="register-container">
            <div class="logo">
                <img src="/img/logo.png" alt="Logo">
            </div>
            <h2>Daftar</h2>
            @if($errors->any())
                <div class="error-message">{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('register.submit') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn-register">Daftar</button>
            </form>
            <div class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
            </div>
        </div>
    </div>
</body>
</html> 