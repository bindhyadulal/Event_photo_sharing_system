<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'EPS') }}</title> --}}
    <title>EPS</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <style>
        .navbar {
            background: linear-gradient(135deg, #f8eaf7, #e0c3fc); /* Match login page background */
        }
        .navbar-brand img {
            max-height: 60px;
            transition:max-height:0.3s ease;
            margin-left:20%; /* Responsive logo size */
        }
        @media(min-width:1024px){
            .navbar-brand img{
                max-height:80px;
                margin-left:50%;
            }
        }
        .navbar-nav .nav-link {
            color: #6e3b6e !important; /* Match login page text color */
            font-weight: bold;
        }
        .navbar-nav .nav-link:hover {
            color: #8b458b !important; /* Darker hover color */
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #f8eaf7, white);
            color: #6e3b6e;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header-title {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }
        @media(min-width:1024px){
            .header-title{
                font-size: 4rem;
            }
        }

        .header-subtitle {
            font-size: 1.2rem;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Carousel styles */
        .carousel-container {
            position: relative;
            background: linear-gradient(135deg, rgba(110, 59, 110, 0.1), rgba(110, 59, 110, 0.2)); /* Gradient background */
            border-radius: 10px; /* Rounded corners for the section */
            padding: 20px; /* Padding around the carousel */
            max-width: 80%; /* Restrict width for better appearance */
            margin: auto; /* Center align */
        }

        .carousel-inner img {
            object-fit: cover;
            width: 100%;
            height: 560px;
            border-radius: 8px; /* Rounded corners for images */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        @media (max-width: 768px) {
            .carousel-inner img {
                height: 200px;
            }

            .carousel-container {
                padding: 10px;
                max-width: 100%;
            }
        }

        .btn-custom {
            display: block;
            margin: 20px auto;
            padding: 12px 30px;
            background-color: #6e3b6e;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
        }

        .btn-custom:hover {
            background-color: #8b458b;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .center-text {
            text-align: center;
            margin-top: 40px;
        }

        .step-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .step {
            display: flex;
            align-items: center;
            flex-direction: column;
            text-align: center;
            width: 30%;
        }

        .step-icon {
            font-size: 40px;
            color: #8b458b;
            margin-bottom: 10px;
        }

        .step-content h3 {
            margin: 0;
            font-size: 1.2rem;
        }

        .step-content p {
            margin: 0;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .step-container {
                flex-direction: column;
                align-items: center;
            }

            .step {
                width: 100%;
            }

            .step-icon {
                margin-bottom: 10px;
            }
        }

        .contact-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            background-color: #f8eaf7;
            color: #6e3b6e;
            padding: 20px;
            border-top: 3px solid #e0c3fc;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 40px;
        }

        .contact-column {
            flex: 1 1 250px;
            padding: 10px;
            margin: 10px;
            text-align: center; 
        }

        .contact-column h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #6e3b6e;
        }

        .contact-column p, .contact-column a {
            font-size: 0.9rem;
            margin: 3px 0;
            color: #6e3b6e;
            text-decoration: none;
        }

        .contact-column a:hover {
            color: #8b458b;
        }

        iframe {
            width: 100%;
            height: 150px;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .about-section {
            text-align: center;
            padding: 20px;
            background-color: #f8eaf7;
            margin-top: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px
            rgba(0, 0, 0, 0.1);
        }

        .about-section h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #6e3b6e;
        }

        .about-section p {
            font-size: 1rem;
            color: #6e3b6e;
        }

        .footer {
            text-align: center;
            background-color: #e0c3fc;
            padding: 10px 0;
            color: #6e3b6e;
            font-size: 0.8rem;
        }

        footer {
            background: linear-gradient(135deg, #f8eaf7, #e0c3fc); /* Match login page */
            color: #6e3b6e;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 5px;
            font-family: 'Poppins', Arial, sans-serif;
        }

        .footer-center {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .contact-section {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .contact-column {
                flex: 1 1 100%;
                margin-bottom: 15px;
            }

            iframe {
                height: 200px;
            }
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #6e3b6e;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #6e3b6e;
            font-weight: bold;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px; /* Reduced padding */
            border-radius: 6px; /* Reduced border radius */
            border: 1px solid #ddd;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #6e3b6e;
            box-shadow: 0 0 5px rgba(110, 59, 110, 0.2);
        }

        .btn-submit {
            background: #6e3b6e;
            color: white;
            padding: 10px; /* Reduced padding */
            border: none;
            border-radius: 6px; /* Reduced border radius */
            font-size: 14px; /* Reduced font size */
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background: #8b458b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
                padding: 15px;
            }

            h2 {
                font-size: 18px;
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                font-size: 13px;
                padding: 7px;
            }

            .btn-submit {
                font-size: 12px;
                padding: 8px;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 16px;
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                font-size: 12px;
                padding: 6px;
            }

            .btn-submit {
                font-size: 12px;
                padding: 6px;
            }
        }
        .data-display {
            margin: 20px auto;
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .event-details {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }

        .event-details h3 {
            margin: 0 0 10px;
            color: #6e3b6e;
        }

        .event-details p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .qr-button {
            margin-top: 20px;
            text-align: center;
        }

        .qr-button button {
            background-color: #6e3b6e;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        .qr-button button:hover {
            background-color: #8b458b;
        }
    </style>
    @stack("styles")
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('images/logo1.png')}}" alt="MyApp Logo"> <!-- Replace with your logo path -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest                       
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.index')}}">Home</a>
                    </li>
                    @endguest
                    @guest                       
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    @else
                    <form action="{{route('logout')}}" id="logout-form" method="POST">
                        @csrf
                        <a class="nav-link" href="{{route('logout')}}" class="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                        </a>
                    </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer>
        <div class="footer-center">
            <p>&copy; 2024 MyApp. All rights reserved.</p>
            
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
