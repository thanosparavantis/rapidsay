<label class="uploader">
    <i class="fa fa-camera" aria-hidden="true"></i>
    <span data-type="count" style="display:none"></span>
    <input type="file" name="{{ $name }}" accept="image/jpeg,image/png,image/bmp" class="custom-uploader" {{ (!isset($single) || !$single) ? 'multiple' : '' }}>
</label>
