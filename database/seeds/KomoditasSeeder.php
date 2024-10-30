<?php

use Illuminate\Database\Seeder;
use App\Models\Komoditas;

class KomoditasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kode' => 'K001',
                'nama' => 'Beras',
            ],
            [
                'kode' => 'K002',
                'nama' => 'Jagung',
            ],
            [
                'kode' => 'K003',
                'nama' => 'Gandum',
            ],
            [
                'kode' => 'K004',
                'nama' => 'Sagu',
            ],
            [
                'kode' => 'K005',
                'nama' => 'Bawang',
            ],
            [
                'kode' => 'K006',
                'nama' => 'Cabe',
            ],
        ];

        foreach ($data as $dt) {
            $check = Komoditas::where('komoditas_kode', $dt['kode'])->first();

            if (! $check) {
                Komoditas::create([
                    'komoditas_kode' => $dt['kode'],
                    'komoditas_nama' => $dt['nama'],
                ]);
            }
        }
    }
}
