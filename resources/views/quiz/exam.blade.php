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
        <div>
            <h5>Quiz: </h5> <span class="earn-text">{{ $quiz->name }}</span>
        </div>
    </div>
    <form action="{{ route('quiz.submit',$quiz->slug) }}" method="post">
        @csrf
        <div class="container mt-sm-5 my-1">
            <div class="form-group col-sm-6 offset-sm-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <div class="form-group col-sm-6 offset-sm-3">
                <label for="roll">Roll</label>
                <input type="text" name="roll" class="form-control" id="roll">
            </div>
            <div class="form-group col-sm-6 offset-sm-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
        </div>
    <div class="container mt-sm-5 my-1 mb-5">
        @foreach ($quiz->questions as $question)
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>Q{{ $loop->index+1 }}. {{ $question->question }}</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3">
                    @foreach ($question->options as $option)
                    <label class="options">{{ $option->option }}
                        <input type="radio" name="{{ $question->id }}" value="{{ $option->id }}"> <span class="checkmark"></span></label>
                    @endforeach
                </div>
            </div>
        @endforeach
        <div class="d-flex align-items-center pt-3">
            <div class="ml-auto mr-sm-5"> <button class="btn btn-success">Submit</button> </div>
        </div>
    </div>
</form>
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

