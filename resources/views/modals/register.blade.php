<div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="genre_add_modalTitle"
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
                    <h4>New here?</h4>
                    <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                    <form class="form-sample" enctype="multipart/form-data" action="{{ url('user_register') }}"
                    method="POST">
                    @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Submit</button>
                            <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Already have an account? 
                            <a href="{{ url('login') }}" data-dismiss="modal" data-toggle="modal" data-target="#login_modal" class="text-primary">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
