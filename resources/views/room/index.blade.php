@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Room List') }}</span>
                    <a href="{{ route('room.create') }}" class="btn btn-primary btn-sm">{{ __('Add Room') }}</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($rooms->isEmpty())
                        <p class="text-center">{{ __('No rooms available.') }}</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Type Room') }}</th>
                                    <th>{{ __('Facility') }}</th>
                                    <th class="text-center">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $room->price }}</td>
                                        <td>{{ $room->type_room }}</td>
                                        <td>{{ $room->facility }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('room.show', $room->id) }}" class="btn btn-info btn-sm">{{ __('View') }}</a>
                                            <a href="{{ route('room.edit', $room->id) }}" class="btn btn-warning btn-sm">{{ __('Edit') }}</a>
                                            <form action="{{ route('room.destroy', $room->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection