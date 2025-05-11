
@extends('layouts.user_type.auth')

@section('content')
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{ asset('storage/photos/' . $user->photo) }}" alt="Profile Photo" width="100" class="rounded">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              {{ $user->name }}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
              {{ ucfirst($user->role) }}
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="card mx-4 mt-4">
        <div class="card-body">
          <h6>Edit Profile</h6>
          <hr class="horizontal dark">

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
              </div>

              @if ($user->role == 'admin')
              <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
              </div>
              @elseif ($user->role == 'renter')
              <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required disabled>
              </div>
              @endif

              @if ($user->role == 'admin')
              <div class="col-md-6 mb-3">
                <label class="form-label">Room ID</label>
                <input type="text" name="room_id" class="form-control" value="{{ old('room_id', $user->room_id) }}">
              </div>
              @elseif ($user->role == 'renter')
              <div class="col-md-6 mb-3">
                <label class="form-label">Room ID</label>
                <input type="text" name="room_id" class="form-control" 
                  value="{{ old('room_id', $user->room ? $user->room->name : "You haven't room yet") }}" 
                  disabled 
                  placeholder="You haven't room yet">
              </div>
              @endif

              <div class="col-md-6 mb-3">
                <label class="form-label">Profile Photo</label>
                <input type="file" name="photo" class="form-control">
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Update Profile</button>
              </div>
            </div>
          </form>
        </div>
      </div>


    </div>
    
  </div>

@endsection

