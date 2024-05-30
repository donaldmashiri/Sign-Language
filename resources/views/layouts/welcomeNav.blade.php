<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>My System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
        rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet"
    />

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
</head>

<body>
<!-- Navbar Start -->
<div class="container-fluid bg-light position-relative shadow">
    <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
    >
        <a
            href=""
            class="navbar-brand font-weight-bold text-secondary"
            style="font-size: 50px"
        >
            {{--            <img class="img-fluid mt-5" src="{{asset('logo/education.jpg')}}" width="40" alt="" />--}}

            <i class="flaticon-043-teddy-bear"></i>
            <span class="text-primary">ZIMBABWE MINISTRY OF EDUCATION</span>
        </a>
        <button
            type="button"
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navbarCollapse"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse justify-content-between"
            id="navbarCollapse"
        >
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="/register" class="nav-item nav-link">Teacher Register</a>
                <a href="{{route('students.create')}}" class="nav-item nav-link">Student Register</a>
                <a href="/login" class="nav-item nav-link">Login</a>
            </div>
            <a href="" class="btn btn-primary px-4">Register</a>
        </div>
    </nav>
</div>
<!-- Navbar End -->
