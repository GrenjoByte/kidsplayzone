<script type="text/javascript">
	current_view = 'reg';
	
	function toggle_hr_view() {
		if (current_view == 'reg') {
			current_view = 'pen';
			$('#page_label').prop("dblclick", null).off('dblclick');
			$('#page_label')
				.on('dblclick', function() {
					toggle_hr_view();
				})
			;
			load_unregistered_users();
		}
		else if (current_view == 'pen') {
			current_view = 'reg';
			load_hr_registered_users();
		}
	}
	function load_hr_registered_users() {
		loading_start('Loading Registered Users');
		var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_registered_users");
		var jqxhr = ajax
		.fail(function() {
			alert("Connection Error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$('#cards_container').html('');
			if (response_data != '') {
				$('#page_label').html('Registered Users');
				var search_content = [];

				$.each(response_data, function(key, value) {

					var user_id = value.user_id;
					var first_name = value.first_name.UCwords();
					var middle_name = value.middle_name.UCwords();
					var last_name = value.last_name.UCwords();
					var suffix = value.suffix.toUpperCase();
					var gender = value.gender;
					var position = value.position;
					var phone_number = value.phone_number;
					var username = value.username;
					var email_address = value.email_address;
					var image = value.image;
					var registry_date = value.registry_date;
					var designation_key = value.designation_key;

					full_name = first_name+' '+middle_name[0]+'. '+last_name;

					if (suffix != '') {
						full_name += ' '+suffix+'.';
					}

					if (designation_key) {
						switch(designation_key) {
	                    	case 'Z3Ne2R':
	                    		designation_value = 'System Administrator';
	                    		if (gender == 'male') {
		                    		designation_icon = 'chess king blue';
	                    		}
                    			else if (gender == 'female') {
		                    		designation_icon = 'chess queen blue';
                    			}
	                		break;
	                    	case '634BHi':
	                    		designation_value = 'Administrator';
	                    		if (gender == 'male') {
		                    		designation_icon = 'chess king blue';
	                    		}
                    			else if (gender == 'female') {
		                    		designation_icon = 'chess queen blue';
                    			}
	                		break;
	                		case 'TX392a':
	                    		designation_value = 'Human Resources Admin';
	                    		designation_icon = 'sitemap teal';
	                		break;
	                		case 'R1T29a':
	                    		designation_value = 'Human Resources - Assigned';
	                    		designation_icon = 'i cursor grey';
	                		break;
	                		case 'K3tSnP':
	                    		designation_value = 'Supply Officer';
	                    		designation_icon = 'dolly';
	                		break;
	                		case '000000':
                				designation_value = '';
								designation_icon = 'dot circle outline grey';
	                		break;
	                	}
					}
					else {
                		designation_value = '';
						designation_icon = 'dot circle outline grey';
						designation_key = '';
					}

					element_string = `
						<div class="ui link raised card teal" id="profile_card`+user_id+`">
							<div class="ui blurring dimmable image">
								<div class="ui dimmer">
									<div class="content">
										<h5 class="user_management_activator" id="manage`+user_id+`" data-user_id="`+user_id+`" data-first_name="`+first_name+`" data-suffix="`+suffix+`">
											<i class="archive icon teal"></i>
											Manage Files
										</h5>
					`;

					if (user_id != 9090) {
						element_string += `
										<h5 class="profile_update_activator" data-user_id="`+user_id+`">
											<i class="id badge outline icon blue"></i>
											Manage Profile
										</h5>
						`;
					}
					if (user_id != 9090 && user_id != 9091 && user_id != 9099) {
						element_string += `
										<h5 class="archive_user_activato" id="manage`+user_id+`" data-user_id="`+user_id+`" data-first_name="`+first_name+`" data-suffix="`+suffix+`">
											<i class="window restore icon orange"></i>
											Archive User
										</h5>
						`;
					}
					element_string += `
									</div>
								</div>
								<div class="image_container">
									<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="center middle aligned flowing_image image bordered">
								</div>
							</div>
							<div class="content">
								<input class="file_input" type="text" id="user_focuser`+user_id+`"></input>
								<a class="ui small header">
									`+full_name+`
									<div class="sub header">
										`+position+`
									</div>
								</a>
								<a class="ui header tiny">
									<i class="`+designation_icon+` icon small"></i>
									<span class="content break-word">`+designation_value+`</span>
								</a>
							</div>
						</div>
					`;

					$('#cards_container').append(element_string);
					loading_stop();
					search_content.push({id:user_id,title:full_name+' - '+position,description:username+' - '+email_address});
				});
				$('#profiles_search')
					.search({
						source: search_content,
						fullTextSearch: true,
						onSelect: function(result, response) {
							user_id = result.id;
							$('#user_focuser'+user_id).focus();
							$('#profile_card'+user_id)
								.transition('pulse')
								.transition('tada')
								.transition('flash')
							;
						}
					})
				;
				$('.profile_view_activator')
					.off('click')
					.on('click', function() {
						var user_id = $(this).data('user_id');
						$('#active_profile_user_id').val(user_id);
						loading_start('Loading Profile');
						$('#account_info_segment').addClass('hidden');
						$.when(load_specific_user_data(user_id))
							.done(function() {
								setTimeout(function() {
									loading_stop();
									$('#profile_view_modal')
										.modal({
											transition: 'fade down',
											closable: false,
											blurring: false,
											autofocus: false,
											allowMultiple: false,
											onDeny: function() {
												$("#profile_view_container").scrollTop(0);
												$('#registration_update_form').form('reset');
											}
										})
										.modal('show')
									;
								}, 800);
								setTimeout(function() {
								}, 1400);
							})
						;
					})
				;
				// $('.user_management_activator').on('click', function() {
				// 	var user_id = $(this).data('user_id');
				// 	var first_name = $(this).data('first_name');
				// 	var suffix = $(this).data('suffix');

				// 	if (suffix != '') {
				// 		label_name = first_name+' '+suffix;
				// 	}
				// 	else {
				// 		label_name = first_name;
				// 	}

				// 	if (label_name[label_name.length-1].toLowerCase() == 's') {
				// 		label_name = label_name+"'";
				// 	}
				// 	else {
				// 		label_name = label_name+"'s";
				// 	}
				// 	$('#personnel_management_title').html(label_name+' Files');
					
				// 	$('#active_personnel_management_id').val(user_id);
				// 	loading_start('Loading Files');
				// 	$.when(load_document_types())
				// 		.done(function() {
				// 			specific_personnel_files(user_id);
				// 			show_user_management_modal();
				// 		})
				// 	;
				// });
			}
			else {
				$('#page_label').html('No Registered Users');
				cards_monitor();
				loading_stop();
			}
			

			$('.active.progress').progress();
			$('.activating.element').popup();
			$('.ui.sticky')
				.sticky({
					context: 'main'
				})
			;
			$('.special.cards .image').dimmer({
				on: 'hover'
			});
            $('#page_label').prop("dblclick", null).off('dblclick');
			$('#page_label')
				.on('dblclick', function() {
					toggle_hr_view();
				})
			;
		});
	}
	function load_unregistered_users() {
		loading_start('Loading Pending Registrations');
		var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_unregistered_users");
		var jqxhr = ajax
		.fail(function() {
			alert("Connection Error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$('#cards_container').html('');
			if (response_data != '') {
				$('#page_label').html('Pending Registrations');
				$.each(response_data, function(key, value) {
					
					var user_id = value.user_id;
					var first_name = value.first_name.UCwords();
					var middle_name = value.middle_name.UCwords();
					var last_name = value.last_name.UCwords();
					var suffix = value.suffix.toUpperCase();
					var gender = value.gender;
					var position = value.position;
					var phone_number = value.phone_number;
					var username = value.username;
					var email_address = value.email_address;
					var image = value.image;
					var registry_date = value.registry_date;

					full_name = first_name+' '+middle_name[0]+'. '+last_name;

					if (suffix != '') {
						full_name += ' '+suffix+'.';
					}

					element_string = `
						<div class="ui link raised card orange" id="card`+user_id+`">
							<div class="ui blurring dimmable image">
								<div class="ui dimmer">
									<div class="content">
										<h5 class="profile_view_activator" data-user_id="`+user_id+`">
											<i class="id badge outline icon blue"></i>
											View Profile
										</h5>
										<h5 class="approve_registration" data-user_id="`+user_id+`">
											<i class="check icon green"></i>
											Approve
										</h5>
										<h5 class="decline_registration" data-user_id="`+user_id+`">
											<i class="remove icon red"></i>
											Decline
										</h5>
									</div>
								</div>
								<div class="image_container">
									<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="center middle aligned flowing_image image bordered">
								</div>
							</div>
							<div class="content">
								<input class="file_input" type="text" id="unregistered_user_focuser`+user_id+`"></input>
								<a class="ui tiny header">
									`+full_name+`
									<div class="sub header">
										`+position+`
									</div>
								</a>
								<div class="meta">
									<i class="slack hash icon grey"></i>
									<span class="break-word">&nbsp;`+username+`</span>
								</div>
							</div>
						</div>
					`;

					$('#users_cards_container').append(element_string);
				});
				loading_stop();
				$('.profile_view_activator')
					.off('click')
					.on('click', function() {
						var user_id = $(this).data('user_id');
						$('#active_profile_user_id').val(user_id);
						loading_start('Loading Profile');
						$('#account_info_segment').addClass('hidden');
						$.when(load_specific_user_data(user_id))
							.done(function() {
								setTimeout(function() {
									loading_stop();
									$('#profile_view_modal')
										.modal({
											transition: 'fade down',
											closable: false,
											blurring: false,
											autofocus: false,
											allowMultiple: false,
											onDeny: function() {
												$("#profile_view_container").scrollTop(0);
												$('#registration_update_form').form('reset');
											}
										})
										.modal('show')
									;
								}, 800);
								setTimeout(function() {
								}, 1400);
							})
						;
					})
				;
				$('.approve_registration')
					.on('click', function() {
						var selected_user_id = $(this).data('user_id');
						load_approve_confirmation(selected_user_id);   
					})
				;
				$('.decline_registration')
					.on('click', function() {
						var selected_user_id = $(this).data('user_id');
						load_decline_confirmation(selected_user_id);   
					})
				;   
			}
			else {
				$('#page_label').html('No Pending Registrations');
				cards_monitor();
				loading_stop();
			}
			$('.active.progress').progress();
			$('.activating.element').popup();
			$('.ui.sticky')
				.sticky({
					context: 'main'
				})
			;
			$('.special.cards .image').dimmer({
				on: 'hover'
			});
		});
	}
	function load_approve_confirmation(selected_user_id) {
		$('#approve_positive_action').on('click', function() {
			update_user_registration(selected_user_id, 'approve');
		});
		$('#approve_confirmation')
			.modal('setting', 'closable', false)
			.modal('setting', 'allowMultiple', true)
			.modal('setting', 'blurring', true)
			.modal('show')
		;
	}
	function load_decline_confirmation(selected_user_id) {
		$('#decline_positive_action').on('click', function() {
			update_user_registration(selected_user_id, 'decline');
		});
		$('#decline_confirmation')
			.modal('setting', 'closable', false)
			.modal('setting', 'allowMultiple', true)
			.modal('setting', 'blurring', true)
			.modal('show')
		;
	}
	function update_user_registration(selected_user_id, update_type) {
		// alert(selected_user_id)
		loading_start('Processing');
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sys_control/update_user_registration',
			data  : {
				update_type: update_type,
				registry_id: selected_user_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			$('#card'+selected_user_id).remove();
			cards_monitor();
			loading_stop();
		})
		.fail(function() {
			alert("Connection Error");
		})
		.always(function() {
		})
	}
	function show_user_management_modal(action) {
		setTimeout(function() {
			$('#user_management_modal')
				.modal('setting', 'closable', false)
				.modal('setting', 'blurring', true)
				.modal('show')
			;    
			let exit_function = Function(action);
			$('#user_management_modal_exit')
				.on('click', function () {
					exit_function();		
				})
			;
		}, 800);
	}
	function exit_user_management_modal(action) {
		$('#user_management_modal')
			.modal('setting', 'closable', false)
			.modal('setting', 'blurring', false)
			.modal('hide')
		;    
		let revert_function = Function(action);
		$('#user_management_modal_exit')
			.on('click', function () {
				revert_function();		
			})
		;
	}
	function cards_monitor() {
		var cards = $('#cards_container').html();
		if (cards == '') {
			$('#page_label').html('No Pending Registrations');
		}
	}
</script>