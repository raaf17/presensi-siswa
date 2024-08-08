<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="container" style="margin-top: 110px">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form action="<?= route_to('admin.login.handler'); ?>" method="POST">
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
                                <input id="email" type="text" class="<?= ($validation->hasError('login_id')) ? 'is-invalid' : '' ?> form-control" placeholder="Username or Email" name="login_id" value="<?= set_value('login_id'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('login_id'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="float-right">
                                        <a href="<?= route_to('admin.forgot.form'); ?>" class="text-small">
                                            Lupa Password?
                                        </a>
                                    </div>
                                </div>
                                <input id="password" type="password" class="<?= ($validation->hasError('password')) ? 'is-invalid' : '' ?> form-control" placeholder="**********" name="password" value="<?= set_value('password'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
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