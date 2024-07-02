<x-layout_kk.app>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex items-center justify-between">
                    <h2 class="card-title">Data Layanan</h2>
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
                                    <x-table.th title="Jenis Layanan" />
                                    <x-table.th title="Keterangan" />
                                    <x-table.th title="Aksi" />
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $layanan)
                                    <tr>
                                        <x-table.td title="{{ $loop->iteration }}" />
                                        <x-table.td title="{{ $layanan->nama_layanan }}" />
                                        <x-table.td title="{{ $layanan->ket_layanan }}" />
                                        <x-table.td-action>
                                            <div class="btn-group">
                                                <a href="{{ url('kepala_kantor/layanan/show',$layanan->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="#edit{{ $layanan->id }}" data-bs-toggle="modal" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="#hapus{{ $layanan->id }}" data-bs-toggle="modal"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </x-table.td-action>
                                        <x-modal.modal-hapus id="hapus{{ $layanan->id }}" />
                                        <x-modal.modal-tambah id="edit{{ $layanan->id }}" action="{{ url('kepala_kantor/layanan/update', $layanan->id) }}">
                                            <div class="p-8">
                                                <div class="pb-4">
                                                    <h2 class="text-2xl font-medium text-slate-600">EDIT DATA LAYANAN</h2>
                                                </div>
                                                <div>
                                                    <x-input.input type="text" label="Nama Layanan" name="nama_layanan" value="{{ $layanan->nama_layanan }}" placeholder="Masukkan Nama Layanan" />
                                                    <x-input.input type="text" label="Keterangan Layanan" name="ket_layanan" value="{{ $layanan->ket_layanan }}" placeholder="Masukkan Keterangan Layanan" />
                                                </div>
                                                <div class="flex items-center justify-center gap-1">
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
    <x-modal.modal-tambah id="tambah" action="{{ url('kepala_kantor/layanan/store') }}">
        <div class="p-8">
            <div class="pb-4">
                <h2 class="text-2xl font-medium text-slate-600">TAMBAH DATA LAYANAN</h2>
            </div>
            <div>
                <x-input.input type="text" label="Nama Layanan" name="nama_layanan" placeholder="Masukkan Nama Layanan" />
                <x-input.input type="text" label="Keterangan Layanan" name="ket_layanan" placeholder="Masukkan Keterangan Layanan" />
            </div>
            <div class="flex items-center justify-center gap-1">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
    </x-modal.modal-tambah>
</x-layout_kk.app>
