@extends('admin.layouts.app')

@section('content')
    <h1>
        {{ ucfirst($node_type) }} index
    </h1>
    <a href="{{ route('admin.node.create', [App\Constants\RouteConstants::NODE_TYPE => $node_type]) }}"
        class="btn btn-primary">New
        {{ $node_type }}
    </a>
    {{-- nodes  table --}}

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Node</th>
                <th>Created at</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($nodes as $node)
                <tr>
                    <td>{{ $node->id }}</td>
                    <td>
                        <a href="{{ route('admin.node.edit', $node) }}">
                            {{ $node->name }}
                        </a>
                    </td>
                    <td>{{ $node->created_at }}</td>


                </tr>
            @endforeach
        </tbody>
    @endsection
