@guest
<div>
    <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
        </div>

        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">

                <a href="{{ route('albums.index') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                Albums
                </a>

                <a href="{{ route('bands.index') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                Bands
                 </a>


                <a href="{{ route('songs.index') }}"
                    class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                    Songs
                </a>

                <a href="/login"
                    class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                    Login
                </a>






            </div>

        </div>
    </nav>    {{ $slot }}
</div>
@endguest





@auth
<div>
    <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
        </div>

        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">

                <a href="{{ route('albums.index') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                Albums
                </a>

                <a href="{{ route('bands.index') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                Bands
                 </a>


                <a href="{{ route('songs.index') }}"
                    class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                    Songs
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>






            </div>

        </div>
    </nav>    {{ $slot }}
</div>
@endauth
