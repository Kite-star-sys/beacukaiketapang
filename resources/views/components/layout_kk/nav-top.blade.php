<div class="header-top ">
    <div class="logo">
        <img src="{{ asset('public/img/light-logo.svg') }}" alt="logo" class="logo-lg">
        <img src="{{ asset('public/img/logo-mini.svg') }}" alt="logo" class="logo-sm">
    </div>
    <ul class="top-menu smooth-shadow">
        <!-- Dropdown notifikasi-->
        <li class="dropdown">
            <a href="#" class="menu-item" data-bs-toggle="dropdown">
                <i class="bi bi-envelope"></i>
                <span class="budge budge-success"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end top-menu-dropdown dropdown-notif">
                <li class="header">
                    <h2>Notifikasi</h2>
                    <span class="budge budge-primary">2</span>
                </li>
                <li class="body">
                    <x-budge.budge-card
                        action="#"
                        title="Kepala Kantor"
                        time="12 Min"
                        pesan="Mengajukan surat ANCSSFG"
                    />
                    <x-budge.budge-card
                        action="#"
                        title="Kepala Kantor"
                        time="12 Min"
                        pesan="Mengajukan surat ANCSSFG"
                    />
                </li>
            </ul>
        </li>
        <!-- -------------- -->
        <li class="dropdown">
            <a href="#" class="menu-item" data-bs-toggle="dropdown">
                <img src="{{ asset('public/img/user.jpg') }}" alt="icon-user">
                <div class="menu-item-text">
                    <span class="name">Kepala Kantor</span>
                    <span class="email">kepala@kantor.com</span>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end top-menu-dropdown">
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>


                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-item nav-top-toggle-menu">
                <i class="bi bi-list"></i>
            </a>
        </li>
    </ul>
</div>
