@extends('renter.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Card untuk form -->
        <div class="card">
            <div class="card-header">
                <h2>Create New Report</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oops!</strong> Ada beberapa masalah dengan inputmu.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form untuk membuat laporan -->
                <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Input Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Report Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter report title" required>
                    </div>

                    <!-- Input Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Report Description</label>
                        <textarea class="form-control" name="description" rows="5" placeholder="Describe the issue..." required></textarea>
                    </div>

                    <!-- Input Room -->
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Related Room</label>
                        <select name="room_id" class="form-select" required>
                            <option value="">-- Select Room --</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Input Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>

                    <!-- Input Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>

                    <!-- Button Submit -->
                    <button type="submit" class="btn btn-primary">Submit Report</button>
                    <a href="{{ route('reports.index') }}" class="btn btn-secondary">Back to Reports</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
