<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Songs</title>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>



    <body>
        <x-navbar>
        </x-navbar>
        <br>

@isset($song)
    <p>Song:</p> {{$song->title}}<br/>
    <br></br>

    <p>Singer:</p>
    @isset($song->singer)
        {{$song->singer}}
    @endisset
    @empty($song->singer)
        Unknown singer
    @endempty
    <br></br>


    <p>Albums:</p>
   @foreach($song->albums as $album)
   {{ $album->name }}
   @endforeach
   <br><br>


@endisset
@empty($song)
    Unknown song.
@endempty
<br>
<a href="{{ route('songs.index') }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to songs</a>

    </body>
</html>
{{--
{{dd($song->albums->name)}} --}}

