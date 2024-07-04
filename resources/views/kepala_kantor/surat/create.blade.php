<x-layout_kk.app>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('/staf_kantor/surat/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">FORM TAMBAH DATA SURAT MASUK</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <x-input.input type="text" label="No.Surat" name="kode_surat"
                                    placeholder="Masukkan No.Surat" />
                            </div>
                            <div class="col-md-3">
                                <x-input.select label="Instansi Yang Mengajukan" name="id_instansi">
                                    <option value="">--- Pilih Instansi ---</option>
                                    @foreach ($instansi as $i)
                                        <option value="{{ $i->id }}"
                                            {{ old('id_instansi') == $i->id ? 'selected' : '' }}>{{ $i->nama_instansi }}
                                        </option>
                                    @endforeach
                                </x-input.select>
                            </div>
                            <div class="col-md-3">
                                <x-input.input type="file" label="File Surat" name="file"
                                    placeholder="Masukkan file" accept=".pdf" />
                            </div>
                            <div class="col-md-3">
                                <x-input.select label="Jenis Layan Surat" name="id_layanan">
                                    <option value="">--- Pilih Layanan Surat ---</option>
                                    @foreach ($layanan as $i)
                                        <option value="{{ $i->id }}"
                                            {{ old('id_layanan') == $i->id ? 'selected' : '' }}>{{ $i->nama_layanan }}
                                        </option>
                                    @endforeach
                                </x-input.select>
                            </div>
                            <div class="col-md-12" id="boxes">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="font-medium text-base mb-3 text-slate-600">Upload FIle persayaratan layanan</h2>
                                    </div>
                                    <div id="tampilkanHasil" class="row"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <x-input.input label="Keterangan Surat" name="keterangan"
                                    placeholder="Masukkan alamat lengkap" />
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

    @push('js')
        <script>
            $(document).ready(function() {
                $('#boxes').hide('slow');
                $('#id_layanan').on('change', function() {
                    var id = $(this).val();
                    $('#boxes').show('slow');
                    if (id !== '') {
                        $.ajax({
                            url: `{{ url('staf_kantor/surat/ambilPersayaraan') }}/${id}`,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                var isi = data.data_persayaratan;
                                var isiData = '';

                                if (isi.length === 0) {
                                    // Jika isi kosong, tampilkan pesan
                                    $('#tampilkanHasil').html(
                                        '<div class="alert alert-danger" role="alert">Belum ada data persayaratan untuk layanan ini</div>'
                                        );
                                    return;
                                } else {
                                    // Kosongkan isi dari #tampilkanHasil sebelum menambahkan yang baru
                                    $('#tampilkanHasil').empty();

                                    // Iterasi untuk menambahkan elemen baru
                                    for (const listData of isi) {
                                        isiData += `
                                                    <div class="col-md-4">
                                                        <x-input.input type="file" label="${listData.ket_persyaratan}" name="file_pendukung[]" placeholder="Masukkan file" accept=".pdf" />
                                                    </div>
                                                `;
                                    }

                                    // Masukkan elemen baru ke dalam #tampilkanHasil
                                    $('#tampilkanHasil').html(isiData);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        });
                    } else {
                        $('#boxes').hide('slow');
                        $('#tampilkanHasil').empty();

                    }
                });
            });
        </script>
    @endpush
    </x-layout_kk.app>
