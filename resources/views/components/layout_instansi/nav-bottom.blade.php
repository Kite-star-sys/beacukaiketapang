
@php
    $dashboard =  Request::is('instansi') ? 'active' : '';
    $pengajuan =  Request::is('instansi/pengajuan*') ? 'active' : '';

@endphp

<div class="header-bottom">
    <ul class="bottom-menu">
        <li class="menu-item {{ $dashboard }}">
            <a href="{{ url('/instansi') }}">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-item {{ $pengajuan }}">
            <a href="{{ url('/instansi/pengajuan') }}">
                <i class="bi bi-file-earmark-diff"></i>
                <span>Data Pengajuan Surat</span>
            </a>
        </li>
    </ul>
</div>
