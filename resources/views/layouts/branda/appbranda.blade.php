<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Hipmi Kota Mojokerto </title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset("assets/img/Logo hip.png") }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/vendor/aos/aos.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/vendor/glightbox/css/glightbox.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/vendor/swiper/swiper-bundle.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/main.css") }}" rel="stylesheet">
    <style>

        .bg-grey {
            background-color: #EEF1F8 !important;
        }

        .bg-yelow {
            background-color: #EFD43D !important;
        }

        .bg-yelow-value {
            background-color: rgb(249, 236, 166) !important;
        }

        .bg-tranparntvisi {
            background-color: rgb(17, 37, 89) !important;
        }

        .bg-tranparntmisi {
            background-color: rgb(24, 31, 50) !important;
        }

        .bg-light {
            background-color: #fff !important;
        }
        .bg-utama {
            background-color: #07225E !important;
        }

        .text-yelow {
            color: #EFD43F
        }
        .text-utama{
            color: #07225E !important;
        }
        .text-primary {
            color: #07225E !important;
        }

        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline::before {
            content: "";
            position: absolute;
            top: 0;
            left: 30%;
            width: 4px;
            height: 100%;
            background: #d1d5db;
            transform: translateX(-50%);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-content {
            padding: 20px;
            border-radius: 8px;
        }

        .timeline-date {
            background: #ffc107;
            color: #000;
            padding: 20px 20px;
            font-weight: bold;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
        }

        h5 a {
            color: #000;
        }

        h5 a:hover {
            color: #ffc107;
        }

        .col-md-4 {
            transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;

            /* Memberikan jarak antar card */
        }

        .col-md-4:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            background-color: #fff;
            padding: 15px;
        }

        .img-anggota:hover {
            transform: translateY(-5px) scale(1.05);
        }

        .image-box img {
            transition: transform 0.3s ease-in-out;
        }

        .image-box:hover img {
            transform: scale(1.1);
        }

        .text-description {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Batasi menjadi 2 baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #header {
            transition: top 0.3s ease-in-out;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }
    </style>
</head>

<body class="index-page">
    @include("layouts.branda.navigation",['$data' => $data])
    <main class="main bg-light-subtle bg-grey">
        @yield("konten")
    </main>
    @include("layouts.branda.footer")



    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/php-email-form/validate.js") }}"></script>
    <script src="{{ asset("assets/vendor/aos/aos.js") }}"></script>
    <script src="{{ asset("assets/vendor/glightbox/js/glightbox.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/waypoints/noframework.waypoints.js") }}"></script>
    <script src="{{ asset("assets/vendor/purecounter/purecounter_vanilla.js") }}"></script>
    <script src="{{ asset("assets/vendor/swiper/swiper-bundle.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/imagesloaded/imagesloaded.pkgd.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/isotope-layout/isotope.pkgd.min.js") }}"></script>
    <script src="{{ asset("assets/js/main.js") }}"></script>

    @yield("scripts")
</body>

</html>