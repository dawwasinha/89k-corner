@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Details') }}</div>

                <div class="card-body">
                    <p><strong>{{ __('Name:') }}</strong> {{ $user->name }}</p>
                    <p><strong>{{ __('Email:') }}</strong> {{ $user->email }}</p>
                </div>

                <div class="card-footer">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection