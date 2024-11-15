<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Pinjam Buku</div>

                    <div class="card-body">
                        <a href="/buku" class="btn btn-primary">Buku</a>
                        <a href="/member" class="btn btn-warning">Member</a>
                        <a href="/pinjam" class="btn btn-success">Pinjam</a>
                        <hr />
                        <button class="btn btn-primary" wire:click="tambahPinjam">Tambah Pinjam</button>
                        <i wire:loading>Loading ...</i>
                        @if ($pillihanMenu == 'tambahPinjam' || $pillihanMenu == 'editPinjam')
                        <div class="form-control">
                            <input type="text" wire:model="cari" class="form-control" placeholder="NISN Siswa">
                            <button class="btn btn-primary mt-3" wire:click="cariSiswa">Cari</button>
                        </div>
                        @if ($member_id)
                        Hai <h3>{{ $member_nama }}</h3>, mau pinjam buku apa ?
                        <hr>
                        <select wire:model="buku_id" class="form-control">
                            <option value="">Select a Book</option>
                            @foreach ($semuabuku as $buku)
                            <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-danger mt-3" wire:click="simpan">Simpan</button>
                        @endif
                        @endif
                        <br>

                        <hr />
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $semuapinjam as $pinjam )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pinjam->member->nama }}</td>
                                    <td>{{ $pinjam->buku->judul }}</td>
                                    <td>{{ $pinjam->tanggal_pinjam }}</td>
                                    <td>{{ $pinjam->tanggal_kembali }}</td>
                                    <td>
                                        <button class="btn btn-warning" wire:click="editPinjam({{ $pinjam->id }})">Edit</button>
                                        <button class="btn btn-danger" wire:click="hapusPinjam({{ $pinjam->id }})" wire:confirm='Anda Yakin ???'>Hapus</button>
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