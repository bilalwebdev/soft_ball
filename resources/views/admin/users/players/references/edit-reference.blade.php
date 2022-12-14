@extends('admin.layouts.master')
@section('content')
    <livewire:admin.users.players.references.edit-reference :reference='$reference' />
@endsection
