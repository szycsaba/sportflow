@extends('public.layout.app')

@section('content')
    <article class="my-2">
        <h2 class="text-xl font-bold">{{ $event->name }}<span class="ml-2">({{ $eventType }})</span></h2>
        <p>{{ $event->desc }}</p>
    </article>
    <a class="underline  hover:text-teal-500" href="{{ url()->previous() }}">Vissza</a>
@endsection
