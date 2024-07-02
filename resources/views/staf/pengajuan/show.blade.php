<x-layout_staf.app>
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
                                <li class="flex flex-col items-start gap-3">
                                    <span>File Pengajuan</span>
                                    <span>:</span>
                                    <span>
                                        <a href="#" class="btn-view-file" data-bs-toggle="modal">
                                            <i class="bi bi-filetype-pdf text-lg"></i>
                                            <span>Lihat File Persayaratan</span>
                                        </a>
                                    </span>
                                </li>

                            <li class="flex flex-col items-start gap-3">
                                <span>File Persayaratan Layanan</span>
                                <span>
                                    <ul class="flex flex-wrap gap-2">
                                        @foreach ($list->histori as $item)
                                        <li>
                                            <a href="#modalFile" class="btn-view-file">
                                                <i class="bi bi-filetype-pdf text-lg"></i>
                                                <span>Lihat File Persayaratan</span>
                                            </a>
                                        </li>

                                    @endforeach
                                    </ul>
                                </span>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
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
</x-layout_staf.app>
