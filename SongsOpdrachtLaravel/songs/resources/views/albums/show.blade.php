<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Albums</title>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>



    <body>
        <x-navbar>
        </x-navbar>
        <br>


@isset($album)
    <p>Album:</p>
    {{$album->name}}
    <br></br>

    <p>year:</p>
    @isset($album->year)
        {{$album->year}}
        <br></br>
    @endisset

    @empty($album->year)
        Unknown album year
    @endempty



    <p>times sold:</p>
    @isset($album->times_sold)
        {{$album->times_sold}}
    @endisset

    @empty($album->times_sold)
        Times sold is unknown
    @endempty
    <br></br>

    <p>Songs:</p>
    @foreach($album->songs as $song)
    {{ $song->title }}
    @endforeach
    <br><br>


    <p>Band:</p>
    {{ $band->name }}
    <br><br>


@endisset

@empty($album)
    unknown album.
@endempty
<br><br><br>

<a href="{{ route('albums.index') }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to albums</a>

    </body>
</html>

