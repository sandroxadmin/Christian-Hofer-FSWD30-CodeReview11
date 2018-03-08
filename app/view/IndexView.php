<div class="row" style="padding-top: 10px">
  <div class="col-3">
  </div>
  <div class="col-6">
    <h1>Welcome to CarSharingManager 1.0</h1>
    <?php if (!$param['isLoggedIn']): ?>
      <br />
      <h2> Login </h2>
      <form action="login" method="post">
        email: <input type="text" name="email" /><br />
        password: <input type="password" name="password" /><br />
        <input type="submit" value="Login" />
      </form>
      (Demo: email: example@example.com, password: example)
    <?php else: ?>
      Sie sind angemeldet.
    <?php endif; ?>
  </div>
  <div class="col-3">
  </div>
</div>
