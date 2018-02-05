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
        <form name="login" action="?loginExecute/execute" onsubmit="return validateLoginForm()" method="post">
            <div><input type="text" name="login" size="50" id="userLogin"
                        placeholder="Login*" autofocus onfocus="return clearLoginField()"></div>
            <div id="loginError" class="errorMessage"></div>
            <div><input type="password" name="password" id="userPassword" size="50"
                        placeholder="Your password*" onfocus="return clearPasswordField()"></div>
            <div id="passwordError" class="errorMessage"></div>
            <div id="passwordConfirmError" class="errorMessage"></div>
            <p class="form-note">The fields marked with * are required</p>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>