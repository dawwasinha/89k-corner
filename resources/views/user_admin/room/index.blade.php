@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                    <span class="alert-text text-white">{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
                </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
                    <span class="alert-text text-white">{{ session('error') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
                </div>
            @endif
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Rooms</h5>
                        </div>
                        <button class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addRoomModal">
                            +&nbsp; New Room
                        </button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th class="text-center">Room Name</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Type Room</th>
                                    <th class="text-center">Facility</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Creation Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td>
                                        <div>
                                        <img src="{{ asset('storage/' . $room->image) }}" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $room->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $room->price }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $room->type_room }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $room->facility }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $room->status }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $room->created_at->format('d/m/y') }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center gap-3">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editRoomModal{{ $room->id }}">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <form action="{{ route('user_admin.rooms.destroy', $room->id) }}" method="POST" class="flex justify-center items-center" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn p-0 m-0 border-0 text-danger" data-bs-toggle="tooltip" title="Delete User">
                                                    <i class="fas fa-trash fa-lg"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit Room -->
                                <div class="modal fade" id="editRoomModal{{ $room->id }}" tabindex="-1" aria-labelledby="editRoomLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Room</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('user_admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Room Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $room->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="price" class="form-label">Price</label>
                                                        <input type="number" class="form-control" name="price" value="{{ $room->price }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="type_room" class="form-label">Type Room</label>
                                                        <input type="text" class="form-control" name="type_room" value="{{ $room->type_room }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="facility" class="form-label">Facility</label>
                                                        <input type="text" class="form-control" name="facility" value="{{ $room->facility }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Room Image</label>
                                                        <input type="file" class="form-control" name="image" accept="image/*">
                                                        <small class="text-muted">Leave blank if you don't want to change the image</small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" name="status">
                                                            <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
                                                            <option value="unavailable" {{ $room->status == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Room -->
<div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user_admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Room Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="type_room" class="form-label">Type Room</label>
                        <input type="text" class="form-control" name="type_room" required>
                    </div>
                    <div class="mb-3">
                        <label for="facility" class="form-label">Facility</label>
                        <input type="text" class="form-control" name="facility" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Room Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="available">Available</option>
                            <option value="unavailable">Unavailable</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Room</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection