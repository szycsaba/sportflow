<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function list()
    {
        $events = Event::where('published_at', '<', now())
            ->orderBy('published_at', 'desc')
            ->get();
        $events = $events->map(function ($event) {
            $imageUrl = $event->main_photo;
            $event->desc = Str::limit($event->desc, 200, '...');
            $event->main_photo = $imageUrl;

            return $event;
        });

        return view('public.post.list', [
            'events' => $events,
        ]);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $eventType = $event->type === 'in_door' ? 'Beltéri esemény' : 'Kültéri esemény';

        return view('public.post.show', [
            'event' => $event,
            'eventType' => $eventType,
        ]);
    }
}
