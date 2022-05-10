<div class="container">
	<div class="row">
		<div class="col-12">
            <a href="<?= site_url() ?>/members/add" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Tambah</a>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Nama Anggota</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach ($members as $member) : ?>
                        <tr>
                            <td><?= $member->nama ?></td>
                            <td>
                                <a href="<?= site_url() ?>/members/edit/<?= $member->kd_anggota ?>" class="btn btn-link btn-sm">Edit</a>
                                |
                                <a href="<?= site_url() ?>/members/delete/<?= $member->kd_anggota ?>" class="btn btn-link btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
