@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Payment Details</h1>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-text">{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text">{{ session('error') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Payment Information</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>User:</strong>
                            <p>{{ $payment->user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Room:</strong>
                            <p>{{ $payment->room->name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Amount:</strong>
                            <p>{{ $payment->amount }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Status:</strong>
                            <span class="badge bg-{{ $payment->status === 'open' ? 'info' : 'secondary' }}">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Due Date:</strong>
                            <p>{{ $payment->due_date }}</p>
                        </div>
                        
                        <div class="col-md-6 d-flex flex-column">
                            <strong class="mb-2">Proof Image:</strong>
                            @if($payment->proof_image)
                                <!-- Trigger modal -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#proofImageModal">
                                    <img src="{{ asset('storage/' . $payment->proof_image) }}" alt="Proof Image" class="img-fluid" style="max-width: 200px;">
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="proofImageModal" tabindex="-1" aria-labelledby="proofImageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content" style="border: none;">
                                            <div class="modal-body text-center" style="margin: 0; padding: 0;">
                                                <img src="{{ asset('storage/' . $payment->proof_image) }}" alt="Proof Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p>No proof image uploaded.</p>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('user_admin.payments.index') }}" class="btn btn-secondary">Back</a>
                        @if ($payment->status === 'pending')
                            <div>
                                <form action="{{ route('user_admin.payments.approve', $payment->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <!-- Trigger modal for rejection -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>
                            </div>
                        @endif
                    </div>

                    <!-- Modal for rejection reason -->
                    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('user_admin.payments.reject', $payment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rejectModalLabel">Reject Payment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="reason" class="form-label">Reason for Rejection</label>
                                            <textarea name="feedback" id="reason" class="form-control" rows="4" placeholder="Provide a reason for rejection..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection