<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Bands</title>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>



    <body>
        <x-navbar>
        </x-navbar>
        <br>

@isset($band)
    <p>Name:</p>
    {{$band->name}}
    <br></br>

    <p>Genre:</p>
      @isset($band->genre)
        {{$band->genre}}
        <br></br>
    @endisset
    @empty($band->genre)
        Unknown genre
    @endempty

    <p>Founded:</p>
     @isset($band->founded)
        {{$band->founded}}
        <br></br>
    @endisset
    @empty($band->founded)
        Founded year unknown
    @endempty

    <p>Active till:</p>
     @isset($band->active_till)
        {{$band->active_till}}
    @endisset
    @empty($band->active_till)
        Active till is unknown
    @endempty
    <br></br>



    <p>Album:</p>
    @foreach ($albums as $album)
        {{ $album->name }}
    @endforeach
    <br><br><br>
    <a href="{{ route('bands.index') }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to bands</a>


@endisset
@empty($band)
    Unknown band.
@endempty
    </body>
</html>

