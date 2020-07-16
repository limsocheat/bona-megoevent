<style type="text/css">
    .event-feature-image {
        max-height: 100%;
        height: auto;
        height: 180px;
        width: 100%;
        object-fit: cover;
    }
</style>

<div class="card border-light event-card">
    <img src="{{ asset($event->image_url) }}" alt="{{ $event->name }}" class="card-img-top event-feature-image">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-7 mt-2">
                <h5 class="text-truncate font-weight-bold mb-0" style="max-lines: 1">
                    {{ $event->display_start_date }}</h5>
            </div>
            <a href="{{ route('event', $event->id) }}"
                class="ml-auto mr-2 btn btn-sm stretched-link white-text mego-gold-bg" style="background-color: #C5B358;
                color: white; height: 30px">Join
                Now</a>
        </div>
        <h3 class="card-title multi-line-truncate" id="h3" style="max-lines: 2; margin-left: 0; padding: 0;">
            {{ $event->name }}</h3>
        <p class="card-text multi-line-truncate">{!! $event->description !!}</p>
    </div>
</div>