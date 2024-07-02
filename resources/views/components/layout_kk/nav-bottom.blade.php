
@php
    $dashboard =  Request::is('kepala_kantor') ? 'active' : '';
    $layanan =  Request::is('kepala_kantor/layanan*') ? 'active' : '';
    $staf =  Request::is('kepala_kantor/staf*') ? 'active' : '';

@endphp

<div class="header-bottom">
    <ul class="bottom-menu">
        <li class="menu-item {{ $dashboard }}">
            <a href="{{ url('/kepala_kantor') }}">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-item {{ $staf }}">
            <a href="{{ url('/kepala_kantor/staf') }}">
                <i class="bi bi-people"></i>
                <span>Data Staf</span>
            </a>
        </li>
        <li class="menu-item {{ $layanan }}">
            <a href="{{ url('/kepala_kantor/layanan') }}">
                <i class="bi bi-sort-alpha-down"></i>
                <span>Data Layanan</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('/kepala_kantor/surat') }}">
                <i class="bi bi-file-earmark-diff"></i>
                <span>Data Surat Masuk</span>
            </a>
        </li>
    </ul>
</div>
