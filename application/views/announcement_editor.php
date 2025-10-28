<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.tiny.cloud/1/1f9g33l878bpiksrb7cmiajc3fbvu24bmi4c0ypcg3u0n7hd/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
	<title>Announcement Editor</title>
</head>
<?php include 'esses/notifications.php';?>
<body>
	<header>
		<?php include 'esses/nav.php';?>
	</header>
	<main>
		<br>
		<br>
		<form class="ui form" enctype="multipart/form-data" id="announcement_creation_form">
			<input type="hidden" name="active_announcement_id" id="active_announcement_id" value="">
			<div class="ui column grid centered">
				<div class="column row centered">
					<div class="sixteen wide column">
						<h1 class="ui header center aligned pointered">
							<a id="page_label">Announcement Editor</a>
						</h1>
					</div>	
				</div>
				<div class="column row centered">
					<div class="fourteen wide mobile seven wide tablet four wide computer four wide large screen column">
						<h3 class="ui header center aligned pointered">Post Preview</h3>
						<div class="ui special cards one">
							<div class="card">
								<div id="announcement_file_outer">
									<div class="image_container">
                                    	<img src="<?php echo base_url();?>photos/background/blue_wall.jpg" class="center middle aligned flowing_image image bordered" id="announcement_file_outer"></img>
                                	</div>
								</div>
								<div class="content">
									<a class="ui header modal_activator">
										<span id="announcement_preview_title_outer">Announcement Title</span>
										<div class="sub header" id="announcement_date_inner">Mon. dd, yyyy</div>
									</a>
								</div>
								<div class="extra content">
									<a>
										<i class="large icons">
											<i class="user icon"></i>
											<i class="top right corner bullhorn icon large"></i>	
										</i>
										&nbsp;<span id="full_name_holder"></span>
									</a>
								</div>
							</div>
						</div>
						<div class="ui small modal modal_body">
						  	<div class="ui header" align="center">
						  		<a id="announcement_preview_title_inner">Announcement Title</a>
						  		<div class="sub header" id="announcement_date_inner">Mon. dd, yyyy</div>
						  	</div>
						  	<i class="close icon orange"></i>
						  	<div class="content" id="announcement_preview_file_inner">
						  		<div class="image_container">
                                    <img src="<?php echo base_url();?>photos/background/blue_wall.jpg" class="center middle aligned flowing_image image bordered"></img>
								</div>
						  	</div>
						</div>
						<div class="ui segment raised" id="announcement_data_segment">
							<div class="field">
								<div class="ui left action input">
									<div class="ui animated button basic tiny" tabindex="-1">
										<div class="hidden content"><small>Title</small></div>
										<div class="visible content">
											&emsp;<i class="right icon large"><small>T|</small></i>&emsp;
										</div>
									</div>
									<input type="text" value="" placeholder="Announcement Title" name="announcement_title" id="announcement_title">
								</div>
						  	</div>
						  	<div class="field">
								<div class="ui left action input">
									<div class="ui animated button basic tiny" tabindex="-1">
										<div class="hidden content"><small>Post File</small></div>
										<div class="visible content">
											&emsp;<i class="file alternate outline icon large"></i>&emsp;
										</div>
									</div>
									<input type="text" value="" placeholder="Post Document" name="announcement_file_name" id="announcement_file_name">
									<input type="file" class="file_input" name="announcement_file_input" id="announcement_file_input" accept=".pdf">
								</div>
						  	</div>
						  	<div class="field invisible" id="audience_field">
								<div class="ui left action input">
									<div class="ui animated button basic tiny" tabindex="-1">
										<div class="hidden content"><small>Post Audience</small></div>
										<div class="visible content">
											&emsp;<i class="right address card icon large"></i>&emsp;
										</div>
									</div>
									<div class="ui fluid search dropdown scrolling multiple selection clearable" id="users_drop">
										<input type="hidden">
										<i class="dropdown icon"></i>
										<div class="default text" id="users_default_value">Post Audience</div>
										<div class="menu" id="users_drop_menu">
										</div>
  									</div>
									<input type="hidden" name="audience_data" id="audience_data" value="">
								</div>
								<a class="ui mini orange button right floated invisible" id="clear_selection_button">Clear Selection</a>
						  	</div>
						</div>
						<div class="ui field basic segment right aligned">
				  			<div class="ui toggle checkbox">
							  	<input type="checkbox" id="all_audience_checkbox" checked>
							  	<label>For Everyone</label>
							</div>	
				  		</div>
					</div>
				</div>
				<div class="column row centered">
					<div class="field">
				  		<button class="ui positive button" type="submit" form="announcement_creation_form">Post Announcement</button>
				  	</div>
				</div>
			</div>
		</form>
		<br>
		<br>
	</main>
	<footer>
		<?php include 'esses/footer.php';?>
	</footer>
</body>
<script type="text/javascript">
	var audience_array = [];
	$('.special.cards .image').dimmer({on: 'hover'});
	$('.dimmable-image').dimmer({on: 'hover'});
	$('.active.progress').progress();
	$('.activating.element').popup();
	$('.ui.sticky').sticky({context: 'main'});
	
	$(document).ready(function() {
		load_unassigned_users();
		load_active_user_data();
		load_updating_announcement();
	});
	$('#all_audience_checkbox').change(function() {
		if (this.checked) {
			$('#audience_field').addClass('invisible');	
			$('#audience_data').val('all');
		}
		else {
			$('#audience_field').removeClass('invisible');	
			$('#audience_data').val(audience_array);
		}
	})
	$('#announcement_file_name')
		.on('click', function() {
		  	$('#announcement_file_input').trigger('click');
		  	$('#announcement_file_name').trigger('blur');
		})
		.on('focus', function() {
		  	$('#announcement_file_input').trigger('click');
		  	$('#announcement_file_name').trigger('blur');
		})
	;
	$('.modal_activator')
	  	.on('click', function() {
			$('.modal_body')
				.modal('setting', 'transition', 'fade down')
				.modal('setting', 'closable', false)
			  	.modal('show')
			;
		})
	;
	$('#announcement_title')
	  	.on('input', function() {
	  		var input_value = $('#announcement_title').val();
	  		$('#announcement_preview_title_outer').html(input_value);
	  		$('#announcement_preview_title_inner').html(input_value);
		})
	;
	$('#users_drop')
		.dropdown({
			onAdd: function(value, added_text) {
				audience_array.push("["+value+"]");
				// alert(audience_array);
				$('#audience_data').val(audience_array);
				if (audience_array.length == 0) {
					$('#clear_selection_button').addClass('invisible');
				}
				else {
					$('#clear_selection_button').removeClass('invisible');
				}
			},
			onRemove: function(value, removed_text) {
				value_index = audience_array.indexOf("["+value+"]");
				audience_array.splice(value_index, 1);
				// alert(audience_array);
			}
		})
	;
	$('#clear_selection_button')
		.on('click', function() {
			$('#users_drop').dropdown('clear');
			// alert(audience_array);
		})
	;

	$('#start_date')
	  	.on('input', function() {
	  		var input_value = $('#start_date').val();
			$('#end_date').attr('min', input_value);
	  		var date = new Date(input_value);
	  		var day = ('0' + date.getDate()).slice(-2);
	  		var month = ('0' + (parseInt(date.getMonth())+1)).slice(-2);
	  		var year = date.getFullYear();
	  		var format_date = year+'-'+month+'-'+day;
	  		var months_list = ["Jan.",	"Feb.", "Mar.", "Apr.", "May.", "Jun.", "Jul.", "Aug.", "Sep.",	"Oct.",	"Nov.",	"Dec."];

	  		display_date = months_list[parseInt(month)-1]+' '+day+', '+year;
	  		$('#start_date_outer').html(display_date);
		})
	;

	$('#end_date')
	  	.on('input', function() {
	  		var input_value = $('#end_date').val();
	  		var date = new Date(input_value);
	  		var day = ('0' + date.getDate()).slice(-2);
	  		var month = ('0' + (parseInt(date.getMonth())+1)).slice(-2);
	  		var year = date.getFullYear();
	  		var format_date = year+'-'+month+'-'+day;
	  		var months_list = ["Jan.",	"Feb.", "Mar.", "Apr.", "May.", "Jun.", "Jul.", "Aug.", "Sep.",	"Oct.",	"Nov.",	"Dec."];

	  		display_date = months_list[parseInt(month)-1]+' '+day+', '+year;
	  		$('#end_date_outer').html(display_date);
		})
	;
	
	$('#announcement_file_input')
	  	.on('change', function() {
	  		var file = $('#announcement_file_input')[0].files[0];
	  		var file_name = file.name 
	  		var file_type = file.type 

	  		// IF IMAGE INPUT IS NOT EMPTY
	  		if (file) {
	  			$('#announcement_file_name').val(file.name);
	  			if (file_type.includes('image')) {
	  				file_object = `
						<div class="image_container">
							<img src="`+URL.createObjectURL(file)+`" class="center middle aligned flowing_image image bordered"></img>
                    	</div>
					`;	
	  				$('#announcement_preview_file_inner').html(file_object);
	  				$('#announcement_file_outer').html(file_object);
	  			}
	  			else if (file_type.includes('pdf') || file_type.includes('video')) {
	  				file_object = `
						<div class="image_container">
							<object type="application/pdf" data="`+URL.createObjectURL(file)+`" width="100%" height="100%"></object>
                    	</div>
					`;
	  				$('#announcement_preview_file_inner').html(file_object);
	  				$('#announcement_file_outer').html(file_object);
	  			}
	  		}
	  		else {
	  			$('#announcement_file_name').val(null);
		  		$('#announcement_preview_file_inner')
  					.attr('data', '<?php echo base_url();?>photos/background/blue_wall.jpg')
				;
				$('#announcement_file_outer')
  					.attr('data', '<?php echo base_url();?>photos/background/blue_wall.jpg')
				;
	  		}
			$('#announcement_creation_form').form('validate field', 'announcement_file_name');
	  	})
	;
	function load_unassigned_users(active_user_id) {
		loading_start('Loading');
	    var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_unassigned_users");
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$('#users_drop_menu').html('');
				$.each(response_data, function(key, value) {
					var user_id = value.user_id;
					var image = value.image;
					var first_name = value.first_name.UCwords();
					var middle_name = value.middle_name.UCwords();
					var last_name = value.last_name.UCwords();
					var suffix = value.suffix.toUpperCase();
					var gender = value.gender;
					var position = value.position;

					full_name = first_name+' '+middle_name[0]+'. '+last_name

					if (suffix != '') {
						full_name += ' '+suffix+'.';
					}
					options = `
						<div class="item users_option" data-value="[`+user_id+`]" data-user_id="`+user_id+`" data-image="`+image+`" data-full_name="`+full_name+`" data-position="`+position+`">
							<div class="ui avatar image image_container">
								<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="center middle aligned flowing_image image bordered">
							</div>
							<span>`+full_name+`</span>
						</div>
					`;
					
					$('#users_drop_menu').append(options);
				})
				// $('.users_option').on('click', function() {
					
				// 	user_id = $(this).data('user_id');
				// 	image = $(this).data('image');
				// 	full_name = $(this).data('full_name');
				// 	position = $(this).data('position');

				// 	$('#profile_preview').popup({
				// 		transition : 'drop',
				// 		position   : 'top center',
				// 		inline     : true,
				// 		title      : 'Person Name',
				// 		variation  : 'very wide large',
				// 		html       : `
				// 			<div class="ui middle aligned list">
				// 				<div class="item">
				// 					<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="ui tiny image center middle aligned circular">
				// 				    <div class="content">
				// 				      	<a class="ui header small">`+full_name+`</a>
				// 				     	<div class="sub header">`+position+`</div>
				// 				    </div>
				// 				</div>
				// 			</div>
				// 		`
				// 	});
				// });
				$('#clear_button')
				  	.on('click', function() {
					    $('.clear.example .ui.dropdown')
					      .dropdown('clear')
					    ;
				  	})
				;
			}
			loading_stop();
		});
	}
	function load_active_user_data() {
		loading_start('Loading');
	    var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_active_user_data");
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					var user_id = value.user_id;
					var first_name = value.first_name.UCwords();
					var middle_name = value.middle_name.UCwords();
					var last_name = value.last_name.UCwords();
					var suffix = value.suffix.UCwords();
					var gender = value.gender;
					var position = value.position.UCwords();
					var image = value.image;
				
					full_name = first_name+' '+middle_name[0]+'. '+last_name

					if (suffix != '') {
						full_name += ' '+suffix+'.';
					}
					$('#full_name_holder').html(full_name);
					$('#full_name_holder').popup({
						transition : 'drop',
						position   : 'top center',
						inline     : true,
						title      : 'Person Name',
						variation  : 'very wide large',
						html       : `
							<div class="ui middle aligned list">
								<div class="item">
									<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="ui circular tiny image">
								    <div class="content">
								      	<a class="ui header small">`+full_name+`</a>
								     	<div class="sub header">`+position+`</div>
								    </div>
								</div>
							</div>
						`
					});
				});
				loading_stop();
			}
		})
	}

	function load_updating_announcement() {
		loading_start('Loading');
	    var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_updating_announcement");
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					var announcement_id = value.announcement_id;
					var user_id = value.user_id;
					var announcement_title = value.announcement_title;
					var announcement_file = value.announcement_file;
					var announcement_date = value.announcement_date;
					
					var user_id = value.user_id;
					var first_name = value.first_name;
					var middle_name = value.middle_name;
					var last_name = value.last_name;
					var suffix = value.suffix;
					var gender = value.gender;

					var full_name = first_name+' '+middle_name[0]+'. '+last_name+' '+suffix;

					var focal_image = value.focal_image;
					var focal_person = full_name;
					var focal_position = value.focal_position;

					$('#active_announcement_id').val(announcement_id);
					$('#announcement_title').val(announcement_title);
					$('#announcement_title').val(announcement_title);
					$('#announcement_preview_title_inner').html(announcement_title);
					$('#announcement_preview_title_outer').html(announcement_title);

					$('#announcement_preview_file_inner')
  					.attr('data', '<?php echo base_url();?>photos/announcement_images/'+project_image)
					;
					$('#announcement_file_outer')
						.attr('data', '<?php echo base_url();?>photos/announcement_images/'+project_image)
					;

					$('#announcement_file_name').val(project_image);

					$('#start_date').val(project_start);
					$('#end_date').val(project_deadline);
					$('#start_date_outer').html(stringify_date(project_start));
					$('#end_date_outer').html(stringify_date(project_deadline));

					$('#project_description_holder').html(project_description);
					$('#project_description').html(project_description);
					$('#project_description_value').val(project_description);

					load_unassigned_users(user_id);

					function stringify_date(date_string) {
						var date = new Date(date_string);
				  		var day = ('0' + date.getDate()).slice(-2);
				  		var month = ('0' + (parseInt(date.getMonth())+1)).slice(-2);
				  		var year = date.getFullYear();
				  		var format_date = year+'-'+month+'-'+day;
				  		var months_list = ["Jan.",	"Feb.", "Mar.", "Apr.", "May.", "Jun.", "Jul.", "Aug.", "Sep.",	"Oct.",	"Nov.",	"Dec."];

				  		display_date = months_list[parseInt(month)-1]+' '+day+', '+year;
				  		return display_date;	
					}

					project_start = stringify_date(project_start);
					project_deadline = stringify_date(project_deadline);

					tinymce.init({
						selector: 'textarea#project_description',
						toolbar_location: 'top',
						statusbar: false,
						menubar: 'file edit insert view format table',
						plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount autoresize code',
						toolbar1: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | backcolor forecolor | align lineheight | numlist bullist indent outdent | emoticons charmap code removeformat',
						toolbar_mode: 'scrolling',
						content_style:
							"@import url('https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Roboto&display=swap'); body {margin-top: 1rem;} body::-webkit-scrollbar { display: none !important;} h1,h2,h3,h4,h5,h6 { font-family: 'Lato', sans-serif; }",
						font_family_formats: 'Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats; Roboto',
						height: 400,
						min_height: 400,
						max_height: 600,
						autoresize_overflow_padding: 30,
						invalid_elements: '',
						content_css: [
							'<?php echo base_url();?>semantic/dist/semantic.min.css',
							'<?php echo base_url();?>style/admin_window_style.css'
						],
						setup: function(editor) {
							editor.on('keydown', function(event) {
								if (event.keyCode == 9) { // tab pressed
								if (event.shiftKey) {
									editor.execCommand('Outdent');
								}
								else {
									editor.execCommand('Indent');
								}

								event.preventDefault();
								return false;
								}
							});
						},
						init_instance_callback: function (editor) {
							editor.on('input', function(input){
								mirror_data();
							});
							editor.on('undo', function(input){
								mirror_data();
							});
							editor.on('redo', function(input){
								mirror_data();
							});
							editor.on('change', function(input){
								mirror_data();
							});
							function mirror_data() {
								project_description = tinymce.get("project_description").getContent();
								$('#project_description_holder').html(project_description);
								$('#project_description_value').val(project_description);
								$('#announcement_creation_form').form('validate field', 'project_description_value');
							}
						}
					});
				});
			}
			loading_stop();
		});
	}

	$('#announcement_creation_form')
	  	.form({
	  		on: 'change',
	  		inline: true,
	    	transition: 'swing down',
	    	onInvalid: function() {
				// 
	    	},
	        onSuccess: function(event) {
	        	event.preventDefault();
				if($('#announcement_creation_form').form('is valid')) {
					var active_announcement_id = $('#active_announcement_id').val();
					if (active_announcement_id != "") {
						url_value = '<?php echo base_url();?>i.php/sys_control/update_announcement_details'	
					}
					else {
						url_value = '<?php echo base_url();?>i.php/sys_control/save_new_announcement'
					}
					var ajax = $.ajax({
						method: 'POST',
						url   : url_value,
						data  : new FormData(this),
						contentType: false,
						cache: false,
		    			processData: false
					});
					var jqxhr = ajax
						.done(function() {
							// alert(jqxhr.responseText);
						})
						.fail(function() {
							// alert(jqxhr.responseText);
							// alert($("#project_description_value").val());
						})
						.always(function() {
							var obj = JSON.parse(jqxhr.responseText);
							$.each(obj, function(key, value) {
								var response_status = value['status_type'];
								var response_message = value['message'];

								if (response_status == 'duplicate') {
									duplicate_message = 'The announcement title "'+response_message+'" you entered has a duplicate in the system.<br><x class="orange-text">INVALID ENTRY</x>';
									$('#announcement_creation_form').form('reset')
									$('#announcement_file_outer')
					  					.attr('data', '<?php echo base_url();?>photos/background/blue_wall.jpg')
					  				;
					  				$('#announcement_preview_file_inner')
					  					.attr('data', '<?php echo base_url();?>photos/background/blue_wall.jpg')
					  				;
									icon = 'window close red';
							  		header = 'Registration Failed!';
								  	message = duplicate_message;
								  	duration = 25000;
								  	load_notification(icon, header, message, duration);	
								}
								else if (response_status == 'error') {
									icon = 'close red';
							  		header = 'Post Creation Failed!';
								  	message = response_message.UCfirst();
								  	duration = 25000;
								  	load_notification(icon, header, message, duration);	
								}
								else if (response_status == 'success') {
									$('#announcement_creation_form').form('reset');
									$('#announcement_file_outer')
					  					.attr('data', '<?php echo base_url();?>photos/background/blue_wall.jpg')
					  				;
					  				$('#announcement_preview_file_inner')
					  					.attr('data', '<?php echo base_url();?>photos/background/blue_wall.jpg')
					  				;
									icon = 'check green';
							  		header = 'Announcement details saved! Status: Posted';
								  	message = '';
								  	duration = 25000;
								  	load_notification(icon, header, message, duration);	
								}
							});
							location.reload();
						})
					;
				}
	        },
	    	fields: {
	      		announcement_title: {
			        identifier: 'announcement_title',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Announcement Title.'
			          	}
			        ]
	      		},
	      		announcement_file_name: {
			        identifier: 'announcement_file_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please select a valid Announcement File.'
			          	}
			        ]
	      		}
	      	}
	  	})
	;
</script>
</html>