<style>
	.p_error{
		border-color: red !important;
	}
</style>

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?php echo $this->webroot; ?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="<?php echo $this->webroot; ?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/admin/layout2/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/admin/layout2/css/themes/grey.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo $this->webroot; ?>assets/admin/layout2/css/custom.css" rel="stylesheet" type="text/css"/



		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				
				<!-- BEGIN PAGE HEADER-->
				<h3 class="page-title">Member Action</h3>
				<!-- END PAGE HEADER-->
				<!-- BEGIN DASHBOARD STATS -->
				<?php if(isset($member)){ ?>
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-equalizer font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Edit Modules</span>
						</div>
					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form action="<?php echo $this->webroot ?>admins/memberaction" method="post" class="form-horizontal">
							<div class="form-body">
								<?php if(isset($member)){ ?>
								<div class="form-group">
									<label class="col-md-3 control-label">User ID:</label>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="ID" value="<?php echo $member["User"]["id"] ?>" name="id" readonly>
									</div>
								</div>
								<?php } ?>
								<div class="form-group">
									<label class="col-md-3 control-label">Email:</label>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="Email" value="<?php echo (isset($member)) ? $member["User"]["email"] : "" ; ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Name:</label>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="Name" value="<?php echo (isset($member)) ? $member["User"]["name"] : "" ; ?>" name="name" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Password:</label>
									<div class="col-md-4">
										<input type="password" id="password" class="form-control" placeholder="Password" value="" name="password" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Re-type Your Password:</label>
									<div class="col-md-4">
										<input type="password" id="rpassword" class="form-control" placeholder="Re-type Your Password" value="" name="confirm_password" required>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green" onclick=" return editvalid()" >Save</button>
									</div>
								</div>
							</div>
						</form>
						<!-- END FORM-->
					</div>
				</div>
				<?php }elseif(isset($mview)){ ?>
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-equalizer font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">View Modules</span>
						</div>
					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form action="<?php echo $this->webroot ?>admins/memberaction" method="post" class="form-horizontal">
							<div class="form-body">
								<?php if(isset($mview)){ ?>
								<div class="form-group">
									<label class="col-md-3 control-label">User ID:</label>
									<div class="col-md-4">
										<span>
											<?php echo $mview["User"]["id"] ?>
										</span>
									</div>
								</div>
								<?php } ?>
								<div class="form-group">
									<label class="col-md-3 control-label">Email:</label>
									<div class="col-md-4">
										<span>
										<?php echo (isset($mview)) ? $mview["User"]["email"] : "" ; ?>
										</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Name:</label>
									<div class="col-md-4">
										<span>
										<?php echo (isset($mview)) ? $mview["User"]["name"] : "" ; ?>
										</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Password:</label>
									<div class="col-md-4">
										<span>
										******
										</span>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<a href="<?php echo $this->webroot; ?>admins/members" class="btn green">Back</a>
									</div>
								</div>
							</div>
						</form>
						<!-- END FORM-->
					</div>
				</div>
				<?php }else{ ?>
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-equalizer font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Edit Modules</span>
						</div>
					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form action="<?php echo $this->webroot ?>admins/memberaction" method="post" class="form-horizontal">
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-3 control-label">Email:</label>
									<div class="col-md-4">
										<input type="text" id="email" class="form-control" placeholder="Email" value="<?php echo (isset($member)) ? $member["User"]["email"] : "" ; ?>">
										<span class="show_error" style="display:none">Someone already has that email</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Name:</label>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="Name" value="<?php echo (isset($member)) ? $member["User"]["name"] : "" ; ?>" name="name" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Password:</label>
									<div class="col-md-4">
										<input type="password" id="password" class="form-control" placeholder="Password" value="" name="password" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Re-type Your Password:</label>
									<div class="col-md-4">
										<input type="password" id="rpassword" class="form-control" placeholder="Re-type Your Password" value="" name="confirm_password" required>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green" onclick=" return addvalid()" >Save</button>
									</div>
								</div>
							</div>
						</form>
						<!-- END FORM-->
					</div>
				</div>
				<?php } ?>
				
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!--Cooming Soon...-->
		<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END CONTAINER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="<?php echo $this->webroot; ?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $this->webroot; ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo features 
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>

<script>
	function editvalid()
	{
		  var pass = $('#password').val();
          var rpass = $('#rpassword').val();
	     
	      if(pass != rpass)
	      {
	          $('#rpassword').addClass('p_error');
	          return false;
	      }else
	      {
	          $('#rpassword').removeClass('p_error');
	         
	      }
	}

	function addvalid ()
	{
		var pass = $('#password').val();
          var rpass = $('#rpassword').val();
	     
	      if(pass != rpass)
	      {
	          $('#rpassword').addClass('p_error');
	          return false;
	      }else
	      {
	          $('#rpassword').removeClass('p_error');
	        
	      }

        if($('input').hasClass('p_error'))
         {
            return false;
         }
	}

	/* Ajax for checking username */

    $('body').on('change, blur','#email', function(){
        var email = $(this).val();
        var cur = $(this);
        $.ajax({
                url:"<?php echo $this->webroot; ?>admins/check_email",
                data:{ 'email': email},
                type:"post",
                dataType:"json",
                success: function(data)
                {
                  if(data.message != "")
                  {
                    if(data.message == "exist")
                    {
                      cur.addClass("p_error");
                      cur.next("span").css("display", "block");
                    }else{
                      cur.removeClass("p_error");
                      cur.next("span").hide();
                    }
                  }
                }
        });
    });
</script>

<!-- END JAVASCRIPTS -->