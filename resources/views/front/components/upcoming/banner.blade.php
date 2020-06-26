
	@inject('banner', 'App\Models\Banner')
	@php
		$header_banner1    = $banner::select('*')->where('location', 'subheader1')->first();
		$header_banner2    = $banner::select('*')->where('location', 'subheader2')->first();
	@endphp
		<div>
			<div class="container">
				<div class="row">
					@if ($header_banner1) 
						<div class="col-md-6">
							<a class="navbar-brand" href="{{ $header_banner1->link }}">
								<img src="{{ asset($header_banner1->image) }}" style="width :100%; height: auto;"/>
							</a>
						</div>
					@endif
					@if ($header_banner2) 
						<div class="col-md-6 pr-0">
							<a class="navbar-brand" href="{{ $header_banner2->link }}">
								<img src="{{ asset($header_banner2->image) }}" style="width :100%; height: auto;" class="pull-right"/>
							</a>
						</div>
					@endif
				</div>
			</div>
		</div>
