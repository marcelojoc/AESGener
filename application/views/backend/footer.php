<!COMIENZA FOOTER!-->
		<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-150">
							<span class="dark-blueAES bolder">AES Gener</span>
							 &copy; 2017
						</span>

						&nbsp; &nbsp;

					</div>
					<!-- /section:basics/footer -->
				</div>
		</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() ?>assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
		<script src="<?php echo base_url() ?>/assets/js/bootbox.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
	
				$('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
					//if($(e.target).attr('href') == "#home") doSomethingNow();
				})
				///////			
			$('[data-rel=tooltip]').tooltip();
				$('[data-rel=popover]').popover({html:true});
				
				$("#bootbox-regular").on(ace.click_event, function() {
					bootbox.prompt("What is your name?", function(result) {
						if (result === null) {
							
						} else {
							
						}
					});
				});
					
				$("#bootbox-confirm").on(ace.click_event, function() {
					bootbox.confirm("Are you sure?", function(result) {
						if(result) {
							//
						}
					});
				});
			});
			
		</script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url() ?>assets/js/jquery-ui.custom.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.ui.touch-punch.js"></script>
		<!-- ace scripts -->
		<script src="<?php echo base_url() ?>assets/js/ace/elements.fileinput.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace/elements.aside.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace/ace.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace/ace.ajax-content.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace/ace.sidebar.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace/ace.settings.js"></script>
		<script src="<?php echo base_url() ?>assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url() ?>assets/js/date-time/bootstrap-timepicker.js"></script>
		
		<!-- inline scripts related to this page -->
		
		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.onpage-help.css" />
	<!--	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/themes/sunburst.css" />-->

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="<?php echo base_url() ?>assets/js/ace/elements.onpage-help.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace/ace.onpage-help.js"></script>

	</body>
</html>
