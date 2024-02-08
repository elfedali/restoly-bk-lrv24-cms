<div class="">
    @if (isset($node))
        <form action="{{ route('admin.node.edit', $node) }}" method="post">
            @method('put')
        @else
            <form action="{{ route('admin.node', [App\Constants\RouteConstants::NODE_TYPE => $node_type]) }}"
                method="post">
    @endif
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">
            {{ __('label.title') }}
            <span class="text-danger">*</span></label>
        <input type="text" name="title" placeholder=" {{ __('label.title') }}" required class="form-control"
            value="{{ $node->title ?? '' }}">

    </div>
    <div class="mb-3">
        <label for="body" class="form-label">
            {{ __('label.body') }}
        </label>
        <textarea name="body" placeholder=" {{ __('label.body') }}" class="form-control">{{ $node->body ?? '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="excerpt" class="form-label">
            {{ __('label.excerpt') }}
        </label>
        <textarea name="excerpt" placeholder=" {{ __('label.excerpt') }}" class="form-control">{{ $node->excerpt ?? '' }}</textarea>
    </div>




    <div class="mb-3">
        <label class="form-label">
            {{ __('label.categories') }}
        </label>
        <div class="checkbox-group">
            @foreach ($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}"
                        id="category_{{ $category->id }}" @if (isset($node) && $node->terms->contains($category->id)) checked @endif>
                    <label class="form-check-label" for="category_{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">
            {{ __('label.tags') }}
        </label>
        <div class="checkbox-group">
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        id="tag_{{ $tag->id }}" @if (isset($node) && $node->terms->contains($tag->id)) checked @endif>
                    <label class="form-check-label" for="tag_{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    {{-- status --}}
    <div class="mb-3">
        <label for="status" class="form-label">
            {{ __('label.status') }}
        </label>
        <select name="status" class="form-select">
            <option value="published" @if (isset($node) && $node->status == 'published') selected @endif>
                {{ __('label.published') }}
            </option>
            <option value="draft" @if (isset($node) && $node->status == 'draft') selected @endif>
                {{ __('label.draft') }}
            </option>
        </select>
    </div>
    {{-- comment status --}}
    <div class="mb-3">
        <label for="comment_status" class="form-label">
            {{ __('label.comment-status') }}
        </label>
        <select name="comment_status" class="form-select">
            <option value="open" @if (isset($node) && $node->comment_status == 'open') selected @endif>
                {{ __('label.open') }}
            </option>
            <option value="closed" @if (isset($node) && $node->comment_status == 'closed') selected @endif>
                {{ __('label.closed') }}
            </option>
        </select>
    </div>




    @if (isset($node))
        <button type="submit" class="btn btn-primary">
            {{ __('label.update') }}
        </button>
    @else
        <button type="submit" class="btn btn-primary">
            {{ __('label.create') }}
        </button>
    @endif





    </form>


</div>
