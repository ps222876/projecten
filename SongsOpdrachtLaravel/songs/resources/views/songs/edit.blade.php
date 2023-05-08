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

    <div class="grid grid-cols-3">



        <div>


            <h2>Edit song:</h2><br>

            <form action="/songs/{{ $song->id }}" method="POST">
                @csrf
                @method('PUT')
                <label>Title:</label><br><br>
                <input name="title" type="text" value="{{ $song->title }}"> <br><br>
                <label>Singer:</label><br><br>
                <input name="singer" type="text" value="{{ $song->singer }}"> <br><br>
                <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    type="submit">Update</button>
                <a href="{{ route('songs.index') }}"
                    class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to songs</a>
            </form>

        </div>


        <div>

            <br><br><br>
            <p>Koppel album aan song</p><br>

            @foreach ($albums as $album)
                <form action="{{ route('album_song.store', ['song' => $song->id, 'album' => $album->id]) }}"
                    method="POST">
                    <ul>

                        <li>
                            @csrf
                            @method('PUT')
                            <input type="text" name={{ $album->id }} readonly="readonly"
                                value={{ $album->name }}>
                            <button type="submit">+</button>
                        </li>

                    </ul>
                </form>
            @endforeach
        </div>

        <div>

            <br><br><br>
            <p>Ontkoppel album van song</p><br>

            @foreach ($song->albums as $album)
                <form action="{{ route('album_song.destroy', ['song' => $song->id, 'album' => $album->id]) }}"
                    method="POST">
                    <ul>

                        <li>
                            @csrf
                            @method('DELETE')
                            <input type="text" name={{ $album->id }} readonly="readonly"
                                value={{ $album->name }}>
                            <button type="submit">x</button>
                        </li>

                    </ul>
                </form>
            @endforeach
        </div>
    </div>



</body>

</html>
