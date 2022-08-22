@extends('layouts.dungeon-main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Systems') }}</div>
                <div class="card-body">
                    <form action="{{route('systems-index')}}" method="get">
                        <label for="sort-order">Sort by:</label><br>
                        <select id="sort-order" name="sort_by">
                            <option value="name" @if($sort_by=='name' ) selected @endif>Name</option>
                            <option value="complexity" @if($sort_by=='complexity' ) selected @endif>Complexity</option>
                        </select>
                        <select name="sort_dir">
                            <option value="asc" @if($sort_dir=='asc') selected @endif>Ascending</option>
                            <option value="desc" @if($sort_dir=='desc') selected @endif>Descending</option>
                        </select><br>
                        <label for="complexity-filter">Complexity:</label><br>
                        <select id="complexity-filter" name="complexity">
                            <option value="0" @if($complexity==0) selected @endif>All</option>
                            <option value="1" @if($complexity==1) selected @endif>1</option>
                            <option value="2" @if($complexity==2) selected @endif>2</option>
                            <option value="3" @if($complexity==3) selected @endif>3</option>
                            <option value="4" @if($complexity==4) selected @endif>4</option>
                            <option value="5" @if($complexity==5) selected @endif>5</option>
                        </select><br>
                        <label for="search">Search:</label><br>
                        <input type="text" id="search" name="search"/><br>
                        <br><button type="submit" value="Sort">Sort</button>
                    </form>
                </div>
                <div class="card-body">
                        @forelse($systems as $system)
                            <h4>{{$system->name}}</h4>
                            <p>Complexity: {{$system->complexity}}/5</p>
                        <div class="listButtons">
                            <a class="btn btn-outline-primary m-2" href="{{route('systems-show', $system->id)}}">More details</a>
                            @if(Auth::user()->role > 9)
                            <a class="btn btn-outline-success m-2" href="{{route('systems-edit', $system)}}">Edit</a>
                            <form class="delete" action="{{route('systems-delete', $system)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger m-2">Delete</button>
                            </form>
                            @endif
                        </div>
                            <hr>
                        @empty
                        Tabletop RPGs died, apparently. All of them. Even D&D. Could I perhaps interest you in some Chess?
                        @endforelse
                    <a class="btn btn-outline-primary m-2" href="{{route('systems-create')}}">Add</a>  
                </div>
            </div>
        </div>
        @include('parts.nav')
    </div>
</div>
@endsection
