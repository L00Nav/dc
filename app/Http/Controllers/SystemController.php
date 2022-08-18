<?php

namespace App\Http\Controllers;

use App\Models\System;
// use App\Http\Requests\StoreSystemRequest;
// use App\Http\Requests\UpdateSystemRequest;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $things = Thing::all()->sortByDesc('name');
        // $things = Thing::where('id', '<', 100)->orderBy('name')->get();

        $systems = match($request->sort) {
            'name-asc' => System::orderBy('name', 'asc')->get(),
            'name-desc' => System::orderBy('name', 'desc')->get(),
            'complexity-asc' => System::orderBy('complexity', 'asc')->get(),
            'complexity-desc' => System::orderBy('complexity', 'desc')->get(),
            default => System::all()
        };

        //$systems = System::all();
        return view('system.index', ['systems' => $systems, 'sort' => $request->sort]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSystemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $system = new System;

        $system->name = $request->system_name;
        $system->complexity = $request->system_complexity;
        $system->fluff = $request->system_fluff;
        $system->crunch = $request->system_crunch;

        $system->save();
        return redirect()->route('systems-index')->with('notification', 'System created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(int $systemId)
    {
        $system = System::where('id', $systemId)->first();

        return view('system.show', ['system' => $system]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function edit(System $system)
    {
        return view('system.edit', ['system' => $system]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSystemRequest  $request
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, System $system)
    {
        $system->name = $request->system_name;
        $system->complexity = $request->system_complexity;
        $system->fluff = $request->system_fluff;
        $system->crunch = $request->system_crunch;

        $system->save();
        return redirect()->route('systems-index')->with('notification', 'System created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        $system->delete();

        return redirect()->route('systems-index')->with('notification', 'System deleted.');
    }
}
