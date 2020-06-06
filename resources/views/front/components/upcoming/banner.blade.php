<div id="app">
		@inject('banner', 'App\Models\Banner')
		@php
			$header_banner1    = $banner::select('*')->where('location', 'subheader1')->first();
			$header_banner2    = $banner::select('*')->where('location', 'subheader2')->first();
		@endphp
			<div class="bg-light" >
				<div class="container">
					<div class="row">
					<div class="col-md-8">
						<a class="navbar-brand" href="{{ $header_banner1->link }}">
							<img src="{{ $header_banner1->image }}" />
						</a>
					</div>
					<div class="col-md-4">
						<a class="navbar-brand" href="{{ $header_banner2->link }}">
							<img src="{{ $header_banner2->image }}" style="width: 300px;"/>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>  