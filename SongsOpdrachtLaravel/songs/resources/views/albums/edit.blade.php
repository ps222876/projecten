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


    <div class="grid grid-cols-3">








        <div>



            <h2>Edit album:</h2><br>


            <form action="/albums/{{ $album->id }}" method="POST">
                @csrf
                @method('PUT')
                <label>Name:</label><br><br>
                <input name="name" type="text" value="{{ $album->name }}"> <br><br>

                <label>Year:</label><br><br>
                <input name="year" type="text" value="{{ $album->year }}"> <br><br>

                <label>Times sold:</label><br><br>
                <input name="times_sold" type="text" value="{{ $album->times_sold }}"> <br><br>

                <label>Selecteer een band:</label><br><br>

                <select name="band_id">
                    @foreach ($bands as $band)
                    @if ($band == $album->band)

                        <option value="{{$band->id}}" checked>{{$band->name}}</option>
                    @else
                        <option value="{{$band->id}}">{{$band->name}}</option>
                    @endif


                    @endforeach
                </select>
                {{-- <input name="band_id" type="text" value="{{ $band->id }}"> --}}
                <br><br>

                <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    type="submit">Update</button>
                <a href="{{ route('albums.index') }}"
                    class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to albums</a>
            </form>

        </div>


        <div>
            <br><br><br>
            <p>Koppel song aan album</p><br>

        @foreach ($songs as $song)
                <form action="{{ route('album_song.store', ['song' => $song->id, 'album' => $album->id]) }}"
                    method="POST">
                    <ul>

                        <li>
                            @csrf
                            @method('PUT')
                            <input type="text" name={{ $song->id }} readonly="readonly"
                                value="{{ $song['title'] }}">
                            <button type="submit">+</button>
                        </li>

                    </ul>
                </form>
                @endforeach
            </div>


            <div>

                <br><br><br>
                <p>Ontkoppel song van album</p><br>

            @foreach ($album->songs as $song)


                <form action="{{ route('album_song.destroy', ['song' => $song->id, 'album' => $album->id]) }}"
                    method="POST">
                    <ul>

                        <li>
                            @csrf
                            @method('DELETE')
                            <input type="text" name={{ $song->id }} readonly="readonly"
                                value="{{ $song['title'] }}">
                            <button type="submit">x</button>
                        </li>

                    </ul>
                </form>
        @endforeach
    </div>
    </div>





    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert"><br>
                    {{ $error }}
                </div>
            @endforeach
        @endif
    </div>



</body>

</html>
