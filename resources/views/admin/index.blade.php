@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<!-- Welcome Header -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-1">Selamat datang, {{ Auth::user()->name }}!</h2>
                        <p class="mb-0 opacity-75">Kelola domain dan infrastruktur digital Kabupaten Purwakarta</p>
                    </div>
                    <div class="text-end">
                        <i class="fas fa-user-shield fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body text-center">
                <i class="fas fa-globe fa-3x mb-3"></i>
                <h4>{{ $domains->total() }}</h4>
                <p class="mb-0">Total Domain</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body text-center">
                <i class="fas fa-check-circle fa-3x mb-3"></i>
                <h4>{{ $domains->where('status', 'active')->count() }}</h4>
                <p class="mb-0">Domain Aktif</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <i class="fas fa-exclamation-triangle fa-3x mb-3"></i>
                <h4>{{ $domains->where('status', 'inactive')->count() }}</h4>
                <p class="mb-0">Domain Tidak Aktif</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-white">
            <div class="card-body text-center">
                <i class="fas fa-building fa-3x mb-3"></i>
                <h4>{{ $domains->groupBy('opd_id')->count() }}</h4>
                <p class="mb-0">Total OPD</p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('admin.upload') }}" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-upload me-2"></i>Upload CSV Data
                        </a>
                        <p class="text-muted small">Upload file CSV untuk import data domain</p>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('dashboard.index') }}" class="btn btn-info w-100 mb-2" target="_blank">
                            <i class="fas fa-chart-line me-2"></i>Lihat Dashboard Public
                        </a>
                        <p class="text-muted small">Buka dashboard public untuk melihat statistik</p>
                    </div>
                    <div class="col-md-4">
                        <a href="/create-admin" class="btn btn-secondary w-100 mb-2" target="_blank">
                            <i class="fas fa-user-plus me-2"></i>Create Admin User
                        </a>
                        <p class="text-muted small">Generate admin user untuk development</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Domain Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Domain</h5>
        <span class="badge bg-primary">Total: {{ $domains->total() }} domain</span>
    </div>
    <div class="card-body">
        @if($domains->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Domain</th>
                        <th>Subdomain</th>
                        <th>OPD</th>
                        <th>Status</th>
                        <th>IP Address</th>
                        <th>Source Type</th>
                        <th>Backup Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($domains as $index => $domain)
                    <tr>
                        <td>{{ $domains->firstItem() + $index }}</td>
                        <td>
                            <a href="http://{{ $domain->domain }}" target="_blank" class="text-decoration-none">
                                {{ $domain->domain }}
                                <i class="fas fa-external-link-alt fa-xs ms-1"></i>
                            </a>
                        </td>
                        <td>{{ $domain->subdomain ?? '-' }}</td>
                        <td>
                            <span class="badge bg-light text-dark">{{ $domain->opd->nama_opd ?? 'N/A' }}</span>
                        </td>
                        <td>
                            @if($domain->status == 'active' || $domain->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                            @else
                            <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <code class="small">{{ $domain->ip_address ?? 'N/A' }}</code>
                        </td>
                        <td>
                            <span class="badge {{ $domain->source_type == 'INDOGLOB' ? 'bg-primary' : 'bg-secondary' }}">
                                {{ $domain->source_type ?? 'LOCAL' }}
                            </span>
                        </td>
                        <td>{{ $domain->backup_date ?? '-' }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.domain.destroy', $domain) }}"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus domain ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $domains->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-database fa-3x text-muted mb-3"></i>
            <h5>Belum ada data domain</h5>
            <p class="text-muted">Silakan upload file CSV untuk menambahkan data domain</p>
            <a href="{{ route('admin.upload') }}" class="btn btn-primary">
                <i class="fas fa-upload me-2"></i>Upload Data
            </a>
        </div>
        @endif
    </div>
</div>
@endsection