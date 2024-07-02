<!-- Modal -->
<div class="modal fade " id="{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-delete modal-dialog-centered">
        <div class="modal-content ">
            <form action="{{ $action ?? '' }}" method="POST">
                @csrf
                <div class="modal-delete-body">
                    <i class="bi bi-{{ $icons ?? 'exclamation-triangle' }}" style="{{ $style ?? '' }}"></i>
                    <h4>{{ $title ?? 'Hapus Data !' }}</h4>
                    <p>{{ $subtitle ?? '' }}</p>
                </div>
                <div class="modal-delete-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn-{{ $classBtnSubmit ?? 'hapus' }}">{{ $textSumbit ?? 'HAPUS' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
