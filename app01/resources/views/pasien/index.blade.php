<div class="card-body">
                    <h1 class="my-4">Daftar Pasien</h1>
                        <a href="{{ route('pasien.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>Create</a>
                    </div>
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
                                <th>Kelurahan</th>
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
                                    <td>{{ $pasien->kelurahan->nama }}</td>
                                    <td>
                                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST">
                                        <a href="{{ route('pasien.view', $pasien->id) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning">Edit</a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
