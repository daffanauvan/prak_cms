<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - OnStreet Coffee</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
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
        .main-wrap {
            display: flex;
            background: rgba(255,255,255,0.97);
            border-radius: 22px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.13);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
            position: relative;
            z-index: 1;
            animation: fadeInUp 0.8s cubic-bezier(.39,.575,.56,1.000);
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: none; }
        }
        .login-illustration {
            display: none;
            background: linear-gradient(135deg, #c59d5f 0%, #d4af7a 100%);
            align-items: center;
            justify-content: center;
            flex: 1;
            min-width: 300px;
            padding: 40px 20px;
        }
        .login-illustration img {
            width: 100%;
            max-width: 220px;
            display: block;
            margin: 0 auto 20px auto;
        }
        .login-container {
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
        .login-container h2 {
            color: #c59d5f;
            text-align: center;
            margin-bottom: 10px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .welcome-msg {
            text-align: center;
            color: #764ba2;
            font-size: 1.08em;
            margin-bottom: 22px;
            font-weight: 500;
            letter-spacing: 0.5px;
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
        .form-control {
            width: 100%;
            padding: 13px 16px 13px 38px;
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
        .btn-login {
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
        .btn-login i { font-size: 1.1em; }
        .btn-login:hover {
            background: #b08d4f;
            transform: translateY(-2px) scale(1.03);
        }
        .register-link {
            text-align: center;
            margin-top: 18px;
        }
        .register-link a {
            color: #764ba2;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }
        .register-link a:hover { text-decoration: underline; color: #c59d5f; }
        .error-message {
            background: #ffeaea;
            color: #dc3545;
            font-size: 15px;
            margin-bottom: 14px;
            text-align: center;
            border-radius: 7px;
            padding: 10px 0;
            border: 1.5px solid #f5c6cb;
            box-shadow: 0 2px 8px #f5c6cb33;
        }
        .login-footer {
            text-align: center;
            color: #aaa;
            font-size: 13px;
            margin-top: 30px;
            letter-spacing: 0.5px;
        }
        @media (min-width: 900px) {
            .login-illustration { display: flex; }
        }
        @media (max-width: 600px) {
            .main-wrap { flex-direction: column; box-shadow: none; border-radius: 0; }
            .login-container { padding: 32px 12px; }
            .bg-coffee { display: none !important; }
        }
    </style>
</head>
<body>
    <div class="bg-coffee"></div>
    <div class="main-wrap">
        <div class="login-illustration">
            <img src="/img/logo.png" alt="OnStreet Coffee">
            <div style="color:#fff; text-align:center; font-size:1.1em; font-weight:500; margin-top:18px;">Selamat datang di<br>OnStreet Coffee</div>
        </div>
        <div class="login-container">
            <div class="logo">
                <img src="/img/logo.png" alt="Logo">
            </div>
            <h2>Login</h2>
            <div class="welcome-msg">Masuk untuk menikmati layanan dan promo spesial dari OnStreet Coffee ☕</div>
            @if(session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="form-group">
                    <span class="input-icon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                </div>
                <div class="form-group">
                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-login"><i class="fa fa-sign-in-alt"></i> Login</button>
            </form>
            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
            </div>
            <div class="login-footer">
                &copy; {{ date('Y') }} OnStreet Coffee. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html> 