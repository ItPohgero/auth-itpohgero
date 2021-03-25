<?= $this->extend('auth/app'); ?>
<?= $this->section('body'); ?>
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="form-block mx-auto">
                <div class="text-center mb-2">
                    <h5>Verifikasi Email</h5>
                    <h4><strong><?= _APP ?></strong></h4>
                    <!-- <small class="text-muted">Daftar, dengan sangat mudah. Isi form berikut, dan anda akan menerima email verifikasi</small> -->
                </div>
                <hr>
                <p>Assalamualikum wr wb</p>
                <p>Terima kasih <?= $data['name'] ?>, silahkan cek email anda <strong class="text-danger">(<?= $data['email'] ?>)</strong></p>
                <a href="<?= route_to('signin'); ?>" style="text-decoration:none;">
                    <button class="btn btn-block btn-primary">SIGN IN</button>
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>