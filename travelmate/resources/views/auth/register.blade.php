    <div class="form-container sign-up-container">
		<form role="form" method="POST" action="{{ route('register') }}">
			{{ csrf_field() }}
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus/>
			@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
			<input type="email" placeholder="Email" name="email" value="{{ old('email') }}"/>
			@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
			<input type="password" placeholder="Password" name="password" required/>
			@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
								@endif
			<input type="password" name="password_confirmation" required>
			<button type="submit">Sign Up</button>
		</form>
	</div>
<div class="overlay-panel overlay-right">
    <h1>Hello, Friend!</h1>
    <p>Enter your personal details and start journey with us</p>
    <button class="ghost" id="signUp">Sign Up</button>
</div>

