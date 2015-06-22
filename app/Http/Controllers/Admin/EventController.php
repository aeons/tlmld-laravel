<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Carbon\Carbon;
use Debugbar;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    use ValidatesRequests;

    private $validationRules = [
        'title'          => 'required',
        'description'    => 'required',
        'starts_at'      => 'required|date_format:Y-n-d H:i',
        'ends_at'        => 'sometimes|date_format:Y-n-d H:i|after:starts_at',
        'active_on'      => 'required|date_format:Y-n-d|before:starts_at',
        'inactive_on'    => 'sometimes|date_format:Y-n-d|after:active_on',
        'payment_needed' => 'boolean',
    ];

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.event.create', ['event' => new Event]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validationRules);
        $event = Event::create($this->parseDates($request->all()));

        return redirect()->route('admin.event.show', $event->slug);
    }

    /**
     * Parse dates into Carbon objects.
     *
     * @param array $attrs
     * @return array
     */
    private function parseDates(array $attrs)
    {
        $keys = ['starts_at', 'ends_at', 'active_on', 'inactive_on'];
        foreach ($keys as $key) {
            if (array_key_exists($key, $attrs)) {
                $attr = $attrs[$key];
                if (!empty($attr)) {
                    $attrs[$key] = new Carbon($attr);
                }
            }
        }
        return $attrs;
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return Response
     */
    public function show($slug)
    {
        return view('admin.event.show', ['event' => Event::findBySlugOrFail($slug)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $slug
     * @return Response
     */
    public function edit($slug)
    {
        return view('admin.event.edit', ['event' => Event::findBySlugOrFail($slug)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string $slug
     * @return Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, $this->validationRules);
        $event = Event::findBySlugOrFail($slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $slug
     * @return Response
     */
    public function destroy($slug)
    {
        Event::findBySlugOrFail($slug)->delete();
        return redirect()
            ->route('admin.dashboard')
            ->with('message', ['success', 'Begivenheden blev slettet.']);
    }
}
