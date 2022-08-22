@extends('layouts.dungeon-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Session') }}</div>
                <div class="card-body">
                    <h4>System: {{$session->getSystem->name}}</h4>
                    <p>GM: {{$session->getGm->name}}</p>
                    <p>Time: {{$session->time}}</p>
                    <p>Players: {{$session->players}}</p>
                    <p>Status: 
                    @if($session->status == -1) Cancelled @endif
                    @if($session->status == 0) Awaiting confirmation @endif
                    @if($session->status == 1) Confirmed @endif
                    <p>
                    <div class="listButtons">
                        <a class="btn btn-outline-primary m-2" href="{{route('sessions-show', $session->id)}}">Show</a>
                        <a class="btn btn-outline-success m-2" href="{{route('sessions-edit', $session)}}">Edit</a>
                        <form class="delete" action="{{route('sessions-delete', $session)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger m-2">Delete</button>
                        </form>
                    </div>
                    <a class="btn btn-outline-primary m-2" href="{{route('sessions-create')}}">Add</a>
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
