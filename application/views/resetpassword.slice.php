@extends('base.login_base')
@section('content')
<div class="login-form-bg h-100 gradient-7">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-12 col-lg-6">
                <div class="form-input-content">
                    <div class="card login-form shadow-lg mb-0">
                        <div class="card-body text-center">
                            <a href="<?= base_url() ?>">
                                <img class="logo-sm" src="{{APP_ASSETS}}images/bintan.png">
                                <h4 class="login-form__title pt-3">
                                    LAPSITHAR<br>
                                    <small>Kabupaten Bintan</small>
                                </h4>
                            </a>
                            <h4 class="login-form__title">Password Baru</h4>
                            <?php echo $this->session->flashdata('message') ?>
                            <?php echo $this->session->flashdata('error') ?>
                            <form class="p-2 login-input" method="post" action="<?= base_url('auth/changePassword'); ?>">
                                <div class="form-group m-0">
                                    <!-- <input type="username" class="form-control" name="id_user" value="<?= $user['id_user'] ?>" hidden>
                                    <input type="username" class="form-control" name="username" value="<?= $user['username'] ?>" hidden> -->
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password Baru...">
                                </div>
                                <button class="btn login-form__btn submit btn-block">Ganti Password</button>
                            </form>
                            <p class="mt-3 login-form__footer text-left">
                                <a href="<?= base_url('auth'); ?>" class="text-primary">Cancel</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection