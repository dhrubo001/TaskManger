@extends('layouts.pages.main')
@section('content')
    <livewire:show-task :projectId="$projectId" />
@endsection
