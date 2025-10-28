<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.tiny.cloud/1/1f9g33l878bpiksrb7cmiajc3fbvu24bmi4c0ypcg3u0n7hd/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
	<title>Project Creation</title>
</head>
<?php include 'esses/notifications.php';?>
<body>
	<header>
		<?php include 'esses/nav.php';?>
	</header>
	<main>
		<br>
		<br>
		<form class="ui form" enctype="multipart/form-data" id="post_creation_form">
			<input type="hidden" name="active_project_id" id="active_project_id" value="">
			<div class="ui column grid centered">
				<div class="column row centered">
					<div class="sixteen wide column">
						<h1 class="ui header center aligned pointered">
							<a id="page_label">Project Editor</a>
						</h1>
					</div>	
				</div>
				<div class="column row centered">
					<div class="fourteen wide mobile seven wide tablet four wide computer four wide large screen column">
						<h3 class="ui header center aligned pointered">Post Preview</h3>
						<div class="ui link raised fluid card">
							<div class="ui blurring dimmable inverted image dimmable-image modal_activator">
								<div class="ui dimmer">
									<div class="content">
										<h5>View Article</h5>
									</div>
								</div>
								<img src="<?php echo base_url();?>photos/post_images/default.jpg" class="post_image" id="post_image_outer">
							</div>
						    <div class="content">
							    <h2 class="header" id="project_title_outer">Project Title</h2>
							    <div class="meta">
							    	<a class="activating element" id="profile_preview">
							    		<span>
							    			Focal:		
							    		</span>
							    		<strong id="focal_name_holder">
											Focal Name				    			
							    		</strong>
							    	</a>
							    </div>
							    <br>
							    <div class="meta">
							        <span class="ui middle aligned">
							        	<i class="calendar alternate outline icon"></i>
							        	<span id="start_date_outer">Start Date</span>
							        	to&nbsp;
							        	<span id="end_date_outer">End Date</span>
							        </span>
							    </div>
						    </div>
						    <div class="extra content">
				    			<span class="ui small indicating active progress" data-percent="0" data-total="100">
									<div class="bar">
										<div class="progress"></div>
									</div>
									<div class="label">Project Progress</div>
								</span>
						    </div>
						    <div class="ui longer large modal modal_body">
							  	<div class="header" align="center" id="project_title_inner">Project Title</div>
							  	<div class="scrolling content">
							  		<div class="ui grid column centered">
										<div class="fifteen wide mobile fourteen wide tablet twelve wide computer ten wide large screen column centered">
									    	<a class="ui bordered center aligned rounded fluid image">
												<img src="<?php echo base_url();?>photos/post_images/default.jpg" class="post_image" id="post_image_inner">
										    </a>
									    </div>
									</div>
							  		<div class="ui grid column centered">
										<div class="fifteen wide mobile fourteen wide tablet twelve wide computer ten wide large screen column centered">
								  			<div class="text" id="project_description_holder">
								  				Project Description
								  				<br>
									    	</div>
									    </div>	
							  		</div>
							  	</div>
							  	<div class="actions">
								    <div class="ui right labeled icon cancel button basic orange">
							        	<i class="close icon"></i>
								    	Close
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="sixteen wide column mobile only"></div>
					<div class="fourteen wide mobile seven wide tablet five wide computer five wide large screen column">
						<h3 class="ui header center aligned pointered" id="project_details_section">Project Details</h3>
						<div class="ui segment raised" id="project_details_segment">
							<div class="field">
								<div class="ui left action input">
									<div class="ui animated button basic tiny" tabindex="-1">
										<div class="hidden content"><small>Project Title</small></div>
										<div class="visible content">
											&emsp;<i class="right user icon large"></i>&emsp;
										</div>
									</div>
									<input type="text" value="" placeholder="Project Title" name="project_title" id="project_title">
								</div>
						  	</div>
						  	<div class="field">
								<div class="ui left action input">
									<div class="ui animated button basic tiny" tabindex="-1">
										<div class="hidden content"><small>Focal Person</small></div>
										<div class="visible content">
											&emsp;<i class="right address card icon large"></i>&emsp;
										</div>
									</div>
									<div class="ui fluid search dropdown scrolling selection" id="focal_drop">
										<input type="hidden" name="focal_person_id" id="focal_person_id" value="">
										<i class="dropdown icon"></i>
										<div class="default text" id="focal_default_value">Focal Person</div>
										<div class="menu" id="focal_drop_menu">
											
										</div>
  									</div>
								</div>
						  	</div>
						  	<div class="field">
								<div class="ui left action input">
									<div class="ui animated button basic tiny" tabindex="-1">
										<div class="hidden content"><small>Post Image</small></div>
										<div class="visible content">
											&emsp;<i class="image outline icon large"></i>&emsp;
										</div>
									</div>
									<input type="text" value="" placeholder="Post Image" name="post_image_name" id="post_image_name">
									<input type="file" class="file_input" accept="image/*" name="post_image_input" id="post_image_input">
								</div>
						  	</div>
						  	<div class="two fields">
						  		<div class="field">
									<div class="ui left action input">
										<div class="ui animated button basic tiny" tabindex="-1">
											<div class="hidden content"><small>Start Date</small></div>
											<div class="visible content">
												&emsp;<i class="calendar check outline icon large"></i>&emsp;
											</div>
										</div>
										<input type="date" placeholder="yyyy-mm-dd" name="start_date" id="start_date">
									</div>
							  	</div>
							  	<div class="field">
									<div class="ui right action input">
										<input type="date" placeholder="End Date" name="end_date" id="end_date">
										<div class="ui animated button basic tiny" tabindex="-1">
											<div class="hidden content"><small>End Date</small></div>
											<div class="visible content">
												&emsp;<i class="calendar times outline icon large"></i>&emsp;
											</div>
										</div>
									</div>
							  	</div>
						  	</div>
						</div>
					</div>
				</div>
				<div class="column row centered">
					<div class="fourteen wide mobile fourteen wide tablet nine wide computer nine wide large screen column centered">
						<h3 class="ui header center aligned pointered" id="project_description_section">Project Description</h3>
						<div class="ui segment compact" id="project_description_segment">
							<textarea class="ui segment" id="project_description">Project Description</textarea>
							<div class="field">
								<input class="hidden_input" type="text" name="project_description_value" id="project_description_value">
							</div>
						</div>
					</div>
				</div>
				<div class="column row centered">
					<div class="field">
				  		<button class="ui positive button" type="submit">Save Project</button>
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
	$('.active.progress').progress();
	$('.activating.element').popup();
	$('.ui.sticky')
		.sticky({
	    	context: 'main'
	  	})
	;
	$('.dimmable-image').dimmer({
	  	on: 'hover'
	});
	$('.modal_activator')
	  	.on('click', function() {
			$('.modal_body')
				.modal('setting', 'transition', 'fade down')
				.modal('setting', 'closable', false)
			  	.modal('show')
			;
		})
	;
	$('#project_title')
	  	.on('input', function() {
	  		var input_value = $('#project_title').val();
	  		$('#project_title_outer').html(input_value);
	  		$('#project_title_inner').html(input_value);
		})
	;
	$('#focal_drop')
		.dropdown({
			onChange: function() {
				var input_value = $('#focal_person_id').val();
				var input_text = $('#focal_drop').dropdown('get text');
				$('#focal_name_holder').html(input_text.trim());
			}
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

	$(document).ready(function() {
		load_unassigned_users();
		load_updating_project();
	});
	function load_unassigned_users(active_focal_id) {
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
				$('#focal_drop_menu').html('');
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
					
					if (active_focal_id == user_id && active_project_id != '') {
						options = `
							<div class="item focal_option" data-value="`+user_id+`" data-user_id="`+user_id+`" data-image="`+image+`" data-full_name="`+full_name+`" data-position="`+position+`">
								<div class="ui avatar image image_container">
									<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="center middle aligned flowing_image image bordered">
								</div>
								<span>`+full_name+`</span>
							</div>
						`;
						$('#focal_drop').dropdown('set selected', user_id);
						$('#profile_preview').popup({
							transition : 'drop',
							position   : 'top center',
							inline     : true,
							title      : 'Person Name',
							variation  : 'very wide large',
							html       : `
								<div class="ui middle aligned list">
									<div class="item">
										<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="ui tiny image center middle aligned circular">
									    <div class="content">
									      	<a class="ui header small">`+full_name+`</a>
									     	<div class="sub header">`+position+`</div>
									    </div>
									</div>
								</div>
							`
						});
					}
					else {
						options = `
							<div class="item focal_option" data-value="`+user_id+`" data-user_id="`+user_id+`" data-image="`+image+`" data-full_name="`+full_name+`" data-position="`+position+`">
								<div class="ui avatar image image_container">
									<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="center middle aligned flowing_image image bordered">
								</div>
								<span>`+full_name+`</span>
							</div>
						`;
					}
					
					$('#focal_drop_menu').append(options);
				})
				$('.focal_option').on('click', function() {
					user_id = $(this).data('user_id');
					image = $(this).data('image');
					full_name = $(this).data('full_name');
					position = $(this).data('position');

					$('#profile_preview').popup({
						transition : 'drop',
						position   : 'top center',
						inline     : true,
						title      : 'Person Name',
						variation  : 'very wide large',
						html       : `
							<div class="ui middle aligned list">
								<div class="item">
									<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="ui tiny image center middle aligned circular">
								    <div class="content">
								      	<a class="ui header small">`+full_name+`</a>
								     	<div class="sub header">`+position+`</div>
								    </div>
								</div>
							</div>
						`
					});
				});
			}
			loading_stop();
		});
	}
	
	function load_updating_project() {
		loading_start('Loading');
	    var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_updating_project");
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
					var project_id = value.project_id;
					var project_title = value.project_title;
					var project_status = value.project_status;
					var project_image = value.project_image;
					var project_start = value.project_start;
					var project_deadline = value.project_deadline;
					var project_description = value.project_description;
					var progress_percent = value.progress_percent;
					
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

					$('#active_project_id').val(project_id);
					$('#project_title').val(project_title);
					$('#project_title').val(project_title);
					$('#project_title_inner').html(project_title);
					$('#project_title_outer').html(project_title);

					$('#post_image_inner')
  					.attr('src', '<?php echo base_url();?>photos/post_images/'+project_image)
					;
					$('#post_image_outer')
						.attr('src', '<?php echo base_url();?>photos/post_images/'+project_image)
					;

					$('#post_image_name').val(project_image);

					$('#start_date').val(project_start);
					$('#end_date').val(project_deadline);
					$('#start_date_outer').html(stringify_date(project_start));
					$('#end_date_outer').html(stringify_date(project_deadline));

					$('#project_description_holder').html(project_description);
					$('#project_description').html(project_description);
					$('#project_description_value').val(project_description);

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
								$('#post_creation_form').form('validate field', 'project_description_value');
							}
						}
					});
				});
			}
			loading_stop();
		});
	}
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
				$('#post_creation_form').form('validate field', 'project_description_value');
	        }
	    }
	});
	$('#post_image_name')
		.on('click', function() {
		  	$('#post_image_input').trigger('click');
		  	$('#post_image_name').trigger('blur');
		})
		.on('focus', function() {
		  	$('#post_image_input').trigger('click');
		  	$('#post_image_name').trigger('blur');
		})
	;
	$('#post_image_input')
	  	.on('change', function() {
	  		var file = $('#post_image_input')[0].files[0]; 
	  		// IF IMAGE INPUT IS NOT EMPTY
	  		if (file) {
	  			$('#post_image_name').val(file.name);
	  			$('#post_image_inner')
			  		.attr('src', URL.createObjectURL(file))
				;
				$('#post_image_outer')
			  		.attr('src', URL.createObjectURL(file))
				;
	  		}
	  		else {
	  			$('#post_image_name').val(null);
		  		$('#post_image_inner')
  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
				;
				$('#post_image_outer')
  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
				;
	  		}
			$('#post_creation_form').form('validate field', 'post_image_name');
	  	})
	;
	
	$('#post_creation_form')
	  	.form({
	  		on: 'change',
	  		inline: true,
	    	transition: 'swing down',
	    	onInvalid: function() {
				title_valid = $('#post_creation_form').form('is valid', 'project_title');
				focal_valid = $('#post_creation_form').form('is valid', 'focal_person_id');
				image_valid = $('#post_creation_form').form('is valid', 'post_image_name');
				start_valid = $('#post_creation_form').form('is valid', 'start_date');
				end_valid = $('#post_creation_form').form('is valid', 'end_date');

				if (title_valid && focal_valid && image_valid && start_valid && end_valid) {
						
					$("#project_description_section")[0].scrollIntoView({
					    behavior: "smooth",
					    block: "start",
					    top: 5
					});
					$("#project_description_segment").transition('bounce');
				}
				else {
					$("#project_details_section")[0].scrollIntoView({
					    behavior: "smooth",
					    block: "start",
					    top: 5
					});
				}
	    	},
	        onSuccess: function(event) {
	        	event.preventDefault();
	        	project_description = $("#project_description_value").val();
				if($('#post_creation_form').form('is valid') && (project_description != null || project_description != '<p>Project Description</p>')) {
					var active_project_id = $('#active_project_id').val();
					if (active_project_id != "") {
						url_value = '<?php echo base_url();?>i.php/sys_control/update_project_details'	
					}
					else {
						url_value = '<?php echo base_url();?>i.php/sys_control/save_new_project'
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
							alert($("#project_description_value").val());
						})
						.always(function() {
							var obj = JSON.parse(jqxhr.responseText);
							console.log(obj);
							$.each(obj, function(key, value) {
								var response_status = value['status_type'];
								var response_message = value['message'];

								if (response_status == 'duplicate') {
									duplicate_message = 'The project title "'+response_message+'" you entered has a duplicate in the system.<br><x class="orange-text">INVALID ENTRY</x>';
									$('#post_creation_form').form('reset')
									$('#post_image_outer')
					  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
					  				;
					  				$('#post_image_inner')
					  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
					  				;
									icon = 'window close red';
							  		header = 'Registration Failed!';
								  	message = duplicate_message;
								  	duration = 25000;
								  	load_notification(icon, header, message, duration);	
								}
								else if (response_status == 'error') {
									icon = 'close red';
							  		header = 'Project Creation Failed!';
								  	message = response_message.UCfirst();
								  	duration = 25000;
								  	load_notification(icon, header, message, duration);	
								}
								else if (response_status == 'success') {
									$('#post_creation_form').form('reset');
									$('#post_image_outer')
					  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
					  				;
					  				$('#post_image_inner')
					  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
					  				;
									icon = 'check green';
							  		header = 'Project details saved! Status: Posted';
								  	message = '';
								  	duration = 25000;
								  	load_notification(icon, header, message, duration);	
								}
							});
							location.reload();
						})
					;
				}
				else if (project_description == null || project_description == '<p>Project Description</p>') {
					$("#project_description_section")[0].scrollIntoView({
					    behavior: "smooth",
					    block: "start"
					});
				}
	        },
	    	fields: {
	      		project_title: {
			        identifier: 'project_title',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a Project Title.'
			          	}
			        ]
	      		},
	      		focal_person_id: {
			        identifier: 'focal_person_id',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please select a Focal.'
			          	}
			        ]
	      		},
	      		post_image_name: {
			        identifier: 'post_image_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please select a valid Project Image.'
			          	}
			        ]
	      		},
	      		start_date: {
			        identifier: 'start_date',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Start Date.'
			            }
			        ]
	      		},
	      		end_date: {
			        identifier: 'end_date',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid End Date.'
			            }
			        ]
	      		},
	      		project_description_value: {
			        identifier: 'project_description_value',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Project Description.'
			            }
			        ]
	      		}
	      	}
	  	})
	;
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
</script>
</html>