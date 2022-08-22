@extends('layouts.dungeon-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    <p>{{$user->name}}</p>
                         @if($user->profile_pic)
                        <div class="imageBox">
                            <img src="{{$user->profile_pic}}">
                        </div>
                        @else
                            <p>[No photo yet]</p>
                        @endif
                    <a class="navLink" href="{{route('user-edit', $user)}}">Upload a new photo</a><br>
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
