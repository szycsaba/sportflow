<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Esemény felvétele
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf

            <div>
                <x-input-label for="name" :value="'Név'" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" />
            </div>

            <div>
                <x-input-label for="type" :value="'Típus'" />
                <x-select id="type" class="block w-full" name="type">
                    @foreach ($types as $key => $type)
                        <option value="{{ $key }}">
                            {{ $type }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div>
                <x-input-label for="desc" :value="'Leírás'" />
                <x-textarea-input rows='8' id="desc" name="desc"
                    class="mt-1 block w-full"></x-textarea-input>
            </div>

            <div>
                <x-input-label for="main_photo" :value="'Címfotó'" />
                <x-text-input id="main_photo" name="main_photo" type="file" class="mt-1 block w-full" />
            </div>

            <div>
                <x-input-label for="event_start_at" :value="'Esemény időpontja'" />
                <x-text-input step="1" id="event_start_at" name="event_start_at" type="datetime-local"
                    class="mt-1 block w-full" :value="date('Y-m-d H:i:s')" />
            </div>

            <div>
                <x-input-label for="published_at" :value="'Megjelenés'" />
                <x-text-input step="1" id="published_at" name="published_at" type="datetime-local"
                    class="mt-1 block w-full" :value="date('Y-m-d H:i:s')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>Felvétel</x-primary-button>
                <x-previous-page-button href="{{ route('events.index') }}">Vissza</x-previous-page-button>
            </div>
        </form>

    </div>

</x-app-layout>
