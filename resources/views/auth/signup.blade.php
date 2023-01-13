<form method="POST" action="/signup">
    @csrf

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <label for="password_confirmation">Repeat Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" required>

    <button type="submit">Sign up</button>
</form>