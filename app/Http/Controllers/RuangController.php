<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use App\Tables\Ruangs;
use ProtoneMedia\Splade\Components\Toast;
use ProtoneMedia\Splade\Facades\Toast as FacadesToast;
use ProtoneMedia\Splade\SpladeTable;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ruang.index', [
            'ruang' => Ruangs::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Ruang::create([
            'nama_ruang'    => $request->nama_ruang,
            'kode_ruang'    => $request->kode_ruang,
            'keterangan'    => $request->keterangan,
        ]);

        FacadesToast::title('Data Saved!')->autoDismiss(3);
        return to_route('ruang.index');
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
    public function edit(Ruang $ruang)
    {
        return view('ruang.edit', [
            'ruang'  => $ruang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruang $ruang)
    {
        $ruang->update([
            'nama_ruang'      =>  $request->nama_ruang,
            'kode_ruang'     =>  $request->kode_ruang,
            'keterangan'    => $request->keterangan
        ]);

        FacadesToast::title('User Data Edited!')->autoDismiss(3);
        return to_route('ruang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruang $ruang)
    {
        $ruang->delete();

        FacadesToast::title('User Data Removed!')
            ->danger()
            ->autoDismiss(3);
        return to_route('ruang.index');
    }
}
