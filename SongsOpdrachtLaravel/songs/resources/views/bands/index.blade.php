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
    </nav>
    <br>


    @guest
    <div class="grid grid-cols-5">
        <h2><strong>Name</strong></h2>
        <h2><strong>Genre</strong></h2>
        <h2><strong>Founded</strong></h2>
        <h2><strong>Active till </strong></h2>
        <h2><strong>Show band </strong></h2>
      </div>
      <br>



      <div class="grid grid-cols-5 gap-y-4">
        @foreach($bands as $band)

            <div>
                {{$band->name}}
            </div>


            <div>
                {{$band->genre}}
            </div>


            <div>
                {{$band->founded}}
            </div>



            <div>
                {{$band->active_till}}
            </div>


            <form action="/bands/{{ $band->id }}" method="POST">
                @csrf
                <div>
                    <a class="bg-blue-500 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-l"
                        href="/bands/{{ $band->id }}">Show</a>


                </div>
            </form>


        @endforeach


    </div>
    @endguest



























    @Auth

    <div class="grid grid-cols-5">
        <h2><strong>Name</strong></h2>
        <h2><strong>Genre</strong></h2>
        <h2><strong>Founded</strong></h2>
        <h2><strong>Active till </strong></h2>
        <h2><strong>Show/Edit/Delete</strong></h2>
      </div>
      <br>



    <div class="grid grid-cols-5 gap-y-2">
        @foreach($bands as $band)

            <div>
                {{$band->name}}
            </div>


            <div>
                {{$band->genre}}
            </div>


            <div>
                {{$band->founded}}
            </div>



            <div>
                {{$band->active_till}}
            </div>


                 <form action="/bands/{{$band->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                     <div>
                        <a class="bg-blue-500 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-l"
                            href="/bands/{{ $band->id }}">Show</a>

                            <a class="bg-yellow-400 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-l"
                            href="/bands/{{ $band->id }}/edit">Edit</a>

                        <button class="bg-red-500 hover:bg-gray-400 text-gray-800 font-bold py-1 px-2 rounded-l"
                            type="submit">Delete</button>



                    </div>
                 </form>

        @endforeach
    </div>
    <br>
    <a class="content-center w-30 bg-green-500 hover:bg-gray-400 text-gray-800 font-bold py-1.5 px-3 rounded-r"
    href="{{route('bands.create')}}">Create</a>

    @endauth



</body>
</html>
