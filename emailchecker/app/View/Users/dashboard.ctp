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
				<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">
								 Widget settings form goes here
							</div>
							<div class="modal-footer">
								<button type="button" class="btn blue">Save changes</button>
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				
				<!-- BEGIN PAGE HEADER-->
				<h3 class="page-title">
				Dashboard</h3>
				<div class="page-bar">
					<ul class="page-breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Dashboard</a>
						</li>
					</ul>
					
					
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN DASHBOARD STATS -->
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light blue-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-thumbs-up"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo (isset($data["passed"][0][0]["passed"])) ?  $data["passed"][0][0]["passed"] : '0';  ?>
							</div>
							<div class="desc">
								 Emails Passed Today
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light red-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-thumbs-down"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo (isset($data["failed"][0][0]["failed"])) ?  $data["failed"][0][0]["failed"] : '0';  ?>
							</div>
							<div class="desc">
								 Emails Failed Today
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light green-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-question-circle "></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo (isset($data["unknown"][0][0]["unknown"])) ?  $data["unknown"][0][0]["unknown"] : '0';  ?>
							</div>
							<div class="desc">
								 Emails Unknown Today
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light purple-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo (isset($data["rmg"][0][0]["rmg"])) ?  $data["rmg"][0][0]["rmg"] : '0';  ?>
							</div>
							<div class="desc">
								Validations Remaining
							</div>
						</div>
						</a>
					</div>
				</div>
				<div class="row">
                	<div class="col-lg-9 col-md-9 col-sm-8">
                    <div class="al_btn">
                    <div role="alert" class="alert alert-info alert-dismissible fade in">
  							<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                             <center> Please use the "Select  File" widget to get started.</center>
                    </div>
                    </div>
                    	<?php if(!empty($file_data)){
                    			foreach($file_data as $file)
                    			{
                    	 ?>
                       
                            <div class="tab-content">
                                <div class="portlet-body form">
                                	<div>
                                		<?php echo $file["FileList"]["file_name"]; ?>
                                		<a href="javascript:void(0)" class="delete_tab" main="<?php echo $file["FileList"]["id"]; ?>">Delete</a>
                                		<a href="javascript:void(0)" class="export_tab" main="<?php echo $file["FileList"]["id"]; ?>">Export</a>
                                		<form action="<?php echo $this->webroot; ?>dashboard" class="form-horizontal" method="post">
											<div class="form-body">
												<div class="form-actions">
													<div class="ckst_btn">
														<input type="hidden" value="<?php echo $file["FileList"]["id"]; ?>" name="file_id">
														<input type="submit" name="varify" value="Check Status" class="btn btn-success">
													</div>
												</div>
											</div>
										</form>
                                	</div>

                                    <div class="show_counts">
                                    <ul>
                                        <li class="bg-primary">Total Processed <div class="tp count_number"> <?php echo (array_key_exists($file["FileList"]["id"], $totle)) ?  $totle[$file["FileList"]["id"]] : '0'; ?></div></li>
                                        <li class="bg-success">Emails Passed <div class="ep count_number"><?php echo (array_key_exists($file["FileList"]["id"], $passed)) ?  $passed[$file["FileList"]["id"]] : '0'; ?></div></li>
                                        <li class="bg-danger">Emails Failed <div class="ef count_number"> <?php echo (array_key_exists($file["FileList"]["id"], $failed)) ?  $failed[$file["FileList"]["id"]] : '0'; ?></div></li>
                                        <li class="bg-info">Emails Unknown <div class="eu count_number"><?php echo (array_key_exists($file["FileList"]["id"], $unknown)) ?  $unknown[$file["FileList"]["id"]] : '0'; ?></div></li>
                                     </ul>
                                    </div>
                                    <?php if(!empty($email_data)){ ?>
                                    <div class="check_status">
                                        <table class="table table-responsive table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>S.no</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1; foreach($email_data as $email){
                                            		if($file["FileList"]["id"] == $email["EmailList"]["file_id"])
                                            		{
                                             ?>
                                                  <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $email["EmailList"]["email"]; ?></td>
                                                    <td><?php echo $email["EmailList"]["result"]; ?></td>
                                                  </tr>
                                            <?php $count++; } } ?>
                                        </tbody>
                                        </table>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        
                        <?php } } ?>
                    </div>
                	<div class="col-lg-3 col-md-3 col-sm-4">
						<div class="tab-content">
						<div class="portlet-body form">
                        <div class="panel panel-success">
                        	<div class="panel-heading">
                            	<h4 class="panel-title">Import File (.txt or .csv)</h4>
                            </div>
                            <div class="panel-body">
                            	<form action="<?php echo $this->webroot; ?>importemail" class="" method="post" enctype="multipart/form-data">
								<div class="form-body">
									<div class="form-group">
                                        <div class="import_mesg">
										<span id="verify_result" class="text-success success_mesg">
										  	<?php echo $this->Session->flash('good'); ?>
										</span>
									</div>
										<div class="filesmb_btn">
                                            	<div class="input_file">
                                                	select file
													<input type="file" name="importfile"> 
                                                </div>
                                            	<div class="smb_btn_wrap">
												<input type="submit" name="import" value="Import" class="btn btn-primary">
											</div>
										</div>
                                        <div class="clearfix"></div>
									</div>
									
								</div>
							</form>
							</div>
                        </div>
							
						</div>
					</div>
                    </div>
				</div>
				
				<!-- END DASHBOARD STATS -->
				<div class="clearfix">
				</div>
				
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!--Cooming Soon...-->
		<!-- END QUICK SIDEBAR -->
        <div>
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
<!-- END JAVASCRIPTS -->
<script>

$(document).ready(function(){
	$(".delete_tab").on("click", function(){
				var t_id = $(this).attr("main");
				var field = "id";
				var tab = "files_lists";
				var cur = $(this);
				$.ajax({
						url:"<?php echo $this->webroot; ?>delete",
						type:"post",
						data:{ "m_id" : t_id, "field" : field , "tab" : tab },
						dataType:"json",
						success: function(data)
						{
							if(data.message == "success")
							{
								cur.parents(".tab-content").remove();
							}
						}
				});
	});

	$(".export_tab").on("click", function(){
		var t_id = $(this).attr("main");
		window.location.href = "<?php echo $this->webroot ?>export?t_id="+t_id;
		// $.ajax({
		// 		url:"<?php echo $this->webroot ?>export",
		// 		type:"post",
		// 		data:{ "t_id" : t_id },
		// 		success: function(data)
		// 		{

		// 		}
		// });
	});
});

</script>