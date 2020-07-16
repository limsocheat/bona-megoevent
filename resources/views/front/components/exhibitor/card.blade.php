<a href="{{ route('exhibitor.show', $exhibitor->id) }}">
    <div class="card border-light">
        <img src="{{ asset($exhibitor->exhibitor_image) }}" alt="{{ $exhibitor->exhibitor_name }}" class="card-img-top">
        <div class="card-body">
            <h3 class="card-title multi-line-truncate" id="h3" style="max-lines: 2">
                {{ $exhibitor->exhibitor_name }}
            </h3>
        </div>
    </div>
</a>