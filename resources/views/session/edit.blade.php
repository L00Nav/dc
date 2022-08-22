@extends('layouts.dungeon-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit session') }}</div>
                <div class="card-body">
                    <form id="creationForm" action="{{route('sessions-update', $session)}}" method="post">
                        <label for="formSystem">System</label><br>
                        <select id="formSystem" name="system_id">
                            @foreach($systems as $system)
                            <option value="{{$system->id}}" @if($session->system_id == $system->id) selected @endif>{{$system->name}}</option>
                            @endforeach
                        </select><br><br>
                        <label for="formTime">Date and time</label><br>
                        <input id="formTime" name="session_time" type="datetime-local" value="{{$session->time}}" /><br><br>
                        <label for="formPlayers">Number of players (excluding GM)</label><br>
                        <input id="formPlayers" name="session_players" type="number" value="{{$session->players}}" /><br><br>
                        <label for="formStatus">Status</label><br>
                        <select id="formStatus" name="session_status">
                            <option value="-1" @if($session->status == -1) selected @endif>Cancelled</option>
                            <option value="0" @if($session->status == 0) selected @endif>Awaiting confirmation</option>
                            <option value="1" @if($session->status == 1) selected @endif>Confirmed</option>
                        </select><br><br>
                        @csrf
                        @method('put') 
                        <input type="submit" value="Confirm" />
                    </form>
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
