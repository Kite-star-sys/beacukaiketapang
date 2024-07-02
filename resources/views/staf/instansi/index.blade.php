<x-layout_staf.app>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex items-center justify-between">
                    <h2 class="card-title">Data Instansi</h2>
                    <a href="#tambah" data-bs-toggle="modal" class="btn btn-sm btn-success">
                        <i class="bi bi-plus-lg"></i>
                        <span>Tambah Data</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="min-w-full overflow-x-auto">
                        <table class="table datatables">
                            <thead>
                                <tr>
                                    <x-table.th title="No." />
                                    <x-table.th title="Nama Instansi" />
                                    <x-table.th title="Telepon" />
                                    <x-table.th title="Jabatan" />
                                    <x-table.th title="Email" />
                                    <x-table.th title="Aksi" />
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $instansi)
                                <tr>
                                    <x-table.td title="{{ $loop->iteration }}" />
                                    <x-table.td title="{{ $instansi->nama_instansi }}" />
                                    <x-table.td title="{{ $instansi->tlp }}" />
                                    <x-table.td title="{{ $instansi->jabatan }}" />
                                    <x-table.td title="{{ $instansi->email }}" />
                                    <x-table.td-action>
                                        <div class="btn-group">
                                            <a href="#detail{{ $instansi->id }}" data-bs-toggle="modal" class="btn btn-sm btn-warning">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="#edit{{ $instansi->id }}" data-bs-toggle="modal" class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="#hapus{{ $instansi->id }}" data-bs-toggle="modal" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </x-table.td-action>
                                    <x-modal.modal-hapus  id="hapus{{ $instansi->id }}" />
                                        <!-- Modal Detail Data Instansi -->
                                    <x-modal.modal-detail title="DETAIL DATA INSTANSI" id="detail{{ $instansi->id }}">
                                        <ul>
                                           <x-list.li-vertical left="Nama Instasnsi" right="{{ $instansi->nama_instansi }}" />
                                           <x-list.li-vertical left="tlp" right="{{ $instansi->tlp }}" />
                                           <x-list.li-vertical left="Jabatan" right="{{ $instansi->jabatan }}" />
                                           <x-list.li-vertical left="Email" right="{{ $instansi->email }}" />
                                           <x-list.li-horizontal left="Password" right="{{ $instansi->password }}" />
                                           <x-list.li-horizontal left="Alamat" right="{{ $instansi->alamat_lengkap }}" />
                                        </ul>
                                    </x-modal.modal-detail>
                                    <!-- Modal Update Data -->
                                    <x-modal.modal-tambah id="edit{{ $instansi->id }}" action="{{ url('staf_kantor/instansi/update',$instansi->id) }}">
                                        <div class="p-8">
                                            <div class="pb-4">
                                                <h2 class="text-2xl font-medium text-slate-600">EDIT DATA INSTANSI</h2>
                                            </div>
                                            <div>
                                                <x-input.input label="Nama Instansi" name="nama_instansi" placeholder="Masukan nama instansi" value="{{ $instansi->nama_instansi }}" />
                                                <x-input.input label="No.Telepon" name="tlp" placeholder="Nomor telepon" value="{{ $instansi->tlp }}" />
                                                <x-input.input label="Jabatan pada instansi ini" name="jabatan" placeholder="Jabatan anda pada instansi ini" value="{{ $instansi->jabatan }}" />
                                                <x-input.input label="Alamat Email" name="email" placeholder="Masuka email" value="{{ $instansi->email }}" />
                                                <x-input.input label="Password" name="password" placeholder="Masukan password" type="password"/>
                                                <x-input.input label="Alamat Lengkap" name="alamat_lengkap" placeholder="Masukan alamat lemngkap" value="{{ $instansi->alamat_lengkap }}" />
                                            </div>
                                            <div class="flex items-center justify-center gap-1 mt-3">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                                <button type="submit" class="btn btn-primary">UPDATE</button>
                                            </div>
                                        </div>
                                    </x-modal.modal-tambah>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <x-modal.modal-tambah id="tambah" action="{{ url('staf_kantor/instansi/store') }}">
        <div class="p-8">
            <div class="pb-4">
                <h2 class="text-2xl font-medium text-slate-600">TAMBAH DATA INSTANSI</h2>
            </div>
            <div>
                <x-input.input label="Nama Instansi" name="nama_instansi" placeholder="Nama instansi" />
                <x-input.input label="No.Telepon" name="tlp" placeholder="Nomor telepon"/>
                <x-input.input label="Jabatan pada instansi ini" name="jabatan" placeholder="Jabatan anda pada instansi ini" />
                <x-input.input label="Alamat Email" name="email" placeholder="Masuka email"/>
                <x-input.input label="Password" name="password" placeholder="Masukan password" type="password"/>
                <x-input.input label="Alamat Lengkap" name="alamat_lengkap" placeholder="Masukan alamat lemngkap" />
            </div>
            <div class="flex items-center justify-center gap-1 mt-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
    </x-modal.modal-tambah>
</x-layout_staf.app>
