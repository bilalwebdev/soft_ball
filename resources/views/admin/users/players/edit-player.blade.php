@extends('admin.layouts.master')
@section('content')
    <livewire:admin.users.players.edit-player :player='$player' />
@endsection
