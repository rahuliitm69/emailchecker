

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo $this->webroot; ?>css/default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->


<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS -->




<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/global/plugins/select2/select2.min.js"></script>
<script src="<?php echo $this->webroot; ?>js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $this->webroot; ?>js/metronic.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>js/layout.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>js/demo.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="<?php echo $this->webroot; ?>assets/admin/layout2/img/logo-big.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->

<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="<?php echo $this->webroot; ?>admins/login" method="post">
		<h3 class="form-title">Login to Admin account</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>Enter any username and password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" required/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" required/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Remember me </label>
			<button type="submit" class="btn blue pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		<!-- <div class="forget-password">
			<h4>Forgot your password ?</h4>
			<p>
				 no worries, click <a href="javascript:;" id="forget-password">
				here </a>
				to reset your password.
			</p>
		</div> -->
	</form>
	<!-- END LOGIN FORM -->
</div>
<!-- END LOGIN -->




<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
Layout.init(); // init current layout
  Login.init();
  Demo.init();
       // init background slide images
       $.backstretch([
        "../../assets/admin/pages/media/bg/1.jpg",
        "../../assets/admin/pages/media/bg/2.jpg",
        "../../assets/admin/pages/media/bg/3.jpg",
        "../../assets/admin/pages/media/bg/4.jpg"
        ], {
          fade: 1000,
          duration: 8000
    }
    );
});
</script>