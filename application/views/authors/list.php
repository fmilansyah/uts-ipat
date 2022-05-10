<div class="container">
	<div class="row">
		<div class="col-12">
            <a href="<?= site_url() ?>/authors/add" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Tambah</a>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Nama Pengarang</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach ($authors as $author) : ?>
                        <tr>
                            <td><?= $author->nama ?></td>
                            <td>
                                <a href="<?= site_url() ?>/authors/edit/<?= $author->kd_pengarang ?>" class="btn btn-link btn-sm">Edit</a>
                                |
                                <a href="<?= site_url() ?>/authors/delete/<?= $author->kd_pengarang ?>" class="btn btn-link btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
