<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="<?= site_url() ?>/authors/update" method="post">
                <div class="form-group" style="display: none;">
                    <label for="code">Kode Pengarang</label>
                    <input type="text" name="code" class="form-control" id="code" value="<?= $author->kd_pengarang ?>" required>
                </div>
                <div class="form-group">
                    <label for="name">Nama Pengarang</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= $author->nama ?>" required autofocus>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>