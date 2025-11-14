<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Opd;
use App\Models\Domain;

class SampleDataSeeder extends Seeder
{
    public function run()
    {
        // Create sample OPD data
        $opds = [
            ['no_opd' => '001', 'nama_opd' => 'Dinas Komunikasi dan Informatika', 'kecamatan' => 'TEGALWARU'],
            ['no_opd' => '002', 'nama_opd' => 'Sekretariat Daerah', 'kecamatan' => 'TEGALWARU'],
            ['no_opd' => '003', 'nama_opd' => 'Dinas Pendidikan', 'kecamatan' => 'TEGALWARU'],
            ['no_opd' => '004', 'nama_opd' => 'Dinas Kesehatan', 'kecamatan' => 'TEGALWARU'],
            ['no_opd' => '005', 'nama_opd' => 'Dinas Pekerjaan Umum', 'kecamatan' => 'TEGALWARU'],
        ];

        foreach ($opds as $opdData) {
            $opd = Opd::create($opdData);

            // Sample IP addresses
            $ipAddresses = ['216.244.94.195', '216.244.94.164', '103.133.27.164', '103.133.26.212'];
            $sourceTypes = ['INDOGLOB', 'LOCAL'];

            // Create sample domains for each OPD
            $domains = [
                [
                    'opd_id' => $opd->id,
                    'domain_name' => strtolower(str_replace(' ', '', $opd->nama_opd)) . '.purwakartakab.go.id',
                    'subdomain' => 'www',
                    'status' => 'Aktif',
                    'backup_date' => now()->subDays(rand(1, 30)),
                    'completion_date' => now()->subDays(rand(1, 10)),
                    'ip_address' => $ipAddresses[array_rand($ipAddresses)],
                    'source_type' => $sourceTypes[array_rand($sourceTypes)]
                ],
                [
                    'opd_id' => $opd->id,
                    'domain_name' => 'portal.' . strtolower(str_replace(' ', '', $opd->nama_opd)) . '.purwakartakab.go.id',
                    'subdomain' => null,
                    'status' => rand(0, 1) ? 'Aktif' : 'Tidak Aktif',
                    'backup_date' => now()->subDays(rand(1, 30)),
                    'completion_date' => null,
                    'ip_address' => $ipAddresses[array_rand($ipAddresses)],
                    'source_type' => $sourceTypes[array_rand($sourceTypes)]
                ]
            ];

            foreach ($domains as $domainData) {
                Domain::create($domainData);
            }
        }
    }
}
