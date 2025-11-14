@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-user me-2"></i>Profile User
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $user->name) }}"
                                    required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                    required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h6 class="text-muted mb-3">Ubah Password (Opsional)</h6>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    name="password">
                                <div class="form-text">Kosongkan jika tidak ingin mengubah password</div>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password"
                                    class="form-control"
                                    id="password_confirmation"
                                    name="password_confirmation">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- User Info Card -->
        <div class="card mt-4">
            <div class="card-header">
                <h6 class="mb-0">Informasi Akun</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>Member Since:</strong><br>
                            <small class="text-muted">{{ $user->created_at->format('d F Y, H:i') }}</small>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>Last Updated:</strong><br>
                            <small class="text-muted">{{ $user->updated_at->format('d F Y, H:i') }}</small>
                        </p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>Email Verified:</strong><br>
                            @if($user->email_verified_at)
                            <span class="badge bg-success">
                                <i class="fas fa-check me-1"></i>Verified
                            </span>
                            <small class="text-muted d-block">{{ $user->email_verified_at->format('d F Y') }}</small>
                            @else
                            <span class="badge bg-warning">
                                <i class="fas fa-exclamation-triangle me-1"></i>Not Verified
                            </span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>User ID:</strong><br>
                            <code class="small">#{{ $user->id }}</code>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection