<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Quiz Exam</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/quiz.css">

</head>


<body class="container-fluid hold-transition">

    <div class="card p-3 text-center bg-dark">
        <div class="card-title">
            <h5>Quiz: </h5> <span class="earn-text">{{ $name }}</span>
        </div>
        <div class="card-body">
            <h5>Your score: </h5> <span class="earn-text">{{ $score }}</span>
        </div>
    </div>
    <a href="{{ url('/') }}" class="btn btn-success">Home</a>

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="/dist/js/adminlte.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/pages/dashboard3.js"></script>


</body>

</html>

