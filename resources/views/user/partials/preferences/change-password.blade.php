<div class="section">
    <h2>{{ trans('user.preferences.change-password') }}</h2>
    <form action="{{ route('change-password') }}" method="post" id="change-password">
        {{ csrf_field() }}
        <label class="label">
            {{ trans('form.label.password-new') }}
            <input type="password" name="password" class="field{{$errors->has('password') ? ' error' : '' }}" required>
        </label>
        @if ($errors->has('password'))
            <span class="error">{{ $errors->first('password') }}</span>
        @endif
        <label class="label">
            {{ trans('form.label.password-new-confirmation') }}
            <input type="password" name="password_confirmation" class="field{{$errors->has('password') ? ' error' : '' }}" required>
        </label>
        @if ($errors->has('password_confirmation'))
            <span class="error">{{ $errors->first('password_confirmation') }}</span>
        @endif
        <label class="label">
            {{ trans('form.label.password-current') }}
            <input type="password" name="current_password" class="field{{$errors->has('password') ? ' error' : '' }}" required>
        </label>
        @if ($errors->has('current_password'))
            <span class="error">{{ $errors->first('current_password') }}</span>
        @endif
    </form>
    <div class="responsive-button">
        @include('user.partials.preferences.change-password-button')
    </div>
</div>
