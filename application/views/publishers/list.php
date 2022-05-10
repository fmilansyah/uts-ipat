<div class="container">
	<div class="row">
		<div class="col-12">
            <a href="<?= site_url() ?>/publishers/add" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Tambah</a>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Nama Penerbit</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach ($publishers as $publisher) : ?>
                        <tr>
                            <td><?= $publisher->nama ?></td>
                            <td>
                                <a href="<?= site_url() ?>/publishers/edit/<?= $publisher->kd_penerbit ?>" class="btn btn-link btn-sm">Edit</a>
                                |
                                <a href="<?= site_url() ?>/publishers/delete/<?= $publisher->kd_penerbit ?>" class="btn btn-link btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
