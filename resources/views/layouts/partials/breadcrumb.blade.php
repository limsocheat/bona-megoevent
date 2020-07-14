<nav class="bg-white shadow-sm pt-0 pb-0 " aria-label="breadcrumb">
    <div class="container">
        <ul class="breadcrumb"
            style="margin-bottom: 0; padding-left: 0; padding-top: 3px; padding-bottom: 3px; background-color: transparent;">
            <li class="breadcrumb-item text-capitalize{{ $breadcrumbs->isEmpty() ? 'active' : '' }}"><a
                    href="{{ route('index') }}" style="padding: 0">Home</a></li>
            @foreach ($breadcrumbs as $key => $url)
            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}"
                aria-current="{{ $loop->last ? 'page' : '' }}">
                <a href="{{ url($url) }}" style="padding: 0">
                    @if (! $loop->last)
                    {{ ucfirst($key) }}
                    @else
                    @yield ('title')
                    @endif
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</nav>