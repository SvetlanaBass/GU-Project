<div class="container">
    <header class="header">
        <div class="content">
            <div class="content__left">
                <a class="logo" href="/">
                    <span class="logo__title">BRAN<span>D</span></span>
                </a>
            </div>
            <div class="content__center">
                <nav id="menu"></nav>
            </div>
            <div class="content__right">
                <a class="cart" href="#"></a>
            </div>
        </div>
    </header>
    <div class="contacts-form-wrapper">
        <form name="contacts" action="?saveNewUser/execute" onsubmit="return validate()" onreset="return clearForm()" method="post">
            <div><input type="text" name="username" size="50" id="userName"
                        placeholder="First name*" autofocus onfocus="return clearNameField()"></div>
            <div id="nameError" class="errorMessage"></div>
            <div><input type="text" name="usersurname" size="50" id="userSurname"
                        placeholder="Last name*" autofocus onfocus="return clearSurnameField()"></div>
            <div id="surnameError" class="errorMessage"></div>
            <div><input type="text" name="login" size="50" id="userLogin"
                        placeholder="Login*" autofocus onfocus="return clearLoginField()"></div>
            <div id="loginError" class="errorMessage"></div>
            <div><input type="password" name="password" id="userPassword" size="50"
                        placeholder="Your password*" onfocus="return clearPasswordField()"></div>
            <div id="passwordError" class="errorMessage"></div>
            <div><input type="password" name="passwordconfirm" id="userPasswordConfirm" size="50"
                        placeholder="Re-enter your password*" onfocus="return clearPasswordConfirmField()"></div>
            <div id="passwordConfirmError" class="errorMessage"></div>
            <p class="form-note">The fields marked with * are required</p>
            <input type="submit" value="Join Shop">
            <input type="reset" value="Reset">
        </form>
    </div>

</div>
