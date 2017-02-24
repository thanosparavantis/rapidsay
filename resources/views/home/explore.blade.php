@extends('layouts.full-page')
@section('title', trans('page.title.explore'))

@section('content')

@include('home.partials.explore.search')
@include('home.partials.explore.results')

@endsection

@section('scripts')
    <script src="{{ asset('js/AjaxPaginator.js') }}"></script>
    <script src="{{ asset('js/explore/AjaxSearch.js') }}"></script>
    <script src="{{ asset('js/explore/ExploreLoader.js') }}"></script>
@endsection
