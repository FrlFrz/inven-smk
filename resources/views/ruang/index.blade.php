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
                        Ruang
                        </Link>
                    </li>
                    <li class="flex items-center gap-x-2">
                        <i class="fa-solid fa-chevron-right text-gray-400 dark:text-gray-500 text-xs rtl:rotate-180"></i>
                        <a href="#"
                            class="text-sm font-medium text-gray-500 outline-none transition duration-75 hover:text-gray-700 focus:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 dark:focus:text-gray-200">
                            @lang('main.list')
                        </a>
                    </li>
                </ul>
            </nav>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                Ruang
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
        <x-splade-form :action="route('ruang.store')" method="POST" class="space-y-4">
            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                Ruangan
            </h3>

            <x-splade-input name="nama_ruang" label="Nama Ruang" required />
            <x-splade-input name="kode_ruang" label="Kode Ruang" required />
            <x-splade-input name="keterangan" label="Keterangan" required />

            {{-- Submit Button --}}
            <x-splade-submit :label="__('main.submit')" />
        </x-splade-form>
    </x-splade-modal>

    {{-- Content --}}
    <x-section-content>
        <x-splade-table :for="$ruang">
            <x-splade-cell action as="$ruang">
                {{-- Edit --}}
                {{-- @can('update users') --}}
                <x-nav-link href="{{ route('ruang.edit', $ruang) }}">
                    Edit
                </x-nav-link>
                {{-- @endcan --}}
                {{-- Delete --}}
                {{-- @can('delete users') --}}
                <x-nav-link href="{{ route('ruang.destroy', $ruang) }}" method="DELETE"
                    confirm="{{ __('main.confirm_delete_user') }}"
                    confirm-text="{{ __('main.confirm_text_delete_user') }}" class="text-red-600 dark:text-red-600">
                    Delete
                </x-nav-link>
                {{-- @endcan --}}
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
