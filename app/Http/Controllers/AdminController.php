<?php

namespace App\Http\Controllers;

use App\Imports\DomainsImport;
use App\Models\Domain;
use App\Models\Opd;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        // Middleware auth sudah diterapkan di routes
        // Tidak perlu menambahkan di constructor
    }

    /**
     * Display admin dashboard
     */
    public function index()
    {
        $domains = Domain::with('opd')->paginate(15);
        return view('admin.index', compact('domains'));
    }

    /**
     * Show upload form
     */
    public function upload()
    {
        return view('admin.upload');
    }

    /**
     * Import CSV file
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        try {
            $file = $request->file('file');
            $importer = new DomainsImport();
            $count = $importer->import($file->getPathname());

            return redirect()->back()->with('success', "Berhasil mengimport $count data!");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Delete domain
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
