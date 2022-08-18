@extends('layouts.dungeon-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    {{ __('GMs can now request new systems to be added') }}<hr>
                    {{ __('First 100 games have been played!') }}<hr>
                    {{ __('Something something grand opening party') }}
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
