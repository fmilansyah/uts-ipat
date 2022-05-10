<div class="container">
	<div class="row">
		<div class="col-12">
            <a href="<?= site_url() ?>/loans/add" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Tambah</a>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Peminjam</th>
						<th scope="col">Kode Buku</th>
						<th scope="col">Jumlah</th>
						<th scope="col">Tgl. Pinjam</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach ($loans as $loan) : ?>
                        <tr>
                            <td><?= $loan->nama_anggota ?></td>
                            <td><?= $loan->kd_buku ?></td>
                            <td><?= $loan->jumlah_pinjam ?></td>
                            <td><?= $loan->tanggal_pinjam ?></td>
                            <td>
                                <a href="<?= site_url() ?>/loans/edit/<?= $loan->kd_peminjaman ?>" class="btn btn-link btn-sm">Edit</a>
                                |
                                <a href="<?= site_url() ?>/loans/delete/<?= $loan->kd_peminjaman ?>" class="btn btn-link btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
