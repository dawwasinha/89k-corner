@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">
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

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Payments Report</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="paymentsTable" class="table table-striped table-hover align-items-center">
                            <thead class="bg-light">
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">User</th>
                                    <th class="text-center">Room</th>
                                    <th class="text-center">Due Date</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                <tr>
                                    <td class="text-center">
                                        <span class="text-xs font-weight-bold">{{ $payment->id }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-xs font-weight-bold">{{ $payment->user->name }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-xs font-weight-bold">{{ $payment->room->name }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $payment->due_date->format('d/m/Y') }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-xs font-weight-bold">{{ number_format($payment->amount, 2) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-{{ $payment->status === 'pending' ? 'warning' : ($payment->status === 'verified' ? 'success' : 'danger') }}">
                                            {{ ucfirst($payment->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('user_admin.payments.show', $payment->id) }}" class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                                @if ($payments->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        No payments found.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#paymentsTable').DataTable({
            "order": [[3, "asc"]], // Default sorting berdasarkan kolom Due Date (index 3)
            "columnDefs": [
                { "orderable": false, "targets": 6 } // Kolom Action tidak dapat diurutkan
            ],
            "language": {
                "search": "Search:",
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "paginate": {
                    "previous": "Previous",
                    "next": "Next"
                }
            }
        });
    });
</script>
@endsection