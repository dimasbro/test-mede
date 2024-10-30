<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komoditas;
use App\Models\Produksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KomoditasController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Komoditas::select('id', 'komoditas_kode', 'komoditas_nama')
        ->orderBy('komoditas_kode', 'DESC')
        ->get();

        return view('komoditas.index', compact('data'));
    }

    public function create()
    {
        return view('komoditas.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|min:3|max:30|unique:komoditas,komoditas_nama',
            ]);

            $noUrutAkhir = Komoditas::orderBy('id', 'desc')->first();
            $nilai = $noUrutAkhir ? substr($noUrutAkhir->komoditas_kode, 1) : '';

            $no = 1;
            if($nilai) {
                $nilai++;
                $kode = sprintf("%03s", $nilai);
            } else {
                $kode = sprintf("%03s", $no);
            }

            Komoditas::create([
                'komoditas_kode' => 'K'.$kode,
                'komoditas_nama' => $request->nama,
            ]);

            return redirect(route('komoditas.index'))->with('success', 'Save successfully');
        } catch (\RuntimeException $e) {
            return redirect(route('komoditas.create'))->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $data = Komoditas::find($id);

        return view('komoditas.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Komoditas::find($id);

        return view('komoditas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|min:3|max:30|unique:komoditas,komoditas_nama,'.$id.',id',
            ]);

            Komoditas::find($id)->update(['komoditas_nama' => $request->nama]);

            return redirect(route('komoditas.index'))->with('success', 'Update successfully');
        } catch (\RuntimeException $e) {
            return redirect(route('komoditas.edit', $id))->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $check = Produksi::where('komoditas_id', $id)->first();
            if ($check) {
                return redirect(route('komoditas.index'))->with('error', 'Available relation produksi');
            }

            Komoditas::find($id)->delete();

            return redirect(route('komoditas.index'))->with('success', 'Delete successfully');
        } catch (\RuntimeException $e) {
            return redirect(route('komoditas.index'))->with('error', $e->getMessage());
        }
    }
}
