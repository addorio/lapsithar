@extends('base.login_base')


@section('content')
<div class="login-form-bg h-100 bg-1">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-12 col-lg-6">
                <div class="form-input-content">
                    <div class="card login-form shadow-lg mb-0 animated fadeInDown">
                        <div class="card-body text-center">
                            <a href="<?= base_url() ?>">
                                <img class="logo-sm" src="{{APP_ASSETS}}images/bintan.png" style="max-width: 100px;">
                                <h4 class="login-form__title pt-3">
                                    SI WASPADA<br>
                                    <small>Kabupaten Bintan</small>
                                </h4>
                            </a>
                            <?php echo $this->session->flashdata('message') ?>
                            <?php echo $this->session->flashdata('error') ?>

                            <form class="p-2 login-input" method="post" action="<?= base_url('auth'); ?>">
                                <div class="form-group">
                                    <input type="username" class="form-control" name="username" autocomplete="off" placeholder="Masukkan Username..." required="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password..." required="">
                                </div>
                                <button class="btn btn-primary submit btn-block">Sign In</button>
                            </form>
                            <p class="mt-5 login-form__footer">
                                <a href="#link Website" class="text-primary">Kembali Ke Website</a>
                                <span class="login-form__title"> | </span>
                                <a href="<?= base_url('auth/forgotPassword'); ?>" class="text-primary">Lupa Password</a>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection