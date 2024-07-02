<x-layout_kk.app>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('/kepala_kantor/staf/update',$staf->id) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">EDIT DATA STAF</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <x-input.input type="number" label="NIP" name="nip" value="{{ $staf->nip }}" placeholder="Masukkan NIP" />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Nama" name="nama" value="{{ $staf->nama }}" placeholder="Masukkan Nama" />
                            </div>
                            <div class="col-md-3">
                                <x-input.select label="Jenis Kelamin" name="jk">
                                    <option value="">Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jk') == 'Laki-laki' ? 'selected' : '' }} @if ($staf->jk == 'Laki-laki')
                                        selected

                                    @endif>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jk') == 'Perempuan' ? 'selected' : '' }} @if ($staf->jk == 'Perempuan')
                                        selected

                                    @endif>Perempuan</option>
                                </x-input.select>
                            </div>
                            <div class="col-md-3">
                                <x-input.input type="number" label="No.Telepon / Hp" name="tlp" value="{{ $staf->tlp }}" placeholder="Masukkan nomor telepon / hp" />
                            </div>
                            <div class="col-md-3">
                                <x-input.select label="Jabatan" name="role">
                                    <option value="">--- Pilih Jabatan ---</option>
                                    <option value="Staf Pelayanan" {{ old('role') == 'Staf Pelayanan' ? 'selected' : '' }} @if ($staf->role == 'Staf Pelayanan')
                                        selected

                                    @endif>Staf Pelayanan</option>
                                    <option value="Staf II" {{ old('role') == 'Staf II' ? 'selected' : '' }} @if ($staf->role == 'Staf II')
                                        selected

                                    @endif>Staf II</option>
                                </x-input.select>
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Alamat lengkap" name="alamat" value="{{ $staf->alamat }}" placeholder="Masukkan alamat lengkap" />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Email" name="email" value="{{ $staf->email }}" placeholder="Masukkan email" />
                            </div>
                            <div class="col-md-3">
                                <x-input.input label="Password" name="password" placeholder="Masukkan password" />
                            </div>

                            <div class="col-md-12">
                                <button class="btn  btn-primary float-end">EDIT DATA</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout_kk.app>
