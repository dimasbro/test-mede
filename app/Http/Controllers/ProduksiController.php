<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komoditas;
use App\Models\Produksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProduksiController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Produksi::select('produksi.id', 'produksi.komoditas_id', 'produksi.tanggal', 'produksi.jumlah', 'komoditas.komoditas_nama')
        ->leftjoin("komoditas",'komoditas.id','=','produksi.komoditas_id')
        ->orderBy('produksi.updated_at', 'DESC')
        ->get();

        return view('produksi.index', compact('data'));
    }

    public function create()
    {
        $komoditas = Komoditas::orderBy('komoditas_kode', 'asc')->get();

        return view('produksi.create', compact('komoditas'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'tanggal' => 'required|date',
                'komoditas' => 'required|numeric',
                'jumlah' => 'required|numeric',
            ]);

            $check = Produksi::where(['tanggal' => $request->tanggal, 'komoditas_id' => $request->komoditas])->first();
            if ($check) {
                return redirect(route('produksi.create'))->with('error', 'Duplicate tanggal dan komoditas')->withInput($request->input());
            }

            Produksi::create([
                'tanggal' => $request->tanggal,
                'komoditas_id' => $request->komoditas,
                'jumlah' => $request->jumlah,
            ]);

            return redirect(route('produksi.index'))->with('success', 'Save successfully');
        } catch (\RuntimeException $e) {
            return redirect(route('produksi.create'))->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $data = Produksi::find($id);
        $komoditas = Komoditas::orderBy('komoditas_kode', 'asc')->get();

        return view('produksi.show', compact('data', 'komoditas'));
    }

    public function edit($id)
    {
        $data = Produksi::find($id);
        $komoditas = Komoditas::orderBy('komoditas_kode', 'asc')->get();

        return view('produksi.edit', compact('data', 'komoditas'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'tanggal' => 'required|date',
                'komoditas' => 'required|numeric',
                'jumlah' => 'required|numeric',
            ]);

            $check = Produksi::where(['tanggal' => $request->tanggal, 'komoditas_id' => $request->komoditas])->where('id', '!=', $id)->first();
            if ($check) {
                return redirect(route('produksi.create'))->with('error', 'Duplicate tanggal dan komoditas')->withInput($request->input());
            }

            Produksi::find($id)->update([
                'tanggal' => $request->tanggal,
                'komoditas_id' => $request->komoditas,
                'jumlah' => $request->jumlah,
            ]);

            return redirect(route('produksi.index'))->with('success', 'Update successfully');
        } catch (\RuntimeException $e) {
            return redirect(route('produksi.edit', $id))->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Produksi::find($id)->delete();

            return redirect(route('produksi.index'))->with('success', 'Delete successfully');
        } catch (\RuntimeException $e) {
            return redirect(route('produksi.index'))->with('error', $e->getMessage());
        }
    }
}
