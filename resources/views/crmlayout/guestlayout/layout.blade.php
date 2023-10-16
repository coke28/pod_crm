{{-- extend metronic layout base --}}
@extends('crmlayout.base')
@section('content')

{{-- include nav --}}
@include('crmlayout.guestlayout.guestnav.view')

{{-- yield content for guestcontent --}}
@yield('guestcontent')

{{-- include footer --}}
@include('crmlayout.guestlayout.guestfooter.view')

@endsection