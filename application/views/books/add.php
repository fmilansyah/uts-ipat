<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="<?= site_url() ?>/books/save" method="post">
                <div class="form-group">
                    <label for="code">Kode Buku</label>
                    <select name="code" class="form-control" id="code">
                        <?php foreach ($loans as $loan) : ?>
                            <option value="<?= $loan->kd_buku ?>"><?= $loan->kd_buku ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" class="form-control" id="title" required autofocus>
                </div>
                <div class="form-group">
                    <label for="kd_jenis_buku">Jenis Buku</label>
                    <select name="kd_jenis_buku" class="form-control" id="kd_jenis_buku">
                        <?php foreach ($bookTypes as $bookType) : ?>
                            <option value="<?= $bookType->kd_jenis_buku ?>"><?= $bookType->nama ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kd_penerbit">Penerbit</label>
                    <select name="kd_penerbit" class="form-control" id="kd_penerbit">
                        <?php foreach ($publishers as $publisher) : ?>
                            <option value="<?= $publisher->kd_penerbit ?>"><?= $publisher->nama ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kd_pengarang">Pengarang</label>
                    <select name="kd_pengarang" class="form-control" id="kd_pengarang">
                        <?php foreach ($authors as $author) : ?>
                            <option value="<?= $author->kd_pengarang ?>"><?= $author->nama ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" name="stok" class="form-control" id="stok" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>