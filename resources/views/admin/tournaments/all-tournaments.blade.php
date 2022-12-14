@extends('admin.layouts.master')
@section('content')
@push('active-tournaments')
      side-menu--active
@endpush
 <livewire:admin.tournaments.all-tournaments>
@endsection
