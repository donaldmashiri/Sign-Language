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
                <a href="/register" class="nav-item nav-link">Register</a>
                <a href="/login" class="nav-item nav-link">Login</a>
            </div>
            <a href="" class="btn btn-primary px-4">Register</a>
        </div>
    </nav>
</div>
<!-- Navbar End -->

<!-- Header Start -->
<div class="container-fluid bg-primary px-0 px-md-5 mb-5">
    <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
            <h4 class="text-white mb-4 mt-5 mt-lg-0"> ZIMBABWE MINISTRY OF EDUCATION</h4>
            <h1 class="display-3 font-weight-bold text-white">
                 SIGN LANGUAGE TO TEXT CONVERSION SYSTEM USING IMAGES
            </h1>
            <p class="text-white mb-4">
                The Sign Language to Text Conversion System using Images is a innovative project by the Zimbabwe Ministry of Education. This system aims to bridge the communication gap between individuals who use sign language and those who do not, by automatically converting sign language gestures captured through images into text.
            </p>

        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <img class="img-fluid mt-5 rounded" src="{{asset('logo/education.jpg')}}" alt="" />
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Facilities Start -->
<div class="container-fluid pt-5">
    <div class="container pb-3">
        <div class="row">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4 p-4">
                    <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Playground</h4>
                        <p class="m-0">Engaging outdoor play areas for children to explore and develop physically and socially.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4 p-4">
                    <i class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Music and Dance</h4>
                        <p class="m-0">Opportunities for children to express themselves through the arts and develop their creative skills.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4 p-4">
                    <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Arts and Crafts</h4>
                        <p class="m-0">Hands-on activities to foster children's creativity, fine motor skills, and self-expression.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4 p-4">
                    <i class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Safe Transportation</h4>
                        <p class="m-0">Reliable and secure transportation options to ensure children's safety and well-being.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4 p-4">
                    <i class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Healthy Food</h4>
                        <p class="m-0">Nutritious meals and snacks to support children's growth and development.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4 p-4">
                    <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Educational Tour</h4>
                        <p class="m-0">Engaging field trips and excursions to enhance children's learning and exploration.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facilities Start -->


<!-- Footer Start -->
<div
    class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5"
>
    <div
        class="container-fluid pt-5"
        style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;"
    >
        <p class="m-0 text-center text-white">
            &copy;
            <a class="text-primary font-weight-bold" href="#">Designed by Augustine Madongonda</a>.
            For the purpose to fulfil my Dissertations at Midlands State University

        </p>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary p-3 back-to-top"
><i class="fa fa-angle-double-up"></i
    ></a>

</body>
</html>
