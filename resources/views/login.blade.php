<x-layout_auth.app>
    <div class="form-header">
        <img src="{{ asset('public/img/logo-dark.svg') }}" alt="logo">
    </div>
    <form action="{{ url('aksiLogin') }}" method="POST">
        @csrf
        <x-input.inputlogin name="email" placeholder="Masukan email" leftIcons="envelope"/>
        <x-input.inputlogin name="password" placeholder="Masukan password" leftIcons="lock" type="password" password/>
        <button type="submit" class="btn btn-primary mt-3">Login</button>
    </form>
    <div class="form-footer">
        <a href="{{ url('registrasi') }}">Belum punya akun ?!, <span>Daftar akun baru</span></p>
    </div>
</x-layout_auth.app>
