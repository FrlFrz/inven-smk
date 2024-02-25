<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;
use App\Tables\JenisBarangs;
use ProtoneMedia\Splade\Components\Toast;
use ProtoneMedia\Splade\Facades\Toast as FacadesToast;
use ProtoneMedia\Splade\SpladeTable;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jenis_barang.index', [
            'jenis_barang' => JenisBarangs::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        JenisBarang::create([
            'nama_jenis'    => $request->nama_jenis,
            'kode_jenis'    => $request->kode_jenis,
            'keterangan'    => $request->keterangan,
        ]);

        FacadesToast::title('Data Saved!')->autoDismiss(3);
        return to_route('jenis_barang.index');
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
    public function edit(JenisBarang $jenis_barang)
    {

        return view('jenis_barang.edit', [
            'jenis_barang'  => $jenis_barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisBarang $jenis_barang)
    {
        $jenis_barang->update([
            'nama_jenis'      =>  $request->nama_jenis,
            'kode_jenis'     =>  $request->kode_jenis,
            'keterangan'    => $request->keterangan
        ]);

        FacadesToast::title('User Data Edited!')->autoDismiss(3);
        return to_route('jenis_barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisBarang $jenis_barang)
    {
        $jenis_barang->delete();

        FacadesToast::title('User Data Removed!')
            ->danger()
            ->autoDismiss(3);
        return to_route('jenis_barang.index');
    }
}
