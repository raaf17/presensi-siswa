<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Reset Password</h4>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">Kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda</p>
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= route_to('reset-password-handler', $token); ?>" method="POST">
                            <?= csrf_field(); ?>

                            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                <div class="alert alert-success">
                                    <?= session()->getFlashdata('success'); ?>
                                    <button type="button" class="close" data-dissmiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('fail'); ?>
                                    <button type="button" class="close" data-dissmiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input id="password" type="password" class="form-control pwstrength" placeholder="New Password" name="new_password" value="<?= set_value('reset_password'); ?>">
                                <?php if ($validation->getError('new_password')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('new_password'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm New Password" name="confirm_new_password" value="<?= set_value('confirm_new_password'); ?>">
                                <?php if ($validation->getError('confirm_new_password')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('confirm_new_password'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>