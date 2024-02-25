<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use App\Tables\Barangs;
use App\Models\JenisBarang;
use App\Models\Ruang;

use ProtoneMedia\Splade\Components\Toast;
use ProtoneMedia\Splade\Facades\Toast as FacadesToast;
use ProtoneMedia\Splade\SpladeTable;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('barang.index', [
            'barang' => Barangs::class,
            'jenis' => JenisBarang::pluck('nama_jenis', 'id')->toArray(),
            'ruang' => Ruang::pluck('nama_ruang', 'id')->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Upload gambar
        $file = $request->file('path_foto');
        $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/storage/barang', $namaFile);

        Barang::create([
            'nama_barang'   => $request->nama_barang,
            'path_foto'     => 'storage/barang/' . $namaFile,
            'kondisi_barang'=> $request->kondisi_barang,
            'keterangan'    => $request->keterangan,
            'jumlah_barang' => $request->jumlah_barang,
            'id_jenis'      => $request->id_jenis,
            'id_ruang'      => $request->id_ruang,
            'kode_barang'   => $request->kode_barang,
        ]);

        FacadesToast::title('Data Saved!')->autoDismiss(3);
        return to_route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {

        return view('barang.edit', [
            'barang'  => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $barang->update([
            'nama_'      =>  $request->nama_,
            'kode_'     =>  $request->kode_,
            'keterangan'    => $request->keterangan
        ]);

        FacadesToast::title('User Data Edited!')->autoDismiss(3);
        return to_route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        FacadesToast::title('User Data Removed!')
            ->danger()
            ->autoDismiss(3);
        return to_route('barang.index');
    }
}
