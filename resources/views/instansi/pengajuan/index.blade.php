<x-layout_instansi.app>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex items-center justify-between">
                    <h2 class="card-title">Data Surat Pengajuan Anda</h2>
                    <a href="{{ url('instansi/pengajuan/create') }}" class="btn btn-sm btn-success">
                        <i class="bi bi-plus-lg"></i>
                        <span>Ajukan Surat</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="min-w-full overflow-x-auto">
                        <table class="table datatables">
                            <thead>
                                <tr>
                                    <x-table.th title="No." />
                                    <x-table.th title="No.Surat" />
                                    <x-table.th title="Layanan" />
                                    <x-table.th title="File" />
                                    <x-table.th title="Status" />
                                </tr>
                            </thead>
                            <tbody>
                                @if ($list->isNotEmpty())
                                    @foreach ($list as $pengajuan)
                                        @php
                                            $status_baru = Str::contains($pengajuan->tracking->status_tracking, 'Baru');
                                            $status_diterima = Str::contains(
                                                $pengajuan->tracking->status_tracking,
                                                'Diterima',
                                            );
                                            $status_ditangguhkan = Str::contains(
                                                $pengajuan->tracking->status_tracking,
                                                'Ditangguhkan',
                                            );
                                            $status_diverifikasi = Str::contains(
                                                $pengajuan->tracking->status_tracking,
                                                'Diverifikasi',
                                            );
                                        @endphp
                                        <tr>
                                            <x-table.td title="{{ $loop->iteration }}" />
                                            <x-table.td title="{{ $pengajuan->kode_surat }}" />
                                            <x-table.td title="{{ $pengajuan->layanan->nama_layanan }}" />
                                                <x-table.td-action>
                                                    <a href="#lihat{{ $pengajuan->id }}" class="btn-view-file" data-bs-toggle="modal">
                                                        <i class="bi bi-filetype-pdf text-lg"></i>
                                                        <span>Lihat File Pengajuan</span>
                                                    </a>
                                                </x-table.td-action>
                                            <x-table.td-action>
                                                @if ($status_baru)
                                                    <span>Baru</span>
                                                @endif
                                                @if ($status_diterima)
                                                    <span>Diterima</span>
                                                @endif
                                                @if ($status_ditangguhkan)
                                                    <span>Ditangguhkan</span>
                                                @endif
                                                @if ($status_diverifikasi)
                                                    <span>Diverifikasi</span>
                                                @endif
                                            </x-table.td-action>

                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="lihat{{ $pengajuan->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="pspdfkit" style="height: 100vh"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @push('js')
                                            <script src="{{ asset('public/src/pdf_kit/dist/pspdfkit.js') }}"></script>
                                            <script>
                                                PSPDFKit.load({
                                                        container: "#pspdfkit",
                                                        document: "{{ url('public') }}/{{ $pengajuan->file }}" // Add the path to your document here.
                                                    })
                                                    .then(function(instance) {
                                                        console.log("PSPDFKit loaded", instance);
                                                    })
                                                    .catch(function(error) {
                                                        console.error(error.message);
                                                    });
                                            </script>
                                        @endpush
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout_instansi.app>
