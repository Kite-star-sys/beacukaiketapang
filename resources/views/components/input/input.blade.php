<div class="form-group mb-3">
    <label for="{{ $label ?? '' }}">{{ $label ?? '' }}</label>
    <input type="{{ $type ?? 'text' }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name ?? '' }}" value="@isset($value){{ $value }}@else{{ old($name) }}@endisset" placeholder="{{ $placeholder ?? '' }}" accept="{{ $accept ?? '' }}">
    @error($name)
        <span class="float-end text-danger">{{ $message }} </span>
    @enderror

</div>
