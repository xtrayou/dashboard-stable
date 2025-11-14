@extends('layouts.admin')

@section('title', 'Upload Data CSV')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-upload me-2"></i>Upload Data CSV
                </h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <form method="POST" action="{{ route('admin.import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">Pilih File CSV/TXT</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror"
                            id="file" name="file" accept=".csv,.txt" required>
                        @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            File harus berformat CSV atau TXT dengan kolom: nama_opd, domain, subdomain, status, backup_date, completion_date, kecamatan, ip_address, source_type
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload"></i> Upload & Import Data
                        </button>
                    </div>
                </form>

                <!-- Sample format -->
                <div class="mt-4">
                    <h6>Format File Contoh:</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>nama_opd</th>
                                    <th>domain</th>
                                    <th>subdomain</th>
                                    <th>status</th>
                                    <th>backup_date</th>
                                    <th>completion_date</th>
                                    <th>kecamatan</th>
                                    <th>ip_address</th>
                                    <th>source_type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dinas Komunikasi dan Informatika</td>
                                    <td>diskominfo.purwakartakab.go.id</td>
                                    <td>portal</td>
                                    <td>aktif</td>
                                    <td>2024-01-15</td>
                                    <td>2024-01-20</td>
                                    <td>TEGALWARU</td>
                                    <td>216.244.94.195</td>
                                    <td>INDOGLOB</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection