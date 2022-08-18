@extends('layouts.dungeon-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome') }}</div>
                <div class="card-body">
                    {{ __('To the internet. Have a look around...') }}
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
