<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato', sans-serif;
            background-color: #f4f1ea;
            /* Creamy/Earthy background */
            color: #4a4a4a;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Playfair Display', serif;
            color: #2c3e50;
        }

        .villa-card {
            background: #ffffff;
            border: none;
            border-radius: 2px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 3rem;
            border-top: 4px solid #8da399;
            /* Sage accent */
        }

        .btn-villa {
            background-color: #8da399;
            border-color: #8da399;
            color: white;
            border-radius: 2px;
            padding: 10px 20px;
            font-family: 'Playfair Display', serif;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-villa:hover {
            background-color: #6d8279;
            border-color: #6d8279;
            color: white;
        }

        .form-control {
            border-radius: 2px;
            border: 1px solid #e0e0e0;
            padding: 12px;
            background-color: #fafafa;
        }

        .form-control:focus {
            border-color: #8da399;
            box-shadow: none;
            background-color: #fff;
        }

        .form-label {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #888;
            margin-bottom: 8px;
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        a {
            color: #8da399;
            text-decoration: none;
            transition: color 0.2s;
        }

        a:hover {
            color: #6d8279;
        }
    </style>

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    <div class="auth-container">
        <div class="w-100" style="max-width: 500px;">
            <div class="text-center mb-4">
                <h2 class="mb-2">Villa</h2>
                <p class="text-muted fst-italic">Experience Serenity</p>
            </div>

            <div class="villa-card">
                {{ $slot }}
            </div>

            <div class="text-center mt-4">
                <small class="text-muted">&copy; {{ date('Y') }} Project Nabil. All rights reserved.</small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
