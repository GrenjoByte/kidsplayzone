<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=">
	<title>Users Management</title>
</head>
<?php include 'esses/notifications.php';?>
<div class="ui sidebar vertical inverted menu" id="sidebar_menu">
	<a class="item">
			1
	</a>
	<a class="item">
		2
	</a>
	<a class="item">
		3
	</a>
</div>
<div class="pusher">
	<body>
		<header>
			<?php include 'esses/nav.php';?>
		</header>
		<main>
			<br>
			<br>
			<?php include 'users_management.php';?>
		</main>
		<footer>
			<?php include 'esses/footer.php';?>
		</footer>
	</body>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		load_hr_registered_users();
		load_document_types();
	});
</script>
<?php include 'script-users_management.php';?>
</html>