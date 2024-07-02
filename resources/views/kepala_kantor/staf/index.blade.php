<x-layout_kk.app>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex items-center justify-between">
                    <h2 class="card-title">Data Staf</h2>
                    <a href="{{ url('/kepala_kantor/staf/create') }}" class="btn btn-sm btn-success">
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
                                    <x-table.th title="NIP" />
                                    <x-table.th title="Nama" />
                                    <x-table.th title="Tlp" />
                                    <x-table.th title="Alamat" />
                                    <x-table.th title="Jabatan" />
                                    <x-table.th title="Aksi" />
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $staf)
                                <tr>
                                    <x-table.td title="{{ $loop->iteration }}" />
                                    <x-table.td title="{{ $staf->nip }}" />
                                    <x-table.td title="{{ $staf->nama }}" />
                                    <x-table.td title="{{ $staf->tlp }}" />
                                    <x-table.td title="{{ $staf->alamat }}" />
                                    <x-table.td title="{{ $staf->role }}" />
                                    <x-table.td-action>
                                        <div class="btn-group">
                                            <a href="#detail{{ $staf->id }}" data-bs-toggle="modal" class="btn btn-sm btn-warning">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ url('kepala_kantor/staf/edit',$staf->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="#hapus{{ $staf->id }}" data-bs-toggle="modal" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </x-table.td-action>
                                    <x-modal.modal-hapus  id="hapus{{ $staf->id }}" />
                                    <x-modal.modal-detail title="DETAIL DATA STAF" id="detail{{ $staf->id }}">
                                        <ul>
                                            <li class="flex items-center py-2 border-b-[0.05rem] border-b-slate-200 space-x-2">
                                                <span class="text-sm font-semibold text-gray-700 inline-block w-[5rem]">NIP</span>
                                                <span>:</span>
                                                <span class="text-sm font-medium text-gray-500 inline-block">{{ $staf->nip }}</span>
                                            </li>
                                            <li class="flex items-center py-2 border-b-[0.05rem] border-b-slate-200 space-x-2">
                                                <span class="text-sm font-semibold text-gray-700 inline-block w-[5rem]">Nama</span>
                                                <span>:</span>
                                                <span class="text-sm font-medium text-gray-500 inline-block">{{ $staf->nama }}</span>
                                            </li>
                                            <li class="flex items-center py-2 border-b-[0.05rem] border-b-slate-200 space-x-2">
                                                <span class="text-sm font-semibold text-gray-700 inline-block w-[5rem]">Jabatan</span>
                                                <span>:</span>
                                                <span class="text-sm font-medium text-gray-500 inline-block">{{ $staf->role }}</span>
                                            </li>
                                            <li class="flex items-center py-2 border-b-[0.05rem] border-b-slate-200 space-x-2">
                                                <span class="text-sm font-semibold text-gray-700 inline-block w-[5rem]">Tlp</span>
                                                <span>:</span>
                                                <span class="text-sm font-medium text-gray-500 inline-block">{{ $staf->tlp }}</span>
                                            </li>
                                            <li class="flex items-center py-2 border-b-[0.05rem] border-b-slate-200 space-x-2">
                                                <span class="text-sm font-semibold text-gray-700 inline-block w-[5rem]">Email</span>
                                                <span>:</span>
                                                <span class="text-sm font-medium text-gray-500 inline-block">{{ $staf->email }}</span>
                                            </li>
                                            <li class="flex items-center py-2 border-b-[0.05rem] border-b-slate-200 space-x-2">
                                                <span class="text-sm font-semibold text-gray-700 inline-block w-[5rem]">Alamat</span>
                                                <span>:</span>
                                                <span class="text-sm font-medium text-gray-500 inline-block">{{ $staf->alamat }}</span>
                                            </li>
                                        </ul>
                                    </x-modal.modal-detail>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout_kk.app>
