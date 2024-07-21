<div class="overflow-x-auto p-6 lg:p-8 dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <form action="{{ route('sesi.store') }}" method="POST" class="row gy-2 gx-3 align-items-center">
        @csrf
        <div class="col-6">
            <label for="tanggal_sesi" class="form-label">Tanggal Session</label>
            <input type="date" name="tanggal_sesi" class="form-control" id="tanggal_sesi" placeholder="Tanggal Sesi">
        </div>
        <div class="col-6">
            <label for="opening_total" class="form-label" id="default">Total Opening</label>
            <div class="input-group">
                <div class="input-group-text">Rp</div>
                <input type="text" name="total_opening" class="form-control input-currency" id="opening_total" placeholder="Total Opening">
            </div>
        </div>
        <div class="b-example-divider"></div>
        @error('tanggal_sesi')
        <div class="alert alert-danger mt-2 alert-dismissible">
            {{ $message }}
        </div>
        @enderror
        @error('total_opening')
        <div class="alert alert-danger mt-2 alert-dismissible">
            {{ $message }}
        </div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>

    let opening_total = document.getElementById('opening_total');
    opening_total.addEventListener('keyup', function()
    {
        opening_total.value = formatRupiah(this.value, '');
    });

    function formatRupiah(angka, prefix)
    {
        let number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substring(0, sisa),
            ribuan = split[0].substring(sisa).match(/\d{3}/gi);

        let separator;

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>
