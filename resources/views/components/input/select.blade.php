<div class="form-group mb-3">
    <label for="{{ $label ?? '' }}">{{ $label ?? '' }}</label>
    <select name="{{ $name ?? '' }}" id="{{ $name }}" class="form-select @error($name) is-invalid @enderror">
        {{ $slot }}
    </select>
    @error($name)
        <span class="float-end text-danger">{{ $message }} </span>
    @enderror
</div>
