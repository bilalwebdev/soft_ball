@extends('admin.layouts.master')
@section('content')
    @push('active-users')
        side-menu--active
    @endpush
    @push('active-players')
        side-menu--active
    @endpush
    @push('open-users')
        side-menu__sub-open
    @endpush
    <livewire:admin.tournaments.edit-content :tournament='$tournament'/>
@endsection
