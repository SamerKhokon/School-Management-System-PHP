<div id="content" class="box">
	<script type="text/javascript">
	function data_loading() {
	   $('#voucher_detail_show').load('includes/voucher_list_display.php',function(){});
	}
	 $(document).ready(function(){    
		 data_loading(); 	
	 });
	</script>

	<!-- fee_details_list_display.php -->

	<div id="voucher_detail_show"></div>
</div>