<div class="card-body">
                    <h1 class="my-4">Daftar Pasien</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_pasien as $pasien)
                                <tr>
                                    <td>{{ $pasien->id }}</td>
                                    <td>{{ $pasien->kode }}</td>
                                    <td>{{ $pasien->nama }}</td>
                                    <td>{{ $pasien->tmp_lahir }}</td>
                                    <td>{{ $pasien->tgl_lahir }}</td>
                                    <td>{{ $pasien->gender }}</td>
                                    <td>{{ $pasien->email }}</td>
                                    <td>{{ $pasien->alamat }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="view_pasien.php?id=<?= $pasien['id'] ?>">View</a>
                                        <a class="btn btn-primary" href="form_pasien.php?idedit=<?= $pasien['id'] ?>">Edit</a>
                                        <a class="btn btn-primary" href="delete_pasien.php?iddel=<?= $pasien['id'] ?>" onclick="if(!confirm('Anda Yakin Hapus Data Produk <?= $pasien['nama'] ?>?')) {return false}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->