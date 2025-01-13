@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Room') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('room.update', $room->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name Room') }}</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $room->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">{{ __('Price') }}</label>
                            <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $room->price) }}" required>
                            @error('price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type_room" class="form-label">{{ __('Type Room') }}</label>
                            <input type="text" id="type_room" name="type_room" class="form-control @error('type_room') is-invalid @enderror" value="{{ old('type_room', $room->type_room) }}" required>
                            @error('type_room')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="facility" class="form-label">{{ __('Facility') }}</label>
                            <input type="text" id="facility" name="facility" class="form-control @error('facility') is-invalid @enderror" value="{{ old('facility', $room->facility) }}" required>
                            @error('facility')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update Room') }}</button>
                        <a href="{{ route('room.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection