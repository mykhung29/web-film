<h1>Login</h1>
<?php if(isset($error)): ?><p style="color:red"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form action="/login" method="POST">
    <label>Username: <input type="text" name="username"></label><br>
    <label>Password: <input type="password" name="password"></label><br>
    <button type="submit">Login</button>
</form>
