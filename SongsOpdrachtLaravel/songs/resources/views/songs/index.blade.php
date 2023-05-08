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

    @guest

    <div class="grid grid-cols-3">
        <h2><strong>Title</strong></h2>
        <h2><strong>Singer</strong></h2>
        <h2><strong>Show song</strong></h2>
        {{-- <h2><strong>Album</strong></h2> --}}
      </div>
      <br>



      <div class="grid grid-cols-3 gap-y-4">
        @foreach($songs as $song)

        <div>
                {{$song->title}}
        </div>


        <div>
                {{$song->singer}}
        </div>

        {{-- <div>
            @foreach($song->albums as $album)
            {{ $album->name }}
            @endforeach
        </div> --}}

        <form action="/songs/{{ $song->id }}" method="POST">
            @csrf
            <div>
                <a class="bg-blue-500 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-l"
                    href="/songs/{{ $song->id }}">Show</a>


            </div>
        </form>


        @endforeach


    </div>

    @endguest















    @auth


    <div class="grid grid-cols-3">
        <h2><strong>Title</strong></h2>
        <h2><strong>Singer</strong></h2>
        {{-- <h2><strong>Album</strong></h2> --}}
        <h2><strong>Show/Edit/Delete</strong></h2>
      </div>
      <br>



      <div class="grid grid-cols-3 gap-y-2">
        @foreach($songs as $song)

             <div>
                {{$song->title}}
            </div>


            <div>
                {{$song->singer}}
            </div>

            {{-- <div>
                @foreach($song->albums as $album)
                {{ $album->name }}
                @endforeach
            </div> --}}




                 <form action="/songs/{{$song->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div>
                        <a class="bg-blue-500 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-l"
                            href="/songs/{{ $song->id }}">Show</a>

                            <a class="bg-yellow-400 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-l"
                            href="/songs/{{ $song->id }}/edit">Edit</a>

                        <button class="bg-red-500 hover:bg-gray-400 text-gray-800 font-bold py-1 px-2 rounded-l"
                            type="submit">Delete</button>

                    </div>
                 </form>

        @endforeach
        <br>



    </div>
    <br>
    <a class="content-center w-30 bg-green-500 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-r"
    href="{{route('songs.create')}}">Create</a>
    @endauth


</body>
</html>
