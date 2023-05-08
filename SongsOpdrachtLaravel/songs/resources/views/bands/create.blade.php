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
<h2>Add a band:</h2><br>

<form action="/bands" method="POST">
  @csrf
  <label>Name:</label><br><br>
  <input type="text" name="name"><br><br>
  <label>Genre:</label><br><br>
  <input type="text" name="genre"><br><br>
  <label>Founded:</label><br><br>
  <input type="text" name="founded"><br><br>
  <label>Active till:</label><br><br>
  <input type="text" name="active_till"><br><br>

  <input type="submit" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Add album">
  <a href="{{ route('albums.index') }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to albums</a>
  <div class="container">
  @if ($errors->any())
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert"><br>
        {{$error}}
    </div>
    @endforeach
  @endif

</form>
</body>
</html>
