@extends('renter.dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- User Profile Card -->
        <div class="col-lg-4 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1 mb-3">
                        <div class="row mt-3">
                            <div class="col-8 ms-auto">
                                <div class="d-flex">
                                    <div class="ms-3">
                                        <h5 class="text-white mb-1">User Profile</h5>
                                    </div>
                                    <div class="ms-auto me-3">
                                        <div class="bg-white border-radius-md p-2 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-user text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="text-center">
                        <div class="position-relative">
                            <div class="avatar avatar-xxl position-relative">
                                <img src="{{ asset('storage/photos/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="border-radius-md shadow-sm">
                            </div>
                        </div>
                        <h5 class="mt-3 mb-1">{{ Auth::user()->name }}</h5>
                        <p class="mb-2 text-sm text-secondary">{{ Auth::user()->email }}</p>
                        <span class="badge bg-gradient-primary">{{ ucfirst(Auth::user()->role) }}</span>
                        
                        <!-- Quick Stats -->
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="card card-plain border">
                                    <div class="card-body p-3">
                                        <p class="text-xs text-secondary mb-1">Room</p>
                                        <h6 class="mb-0 text-sm">
                                            {{ Auth::user()->room ? Auth::user()->room->name : 'No Room Assigned' }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-plain border">
                                    <div class="card-body p-3">
                                        <p class="text-xs text-secondary mb-1">Status</p>
                                        @php
                                            $verifiedPayment = Auth::user()->payments->where('status', 'verified')->last();
                                        @endphp
                                        @if($verifiedPayment)
                                            <h6 class="mb-0 text-sm text-success">Active</h6>
                                        @else
                                            <h6 class="mb-0 text-sm text-danger">Pending</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions Card -->
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Quick Actions</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="avatar avatar-xs me-3 bg-gradient-primary shadow-primary border-radius-md">
                                <i class="fas fa-credit-card text-white opacity-10"></i>
                            </div>
                            <div class="d-flex align-items-start flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">Make Payment</h6>
                                <p class="mb-0 text-xs text-secondary">Pay your monthly rent</p>
                            </div>
                            <a href="#" class="btn btn-link pe-3 ps-0 mb-0 ms-auto">
                                <i class="fas fa-arrow-right text-sm ms-1"></i>
                            </a>
                        </li>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="avatar avatar-xs me-3 bg-gradient-primary shadow-primary border-radius-md">
                                <i class="fas fa-calendar text-white opacity-10"></i>
                            </div>
                            <div class="d-flex align-items-start flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">Payment History</h6>
                                <p class="mb-0 text-xs text-secondary">View all transactions</p>
                            </div>
                            <a href="#" class="btn btn-link pe-3 ps-0 mb-0 ms-auto">
                                <i class="fas fa-arrow-right text-sm ms-1"></i>
                            </a>
                        </li>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="avatar avatar-xs me-3 bg-gradient-primary shadow-primary border-radius-md">
                                <i class="fas fa-cog text-white opacity-10"></i>
                            </div>
                            <div class="d-flex align-items-start flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">Account Settings</h6>
                                <p class="mb-0 text-xs text-secondary">Update your profile</p>
                            </div>
                            <a href="#" class="btn btn-link pe-3 ps-0 mb-0 ms-auto">
                                <i class="fas fa-arrow-right text-sm ms-1"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Account Details and Payment Info -->
        <div class="col-lg-8">
            <!-- Account Details Card -->
            <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Account Details</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="avatar avatar-sm bg-gradient-primary shadow text-center border-radius-md">
                                <i class="fas fa-file-alt text-white opacity-10"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card card-plain border">
                                <div class="card-body p-3">
                                    <p class="text-xs text-secondary mb-1">Room Assignment</p>
                                    <h6 class="mb-0 text-sm">
                                        {{ Auth::user()->room ? Auth::user()->room->name : 'No Room Assigned' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card card-plain border">
                                <div class="card-body p-3">
                                    <p class="text-xs text-secondary mb-1">Email Verification</p>
                                    <h6 class="mb-0 text-sm {{ Auth::user()->email_verified_at ? 'text-success' : 'text-danger' }}">
                                        {{ Auth::user()->email_verified_at ? 'Verified on ' . Auth::user()->email_verified_at->format('Y-m-d') : 'Not Verified' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card card-plain border">
                                <div class="card-body p-3">
                                    <p class="text-xs text-secondary mb-1">Account Created</p>
                                    <h6 class="mb-0 text-sm">{{ Auth::user()->created_at->format('Y-m-d H:i:s') }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card card-plain border">
                                <div class="card-body p-3">
                                    <p class="text-xs text-secondary mb-1">Last Updated</p>
                                    <h6 class="mb-0 text-sm">{{ Auth::user()->updated_at->format('Y-m-d H:i:s') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payment Status Card -->
            <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Payment Status</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="avatar avatar-sm bg-gradient-primary shadow text-center border-radius-md">
                                <i class="fas fa-money-bill text-white opacity-10"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    @php
                        $verifiedPayment = Auth::user()->payments->where('status', 'verified')->last();
                        $nextPayment = Auth::user()->payments->where('status', 'pending')->first();
                    @endphp
                    
                    <!-- Current Month Status -->
                    <div class="card card-plain border mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <p class="text-sm text-secondary mb-1">This Month's Payment</p>
                                    @if($verifiedPayment)
                                        <div class="d-flex align-items-center">
                                            <div class="me-2 text-success">
                                                <i class="fas fa-circle text-xs"></i>
                                            </div>
                                            <h6 class="mb-0 text-success">Paid</h6>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center">
                                            <div class="me-2 text-danger">
                                                <i class="fas fa-circle text-xs"></i>
                                            </div>
                                            <h6 class="mb-0 text-danger">Not Paid</h6>
                                        </div>
                                    @endif
                                </div>
                                
                                @if($nextPayment)
                                <div class="col-4">
                                    <div class="card card-plain border bg-light">
                                        <div class="card-body py-2 px-3">
                                            <p class="text-xs text-secondary mb-1">Next Payment Due</p>
                                            <h6 class="mb-0 text-sm">{{ $nextPayment->due_date->format('Y-m-d') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Last Payment Details -->
                    @if($verifiedPayment)
                    <div class="card card-plain border">
                        <div class="card-header pb-0 p-3 bg-light">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="mb-0">Last Verified Payment</h6>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="badge bg-gradient-success">Verified</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <p class="text-xs text-secondary mb-1">Invoice Code</p>
                                    <h6 class="mb-0 text-sm">{{ $verifiedPayment->invoice_code }}</h6>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <p class="text-xs text-secondary mb-1">Amount</p>
                                    <h6 class="mb-0 text-sm">Rp{{ number_format($verifiedPayment->amount, 0, ',', '.') }}</h6>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <p class="text-xs text-secondary mb-1">Verified At</p>
                                    <h6 class="mb-0 text-sm">{{ $verifiedPayment->updated_at->format('Y-m-d H:i:s') }}</h6>
                                </div>
                            </div>
                            
                            <div class="text-end mt-3">
                                <a href="#" class="text-primary text-sm font-weight-bold">
                                    View Receipt <i class="fas fa-arrow-right text-xs ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card card-plain border text-center p-5">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg mx-auto mb-4">
                            <i class="fas fa-money-bill text-white opacity-10"></i>
                        </div>
                        <p class="text-secondary mb-4">No verified payments recorded yet</p>
                        <a href="#" class="btn bg-gradient-primary">
                            Make Your First Payment
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Activity Timeline -->
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Recent Activity</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="avatar avatar-sm bg-gradient-primary shadow text-center border-radius-md">
                                <i class="fas fa-clock text-white opacity-10"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side">
                        <div class="timeline-block mb-3">
                            <span class="timeline-step bg-primary">
                                <i class="fas fa-sign-in-alt text-white"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Login Detected</h6>
                                <p class="text-secondary text-xs mt-1 mb-0">Today at 08:45 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step bg-success">
                                <i class="fas fa-money-bill text-white"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Payment Received</h6>
                                <p class="text-secondary text-xs mt-1 mb-0">Yesterday at 14:30 PM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step bg-warning">
                                <i class="fas fa-user-edit text-white"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Profile Updated</h6>
                                <p class="text-secondary text-xs mt-1 mb-0">May 10, 2025 at 10:15 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block">
                            <span class="timeline-step bg-danger">
                                <i class="fas fa-tools text-white"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Maintenance Request Submitted</h6>
                                <p class="text-secondary text-xs mt-1 mb-0">May 8, 2025 at 16:22 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Timeline styling for Soft UI Dashboard */
    .timeline {
        position: relative;
        margin-left: 30px;
    }
    
    .timeline-block {
        position: relative;
    }
    
    .timeline-step {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        left: -20px;
    }
    
    .timeline-content {
        margin-left: 30px;
        padding-bottom: 24px;
        position: relative;
    }
    
    .timeline-content:after {
        content: "";
        position: absolute;
        left: -27px;
        top: 44px;
        height: 100%;
        width: 2px;
        background-color: #e9ecef;
    }
    
    .timeline-block:last-child .timeline-content:after {
        display: none;
    }
    
    /* Avatar styling */
    .avatar-xxl {
        width: 110px;
        height: 110px;
        overflow: hidden;
        margin: 0 auto;
    }
    
    .avatar-xxl img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .avatar-xs {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection
