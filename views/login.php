<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="models/users/login.php" method="post">
                        <input type="email" name="email" placeholder="Email Address" />
                        <input type="password" name="password" placeholder="Password" />
                        <button type="submit" name="loginBtn" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <div class="errorsReg">

                    </div>
                    <form action="models/users/register.php" method="post">
                        <input type="text" placeholder="Name" id="nameId" name="name"/>

                        <input type="text" placeholder="Username" id="usernameId" name="username"/>

                         <!--<span id="idEmail" class="text-danger hidden"></span>-->
                        <input type="email" placeholder="Email Address" id="emailId" name="email"/>

                        <!-- <span id="idPassword" class="text-danger hidden"></span>-->
                        <input type="password" placeholder="Password" id="passwordId" name="password"/>

                        <button type="submit" class="btn btn-default" id="regBut" name="registerButton">Signup</button>
                    </form>

                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->