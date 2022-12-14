@extends('admin.layouts.master')
@section('content')
@push('active-users')
      side-menu--active
@endpush
@push('active-admins')
      side-menu--active
@endpush
@push('open-users')
      side-menu__sub-open
@endpush
<livewire:admin.users.admin.edit-admin :admin='$admin'/>
@endsection
