<?= $this->extend('auth/app'); ?>
<?= $this->section('body'); ?>
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="form-block mx-auto">
                <div class="text-center mb-2">
                    <h5>Forgot Password</h5>
                    <h4><strong><?= _APP ?></strong></h4>
                </div>
                <hr>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert text-center text-white mb-2" style="background-color: brown;"><?= session()->getFlashdata('error'); ?></div>
                <?php endif; ?>
                <form action="/auth/for" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group first">
                        <label class="text-muted" style="font-size: 10pt;" for="email">Email</label>
                        <input name="_email" value="<?= old('_email') ?>" type="text" class="form-control" placeholder="Your Email" id="email">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">FORGOT</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>