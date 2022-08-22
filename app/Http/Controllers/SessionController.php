<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use App\Models\System;
// use App\Http\Requests\StoreSystemRequest;
// use App\Http\Requests\UpdateSystemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->user()?->role ?? 0 > 9)
        // {
        //     $sessions = match($request->sort) {
        //         'name-asc' => Session::orderBy('name', 'asc')->get(),
        //         'name-desc' => Session::orderBy('name', 'desc')->get(),
        //         'complexity-asc' => Session::orderBy('complexity', 'asc')->get(),
        //         'complexity-desc' => Session::orderBy('complexity', 'desc')->get(),
        //         default => Session::all()
        //     };
        // }
        // else
        // {
        //     $sessions = match($request->sort) {
        //         'name-asc' => Session::where('user_id', '=', $request->user()->id)->orderBy('name', 'asc')->get(),
        //         'name-desc' => Session::where('user_id', '=', $request->user()->id)->orderBy('name', 'desc')->get(),
        //         'complexity-asc' => Session::where('user_id', '=', $request->user()->id)->orderBy('complexity', 'asc')->get(),
        //         'complexity-desc' => Session::where('user_id', '=', $request->user()->id)->orderBy('complexity', 'desc')->get(),
        //         default => Session::where('user_id', '=', $request->user()->id)
        //     };
        // }
        $sessions = Session::all();
        $systems = System::all();

        return view('session.index', [
            'sessions' => $sessions,
            'systems' => $systems,
            'sort' => $request->sort
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sessions = Session::all();
        $systems = System::all();

        return view('session.create', [
            'sessions' => $sessions,
            'systems' => $systems
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = new Session;

        $session->system_id = $request->system_id;
        $session->user_id = Auth::id();
        $session->time = $request->session_time;
        $session->players = $request->session_players;

        $session->save();
        return redirect()->route('sessions-index')->with('notification', 'Session created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(int $sessionId)
    {
        $session = Session::where('id', $sessionId)->first();

        return view('session.show', ['session' => $session]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        $systems = System::all();

        return view('session.edit', [
            'session' => $session,
            'systems' => $systems
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSessionRequest  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        $session->system_id = $request->system_id;
        $session->user_id = Auth::id();
        $session->time = $request->session_time;
        $session->players = $request->session_players;
        $session->status = $request->session_status;

        $session->save();
        return redirect()->route('sessions-index')->with('notification', 'Session created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('sessions-index')->with('notification', 'Session deleted');
    }
}
