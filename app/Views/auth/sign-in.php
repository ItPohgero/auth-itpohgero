<?= $this->extend('auth/app'); ?>
<?= $this->section('body'); ?>
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="form-block mx-auto">
                <div class="text-center mb-2">
                    <h5>Sign In</h5>
                    <h4><strong><?= _APP ?></strong></h4>
                </div>
                <hr>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert text-center text-white mb-2" style="background-color: brown;"><?= session()->getFlashdata('error'); ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert text-center text-white mb-2" style="background-color: lightblue;"><?= session()->getFlashdata('success'); ?></div>
                <?php endif; ?>
                <form action="/auth/in" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input name="_captcha" type="hidden" class="form-control" value="<?= $captcha ?>">
                    <div class="form-group first">
                        <label class="text-muted" style="font-size: 10pt;" for="email">Email</label>
                        <input name="_email" value="<?= old('_email') ?>" type="text" class="form-control" placeholder="Your Email" id="email">
                    </div>
                    <div class="form-group first">
                        <label class="text-muted" style="font-size: 10pt;" for="password">Password</label>
                        <input name="_password" type="password" class="form-control" placeholder="******" id="password">
                    </div>
                    <div class="form-group first">
                        <div class="row">
                            <div class="col-5">
                                <h3 class="mt-2 text-muted text-center"><?= $captcha ?></h3>
                            </div>
                            <div class="col-7">
                                <input name="_verifikasi" type="text" class="form-control" placeholder="captcha">
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">SIGN IN</button>
                    <div class="text-center mt-1">
                        <small><a style="text-decoration: none;" href="<?= route_to('forgot'); ?>">Forgot Password </a> - <a style="text-decoration: none;" href="<?= route_to('signup'); ?>">Sign Up</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>