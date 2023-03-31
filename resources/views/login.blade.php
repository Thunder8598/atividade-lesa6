<!DOCTYPE html>
<html>
<head></head>

<body>
<form method="POST" action="{{ route('auth') }}">
    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
        @error('email')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        @error('password')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember Me</label>
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
</body>

</html>
