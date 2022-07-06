<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Stylesheets
 ============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Roboto:300,400,500,700&display=swap"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('canvas/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('canvas/style.css') }}" type="text/css" />

    <!-- One Page Module Specific Stylesheet -->
    <link rel="stylesheet" href="{{ asset('canvas/one-page/onepage.css') }}" type="text/css" />
    <!-- / -->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('canvas/css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('canvas/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('canvas/one-page/css/et-line.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('canvas/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('canvas/css/magnific-popup.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('canvas/one-page/css/fonts.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('canvas/css/custom.css') }}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/confirm.css') }}" rel="stylesheet" type="text/css">
    <!-- Document Title
 ============================================= -->
    <title>{{ config('app.name') . ': ' . $title ?? config('app.name') }}</title>

    <style>
        @-webkit-keyframes fadeInUp {
            from {
                opacity: 0;
                -webkit-transform: translate3d(0, 70px, 0);
                transform: translate3d(0, 70px, 0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                -webkit-transform: translate3d(0, 70px, 0);
                transform: translate3d(0, 70px, 0);
            }
        }

        .font-secondary {
            font-family: 'Merriweather', serif !important;
        }
    </style>

</head>
