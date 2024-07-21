<x-app-layout>
    <x-slot name="header">
        <h2 class="inline font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Sesi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-detail-sesi/>
            </div>
        </div>
    </div>
</x-app-layout>
