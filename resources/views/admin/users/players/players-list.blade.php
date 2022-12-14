@extends('admin.layouts.master')

@section('content')
    <div>
        <livewire:admin.users.players.add-player :id="$id" />
    </div>
    <div>
        <livewire:admin.users.players.players-list :id="$id" />
    </div>
@endsection
