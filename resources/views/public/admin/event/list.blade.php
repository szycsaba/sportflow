<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Események
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap">
            <a href="{{ route('events.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center block">
                + Esemény felvétele
            </a>
        </div>

        @if (session('success'))
            <div class="flex flex-wrap mt-4">
                <div class="w-full py-4 bg-green-500 text-white">
                    <h4>{{ session('success') }}</h4>
                </div>
            </div>
        @endif

        <div class="flex flex-wrap mt-4 font-bold">
            <div class="w-6/12">
                <h5>Cím</h5>
            </div>
            <div class="w-4/12">
                <h5>Megjelenés</h5>
            </div>
            <div class="w-1/12 px-2">
                <h5>Szerkesztés</h5>
            </div>
            <div class="w-1/12 px-2">
                <h5>Törlés</h5>
            </div>
        </div>
        @foreach ($events as $event)
            <div class="flex flex-wrap py-2 hover:bg-teal-500 hover:text-white">
                <div class="w-6/12">
                    <h6>{{ $event->name }}</h6>
                </div>
                <div class="w-4/12">
                    <h6>{{ $event->published_at }}</h6>
                </div>
                <div class="w-1/12 px-2">
                    <a class="py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded text-center block"
                        href="{{ route('events.edit', $event->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
                <div class="w-1/12 px-2">
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" name="event"
                        onsubmit="return confirm('Biztosan törölni szeretnéd?');">
                        @csrf
                        @method('DELETE')
                        <button name="delete"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold rounded py-2 w-full"
                            type="submit"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
