<!DOCTYPE html>
<!DOCTYPE html>

<html lang="id">
<html lang="id">

<head>

    <head>

        <meta charset="UTF-8">
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Dashboard - DISKOMINFO Purwakarta</title>
        <title>Dashboard - DISKOMINFO Purwakarta</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

        <style>
            :root {
                :root {

                    --primary-color: #2563eb;
                    --primary-color: #2563eb;

                    --secondary-color: #1e40af;
                    --secondary-color: #1e40af;

                    --success-color: #059669;
                    --success-color: #059669;

                    --danger-color: #dc2626;
                    --danger-color: #dc2626;

                }
            }



            body {
                body {

                    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);

                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

                }
            }



            .navbar {
                .navbar {

                    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
                    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);

                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);

                }
            }



            .card {
                .card {

                    border: none;
                    border: none;

                    border-radius: 15px;
                    border-radius: 15px;

                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);

                    margin-bottom: 2rem;
                    margin-bottom: 2rem;

                    transition: transform 0.3s ease;
                    transition: transform 0.3s ease;

                }
            }



            .card:hover {
                .card:hover {

                    transform: translateY(-2px);
                    transform: translateY(-2px);

                }
            }



            .stat-card {
                .stat-card {

                    text-align: center;
                    text-align: center;

                    padding: 2rem;
                    padding: 2rem;

                    color: white;
                    color: white;

                }
            }



            .stat-number {
                .stat-number {

                    font-size: 3rem;
                    font-size: 3rem;

                    font-weight: bold;
                    font-weight: bold;

                    margin-bottom: 0.5rem;
                    margin-bottom: 0.5rem;

                }
            }
        </style>
        </style>

    </head>
</head>

<body>

    <body>

        <!-- Navigation --> <!-- Navigation -->

        <nav class="navbar navbar-expand-lg navbar-dark">
            <nav class="navbar navbar-expand-lg navbar-dark">

                <div class="container">
                    <div class="container">

                        <a class="navbar-brand fw-bold" href="{{ route('dashboard.index') }}"> <a class="navbar-brand fw-bold" href="{{ route('dashboard.index') }}">

                                <i class="fas fa-tachometer-alt me-2"></i> <i class="fas fa-tachometer-alt me-2"></i>

                                Dashboard DISKOMINFO Dashboard DISKOMINFO

                            </a> </a>



                        <div class="navbar-nav ms-auto">
                            <div class="navbar-nav ms-auto">

                                <a class="nav-link" href="{{ url('/') }}"> <a class="nav-link" href="{{ url('/') }}">

                                        <i class="fas fa-home me-1"></i>Home <i class="fas fa-home me-1"></i>Home

                                    </a> </a>

                                <a class="nav-link" href="{{ route('login') }}"> <a class="nav-link" href="{{ route('login') }}">

                                        <i class="fas fa-user-shield me-1"></i>Admin Login <i class="fas fa-user-shield me-1"></i>Admin Login

                                    </a> </a>

                            </div>
                        </div>

                    </div>
                </div>

            </nav>
        </nav>



        <!-- Main Content --> <!-- Main Content -->

        <div class="container-fluid py-4">
            <div class="container-fluid py-4">

                <!-- Page Header --> <!-- Page Header -->

                <div class="text-center mb-5">
                    <div class="text-center mb-5">

                        <h1 class="display-4 text-primary fw-bold mb-2">Dashboard Monitoring</h1>
                        <h1 class="display-4 text-primary fw-bold mb-2">Dashboard Monitoring</h1>

                        <p class="lead text-muted">Kabupaten Purwakarta - Dinas Komunikasi dan Informatika</p>
                        <p class="lead text-muted">Kabupaten Purwakarta - Dinas Komunikasi dan Informatika</p>

                    </div>
                </div>



                <!-- Statistics Cards --> <!-- Statistics Cards -->

                <div class="row mb-5">
                    <div class="row mb-5">

                        <div class="col-md-3">
                            <div class="col-md-3">

                                <div class="card stat-card bg-primary text-white">
                                    <div class="card stat-card bg-primary text-white">

                                        <i class="fas fa-building fa-3x mb-3"></i> <i class="fas fa-building fa-3x mb-3"></i>

                                        <div class="stat-number">{{ $totalOpds }}</div>
                                        <div class="stat-number">{{ $totalOpds }}</div>

                                        <h5>Total OPD</h5>
                                        <h5>Total OPD</h5>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="col-md-3">

                                <div class="card stat-card bg-success text-white">
                                    <div class="card stat-card bg-success text-white">

                                        <i class="fas fa-globe fa-3x mb-3"></i> <i class="fas fa-globe fa-3x mb-3"></i>

                                        <div class="stat-number">{{ $totalDomains }}</div>
                                        <div class="stat-number">{{ $totalDomains }}</div>

                                        <h5>Total Domain</h5>
                                        <h5>Total Domain</h5>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="col-md-3">

                                <div class="card stat-card bg-info text-white">
                                    <div class="card stat-card bg-info text-white">

                                        <i class="fas fa-check-circle fa-3x mb-3"></i> <i class="fas fa-check-circle fa-3x mb-3"></i>

                                        <div class="stat-number">{{ $activeDomains }}</div>
                                        <div class="stat-number">{{ $activeDomains }}</div>

                                        <h5>Domain Aktif</h5>
                                        <h5>Domain Aktif</h5>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="col-md-3">

                                <div class="card stat-card bg-warning text-white">
                                    <div class="card stat-card bg-warning text-white">

                                        <i class="fas fa-exclamation-triangle fa-3x mb-3"></i> <i class="fas fa-exclamation-triangle fa-3x mb-3"></i>

                                        <div class="stat-number">{{ $inactiveDomains }}</div>
                                        <div class="stat-number">{{ $inactiveDomains }}</div>

                                        <h5>Domain Tidak Aktif</h5>
                                        <h5>Domain Tidak Aktif</h5>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>



                <!-- OPD Table --> <!-- OPD Table -->

                <div class="card">
                    <div class="card">

                        <div class="card-header bg-primary text-white">
                            <div class="card-header bg-primary text-white">

                                <h5 class="mb-0">
                                    <h5 class="mb-0">

                                        <i class="fas fa-list me-2"></i>Data OPD dan Domain <i class="fas fa-list me-2"></i>Data OPD dan Domain

                                    </h5>
                                </h5>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card-body">

                                @if($opds->count() > 0) @if($opds->count() > 0)

                                <div class="table-responsive">
                                    <div class="table-responsive">

                                        <table class="table table-hover">
                                            <table class="table table-hover">

                                                <thead>
                                                    <thead>

                                                        <tr>
                                                        <tr>

                                                            <th>#</th>
                                                            <th>#</th>

                                                            <th>Nama OPD</th>
                                                            <th>Nama OPD</th>

                                                            <th>Kecamatan</th>
                                                            <th>Kecamatan</th>

                                                            <th>Jumlah Domain</th>
                                                            <th>Jumlah Domain</th>

                                                            <th>Status</th>
                                                            <th>Status</th>

                                                        </tr>
                                                        </tr>

                                                    </thead>
                                                </thead>

                                                <tbody>
                                                <tbody>

                                                    @foreach($opds as $index => $opd) @foreach($opds as $index => $opd)

                                                    <tr>
                                                    <tr>

                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $index + 1 }}</td>

                                                        <td><strong>{{ $opd->nama_opd }}</strong></td>
                                                        <td><strong>{{ $opd->nama_opd }}</strong></td>

                                                        <td>
                                                        <td>

                                                            <span class="badge bg-info">{{ $opd->kecamatan ?? 'N/A' }}</span> <span class="badge bg-info">{{ $opd->kecamatan ?? 'N/A' }}</span>

                                                        </td>
                                                        </td>

                                                        <td>
                                                        <td>

                                                            <span class="badge bg-primary">{{ $opd->domains_count }} domain</span> <span class="badge bg-primary">{{ $opd->domains_count }} domain</span>

                                                        </td>
                                                        </td>

                                                        <td>
                                                        <td>

                                                            @if($opd->domains_count > 0) @if($opd->domains_count > 0)

                                                            <span class="badge bg-success"> <span class="badge bg-success">

                                                                    <i class="fas fa-check me-1"></i>Aktif <i class="fas fa-check me-1"></i>Aktif

                                                                </span> </span>

                                                            @else @else

                                                            <span class="badge bg-secondary"> <span class="badge bg-secondary">

                                                                    <i class="fas fa-minus me-1"></i>Tidak Ada Domain <i class="fas fa-minus me-1"></i>Tidak Ada Domain

                                                                </span> </span>

                                                            @endif @endif

                                                        </td>
                                                        </td>

                                                    </tr>
                                                    </tr>

                                                    @endforeach @endforeach

                                                </tbody>
                                                </tbody>

                                            </table>
                                        </table>

                                    </div>
                                </div>

                                @else @else

                                <div class="text-center py-5">
                                    <div class="text-center py-5">

                                        <i class="fas fa-database fa-3x text-muted mb-3"></i> <i class="fas fa-database fa-3x text-muted mb-3"></i>

                                        <h5>Belum ada data OPD</h5>
                                        <h5>Belum ada data OPD</h5>

                                        <p class="text-muted">Silakan hubungi administrator untuk menambahkan data</p>
                                        <p class="text-muted">Silakan hubungi administrator untuk menambahkan data</p>

                                    </div>
                                </div>

                                @endif @endif

                            </div>
                        </div>

                    </div>
                </div>



                <!-- Recent Domains --> <!-- Recent Domains -->

                @if($domains->count() > 0) @if($domains->count() > 0)

                <div class="card mt-4">
                    <div class="card mt-4">

                        <div class="card-header bg-info text-white">
                            <div class="card-header bg-info text-white">

                                <h5 class="mb-0">
                                    <h5 class="mb-0">

                                        <i class="fas fa-clock me-2"></i>Domain Terbaru <i class="fas fa-clock me-2"></i>Domain Terbaru

                                    </h5>
                                </h5>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <div class="table-responsive">

                                        <table class="table table-hover">
                                            <table class="table table-hover">

                                                <thead>
                                                    <thead>

                                                        <tr>
                                                        <tr>

                                                            <th>Domain</th>
                                                            <th>Domain</th>

                                                            <th>OPD</th>
                                                            <th>OPD</th>

                                                            <th>Status</th>
                                                            <th>Status</th>

                                                            <th>IP Address</th>
                                                            <th>IP Address</th>

                                                            <th>Tanggal Backup</th>
                                                            <th>Tanggal Backup</th>

                                                        </tr>
                                                        </tr>

                                                    </thead>
                                                </thead>

                                                <tbody>
                                                <tbody>

                                                    @foreach($domains->take(10) as $domain) @foreach($domains->take(10) as $domain)

                                                    <tr>
                                                    <tr>

                                                        <td>
                                                        <td>

                                                            <a href="http://{{ $domain->domain_name }}" target="_blank" class="text-decoration-none"> <a href="http://{{ $domain->domain_name }}" target="_blank" class="text-decoration-none">

                                                                    {{ $domain->domain_name }} {{ $domain->domain_name }}

                                                                    <i class="fas fa-external-link-alt fa-xs ms-1"></i> <i class="fas fa-external-link-alt fa-xs ms-1"></i>

                                                                </a> </a>

                                                        </td>
                                                        </td>

                                                        <td>{{ $domain->opd->nama_opd ?? 'N/A' }}</td>
                                                        <td>{{ $domain->opd->nama_opd ?? 'N/A' }}</td>

                                                        <td>
                                                        <td>

                                                            @if($domain->status == 'active' || $domain->status == 'Aktif') @if($domain->status == 'active' || $domain->status == 'Aktif')

                                                            <span class="badge bg-success">Aktif</span> <span class="badge bg-success">Aktif</span>

                                                            @else @else

                                                            <span class="badge bg-danger">Tidak Aktif</span> <span class="badge bg-danger">Tidak Aktif</span>

                                                            @endif @endif

                                                        </td>
                                                        </td>

                                                        <td>
                                                        <td>

                                                            <code class="small">{{ $domain->ip_address ?? 'N/A' }}</code> <code class="small">{{ $domain->ip_address ?? 'N/A' }}</code>

                                                        </td>
                                                        </td>

                                                        <td>{{ $domain->backup_date ?? '-' }}</td>
                                                        <td>{{ $domain->backup_date ?? '-' }}</td>

                                                    </tr>
                                                    </tr>

                                                    @endforeach @endforeach

                                                </tbody>
                                                </tbody>

                                            </table>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                @endif @endif

            </div>
        </div>



        <!-- Footer --> <!-- Footer -->

        <footer class="text-center py-4 mt-5">
            <footer class="text-center py-4 mt-5">

                <div class="container">
                    <div class="container">

                        <p class="text-muted mb-0">
                        <p class="text-muted mb-0">

                            &copy; {{ date('Y') }} DISKOMINFO Kabupaten Purwakarta. All rights reserved. &copy; {{ date('Y') }} DISKOMINFO Kabupaten Purwakarta. All rights reserved.

                        </p>
                        </p>

                    </div>
                </div>

            </footer>
        </footer>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</body>

</html>

</html>
</div>

{{-- Statistik Cards --}}
<div class="row mb-4">
    <div class="col-md-2">
        <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <h6>NAMA OPD</h6>
                <h2 id="namaOpdCount">-</h2>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card bg-danger text-white">
            <div class="card-body text-center">
                <h6>DOMAIN</h6>
                <h2 id="domainCount">-</h2>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card bg-success text-white">
            <div class="card-body text-center">
                <h6>SUBDOMAIN AKTIF</h6>
                <h2 id="subdomainAktif">-</h2>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <h6>PERLU BACKUP</h6>
                <h2 id="perluBackup">-</h2>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card bg-danger text-white">
            <div class="card-body text-center">
                <h6>PERLU PERPANJANGAN</h6>
                <h2 id="perluPerpanjangan">-</h2>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card bg-secondary text-white">
            <div class="card-body text-center">
                <h6>SUBDOMAIN TIDAK AKTIF</h6>
                <h2 id="subdomainTidakAktif">-</h2>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-2">
        <div class="card bg-info text-white">
            <div class="card-body text-center">
                <h6>SELESAI BACKUP</h6>
                <h2 id="selesaiBackup">-</h2>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <select class="form-select" id="namaOpdFilter">
                    <option value="">NAMA OPD</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card">
            <div class="card-body text-center">
                <select class="form-select" id="domainFilter">
                    <option value="">DOMAIN</option>
                </select>
            </div>
        </div>
    </div>
</div>

{{-- Charts & Data Section --}}
<div class="row">
    {{-- Left Column - Charts --}}
    <div class="col-md-8">
        {{-- Status Domain Chart --}}
        <div class="card mb-4">
            <div class="card-header">
                <h6>Status Domain Berdasarkan Nama OPD</h6>
            </div>
            <div class="card-body">
                <canvas id="statusDomainChart" height="100"></canvas>
            </div>
        </div>

        {{-- Progress Backup Chart --}}
        <div class="card mb-4">
            <div class="card-header">
                <h6>Progress</h6>
            </div>
            <div class="card-body">
                <canvas id="progressChart" height="80"></canvas>
            </div>
        </div>

        {{-- Kecamatan Tegalwaru Section --}}
        <div class="card">
            <div class="card-header bg-light">
                <h6>KECAMATAN TEGALWARU</h6>
            </div>
            <div class="card-body">
                <p class="mb-2">Domain yang terhitung</p>
                <table class="table table-sm table-striped" id="kecamatanTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>DOMAIN</th>
                            <th>Record Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Data will be loaded here --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Right Column - Pie Charts --}}
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <canvas id="pieChart1"></canvas>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h6>Status Domain Berdasarkan...</h6>
            </div>
            <div class="card-body">
                <canvas id="pieChart2"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- Data Table --}}
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6>Data OPD</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="opdTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>OPD_NAME</th>
                                <th>DOMAIN_N</th>
                                <th>PRO18...</th>
                                <th>SELESAI_B...</th>
                                <th>PRO19_PERN...</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Data will be loaded here --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Google Sheets Configuration
    const SPREADSHEET_ID = 'YOUR_SPREADSHEET_ID'; // Ganti dengan ID Google Sheets Anda
    const API_KEY = 'YOUR_API_KEY'; // Ganti dengan API Key Anda
    const SHEET_NAME = 'Sheet1'; // Ganti dengan nama sheet Anda

    let charts = {};

    // Fetch data from Laravel API (fallback) or Google Sheets
    async function fetchSheetData() {
        try {
            // Opsi 1: Fetch dari Google Sheets (jika API_KEY dan SPREADSHEET_ID tersedia)
            if (SPREADSHEET_ID !== 'YOUR_SPREADSHEET_ID' && API_KEY !== 'YOUR_API_KEY') {
                const url = `https://sheets.googleapis.com/v4/spreadsheets/${SPREADSHEET_ID}/values/${SHEET_NAME}?key=${API_KEY}`;
                const response = await fetch(url);
                const data = await response.json();
                return data.values;
            } else {
                // Opsi 2: Fetch dari Laravel API sebagai fallback
                const response = await fetch('{{ route("dashboard.data") }}');
                const data = await response.json();
                return data;
            }
        } catch (error) {
            console.error('Error fetching data:', error);
            // Fallback ke Laravel API jika Google Sheets gagal
            try {
                const response = await fetch('{{ route("dashboard.data") }}');
                const data = await response.json();
                return data;
            } catch (fallbackError) {
                console.error('Fallback error:', fallbackError);
                return [];
            }
        }
    }

    // Update dashboard with data
    async function updateDashboard() {
        const data = await fetchSheetData();

        if (data.length > 0) {
            // Process data here
            updateStatistics(data);
            updateCharts(data);
            updateTables(data);
        }
    }

    function updateStatistics(data) {
        // Update statistik cards
        if (data.statistics) {
            document.getElementById('namaOpdCount').textContent = data.statistics.namaOpdCount || '-';
            document.getElementById('domainCount').textContent = data.statistics.domainCount || '-';
            document.getElementById('subdomainAktif').textContent = data.statistics.subdomainAktif || '-';
            document.getElementById('subdomainTidakAktif').textContent = data.statistics.subdomainTidakAktif || '-';
            document.getElementById('perluBackup').textContent = data.statistics.perluBackup || '-';
            document.getElementById('selesaiBackup').textContent = data.statistics.selesaiBackup || '-';
            document.getElementById('perluPerpanjangan').textContent = data.statistics.perluPerpanjangan || '-';
        }

        // Update filter options
        if (data.data) {
            const namaOpdFilter = document.getElementById('namaOpdFilter');
            const domainFilter = document.getElementById('domainFilter');

            namaOpdFilter.innerHTML = '<option value="">NAMA OPD</option>';
            domainFilter.innerHTML = '<option value="">DOMAIN</option>';

            data.data.forEach(item => {
                if (item.nama_opd) {
                    namaOpdFilter.innerHTML += `<option value="${item.nama_opd}">${item.nama_opd}</option>`;
                }
            });
        }
    }

    function updateCharts(data) {
        // Initialize/Update Chart.js charts

        // Status Domain Chart
        const ctx1 = document.getElementById('statusDomainChart');
        if (charts.statusDomain) charts.statusDomain.destroy();
        charts.statusDomain = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: [], // Fill from data
                datasets: [{
                    label: 'Aktif',
                    data: [],
                    backgroundColor: 'rgba(40, 167, 69, 0.8)'
                }, {
                    label: 'Tidak Aktif',
                    data: [],
                    backgroundColor: 'rgba(220, 53, 69, 0.8)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true
            }
        });

        // Progress Chart
        const ctx2 = document.getElementById('progressChart');
        if (charts.progress) charts.progress.destroy();
        charts.progress = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Perlu Backup',
                    data: [],
                    borderColor: 'rgb(255, 193, 7)',
                    tension: 0.1
                }, {
                    label: 'Selesai Backup',
                    data: [],
                    borderColor: 'rgb(40, 167, 69)',
                    tension: 0.1
                }, {
                    label: 'Perlu Perpanjangan',
                    data: [],
                    borderColor: 'rgb(220, 53, 69)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true
            }
        });

        // Pie Charts
        const ctx3 = document.getElementById('pieChart1');
        if (charts.pie1) charts.pie1.destroy();
        charts.pie1 = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: ['Aktif', 'Tidak Aktif'],
                datasets: [{
                    data: [],
                    backgroundColor: ['rgb(0, 123, 255)', 'rgb(255, 193, 7)']
                }]
            }
        });

        const ctx4 = document.getElementById('pieChart2');
        if (charts.pie2) charts.pie2.destroy();
        charts.pie2 = new Chart(ctx4, {
            type: 'pie',
            data: {
                labels: [],
                datasets: [{
                    data: [],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 153)',
                        'rgb(255, 159, 64)'
                    ]
                }]
            }
        });
    }

    function updateTables(data) {
        // Update kecamatan table
        const kecamatanTable = document.getElementById('kecamatanTable').getElementsByTagName('tbody')[0];
        kecamatanTable.innerHTML = '';

        if (data.data) {
            data.data.forEach((item, index) => {
                const row = kecamatanTable.insertRow();
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.nama_opd || '-'}</td>
                    <td>${item.domain_count || 0}</td>
                `;
            });
        }

        // Update OPD table
        const opdTable = document.getElementById('opdTable').getElementsByTagName('tbody')[0];
        opdTable.innerHTML = '';

        if (data.data) {
            data.data.forEach((item, index) => {
                const row = opdTable.insertRow();
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.nama_opd || '-'}</td>
                    <td>${item.domain_count || 0}</td>
                    <td>${item.perlu_backup || 0}</td>
                    <td>${item.selesai_backup || 0}</td>
                    <td>${item.perlu_perpanjangan || 0}</td>
                `;
            });
        }
    }

    // Refresh button
    document.getElementById('refreshBtn').addEventListener('click', function() {
        this.disabled = true;
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';

        updateDashboard().then(() => {
            this.disabled = false;
            this.innerHTML = '<i class="fas fa-sync-alt"></i> Refresh Data';
        });
    });

    // Initial load
    updateDashboard();

    // Auto refresh every 5 minutes
    setInterval(updateDashboard, 300000);
</script>
@endpush
@endsection