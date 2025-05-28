@extends('layouts.pages.main')
@section('content')
    <livewire:activity-logs :taskId="$taskId" />
@endsection
