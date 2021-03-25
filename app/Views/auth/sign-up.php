<?= $this->extend('auth/app'); ?>
<?= $this->section('body'); ?>
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="form-block mx-auto">
                <div class="text-center mb-2">
                    <h5>Sign Up</h5>
                    <h4><strong><?= _APP ?></strong></h4>
                </div>
                <hr>
                <form action="/auth/up" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group first">
                        <?php if (!$validation->getError('_name')) : ?>
                            <label class="text-muted" style="font-size: 10pt;" for="_name">Nama Lengkap*</label>
                        <?php else : ?>
                            <em class="text-warning" style="font-size: 8pt;"><?= $validation->getError('_name') ?></em>
                        <?php endif; ?>
                        <input name="_name" value="<?= old('_name') ?>" type="text" class="form-control" placeholder="Nama Lengkap" id="email">
                    </div>
                    <div class="form-group first">
                        <?php if (!$validation->getError('_email')) : ?>
                            <label class="text-muted" style="font-size: 10pt;" for="_email">Email*</label>
                        <?php else : ?>
                            <em class="text-warning" style="font-size: 8pt;"><?= $validation->getError('_email') ?></em>
                        <?php endif; ?>
                        <input name="_email" value="<?= old('_email') ?>" type="text" class="form-control" placeholder="your-email@sedv.com" id="email">
                    </div>
                    <div class="form-group last mb-3">
                        <?php if (!$validation->getError('_phone')) : ?>
                            <label class="text-muted" style="font-size: 10pt;" for="_phone">Phone*</label>
                        <?php else : ?>
                            <em class="text-warning" style="font-size: 8pt;"><?= $validation->getError('_phone') ?></em>
                        <?php endif; ?>
                        <input name="_phone" value="<?= old('_phone') ?>" type="text" class="form-control" placeholder="Your phone" id="phone">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">SIGN UP</button>
                    <div class="text-center mt-1">
                        <small><a style="text-decoration: none;" href="">Lihat Kebijakan dan Privasi </a> - <a style="text-decoration: none;" href="<?= route_to('signin'); ?>">Sign In</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>