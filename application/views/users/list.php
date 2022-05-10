<div class="container">
	<div class="row">
		<div class="col-12">
            <a href="<?= site_url() ?>/users/add" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Tambah</a>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Nama Lengkap</th>
						<th scope="col">Nama Pengguna</th>
						<th scope="col">Status</th>
						<th scope="col">Level</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user->nama ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->status == 0 ? 'Tidak Aktif' : 'Aktif' ?></td>
                            <td><?= $user->level == 1 ? 'Admin' : 'Pengguna' ?></td>
                            <td>
                                <a href="<?= site_url() ?>/users/edit/<?= $user->kd_users ?>" class="btn btn-link btn-sm">Edit</a>
                                |
                                <a href="<?= site_url() ?>/users/delete/<?= $user->kd_users ?>" class="btn btn-link btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
