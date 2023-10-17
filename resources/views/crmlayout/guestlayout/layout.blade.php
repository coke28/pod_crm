
@extends('crmlayout.base')
@section('content')

@include('crmlayout.guestlayout.guestnav.view')

@yield('guestcontent')

@include('crmlayout.guestlayout.guestfooter.view')

@endsection