@extends('admin.layouts.master')
@push('active-users')
      side-menu--active
@endpush
@push('active-admins')
      side-menu--active
@endpush
@push('open-users')
      side-menu__sub-open
@endpush
@section('content')
<livewire:admin.users.admin.add-admin />
@endsection
