<link href="<?php echo $this->webroot; ?>css/default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>css/login.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo $this->webroot; ?>js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $this->webroot; ?>js/metronic.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>js/layout.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>js/demo.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>js/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="<?php echo $this->webroot ?>login" method="post">
		<h3 class="form-title">Sign In</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any Email and password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="data[User][email]"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="data[User][password]"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Login</button>
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>Remember </label>
			<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
		</div>
		<!-- <div class="login-options">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li>
					<a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
				</li>
			</ul>
		</div> -->
		<div class="create-account">
			<p>
				<a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" action="<?php echo $this->webroot ?>register" method="post">
		<h3>Sign Up</h3>
		<p class="hint">
			 Enter your personal details below:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Name" name="name"/>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="confirm_password"/>
		</div>
		<div class="form-group margin-top-20 margin-bottom-20">
			<label class="check">
			<input type="checkbox" name="tnc"/> I agree to the <a href="javascript:;">
			Terms of Service </a>
			& <a href="javascript:;">
			Privacy Policy </a>
			</label>
			<div id="register_tnc_error">
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="register-back-btn" class="btn btn-default">Back</button>
			<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END REGISTRATION FORM -->
</div>






<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>