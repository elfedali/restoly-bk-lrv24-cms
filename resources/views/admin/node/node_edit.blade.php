@extends('admin.layouts.app')

@section('content')
    <h2> Edit node
        <u>{{ $node->name }}</u>
    </h2>
    @include('admin.node._form', ['node_type' => $node->type, 'node' => $node])
@endsection
