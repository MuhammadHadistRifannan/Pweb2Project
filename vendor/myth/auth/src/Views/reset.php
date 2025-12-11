<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-sm-6">

            <div class="card border-0 shadow-sm">
                <div class="card-header text-white text-center" style="background:#0f3d2e;">
                    <h5 class="mb-0"><?= lang('Auth.resetYourPassword') ?></h5>
                </div>

                <div class="card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <p class="text-muted mb-4">
                        <?= lang('Auth.enterCodeEmailPassword') ?>
                    </p>

                    <form action="<?= url_to('reset-password') ?>" method="post">
                        <?= csrf_field() ?>

                        <!-- Token -->
                        <div class="mb-3">
                            <label class="form-label"><?= lang('Auth.token') ?></label>
                            <input type="text"
                                   class="form-control <?= session('errors.token') ? 'is-invalid' : '' ?>"
                                   name="token"
                                   placeholder="<?= lang('Auth.token') ?>"
                                   value="<?= old('token', $token ?? '') ?>">

                            <div class="invalid-feedback">
                                <?= session('errors.token') ?>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label"><?= lang('Auth.email') ?></label>
                            <input type="email"
                                   class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
                                   name="email"
                                   placeholder="<?= lang('Auth.email') ?>"
                                   value="<?= old('email') ?>">

                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <!-- Password Baru -->
                        <div class="mb-3">
                            <label class="form-label"><?= lang('Auth.newPassword') ?></label>
                            <input type="password"
                                   class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>"
                                   name="password">

                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label class="form-label"><?= lang('Auth.newPasswordRepeat') ?></label>
                            <input type="password"
                                   class="form-control <?= session('errors.pass_confirm') ? 'is-invalid' : '' ?>"
                                   name="pass_confirm">

                            <div class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <button type="submit"
                                class="btn w-100 text-white"
                                style="background:#0f3d2e;">
                            <?= lang('Auth.resetPassword') ?>
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
