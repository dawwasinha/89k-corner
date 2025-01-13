@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Room Details') }}</div>

                <div class="card-body">
                    <p><strong>{{ __('Price:') }}</strong> {{ $room->price }}</p>
                    <p><strong>{{ __('Type Room:') }}</strong> {{ $room->type_room }}</p>
                    <p><strong>{{ __('Facility:') }}</strong> {{ $room->facility }}</p>
                </div>

                <div class="card-footer">
                    <a href="{{ route('room.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    <a href="{{ route('room.edit', $room->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                    <form action="{{ route('room.destroy', $room->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection