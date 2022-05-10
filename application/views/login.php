<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Login</title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?= base_url() ?>/assets/css/login.css" rel="stylesheet">
</head>

<body class="text-center">
	<form method="post" action="<?= site_url() ?>/login/auth" class="form-signin">
		<h1 class="h3 mb-3 font-weight-normal">Login</h1>
		<?php if($this->session->flashdata('message_login_error')): ?>
			<div class="alert alert-warning" role="alert">
				<?= $this->session->flashdata('message_login_error') ?>
			</div>
		<?php endif ?>
		<label for="inputUsername" class="sr-only">Nama Pengguna</label>
		<input type="text" name="username" id="inputUsername" class="form-control" placeholder="Nama Pengguna" required autofocus>
		<label for="inputPassword" class="sr-only">Kata Sandi</label>
		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Kata Sandi" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
		<p class="mt-5 mb-3 text-muted">PT. Digiwork Teknologi</p>
	</form>
</body>

</html>
