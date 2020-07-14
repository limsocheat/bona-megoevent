@inject('page', 'App\Models\Page')
@php
$about = $page::select('*')->where('slug', 'about')->first();
@endphp
<div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="aboutLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aboutLabel">
                    {!! $about->title !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @inject('page', 'App\Models\Page')
                {!! $about->description !!}
            </div>
        </div>
    </div>
</div>