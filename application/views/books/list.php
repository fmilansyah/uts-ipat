<div class="container">
	<div class="row">
		<div class="col-12">
            <a href="<?= site_url() ?>/books/add" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Tambah</a>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Judul Buku</th>
						<th scope="col">Jenis Buku</th>
						<th scope="col">Penerbit</th>
						<th scope="col">Pengarang</th>
						<th scope="col">Stok</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <td><?= $book->judul ?></td>
                            <td><?= $book->nama_jenis_buku ?></td>
                            <td><?= $book->nama_penerbit ?></td>
                            <td><?= $book->nama_pengarang ?></td>
                            <td><?= $book->stok ?></td>
                            <td>
                                <a href="<?= site_url() ?>/books/edit/<?= $book->kd_buku ?>" class="btn btn-link btn-sm">Edit</a>
                                |
                                <a href="<?= site_url() ?>/books/delete/<?= $book->kd_buku ?>" class="btn btn-link btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
