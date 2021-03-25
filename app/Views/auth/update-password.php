<?= $this->extend('auth/app'); ?>
<?= $this->section('body'); ?>
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="form-block mx-auto">
                <div class="text-center mb-2">
                    <h5>Update Password</h5>
                    <h4><strong><?= _APP ?></strong></h4>
                </div>
                <hr>
                <form action="/auth/uppass" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_id" value="<?= $auth['id'] ?>">
                    <input type="hidden" name="_pin" value="<?= $auth['pin'] ?>">
                    <input type="hidden" name="_name" value="<?= $auth['name'] ?>">
                    <input type="hidden" name="_email" value="<?= $auth['email'] ?>">
                    <input type="hidden" name="_phone" value="<?= $auth['phone'] ?>">
                    <div class="form-group first">
                        <label class="text-muted" style="font-size: 10pt;" for="password1">New Password</label>
                        <input name="_password1" type="password" class="form-control" placeholder="******" id="password1">
                        <em class="text-warning" style="font-size: 8pt;"><?= $validation->getError('_password1') ?></em>
                    </div>
                    <div class="form-group first">
                        <label class="text-muted" style="font-size: 10pt;" for="password2">Confirm New Password</label>
                        <input name="_password2" type="password" class="form-control" placeholder="******" id="password2">
                        <em class="text-warning" style="font-size: 8pt;"><?= $validation->getError('_password2') ?></em>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mb-2">UPDATE PASSWORD</button>
                    <div class="text-center">
                        <small class="text-muted">Form ini hanya bisa digunakan sekali</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>