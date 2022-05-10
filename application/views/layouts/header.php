<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?= $pageTitle; ?></title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px;">
		<a class="navbar-brand" href="#">Menu</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Buku
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= site_url() ?>/books">Daftar Buku</a>
						<a class="dropdown-item" href="<?= site_url() ?>/bookTypes">Jenis Buku</a>
						<a class="dropdown-item" href="<?= site_url() ?>/publishers">Penerbit</a>
						<a class="dropdown-item" href="<?= site_url() ?>/authors">Pengarangan</a>
					</div>
				</li>
                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Anggota
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= site_url() ?>/members">Daftar Anggota</a>
						<a class="dropdown-item" href="<?= site_url() ?>/users">Pengguna</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url() ?>/loans">Peminjaman</a>
				</li>
			</ul>
			<form action="<?= site_url() ?>/logout" method="post class="form-inline my-2 my-lg-0">
				<button class="btn btn-outline-danger my-2 my-sm-0" value="logout" type="submit">Logout</button>
			</form>
		</div>
	</nav>

	<?php if($this->session->flashdata('success')): ?>
		<div class="container" style="margin-bottom: 20px;">
			<div class="row">
				<div class="col-12">
					<div class="alert alert-success" role="alert">
						<?= $this->session->flashdata('success') ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>
