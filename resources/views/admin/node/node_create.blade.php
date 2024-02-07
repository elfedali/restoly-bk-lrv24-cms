@extends('admin.layouts.app')

@section('content')
    <h1>
        Create new {{ $node_type }}
    </h1>
    <form action="{{ route('admin.node', [App\Constants\RouteConstants::NODE_TYPE => $node_type]) }}" method="post">
        @csrf

        <input type="text" name="name" placeholder="name" required>
        <textarea name="body" placeholder="body" required></textarea>

        <button type="submit">add</button>
    </form>
@endsection
