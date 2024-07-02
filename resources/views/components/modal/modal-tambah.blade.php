<!-- Modal -->
<div class="modal fade " id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ $action ?? '' }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ $slot }}
            </form>
        </div>
    </div>
</div>
