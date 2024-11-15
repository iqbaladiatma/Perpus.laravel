<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Member</div>

                    <div class="card-body">
                        <a href="/buku" class="btn btn-primary">Buku</a>
                        <a href="/member" class="btn btn-warning">Member</a>
                        <a href="/pinjam" class="btn btn-success">Pinjam</a>
                        <hr />
                        <button class="btn btn-primary" wire:click="tambahMember">Tambah Member</button>
                        <i wire:loading>Loading ...</i>
                        @if ($pillihanMenu == 'tambahMember' || $pillihanMenu == 'editMember')
                        <form wire:submit="simpan" autocomplete="off">
                            <div class="form-group mt-3">
                                <label for="judul">Nama</label>
                                <!-- wire/name -->
                                <input type="text" class="form-control" id="nama" wire:model="nama">
                            </div>
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <!-- wire/name -->
                                <input type="text" class="form-control" id="nisn" wire:model="nisn">
                            </div>
                            <button class="btn btn-primary mt-4" type="submit">Simpan</button>
                        </form>
                        @endif
                        <br>

                        <hr />
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $semuamember as $member )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $member->nama }}</td>
                                    <td>{{ $member->nisn }}</td>
                                    <td>
                                        <button class="btn btn-warning" wire:click="editMember({{ $member->id }})">Edit</button>
                                        <button class="btn btn-danger" wire:click="hapusMember({{ $member->id }})" wire:confirm='Anda Yakin ???'>Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>