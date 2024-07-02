<x-layout_kk.app>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex items-center justify-between">
                   <div>
                        <h2 class="card-title">Detail {{ $list->nama_layanan }}</h2>
                        <p>{{ $list->ket_layanan }}</p>
                   </div>
                    <a href="#tambah" data-bs-toggle="modal" class="btn btn-sm btn-success">
                        <i class="bi bi-plus-lg"></i>
                        <span>Tambah Persayaratan</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="min-w-full overflow-x-auto">
                        <table class="table datatables">
                            <thead>
                                <tr>
                                    <x-table.th title="No." />
                                    <x-table.th title="Persyaratan" />
                                    <x-table.th title="Aksi" />
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list->persyaratan as $persyaratan)
                                    <tr>
                                        <x-table.td title="{{ $loop->iteration }}" />
                                        <x-table.td title="{{ $persyaratan->ket_persyaratan }}" />
                                        <x-table.td-action>
                                            <div class="btn-group">
                                                <a href="#edit{{ $persyaratan->id }}" data-bs-toggle="modal" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="#hapus{{ $persyaratan->id }}" data-bs-toggle="modal"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </x-table.td-action>
                                        <x-modal.modal-hapus id="hapus{{ $persyaratan->id }}" />
                                        <x-modal.modal-tambah id="edit{{ $persyaratan->id }}" action="{{ url('kepala_kantor/layanan/updatePersayaratan', $persyaratan->id) }}">
                                            <div class="p-8">
                                                <div class="pb-4">
                                                    <h2 class="text-2xl font-medium text-slate-600">EDIT PERSYARATAN LAYANAN</h2>
                                                </div>
                                                <div>
                                                    <x-input.input type="text" label="Persyaratan Layanan" name="ket_persyaratan" value="{{ $persyaratan->ket_persyaratan }}" placeholder="Masukkan Persayaratan Layanan" />
                                                </div>
                                                <div class="flex items-center justify-center gap-1">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                                    <button type="submit" class="btn btn-primary">EDIT</button>
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
    <x-modal.modal-tambah id="tambah" action="{{ url('kepala_kantor/layanan/storePersayaratan', $list->id) }}">
        <div class="p-8">
            <div class="pb-4">
                <h2 class="text-2xl font-medium text-slate-600">TAMBAH PERSYARATAN LAYANAN</h2>
            </div>
            <div>
                <x-input.input type="text" label="Persyaratan Layanan" name="ket_persyaratan" placeholder="Masukkan Persayaratan Layanan" />
            </div>
            <div class="flex items-center justify-center gap-1">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
    </x-modal.modal-tambah>
</x-layout_kk.app>
