<div class="alert warning" id="ie-alert" style="display:none">
    <div class="icon">
        <i class="fa fa-{{ config('glyphicons.warning') }}" aria-hidden="true"></i>
    </div>
    <p>{!! trans('app.ie-alert') !!}</p>
</div>

@if ($success = session('success'))
    <div class="alert success">
        <div class="icon">
            <i class="fa fa-{{ config('glyphicons.success') }}" aria-hidden="true"></i>
        </div>
        <p>{{ $success }}</p>
        <div class="close like-link flex-left">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
    </div>
@endif

@if ($warning = session('warning'))
    <div class="alert warning">
        <div class="icon">
            <i class="fa fa-{{ config('glyphicons.warning') }}" aria-hidden="true"></i>
        </div>
        <p>{{ $warning }}</p>
        <div class="close like-link flex-left">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
    </div>
@endif

@if ($error = session('error'))
    <div class="alert error">
        <div class="icon">
            <i class="fa fa-{{ config('glyphicons.error') }}" aria-hidden="true"></i>
        </div>
        <p>{{ $error }}</p>
        <div class="close like-link flex-left">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
    </div>
@endif

@if ($status = session('status'))
    <div class="alert">
        <div class="icon">
            <i class="fa fa-{{ config('glyphicons.status') }}" aria-hidden="true"></i>
        </div>
        <p>{{ $status }}</p>
        <div class="close like-link flex-left" onclick="hide(this)">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
    </div>
@endif
