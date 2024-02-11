<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="auth-form-light text-left p-1">
                    <div class="brand-logo text-center">
                        <img alt="MyNovelHub Logo" src="{{ URL::asset('images/logo.png') }}">
                    </div>
                    <h4>Hello! let's get started</h4>
                    <h6 class="font-weight-light">Sign in to continue.</h6>
                    <form class="form-sample" enctype="multipart/form-data" action="{{ url('user_login') }}"
                    method="POST">
                    @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                        
                        </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input"> Keep me signed in <i
                                        class="input-helper" name="remember_me"></i></label>
                            </div>
                            <a href="#" class="auth-link text-black">Forgot password?</a>
                        </div>
                        <div class="mb-2">
                            <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                <i class="mdi mdi-facebook mr-2"></i> Facebook </button>
                        </div>
                        <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{ url('register') }}"
                                class="text-primary" data-dismiss="modal" data-toggle="modal" data-target="#register_modal">Create</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
