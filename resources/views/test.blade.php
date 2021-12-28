<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Purpose</title>
</head>
<body>
    <form method="POST" action="{{ route('test') }}">
        @csrf
        <div>

            <h3>Name:</h3>
            <input type="text" name="name">
            <h3>school:</h3>
            <input type="text" name="school">
            {{-- @for ($i = 0;$i < 3; $i++)
                <h3>Address:</h3> --}}
                <h3>address</h3>
                <input type="text"  name="address[]">
                <input type="text"  name="address[]">
            {{-- @endfor --}}


        </div>
        <input type="submit">
    </form>
</body>
</html>
