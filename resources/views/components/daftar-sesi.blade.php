<!-- flash message -->
    @if (session()->has('message'))
        <div class="text-center p-4 mb-1 text-sm text-green-800-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('message') }}
        </div>
    @endif

<!-- Table responsive wrapper -->
<div class="overflow-x-auto p-6 lg:p-8 dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <!-- Search input -->
    <div class="relative m-[2px] mb-3 mr-5 float-left">
{{--        <a href="/create" wire:navigate class="text-right btn btn-md btn-success rounded shadow-sm">Buat Sesi Baru</a>--}}
        <a href="{{ route('sesi.create') }}" role="button" class="inline-block rounded bg-blue-500 text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] hover:bg-blue-600 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-blue-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">Buat Sesi</a>
    </div>

    <!-- Filter -->
    <div class="relative m-[2px] mb-3 float-right hidden sm:block">
        <label for="inputFilter" class="sr-only">Filter</label>
        <select id="inputFilter" class="block w-40 rounded-lg border dark:border-none dark:bg-gray-600 p-2 text-sm focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-400 dark:text-white">
            <option value="1" selected>Last week</option>
            <option value="2">Last month</option>
            <option value="3">Yesterday</option>
            <option value="4">Last 7 days</option>
            <option value="5">Last 30 days</option>
        </select>
    </div>

    <!-- Table -->
    <table class="min-w-full text-left text-sm whitespace-nowrap dark:text-white">

        <!-- Table head -->
        <thead class="uppercase tracking-wider border-b-2 dark:border-neutral-600">
        <tr>
            <th scope="col" class="px-6 py-4">
                No
            </th>
            <th scope="col" class="px-6 py-4">
                Tanggal
            </th>
            <th scope="col" class="px-6 py-4">
                Total Opening
            </th>
            <th scope="col" class="px-6 py-4">
                Total POS
            </th>
            <th scope="col" class="px-6 py-4">
                Opening Next Day
            </th>
            <th scope="col" class="px-6 py-4">
                Action
            </th>
        </tr>
        </thead>

        <!-- Table body -->
        <tbody>
        @forelse ($listsesi as $index => $sesi)
            <tr class="border-b dark:border-neutral-600">
                <th scope="row" class="px-6 py-2">{{ $index+1 }}</th>
                <td class="px-6 py-2">{{ $sesi->tanggal_sesi }}</td>
                <td class="px-6 py-2">{!! "Rp" . number_format($sesi->total_opening, 2, ",", ".") !!}</td>
                <td class="px-6 py-2">{!! "Rp" . number_format($sesi->total_pos, 2, ",", ".") !!}</td>
                <td class="px-6 py-2">{!! "Rp" . number_format($sesi->opening_next_day, 2, ",", ".") !!}</td>
                <td class="px-6 py-2">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('sesi.destroy', $sesi->id) }}" method="POST">
                        <a href="{{ route('sesi.edit', $sesi->id) }}" class="btn btn-sm btn-primary bi bi-search"></a>
{{--                        <a href="{{ route('sesi.destroy', $sesi->id) }}" class="btn btn-sm btn-danger bi bi-trash"></a>--}}
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                    </form>
{{--                    <button class="btn btn-sm btn-danger" wire:click="destroy({{ $sesi->id }})"><i class="bi bi-trash"></i></button>--}}
                </td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>
    @if($listsesi->isEmpty())
        <div class="text-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <strong>Data Sesi Kosong</strong> Buat Sesi Baru.
        </div>
    @endif
</div>
