<div>
    <ul>
        <li>
            <a href="{{ route('admin.dashboard') }}">{{ __('label.dashboard') }}</a>
        </li>
        <li>
            <a
                href="{{ route('admin.node', [App\Constants\RouteConstants::NODE_TYPE => App\Constants\RouteConstants::NODE_TYPE_POST]) }}">
                {{ __('label.posts') }}
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.term') }}">
                        {{ __('label.categories') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.term') }}">
                        {{ __('label.tags') }}
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a
                href="{{ route('admin.node', [App\Constants\RouteConstants::NODE_TYPE => App\Constants\RouteConstants::NODE_TYPE_PAGE]) }}">
                {{ __('label.pages') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.node', [App\Constants\RouteConstants::NODE_TYPE => 'shop']) }}">
                {{ __('label.shops') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.upload') }}">
                {{ __('label.media') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.comment') }}">
                {{ __('label.comments') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.user') }}">
                {{ __('label.users') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.option') }}">
                {{ __('label.options') }}
            </a>
        </li>

    </ul>
</div>
