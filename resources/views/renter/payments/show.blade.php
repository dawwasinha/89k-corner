@extends('renter.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Payment Details</h1>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Payment Information</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Room:</strong>
                            <p>{{ $payment->room->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Amount:</strong>
                            <p>{{ $payment->amount }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Status:</strong>
                            <span class="badge bg-{{ $payment->status === 'open' ? 'info' : 'secondary' }}">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <strong>Due Date:</strong>
                            <p>{{ $payment->due_date }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <strong>Proof Image:</strong>
                            @if($payment->proof_image)
                                <img src="{{ asset('storage/' . $payment->proof_image) }}" alt="Proof Image" class="img-fluid" style="max-width: 200px;">
                            @else
                                <p>No proof image uploaded.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Form to upload proof image -->
                    @if($payment->status === 'pending')
                        <form action="{{ route('payments.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="proof_image" class="form-label">Upload Proof of Payment</label>
                                <input type="file" name="proof_image" id="proof_image" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back to Payments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection