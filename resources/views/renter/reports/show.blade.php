@extends('renter.dashboard')

@section('content')
<div class="container mt-4">
    <div class="card mb-4">
        <div class="card-header">
            <h4>{{ $report->title }}</h4>
            <small class="text-muted">
                Diajukan oleh <strong>{{ $report->user->name }}</strong> pada {{ $report->created_at->format('d M Y, H:i') }}
            </small>
        </div>
        <div class="card-body">
            {{-- Gambar laporan --}}
            @if($report->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $report->image) }}" alt="Report Image" class="img-fluid rounded" style="max-height: 400px;">
                </div>
            @endif

            {{-- Deskripsi --}}
            <p><strong>Deskripsi:</strong> {{ $report->description }}</p>

            {{-- Status --}}
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ $report->status === 'open' ? 'warning' : ($report->status === 'rejected' ? 'danger' : 'success') }}">
                    {{ ucfirst($report->status) }}
                </span>
            </p>

            {{-- Tombol untuk mengubah status --}}
            @if($report->status !== 'rejected')
                <form action="{{ route('reports.updateStatus', $report->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-{{ $report->status === 'open' ? 'success' : 'warning' }}">
                        {{ $report->status === 'open' ? 'Close Report' : 'Reopen Report' }}
                    </button>
                </form>
            @endif

            {{-- Room ID (opsional jika ada relasi rooms) --}}
            <p><strong>Room:</strong> {{ $report->room->name }}</p>
        </div>
    </div>

    {{-- Tampilkan jawaban hanya jika status bukan 'rejected' --}}
    @if($report->status !== 'rejected')
        <div class="card mb-4">
            <div class="card-header">
                <h5>Answers</h5>
            </div>
            <div class="card-body">
                @forelse($report->replies as $reply)
                    <div class="mb-4">
                        <div class="d-flex align-items-start">
                            <div class="me-3">
                                <img src="{{ asset('storage/photos/' . $reply->user->photo) }}" alt="{{ $reply->user->name }}" class="rounded-circle" width="90" height="90">
                            </div>
                            <div>
                                <p class="mb-1"><strong>{{ $reply->user->name }}</strong></p>
                                <p class="mb-1">{{ $reply->body }}</p>
                                <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        {{-- Nested replies --}}
                        @foreach($reply->replies as $child)
                            <div class="ms-5 mt-3">
                                <div class="d-flex align-items-start">
                                    <div class="me-3">
                                        <img src="{{ $child->user->avatar_url }}" alt="{{ $child->user->name }}" class="rounded-circle" width="30" height="30">
                                    </div>
                                    <div>
                                        <p class="mb-1"><strong>{{ $child->user->name }}</strong></p>
                                        <p class="mb-1">{{ $child->message }}</p>
                                        <small class="text-muted">{{ $child->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @empty
                    <p class="text-muted">No answers yet. Be the first to reply.</p>
                @endforelse
            </div>
        </div>
    @endif

    {{-- Form Jawaban --}}
    @if($report->status === 'open')
        <div class="card">
            <div class="card-header">
                <h5>Your Answer</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('reports.replies.store', $report->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="body" class="form-control" rows="4" placeholder="Write your reply here..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Reply</button>
                </form>
            </div>
        </div>
    @elseif($report->status === 'rejected')
        <div class="alert alert-danger mt-4">
            This report has been rejected. No further actions are allowed.
        </div>
    @else
        <div class="alert alert-warning mt-4">
            This report is closed. You cannot reply to it.
        </div>
    @endif

</div>
@endsection