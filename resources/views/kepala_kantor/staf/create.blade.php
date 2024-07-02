<x-layout_kk.app>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('/kepala_kantor/staf/store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">FORM TAMBAH DATA STAF</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <x-input.input type="number" label="NIP" name="nip" placeholder="Masukkan NIP" />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Nama" name="nama" placeholder="Masukkan Nama" />
                            </div>
                            <div class="col-md-3">
                                <x-input.select label="Jenis Kelamin" name="jk">
                                    <option value="">Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jk') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jk') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </x-input.select>
                            </div>
                            <div class="col-md-3">
                                <x-input.input type="number" label="No.Telepon / Hp" name="tlp" placeholder="Masukkan nomor telepon / hp" />
                            </div>
                            <div class="col-md-3">
                                <x-input.select label="Jabatan" name="role">
                                    <option value="">--- Pilih Jabatan ---</option>
                                    <option value="Staf Pelayanan" {{ old('role') == 'Staf Pelayanan' ? 'selected' : '' }}>Staf Pelayanan</option>
                                    <option value="Staf II" {{ old('role') == 'Staf II' ? 'selected' : '' }}>Staf II</option>
                                </x-input.select>
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Alamat lengkap" name="alamat" placeholder="Masukkan alamat lengkap" />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Email" name="email" placeholder="Masukkan email" />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Password" name="password" placeholder="Masukkan password" />
                            </div>

                            <div class="col-md-12">
                                <button class="btn  btn-primary float-end">SIMPAN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout_kk.app>
