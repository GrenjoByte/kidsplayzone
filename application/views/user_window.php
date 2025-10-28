<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=">
	<script src="https://cdn.tiny.cloud/1/1f9g33l878bpiksrb7cmiajc3fbvu24bmi4c0ypcg3u0n7hd/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<?php include 'esses/notifications.php';?>
	<title>User Window</title>
</head>
<body>
	<div class="ui sidebar vertical inverted menu borderless" id="sidebar_menu">
	    <a class="item user_profile_update_activator" data-user_id="" id="user_profile_update_activator">
			<div class="ui basic segment padded">
				<div class="ui circular image centered">
					<div class="image_container">
						<img src="<?php echo base_url();?>photos/icons/male_default.jpg" class="small image center middle aligned flowing_image" id="profile_image_side">
					</div>
				</div>
				<div class="ui center aligned header small inverted">
					<div id="sidebar_name_display"></div>
					<div id="item_counter" data-value=""></div>
					<div class="sub header" id="sidebar_position_display"></div>
				</div>
			</div>
	    </a>
	    <div class="ui inverted divider"></div>
		    <a class="item user_management_activator" id="current_user_files_activator" data-user_id="" data-first_name="" data-suffix="">
				<i class="window restore outline icon"></i>
				Personnel Files
		    </a>
		    <a class="item supplies_inventory_activator" id="supplies_inventory_activator">
				<i class="warehouse icon"></i>
				Supplies Inventory
		    </a>
		    <a class="item vehicle_scheduler_activator" id="vehicle_scheduling_activator" data-user_id="" data-first_name="" data-suffix="">
				<i class="car icon"></i>
				Vehicle Scheduler
		    </a>
	    <div class="ui inverted divider"></div>
	    <a class="item logout_activator">
			<i class="sign-out icon"></i>
			Sign-out
		</a>
	</div>
	<div class="pusher">
		<header id="system_header">
			<?php include 'esses/nav.php';?>
		</header>
		<main id="system_main">
			<br>
			<?php include 'user_module.php';?>
		</main>
		<footer id="system_footer">
			<?php include 'esses/footer.php';?>
		</footer>
	</div>
</body>
<script type="text/javascript">
	$(document)
		.ready(function() {
			loading_start('Loading Content');
			$.when(load_user_designations())
				.done(function() {
					setTimeout(function() {
						$.when(load_document_types())
							.done(function() {
								setTimeout(function() {
									$.when(load_initial_user_data())
										.done(function() {
											setTimeout(function() {
												load_assigned_projects();
												loading_stop();
											},650);
										})
									;
								},100);
							})
						;
					},100);
				})
			;
		})
	;
</script>
<?php include 'script-admin_management.php';?>
<?php include 'script-supplies_inventory.php';?>
<?php include 'script-user_module.php';?>
<?php include 'script-users_management.php';?>
</html>