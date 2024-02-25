@seoTitle(__('main.jenis'))

<x-dashboard-layout>
    {{-- Head --}}
    <div class="flex justify-between items-end mb-4">
        <div>
            <nav class="fi-breadcrumbs mb-2 hidden sm:block">
                <ul class="flex flex-wrap items-center gap-x-2">
                    <li class="flex gap-x-2">
                        <Link href="{{ route('jenis_barang.index') }}"
                            class="text-sm font-medium text-gray-500 outline-none transition duration-75 hover:text-gray-700 focus:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 dark:focus:text-gray-200">
                            Jenis
                        </Link>
                    </li>
                    <li class="flex items-center gap-x-2">
                        <i class="fa-solid fa-chevron-right text-gray-400 dark:text-gray-500 text-xs rtl:rotate-180"></i>
                        <a href="#" class="text-sm font-medium text-gray-500 outline-none transition duration-75 hover:text-gray-700 focus:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 dark:focus:text-gray-200">
                            Edit
                        </a>
                    </li>
                </ul>
            </nav>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('main.edit_profile_information')
            </h1>
        </div>
        <div>
        </div>
    </div>
    {{-- Content --}}
    <x-section-content>
        <x-splade-form :action="route('jenis_barang.update', $jenis_barang)" method="PUT" :default="$jenis_barang" class="space-y-4">

            <x-splade-input type="text" name="nama_jenis" label="Nama Jenis" required />
            <x-splade-input type="text" name="kode_jenis" label="Kode Jenis" required />
            <x-splade-input type="text" name="keterangan" label="Keterangan" required />

            {{-- Update Button --}}
            <x-splade-submit :label="__('main.save')" />
        </x-splade-form>
    </x-section-content>
</x-dashboard-layout>

