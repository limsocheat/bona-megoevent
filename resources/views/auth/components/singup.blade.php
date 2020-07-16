<div class="form-group">
	<label for="name" class=" col-form-label text-md-right">{{ ('Name') }}</label>
		<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
		@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
</div>

<div class="form-group">
	<label for="email" class=" col-form-label text-md-right">{{ ('E-Mail Address') }}</label>
		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
</div>

<div class="form-group">
	<label for="password" class=" col-form-label text-md-right">{{ ('Password') }}</label>
	<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
	@error('password')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>
<div class="form-group ">
	<label for="password-confirm" class="col-form-label text-md-right">{{ ('Confirm Password') }}</label>
	<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
	
</div>

	{{-- <div class="form-group row">
	
</div> --}}

<!-- <div class="form-group row">
	<div class="col-md-6 offset-md-4">
		@foreach ($roles as $role)
			<div class="form-check form-check-inline">
				<input name="role" class="form-check-input" type="radio" name="inlineRadioOptions" id="{{ $role->name }}" value="{{ $role->name }}">
				<label class="form-check-label" for="{{ $role->name }}">{{ $role->name }}</label>
			</div>
		@endforeach
	</div>
</div> -->

