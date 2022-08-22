@extends('layouts.dungeon-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit photo') }}</div>
                <div class="card-body">
                    <form action="{{route('user-update', $user)}}" method="post" enctype="multipart/form-data">
                        <label>Name:</label><br>
                        <input type="text" name="user_name" value="{{$user->name}}" /><br><br>
                        <label>Photo:</label>
                         @if($user->profile_pic)
                        <div class="imageBox">
                            <img src="{{$user->profile_pic}}">
                        </div>
                        @else
                            <p>None yet</p>
                        @endif
                            <label>Upload a new one:</label><br>
                            <input type="file" name="user_photo" /><br>
                        @csrf
                        @method('put')
                        <button class="btn btn-outline-success mt-4" type="submit">Save</button>
                    </form>
                        <a class="btn btn-outline-danger mt-4" href="{{route('user-profile')}}">Cancel</a><br>
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
