<x-layout_kk.app>
    <style>
        .PSPDFKit-6fq5ysqkmc2gc1fek9b659qfh8{
            display: none !important
        }
    </style>
    <div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">DETAIL PENGAJUAN SURAT</h2>
                    </div>
                    <div class="card-body">
                        <ul>
                            <x-list.li-vertical left="No. Surat" right="{{ $list->kode_surat }}" />
                            <x-list.li-vertical left="Nama Instansi" right="{{ $list->instansi->nama_instansi }}" />
                            <x-list.li-vertical left="Layanan" right="{{ $list->layanan->nama_layanan }}" />
                            <li class="flex flex-row items-center gap-3 py-2 border-b border-b-slate-200">
                                <ul></ul>
                                <span>File Pengajuan</span>
                                <span>:</span>
                                <span>
                                    <a href="#modalFile" class="btn-view-file" data-bs-toggle="modal">
                                        <i class="bi bi-filetype-pdf text-lg"></i>
                                        <span>Lihat File Persayaratan</span>
                                    </a>
                                </span>
                            </li>

                            <li class="flex flex-col items-start gap-3">
                                <span>File Persayaratan Layanan</span>
                                <span>
                                    <ul class="flex flex-wrap gap-2">
                                        @foreach ($list->pendukung as $item)
                                        <li>
                                            <a href="#modalFilePendukung{{ $item->id }}" class="btn-view-file">
                                                <i class="bi bi-filetype-pdf text-lg"></i>
                                                <span>Lihat File Persayaratan</span>
                                            </a>
                                        </li>

                                    @endforeach
                                    </ul>
                                </span>
                            </li>
                            <li>
                                <p class="mb-3 font-medium text-slate-600">Tracking Surat</p>
                                <ul class="flex items-center flex-wrap gap-3">
                                    <li class="flex flex-col items-center gap-1 bg-green-100 text-green-600 px-3  py-1.5 text-sm font-medium rounded-lg">
                                        <span>Dinput Oleh</span>
                                        <span></span>
                                        <span class="font-bold">{{ $list->tracking->instansipengirim->nama_instansi }}</span>
                                        <span class="font-medium text-xs">{{ $list->waktu() }}</span>
                                    </li>
                                    <li class="flex flex-col items-center gap-1 bg-slate-100 text-slate-600 px-3  py-1.5 text-sm font-medium rounded-lg">
                                        <span>Status Surat</span>
                                        <span class="font-bold">{{ $list->tracking->status_tracking }}</span>
                                        <span class="font-medium text-xs">{{ $list->tracking->waktu() }}</span>
                                    </li>
                                    <li class="flex flex-col items-center gap-1 bg-red-100 text-red-600 px-3  py-1.5 text-sm font-medium rounded-lg">
                                        <span>Ditujukan Untuk</span>
                                        <span></span>
                                        <span class="font-bold">{{ $list->tracking->userpenerima->nama }}</span>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>

    </div>

    <!-- Modal -->
<div class="modal fade" id="modalFile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">FILE PENGAJUAN SURAT</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            document: "{{ url('public') }}/{{ $list->file }}" // Add the path to your document here.
        })
        .then(function(instance) {
            console.log("PSPDFKit loaded", instance);
        })
        .catch(function(error) {
            console.error(error.message);
        });
    </script>
    @endpush
</x-layout_kk.app>
