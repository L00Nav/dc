<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
// use App\Http\Requests\StoreSystemRequest;
// use App\Http\Requests\UpdateSystemRequest;
use Illuminate\Http\Request;

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
        $users = User::all();

        return view('session.index', [
            'sessions' => $sessions,
            'users' => $users,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSessionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSessionRequest  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
