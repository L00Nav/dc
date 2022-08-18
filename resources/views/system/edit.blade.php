@extends('layouts.dungeon-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit system') }}</div>
                <div class="card-body">                    
                    <form id="creationForm" action="{{route('systems-update', $system)}}" method="post">
                        <label for="formName">System name</label><br>
                        <input id="formName" type="text" name="system_name" value="{{$system->name}}" /><br><br>
                        <label for="formComp">System complexity</label><br>
                        <input id="formComp"  type="number" name="system_complexity" value="{{$system->complexity}}" /><br><br>
                        <label for="formFluff">System lore</label><br>
                        <textarea id="formFluff"  class="formTextarea" form="creationForm" name="system_fluff">{{$system->fluff}}</textarea><br><br>
                        <label for="formCrunch">System mechanics</label><br>
                        <textarea id="formCrunch"  class="formTextarea" form="creationForm" name="system_crunch">{{$system->crunch}}</textarea><br><br>
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
