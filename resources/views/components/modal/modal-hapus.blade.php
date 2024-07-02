<!-- Modal -->
<div class="modal fade " id="{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-delete modal-dialog-centered">
        <div class="modal-content ">
            <form action="{{ $action ?? '' }}" method="POST">
                @csrf
                <div class="modal-delete-body">
                    <i class="bi bi-exclamation-triangle"></i>
                    <h4>Hapus Data !</h4>
                    <p>Apakah anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-delete-footer">
                    <button type="submit" class="btn-hapus">TETAP HAPUS</button>
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">BATAL</button>
                </div>
            </form>
        </div>
    </div>
</div>
