<div class="form-group">
	<label for="email" class=" col-form-label text-md-right">{{ ('E-Mail Address *') }}</label>
	<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
		value="{{ old('email') }}" required autocomplete="email">
	@error('email')
	<span class="invalid-feedback" role="alert">
		<strong>{{ $message }}</strong>
	</span>
	@enderror
</div>

<div class="form-group">
	<label for="password" class=" col-form-label text-md-right">{{ ('Password *') }}</label>
	<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
		required autocomplete="new-password">
	@error('password')
	<span class="invalid-feedback" role="alert">
		<strong>{{ $message }}</strong>
	</span>
	@enderror
</div>
<div class="form-group ">
	<label for="password-confirm" class="col-form-label text-md-right">{{ ('Confirm Password *') }}</label>
	<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
		autocomplete="new-password">
</div>