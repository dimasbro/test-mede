<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komoditas;
use App\Models\Produksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LaporanController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $requst)
    {
        $checkDate = Produksi::orderBy('tanggal', 'ASC')->first();
        $startYear = $checkDate ? date('Y', strtotime($checkDate->tanggal)) : date('Y');

        $data = [];
        for ($year = $startYear; $year <= date('Y'); $year++) {
            $komoditas = Komoditas::all();
            if ($requst->search) {
                $komoditas = Komoditas::where('komoditas_nama', 'like', '%'.$requst->search.'%')->get();
            }
            foreach ($komoditas as $komo) {
                for ($month = 1; $month <= 12; $month++) {
                    $total = Produksi::where('komoditas_id', $komo->id)->whereYear('tanggal', $year)->whereMonth('tanggal', $month)->sum('jumlah');
                    $data[$year][$komo->komoditas_nama.'='.$komo->id][] = $total;
                }
            }
        }

        return view('laporan.index', compact('data'));
    }

}
