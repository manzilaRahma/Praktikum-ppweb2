<h3>{{ $judul }}</h3>
<table class="table table-bordered" width="100%" border="1">
    <thead>
        <tr>
            <th>Nama Program Studi</th><th>Kaprodi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        @foreach ($ar_prodi as $p)
        <tr>
            <td>{{ $nomor }}</td>
            <td>{{ $p->kode }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->kaprodi }}</td>
        </tr>
        <?php $nomor++; ?>
        @endforeach
    </tbody>
</table>