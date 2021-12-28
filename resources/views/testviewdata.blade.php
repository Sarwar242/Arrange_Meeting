<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
</head>
<body>
    <ul>

        @foreach($data->address as $address)
            {{ $address }}
        @endforeach



        {{-- <li><h3>school</h3>{{ $data }}</li> --}}
        {{-- @foreach ($data as $da )

        <li>{{ $da }}</li>
        @endforeach --}}

    </ul>
    <ul>

        {{-- @foreach ($data as $value )

                <li>{{ $value-> address }}</li>

        @endforeach --}}
    </ul>
</body>
</html>
