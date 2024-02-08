@extends('admin.layouts.app')

@section('content')
    <h1>
        Create new {{ $node_type }}
    </h1>
    @include('admin.node._form', ['node_type' => $node_type])
@endsection
