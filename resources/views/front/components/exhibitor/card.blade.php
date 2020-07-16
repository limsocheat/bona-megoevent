<style type="text/css">
    .exhibitor-feature-image {
        max-height: 100%;
        height: auto;
        max-height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .exhibitor-card {
        height: 300px;
        margin-bottom: 10px;
    }

    .exhibitor-card:hover {
        box-shadow: 0 20px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }
</style>

<div class="card border-light exhibitor-card ">
    <a class="text-decoration-none" href="{{ route('exhibitor.show', $exhibitor->id) }}">
        <img src="{{ asset($exhibitor->exhibitor_image) }}" alt="{{ $exhibitor->exhibitor_name }}"
            class="exhibitor-feature-image">
        <div class="card-body">
            <h3 class="card-title multi-line-truncate " id="h3" style="max-lines: 2">
                {{ $exhibitor->exhibitor_name }}
            </h3>
        </div>
    </a>
</div>