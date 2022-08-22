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

        $query = System::query();

        $orderBy = $request->sort_by ?? 'name';
        $orderDir = $request->sort_dir ?? 'asc';
        $complexity = intval($request->complexity);

        $query->orderBy($orderBy, $orderDir);

        if($complexity > 0)
        {
            $query->where('complexity', $complexity);
        }

        if(!empty($request->search))
        {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        //$systems = System::all();

        $systems = $query->get();
        return view('system.index', [
            'systems' => $systems,
            'sort_by' => $orderBy,
            'sort_dir' => $orderDir,
            'complexity' => $complexity,
            ]);
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
