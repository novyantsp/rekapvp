<div class="overflow-x-auto p-6 lg:p-8 dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

<h1 class="text-center display-5 fw-bold text-body-emphasis mb-3">Sesi </h1>
    <form action="" method="PUT" class="row gy-2 gx-3 align-items-center">
        <div class="col-6">
            <label for="tanggal_sesi" class="form-label">Tanggal Session</label>
            <input type="date" name="tanggal_sesi" class="form-control" id="tanggal_sesi" placeholder="Tanggal Sesi" disabled>
        </div>
        <div class="col-6">
            <label for="total_opening" class="form-label" id="default">Total Opening</label>
            <div class="input-group">
                <div class="input-group-text">Rp</div>
                <input type="text" name="total_opening" class="form-control total_opening" id="total_opening" data-a-sign="" data-a-dec="," data-a-sep="." placeholder="Total Opening">
            </div>
        </div>

        <hr class="hr mb-3" />

        <p class="text-center lead mb-6">Transaksi Uang Masuk & Keluar.</p>
        <form action="" method="POST" class="row gy-2 gx-3 align-items-center mb-3">
            <div class="col">
                <label for="autoSizingInput" class="form-label">Jenis</label>
                <select class="form-select" wire:model="jenis_transaksi" aria-label="Default select example" required>
                    <option selected>Pilih Jenis Transaksi</option>
                    <option value="1">Uang Keluar</option>
                    <option value="2">Uang Masuk</option>
                    <option value="3">QR/Bank</option>
                </select>
            </div>
            <div class="col">
                <label for="nominal_transaksi" class="form-label" id="default">Nominal</label>
                <div class="input-group">
                    <div class="input-group-text">Rp</div>
                    <input type="text" wire:model="nominal_transaksi" class="form-control nominal_transaksi" id="nominal_transaksi" data-a-sign="" data-a-dec="," data-a-sep="." placeholder="Nominal Transaksi" >
                </div>
            </div>
            <div class="col">
                <label for="keterangan_transaksi" class="form-label">Keterangan</label>
                <div class="input-group">
                    <input type="text" wire:model="keterangan_transaksi" class="form-control" id="keterangan_transaksi" placeholder="Keterangan Transaksi">
                </div>
            </div>
            <div>
                <button type="submit" class="float-right btn btn-primary mb-3">Tambah Transaksi</button>
            </div>
        </form>
            <div class="row">
                @error('jenis_transaksi')
                <div class="alert alert-danger mt-2 alert-dismissible">
                    {{ $message }}
                </div>
                @enderror
                @error('nominal_transaksi')
                <div class="alert alert-danger mt-2 alert-dismissible">
                    {{ $message }}
                </div>
                @enderror
                @error('keterangan_transaksi')
                <div class="alert alert-danger mt-2 alert-dismissible">
                    {{ $message }}
                </div>
                @enderror
            </div>

        <hr class="hr mb-3" />
        <!-- flash message -->
        @if (session()->has('message'))
            <div class="text-center p-4 mb-1 text-sm text-green-800-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <!-- Table responsive wrapper -->
         <!-- Table -->
            <table class="min-w-full text-left text-sm whitespace-nowrap dark:text-white">

                <!-- Table head -->
                <thead class="uppercase tracking-wider border-b-2 dark:border-neutral-600">
                <tr>
                    <th scope="col" class="px-6 py-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Jenis Transaksi
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Nominal Transaksi
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Action
                    </th>
                </tr>
                </thead>

                <!-- Table body -->
                <tbody>
{{--                @forelse ($listsesi as $index => $sesi)--}}
                    <tr class="border-b dark:border-neutral-600">
                        <th scope="row" class="px-6 py-2">{{ '$index+1' }}</th>
                        <td class="px-6 py-2">{{ '$sesi->tanggal_sesi' }}</td>
                        <td class="px-6 py-2">{!! "Rp" . number_format(10000, 2, ",", ".") !!}</td>
                        <td class="px-6 py-2">{!! "Rp" . number_format(10000, 2, ",", ".") !!}</td>
                        <td class="px-6 py-2">
{{--                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('sesi.destroy', $sesi->id) }}" method="POST">--}}
{{--                                <a href="{{ route('sesi.edit', $sesi->id) }}" class="btn btn-sm btn-primary bi bi-search"></a>--}}
{{--                                                        <a href="{{ route('sesi.destroy', $sesi->id) }}" class="btn btn-sm btn-danger bi bi-trash"></a>--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash"></i></button>--}}
{{--                            </form>--}}
                            {{--                    <button class="btn btn-sm btn-danger" wire:click="destroy({{ $sesi->id }})"><i class="bi bi-trash"></i></button>--}}
                        </td>
                    </tr>
{{--                @empty--}}
{{--                @endforelse--}}
                </tbody>
            </table>
{{--            @if($listsesi->isEmpty())--}}
                <div class="text-center p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <strong>Data Sesi Kosong</strong> Buat Sesi Baru.
                </div>
{{--            @endif--}}


{{--        <table class="table table-bordered table-striped" >--}}
{{--                        <thead class="bg-dark text-white text-center">--}}
{{--                        <tr>--}}
{{--                            <th scope="col">No</th>--}}
{{--                            <th scope="col">Jenis Transaksi</th>--}}
{{--                            <th scope="col">Nominal Transaksi</th>--}}
{{--                            <th scope="col">Keterangan</th>--}}
{{--                            <th scope="col" style="width: 15%">Actions</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @forelse ($transaksis as $index => $transaksi)--}}
{{--                            <tr>--}}
{{--                                <td class="text-center">{{ $index+1 }}</td>--}}
{{--                                <td> @if($transaksi->jenis_transaksi == 1) Uang Keluar @endif--}}
{{--                                    @if($transaksi->jenis_transaksi == 2) Uang Masuk @endif--}}
{{--                                    @if($transaksi->jenis_transaksi == 3) QR/Bank @endif--}}
{{--                                </td>--}}
{{--                                <td>{!! "Rp" . number_format($transaksi->nominal_transaksi, 2, ",", ".") !!}</td>--}}
{{--                                <td>{{ $transaksi->keterangan_transaksi }}</td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <button class="btn btn-sm btn-danger" wire:click="destroy_transaksi({{ $transaksi->id }})"><i class="bi bi-trash"></i></button>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @empty--}}
{{--                            <div class="alert alert-danger alert-dismissible">--}}
{{--                                Data Transaksi belum Tersedia.--}}
{{--                            </div>--}}
{{--                        @endforelse--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
                    {{--                    {{ $transaksis->links('vendor.pagination.bootstrap-5') }}--}}

        <hr class="hr mb-3"/>
        <div class="row mb-3">
                    <div class="col">
                        <label for="total_pos" class="form-label" id="default">Total POS</label>
                        <div class="input-group">
                            <div class="input-group-text">Rp</div>
                            <input type="text" wire:model="total_pos" class="form-control total_pos" id="input-currency" data-a-sign="" data-a-dec="," data-a-sep="." placeholder="Masukan Total POS">
                        </div>
                    </div>
                    <div class="col">
                        <label for="total_kasir" class="form-label" id="default">Total Kasir</label>
                        <div class="input-group">
                            <div class="input-group-text">Rp</div>
                            <input type="text" wire:model="total_kasir" class="form-control total_kasir" id="total_kasir" data-a-sign="" data-a-dec="," data-a-sep="." placeholder="Masukan Total Kasir">
                        </div>
                    </div>
                    <div class="col">
                        <label for="opening_next_day" class="form-label" id="default">Opening Next Day</label>
                        <div class="input-group">
                            <div class="input-group-text">Rp</div>
                            <input type="text" wire:model="opening_next_day" class="form-control opening_next_day" id="opening_next_day" data-a-sign="" data-a-dec="," data-a-sep="." placeholder="Opening Next Day">
                        </div>
                    </div>
                    <div class="col">
                        {{--                        <button wire:click="closeKasir" type="submit" class="btn btn-primary">Simpan Rekap</button>--}}
                        <button wire:click="closeKasir" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Rekap Kasir</button>
                    </div>
            </div>
                </form>
                <!-- Button trigger modal -->
            </div>


    <!-- Modal -->
    <div wire:loading class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Rekap Kasir</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <p class="lead">Rekap Kasir <strong>{{ '$tanggal_sesi' }}</strong></p>
                    <hr class="hr">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <p>Total POS</p>
                            </div>
                            <div class="col-6">
                                <p>{{ 'Rp ' . '$total_pos' }}</p>
                            </div>
                            <div class="col-6">
                                <p>Total Opening</p>
                            </div>
                            <div class="col-6">
                                <p>{{ 'Rp ' . '$total_opening' }}</p>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="row">
                            <div class="col-6">
                                <p>Total Uang Masuk</p>
                            </div>
                            <div class="col-6">
                                <p>{{ 'Rp ' . number_format(100000, 0, "", ".") }}</p>
                            </div>
                            <div class="col-6">
                                <p>Total Uang Keluar</p>
                            </div>
                            <div class="col-6">
                                <p>{{ 'Rp ' . number_format(100000, 0, "", ".") }}</p>
                            </div>
                            <div class="col-6">
                                <p>Total QR/Bank</p>
                            </div>
                            <div class="col-6">
                                <p>{{ 'Rp ' . number_format(100000, 0, "", ".") }}</p>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="row">
                            <div class="col-6">
                                <p>Total Uang Kasir</p>
                            </div>
                            <div class="col-6">
                                <p>{{ 'Rp ' . '$total_kasir'}}</p>
                            </div>
                            <div class="col-6">
                                <p><strong>Selisih</strong></p>
                            </div>
                            <div class="col-6">
                                <p><strong>{{ 'Rp ' . number_format(1000,0,'','.') }}</strong></p>
                                {{--                                <p><strong>{{ 'Rp ' . $total_kasir - ($total_opening + ($total_pos - $total_uang_bank) + ($total_uang_masuk - $total_uang_keluar)) }}</strong></p>--}}
                                {{--                                <p>{{ $total_kasir - ($total_opening + ($total_pos - $total_uang_bank) + ($total_uang_masuk - $total_uang_keluar)) }}</p>--}}
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="row">
                            <div class="col-6">
                                <p>Opening Next Day</p>
                            </div>
                            <div class="col-6">
                                <p>{{ 'Rp ' . '$opening_next_day' }}</p>
                            </div>
                            <div class="col-6">
                                <p><strong>Setoran</strong></p>
                            </div>
                            <div class="col-6">
                                <p><strong>{{ 'Rp ' . number_format(1000,0,'','.') }} </strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-primary">Close Kasir</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        easyNumberSeparator({
            selector: '.total_opening',
            separator: '.',
            resultInput: '#total_opening',
        })
        easyNumberSeparator({
            selector: '.total_pos',
            separator: '.',
            resultInput: '#total_pos',
        })
        easyNumberSeparator({
            selector: '.nominal_transaksi',
            separator: '.',
            resultInput: '#nominal_transaksi',
        })
        easyNumberSeparator({
            selector: '.total_kasir',
            separator: '.',
            resultInput: '#total_kasir',
        })
        easyNumberSeparator({
            selector: '.opening_next_day',
            separator: '.',
            resultInput: '#opening_next_day',
        })
    </script>
