<script type="text/javascript">
	$(document)
		.ready(function() {
	   		load_active_announcements();
	   		login_monitor_loop = setInterval(function() {
		   		login_monitor();
			}, 2500);
			$('.actions_drop').dropdown({
				direction: 'upward',
				transition: 'fade up',
				fullTextSearch: true,
				action: 'nothing'
			});
			load_user_system_datetime();
			auto_font();
			// all_comments_monitor_loop = setInterval(function() {
			//     all_comments_monitor(target_point_id);
			// }, 1500);
		})
	;
	$(window).on('resize', function() {
		auto_font();
	});
	var day = '';
	var month = '';
	var year = '';

	var current_date = '';
	var current_time = '';

	function load_user_system_datetime() {
	    var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_system_datetime");
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$.each(response_data, function(key, value) {
				current_time = value.current_time;
				current_reports_date = current_date;
				current_date = value.current_date;
				previous_month = value.previous_month;

				year = current_date.substring(0,4);
				month = current_date.substring(5,7);
				day = current_date.substring(8,10);

				$('#report_date').val(current_date);
				$('#request_date').attr('min', previous_month);
				$('#request_date').attr('max', current_date);

				$('#restock_date').attr('min', previous_month);
				$('#restock_date').attr('max', current_date);
			})
		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			
		})
	}
	function auto_font() {
		const screen_width = window.innerWidth;
	  	let font_size = 14;

	  	if (screen_width < 768) {
	    	font_size = 10;
	  	} 
	  	else if (screen_width >= 768 && screen_width < 1200) {
	    	font_size = 12;
	  	} 
	  	else {
	    	font_size = 14;
	  	}
	  	document.documentElement.style.fontSize = font_size + 'px';
	}

	function login_monitor() {
		var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/login_monitor");
		var jqxhr = ajax
		.done(function() {
			var response_data = jqxhr.responseText;
			if (response_data == '123Xah') {
				if ($('#c_notification').modal('is active')) {
					icon = 'green check circle outline';
					header = 'Connection Restored';
					message = 'You\'re back online.';
					load_c_notification(icon, header, message, 'single', 'basic');
					setTimeout(function() {
						$('#c_notification')
							.modal('hide')
						;
					},3000);	
				}
			}
			else {
				window.location.replace("<?php echo base_url();?>i.php/sys_control/login?login=false");
			}
		})
		.fail(function()  {
			var response_data = jqxhr.status;
			if (response_data == 0) {
				icon = 'spinner orange loading';
				header = 'Connection Lost';
				message = 'Your seem to be offline. Please check your internet connection.';
				load_c_notification(icon, header, message, 'single', 'basic');
			}
		})
	}
	// $('.menu .item').tab();
	$('#upload_activator')
		.on('click', function() {
			$('#support_documents').trigger('click');
		})
	;
	$('#support_documents')
		.on('input', function() {
			var files_length = this.files.length;
			var files_array = [];
			// var default_data = `
			// 	<div class="ui header medium center aligned">
			// 		Supporting Documents
			// 	</div>
			// `;
			// $('#support_documents_container').html(default_data);
        	$('#support_documents_container').empty();

			if (files_length > 10) {
				icon = 'close red';
				header = 'Too many files!';
				message = 'You have chosen '+files_length+' files. The maximum number of supporting documents allowed is 10';
				duration = 25000;
				load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');

				$('#file_input_indicator').val('false').trigger('input');
				$('#support_documents').val('');
			}
			else if (files_length == 0) {
				$('#file_input_indicator').val('false').trigger('input');
			}
			else {
				for (i = 0; i < files_length; i++) {
					files_array.push(this.files[i]);

					file_name = this.files[i].name;
					file_ext = file_name.substr(file_name.lastIndexOf('.') + 1);
					String(file_name.split('.')[1]).toLowerCase();

					if (file_ext == 'pdf') {
						file_type = 'pdf';
						file_color = 'red';
					}
					else if (file_ext == 'docx' || file_ext == 'doc') {
						file_type = 'word';
						file_color = 'blue';
					}
					else if (file_ext == 'xlsx' || file_ext == 'xlsm' || file_ext == 'xls' || file_ext == 'xml') {
						file_type = 'excel';
						file_color = 'green';
					}
					else if (file_ext == 'pptx' || file_ext == 'pptm' || file_ext == 'ppt') {
						file_type = 'powerpoint';
						file_color = 'orange';
					}
					else if (file_ext == 'jpg' || file_ext == 'jpeg' || file_ext == 'png') {
						file_type = 'image';
						file_color = 'brown';
					}
					else if (file_ext == 'mp4' || file_ext == 'mov' || file_ext == 'avi') {
						file_type = 'video';
						file_color = 'yellow';
					}
					else if (file_ext == 'zip' || file_ext == 'rar') {
						file_type = 'archive';
						file_color = 'grey';
					}

					file_item = `
						<div class="ui raised link card upload_files_popup" data-content="`+file_name+`">
					      	<div class="content">
						      	<h4 class="ui icon header">
									<i class="file `+file_type+` `+file_color+` outline icon"></i>	
						      	</h4>
					        	<a class="ui bottom attached `+file_color+` mini label truncate-text">`+file_name+`</a>
					      	</div>
					    </div>
					`;
					// <i class="delete icon deleter" id="deleter`+i+`" data-deletion_target="file`+i+`" data-array_index="`+i+`"></i>
					$('#support_documents_container').append(file_item);
					$('#file_input_indicator').val('true').trigger('input');
					$('#progress_update_form').form('validate field', 'file_input_indicator');
				}	
				$('.upload_files_popup')
					.popup({
				    	// boundary: '#project_update_content',
				  		variation: 'tiny'
				  	})
				;
				$('.deleter')
					.on('click', function() {
						var index = $(this).data('array_index');
						files_array.splice(index, 1);

						$('#'+$(this).data('deletion_target')).remove();
					})
				;
			}
		})
	;
	$('#progress_minus')
		.on('mousedown', function() {
			sub_timeout = setTimeout(function() {
				sub_interval = setInterval(function(){
					var data_value = $('#progress_update_value').progress('get value');
					var min_progress = $('#active_project_progress').val();
						
					if (data_value > min_progress) {
						$('#progress_update_value').progress('decrement');
						data_value = $('#progress_update_value').progress('get value');

						$('#progress_bar_value').val(data_value);
						$('#progress_update_label').html(data_value+'% Progress');
						$('#progress_update_form').form('validate field', 'progress_bar_value');	
						if (data_value == min_progress) {
							$('#progress_bar_value').val('');
							$('#progress_update_form').form('validate field', 'progress_bar_value');
						}
					}
					else {
						$('#progress_bar_value').val('');
						$('#progress_update_form').form('validate field', 'progress_bar_value');	
					}
					$('#point_color').val($('#bar').css('background-color'));
				}, 30);
			}, 300);
		})
		.on('mouseup', function() {
			if (typeof(sub_timeout) != "undefined" && sub_timeout !== null) {
				clearInterval(sub_timeout);
			}
			if (typeof(sub_interval) != "undefined" && sub_interval !== null) {
				clearInterval(sub_interval);
			}
			$('#point_color').val($('#bar').css('background-color'));
		})
		.on('mouseleave', function() {
			if (typeof(sub_timeout) != "undefined" && sub_timeout !== null) {
				clearInterval(sub_timeout);
			}
			if (typeof(sub_interval) != "undefined" && sub_interval !== null) {
				clearInterval(sub_interval);
			}
			$('#point_color').val($('#bar').css('background-color'));
		})
		.on('click', function() {
			var data_value = $('#progress_update_value').progress('get value');
			var min_progress = $('#active_project_progress').val();
				
			if (data_value > min_progress) {
				$('#progress_update_value').progress('decrement');
				data_value = $('#progress_update_value').progress('get value');
				
				$('#progress_bar_value').val(data_value);
				$('#progress_update_label').html(data_value+'% Progress');
				$('#progress_update_form').form('validate field', 'progress_bar_value');
				if (data_value == min_progress) {
					$('#progress_bar_value').val('');
					$('#progress_update_form').form('validate field', 'progress_bar_value');
				}
			}
			else {
				$('#progress_bar_value').val('');
				$('#progress_update_form').form('validate field', 'progress_bar_value');	
			}
			$('#point_color').val($('#bar').css('background-color'));
		})
	;
	$('#progress_plus')
		.on('mousedown', function() {
			add_timeout = setTimeout(function() {
				add_inverval = setInterval(function(){
					$('#progress_update_value').progress('increment');
					var data_value = $('#progress_update_value').progress('get value');
					if (data_value > 0) {
						$('#progress_bar_value').val(data_value);
					}
					else {
						$('#progress_bar_value').val('');
					}
					$('#progress_update_label').html(data_value+'% Progress');
					$('#progress_update_form').form('validate field', 'progress_bar_value');
					$('#point_color').val($('#bar').css('background-color'));
				}, 30);
			}, 300);
		})
		.on('mouseup', function() {
			if (typeof(add_timeout) != "undefined" && add_timeout !== null) {
				clearInterval(add_timeout);
			}
			if (typeof(add_inverval) != "undefined" && add_inverval !== null) {
				clearInterval(add_inverval);
			}
			$('#point_color').val($('#bar').css('background-color'));
		})
		.on('mouseleave', function() {
			if (typeof(add_timeout) != "undefined" && add_timeout !== null) {
				clearInterval(add_timeout);
			}
			if (typeof(add_inverval) != "undefined" && add_inverval !== null) {
				clearInterval(add_inverval);
			}
			$('#point_color').val($('#bar').css('background-color'));
		})
		.on('click', function() {
			$('#progress_update_value').progress('increment');
			var data_value = $('#progress_update_value').progress('get value');
			if (data_value > 0) {
				$('#progress_bar_value').val(data_value);
			}
			else {
				$('#progress_bar_value').val('');
			}
			$('#progress_update_label').html(data_value+'% Progress');
			$('#progress_update_form').form('validate field', 'progress_bar_value');
			$('#point_color').val($('#bar').css('background-color'));
		})
	;

	$('#progress_minus-alternate')
		.on('mousedown', function() {
			sub_timeout = setTimeout(function() {
				sub_interval = setInterval(function(){
					var data_value = $('#progress_update_value').progress('get value');
					var update_type = $('#update_type_checker').val();
					var active_progress = $('#active_project_progress').val();
					
					if (update_type == 'update') {
						if (data_value > active_progress) {
							$('#progress_update_value').progress('decrement');
							data_value = $('#progress_update_value').progress('get value');

							$('#progress_bar_value').val(data_value);
							$('#progress_update_label').html(data_value+'% Progress');
							$('#progress_update_form').form('validate field', 'progress_bar_value');	
							if (data_value == active_progress) {
								$('#progress_bar_value').val('');
								$('#progress_update_form').form('validate field', 'progress_bar_value');
							}
						}
						else {
							$('#progress_bar_value').val('');
							$('#progress_update_form').form('validate field', 'progress_bar_value');	
						}	
					}
					else if (update_type == 'edit') {
						$('#progress_update_value').progress('decrement');
						data_value = $('#progress_update_value').progress('get value');

						$('#progress_bar_value').val(data_value);
						$('#progress_update_label').html(data_value+'% Progress');
						$('#progress_update_form').form('validate field', 'progress_bar_value');	
						if (data_value == active_progress) {
							$('#progress_bar_value').val('');
							$('#progress_update_form').form('validate field', 'progress_bar_value');
						}
					}
					
					$('#point_color').val($('#bar').css('background-color'));
				}, 30);
			}, 300);
		})
		.on('mouseup', function() {
			if (typeof(sub_timeout) != "undefined" && sub_timeout !== null) {
				clearInterval(sub_timeout);
			}
			if (typeof(sub_interval) != "undefined" && sub_interval !== null) {
				clearInterval(sub_interval);
			}
			$('#point_color').val($('#bar').css('background-color'));
		})
		.on('mouseleave', function() {
			if (typeof(sub_timeout) != "undefined" && sub_timeout !== null) {
				clearInterval(sub_timeout);
			}
			if (typeof(sub_interval) != "undefined" && sub_interval !== null) {
				clearInterval(sub_interval);
			}
			$('#point_color').val($('#bar').css('background-color'));
		})
		.on('click', function() {
			var data_value = $('#progress_update_value').progress('get value');
			var update_type = $('#update_type_checker').val();
			var active_progress = $('#active_project_progress').val();
			
			if (update_type == 'update') {
				if (data_value > active_progress) {
					$('#progress_update_value').progress('decrement');
					data_value = $('#progress_update_value').progress('get value');

					$('#progress_bar_value').val(data_value);
					$('#progress_update_label').html(data_value+'% Progress');
					$('#progress_update_form').form('validate field', 'progress_bar_value');	
					if (data_value == active_progress) {
						$('#progress_bar_value').val('');
						$('#progress_update_form').form('validate field', 'progress_bar_value');
					}
				}
				else {
					$('#progress_bar_value').val('');
					$('#progress_update_form').form('validate field', 'progress_bar_value');	
				}	
			}
			else if (update_type == 'edit') {
				$('#progress_update_value').progress('decrement');
				data_value = $('#progress_update_value').progress('get value');

				$('#progress_bar_value').val(data_value);
				$('#progress_update_label').html(data_value+'% Progress');
				$('#progress_update_form').form('validate field', 'progress_bar_value');	
				if (data_value == active_progress) {
					$('#progress_bar_value').val('');
					$('#progress_update_form').form('validate field', 'progress_bar_value');
				}
			}
			$('#point_color').val($('#bar').css('background-color'));
		})
	;
	$('#progress_plus-alternate')
		.on('mousedown', function() {
			add_timeout = setTimeout(function() {
				add_inverval = setInterval(function(){
					var update_type = $('#update_type_checker').val();
					var active_progress = $('#active_project_progress').val();
					
					if (update_type == 'update') {
						$('#progress_update_value').progress('increment');
						var data_value = $('#progress_update_value').progress('get value');
						if (data_value > 0) {
							$('#progress_bar_value').val(data_value);
						}
						else {
							$('#progress_bar_value').val('');
						}
						$('#progress_update_label').html(data_value+'% Progress');
						$('#progress_update_form').form('validate field', 'progress_bar_value');
					}
					else if (update_type == 'edit') {
						$('#progress_update_value').progress('increment');
						var data_value = $('#progress_update_value').progress('get value');
						if (data_value == active_progress) {
							$('#progress_bar_value').val('');
						}
						else {
							if (data_value > 0) {
								$('#progress_bar_value').val(data_value);
							}
							else {
								$('#progress_bar_value').val('');
							}	
						}
						$('#progress_update_label').html(data_value+'% Progress');
						$('#progress_update_form').form('validate field', 'progress_bar_value');
						
					}
					$('#point_color').val($('#bar').css('background-color'));		
				}, 30);
			}, 300);
		})
		.on('mouseup', function() {
			if (typeof(add_timeout) != "undefined" && add_timeout !== null) {
				clearInterval(add_timeout);
			}
			if (typeof(add_inverval) != "undefined" && add_inverval !== null) {
				clearInterval(add_inverval);
			}
			$('#point_color').val($('#bar').css('background-color'));
		})
		.on('mouseleave', function() {
			if (typeof(add_timeout) != "undefined" && add_timeout !== null) {
				clearInterval(add_timeout);
			}
			if (typeof(add_inverval) != "undefined" && add_inverval !== null) {
				clearInterval(add_inverval);
			}
			$('#point_color').val($('#bar').css('background-color'));
		})
		.on('click', function() {
			var update_type = $('#update_type_checker').val();
			var active_progress = $('#active_project_progress').val();
			
			if (update_type == 'update') {
				$('#progress_update_value').progress('increment');
				var data_value = $('#progress_update_value').progress('get value');
				if (data_value > 0) {
					$('#progress_bar_value').val(data_value);
				}
				else {
					$('#progress_bar_value').val('');
				}
				$('#progress_update_label').html(data_value+'% Progress');
				$('#progress_update_form').form('validate field', 'progress_bar_value');
			}
			else if (update_type == 'edit') {
				$('#progress_update_value').progress('increment');
				var data_value = $('#progress_update_value').progress('get value');
				if (data_value == active_progress) {
					$('#progress_bar_value').val('');
				}
				else {
					if (data_value > 0) {
						$('#progress_bar_value').val(data_value);
					}
					else {
						$('#progress_bar_value').val('');
					}	
				}
				$('#progress_update_label').html(data_value+'% Progress');
				$('#progress_update_form').form('validate field', 'progress_bar_value');
				
			}
			$('#point_color').val($('#bar').css('background-color'));			
		})
	;

	$('.active.progress').progress();
	$('.activating.element').popup();
	$('.dimmable-image').dimmer({
		on: 'hover'
	});

	async function load_user_designations() {
		var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_user_designations");
		var jqxhr = ajax
		.done(function() {
			load_unassigned_users();
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
			var designation_key = jqxhr.responseText;
			
			switch(designation_key) {
				// Admin
				case '634BHi':
				case 'Z3Ne2R':
					designation_value = 'Admin Module';
					module_container = `
						<h2 class="ui header center aligned">
							<a class="pointered" id="page_label"></a>
						</h2>
						<div class="ui basic segment right aligned">
							<div class="ui search category right aligned" id="profiles_search">
								<i class="icons large link" id="contracts_activator" data-tooltip="Contracts" data-position="bottom left" data-variation="mini">
									<i class="book icon blue link"></i>
									<i class="pencil icon blue corner link"></i>
								</i>
							  	&emsp;
							  	<div class="ui icon input">
							    	<input class="prompt" type="text" placeholder="Search Profiles..." id="profiles_search_input">
							    	<i class="search icon"></i>
							  	</div>
							  	<div class="results"></div>
								&emsp;
							  	<i class="icons large link" id="" data-tooltip="Sort" data-position="bottom left" data-variation="mini">
									<i class="sort alphabet down icon grey link"></i>
								</i>
							</div>
						</div>
						<br>
						<div class="ui basic segment">
							<div class="ui four doubling special cards" id="users_cards_container">

							</div>
						</div>
					`;
					$('#class_management_activator').removeClass('invisible');
					$('#announcement_edit_activator').removeClass('invisible');
					$('#project_edit_activator').removeClass('invisible');
					$('#add_employee_activator').removeClass('invisible');
				break;
				// HR
				case 'R1T29a':
				case 'TX392a':
					designation_value = 'Human Resources Module';
					module_container = `
						<h2 class="ui header center aligned">
							<a class="pointered" id="page_label"></a>
						</h2>
						<div class="ui basic segment right aligned">
							<div class="ui search category right aligned" id="profiles_search">
								<i class="icons large link" id="new_project_activator" data-tooltip="New Project" data-position="bottom left" data-variation="mini">
									<i class="clipboard outline icon green link"></i>
									<i class="plus icon green corner link"></i>
								</i>
							  	&emsp;
							  	<div class="ui icon input">
							    	<input class="prompt" type="text" placeholder="Search Profiles..." id="profiles_search_input">
							    	<i class="search icon"></i>
							  	</div>
							  	<div class="results"></div>
								&emsp;
							  	<i class="icons large link" id="" data-tooltip="Sort" data-position="bottom left" data-variation="mini">
									<i class="sort alphabet down icon grey link"></i>
								</i>
							</div>
						</div>
						<div class="ui four doubling special cards" id="users_cards_container"></div>
					`;
					$('#class_management_activator').remove();
					$('#announcement_edit_activator').removeClass('invisible');
					$('#project_edit_activator').remove();
					$('#add_employee_activator').removeClass('invisible');
				break;
				// Supplies
				case 'K3tSnP':
					designation_value = 'Supplies Inventory Module';
					module_container = `
						<h2 class="ui header center aligned">
							<a class="pointered" id="page_label"></a>
						</h2>
						<div class="ui basic segment right aligned">
							<div class="ui search category right aligned" id="main_inventory_search">
								<i class="icons item large link" id="retrieval_basket_activator" data-tooltip="Retrieval Basket" data-position="bottom left" data-variation="mini">
									<i class="shopping basket icon blue link"></i>
									<div class="floating ui mini orange label transition hidden" id="retrieval_basket_indicator">0</div>
								</i>
							  	&emsp;
								<i class="icons large link" id="restocking_cart_activator" data-tooltip="Restocking Cart" data-position="bottom left" data-variation="mini">
									<i class="dolly icon teal link"></i>
									<div class="floating ui mini orange label transition hidden" id="restocking_cart_indicator">0</div>
								</i>
							  	&emsp;
								<i class="icons large link" id="ris_requests_activator" data-tooltip="Requisition Requests" data-position="bottom left" data-variation="mini">
									<i class="object group icon olive link"></i>
								</i>
							  	&emsp;
							  	<i class="icons large link" id="inventory_reports_activator" data-tooltip="Reports" data-position="bottom left" data-variation="mini">
									<i class="chart bar icon green link"></i>
								</i>
							  	&emsp;
							  	<div class="ui icon input">
							    	<input class="prompt" type="text" placeholder="Search Inventory...">
							    	<i class="search icon"></i>
							  	</div>
							  	<div class="results"></div>
								&emsp;
							  	<i class="icons large link" id="" data-tooltip="Sort" data-position="bottom left" data-variation="mini">
									<i class="sort alphabet down icon grey link"></i>
								</i>
							</div>
						</div>
						<div class="ui basic segment" id="main_inventory_cards_container"></div>
						<div class="ui basic segment center aligned">
						    <i class="caret left large icon link" id="inventory_navigation_left"></i><div class="ui compact scrolling dropdown" id="inventory_navigation_dropdown">
								<i class="icon link pointered" id="inventory_navigation_center">1</i>
								<div class="ui pagination menu" id="main_inventory_cards_navigation">
									
								</div>
							</div><i class="caret right large icon link" id="inventory_navigation_right"></i>
						</div>
					`;
					$('#class_management_activator').remove();
					$('#announcement_edit_activator').removeClass('invisible');
					$('#project_edit_activator').remove();
				break;
			}

			if (designation_key == 'Z3Ne2R' || designation_key == '634BHi') {
				user_tabs = `
					<a class="active item teal" data-tab="assigned_modules_tab">
						<h3 class="ui header center aligned pointered">`+designation_value+`</h3>
					</a>
					<a class="item teal" data-tab="supplies_inventory_tab">
						<h3 class="ui header center aligned pointered">Supplies Inventory Module</h3>
					</a>
					<a class="item teal" data-tab="personnel_section_tab" id="projects_tab">
						<h3 class="ui header center aligned pointered">Projects</h3>
					</a>
				`;
				user_section = `
					<div class="active ui bottom attached tab" data-tab="assigned_modules_tab" id="container_section">
						`+module_container+`
					</div>
					<div class="ui bottom attached tab" data-tab="supplies_inventory_tab" id="supplies_inventory_segment">
						<div class="ui basic segment right aligned">
							<div class="ui search category right aligned" id="main_inventory_search">
								<i class="icons item large link" id="retrieval_basket_activator" data-tooltip="Retrieval Basket" data-position="bottom left" data-variation="mini">
									<i class="shopping basket icon blue link"></i>
									<div class="floating ui mini orange label transition hidden" id="retrieval_basket_indicator">0</div>
								</i>
							  	&emsp;
								<i class="icons large link" id="restocking_cart_activator" data-tooltip="Restocking Cart" data-position="bottom left" data-variation="mini">
									<i class="dolly icon teal link"></i>
									<div class="floating ui mini orange label transition hidden" id="restocking_cart_indicator">0</div>
								</i>
							  	&emsp;
								<i class="icons large link" id="ris_requests_activator" data-tooltip="Requisition Requests" data-position="bottom left" data-variation="mini">
									<i class="object group icon olive link"></i>
								</i>
							  	&emsp;
							  	<i class="icons large link" id="inventory_reports_activator" data-tooltip="Reports" data-position="bottom left" data-variation="mini">
									<i class="chart bar icon green link"></i>
								</i>
							  	&emsp;
							  	<div class="ui icon input">
							    	<input class="prompt" type="text" placeholder="Search Inventory...">
							    	<i class="search icon"></i>
							  	</div>
							  	<div class="results"></div>
								&emsp;
							  	<i class="icons large link" id="" data-tooltip="Sort" data-position="bottom left" data-variation="mini">
									<i class="sort alphabet down icon grey link"></i>
								</i>
							</div>
						</div>
						<div class="ui basic segment" id="main_inventory_cards_container"></div>
						<div class="ui basic segment center aligned">
						    <i class="caret left large icon link" id="inventory_navigation_left"></i><div class="ui compact scrolling dropdown" id="inventory_navigation_dropdown">
								<i class="icon link pointered" id="inventory_navigation_center">1</i>
								<div class="ui pagination menu" id="main_inventory_cards_navigation">
									
								</div>
							</div><i class="caret right large icon link" id="inventory_navigation_right"></i>
						</div>
					</div>

					<div class="ui bottom attached tab" data-tab="personnel_section_tab" id="projects_segment">
						<div class="ui basic segment right aligned">
							<div class="ui search category right aligned" id="projects_search">
							  	<i class="icons large link" id="new_project_activator" data-tooltip="New Project" data-position="bottom left" data-variation="mini">
									<i class="clipboard outline icon green link"></i>
									<i class="plus icon green corner link"></i>
								</i>
							  	&emsp;
							  	<div class="ui icon input">
							    	<input class="prompt" type="text" placeholder="Search Projects...">
							    	<i class="search icon"></i>
							  	</div>
							  	<div class="results"></div>
								&emsp;
							  	<i class="icons large link" id="sort_projects_activator" data-tooltip="Sort" data-position="bottom left" data-variation="mini">
									<i class="sort alphabet down icon grey link"></i>
								</i>
							</div>
						</div>
						<div class="ui segment basic">
							<div class="active ui bottom attached tab" data-tab="projects_tab">
								<div class="ui three doubling special cards" id="assigned_projects"></div>
							</div>
						</div>
					</div>	  
				`;
				$('#tab_titles').addClass('three');
				$('#supplies_inventory_activator').remove();
				load_admin_inventory_raw();
			}
			else if (designation_key == 'TX392a') {
				user_tabs = `
					<a class="active item teal" data-tab="assigned_modules_tab">
						<h3 class="ui header center aligned pointered">`+designation_value+`</h3>
					</a>
					<a class="item teal" data-tab="personnel_section_tab" id="projects_tab">
						<h3 class="ui header center aligned pointered">Assigned Projects</h3>
					</a>
				`;
				user_section = `
					<div class="active ui bottom attached tab" data-tab="assigned_modules_tab" id="container_section">
						`+module_container+`
					</div>
					<div class="ui bottom attached tab" data-tab="personnel_section_tab" id="projects_segment">
						<div class="ui segment padded basic">
							<div class="active ui bottom attached tab" data-tab="projects_tab">
								<div class="ui three doubling special cards" id="assigned_projects"></div>
							</div>
						</div>
					</div>	  
				`;
				$('#tab_titles').addClass('two');
			}
			else if (designation_key == 'K3tSnP') {
				user_tabs = `
					<a class="active item teal" data-tab="assigned_modules_tab">
						<h3 class="ui header center aligned pointered">`+designation_value+`</h3>
					</a>
					<a class="item teal" data-tab="personnel_section_tab" id="projects_tab">
						<h3 class="ui header center aligned pointered">Projects</h3>
					</a>
				`;
				user_section = `
					<div class="active ui bottom attached tab" data-tab="assigned_modules_tab" id="container_section">
						`+module_container+`
					</div>
					<div class="ui bottom attached tab" data-tab="personnel_section_tab" id="projects_segment">
						<div class="ui segment padded basic">
							<div class="active ui bottom attached tab" data-tab="projects_tab">
								<div class="ui three doubling special cards" id="assigned_projects"></div>
							</div>
						</div>
					</div>	  
				`;
				$('#tab_titles').addClass('two');
				$('#supplies_inventory_activator').remove();
				load_admin_inventory_raw();
			}
			else if (designation_key != '' && designation_key != '000000') {
				user_tabs = `
					<a class="active item teal" data-tab="assigned_modules_tab">
						<h3 class="ui header center aligned pointered">`+designation_value+`</h3>
					</a>
					<a class="item teal" data-tab="personnel_section_tab" id="projects_tab">
						<h3 class="ui header center aligned pointered">Assigned Projects</h3>
					</a>
				`;
				user_section = `
					<div class="active ui bottom attached tab" data-tab="assigned_modules_tab" id="container_section">
						`+module_container+`
					</div>
					<div class="ui bottom attached tab" data-tab="personnel_section_tab" id="projects_segment">
						<div class="ui segment padded basic">
							<div class="active ui bottom attached tab" data-tab="projects_tab">
								<div class="ui three doubling special cards" id="assigned_projects"></div>
							</div>
						</div>
					</div>	  
				`;

				document_section = `
				  <div class="title" >
					`+designation_value+`
				  </div>
				  <div class="content" id="designations_segment`+designation_key+`" data-active_designation_key="`+designation_key+`" data-active_designation_value="`+designation_value+`">

				  </div>
				`;
				$('#tab_titles').addClass('two');
			}
			else {
				user_tabs = `
					<a class="active item teal" data-tab="personnel_section_tab" id="projects_tab">
						<h3 class="ui header center aligned pointered">Assigned Projects</h3>
					</a>
				`;
				user_section = `
					<div class="active ui bottom attached tab" data-tab="personnel_section_tab" id="projects_segment">
						<div class="ui segment padded basic">
							<div class="active ui bottom attached tab" data-tab="projects_tab">
								<div class="ui three doubling special cards" id="assigned_projects"></div>
							</div>
						</div>
					</div>	
				`;	
				$('#tab_titles').addClass('one');
			}
			$('#tab_titles').html(user_tabs);
			$('#tabs_container').html(user_section);
			switch(designation_key) {
				case '634BHi':
				case 'Z3Ne2R':
					$(document).ready(function() {
						load_admin_registered_users();
						load_document_types();
					});
				break;
				case 'R1T29a':
				case 'TX392a':
					$(document).ready(function() {
						load_hr_registered_users();
						load_document_types();
					});
				break;
			}
			$('#new_project_activator').on('click', function() {
				$('#focal_drop').dropdown('restore defaults');
				$('#project_creation_modal_label').html('Create Project');
				$('#project_creation_form').form('reset');
				$('#project_action_status').val('create').trigger('input');
			    $('#project_creation_modal')
				    .modal({
				    	closable: false,
				    	blurring: false,
				    	allowMultiple: true,
				    	autofocus: false
				    })
			        .modal('show')
			    ;
			});
			$('#restocking_cart_activator').on('click', function() {
			    $('#restocking_cart_modal')
				    .modal({
				    	closable: false,
				    	blurring: false,
				    	allowMultiple: true,
				    	autofocus: false
				    })
			        .modal('show')
			    ;    
			});
			$('#retrieval_basket_activator').on('click', function() {
			    $('#retrieval_basket_modal')
			        .modal({
				    	closable: false,
				    	blurring: false,
				    	allowMultiple: true,
				    	autofocus: false
				    })
			        .modal('show')
			    ;    
			});
			$('#ris_requests_activator').on('click', function() {
			    $('#ris_requests_modal')
			        .modal({
				    	closable: false,
				    	blurring: false,
				    	allowMultiple: true,
				    	autofocus: false
				    })
			        .modal('show')
			    ;    
			});
			$('#contracts_activator').on('click', function() {
				load_active_contracts();
			});
			$('#contracts_creation_activator').on('click', function() {
				$('#contract_action_status').val('create');
				$('#contract_creation_modal')
					.modal({
						closable: false,
						blurring: false,
						allowMultiple: true,
						autofocus: false
					})
					.modal('show')
				;
			});
			$('.inventory_navigation_dropdown').dropdown();
			return true;
		})
	}
	async function load_initial_user_data() {
		 var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_initial_user_data");
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					var user_id = value.user_id;
					var image = value.image;
					var first_name = value.first_name.UCwords();
					var middle_name = value.middle_name.UCwords();
					var last_name = value.last_name.UCwords();
					var suffix = value.suffix.toUpperCase();
					var gender = value.gender;
					var birthdate = value.birthdate;
					var position = value.position;
					var phone_number = value.phone_number;
					var email_address = value.email_address;
					var username = value.username;
					var status = value.status;
					var level = value.level;

					var purok_street = value.purok_street.UCwords();
					var barangay = value.barangay.UCwords();
					var city_municipality = value.city_municipality.UCwords();
					var province = value.province.UCwords();
					var zip_code = value.zip_code.UCwords();

					var ec_name = value.ec_name.UCwords();
					var ec_relationship = value.ec_relationship.UCwords();
					var ec_phone_number = value.ec_phone_number;
					var ec_purok_street = value.ec_purok_street.UCwords();
					var ec_barangay = value.ec_barangay.UCwords();
					var ec_city_municipality = value.ec_city_municipality.UCwords();
					var ec_province = value.ec_province.UCwords();
					var ec_zip_code = value.ec_zip_code;

					var tin_number = value.tin_number;
					var lbp_account = value.lbp_account;

					full_name = first_name+' '+middle_name[0]+'. '+last_name;

					if (suffix != '') {
						full_name += ' '+suffix+'.';
					}
					$('#user_profile_update_activator').data('user_id', user_id)

					$('#item_counter').data('value', user_id);
					$('#sidebar_name_display').html(full_name);
					$('#sidebar_position_display').html(position);

					$('#profile_image_side').attr('src', '<?php echo base_url();?>photos/profile_pictures/'+image);
					$('#profile_image_preview').attr('src', '<?php echo base_url();?>photos/profile_pictures/'+image);

					$('#ac_image_file_name').val(image);

					$('#ac_first_name').val(first_name);
					$('#ac_middle_name').val(middle_name);
					$('#ac_last_name').val(last_name);
					$('#ac_suffix').val(suffix);

					$('#ac_tin_number').val(tin_number);
					$('#ac_lbp_account').val(lbp_account);

					if (gender == 'male') {
						male = true;
						female = false;
					}
					else if (gender == 'female') {
						male = false;
						female = true;
					}
					$('#registration_update_form').form('set value', 'gender_drop', gender);
					$('#registration_update_form').form('set value', 'employment_type_drop', Number(level));

					$('#ac_birthdate').val(birthdate);
					$('#ac_position').val(position);
					$('#ac_phone_number').val(phone_number);
					$('#ac_email_address').val(email_address);
					$('#ac_username').val(username);

					$('#ac_purok_street').val(purok_street);
					$('#ac_barangay').val(barangay);
					$('#ac_city_municipality').val(city_municipality);
					$('#ac_province').val(province);
					$('#ac_zip_code').val(zip_code);

					$('#ac_ec_name').val(ec_name);
					$('#ac_ec_relationship').val(ec_relationship);
					$('#ac_ec_phone_number').val(ec_phone_number);
					$('#ac_ec_purok_street').val(ec_purok_street);
					$('#ac_ec_barangay').val(ec_barangay);
					$('#ac_ec_city_municipality').val(ec_city_municipality);
					$('#ac_ec_province').val(ec_province);
					$('#ac_ec_zip_code').val(ec_zip_code);

					$('#current_files_activator').data('user_id', user_id);
					$('#current_files_activator').data('first_name', first_name);
					$('#current_files_activator').data('suffix', suffix);
				})
				$('.user_profile_update_activator')
					.on('click', function() {
						var user_id = $(this).data('user_id');
						$('#registration_update_form').form('reset');
						$('#active_profile_user_id').val(user_id);
						loading_start('Loading Profile');
						$.when(load_initial_user_data(user_id))
							.done(function() {
								setTimeout(function() {
									$('#profile_view_modal')
										.modal({
											transition: 'fade down',
											closable: false,
											blurring: false,
											autofocus: false,
											allowMultiple: false
										})
										.modal('show')
									;
									loading_stop();
								}, 800);
							})
						;
					})
				;
				$('.user_management_activator').on('click', function() {
					var user_id = $(this).data('user_id');
					var first_name = $(this).data('first_name');
					var suffix = $(this).data('suffix');

					if (suffix != '') {
						label_name = first_name+' '+suffix;
					}
					else {
						label_name = first_name;
					}

					if (label_name[label_name.length-1].toLowerCase() == 's') {
						label_name = label_name+"'";
					}
					else {
						label_name = label_name+"'s";
					}
					$('#personnel_management_title').html(label_name+' Files');
					
					$('#active_personnel_management_id').val(user_id);
					loading_start('Loading Files');
					$.when(load_document_types())
						.done(function() {
							setTimeout(function() {
								specific_personnel_files(user_id);
								show_user_management_modal();
							}, 800);
						})
					;
				});
			}
			return true;
		})
	}
	$('.supplies_inventory_activator').on('click', function() {
		loading_start('Loading Supplies Inventory');
		$.when(load_inventory_raw())
			.done(function() {
				show_supplies_inventory_modal();
			})
		;
	});
	$('.vehicle_scheduler_activator').on('click', function() {
		alert("Road work ahead :'D");
	});
	function show_supplies_inventory_modal() {
		setTimeout(function() {
			$('#supplies_inventory_modal')
				.modal('setting', 'blurring', false)
				.modal('setting', 'closable', false)
				.modal('show')
			;    
		}, 1500);
	}
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
	  			$('#post_image_name').trigger('input');
			$('#post_creation_form').form('validate field', 'post_image_name');
	  	})
	;
	function load_unassigned_users() {
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
					focal_options = `
						<div class="item fluid focal_option" data-value="`+user_id+`" data-user_id="`+user_id+`" data-image="`+image+`" data-full_name="`+full_name+`" data-position="`+position+`">
							<div class="ui avatar image image_container">
								<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="center middle aligned flowing_image image bordered">
							</div>
							<span>`+full_name+`</span>
						</div>
					`;
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
					$('#focal_drop_menu').append(focal_options);
				})
				$('#focal_drop')
					.dropdown({
						clearable: true,
						onChange: function() {
							$('#focal_person_id').trigger('input');
						}
					})
				;
				$('.focal_option')
					.on('click', function() {
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
					})
				;
			}
		});
	}
	function load_contractless_users(contract_start, contract_end) {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/load_contractless_users',
			data  : {
				contract_start: contract_start,
				contract_end: contract_end
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$('#team_selection_drop_menu').html('');
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
					team_options = `
						<div class="item fluid team_option" data-value="`+user_id+`" data-user_id="`+user_id+`" data-image="`+image+`" data-full_name="`+full_name+`" data-position="`+position+`">
							<div class="ui avatar image image_container">
								<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="center middle aligned flowing_image image bordered">
							</div>
							<span>`+full_name+`</span>
						</div>
					`;
					$('#team_selection_drop_menu').append(team_options);
				})
			}
			else {
				$('#team_selection_drop_menu').html('');
			}
		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			
		});
	}
	function load_contract_team(contract_id) {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/load_contract_team',
			data  : {
				contract_id: contract_id
			}
		});
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$('#contract_team_list').html('');
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
					user_data = `
						<div class="item contract_item">
							<div class="ui tiny">
								<div class="ui middle aligned circular bordered mini image">
									<div class="image_container">
										<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="center middle aligned flowing_image image bordered">
									</div>
								</div>
								<span>&emsp;`+full_name+`</span>
						    	<div class="ui top left pointing dropdown contract_item_menu pointered compact">
					  				<div class="ui mini menu">
									    <div class="fitted item tiny team_member_terminate" data-user_id="`+user_id+`">
			        						<i class="unlink icon purple"></i>
									    	Terminate
									    </div>
									    <div class="fitted item tiny team_member_remove" data-user_id="`+user_id+`">
			        						<i class="trash icon orange"></i>
									    	Remove
									    </div>
									</div>
						    	</div>
							</div>
					  	</div>
					`;
					$('#contract_team_list').append(user_data);
				})
				$('.contract_item_menu')
				  	.dropdown({
				  		action: 'nothing',
				  		direction: 'upward',
				  		transition: 'drop'
				  	})
				;
				$('.contract_item')
					.on('contextmenu', function(event) {
				  		event.preventDefault();
				  		$(this).find('.contract_item_menu').dropdown('show');
				  	})
				;
			}
		});
	}

	function project_creation_validity_check() {
		project_title = $('#project_title').val().trim();
		focal_person_id = $('#focal_person_id').val().trim();
		post_image_name = $('#post_image_name').val().trim();
		start_date = $('#start_date').val().trim();
		end_date = $('#end_date').val().trim();

		const all_fields_valid = project_title && focal_person_id && post_image_name && start_date && end_date;

		if (all_fields_valid) {
			if (!$('#project_creation_submit').transition('is visible')) {
				$('#project_creation_submit').transition('scale up');
			}
		}
		else {
			if ($('#project_creation_submit').transition('is visible')) {
				$('#project_creation_submit').transition('scale down');
			}
		}
		if (start_date) {
			$('#end_date').attr('min', start_date);
		}
	}
	$('#project_title, #focal_person_id, #post_image_name, #start_date, #end_date')
		.on('input', function() {
			// alert($(this).attr('id'))
			project_creation_validity_check();
		})
	;
	$('#project_creation_submit').on('dblclick', function () {
		$('#project_creation_form').trigger('submit');	
	})
	$('#project_creation_form')
	  	.form({
	  		on: 'change',
	  		inline: false,
	    	transition: 'swing down',
	        onSuccess: function(event) {
	        	event.preventDefault();
				if($('#project_creation_form').form('is valid')) {
					var project_action = $('#project_action_status').val();
					if (project_action == 'edit') {
						url_value = '<?php echo base_url();?>i.php/sys_control/update_project_details'
					}
					else if (project_action == 'create') {
						url_value = '<?php echo base_url();?>i.php/sys_control/save_new_project'
					}
					var active_project_id = $('#active_project_id').val();
					// if (active_project_id != "") {
					// 	url_value = '<?php echo base_url();?>i.php/sys_control/update_project_details'	
					// }
					// else {
					// }
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
							var obj = JSON.parse(jqxhr.responseText);
							console.log(obj);
							$.each(obj, function(key, value) {
								var response_status = value['status_type'];
								var response_message = value['message'];

								if (project_action == 'edit') {
									var upload_status = value['update_status'];
									if (response_status == 'duplicate') {
										response_message = 'The project title <x class="orange-text">"'+response_message+'"</x> you entered has a duplicate in the system.<br><x class="orange-text">INVALID ENTRY</x>';
										$('#project_creation_form').form('reset')
										$('#post_image_outer')
						  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
						  				;
						  				$('#post_image_inner')
						  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
						  				;
										icon = 'window close red';
								  		header = 'Project Update Failed';
									  	message = response_message;
									  	duration = 25000;
									  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
									}
									else if (response_status == 'error') {
										icon = 'close red';
								  		header = 'Project Update Failed';
									  	message = response_message;
									  	duration = 25000;
									  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
									}
									else if (response_status == 'success') {
										if (upload_status == 'error') {
								  			header = 'Project Updated Successfully';
											upload_message = 'Failed to update project image, error message: <x class="orange-text">"'+response_message+'"</x>. Please try again later.';
										}
										else {
								  			header = 'Project Updated Successfully';
											upload_message = '';
										}
										$('#post_creation_form').form('reset');
										$('#post_image_outer')
						  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
						  				;
						  				$('#post_image_inner')
						  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
						  				;
										icon = 'check green';
								  		header = 'Project Updated Successfully';
									  	message = 'The project was successfully updated. Contents will reload shortly.';
									  	duration = 25000;
									  	load_notification(icon, header, message, duration, '', 'single', 'basic');
										load_assigned_projects();
									}
								}
								else if (project_action == 'create') {
									if (response_status == 'duplicate') {
										duplicate_message = 'The project title "'+response_message+'" you entered has a duplicate in the system.<br><x class="orange-text">INVALID ENTRY</x>';
										$('#project_creation_form').form('reset')
										$('#post_image_outer')
						  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
						  				;
						  				$('#post_image_inner')
						  					.attr('src', '<?php echo base_url();?>photos/post_images/default.jpg')
						  				;
										icon = 'window close red';
								  		header = 'Project Creation Failed!';
									  	message = duplicate_message;
									  	duration = 25000;
									  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
									}
									else if (response_status == 'error') {
										icon = 'close red';
								  		header = 'Project Creation Failed!';
									  	message = response_message.UCfirst();
									  	duration = 25000;
									  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
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
								  		header = 'Project Updated';
									  	message = 'The project was updated successfully. Contents will reload shortly.';
									  	duration = 25000;
									  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
										load_assigned_projects();
									}
								}
							});
						})
						.fail(function() {

						})
						.always(function() {
							
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
	      		}
	      	}
	  	})
	;
	$('#contract_creation_form')
	  	.form({
	  		on: 'change',
	  		inline: false,
	    	transition: 'swing down',
	        onSuccess: function(event) {
	        	event.preventDefault();
				if($('#contract_creation_form').form('is valid')) {
					let contract_action = $('#contract_action_status').val();

					if (contract_action == 'edit') {
						url_value = '<?php echo base_url();?>i.php/sys_control/update_contract_details'
					}
					else if (contract_action == 'create') {
						url_value = '<?php echo base_url();?>i.php/sys_control/save_new_contract'
					}
					var active_contract_id = $('#active_contract_id').val();
					// if (active_project_id != "") {
					// 	url_value = '<?php echo base_url();?>i.php/sys_control/update_project_details'	
					// }
					// else {
					// }
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
							response = jqxhr.responseText;

							if (project_action == 'edit') {
								if (response == 'duplicate') {
									response_message = project_title+' already has an existing <x class="orange-text">"'+response_message+'"</x> contract. Duplicate contract titles are not allowed.';
									icon = 'window close red';
							  		header = 'Duplicate Contract';
								  	message = response_message;
								  	duration = 25000;
								  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
								}
								else if (response == 'success') {
									$('#post_creation_form').form('reset');
									response_message = 'Contract details successfully updated.';
									icon = 'check green';
							  		header = 'Contract Updated';
								  	message = response_message;
								  	duration = 25000;
								  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
									load_assigned_projects();
								}
								else {
									response_message = 'An unexpected error occurred during the update. Please try again later.';
									icon = 'warning orange';
							  		header = 'Unexpected Error';
								  	message = response_message;
								  	duration = 25000;
								  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
								}
							}
							else if (project_action == 'create') {
								if (response == 'duplicate') {
									response_message = project_title+' already has an existing <x class="orange-text">"'+response_message+'"</x> contract. Duplicate contract titles are not allowed.';
									icon = 'window close red';
							  		header = 'Duplicate Contract';
								  	message = response_message;
								  	duration = 25000;
								  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
								}
								else if (response == 'success') {
									$('#post_creation_form').form('reset');
									response_message = "The "+contract_title+'" contract has been successfully incorporated into <x class="teal-text">"'+project_title+'"</x>.';
									icon = 'check green';
							  		header = 'Contract Created Successfully';
								  	message = response_message;
								  	duration = 25000;
								  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
									load_assigned_projects();
								}
								else {
									response_message = 'An unexpected error occurred during contract creation. Please try again later.';
									icon = 'warning orange';
							  		header = 'Unexpected Error';
								  	message = response_message;
								  	duration = 25000;
								  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
								}
							}
						})
						.fail(function() {

						})
						.always(function() {
							
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
	      		contract_project_id: {
			        identifier: 'contract_project_id',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please select a Focal.'
			          	}
			        ]
	      		},
	      		contract_title: {
			        identifier: 'contract_title',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a Project Title.'
			          	}
			        ]
	      		},
	      		contract_salary: {
			        identifier: 'contract_salary',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a Project Title.'
			          	}
			        ]
	      		},
	      		contract_start: {
			        identifier: 'contract_start',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Start Date.'
			            }
			        ]
	      		},
	      		contract_end: {
			        identifier: 'contract_end',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid End Date.'
			            }
			        ]
	      		}
	      	}
	  	})
	;
	async function load_specific_user_data(active_user_id) {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/load_specific_user_data',
			data  : {
				active_user_id: active_user_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					var user_id = value.user_id;
					var image = value.image;
					var first_name = value.first_name.UCwords();
					var middle_name = value.middle_name.UCwords();
					var last_name = value.last_name.UCwords();
					var suffix = value.suffix.toUpperCase();
					var gender = value.gender;
					var birthdate = value.birthdate;
					var position = value.position;
					var phone_number = value.phone_number;
					var email_address = value.email_address;
					var username = value.username;
					var status = value.status;
					var level = value.level;

					var purok_street = value.purok_street.UCwords();
					var barangay = value.barangay.UCwords();
					var city_municipality = value.city_municipality.UCwords();
					var province = value.province.UCwords();
					var zip_code = value.zip_code;

					var ec_name = value.ec_name.UCwords();
					var ec_relationship = value.ec_relationship.UCwords();
					var ec_phone_number = value.ec_phone_number;
					var ec_purok_street = value.ec_purok_street.UCwords();
					var ec_barangay = value.ec_barangay.UCwords();
					var ec_city_municipality = value.ec_city_municipality.UCwords();
					var ec_province = value.ec_province.UCwords();
					var ec_zip_code = value.ec_zip_code;

					var tin_number = value.tin_number;
					var lbp_account = value.lbp_account;

					full_name = first_name+' '+middle_name[0]+'. '+last_name;

					if (suffix != '') {
						full_name += ' '+suffix+'.';
					}

					$('#profile_image_preview').attr('src', '<?php echo base_url();?>photos/profile_pictures/'+image);

					$('#ac_image_file_name').val(image);

					$('#ac_first_name').val(first_name);
					$('#ac_middle_name').val(middle_name);
					$('#ac_last_name').val(last_name);
					$('#ac_suffix').val(suffix);

					$('#ac_tin_number').val(tin_number);
					$('#ac_lbp_account').val(lbp_account);

					if (gender == 'male') {
						male = true;
						female = false;
					}
					else if (gender == 'female') {
						male = false;
						female = true;
					}
					$('#gender_drop').dropdown('set selected', gender);
					$('#employment_type_drop').dropdown('set selected', level);

					$('#ac_birthdate').val(birthdate).trigger('input');
					$('#ac_position').val(position).trigger('input');
					$('#ac_phone_number').val(phone_number).trigger('input');
					$('#ac_email_address').val(email_address).trigger('input');
					$('#ac_username').val(username).trigger('input');

					$('#ac_purok_street').val(purok_street).trigger('input');
					$('#ac_barangay').val(barangay).trigger('input');
					$('#ac_city_municipality').val(city_municipality).trigger('input');
					$('#ac_province').val(province).trigger('input');
					$('#ac_zip_code').val(zip_code).trigger('input');

					$('#ac_ec_name').val(ec_name).trigger('input');
					$('#ac_ec_relationship').val(ec_relationship).trigger('input');
					$('#ac_ec_phone_number').val(ec_phone_number).trigger('input');
					$('#ac_ec_purok_street').val(ec_purok_street).trigger('input');
					$('#ac_ec_barangay').val(ec_barangay).trigger('input');
					$('#ac_ec_city_municipality').val(ec_city_municipality).trigger('input');
					$('#ac_ec_province').val(ec_province).trigger('input');
					$('#ac_ec_zip_code').val(ec_zip_code).trigger('input');

					$('#current_user_files_activator').data('user_id', user_id);
					$('#current_user_files_activator').data('first_name', first_name);
					$('#current_user_files_activator').data('suffix', suffix);
				})
			}
			return true;
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
			
		})
	}
	function load_active_contracts() {
		loading_start();
		var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_active_contracts");
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$('#contracts_container').html('');
				$('#contracts_search_section').removeClass('invisible');
				$.each(response_data, function(key, value) {
					var project_title = value.project_title;
					var contract_id = value.contract_id;
					var project_id = value.project_id;
					var contract_start = value.contract_start;
					var contract_end = value.contract_end;
					var contract_title = value.contract_title;
					var contract_salary = value.contract_salary;

					if (contract_start <= current_date && contract_end >= current_date) {
						contract_status = 'Active';
						status_color = 'green';
						status_icon = 'check';
					}
					else if (contract_end < current_date) {
						contract_status = 'Expired';
						status_color = 'orange';
						status_icon = 'circle';
					}
					else if (contract_start > current_date) {
						contract_status = 'Upcoming';
						status_color = 'blue';
						status_icon = 'circle loading notch';
					}

					contract_full_title = project_title+' - '+contract_title;
					contract_period = wordify_date(contract_start)+' to '+wordify_date(contract_end)

					contract_data = `
						<div class="item contract_view_activator" id="contract`+contract_id+`" data-contract_id="`+contract_id+`" data-project_id="`+project_id+`" data-contract_start="`+contract_start+`" data-contract_end="`+contract_end+`" data-contract_title="`+contract_title+`" data-project_title="`+project_title+`" data-contract_salary="`+contract_salary+`" data-status_color="`+status_color+`"data-status_icon="`+status_icon+`">
				  			<div class="right floated content middle">
					    		<i class="`+status_color+` `+status_icon+` icon"></i>
					    	</div>
			        		<i class="file alternate outline icon `+status_color+` link middle aligned"></i>
			        		<div class="content">
					      		<div class="ui header tiny `+status_color+`">`+contract_full_title+`</div>
					      		<div class="meta">`+contract_period.UCwords()+`</div>
					    	</div>	
					  	</div>
					`;

					$('#contracts_container').append(contract_data);
				});
				$('#inventory_reports_activator').on('click', function() {
					display_date = current_reports_date.dateWords();
					if (current_reports_date == current_date) {
			    		display_date = 'Today';
			    	}
				});
				$('.contract_view_activator').on('click', function() {
					let contract_id = $(this).data('contract_id');
					let project_id = $(this).data('project_id');
					let contract_start = $(this).data('contract_start');
					let contract_end = $(this).data('contract_end');
					let contract_title = $(this).data('contract_title');
					let project_title = $(this).data('project_title');
					let contract_salary = $(this).data('contract_salary');
					let status_color = $(this).data('status_color');
					let status_icon = $(this).data('status_icon');

					load_contract_team(contract_id);
					load_contractless_users(contract_start, contract_end);

					var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_contract_assignments");
					var jqxhr = ajax
					.done(function() {
						var response_data = JSON.parse(jqxhr.responseText);
						let team_id = '';
						if (response_data != '') {
							focal_string = '<br><br>';
							// $('#assigned_projects').html('');
							$.each(response_data, function(key, value) {
								var user_id = value.user_id;
							});
						}
						else {
							$('#contract_team_list').html('<div class="ui header center aligned">Empty</div>');
						}
						console.log(response_data)
						let contract_full_title = project_title+' - '+contract_title;
						let contract_period = wordify_date(contract_start)+' to '+wordify_date(contract_end)

						$('#contract_view_modal_header').addClass(status_color);
						$('#contract_view_modal_label').html(contract_full_title);
						$('#contract_view_modal_subheader').html(contract_period);
						// $('#contract_view_modal_label_icon')
						// 	.addClass(status_color)
						// 	.addClass(status_icon)
						// ;
						$('#team_selection_drop')
							.dropdown({
								clearable: true,
								onChange: function(value) {
									setTimeout(function() {
										document.querySelectorAll('#team_selection_drop .ui.label').forEach(element => {
										    element.classList.add('fluid');
										    element.classList.add('basic');
										});	
										document.querySelectorAll('#team_selection_drop .delete .icon').forEach(element => {
										    element.classList.add('ui');
										    element.classList.add('right');
										    element.classList.add('aligned');
										});	
									}, 50)
									$('#focal_person_id').trigger('input');
									if (value !== '') {
										let update_button =	$('#contract_assignment_update_button');
										if (update_button.transition('visible')) {
											update_button.transition();
										}
									}
									update_contract_team(contract_id, contract_start, contract_end, value);

									// $('#contract_view_modal').modal('refresh');
								}
							})
						;
						$('#contract_view_modal')
							.modal({
								closable: false,
								blurring: false,
								allowMultiple: true,
								autofocus: false,
								onHidden: function() {
									$('#contract_view_modal_header').removeClass(status_color);
									$('#contract_view_modal_label').html('');
									$('#contract_view_modal_subheader').html('');
									// $('#contract_view_modal_label_icon')
									// 	.removeClass(status_color)
									// 	.removeClass(status_icon)
									// ;
								}
							})
							.modal('show')
						;	
						$('#contract_assignment_activator').on('click', function() {
							$('#contract_assignment_modal_header').addClass(status_color);
							$('#contract_assignment_modal_label').html(contract_full_title);
							$('#contract_assignment_modal_subheader').html(contract_period);
							$('#contract_assignment_modal')
								.modal({
									closable: false,
									blurring: false,
									allowMultiple: true,
									autofocus: false,
									onHidden: function() {
										$('#contract_assignment_modal_header').removeClass(status_color);
										$('#contract_assignment_modal_label').html('');
										$('#contract_assignment_modal_subheader').html('');
										// $('#contract_view_modal_label_icon')
										// 	.removeClass(status_color)
										// 	.removeClass(status_icon)
										// ;
									}
								})
								.modal('show')
							;	
							// if ($('#team_assignment').hasClass('invisible')) {
							// 	$('#modify_assignment_label').html('Modify Assignment List');
							// 	$('#team_assignment').removeClass('invisible');
							// 	$('#team_selection').addClass('invisible');
							// }
							// else {
							// 	$('#modify_assignment_label').html('Cancel');
							// 	$('#team_assignment').addClass('invisible');
							// 	$('#team_selection').removeClass('invisible');
							// }
						});
					})
				});
			}
			else {
				$('#contracts_container').html('<div class="ui large header center aligned">No Active Contracts</div>');
				$('#contracts_search_section').addClass('invisible');
			}
			setTimeout(function() {
				$('#contracts_modal')
					.modal({
						closable: false,
						blurring: false,
						allowMultiple: false,
						autofocus: false
					})
					.modal('show')
				;
			}, 1000);
		})
		.fail(function()  {
			alert("error");
		})
		.always(function()  {
		})
	}
	function update_contract_team(contract_id, contract_start, contract_end, team_id) {

		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/update_contract_team',
			data  : {
				contract_id: contract_id,
				contract_start: contract_start,
				contract_end: contract_end,
				team_id: team_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response = jqxhr.responseText;
			if (response == 'success') {
				load_contract_team(contract_id);
				// load_contractless_users(contract_start, contract_end);
			}
			else if (response == 'error') {
				alert(response)
			}
		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			
		})
	}
	function remove_contract_member(contract_id) {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/update_contract_team',
			data  : {
				contract_id: contract_id,
				contract_start: contract_start,
				contract_end: contract_end,
				team_id: team_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response = jqxhr.responseText;
			if (response == 'success') {
				load_contract_team(contract_id);
				// load_contractless_users(contract_start, contract_end);
			}
			else if (response == 'error') {
				alert(response)
			}
		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			
		})
	}
	async function load_assigned_projects() {
		var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_assigned_projects");
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
			    var search_content = [];
			    
				focal_string = '<br><br>';
				$('#assigned_projects').html('');
				$.each(response_data, function(key, value) {
					var project_id = value.project_id;
					var project_title = value.project_title;
					var project_status = value.project_status;
					var project_image = value.project_image;
					var project_start = value.project_start;
					var project_deadline = value.project_deadline;
					// var project_description = value.project_description;
					var progress_percent = value.progress_percent;
					
					var user_id = value.user_id;
					var first_name = value.first_name.UCwords();
					var middle_name = value.middle_name.UCwords();
					var last_name = value.last_name.UCwords();
					var suffix = value.suffix.toUpperCase();
					var gender = value.gender;

					var full_name = first_name+' '+middle_name[0]+'. '+last_name+' '+suffix;

					var focal_image = value.focal_image;
					var focal_person = full_name;
					var focal_position = value.focal_position;

					var active_user_id = $('#item_counter').data('value');

					var project_timeline = wordify_date(project_start).UCwords()+` to `+wordify_date(project_deadline).UCwords();

					search_content.push({id:project_id,title:project_title,description:project_timeline});

					if (project_status == '400') {
						status_icon = 'circle notch';
						status_color = 'orange';
					}
					else if (project_status == '420') {
						status_icon = 'spinner';
						status_color = 'blue';
					}
					else if (project_status == '300') {
						status_icon = 'archive';
						status_color = 'grey';
					}
					else if (project_status == '200' || progress_percent == 100) {
						status_icon = 'check circle';
						status_color = 'green';
					}
					else if (project_status == '900') {
						status_icon = 'times circle';
						status_color = 'red';
					}

					// if (active_user_id != 9090) {
					// 	focal_string = `<div class="ui header tiny gray"><x id="focal_popper`+project_id+`">`+full_name+`</x></div>`;
					// }
					projects_section = `
						<div class="ui fluid card link" id="project_card`+project_id+`">
							<div class="blurring dimmable-image">
						      	<div class="ui dimmer">
						        	<div class="content">
						          		<h5 class="project_view_activator" tabindex="0" data-project_id="`+project_id+`" data-project_title="`+project_title+`" data-project_status="`+project_status+`" data-project_image="`+project_image+`" data-project_start="`+project_start+`" data-project_deadline="`+project_deadline+`" data-progress_percent="`+progress_percent+`" data-user_id="`+user_id+`" data-focal_image="`+focal_image+`" data-focal_person="`+focal_person+`" data-focal_id="`+user_id+`" data-focal_position="`+focal_position.UCwords()+`">
										  	<i class="folder open outline olive icon"></i>
											Open Project
										</h5>
						        	</div>
						      	</div>
								<div class="ui post_image_container">
					          		<a class="ui left corner label `+status_color+`">
							        	<i class="`+status_icon+` icon"></i>
							      	</a>
							  		<img src="<?php echo base_url();?>photos/post_images/`+project_image+`">
						    	</div>
						    </div>
						  	<div class="content">
						    	<a class="ui small header">`+project_title+`</a>
						    	<div class="meta">
							      	<span class="date">
						    			`+project_timeline+`
						    		</span>
				  					<div class="ui top right attached mini circular orange label transition hidden" id="project_comments_indicator`+project_id+`"></div>
						    	</div>
			  					<input class="file_input" type="text" id="project`+project_id+`"></input>
							</div>						    			
							<div class="extra content">
							    <div class="ui header tiny"><x id="focal_popper`+project_id+`">`+full_name+`</x></div>
							</div>
						    <div class="ui bottom attached indicating active progress" data-percent="`+progress_percent+`" data-total="100" id="progress_percent`+project_id+`">
								<div class="bar" id="bar`+project_id+`">
								</div>
							</div>
						</div>
					`;
					
					$('#assigned_projects').append(projects_section);
					$('#focal_popper'+project_id).popup({
						transition : 'vertical flip',
						position   : 'top center',
						inline     : true,
						title      : 'focal_name',
						// duration   : '150',
						hoverable  : true,
						variation  : 'wide',
						html       : `
		    				<div class="ui left aligned small header">
	    						<a class="ui circular image image_container">
									<img src="<?php echo base_url();?>photos/profile_pictures/`+focal_image+`">
						    	</a>
							    <div class="content">
							      	<a>`+focal_person+`</a>
							     	<div class="sub header">`+focal_position+`</div>
							    </div>
							</div>
						`
					});
					$('.dimmable-image').dimmer({
						on: 'hover'
					});

					options = `
						<div class="item project_option" data-value="`+project_id+`" data-project_id="`+project_id+`" data-project_image="`+project_image+`" data-project_title="`+project_title+`" data-project_timeline="`+project_timeline+`">
							<div class="ui post_image_avatar post_image_container">
								<img src="<?php echo base_url();?>photos/post_images/`+project_image+`">
							</div>
							<span>`+project_title+`</span>
						</div>
					`;
					$('#profile_preview').popup({
						transition : 'drop',
						position   : 'top center',
						inline     : true,
						title      : 'Person Name',
						variation  : 'very wide large',
						html       : `
							<div class="ui middle aligned list">
								<div class="item">
									<img src="<?php echo base_url();?>photos/post_images/`+project_image+`" class="ui tiny image center middle aligned circular">
								    <div class="content">
								      	<a class="ui header small">`+project_title+`</a>
								     	<div class="sub header">`+project_timeline+`</div>
								    </div>
								</div>
							</div>
						`
					});
					
					$('#project_drop_menu').append(options);
				});
				
				$('#projects_search')
					.search({
						source: search_content,
						fullTextSearch: 'exact',
						maxResults: 100,
						minCharacters: 2,
						onSelect: function(result, response) {
							var project_id = result.id;
				  			var element = $("#project_card"+project_id);
							$('html, body').animate({
						        scrollTop: element.offset().top - ($(window).height() - element.outerHeight(true)) / 2
					    	}, 200, function() {
				    			$('#project'+project_id).trigger('focus');
								$('#project_card'+project_id)
									.transition('pulse')
									.transition('flash')
								;
					    	});
						}
					})
				;
				$('#project_drop')
					.dropdown({
						clearable: true,
						onChange: function() {
							$('#contract_project_id').trigger('input');
						}
					})
				;
				// $('.project_option').on('click', function() {
				// 	project_id = $(this).data('project_id');
				// 	project_image = $(this).data('project_image');
				// 	project_title = $(this).data('project_title');
				// 	project_timeline = $(this).data('project_timeline');

				// 	$('#profile_preview').popup({
				// 		transition : 'drop',
				// 		position   : 'top center',
				// 		inline     : true,
				// 		title      : 'Person Name',
				// 		variation  : 'very wide large',
				// 		html       : `
				// 			<div class="ui middle aligned list">
				// 				<div class="item">
				// 					<img src="<?php echo base_url();?>photos/post_images/`+project_image+`" class="ui tiny image center middle aligned circular">
				// 				    <div class="content">
				// 				      	<a class="ui header small">`+project_title+`</a>
				// 				     	<div class="sub header">`+project_timeline+`</div>
				// 				    </div>
				// 				</div>
				// 			</div>
				// 		`
				// 	});
				// })
				// $('#project_edit_activator')
				// 	.on('click', function() {
				// 		loading_start('Loading Project');
				// 		var update_project_id = $(this).data('project_id');
				// 		var ajax = $.ajax({
				// 			method: 'POST',
				// 			url   : '<?php echo base_url();?>i.php/sys_control/set_updating_project_id',
				// 			data  : {
				// 				update_project_id: update_project_id
				// 			}
				// 		});
				// 		var jqxhr = ajax
				// 		.done(function() {
				// 			setTimeout(function(){
				// 				var response_data = jqxhr.responseText;
				// 				if (response_data != 'failed') {
	    		// 					window.open('<?php echo base_url();?>i.php/sys_control/project_editor');  
				// 					loading_stop();
				// 				}
				// 				else {

				// 				}
				// 			}, 1500);
				// 		})
				// 		.fail(function()  {
				// 			alert("error");
				// 		})
				// 	});
				// ;
				

				$('.project_view_activator')
					.on('click', function() {
						loading_start('Loading Project Data');
						var project_id = $(this).data('project_id');
						var project_image = $(this).data('project_image');

						var project_title = $(this).data('project_title');
						var project_status = $(this).data('project_status');
						var project_image = $(this).data('project_image');
						var project_start = $(this).data('project_start');
						var project_deadline = $(this).data('project_deadline');
						// var project_description = $(this).data('project_description');
						var progress_percent = $(this).data('progress_percent');
						
						var user_id = $(this).data('user_id');
						var focal_image = $(this).data('focal_image');
						var focal_person = $(this).data('focal_person');
						var focal_id = $(this).data('focal_id');
						var focal_position = $(this).data('focal_position');

						$('#active_project_id').val(project_id);
						$('#progress_active_project_id').val(project_id);
						$('#project_edit_activator').data('project_id', project_id);

						$('#project_view_title').html(project_title);
						$('#project_view_start').html(wordify_date(project_start));
						$('#project_view_end').html(wordify_date(project_deadline));
						$('#project_view_image').attr('src', '<?php echo base_url();?>photos/post_images/'+project_image);
						$('.progress_update_activator').progress({
						  	percent: progress_percent
						});
						$('.progress_update_activator').data('project_id', project_id);
						$('.progress_update_activator').data('progress_percent', progress_percent);
						$('.progress_update_activator').data('start', project_start);
						$('.progress_update_activator').data('end', project_deadline);


						$('#project_view_focal_name').html(focal_person);
						$('#project_view_focal_position').html(focal_position);
						$('#project_view_focal_image').attr('src', '<?php echo base_url();?>photos/profile_pictures/'+focal_image)
						load_progress_points(project_id);

						setTimeout(function() {
							$('#project_view_modal')
								.modal({
									closable: false,
									blurring: false,
									allowMultiple: false,
									autofocus: false,
									onHidden: function() {
										setTimeout(function() {
											$('#project_view_modal')
												.modal('refresh')
											;	
										}, 300);
										clearInterval(comments_monitor_loop);
										$('#point_tabs').html('<div class="ui header medium center aligned">No Progress Data</div>');
										$('#point_tabs_container').empty();
										$('.project_progress_tab').addClass('active');
										$('.team_tab').removeClass('active');
										$('.menu .item').tab();
									}
								})
								.modal('show')
							;
							// setTimeout(function() {
							// 	$("#"+active_point_id+"comments_section")
							// 		.animate({ 
							// 			scrollTop: $("#"+active_point_id+"comments_section")[0].scrollHeight 
							// 		}, 1000)
							// 	;	
							// }, 1200);
							loading_stop();
						}, 1000);
					});
				;
				$('.progress').progress();
				$('#project_edit_activator')
					.on('click', function() {
						$('#project_action_status').val('edit').trigger('input');

						let project_id = $(this).data('project_id');
						let values = $('.project_view_activator[data-project_id="'+project_id+'"]');
						
						let project_title = values.data('project_title');
						let focal_id = values.data('focal_id');
						let project_image = values.data('project_image');
						let project_start = values.data('project_start');
						let project_deadline = values.data('project_deadline');

						$('#project_creation_modal_label').html('Edit Project');
						$('#project_title').val(project_title);
						$('#focal_drop').dropdown('set selected', focal_id);
						$('#post_image_name').val(project_image);
						$('#start_date').val(project_start);
						$('#end_date').val(project_deadline);
						$('#project_creation_submit_label').html('Update');

						$('#project_creation_modal')
							.modal({
								transition: 'fade down',
								closable: false,
								blurring: false,
								autofocus: false,
								allowMultiple: true,
								onDeny: function() {
									setTimeout(function() {
										$('#project_view_modal')
											.modal('refresh')
										;	
									}, 300);
								}
							})
							.modal('show')
							.modal('refresh')
						;
					})
				;
				$('.progress_update_activator')
					.on('dblclick', function() {
						$('#progress_deleter').addClass('invisible');
						$('#progress_update_form').form('reset');

						var active_id = $(this).data('project_id');
						var current_progress = $(this).data('progress_percent');
						var start = $(this).data('start');
						var end = $(this).data('end');

						$('#progress_update_modal')
							.modal({
								transition: 'fade down',
								closable: false,
								blurring: false,
								autofocus: false,
								allowMultiple: true,
								onDeny: function() {
									setTimeout(function() {
										$('#project_view_modal')
											.modal('refresh')
										;	
									}, 300);
								}
							})
							.modal('show')
							.modal('refresh')
						;
						$('#active_project_id').val(active_id);
						$('#progress_active_project_id').val(active_id);
						$('#active_project_progress').val(current_progress);
						$('#update_type_checker').val('update');
						$('#file_input_indicator').val('false').trigger('input');

						// documents_container_title = '<div class="ui header small center aligned">Supporting Documents</div>';
						// $('#support_documents_container').html(documents_container_title);
        				$('#support_documents_container').empty();

						$('#progress_update_value').progress('set progress', parseInt(current_progress));

						// $('#progress_update_form').get(0).reset();

						$('#progress_update_modal_label').html('Project Progress Update');
						$('#progress_update_label').html(current_progress+'% Progress');
						$('#point_date').attr('min', start);
						$('#point_date').attr('max', end);
						$('#point_date').val('');
					})
				;
				$('.progress_update_activator').progress();
				// $('#content'+project_id).find('.active.progress').transition('drop');

				// $('#title'+project_id)
					// .on('click', function() {
					// 	$('#content'+project_id).find('.active.progress').transition('fade down');
					// 	$('#title'+project_id).find('.active.progress').transition('fade up');
					// })
					// .on('contextmenu', function(event) {
					// 	event.preventDefault();
					// 	alert('works');
					// });
				// ;
			}
			else {
				projects_section = `
					<br>
					<br>
					<h2 class="ui header center aligned">
						<a class="pointered">No Assigned Projects</a>
					</h2>
				`;
				$('#personnel_section_tab').html(projects_section);
				
				$('#projects_tab').remove();
				$('#projects_segment').remove();

				$('#tab_titles').removeClass('two');
				$('#tab_titles').addClass('one');
			}
			$('.menu .item').tab();
			return true;
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
		})
	}
	var active_point_id = 0;
	async function load_progress_points(project_id) {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/load_progress_points',
			data  : {
				project_id: project_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				var iteration_count = 1;
				var dates_array = [];
				
				var active_user_id = $('#item_counter').data('value');
				iteration_count

				$('#point_tabs').empty();
				$('#point_tabs_container').empty();
				$('#point_tabs').removeClass();
				$('#point_tabs').addClass('ui borderless mini labeled icon pointing menu fluid item olive');
				$.each(response_data, function(key, value) {
					var point_id = value.point_id;
					var point_percent = value.point_percent;
					var point_color = value.point_color;
					var point_date = value.point_date;
					var project_title = value.project_title;
					var project_start = value.project_start;
					var project_deadline = value.project_deadline;
					
					if (dates_array.includes(project_id)) {
						var index = dates_array.indexOf(project_id);
						dates_array[index][0] = point_date;
						iteration_count++;
					}
					else {
						dates_array.push(project_id); 
						var index = dates_array.indexOf(project_id);
						dates_array[index][key] = point_date;
						iteration_count = 1;
					}

					if ($('#point_tabs').html() == '<div class="ui header medium center aligned">No Progress Data</div>') {
						$('#point_tabs').html('');
					}
					
					if (iteration_count == response_data.length) {
						var activator = 'active';
						$('#active_point_id').val(point_id);
					}
					else {
						var activator = '';
					}

					if (point_percent == 100) {
						spinner_icon = 'circle outline';
					}
					else {
						spinner_icon = 'spinner loading';
					}

					progress_points = `
						<a class="`+activator+` item progress_edit_activator progress_point_deleter section_pointer progress_point" id="documents_section_pointer`+point_id+`" data-tab="tab`+point_id+`" data-point_date="`+point_date+`" data-point_percent="`+point_percent+`" data-point_id="`+point_id+`" data-project_id="`+project_id+`" data-project_title="`+project_title+`" data-project_start="`+project_start+`" data-project_deadline="`+project_deadline+`" id="progress_point`+point_id+`">
							<div class="ui small header">
								<i class="`+spinner_icon+` icon fitted tiny" style="color: `+point_color+`"></i>
								<div class="content">
								`+point_percent+`%
								</div> 
			  					<div class="ui floating mini circular orange label transition hidden" id="point_comments_indicator`+point_id+`">5</div>
							</div> 
						</a>
					`;
					documents_section = `
						<div class="`+activator+` ui bottom attached tab section_container" data-tab="tab`+point_id+`" id="documents_section_container`+point_id+`">
							
							<div class="ui teal header medium center aligned">
								Updated `+stringify_date(point_date)+`
							</div>
							<div class="ui accordion comment_section_activator center aligned" style="border:none;box-shadow:none;">
							  	<div class="active title documents_section_title">
									<h4 class="ui header aligned">
										Supporting Documents
										<i class="dropdown icon small"></i>
									</h4>
						  		</div>
								<div class="active content documents_section_content">
						  			<div class="ui horizontal selection list documents_section" id="documents_section`+point_id+`">
									</div>	
						  		</div>
							  	<div class="title comment_section_title" data-point_id="`+point_id+`">
									<h4 class="ui header aligned">
										Comments
										<i class="dropdown icon small"></i>
									</h4>
						  		</div>
								<div class="content comment_section_content">
							    	<div class="ui comments" style="max-width:100%;max-height:30vh;overflow-y:auto;scrollbar-width: thin;" id="`+point_id+`comments_section">
									</div>
									<div class="ui fluid input">
										<input maxle class="point_comment_input" data-point_id="`+point_id+`" data-comment_type="comment" data-comment_id="0" type="text" placeholder="Write a comment..." id="point_comment_input`+point_id+`" maxlength="300">
										<div class="floating ui label comment_char_counter" data-point_id="`+point_id+`">300</div>
									</div>
							  	</div>
						  	</div>
						</div>
					`;

					date = new Date(point_date);

					var day = ('0' + (parseInt(date.getDate())+1)).slice(-2);
					var month = ('0' + (parseInt(date.getMonth())+1)).slice(-2);
					var year = date.getFullYear();
					var min_date = year+'-'+month+'-'+day;

					$('#point_tabs').append(progress_points);
					$('#point_tabs_container').append(documents_section);
					switch(iteration_count) {
						case 1:
							var division = 'one';
							break;
						case 2:
							var division = 'two';
							break;
						case 3:
							var division = 'three';
							break;
						case 4:
							var division = 'four';
							break;
						case 5:
							var division = 'five';
							break;
						case 6:
							var division = 'six';
							break;
						case 7:
							var division = 'seven';
							break;
						case 8:
							var division = 'eight';
							break;
						case 9:
							var division = 'nine';
							break;
						case 10:
							var division = 'ten';
							break;
						case 11:
							var division = 'eleven';
							break;
						case 12:
							var division = 'twelve';
							break;
						case 13:
							var division = 'thirteen';
							break;
						case 14:
							var division = 'fourteen';
							break;
						case 15:
							var division = 'fifteen';
							break;
						case 16:
							var division = 'sixteen';
							break;
					}
					$('#point_tabs').addClass(division);
					$('#point_tabs').data('divisions_count', iteration_count);

					$('#point_date').attr('min', point_date);
					
					var active_point_id = $('#active_point_id').val();

					load_supporting_documents(active_point_id);
					load_progress_comments(active_point_id);
				});	

				$('.comment_section_activator')
					.accordion({
						exclusive: true
					})
				;
				// $('.point_comment_button')
				// 	.on('click', function() {
				// 		var comment_id = 0;
				// 		var point_id = $(this).data('point_id');
				// 		post_progress_comment(comment_id, point_id)
				// 	})
				// ;
				$('.progress_edit_activator')
					.on('contextmenu', function(event) {
						event.preventDefault();
						$('#progress_deleter').removeClass('invisible');
						$('#progress_update_form').form('reset');
						var point_date = $(this).data('point_date');
						var point_percent = $(this).data('point_percent');
						var point_id = $(this).data('point_id');
						var project_id = $(this).data('project_id');
						var project_title = $(this).data('project_title');
						var project_start = $(this).data('project_start');
						var project_deadline = $(this).data('project_deadline');
						$('#progress_update_modal')
							.modal({
								transition: 'fade down',
								closable: false,
								blurring: false,
								autofocus: false,
								allowMultiple: true,
								onDeny: function() {
									setTimeout(function() {
										$('#project_view_modal')
											.modal('refresh')
										;	
									}, 300);
								}
							})
							.modal('show')
							.modal('refresh')
						;
						$('#active_point_id').val(point_id);
						$('#active_project_id').val(project_id);
						$('#progress_active_project_id').val(project_id);
						$('#active_project_progress').val(0);
						$('#update_type_checker').val('edit');
						// $('#file_input_indicator').val('edit').trigger('input');

						// documents_container_title = '<div class="ui header small center aligned">Supporting Documents</div>';
						// $('#support_documents_container').html(documents_container_title);
        				$('#support_documents_container').empty();

						$('#progress_update_value').progress('set progress', parseInt(point_percent));

						$('#progress_update_modal_label').html('Progress Point Edit');
						$('#progress_update_label').html(point_percent+'% Progress');
						$('#point_date').attr('max', project_deadline);
						$('#point_date').val(point_date);
					})
					.on('click', function() {
						var point_id = $(this).data('point_id');
						load_supporting_documents(point_id);
						load_progress_comments(point_id);
					})
				;
				$('.progress_point_deleter')
					.on('contextmenu', function() {
						var point_id = $(this).data('point_id');
						$('#progress_deleter')
							.on('dblclick', function() {
								header = 'Please Confirm Action';
								message = 'Are you sure you want to <x class="red-text">DELETE</x> this Progress Point?';
								negative = 'No';
								positive = 'Yes';
								delete_progress_point(header, message, negative, positive, point_id);
							})
						;
					})
				;
			}
			$('.menu .item').tab();
			return true;
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
		})
	}
	var initial_comments_data_length = 0;
	var initial_replies_data_length = 0;

	var comments_data_length = 0;
	var replies_data_length = 0;
	let comments_monitor_loop;
	function load_progress_comments(target_point_id, sequence) {
		// setTimeout(function() {
		// 	$('#project_view_content')
		// 		.animate({ 
		// 			scrollTop: $('#project_view_content')[0].scrollHeight 
		// 		}, 1000)
		// 	;	
		// }, 500);
		// $(`#`+target_point_id+`comments_section`).empty();
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/load_progress_comments',
			data  : {
				point_id: target_point_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			comments_data_length = response_data.length;
			if (response_data != '') {
				empty = $('#'+target_point_id+'comments_section').text().trim().toLowerCase().includes('no comments yet');
				if (empty) {
					$('#'+target_point_id+'comments_section').empty()
				}
				$.each(response_data, function(key, value) {
					var comment_id = value.comment_id;
					var point_id = value.point_id;
					var user_id = value.user_id;
					var first_name = value.first_name;
					var middle_name = value.middle_name;
					var last_name = value.last_name;
					var suffix = value.suffix;
					var image = value.image;
					var comment = value.comment;
					var comment_time = value.comment_time;
					var status = value.status;

				    let wrapped_string = wrap_links(comment);
				    $("#output").html(wrapped_string);

					comment_segment = `
						<a id="comment_anchor`+comment_id+`"></a>
						<div class="comment" id="comment`+comment_id+`" data-comment_id="`+comment_id+`">
							<a class="ui avatar circular image image_container">
					  			<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`">
							</a>
							<div class="content">
					  			<a class="author">`+first_name.UCwords()+`</a>
					  			<div class="metadata">
					    			<span class="date">`+wordify_datetime(comment_time)+`</span>
					  			</div>
					  			<div class="text">
					    			`+wrapped_string+`
					  			</div>
								<div class="comments invisible" id="`+comment_id+`replies_section"></div>
					  			<div class="actions">
					  				<a class="ui tiny header reply_field_activator" data-point_id="`+point_id+`" data-comment_id="`+comment_id+`">
								    	Reply
								  	</a>
				    			</div>
							</div>
						</div>
					`;

					comment_exists = $('#comment'+comment_id).length;
					if (!comment_exists) {
						$('#'+point_id+'comments_section').append(comment_segment);
						$('#comment'+comment_id)[0]
							.scrollIntoView({ 
								behavior:'smooth', 
								block:'end'
							}, 300)
						;
						setTimeout(function() {
							$('#comment'+comment_id)
							  	.transition('stop')
							  	.transition('pulse')
							;	
						}, 300);
					}
					if ($('#'+point_id+'comments_section').html().trim() == '') {
						alert('empty');
					}
				});
				$(".wrapped_link")
					.on("click", function(event) {
			        	event.preventDefault();
					})
					.on("dblclick", function(event) {
			        	event.preventDefault();
			        	let url = $(this).attr("href");
			        	let confirmed = confirm(`Do you want to open this link?\n\n${url}`);
				        if (confirmed) {
				            window.open(url, "_blank");
				        }
			    	})
				;

				$('.comment_section_title')
					.off()
					.on('click', function() {
						let point_id = $(this).data('point_id');
						setTimeout(function() {
							$("#"+point_id+"comments_section")
								.animate({ 
									scrollTop: $("#"+point_id+"comments_section")[0].scrollHeight 
								}, 500)
							;	
						}, 350);
					})
				;
				$('.reply_field_activator')
					.off()
					.on('click', function() {
						let point_id = $(this).data('point_id');
						let comment_id = $(this).data('comment_id');

						if ($(this).html().trim() == 'Reply') {
							$('.reply_field_activator')
								.html('Reply')
								.removeClass('teal')
							;
							$(this)
								.addClass('teal')
								.html('Replying to this comment')
							;	
							$('#comment'+comment_id).transition('pulse');
							$('#point_comment_input'+point_id).trigger('focus');
							$('#point_comment_input'+point_id).attr('placeholder', 'Write a reply...');
							$('#point_comment_input'+point_id).data('comment_type', 'reply');
							$('#point_comment_input'+point_id).data('comment_id', comment_id);
						}
						else {
							$(this)
								.removeClass('teal')
								.html('Reply')
							;	
							$('#point_comment_input'+point_id).trigger('blur');
							$('#point_comment_input'+point_id).attr('placeholder', 'Write a comment...');
							$('#point_comment_input'+point_id).data('comment_type', 'comment');
						}
					})
				;
				$('.point_comment_input')
					.off()
					.on('keydown', function(event) {
						var key = event.which;
						var point_id = $(this).data('point_id');
						var comment_id = $(this).data('comment_id');
						var comment_type = $(this).data('comment_type');
						if (key == 13) {
							// ENTER
							if (comment_type == 'reply') {
								post_comment_reply(point_id, comment_id);
							}
							else if (comment_type == 'comment') {
								post_progress_comment(point_id);
							}
							$('.comment_char_counter').html(300);
						}
						if (key == 27) {
							// ESCAPE
							$('.reply_field_activator')
								.html('Reply')
								.removeClass('teal')
							;
							$('#point_comment_input'+point_id).attr('placeholder', 'Write a comment...');
							$('#point_comment_input'+point_id).data('comment_type', 'comment');
						}
					})
					.on('input', function() {
						let point_id = $(this).data('point_id');
						// let remaining_count = $('.comment_char_counter[data-point_id="'+point_id+'"]').html();
						let char_count = $(this).val().length;

						let new_remaining = 300-char_count;
						$('.comment_char_counter[data-point_id="'+point_id+'"]').html(new_remaining);
					})
				;
				$('.comment_reply')
					.off()
					.on('click', function() {
						var point_id = $(this).data('point_id');
						var comment_id = $(this).data('comment_id');
						$('#'+point_id+'comment_field'+comment_id)
							.transition({
								animation: 'slide down',
								onStart: function() {
									if (!$(this).transition('is visible')) {
										$(this).removeClass('invisible_comment');
									}
								},
								onHide: function() {
									if ($(this).transition('is visible')) {
										$(this).addClass('invisible_comment');
									}
								}
							})
						;		
					})
				;
				
				clearInterval(comments_monitor_loop);
				comments_monitor_loop = setInterval(function() {
				    comments_monitor(target_point_id);
				    replies_monitor(target_point_id);
				}, 1500);
				load_comment_replies(target_point_id);

				// $("#project_view_content").animate({ scrollTop: $(this).height() }, 1000);
			}
			else {
				$('#'+target_point_id+'comments_section').html('<div class="ui small grey header">&emsp;No comments yet.</div>')
				$('.point_comment_input')
					.off()
					.on('keydown', function(event) {
						var key = event.which;
						var point_id = $(this).data('point_id');
						var comment_id = $(this).data('comment_id');
						var comment_type = $(this).data('comment_type');
						if (key == 13) {
							// ENTER
							if (comment_type == 'reply') {
								post_comment_reply(point_id, comment_id);
							}
							else if (comment_type == 'comment') {
								post_progress_comment(point_id);
							}
						}
						if (key == 27) {
							// ESCAPE
							$('.reply_field_activator')
								.html('Reply')
								.removeClass('teal')
							;
							$('#point_comment_input'+point_id).attr('placeholder', 'Write a comment...');
							$('#point_comment_input'+point_id).data('comment_type', 'comment');
						}
					})
				;
			}
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
		})
	}
	function comments_monitor(target_point_id) {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/monitor_point_progress_comments',
			data  : {
				point_id: target_point_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					new_data_length = value.comments_count;
					if (comments_data_length != new_data_length) {
						load_progress_comments(target_point_id);
					}
				});
			}
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
		})
	}
	function initial_comments_count() {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/initial_comments_count'
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					initial_comments_data_length = value.comments_count;
				});
			}
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
		})
	}
	function all_comments_monitor() {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/monitor_all_progress_comments',
			data  : {
				point_id: target_point_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				response_length = response_data.length;
				if (response_length != initial_comments_data_length) {
					$.each(response_data, function(key, value) {
						var comment_id = value.comment_id;
						var point_id = value.point_id;
						
						var difference = initial_comments_data_length-response_length;
						$('#point_comments_indicator'+point_id)
							.transition()
							.html(difference);
						;
					});
				}
			}
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
		})
	}
	function initial_comments_count() {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/initial_comments_count'
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					initial_comments_data_length = value.comments_count;
				});
			}
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
		})
	}
	function replies_monitor(target_point_id) {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/monitor_comment_replies',
			data  : {
				point_id: target_point_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					new_data_length = value.comments_count;
					if (replies_data_length != new_data_length) {
						load_comment_replies(target_point_id);
					}
				});
			}
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
		})
	}
	function all_replies_monitor() {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/monitor_all_comment_replies',
			data  : {
				point_id: target_point_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			new_data_length = response_data.length;
			if (replies_data_length != new_data_length) {
				load_comment_replies(target_point_id);
			}
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
		})
	}
	function load_comment_replies(point_id) {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/load_comment_replies',
			data  : {
				point_id: point_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			replies_data_length = response_data.length;
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					var sub_comment_id = value.sub_comment_id;
					var point_id = value.point_id;
					var comment_id = value.comment_id;
					var user_id = value.user_id;
					var first_name = value.first_name;
					var middle_name = value.middle_name;
					var last_name = value.last_name;
					var suffix = value.suffix;
					var image = value.image;
					var comment = value.comment;
					var comment_time = value.comment_time;
					var comment_status = value.comment_status;

					comment_segment = `
						<a id="reply_anchor`+sub_comment_id+`"></a>
						<div class="small comment" id="reply`+sub_comment_id+`">
							<a class="ui avatar circular image image_container">
					  			<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`">
							</a>
							<div class="content">
					  			<a class="author">`+first_name.UCwords()+`</a>
					  			<div class="metadata">
					    			<span class="date">`+wordify_datetime(comment_time)+`</span>
					  			</div>
					  			<div class="text">
					    			`+comment+`
					  			</div>
							</div>
						</div>
					`;

					reply_exists = $('#reply'+sub_comment_id).length;
					if (!reply_exists) {
						$('#'+comment_id+'replies_section')
							.append(comment_segment)
							.removeClass('invisible')
						;
						$('#comment'+comment_id)[0]
							.scrollIntoView({ 
								behavior:'smooth', 
								block:'end'
							}, 300)
						;
						setTimeout(function() {
							$('#reply'+sub_comment_id)
							  	.transition('stop')
							  	.transition('pulse')
							;	
						}, 300);
					}
				});
			}
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
			
		})
	}
	function post_progress_comment(point_id) {
		var comment_message = $('#point_comment_input'+point_id).val();
		if (comment_message.trim() == "") {
			$('#point_comment_input'+point_id)
			  	.transition('stop')
			  	.transition('shake')
				.trigger('focus')
			;
		}
		else {
			var ajax = $.ajax({
				method: 'POST',
				url   : '<?php echo base_url();?>i.php/sys_control/post_progress_comment',
				data  : {
					point_id: point_id,
					comment_message: comment_message
				}
			});
			var jqxhr = ajax
			.done(function() {
				// $('#'+point_id+'comment_section').val('');
				load_progress_comments(point_id);
				// $("#"+point_id+"comments_section")
				// 	.animate({ 
				// 		scrollTop: $("#"+point_id+"comments_section")[0].scrollHeight 
				// 	}, 500)
				// ;
				$('#point_comment_input'+point_id).val('');
			})
			.fail(function() {
				alert("Connection Error");
			})
			.always(function() {

			})	
		}
	}
	function post_comment_reply(point_id, comment_id) {
		var comment_message = $('#point_comment_input'+point_id).val();
		if (comment_message.trim() == "") {
			$('#point_comment_input'+point_id)
			  	.transition('stop')
			  	.transition('shake')
				.trigger('focus')
			;
		}
		else {
			var ajax = $.ajax({
				method: 'POST',
				url   : '<?php echo base_url();?>i.php/sys_control/post_comment_reply',
				data  : {
					point_id: point_id,
					comment_id: comment_id,
					comment_message: comment_message
				}
			});
			var jqxhr = ajax
			.done(function() {
				// $('#'+point_id+'comment_section').val('');
				load_comment_replies(point_id);
				$('#point_comment_input'+point_id).val('');
			})
			.fail(function() {
				alert("Connection Error");
			})
			.always(function() {

			})	
		}
	}
	function delete_progress_point(header, message, negative, positive, point_id) {
		$('#deletion_positive_action').on('click', function() {
			var ajax = $.ajax({
				method: 'POST',
				url   : '<?php echo base_url();?>i.php/sys_control/delete_progress_point',
				data  : {
					point_id: point_id
				}
			});
			var jqxhr = ajax
			.fail(function() {
				alert("Connection Error");
			})
			.always(function() {
				icon = 'trash green';
				header = 'Point Deleted';
				message = 'Progress Point deleted successfully.';
				duration = 25000;
			  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');

				$.when(load_progress_points())
					.done(function() {
						setTimeout(function() {
							load_supporting_documents();
							loading_stop();
						},650);
					})
				;
			})
			$('#deletion_positive_action').prop("onclick", null).off("click");
		});
		
		$('#file_deletion_header').html(header);
		$('#file_deletion_message').html(message);
		$('#deletion_negative_confirm').html(negative);
		$('#deletion_positive_confirm').html(positive);
		$('#file_deletion')
			.modal({
				transition: 'fade down',
				closable: false,
				blurring: false,
				autofocus: false,
				allowMultiple: true,
				onDeny: function() {
					setTimeout(function() {
						$('#project_view_modal')
							.modal('refresh')
						;	
					}, 300);
				}
			})
			.modal('show')
			.modal('refresh')
		;
	}
	async function load_supporting_documents(target_point_id) {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/load_supporting_documents',
			data  : {
				point_id: target_point_id
			}
		});
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					var point_id = value.point_id;
					$('#documents_section'+point_id).html('');
				})
				$.each(response_data, function(key, value) {
					var project_id = value.project_id;
					var file_id = value.file_id;
					var point_id = value.point_id;
					var file_name = value.file_name;
					var file_ext = value.file_extension;

					preview_data = '';
					if (file_ext == 'pdf') {
						file_type = 'pdf';
						file_color = 'red';
						preview_data = `
							<div class="item supporting_file_preview_activator" data-type="`+file_type+`" data-file_name="`+file_name+`" data-reference="<?php echo base_url();?>supporting_documents/`+project_id+`/`+file_name+`">
								<i class="expand teal icon"></i>
								View File
							</div>
						`;
					}
					else if (file_ext == 'docx' || file_ext == 'doc') {
						file_type = 'word';
						file_color = 'blue';
					}
					else if (file_ext == 'xlsx' || file_ext == 'xlsm' || file_ext == 'xls' || file_ext == 'xml') {
						file_type = 'excel';
						file_color = 'green';
					}
					else if (file_ext == 'pptx' || file_ext == 'pptm' || file_ext == 'ppt') {
						file_type = 'powerpoint';
						file_color = 'orange';
					}
					else if (file_ext == 'jpg' || file_ext == 'jpeg' || file_ext == 'png') {
						file_type = 'image';
						file_color = 'brown';
						preview_data = `
							<div class="item supporting_file_preview_activator" data-type="`+file_type+`" data-file_name="`+file_name+`" data-reference="<?php echo base_url();?>supporting_documents/`+project_id+`/`+file_name+`">
								<i class="expand teal icon"></i>
								View Image
							</div>
						`;
					}
					else if (file_ext == 'mp4' || file_ext == 'mov' || file_ext == 'avi') {
						file_type = 'video';
						file_color = 'yellow';
						preview_data = `
							<div class="item supporting_file_preview_activator" data-type="`+file_type+`" data-file_name="`+file_name+`" data-reference="<?php echo base_url();?>supporting_documents/`+project_id+`/`+file_name+`">
								<i class="expand teal icon"></i>
								View Video
							</div>
						`;
					}
					else if (file_ext == 'zip' || file_ext == 'rar') {
						file_type = 'archive';
						file_color = 'grey';
					}

					file = `
						<div class="item" id="supporting_file`+file_id+`">
							<div class="ui segment center aligned dropdown pointing left files_drop" data-content="`+file_name+`">
								<a class="ui top attached `+file_color+` mini label truncate-text">`+file_name+`</a>
								<i class="file `+file_type+` `+file_color+` outline icon big"></i>	
								<div class="menu">
									`+preview_data+`
									<a class="item" id="document_downloader`+file_id+`" href="<?php echo base_url();?>supporting_documents/`+project_id+`/`+file_name+`" download>
										<i class="download blue icon"></i>
										Download
									</a>
									<div class="item supporting_file_deleter" data-file_id="`+file_id+`" data-point_id="`+point_id+`" data-project_id="`+project_id+`" data-file_name="`+file_name+`" id="delete_file`+file_id+`">
										<i class="trash red icon"></i>
										Delete
									</div>
								</div>
							</div>	
						</div>
					`;
					
					$('#documents_section'+point_id).append(file);
				})
				$('.files_drop')
					.popup({
				    	boundary: '#project_view_content',
				  		variation: 'tiny'
				  	})
					.dropdown({
						on: 'click',
						transition : 'fade up',
						duration   : 400,
						delay : {
							 hide   : 100,
							 show   : 100,
							 search : 50,
							 touch  : 50
						}
					})
				;
				$('.supporting_file_preview_activator')
					.on('click', function() {
						file_type = $(this).data('type');
						file_name = $(this).data('file_name');
						ref = $(this).data('reference');

						if (file_type == 'image') {
							file_preview_data = `
								<div class="image_container">
									<img src="`+ref+`" class="center middle aligned flowing_image image bordered">
								</div>
							`;
							$('#image_preview_title').attr('href', ref);
							$('#image_preview_title').attr('target', '_blank');
							$('#image_preview_title').html(file_name);
							$('#image_preview_container').html(file_preview_data);

							$('#image_preview_modal')
								.modal({
									closable: false,
									allowMultiple: true,
									blurring: false,
									autofocus: false,
									onDeny: function() {
										setTimeout(function() {
											$('#project_view_modal')
												.modal('refresh')
											;	
										}, 300);
									},
									onVisible: function() {
										$('#project_view_modal')
											.modal('refresh')
										;	
									}
								})
								.modal('show')
								.modal('refresh')
							;
							$('#image_preview_closer')
								.on('click', function() {
									// $('#user_management_modal')
									// 	.modal('setting', 'closable', false)
									// 	.modal('setting', 'blurring', false)
									// 	.modal('show')
									// ;			
							});
						}
						else if (file_type == 'pdf' || file_type == 'video') {
							file_preview_data = `<object data="`+ref+`" width="100%" height="700"></object>`;
							$('#file_preview_title').attr('href', ref);
							$('#file_preview_title').attr('target', '_blank');
							$('#file_preview_title').html(file_name);
							$('#file_preview_container').html(file_preview_data);

							$('#file_preview_modal')
								.modal({
									closable: false,
									allowMultiple: true,
									blurring: false,
									autofocus: false,
									onDeny: function() {
										setTimeout(function() {
											$('#project_view_modal')
												.modal('refresh')
											;	
										}, 300);
									},
									onVisible: function() {
										$('#project_view_modal')
											.modal('refresh')
										;	
									}
								})
								.modal('show')
								.modal('refresh')
							;
							$('#file_preview_closer')
								.on('click', function() {
									// $('#user_management_modal')
									// 	.modal('setting', 'closable', false)
									// 	.modal('setting', 'blurring', false)
									// 	.modal('show')
									// ;			
							});
						}
					})
				;
				$('.supporting_file_deleter')
					.on('click', function() {
						delete_file_id = $(this).data('file_id');
						delete_type_id = $(this).data('document_type_id');
						delete_point_id = $(this).data('point_id');
						delete_project_id = $(this).data('project_id');
						delete_file_name = $(this).data('file_name');

						header = 'Please Confirm Action';
						message = 'Are you sure you want to <x class="red-text">DELETE</x> <x class="teal-text">'+delete_file_name+'</x>?';
						negative = 'No';
						positive = 'Yes';
						file_id = delete_file_id;
						counter_id = delete_type_id;
						point_id = delete_point_id;
						project_id = delete_project_id;
						supporting_file_deletion(header, message, negative, positive, delete_file_name, file_id, counter_id, point_id, project_id);
					})
				;
			}
			else {
				$('#documents_section'+target_point_id).empty();
			}
			return true;
		})
	}
	function supporting_file_deletion(header, message, negative, positive, delete_file_name, file_id, counter_id, point_id, project_id) {
		$('#deletion_positive_action').on('click', function() {
			var ajax = $.ajax({
				method: 'POST',
				url   : '<?php echo base_url();?>i.php/sys_control/delete_supporting_file',
				data  : {
					file_id: file_id
				}
			});
			var jqxhr = ajax
			.fail(function() {
				alert("Connection Error");
			})
			.always(function() {
				$('#supporting_file'+file_id).remove();
				documents_section = $('#documents_section'+point_id).find('.item').length;

				if (documents_section == 0) {
					var iteration_count = $('#point_tabs'+project_id).data('divisions_count');
					switch(iteration_count) {
						case 1:
							var division = 'one';
							break;
						case 2:
							var division = 'two';
							break;
						case 3:
							var division = 'three';
							break;
						case 4:
							var division = 'four';
							break;
						case 5:
							var division = 'five';
							break;
						case 6:
							var division = 'six';
							break;
						case 7:
							var division = 'seven';
							break;
						case 8:
							var division = 'eight';
							break;
						case 9:
							var division = 'nine';
							break;
						case 10:
							var division = 'ten';
							break;
						case 11:
							var division = 'eleven';
							break;
						case 12:
							var division = 'twelve';
							break;
						case 13:
							var division = 'thirteen';
							break;
						case 14:
							var division = 'fourteen';
							break;
						case 15:
							var division = 'fifteen';
							break;
						case 16:
							var division = 'sixteen';
							break;
					}
					$('#point_tabs'+project_id).removeClass(division);
					iteration_count--;
					$('#point_tabs'+project_id).data('divisions_count', iteration_count);
					
					load_supporting_documents();

					$('#documents_section_pointer'+point_id).remove();		
					$('#documents_section_container'+point_id).remove();
				}

				icon = 'trash green';
				header = 'File Deleted';
				message = 'Supporting File <x class="teal-text">'+delete_file_name+'</x> deleted successfully.';
				duration = 25000;
			  	load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
			})
			$('#deletion_positive_action').prop("onclick", null).off("click");
		});
		
		$('#file_deletion_header').html(header);
		$('#file_deletion_message').html(message);
		$('#deletion_negative_confirm').html(negative);
		$('#deletion_positive_confirm').html(positive);
		$('#file_deletion')
			.modal({
				transition: 'fade down',
				closable: false,
				blurring: false,
				autofocus: false,
				allowMultiple: true,
				onDeny: function() {
					setTimeout(function() {
						$('#project_view_modal')
							.modal('refresh')
						;	
					}, 300);
				}
			})
			.modal('show')
			.modal('refresh')
		;
	}
	$('#progress_update_form')
    .form({
        on: 'change',
        inline: false,
        transition: 'swing down',
        onSuccess: function(event) {
            event.preventDefault();
         	const startTime = Date.now();
            // alert($('#file_input_indicator').val());

            if ($('#progress_update_form').form('is valid')) {
            	$('#upload_progress_modal')
				    .modal({
				    	closable: false,
				    	blurring: false,
				    	allowMultiple: true,
				    	autofocus: false
				    })
			        .modal('show')
			    ;

                edit_type = $('#update_type_checker').val();
                let ajax = {
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    xhr: function() {
                        const xhr = new window.XMLHttpRequest();

                        xhr.upload.addEventListener('progress', function(e) {
                            if (e.lengthComputable) {
                            	const elapsed_time = (Date.now() - startTime) / 1000;
                            	const uploaded_bytes = e.loaded;
                             	const upload_speed = (uploaded_bytes * 8) / elapsed_time;
                     	        const upload_mbps = (upload_speed / (1024 * 1024)).toFixed(2); 
                                const percent_complete = Math.round((e.loaded / e.total) * 100);

                                $('#update_progress_percent').progress('set percent', percent_complete);
                                // console.log('Upload Progress: ' + percent_complete + '%');
                                $('#update_progress_label').html('Upload Rate: '+ upload_mbps+' MB/s');
                                if (percent_complete == 100) {
                                	$('#update_progress_percent').progress('set percent', 0);

                                	$('#progress_update_form').form('reset');
                                	$('#support_documents_container').empty();
                            		
                            		$('#upload_progress_modal').modal('hide');
									$('#progress_update_modal').modal('hide');
									var active_point_id = $('#active_point_id').val();
									load_supporting_documents(active_point_id);
									load_progress_comments(active_point_id);
                                }
                            }
                        });
                        return xhr;
                    }
                };

                if (edit_type == 'edit') {
                    ajax.url = '<?php echo base_url();?>i.php/sys_control/project_progress_edit';
                } else if (edit_type == 'update') {
                    ajax.url = '<?php echo base_url();?>i.php/sys_control/update_project_progress';
                }

                var jqxhr = $.ajax(ajax)
                    .done(function() {
                        var obj = JSON.parse(jqxhr.responseText);
						error_count = 0;
						success_count = 0;
						error_message = '';
						success_message = '';
						$.each(obj, function(key, value) {
							$.each(value, function(inner_key, inner_value) {
								var response_status = inner_value['status_type'];
								if (response_status == 'success') {
									success_count++;
								}
								else if (response_status == 'error') {
									error_count++;
								}	
							})
						});

						var first_success = true;
						var first_error = true;

						var header = '';
						var success_message = '';
						var error_message = '';

						success_counter = 0;
						error_counter = 0;
						$.each(obj, function(key, value) {
							$.each(value, function(inner_key, inner_value) {
								var response_status = inner_value['status_type'];
								var response_cause = inner_value['cause'];

								if (response_status == 'success') {
									text_color = 'teal-text';
								}
								else if (response_status == 'error') {
									text_color = 'orange-text';
								}
								var response_message = '<strong class="break-text '+text_color+'">"'+inner_value['message']+'"</strong>';
								
								if (response_status == 'success') {
									success_counter++;
									if (success_count == 1) {
										success_message += response_message+' uploaded successfully.';
									}
									else if (success_count > 1) {
										if(first_success) {
											success_message += response_message;
											first_success = false;
										}
										else if (inner_key != value.length-1 && inner_key != 0) {
											success_message += ', '+response_message;
										}
										if (success_counter == success_count) {
											success_message += ', and '+response_message+' uploaded successfully.';
										}
									}
								}
								else if (response_status == 'error') {
									error_counter++;
									if (error_count == 1) {
										error_message += response_message+' failed to upload.';
									}
									else if (error_count > 1) {
										if(first_error) {
											error_message += response_message;
											first_error = false;
										}
										else if (inner_key != value.length-1 && inner_key != 0) {
											error_message += ', '+response_message;
										}
										if (error_counter == error_count) {
											error_message += ', and '+response_message+' failed to upload.';
										}
									}
								}
							})
						});
						if (success_count == 1) {
							header += success_count+ ' File Uploaded. ';
						}
						else if (success_count > 1) {
							header += success_count+ ' Files Uploaded. ';
						}
						if (error_count == 1) {
							header += error_count+' Upload Failed.';
						}
						else if (error_count > 1) {
							header += error_count+' Uploads Failed.';
						}

						if (success_count > 0 && error_count == 0) {
							icon = 'check green';
							message = success_message;
							duration = 25000;
						}
						else if (success_count > 0 && error_count > 0) {
							icon = 'warning orange';
							message = success_message+'<br><br>'+error_message;
							duration = 25000;
						}
						else if (success_count == 0 && error_count > 0) {
							icon = 'exclamation triangle orange';
							message = error_message;
							duration = 25000;
						}

	  					load_notification(icon, header, message, duration, '', 'multiple', 'non-basic');
						load_assigned_projects();
                    })
                    .fail(function() {
                        alert('Error occurred during upload.');
                    })
                    .always(function() {
                        // Handle success or error response
                        // console.log(jqxhr.responseText);
                        // Existing success/error handling logic here...
                    });
            }
        },
        fields: {
            point_date: {
                identifier: 'point_date',
                rules: [{
                    type: 'empty',
                    prompt: 'Please enter a valid Progress Date.'
                }]
            },
            progress_bar_value: {
                identifier: 'progress_bar_value',
                rules: [{
                    type: 'empty',
                    prompt: 'Update Progress cannot be less than or equal to Current Progress'
                }]
            },
            file_input_indicator: {
                identifier: 'file_input_indicator',
                rules: [{
                    type: 'notExactly[false]',
                    prompt: 'Supporting Documents are required in order to update progress.'
                }]
            }
        }
    });
	// $('#progress_update_form')
	// 	.form({
	// 		on: 'change',
	// 		inline: true,
	// 		transition: 'swing down',
	// 		onSuccess: function(event) {
	// 			event.preventDefault();
	// 			// alert($('#file_input_indicator').val())
	// 			if($('#progress_update_form').form('is valid')) {
	// 				edit_type = $('#update_type_checker').val();
	// 				if (edit_type == 'edit') {
	// 					let ajax = $.ajax({
	// 						method: 'POST',
	// 						url   : '<?php echo base_url();?>i.php/sys_control/project_progress_edit',
	// 						data  : new FormData(this),
	// 						contentType: false,
	// 						cache: false,
	// 						processData: false
	// 					});
	// 				}
	// 				else if (edit_type == 'update') {
	// 					let ajax = $.ajax({
	// 						method: 'POST',
	// 						url   : '<?php echo base_url();?>i.php/sys_control/update_project_progress',
	// 						data  : new FormData(this),
	// 						contentType: false,
	// 						cache: false,
	// 						processData: false,
	// 					});
	// 				}
					
	// 				var jqxhr = ajax
	// 					.done(function() {
	// 						// alert(jqxhr.responseText);
	// 					})
	// 					.fail(function() {
	// 						alert('error');
	// 					})
	// 					.always(function() {
							
	// 					})
	// 				;
	// 			}
	// 			else if (project_description == null || project_description == '<p>Project Description</p>') {
					
	// 			}
	// 		},
	// 		fields: {
	// 				point_date: {
	// 				  identifier: 'point_date',
	// 				  rules: [
	// 						{
	// 							type   : 'empty',
	// 							prompt : 'Please enter a valid Progress Date.'
	// 						}
	// 				  ]
	// 				},
	// 				progress_bar_value: {
	// 				  identifier: 'progress_bar_value',
	// 				  rules: [
	// 						{
	// 							type   : 'empty',
	// 							prompt : 'Update Progress cannot be less than or equal to Current Progress'
	// 						}
	// 				  ]
	// 				},
	// 				file_input_indicator: {
	// 				  identifier: 'file_input_indicator',
	// 				  rules: [
	// 						{
	// 							type   : 'notExactly[false]',
	// 							prompt : 'Supporting Documents are required in order to update progress.'
	// 						}
	// 			  		]
	// 				}
	// 			}
	// 	})
	// ;
	$('#user_update_form')
	  	.form({
	  		on: 'change',
	  		inline: false,
	    	transition: 'swing down',
	        onSuccess: function(event) {
	        	event.preventDefault();
				if($('#user_update_form').form('is valid')) {
					var ajax = $.ajax({
						method: 'POST',
						url   : '<?php echo base_url();?>i.php/sys_control/update_user_details',
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
							alert("error");
						})
						.always(function() {
							var obj = JSON.parse(jqxhr.responseText);
							$.each(obj, function(key, value) {
								var image_update_status = value['image_update_status'];
								var pass_update_status = value['pass_update_status'];
								var image = value['image'];

								if (image_update_status == 'duplicate' && pass_update_status == 'duplicate') {
									duplicates_list = '';
									plural_check = false;
									line_counter = 0;
									$.each(response_message, function(key_in, value_in) {
										line_counter++;
										element_id = value_in['element_id'];
										element_message = value_in['element_message'];
										
										if (line_counter != response_message.length) {
											if (duplicates_list == '') {
												duplicates_list += element_message; 
											}
											else {
												duplicates_list += ', '+element_message;	
												plural_check = true;
											}	
										}
										else {
											if (duplicates_list == '') {
												duplicates_list += element_message; 
											}
											else {
												duplicates_list += ', and '+element_message;	
												plural_check = true;
											}
										}
									});

									if (plural_check == true) {
										duplicates_message = 'The '+duplicates_list+' you entered have duplicates in the system.<br><x class="orange-text">INVALID REGISTRATION</x>';
									}
									else {
										duplicates_message = 'The '+duplicates_list+' you entered has a duplicate in the system.<br><x class="orange-text">INVALID INFO UPDATE</x>';
									}
									icon = 'window close red';
							  		header = 'Duplicates found. Profile Information Update Failed.';
								  	message = duplicates_message;
								  	duration = 25000;
								  	exit_action = '';
								}
								else if (image_update_status == 'non_match' && pass_update_status == 'non_match') {
									icon = 'window close red';
							  		header = 'Incorrect Password. Failed to update Profile Data.';
								  	message = 'The password you entered does not match your Current Password. Please try again.';
							  		exit_action = '';
								}
								else if (image_update_status == 'success' && pass_update_status == 'success') {
									icon = 'check green';
							  		header = 'Profile Information and Image Updated.';
								  	message = 'Profile update successful. The page will reload shortly to apply the changes.';

					  				$('#profile_image_preview').attr('src', '<?php echo base_url();?>photos/profile_pictures/'+image);
							  		exit_action = 'location.reload();';
								}
								else if (image_update_status == 'failed' && pass_update_status == 'success') {
									icon = 'check orange';
							  		header = 'Profile Information and Password Updated, Image Update Failed.';
								  	message = 'Profile Info and Password update successful, but the Image failed to update. Please try again. <br><br>The page will reload shortly to apply the changes.';
							  		exit_action = 'location.reload();';
								}
								else if (image_update_status == 'success' && pass_update_status == 'none') {
									icon = 'check green';
							  		header = 'Profile Information and Image Updated.';
								  	message = 'Profile Info and Image update successful. The page will reload shortly to apply the changes.';
								  	
					  				$('#profile_image_preview').attr('src', '<?php echo base_url();?>photos/profile_pictures/'+image);
							  		exit_action = 'location.reload();';
								}
								
								else if (image_update_status == 'failed' && pass_update_status == 'none') {
									icon = 'check orange';
							  		header = 'Profile Information Updated, Image Update Failed.';
								  	message = 'Profile Info update successful, but the Image failed to update. Please try again. <br><br>The page will reload shortly to apply the changes.';
							  		exit_action = 'location.reload();';
								}
								else if (image_update_status == 'none' && pass_update_status == 'success') {
									icon = 'check green';
							  		header = 'Profile Information and Password Updated.';
								  	message = 'Profile Info and Password update successful. The page will reload shortly to apply the changes.';
							  		exit_action = 'location.reload();';
								}
								else if (image_update_status == 'none' && pass_update_status == 'none') {
									icon = 'check green';
							  		header = 'Profile Information Updated.';
								  	message = 'Profile Info update successful. The page will reload shortly to apply the changes.';
							  		exit_action = 'location.reload();';
								}

								duration = 25000;
		  						load_notification(icon, header, message, duration, exit_action, 'multiple', 'non-basic');
							});
						})
					;
				}
	        },
	    	fields: {
	      		ac_first_name: {
			        identifier: 'ac_first_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your First Name.'
			          	}
			        ]
	      		},
	      		ac_middle_name: {
			        identifier: 'ac_middle_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Middle Name.'
			          	}
			        ]
	      		},
	      		ac_last_name: {
			        identifier: 'ac_last_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Last Name.'
			          	}
			        ]
	      		},
	      		ac_suffix: {
			        identifier: 'ac_suffix',
			        optional: true,
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Last Name.'
			          	}
			        ]
	      		},
	      		ac_gender: {
			        identifier: 'ac_gender',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please select your Gender.'
			          	}
			        ]
	      		},
	      		ac_birthdate: {
			        identifier: 'ac_birthdate',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please select your birthdate.'
			          	}
			        ]
	      		},
	      		ac_position: {
			        identifier: 'ac_position',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Position.'
			          	}
			        ]
	      		},
	      		ac_phone_number: {
			        identifier: 'ac_phone_number',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Phone Number.'
			          	},
			          	{
			          		type   : 'minLength[11]',
			            	prompt : 'Phone Number must be at least 11 characters long.'
			          	}
			        ]
	      		},
	      		ac_purok_street: {
			        identifier: 'ac_purok_street',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Purok/Street.'
			          	}
			        ]
	      		},
	      		ac_barangay: {
			        identifier: 'ac_barangay',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Barangay.'
			          	}
			        ]
	      		},
	      		ac_city_municipality: {
			        identifier: 'ac_city_municipality',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your City/Municipality.'
			          	}
			        ]
	      		},
	      		ac_province: {
			        identifier: 'ac_province',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Province.'
			          	}
			        ]
	      		},
	      		ac_zip_code: {
			        identifier: 'ac_zip_code',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Zip Code.'
			          	}
			        ]
	      		},
	      		ac_ec_name: {
			        identifier: 'ac_ec_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s Full Name.'
			          	}
			        ]
	      		},
	      		ac_ec_relationship: {
			        identifier: 'ac_ec_relationship',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your relationship with your Contact.'
			          	}
			        ]
	      		},
	      		ac_ec_phone_number: {
			        identifier: 'ac_ec_phone_number',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s Phone Number.'
			          	}
			        ]
	      		},
	      		ac_ec_purok_street: {
			        identifier: 'ac_ec_purok_street',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s Purok/Street.'
			          	}
			        ]
	      		},
	      		ac_ec_barangay: {
			        identifier: 'ac_ec_barangay',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s Barangay.'
			          	}
			        ]
	      		},
	      		ac_ec_city_municipality: {
			        identifier: 'ac_ec_city_municipality',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s City/Municipality.'
			          	}
			        ]
	      		},
	      		ac_ec_province: {
			        identifier: 'ac_ec_province',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s Province.'
			          	}
			        ]
	      		},
	      		ac_ec_zip_code: {
			        identifier: 'ac_ec_zip_code',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s ZIP Code.'
			          	}
			        ]
	      		},
	      		ac_email_address: {
			        identifier: 'ac_email_address',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Email Address.'
			            },
			            {
			            	type   : 'email',
			            	prompt : 'Input must be a valid email!',
			          	}
			        ]
	      		},
	      		ac_username: {
			        identifier: 'ac_username',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a Username.'
			          	}
			        ]
	      		},
	      		ac_new_password: {
			        identifier: 'ac_new_password',
			        optional: true,
			        rules: [
			            {
			            	type   : 'regExp[^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])]',
			            	prompt : 'Must contain: <br>&emsp;at least one(1) number [0-9], <br>&emsp;at least one(1) lowercase letter [a-z], <br>&emsp;at least one(1) uppercase letter [A-Z]'
			            },
			            {
			            	type   : 'minLength[8]',
			            	prompt : 'Must be at least 8 characters long.'
			          	}
			        ]
	      		},
	      		ac_password: {
			        identifier: 'ac_password',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a Password.'
			            },
			            {
			            	type   : 'regExp[^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])]',
			            	prompt : 'Must contain: <br>&emsp;at least one(1) number [0-9], <br>&emsp;at least one(1) lowercase letter [a-z], <br>&emsp;at least one(1) uppercase letter [A-Z]'
			            },
			            {
			            	type   : 'minLength[8]',
			            	prompt : 'Must be at least 8 characters long.'
			          	}
			        ]
	      		},
	      		ac_image_file_name: {
			        identifier: 'ac_image_file_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please select a valid Profile Image'
			            }
			        ]
	      		}
	      	}
	  	})
	;
	$('#registration_update_form')
	  	.form({
	  		on: 'change',
	  		inline: false,
	    	transition: 'swing down',
	        onSuccess: function(event) {
	        	event.preventDefault();
				if($('#registration_update_form').form('is valid')) {
					var ajax = $.ajax({
						method: 'POST',
						url   : '<?php echo base_url();?>i.php/sys_control/update_personnel_details',
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
							alert("error");
						})
						.always(function() {
							var obj = JSON.parse(jqxhr.responseText);
							$.each(obj, function(key, value) {
								var image_update_status = value['image_update_status'];
								var pass_update_status = value['pass_update_status'];
								var image = value['image'];

								if (image_update_status == 'duplicate' && pass_update_status == 'duplicate') {
									duplicates_list = '';
									plural_check = false;
									line_counter = 0;
									$.each(response_message, function(key_in, value_in) {
										line_counter++;
										element_id = value_in['element_id'];
										element_message = value_in['element_message'];
										
										if (line_counter != response_message.length) {
											if (duplicates_list == '') {
												duplicates_list += element_message; 
											}
											else {
												duplicates_list += ', '+element_message;	
												plural_check = true;
											}	
										}
										else {
											if (duplicates_list == '') {
												duplicates_list += element_message; 
											}
											else {
												duplicates_list += ', and '+element_message;	
												plural_check = true;
											}
										}
									});

									if (plural_check == true) {
										duplicates_message = 'The '+duplicates_list+' you entered have duplicates in the system.<br><x class="orange-text">INVALID REGISTRATION</x>';
									}
									else {
										duplicates_message = 'The '+duplicates_list+' you entered has a duplicate in the system.<br><x class="orange-text">INVALID INFO UPDATE</x>';
									}
									icon = 'window close red';
							  		header = 'Duplicates found. Profile Information Update Failed.';
								  	message = duplicates_message;
								  	duration = 25000;
								  	exit_action = '';
								}
								else if (image_update_status == 'non_match' && pass_update_status == 'non_match') {
									icon = 'window close red';
							  		header = 'Incorrect Password. Failed to update Profile Data.';
								  	message = 'The password you entered does not match your Current Password. Please try again.';
							  		exit_action = '';
								}
								else if (image_update_status == 'success' && pass_update_status == 'success') {
									icon = 'check green';
							  		header = 'Profile Information and Image Updated.';
								  	message = 'Profile update successful. The page will reload shortly to apply the changes.';

					  				$('#profile_image_preview').attr('src', '<?php echo base_url();?>photos/profile_pictures/'+image);
							  		exit_action = 'location.reload();';
								}
								else if (image_update_status == 'failed' && pass_update_status == 'success') {
									icon = 'check orange';
							  		header = 'Profile Information and Password Updated, Image Update Failed.';
								  	message = 'Profile Info and Password update successful, but the Image failed to update. Please try again. <br><br>The page will reload shortly to apply the changes.';
							  		exit_action = 'location.reload();';
								}
								else if (image_update_status == 'success' && pass_update_status == 'none') {
									icon = 'check green';
							  		header = 'Profile Information and Image Updated.';
								  	message = 'Profile Info and Image update successful. The page will reload shortly to apply the changes.';
								  	
					  				$('#profile_image_preview').attr('src', '<?php echo base_url();?>photos/profile_pictures/'+image);
							  		exit_action = 'location.reload();';
								}
								
								else if (image_update_status == 'failed' && pass_update_status == 'none') {
									icon = 'check orange';
							  		header = 'Profile Information Updated, Image Update Failed.';
								  	message = 'Profile Info update successful, but the Image failed to update. Please try again. <br><br>The page will reload shortly to apply the changes.';
							  		exit_action = 'location.reload();';
								}
								else if (image_update_status == 'none' && pass_update_status == 'success') {
									icon = 'check green';
							  		header = 'Profile Information and Password Updated.';
								  	message = 'Profile Info and Password update successful. The page will reload shortly to apply the changes.';
							  		exit_action = 'location.reload();';
								}
								else if (image_update_status == 'none' && pass_update_status == 'none') {
									icon = 'check green';
							  		header = 'Profile Information Updated.';
								  	message = 'Profile Info update successful. The page will reload shortly to apply the changes.';
							  		exit_action = 'location.reload();';
								}

								duration = 25000;
								overlay = 'multiple';
		  						load_notification(icon, header, message, duration, exit_action, 'multiple', 'non-basic');
							});
						})
					;
				}
	        },
	    	fields: {
	      		ac_first_name: {
			        identifier: 'ac_first_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your First Name.'
			          	}
			        ]
	      		},
	      		ac_middle_name: {
			        identifier: 'ac_middle_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Middle Name.'
			          	}
			        ]
	      		},
	      		ac_last_name: {
			        identifier: 'ac_last_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Last Name.'
			          	}
			        ]
	      		},
	      		ac_suffix: {
			        identifier: 'ac_suffix',
			        optional: true,
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Last Name.'
			          	}
			        ]
	      		},
	      		ac_gender: {
			        identifier: 'ac_gender',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please select your Gender.'
			          	}
			        ]
	      		},
	      		ac_birthdate: {
			        identifier: 'ac_birthdate',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please select your birthdate.'
			          	}
			        ]
	      		},
	      		ac_position: {
			        identifier: 'ac_position',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Position.'
			          	}
			        ]
	      		},
	      		ac_phone_number: {
			        identifier: 'ac_phone_number',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Phone Number.'
			          	},
			          	{
			          		type   : 'minLength[11]',
			            	prompt : 'Phone Number must be at least 11 characters long.'
			          	}
			        ]
	      		},
	      		ac_purok_street: {
			        identifier: 'ac_purok_street',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Purok/Street.'
			          	}
			        ]
	      		},
	      		ac_barangay: {
			        identifier: 'ac_barangay',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Barangay.'
			          	}
			        ]
	      		},
	      		ac_city_municipality: {
			        identifier: 'ac_city_municipality',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your City/Municipality.'
			          	}
			        ]
	      		},
	      		ac_province: {
			        identifier: 'ac_province',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Province.'
			          	}
			        ]
	      		},
	      		ac_zip_code: {
			        identifier: 'ac_zip_code',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Zip Code.'
			          	}
			        ]
	      		},
	      		ac_ec_name: {
			        identifier: 'ac_ec_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s Full Name.'
			          	}
			        ]
	      		},
	      		ac_ec_relationship: {
			        identifier: 'ac_ec_relationship',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your relationship with your Contact.'
			          	}
			        ]
	      		},
	      		ac_ec_phone_number: {
			        identifier: 'ac_ec_phone_number',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s Phone Number.'
			          	}
			        ]
	      		},
	      		ac_ec_purok_street: {
			        identifier: 'ac_ec_purok_street',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s Purok/Street.'
			          	}
			        ]
	      		},
	      		ac_ec_barangay: {
			        identifier: 'ac_ec_barangay',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s Barangay.'
			          	}
			        ]
	      		},
	      		ac_ec_city_municipality: {
			        identifier: 'ac_ec_city_municipality',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s City/Municipality.'
			          	}
			        ]
	      		},
	      		ac_ec_province: {
			        identifier: 'ac_ec_province',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s Province.'
			          	}
			        ]
	      		},
	      		ac_ec_zip_code: {
			        identifier: 'ac_ec_zip_code',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your emergency contact\'s ZIP Code.'
			          	}
			        ]
	      		},
	      		ac_email_address: {
			        identifier: 'ac_email_address',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter your Email Address.'
			            },
			            {
			            	type   : 'email',
			            	prompt : 'Input must be a valid email!',
			          	}
			        ]
	      		},
	      		ac_username: {
			        identifier: 'ac_username',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a Username.'
			          	}
			        ]
	      		},
	      		ac_new_password: {
			        identifier: 'ac_new_password',
			        optional: true,
			        rules: [
			            {
			            	type   : 'regExp[^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])]',
			            	prompt : 'Must contain: <br>&emsp;at least one(1) number [0-9], <br>&emsp;at least one(1) lowercase letter [a-z], <br>&emsp;at least one(1) uppercase letter [A-Z]'
			            },
			            {
			            	type   : 'minLength[8]',
			            	prompt : 'Must be at least 8 characters long.'
			          	}
			        ]
	      		},
	      		ac_password: {
			        identifier: 'ac_password',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a Password.'
			            },
			            {
			            	type   : 'regExp[^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])]',
			            	prompt : 'Must contain: <br>&emsp;at least one(1) number [0-9], <br>&emsp;at least one(1) lowercase letter [a-z], <br>&emsp;at least one(1) uppercase letter [A-Z]'
			            },
			            {
			            	type   : 'minLength[8]',
			            	prompt : 'Must be at least 8 characters long.'
			          	}
			        ]
	      		},
	      		ac_image_file_name: {
			        identifier: 'ac_image_file_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please select a valid Profile Image'
			            }
			        ]
	      		}
	      	}
	  	})
	;
	// LBP DISPLAY HANDLER >>>>
 	function lbp_hyphen_handler(lbp_account) {
		lbp_length = lbp_account.length;

		const r = /(\D+)/g;
		let first = '';
		let second = '';
		let third = '';

		lbp_account = lbp_account.replace(r, '');
		first = lbp_account.substr(0, 4);
		second = lbp_account.substr(4, 4);
		third = lbp_account.substr(8, 2);

		lbp_account = first+'-'+second+'-'+third;
		return lbp_account;
	}
	$('#lbp_account')
		.on('keydown', function(event) {
			if (event.keyCode != 8 && event.keyCode != 46) {
				var lbp_account = $(this).val();
				if (lbp_account.length == 10) {
					$(this).val(lbp_hyphen_handler(lbp_account));
				}
			}
		})
	;
	// <<<< LBP DISPLAY HANDLER 
	$('#ac_image_file_name')
	  	.on('click', function() {
	  		$('#profile_image').trigger('click');
	  		$('#ac_image_file_name').trigger('blur');
	  	})
	  	.on('focus', function() {
	  		$('#profile_image').trigger('click');
	  		$('#ac_image_file_name').trigger('blur');
	  	})
	;

	$('#profile_image_preview')
	  	.transition('pulse')
	;
	$('#report_category_dropdown').dropdown();
	$('#profile_image')
	  	.on('change', function() {
	  		var file = $('#profile_image')[0].files[0]; 
	  		// IF IMAGE INPUT IS NOT EMPTY
	  		if (file) {
	  			$('#ac_image_file_name').val(file.name);
	  			$('#profile_image_preview')
			  		.attr('src', URL.createObjectURL(file))
  					.transition('pulse')
				;
	  		}
	  		else {
	  			$('#ac_image_file_name').val(null);
		  		$('#profile_image_preview')
  					.transition('pulse')
  					.attr('src', '<?php echo base_url();?>photos/icons/male_default.jpg')
				;
	  		}
	  	})
	;
	$('.logout_activator').on('dblclick', function() {
		loading_start('Logging out, please wait...');
		setTimeout(function(){
			window.location.replace('<?php echo base_url();?>i.php/sys_control/login')
		}, 2000);
	});
</script>