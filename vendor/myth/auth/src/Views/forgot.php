<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
    body {
        background: #0f2417 !important;
    }

    .card-dark {
        background: #1b3a29;
        border: 1px solid #214f34;
        border-radius: 12px;
        color: #ffffff;
    }

    .card-dark h2 {
        background: transparent;
        border-bottom: 1px solid #234d35;
        color: #3ad46c;
        font-weight: bold;
    }

    .form-control {
        background: #143021;
        border: 1px solid #275f3e;
        color: white;
    }

    .form-control:focus {
        border-color: #3ad46c;
        box-shadow: none;
        background: #173a26;
        color: #fff;
    }

    label {
        color: #d8ffdf;
        font-weight: 500;
    }

    .btn-green {
        background: #34d16e;
        border: none;
        color: #0d1c14;
        font-weight: bold;
        width: 100%;
        padding: 10px;
        border-radius: 6px;
    }

    .btn-green:hover {
        background: #29b85d;
    }

    .invalid-feedback {
        color: #ff6666;
    }
</style>

<div class="container py-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            <div class="card card-dark">
                <h2 class="card-header"><?= lang('Auth.forgotPassword') ?></h2>

                <div class="card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <p><?= lang('Auth.enterEmailForInstructions') ?></p>

                    <form action="<?= url_to('forgot') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group mb-3">
                            <label for="email"><?= lang('Auth.emailAddress') ?></label>
                            <input type="email"
                                   class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email"
                                   placeholder="<?= lang('Auth.email') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <button type="submit" class="btn-green">
                            <?= lang('Auth.sendInstructions') ?>
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
