@extends('layouts.full-page')
@section('title', $user->fullName())

@section('content')

@include('user.partials.profile.activity', ['activity' => $user->getActivityPaginator(), 'item' => $user])

@endsection

@section('scripts')

@endsection
