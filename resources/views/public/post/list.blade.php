@extends('public.layout.app')

@section('content')
    @foreach ($events as $event)
        <article class="my-6">
            <img class="max-w-52 max-h-52" src="{{ $event->main_photo }}" alt="Címlapfotó" />
            <h2 class="text-xl font-bold">
                <a class="underline hover:text-teal-500"
                    href="{{ route('posts.show', ['id' => $event->id]) }}">{{ $event->name }}</a>
            </h2>
            <p>{{ $event->desc }}</p>
            <a class="underline hover:text-teal-500" href="{{ route('posts.show', ['id' => $event->id]) }}">Elolvasom</a>
        </article>
    @endforeach
@endsection
