<div class="section">
    <h2>{{ trans('user.preferences.update_profile') }}</h2>
    <form action="{{ route('update-profile') }}" method="post" id="update-preferences" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="content-group">
            <div class="section">
                <label class="label">
                    {{ trans('form.label.first_name') }}
                    <input type="text" name="first_name" class="field{{$errors->has('first_name') ? ' error' : '' }}" value="{{ auth()->user()->first_name }}" maxlength="35">
                </label>
                @if ($errors->has('first_name'))
                    <span class="error">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
            <div class="section">
                <label class="label">
                    {{ trans('form.label.last_name') }}
                    <input type="text" name="last_name" class="field{{$errors->has('last_name') ? ' error' : '' }}" value="{{ auth()->user()->last_name }}" maxlength="35">
                </label>
                @if ($errors->has('last_name'))
                    <span class="error">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
        </div>

        <label class="label">
            {{ trans('form.label.description') }}
            <textarea name="description" id="description" class="field{{$errors->has('description') ? ' error' : '' }}" maxlength="300" rows="2">{{ auth()->user()->description }}</textarea>
        </label>
        @if ($errors->has('description'))
            <span class="error">{{ $errors->first('description') }}</span>
        @endif

        <label class="label">
            {{ trans('form.label.picture') }}
            <div class="profile-picture-update">
                @include('partials.profile-picture', ['user' => auth()->user()])
                <div class="upload">
                    <input type="file" name="profile_picture">
                    @if (auth()->user()->profile_picture)<a href="{{ route('delete-profile-picture') }}">{{ trans('user.preferences.remove_profile_picture') }}</a>@endif
                </div>
            </div>
        </label>
        @if ($errors->has('profile_picture'))
            <span class="error">{{ $errors->first('profile_picture') }}</span>
        @endif
    </form>

    <div class="responsive-button">
        @include('user.partials.preferences.update-profile-button')
    </div>
</div>
