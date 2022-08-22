@if(session('notification'))
<div class="container messageContainer">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Notifications') }}</div>
                <div class="card-body">                    
                    <ul>
                        {{-- @forelse($messages as $message) --}}
                        <li>
                            {{ session('notification') }}
                        </li>
                        {{-- @empty --}}
                        {{-- @endforelse --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endif