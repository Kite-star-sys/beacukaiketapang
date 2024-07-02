<x-layout_staf.app>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex items-center justify-between">
                    <h2 class="card-title">Data Pengajuan Surat</h2>
                    <a href="{{ url('staf_kantor/surat/create') }}" class="btn btn-sm btn-success">
                        <i class="bi bi-plus-lg"></i>
                        <span>Tambah Data</span>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table datatables">
                        <thead>
                            <tr>
                                <x-table.th title="No." />
                                <x-table.th title="No Surat" />
                                <x-table.th title="Jenis Layanan" />
                                <x-table.th title="Instansi Pengaju Surat" />
                                <x-table.th title="Status Surat" />
                                <x-table.th title="Aksi" />
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $surat)
                            @php
                                $status_baru = Str::contains($surat->tracking->status_tracking, 'Baru');
                                $status_diterima = Str::contains($surat->tracking->status_tracking, 'Diterima');
                                $status_ditangguhkan = Str::contains($surat->tracking->status_tracking, 'Ditangguhkan');
                                $status_diverifikasi = Str::contains($surat->tracking->status_tracking, 'Diverifikasi');
                            @endphp
                            <tr>
                                <x-table.td title="{{ $loop->iteration }}" />
                                <x-table.td title="{{ $surat->kode_surat }}" />
                                <x-table.td title="{{ $surat->layanan->nama_layanan }}" />
                                <x-table.td title="{{ $surat->instansi->nama_instansi }}" />
                                <x-table.td-action>
                                    @if ($status_baru)
                                        <span>Baru</span>
                                    @endif
                                    @if($status_diterima)
                                        <span>Diterima</span>
                                    @endif
                                    @if($status_ditangguhkan)
                                        <span>Ditangguhkan</span>
                                    @endif
                                    @if($status_diverifikasi)
                                        <span>Diverifikasi</span>
                                    @endif
                                </x-table.td-action>
                                <x-table.td-action>
                                    <div class="btn-group dropdown">
                                        <button class="btn-sm btn-secondary" data-bs-toggle="dropdown">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            @if ($status_baru)
                                                <li><a class="dropdown-item" href="{{ url('staf_kantor/surat/lihat',$surat->id) }}">Lihat Surat</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#terimaSurat{{ $surat->id }}">Terima Surat</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#tangguhkanSurat{{ $surat->id }}">Tangguhkan Surat</a></li>
                                            @endif
                                            @if($status_diterima)
                                                <li><a class="dropdown-item" href="{{ url('staf_kantor/surat/lihat',$surat->id) }}">Lihat Surat</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#verifikasiSurat{{ $surat->id }}">Verifikasi Surat</a></li>
                                            @endif
                                            @if($status_ditangguhkan)
                                                <li><a class="dropdown-item" href="{{ url('staf_kantor/surat/lihat',$surat->id) }}">Lihat Surat</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#terimaSurat{{ $surat->id }}">Terima Surat</a></li>
                                            @endif
                                            @if($status_diverifikasi)
                                                <li><a class="dropdown-item" href="{{ url('staf_kantor/surat/lihat',$surat->id) }}">Lihat Surat</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#kirimSurat{{ $surat->id }}">Kirim Surat</a></li>
                                                {{-- <li><a class="dropdown-item" href="#">Print Surat</a></li> --}}
                                            @endif
                                          </ul>
                                    </div>
                                </x-table.td-action>
                                <x-modal.modal-hapus  id="hapus{{ $surat->id }}" />

                                <!-- Modal Terima Data -->
                                <x-modal.modal-verifikasi
                                    id="verifikasiSurat{{ $surat->id }}"
                                    action="{{ url('staf_kantor/surat/verifikasi',$surat->id) }}"
                                    icons="file-check"
                                    style="color: #06b6d4 !important"
                                    title="Verifikasi Surat"
                                    subtitle="Klik tombol Verifikasi SURAT INI untuk memverifikasi surat !"
                                    textSumbit="VERIFIKASI SURAT INI"
                                    classBtnSubmit="info px-3 py-2 text-xs font-medium text-white rounded-md bg-cyan-500"
                                />
                                <!-- Modal TangguhkanSurat Data -->
                                <x-modal.modal-verifikasi
                                    id="tangguhkanSurat{{ $surat->id }}"
                                    action="{{ url('staf_kantor/surat/tangguhkan',$surat->id) }}"
                                    icons="stopwatch text-warning"
                                    title="Tangguhkan Surat"
                                    subtitle="Klik tombol TANGGUHKAN SURAT INI untuk menangguhkan surat !"
                                    textSumbit="TANGGUHKAN SURAT INI"
                                    classBtnSubmit="warning px-3 py-2 text-xs font-medium text-white rounded-md"
                                />
                                <!-- Modal TangguhkanSurat Data -->
                                <x-modal.modal-verifikasi
                                    id="terimaSurat{{ $surat->id }}"
                                    action="{{ url('staf_kantor/surat/terima',$surat->id) }}"
                                    icons="check-circle text-success"
                                    title="Terima Surat"
                                    subtitle="Klik tombol TERIMA SURAT INI untuk menerima surat !"
                                    textSumbit="TERIMA SURAT INI"
                                    classBtnSubmit="success px-3 py-2 text-xs font-medium text-white rounded-md"
                                />
                                <!-- Modal Kirim Data -->
                                <x-modal.modal-tambah id="kirimSurat{{ $surat->id }}" action="{{ url('staf_kantor/surat/kirim',$surat->id) }}">
                                    <div class="p-8">
                                        <div class="pb-4">
                                            <h2 class="text-2xl font-medium text-slate-600">KIRIM SURAT</h2>
                                        </div>
                                        <div>
                                            <x-input.select label="Penerima" name="id_penerima">
                                                <option value="">--- Pilih Penerima ---</option>
                                                @foreach ($user as $i)
                                                    <option value="{{ $i->id }}"
                                                        {{ old('id_penerima') == $i->id ? 'selected' : '' }}>{{ $i->nama.' || '.$i->role }}
                                                    </option>
                                                @endforeach
                                            </x-input.select>
                                            <x-input.input type="file" label="File Lampiran" name="file_lampiran" placeholder="Masukan file lampiran" accept=".pdf" />
                                            <x-input.input label="Keterangan" name="ket_tracking" placeholder="Masukan keterangan jika diperlukan" />

                                        </div>
                                        <div class="flex items-center justify-center gap-1 mt-3">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                            <button type="submit" class="btn btn-primary">KIRIM SURAT INI</button>
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

</x-layout_staf.app>
