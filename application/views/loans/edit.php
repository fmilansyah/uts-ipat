<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="<?= site_url() ?>/loans/update" method="post">
                <div class="form-group" style="display: none;">
                    <label for="code">Kode Peminjaman</label>
                    <input type="text" name="code" class="form-control" id="code" value="<?= $loan->kd_peminjaman ?>" required>
                </div>
                <div class="form-group">
                    <label for="member_code">Nama Anggota</label>
                    <select name="member_code" class="form-control" id="member_code">
                        <?php foreach ($members as $member) : ?>
                            <option value="<?= $member->kd_anggota ?>" <?= $member->kd_anggota == $loan->kd_anggota ? 'selected' : '' ?>><?= $member->nama ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="book_code">Kode Buku</label>
                    <input type="number" name="book_code" class="form-control" id="book_code" value="<?= $loan->kd_buku ?>" required>
                </div>
                <div class="form-group">
                    <label for="qty">Jumlah Pinjam</label>
                    <input type="number" name="qty" class="form-control" id="qty" value="<?= $loan->jumlah_pinjam ?>" required>
                </div>
                <div class="form-group">
                    <label for="date">Tanggal Pinjam</label>
                    <input type="date" name="date" class="form-control" id="date" value="<?= $loan->tanggal_pinjam ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>