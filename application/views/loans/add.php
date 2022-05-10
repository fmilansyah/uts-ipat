<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="<?= site_url() ?>/loans/save" method="post">
                <div class="form-group">
                    <label for="member_code">Nama Anggota</label>
                    <select name="member_code" class="form-control" id="member_code">
                        <?php foreach ($members as $member) : ?>
                            <option value="<?= $member->kd_anggota ?>"><?= $member->nama ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="book_code">Kode Buku</label>
                    <input type="number" name="book_code" class="form-control" id="book_code" required>
                </div>
                <div class="form-group">
                    <label for="qty">Jumlah Pinjam</label>
                    <input type="number" name="qty" class="form-control" id="qty" required>
                </div>
                <div class="form-group">
                    <label for="date">Tanggal Pinjam</label>
                    <input type="date" name="date" class="form-control" id="date" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>