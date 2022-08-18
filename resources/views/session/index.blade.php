@extends('layouts.dungeon-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sessions') }}</div>
                <div class="card-body">
                    <form action="{{route('sessions-index')}}" method="get">
                        Sort by:<br>
                        <select name="sort">
                            <option value="name-asc" @if($sort=='name-asc' ) selected @endif>Name (asc)</option>
                            <option value="name-desc" @if($sort=='name-desc' ) selected @endif>Name (desc)</option>
                            <option value="complexity-asc" @if($sort=='complexity-asc' ) selected @endif>Complexity (asc)</option>
                            <option value="complexity-desc" @if($sort=='complexity-desc' ) selected @endif>Complexity (desc)</option>
                        </select>
                        <button type="submit" value="Sort">Sort</button>
                    </form>
                </div>
                <div class="card-body">
                    @forelse($sessions as $session)
                    <h4>System: {{$session->getSystem->name}}</h4>
                    <p>GM: {{$session->getGm->name}}</p>
                    <p>Time: {{$session->time}}</p>
                    <p>Players: {{$session->players}}</p>
                    <div class="listButtons">
                        <a class="btn btn-outline-primary m-2" href="{{route('sessions-show', $session->id)}}">Show</a>
                        <a class="btn btn-outline-success m-2" href="{{route('sessions-edit', $session)}}">Edit</a>
                        <form class="delete" action="{{route('sessions-delete', $session)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger m-2">Delete</button>
                        </form>
                    </div>
                    <hr>
                    @empty
                    No one is playing anything.
                    @endforelse
                    <a class="btn btn-outline-primary m-2" href="{{route('sessions-create')}}">Add</a>
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
