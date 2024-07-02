<header class="bg-teal-500">
    <nav class="text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-6">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('posts.list') }}" class=" font-bold text-lg italic">SportFlow</a>
                    </div>
                </div>
                <div class="flex">
                    {{-- <div class="space-x-8 sm:-my-px sm:ms-10 sm:flex"> --}}
                    <div class="login inline-flex items-center px-1 pt-1">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="flex items-center" title="Bejelentkezés">
                                <i class="fas fa-user ml-2"></i>
                            </a>
                        @endif
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </nav>
</header>
