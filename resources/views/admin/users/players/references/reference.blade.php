@extends('admin.layouts.master')
@section('content')
    <livewire:admin.users.players.references.reference :player='$player' />
@endsection
