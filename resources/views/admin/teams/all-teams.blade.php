@extends('admin.layouts.master')
@section('content')
@push('active-teams')
      side-menu--active
@endpush

@can('add team')

<livewire:admin.teams.add-team>
@endcan
 <livewire:admin.teams.all-teams>
@endsection
