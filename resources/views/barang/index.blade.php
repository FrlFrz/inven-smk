@seoTitle(__('main.jenis'))

<x-dashboard-layout>
    {{-- Head --}}
    <div class="flex justify-between items-end mb-4">
        <div>
            <nav class="fi-breadcrumbs mb-2 hidden sm:block">
                <ul class="flex flex-wrap items-center gap-x-2">
                    <li class="flex gap-x-2">
                        <Link href="{{ route('dashboard.user.index') }}"
                            class="text-sm font-medium text-gray-500 outline-none transition duration-75 hover:text-gray-700 focus:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 dark:focus:text-gray-200">
                            Barang
                        </Link>
                    </li>
                    <li class="flex items-center gap-x-2">
                        <i class="fa-solid fa-chevron-right text-gray-400 dark:text-gray-500 text-xs rtl:rotate-180"></i>
                        <a href="#" class="text-sm font-medium text-gray-500 outline-none transition duration-75 hover:text-gray-700 focus:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 dark:focus:text-gray-200">
                            List
                        </a>
                    </li>
                </ul>
            </nav>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                Barang
            </h1>
        </div>
        <div>

                <x-btn-link href="#create">
                    Add New
                </x-btn-link>

        </div>
    </div>
    {{-- Create Modal --}}

        <x-splade-modal name="create">
            <x-splade-form :action="route('barang.store')" method="POST" class="space-y-4">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Barang
                </h3>

                <x-splade-input type="text" name="nama_barang" label="Nama Barang" required />

                <x-splade-file name="path_foto" label="Foto Barang" filepond preview accept="image/jpg, image/jpeg, image/png" max-size="5MB" />
                <x-splade-input type="text" name="kode_barang" label="Kode Barang" required />

                <x-splade-input type="text" name="kondisi_barang" label="Kondisi Barang" required />

                <x-splade-input type="number" name="jumlah_barang" label="Jumlah Barang" required />

                <x-splade-select name="id_jenis" label="Jenis Barang" :options="$jenis" relation choices required />
                <x-splade-select name="id_ruang" label="Ruang" :options="$ruang" relation choices required />

                <x-splade-textarea name="keterangan" label="Keterangan" required />

                {{-- Submit Button --}}
                <x-splade-submit :label="__('main.submit')" />
            </x-splade-form>
        </x-splade-modal>

    {{-- Content --}}
    <x-section-content>
        <x-splade-table :for="$barang">
            <x-splade-cell foto as="$barang">
                <img src="{{ asset('storage/' . $barang->path_foto) }}" class="rounded-md w-1/3" />
            </x-splade-cell>
            <x-splade-cell action as="$barang">
                {{-- Edit --}}
                {{-- @can('update users') --}}
                    <x-nav-link href="{{ route('barang.edit', $barang) }}">
                        Edit
                    </x-nav-link>
                {{-- @endcan --}}
                {{-- Delete --}}
                {{-- @can('delete users') --}}
                    <x-nav-link href="{{ route('barang.destroy', $barang) }}" method="DELETE" confirm="{{ __('main.confirm_delete_user') }}" confirm-text="{{ __('main.confirm_text_delete_user') }}" class="text-red-600 dark:text-red-600">
                        Delete
                    </x-nav-link>
                {{-- @endcan --}}
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
