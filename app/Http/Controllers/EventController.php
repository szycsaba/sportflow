<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('published_at')->get();

        return view('public.admin.event.list', [
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Event::getTypeOptions();

        return view('public.admin.event.create', [
            'types' => $types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = null;
        $types = Event::getTypeOptions();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => ['required', Rule::in(array_keys($types))],
            'desc' => 'required|string',
            'main_photo' => 'image|mimes:jpg,jpeg,png|max:10240',
            'event_start_at' => 'required|date',
            'published_at' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('main_photo')) {
            $filename = $request->file('main_photo')->getClientOriginalName();
            $imagePath = $request->file('main_photo')->storeAs('main_photos', $filename, 'public');

            // Itt mentheted a kép útvonalát az adatbázisba, például a felhasználó profiljához.
        }

        $validated = $validator->validated();

        Event::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'desc' => $validated['desc'],
            'main_photo' => $imagePath,
            'event_start_at' => $validated['event_start_at'],
            'published_at' => $validated['published_at'],
        ]);

        return redirect()->route('events.index')->with('success', 'Bejegyzés sikeresen létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $types = Event::getTypeOptions();

        return view('public.admin.event.edit', [
            'event' => $event,
            'types' => $types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $types = Event::getTypeOptions();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => ['required', Rule::in(array_keys($types))],
            'desc' => 'required|string',
            'event_start_at' => 'required|date',
            'published_at' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $event = Event::findOrFail($id);

        if ($event) {
            $event->name = $request->name;
            $event->type = $request->type;
            $event->desc = $request->desc;
            $event->event_start_at = $request->event_start_at;
            $event->published_at = $request->published_at;
            $event->save();
        }

        return redirect()->route('events.edit', ['event' => $event->id])->with('success', 'Az esemény sikeresen módosítva lett!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'A bejegyzés sikeresen törölve!');
    }
}
