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

<h2>Edit Band:</h2><br>

<form action="/bands/{{$band->id}}" method="POST">
  @csrf
  @method('PUT')
  <label>Name:</label><br><br>
  <input name="name" type="text" value="{{$band->name}}">  <br><br>
  <label>Genre:</label><br><br>
  <input name="genre" type="text" value="{{$band->genre}}">  <br><br>
  <label>Founded:</label><br><br>
  <input name="founded" type="text" value="{{$band->founded}}">  <br><br>
  <label>Active till:</label><br><br>
  <input name="active_till" type="text" value="{{$band->active_till}}">  <br><br>

  <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Update</button>
  <a href="{{ route('bands.index') }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to bands</a></form>


