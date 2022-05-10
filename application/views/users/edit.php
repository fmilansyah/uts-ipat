<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="<?= site_url() ?>/users/update" method="post">
                <div class="form-group" style="display: none;">
                    <label for="code">Kode Pengguna</label>
                    <input type="text" name="code" class="form-control" id="code" value="<?= $user->kd_users ?>" required>
                </div>
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= $user->nama ?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" name="username" class="form-control" id="username" value="<?= $user->username ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="0" <?= $user->status == '0' ? 'selected' : '' ?>>Tidak Aktif</option>
                        <option value="1" <?= $user->status == '1' ? 'selected' : '' ?>>Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select name="level" class="form-control" id="level">
                        <option value="1" <?= $user->level == '1' ? 'selected' : '' ?>>Admin</option>
                        <option value="2" <?= $user->level == '2' ? 'selected' : '' ?>>Pengguna</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>