@extends('admin.layouts.app')

@section('content')
    <div class="">
        <h3 class="me-4">
            {{ ucfirst($node_type) }}s
        </h3>
        <a href="{{ route('admin.node.create', [App\Constants\RouteConstants::NODE_TYPE => $node_type]) }}"
            class="btn btn-sm btn-outline-primary">Add New
            {{ $node_type }}
        </a>
    </div>
    {{-- nodes  table --}}

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>{{ __('label.id') }}</th>
                <th>{{ __('label.title') }}</th>
                <th>{{ __('label.author') }}</th>
                <th>{{ __('label.categories') }}</th>
                <th>{{ __('label.tags') }}</th>
                <th>{{ __('label.created_at') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nodes as $node)
                <tr>
                    <td>{{ $node->id }}</td>
                    <td>
                        <a href="{{ route('admin.node.edit', $node) }}">
                            {{ $node->title }}
                        </a>
                    </td>
                    <td>{{ $node->owner->name }}</td>
                    <td>
                        _
                    </td>
                    <td>
                        _
                    </td>
                    <td>

                        {{ $node->created_at->diffForHumans() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    @endsection
