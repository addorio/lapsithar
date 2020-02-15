@extends('base.login_base')


@section('content')
<div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="<?= base_url() ?>"> <h4>LAPSITHAR</h4></a> <br>
                                <?php echo $this->session->flashdata('message') ?>
                                <?php echo $this->session->flashdata('error') ?>
                                
                                <form class="mt-5 mb-5 login-input" method="post" action="<?= base_url('auth/resetPassword'); ?>">
                                    <h6 class="text-center">Masukkan Username Anda</h6>
                                    <div class="form-group">
                                        <input type="username" class="form-control" name="username" placeholder="Username" required>
                                    </div>
                                        <button class="btn login-form__btn submit w-100">Next</button>
                                        <p class="mt-5 login-form__footer"> <a href="<?= base_url() ?>" class="text-primary">Cancel</a></p>
                                    
                                </form>
                                <p class="mt-5 login-form__footer"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection