
@php
    $dashboard =  Request::is('staf_kantor') ? 'active' : '';
    $instansi =  Request::is('staf_kantor/instansi*') ? 'active' : '';
    $surat =  Request::is('staf_kantor/surat*') ? 'active' : '';
@endphp

<div class="header-bottom">
    <ul class="bottom-menu">
        <li class="menu-item {{ $dashboard }}">
            <a href="{{ url('/staf_kantor') }}">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-item {{ $instansi }}">
            <a href="{{ url('/staf_kantor/instansi') }}">
                <i class="bi bi-people"></i>
                <span>Data Instansi</span>
            </a>
        </li>
        <li class="menu-item {{ $surat }}">
            <a href="{{ url('/staf_kantor/surat') }}">
                <i class="bi bi-file-earmark-diff"></i>
                <span>Data Surat Masuk</span>
            </a>
        </li>
    </ul>
</div>
