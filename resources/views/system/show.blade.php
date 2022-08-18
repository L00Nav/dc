@extends('layouts.dungeon-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a system') }}</div>
                <div class="card-body">                    
                    <h4>{{$system->name}}</h4>
                    <p>Complexity: {{$system->complexity}}</p>
                    <p>Lore:<br>{{$system->fluff}}</p>
                    <p>Mechanics:<br>{{$system->crunch}}</p>
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
