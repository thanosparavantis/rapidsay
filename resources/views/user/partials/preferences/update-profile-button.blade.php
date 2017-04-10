<div class="btn-group">
    <button type="submit" name="submit" form="update-preferences" class="btn blue">
        <i class="fa fa-pencil-square-o space-right" aria-hidden="true"></i>
        {{ trans('form.button.update-profile') }}
    </button>

    <a href="{{ route('delete-account') }}" class="btn red">
        <i class="fa fa-trash space-right" aria-hidden="true"></i>
        {{ trans('form.button.delete-account') }}
    </a>
</div>
