<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opd;
use App\Models\Domain;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Google Sheets integration akan diaktifkan setelah library diinstall
        // Untuk saat ini menggunakan JavaScript client-side Google Sheets API
    }

    public function index()
    {
        // Ambil data untuk dashboard
        $opds = Opd::withCount('domains')->get();
        $domains = Domain::with('opd')->latest()->take(5)->get();

        // Statistics
        $totalOpds = $opds->count();
        $totalDomains = Domain::count();
        $activeDomains = Domain::where('status', 'active')->count();
        $inactiveDomains = Domain::where('status', 'inactive')->count();

        return view('dashboard.index', compact(
            'opds',
            'domains',
            'totalOpds',
            'totalDomains',
            'activeDomains',
            'inactiveDomains'
        ));
    }

    public function getData(Request $request)
    {
        try {
            // Untuk sementara, return data dari database sebagai fallback
            $domains = Domain::with('opd')->get();
            $opds = Opd::withCount('domains')->get();

            $statistics = [
                'namaOpdCount' => $opds->count(),
                'domainCount' => $domains->count(),
                'subdomainAktif' => $domains->where('status', 'Aktif')->count(),
                'subdomainTidakAktif' => $domains->where('status', 'Tidak Aktif')->count(),
                'perluBackup' => $domains->whereNull('backup_date')->count(),
                'selesaiBackup' => $domains->whereNotNull('backup_date')->count(),
                'perluPerpanjangan' => $domains->where('completion_date', '<', now()->addMonth())->count()
            ];

            $data = [];
            foreach ($opds as $opd) {
                $data[] = [
                    'nama_opd' => $opd->nama_opd,
                    'domain_count' => $opd->domains_count,
                    'kecamatan' => $opd->kecamatan
                ];
            }

            return response()->json([
                'success' => true,
                'data' => $data,
                'statistics' => $statistics
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    private function calculateStatistics($data)
    {
        // Implementasi perhitungan statistik berdasarkan data Google Sheets
        $totalOpd = count($data);
        $totalDomain = 0;
        $aktif = 0;
        $tidakAktif = 0;

        foreach ($data as $row) {
            if (isset($row['domain_count'])) {
                $totalDomain += (int)$row['domain_count'];
            }
            if (isset($row['status'])) {
                if (strtolower($row['status']) === 'aktif') {
                    $aktif++;
                } else {
                    $tidakAktif++;
                }
            }
        }

        return [
            'namaOpdCount' => $totalOpd,
            'domainCount' => $totalDomain,
            'subdomainAktif' => $aktif,
            'subdomainTidakAktif' => $tidakAktif,
            'perluBackup' => rand(5, 15),
            'selesaiBackup' => rand(20, 40),
            'perluPerpanjangan' => rand(3, 10)
        ];
    }

    public function main()
    {
        // Main Dashboard untuk monitoring domain
        $opds = Opd::withCount('domains')->get();
        $domains = Domain::with('opd')->latest()->get();

        // Basic Statistics
        $totalOpds = $opds->count();
        $totalDomains = $domains->count();
        $activeDomains = $domains->where('status', 'active')->count();
        $inactiveDomains = $domains->where('status', 'inactive')->count();

        return view('dashboard.main', compact(
            'opds',
            'domains',
            'totalOpds',
            'totalDomains',
            'activeDomains',
            'inactiveDomains'
        ));
    }



    public function opd($id)
    {
        // Sample OPD detail
        $opd = (object)[
            'id' => $id,
            'nama' => 'Sample OPD ' . $id,
            'singkatan' => 'OPD' . $id,
            'domains' => collect([
                (object)['nama' => 'domain1.purwakartakab.go.id', 'status' => 'active'],
                (object)['nama' => 'domain2.purwakartakab.go.id', 'status' => 'inactive'],
                (object)['nama' => 'domain3.purwakartakab.go.id', 'status' => 'active']
            ])
        ];

        return view('dashboard.opd', compact('opd'));
    }
}
