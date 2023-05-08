<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Albums</title>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>



    <body>
        <x-navbar/>
        <br>



        @guest
         <div class="grid grid-cols-4">
                <h2><strong>Name</strong></h2>
                <h2><strong>Year</strong></h2>
                <h2><strong>Times Sold</strong></h2>
                <h2><strong>Show album</strong></h2>
            </div>
            <br>




            <div class="grid grid-cols-4 gap-y-4">
                @foreach ($albums as $album)
                    <div>
                        {{ $album->name }}
                    </div>


                    <div>
                        {{ $album->year }}
                    </div>

                    <div>
                        {{ $album->times_sold }}
                    </div>


                    <form action="/albums/{{ $album->id }}" method="POST">
                        @csrf
                        <div>
                            <a class="bg-blue-500 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-l"
                                href="/albums/{{ $album->id }}">Show</a>


                        </div>
                    </form>





                @endforeach
        </div>


        @endguest





        @Auth


            <div class="grid grid-cols-4">
                <h2><strong>Name</strong></h2>
                <h2><strong>Year</strong></h2>
                <h2><strong>Times Sold</strong></h2>
                <h2><strong>Show/Edit/Delete</strong></h2>
            </div>
            <br>




            <div class="grid grid-cols-4 gap-y-2">
                @foreach ($albums as $album)
                    <div>
                        {{ $album->name }}
                    </div>


                    <div>
                        {{ $album->year }}
                    </div>

                    <div>
                        {{ $album->times_sold }}
                    </div>




                    <form action="/albums/{{ $album->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div>
                            <a class="bg-blue-500 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-l"
                                href="/albums/{{ $album->id }}">Show</a>

                                <a class="bg-yellow-400 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-l"
                                href="/albums/{{ $album->id }}/edit">Edit</a>

                            <button class="bg-red-500 hover:bg-gray-400 text-gray-800 font-bold py-1 px-2 rounded-l"
                                type="submit">Delete</button>

                        </div>
                    </form>
                @endforeach
        </div>
        @endauth
        <br>
        <a class="content-center w-30 bg-green-500 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-r"
        href="{{route('songs.create')}}">Create</a>
    </body>

</html>
