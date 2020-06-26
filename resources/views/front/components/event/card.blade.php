<div class="card border-light event-card">
    <img src="{{ asset($event->image_url) }}" alt="{{ $event->name }}" class="card-img-top" style="width: auto; height:172px;">
    <div class="card-body">
        <div class="row">
            <div class="col-7">
                <h5 class="text-truncate font-weight-bold" style="max-lines: 1">
                    {{ $event->display_start_date }}</h5>
            </div>
            {{-- <div class="col-5 text-right"> --}}
            <a href="{{ route('event', $event->id) }}"
                class="ml-auto mr-2 btn btn-sm btn-outline-dark stretched-link">Join Now</a>
            {{-- </div> --}}
        </div>
        <h3 class="card-title multi-line-truncate" id="h3" style="max-lines: 2">{{ $event->name }}</h3>
        <p class="card-text multi-line-truncate">{!! $event->description !!}</p>
    </div>
</div>