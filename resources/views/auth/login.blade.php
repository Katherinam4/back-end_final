<form method="POST" action="/login">
    @csrf


    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>


    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>


    <label for="remember">
        <input type="checkbox" name="remember" id="remember"> Remember me
    </label>


    <a href="{{ route('signup') }}" style="font-size: 16px; color: #333;">Register</a>


    <button type="submit">Log in</button>
</form>