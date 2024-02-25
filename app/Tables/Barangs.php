<?php

namespace App\Tables;

use App\Models\Barang;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Barangs extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Barang::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
        ->withGlobalSearch(columns: ['id', 'nama_barang', 'kode_barang'])
        ->column('id', sortable: true)
        ->column('nama_barang')
        ->column('foto')
        ->column('kondisi_barang')
        ->column('keterangan')
        ->column('jumlah_barang')
        ->column('id_jenis')
        ->column('id_ruang')
        ->column('kode_barang')
        ->column('keterangan')
        ->column('created_at')
        ->column('action')
        ->paginate(5);
    }
}
