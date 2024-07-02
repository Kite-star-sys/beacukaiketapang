<x-layout_auth.app>
    <div class="form-header flex flex-col">
        <h2>REGISTRASI AKUN</h2>
        <p>Silahkan isi formulir berikut untuk mendaftar akun baru</p>
    </div>
    <form action="{{ url('aksiRegistrasi') }}" method="POST">
        @csrf
        <x-input.inputlogin name="nama_instansi" placeholder="Nama instansi" leftIcons="envelope" />
        <x-input.inputlogin name="tlp" placeholder="Nomor telepon" leftIcons="phone" />
        <x-input.inputlogin name="jabatan" placeholder="Jabatan anda pada instansi ini" leftIcons="briefcase" />
        <x-input.inputlogin name="email" placeholder="Masuka email" leftIcons="envelope" />
        <x-input.inputlogin name="password" placeholder="Masukan password" leftIcons="lock" type="password" password />
        <x-input.inputlogin name="alamat_lengkap" placeholder="Masukan alamat lemngkap" leftIcons="map-marker-alt" />
        <button type="submit" class="btn btn-primary mt-3">REGISTRASI AKUN</button>
    </form>
    <div class="form-footer">
        <a href="{{ url('/') }}">Sudah punya akun ?!, <span>Login disini</span></p>
    </div>
</x-layout_auth.app>
