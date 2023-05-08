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

    <div class="grid grid-cols-2">

        <div>

            <h2>Add a song:</h2>
            <br>

            <form action="/songs" method="POST">
                @csrf
                <label>Title:</label><br><br>
                <input type="text" name="title"><br><br>
                <label>Singer:</label><br><br>
                <input type="text" name="singer"><br><br>
                

                <input class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit"
                    value="Add song">
                <a href="{{ route('songs.index') }}"
                    class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to songs</a>


            </form>
    </div>

    <div>

        <h1>Zoek een song via de API</h1><br>
        <form action="{{ route('songs.create') }}" method="GET">
            <label for=titleAPI>Zoek op song title:</label>
            <input type="text" name="title" id="titleAPI"><br><br>
            <button class="bg-blue-500 hover:bg-gray-400 text-gray-900 font-bold py-1.5 px-3 rounded-l" type=submit>Zoek</button>
        </form>
        <br>

        @foreach ($songsFromAPI as $song)
            <form action="/songs" method="POST">
                @csrf
                <input type="text" name="title" readonly="readonly" value="{{ $song['name'] }}">
                <input type="text" name="singer" readonly="readonly" value="{{ $song['artist'] }}">
                <button type="submit">+</button>

            </form>
        @endforeach
    </div>
</body>

</html>
