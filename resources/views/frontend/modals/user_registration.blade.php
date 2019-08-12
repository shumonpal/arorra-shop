
    <div class="panel-login ">
    
        <div class="">
            <div class="row">
            <div class="col-lg-12">
               
                <form id="" action="{{url('/register')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Username" value="">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" id="password_confirmation" tabindex="2" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register user_register" value="Register Now">
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
