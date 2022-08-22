@extends('layouts.dungeon-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a session') }}</div>
                <div class="card-body">                    
                    <form id="creationForm" action="{{route('sessions-store')}}" method="post">
                        <label for="formSystem">System</label><br>
                        <select id="formSystem" name="system_id">
                            @foreach($systems as $system)
                            <option value="{{$system->id}}">{{$system->name}}</option>
                            @endforeach
                        </select><br><br>
                        <label for="formTime">Date and time</label><br>
                        <input id="formTime" name="session_time" type="datetime-local" /><br><br>
                        <label for="formPlayers">Number of players (excluding GM)</label><br>
                        <input id="formPlayers" name="session_players" type="number" /><br><br>
                        @csrf
                        @method('post') 
                        <input type="submit" value="create" />
                    </form>
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection

{{-- system
time
players --}}