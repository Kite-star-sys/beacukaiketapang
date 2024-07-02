<a href="{{ $action   ??   '#' }}">
    <div class="notif-icons">
        <i class="bi bi-file-arrow-down"></i>
    </div>
    <div class="notif-content">
        <div class="notif-top">
            <span class="name">{{ $title  ?? '' }}</span>
            <span class="time">{{ $time  ?? '' }}</span>
        </div>
        <div class="notif-bottom">
            <p>{{ $pesan ?? '' }}</p>
        </div>
    </div>

</a>
