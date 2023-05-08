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


    <h2>Add an album:</h2>
    <br>

    <form action="/albums" method="POST">
        @csrf
        <label>Name:</label><br><br>
        <input type="text" name="name"><br><br>
        <label>Year:</label><br><br>
        <input type="text" name="year"><br><br>
        <label>Times Sold:</label><br><br>
        <input type="text" name="times_sold"><br><br>
        <label>Band id:</label><br><br>
        <input type="text" name="band_id"><br><br>


        <input class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Add album">
        <a href="{{ route('albums.index') }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to albums</a>

        <div class="container">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert"><br>
                        {{ $error }}
                    </div>
                @endforeach
            @endif

    </form>
</body>
</html>

