<div class="form-group-login">
    <div class="form-group-icons">
        <i class="bi bi-{{ $leftIcons }}"></i>
    </div>
    <input type="{{ $type ??  'text' }}" name="{{ $name }}" placeholder="{{ $placeholder ??  '...' }}" class="form-control @error($name) is-invalid @enderror" value="@isset($value){{ $value }}@else{{ old($name) }}@endisset" autocomplete="off" >
    @isset($password)
        <div class="show-password">
            <i class="bi bi-eye-slash"></i>
        </div>
    @endisset
    @error('password')
        <span class="text-error">{{ $message }}</span>
    @enderror

</div>
