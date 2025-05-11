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

                    <!-- Select Report Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Report Title</label>
                        <select name="title" id="title" class="form-select" required>
                            <option value="">-- Select Report Type --</option>
                            <option value="Kerusakan Fasilitas">Kerusakan Fasilitas</option>
                            <option value="Kejadian">Kejadian</option>
                        </select>
                    </div>

                    <!-- Elemen lain disembunyikan sampai title dipilih -->
                    <div id="additional-fields" style="display: none;">
                        <!-- Input Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Report Description</label>
                            <textarea class="form-control" name="description" rows="5" placeholder="Describe the issue..." required></textarea>
                        </div>

                        <input type="text" name="room_id" class="form-control" value="{{ $room->id }}" hidden>

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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk menampilkan form setelah title dipilih -->
<script>
    document.getElementById('title').addEventListener('change', function () {
        const additionalFields = document.getElementById('additional-fields');
        if (this.value === "Kerusakan Fasilitas" || this.value === "Kejadian") {
            additionalFields.style.display = 'block';
        } else {
            additionalFields.style.display = 'none';
        }
    });
</script>
@endsection