<!-- Modal -->
<div class="modal fade " id="modalError" tabindex="-1" aria-labelledby="modalErrorLabel" aria-hidden="true">
    <div class="modal-dialog modal-delete modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-delete-body">
                <i class="bi bi-exclamation-triangle"></i>
                <h4>Error !</h4>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modalSuccess" tabindex="-1" aria-labelledby="modalSuccessLabel" aria-hidden="true">
    <div class="modal-dialog modal-delete modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-delete-body">
                <i class="bi bi-check-circle-fill modal-icons-success"></i>
                <h4>Success !</h4>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    </div>
</div>

@push('js')
    @if (session('error'))
        <script>
            $(document).ready(function() {
                $('#modalError').modal('show');
                setTimeout(() => {
                    $('#modalError').modal('hide');
                }, 2000);
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            $(document).ready(function() {
                $('#modalSuccess').modal('show');
                setTimeout(() => {
                    $('#modalSuccess').modal('hide');
                }, 2000);
            });
        </script>
    @endif
@endpush
