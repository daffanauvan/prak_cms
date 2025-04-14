<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OnStreet Coffee</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Navbar styles */
        nav {
            background-color: #343a40;
            padding: 10px 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
        }

        nav a:hover {
            background-color: #495057;
        }

        /* Content section styles */
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        ul.menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        ul.menu li {
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
        }

        ul.menu li h5 {
            margin: 0;
            font-size: 1.5rem;
        }

        ul.menu li p {
            margin: 10px 0;
            font-size: 1rem;
        }

        ul.menu li span {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <a href="{{ url('/') }}">OnStreet Coffee</a>
        <a href="{{ route('coffees.index') }}">Menu Kopi</a>
        <a href="{{ route('coffees.create') }}">Tambah Kopi</a>
    </nav>

    <!-- Main Content Section -->
    <div class="container">
        @yield('content') <!-- This is where the individual pages will inject their content -->
    </div>

</body>

</html>
