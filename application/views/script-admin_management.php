<?php include 'esses/action_floater.php';?>
<script type="text/javascript">
	current_admin_view = 'registered_users';
	
	function toggle_admin_view() {
		const current_page = new URL(window.location.href);
		page_value = current_page.pathname.split('/').pop();

		if (current_admin_view == 'registered_users') {
			current_admin_view = 'operations';

			if (page_value == 'user_window') {
				container_data = `
					<h2 class="ui header center aligned">
						<a class="pointered" id="page_label"></a>
					</h2>
					<br>
					<div class="ui four doubling special cards" id="users_cards_container"></div>
				`;
			}
			else if (page_value == 'admin_management_window') {
				container_data = `
					<h2 class="ui header center aligned">
						<a class="pointered" id="page_label"></a>
					</h2>
					<br>
					<div class="ui four doubling special cards" id="users_cards_container"></div>
				`;
			}
			
			$('#container_section').html(container_data);
			$('#page_label').prop("dblclick", null).off('dblclick');
			$('#page_label')
				.on('dblclick', function() {
					toggle_admin_view();
				})
			;

			load_unregistered_users();
			// OLD (LOAD PROJECT CARDS)
			// $.when(load_ongoing_projects())
			// 	.done(function() {
			// 		setTimeout(function() {
			// 			load_article_progress_points();
			// 		}, 800);
			// 	})
			// ;
		}
		else if (current_admin_view == 'operations') {
			current_admin_view = 'registered_users';

			if (page_value == 'user_window') {
				container_data = `
					<h2 class="ui header center aligned">
						<a class="pointered" id="page_label"></a>
					</h2>
					<br>
					<div class="ui four doubling special cards" id="users_cards_container"></div>
				`;
			}
			else if (page_value == 'admin_management_window') {
				container_data = `
					<h3 class="ui header center aligned">
						<a class="pointered" id="page_label"></a>
					</h3>
					<br>
					<div class="ui four doubling special cards" id="users_cards_container"></div>
				`;
			}
			
			$('#container_section').html(container_data);
			load_admin_registered_users();
		}
	}
	
	$('#personnel_assigner_form')
        .form({
            on: 'change',
            inline: true,
            transition: 'swing down',
            onSuccess: function(event) {
                event.preventDefault();
                if($('#personnel_assigner_form').form('is valid')) {
                    var ajax = $.ajax({
                        method: 'POST',
                        url   : '<?php echo base_url();?>i.php/sys_control/update_personnel_module',
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
                            var response = jqxhr.responseText;
							if (response != '') {
								if (response == 'success') {
									icon = 'check green';
									header = 'Assignment Updated';
									message = 'Module Assignment updated successfully.';
									duration = 25000;
									exit_action = '';
									overlay = 'single';
									load_notification(icon, header, message, duration, exit_action, overlay);
									setTimeout(function(){
										load_admin_registered_users();
									}, 3000);
								}
								else if (response == 'failed') {
									icon = 'times red';
									header = 'Assignment Update Failed';
									message = 'Module Assignment updating failed, please try again.';
									duration = 25000;
									exit_action = '';
									overlay = 'single';
									load_notification(icon, header, message, duration, exit_action, overlay);
								}
				            }       
                        })
                    ;
                }
            },
            fields: {
                designations_drop: {
                    identifier: 'designations_drop',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please select a System Module from the list'
                        }
                    ]
                }
            }
        })
    ;
	async function load_active_designations() {
        var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_active_designations");
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
                    class_counter++;
                    var designation_key = value.designation_key;

                    switch(designation_key) {
                    	case '634BHi':
                    		designation_value = 'Admin Access';
                    		break;
                		case 'R1T29a':
                    		designation_value = 'HR Access';
                    		break;
                    }

                    designation_option = `
						<div class="item" data-value="`+designation_key+`">`+designation_value+`</div>
                    `;

                    $('#designation_options').append(designation_option);
                })
                $('#personnel_assigner_modal')
                    .modal('show')
                    .modal('setting', 'closable', false)
                    .modal({blurring: true})
                ;
            }
            return true;
        })
    }
	function load_admin_registered_users() {
		loading_start('Loading Registered Users');
		var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_registered_users");
		var jqxhr = ajax
		.fail(function() {
			alert("Connection Error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$('#users_cards_container').html('');
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
												<i class="window restore icon teal"></i>
												Manage Files
											</h5>
					`;
					if (user_id != 9090) {
						element_string += `
							<h5 class="profile_view_activator" data-user_id="`+user_id+`">
								<i class="id badge outline icon blue"></i>
								Manage Profile
							</h5>
						`;
					}
					else if (user_id == 9090) {
						element_string += `
							<h5 class="profile_view_activator" data-user_id="`+user_id+`">
								<i class="id badge outline icon blue"></i>
								View Profile
							</h5>
						`;
					}

					if (user_id != 9090 && user_id != 9091 && user_id != 9099) {
						element_string += `
											<h5 class="user_assigner_activator" id="assign`+user_id+`" data-user_id="`+user_id+`" data-first_name="`+first_name+`" data-suffix="`+suffix+`" data-designation_key="`+designation_key+`" data-designation_value="`+designation_value+`">
												<i class="id external alternate icon olive"></i>
												Assign Module
											</h5>
											<h5 class="archive_activator" data-user_id="`+user_id+`">
												<i class="download icon orange"></i>
												Archive User
											</h5>
						`;
					}
					element_string += `
									</div>
								</div>
								<div class="image_container">
									<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`">
								</div>
							</div>
							<div class="content">
								<a class="ui tiny header">
									`+full_name+`
									<div class="sub header">
										`+position+`
									</div>
								</a>
								<input class="file_input" type="text" id="user_focuser`+user_id+`"></input>
								<a class="ui header tiny">
									<i class="ui `+designation_icon+` icon mini"></i>
									<span class="content break-word">`+designation_value+`</span>
								</a>
							</div>
						</div>
					`;

					$('#users_cards_container').append(element_string);
					
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
								.transition('flash')
							;
						}
					})
				;

 				// if ($._data($('.profile_view_activator').get(0), "events") != undefined) {
				// 	var click_events = $._data($('.profile_view_activator').get(0), "events").click;
	 			// 	click_events_count = 0;
	 			// 	$.each(click_events, function (count) {
	 			// 		click_events_count = count;
	 			// 	});
	 			// 	if (click_events_count != 0) {
				// 		$('.profile_view_activator').unbind('click');
	 			// 	}
				// }
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

				// if ($._data($('.user_management_activator').get(0), "events") != undefined) {
				// 	var click_events = $._data($('.user_management_activator').get(0), "events").click;
	 			// 	click_events_count = 0;
	 			// 	$.each(click_events, function (count) {
	 			// 		click_events_count = count;
	 			// 	});
	 			// 	if (click_events_count != 0) {
				// 		$('.user_management_activator').unbind('click');
	 			// 	}
				// }
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

				if ($._data($('.user_assigner_activator').get(0), "events") != undefined) {
					var click_events = $._data($('.user_assigner_activator').get(0), "events").click;
	 				click_events_count = 0;
	 				$.each(click_events, function (count) {
	 					click_events_count = count;
	 				});
	 				if (click_events_count != 0) {
						$('.user_assigner_activator').unbind('click');
	 				}
				}
				$('.user_assigner_activator').on('click', function() {
					var user_id = $(this).data('user_id');
					var first_name = $(this).data('first_name');
					var suffix = $(this).data('suffix');
					var designation_key = $(this).data('designation_key');
					var designation_value = $(this).data('designation_value');

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

					$('#active_personnel_assigment_id').val(user_id);
					if (designation_key) {
						switch(designation_key) {
	                    	case '634BHi':
	                    		$('#designations_drop')
								  	.dropdown({
							            on         : 'click',
							            transition : 'fade up',
							            duration   : 400,
							            delay : {
							                hide   : 100,
							                show   : 100,
							                search : 50,
							                touch  : 50
							            },
					            		placeholder: 'Designations',
									    values: [
									    	{
									        	name : 'Unassign',
									        	value: '000000'
									      	},
									      	{
									        	name     : 'Human Resources Module',
									        	value    : 'R1T29a'
									      	},
									      	{
									        	name     : 'Supplies Inventory Module',
									        	value    : 'K3tSnP'
									      	}
									    ]
								  	})
								;
	                		break;
	                		case 'R1T29a':
	                    		$('#designations_drop')
								  	.dropdown({
							            on         : 'click',
							            transition : 'fade up',
							            duration   : 400,
							            delay : {
							                hide   : 100,
							                show   : 100,
							                search : 50,
							                touch  : 50
							            },
					            		placeholder: 'Designations',
									    values: [
									    	{
									        	name : 'Unassign',
									        	value: '000000',
									        	selected : true
									      	},
									      	{
									        	name     : 'Admin Module',
									        	value    : '634BHi'
									      	},
									      	{
									        	name     : 'Supplies Inventory Module',
									        	value    : 'K3tSnP'
									      	}
									    ]
								  	})
								;
	                		break;
	                		case 'K3tSnP':
	                    		$('#designations_drop')
								  	.dropdown({
							            on         : 'click',
							            transition : 'fade up',
							            duration   : 400,
							            delay : {
							                hide   : 100,
							                show   : 100,
							                search : 50,
							                touch  : 50
							            },
					            		placeholder: 'Designations',
									    values: [
									    	{
									        	name : 'Unassign',
									        	value: '000000',
									        	selected : true
									      	},
									      	{
									        	name     : 'Admin Module',
									        	value    : '634BHi'
									      	},
									      	{
									        	name     : 'Human Resources Module',
									        	value    : 'R1T29a'
									      	}
									    ]
								  	})
								;
	                		break;
	                		case '000000':
	                    		$('#designations_drop')
								  	.dropdown({
							            on         : 'click',
							            transition : 'fade up',
							            duration   : 400,
							            delay : {
							                hide   : 100,
							                show   : 100,
							                search : 50,
							                touch  : 50
							            },
							            placeholder: 'Designations',
									    values: [
									    	{
									        	name     : 'Human Resources Module',
									        	value    : 'R1T29a'
									      	},
									      	{
									        	name     : 'Admin Module',
									        	value    : '634BHi'
									      	},
									      	{
									        	name     : 'Supplies Inventory Module',
									        	value    : 'K3tSnP'
									      	}
									    ]
								  	})
								;
	                		break;
	                	}
					}
					else {
                		$('#designations_drop')
						  	.dropdown({
					            on         : 'click',
					            transition : 'fade up',
					            duration   : 400,
					            delay : {
					                hide   : 100,
					                show   : 100,
					                search : 50,
					                touch  : 50
					            },
					            placeholder: 'Designations',
							    values: [
							    	{
							        	name     : 'Human Resources Module',
							        	value    : 'R1T29a'
							      	},
							      	{
							        	name     : 'Admin Module',
							        	value    : '634BHi'
							      	},
							      	{
							        	name     : 'Supplies Inventory Module',
							        	value    : 'K3tSnP'
							      	}
							    ]
						  	})
						;
					}

					$('#assigner_title').html(label_name+' Module');

					if (designation_value == 'Unassigned') {
						$('#assigner_current_module').html('Current assigned Module: <span class="orange-text">'+designation_value+'</span>');
					}
					else {
						$('#assigner_current_module').html('Current assigned Module: <span class="teal-text">'+designation_value+'</span>');
					}
					$('#active_personnel_id').val(user_id);
					loading_start('Loading Modules');
					setTimeout(function() {
						$('#personnel_assigner_modal')
		                    .modal('show')
		                    .modal('setting', 'closable', false)
		                    .modal({blurring: true})
		                ;
					}, 800);
				});
				loading_stop();
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
            if ($._data($('#page_label').get(0), "events") != undefined) {
				var click_events = $._data($('#page_label').get(0), "events").dblclick;
 				click_events_count = 0;
 				$.each(click_events, function (count) {
 					click_events_count = count;
 				});
 				if (click_events_count != 0) {
					$('#page_label').unbind('dblclick');
 				}
			}
			$('#page_label')
				.on('dblclick', function() {
					toggle_admin_view();
				})
			;
		});
	}
	function load_ongoing_projects() {
		loading_start('Loading Statistical Operations');
	    var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_ongoing_projects");
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$('#users_cards_container').html('');
			if (response_data != '') {
				$('#page_label').html('Statistical Operations');
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
					var first_name = value.first_name.UCwords();
					var middle_name = value.middle_name.UCwords();
					var last_name = value.last_name.UCwords();
					var suffix = value.suffix.toUpperCase();
					var gender = value.gender;

					var full_name = first_name+' '+middle_name[0]+'. '+last_name+' '+suffix;

					var focal_image = value.focal_image;
					var focal_person = full_name;
					var focal_position = value.focal_position;

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

					element_string = `
						<div class="ui link raised card">
							<div class="ui blurring dimmable inverted image dimmable-image">
								<div class="ui dimmer">
									<div class="content">
										<h5 class="article_modal_activator" data-project_id="`+project_id+`">
							        		<i class="file yellow alternate outline icon"></i>
											View Article
										</h5>
										<h5 class="project_edit_activator" tabindex="0" data-project_id="`+project_id+`">
							        		<i class="green edit icon"></i>
											Modify Project
										</h5>
									</div>
								</div>
								<img src="<?php echo base_url();?>photos/post_images/`+project_image+`" class="post_image">
							</div>
						    <div class="content">
							    <h2 class="ui header article_modal_activator" data-project_id="`+project_id+`">`+project_title+`</h2>
							    <div class="meta">
							    	<a class="activating element profile_preview" data-focal_image="`+focal_image+`" data-focal_person="`+focal_person+`" data-focal_position="`+focal_position+`" id="`+project_id+`">
							    		<span>
							    			Focal:		
							    		</span>
							    		<strong>
											`+focal_person+`				    			
							    		</strong>
							    	</a>
							    </div>
							    <br>
							    <div class="meta">
							        <span class="ui middle aligned">
							        	<i class="calendar alternate outline icon"></i>
							        	<span>`+project_start+`</span>
							        </span>
							        to&nbsp;
							        <span>
							        	<span>`+project_deadline+`</span>
							        	<i class="calendar times outline icon"></i>
							    	</span>
							    </div>
						    </div>
						    <div class="extra content">
				    			<span class="ui small indicating active progress" data-percent="`+progress_percent+`" data-total="100">
									<div class="bar" id="bar`+project_id+`">
										<div class="progress"></div>
									</div>
								</span>
						    </div>
						    <div class="ui longer large modal modal_body`+project_id+`">
							  	<div class="header" align="center">`+project_title+`</div>
							  	<div class="scrolling content">
							  		<div class="ui grid column centered">
										<div class="fifteen wide mobile fourteen wide tablet twelve wide computer column centered">
									    	<a class="ui bordered center aligned rounded fluid image">
												<img src="<?php echo base_url();?>photos/post_images/`+project_image+`" class="post_image">
										    </a>
									    </div>
									</div>
							  		<div class="ui grid column centered">
										<div class="fifteen wide mobile fourteen wide tablet twelve wide computer column centered">
								  			<div class="text">
								  				`+project_description+`
								  				<br>
									    	</div>
								    	</div>
										<div class="twelve wide mobile ten wide tablet eight wide computer eight column centered">
									    	<div id="progress_report_container`+project_id+`">
									    		<h3 class="header" align="center">Project Progress</h3>

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
					`;

					$('#users_cards_container').append(element_string);

					
					
				});
				$('.article_modal_activator')
				  	.on('click', function() {
						var project_id = $(this).data('project_id');
						$('.modal_body'+project_id)
							.modal('setting', 'transition', 'fade down')
	    					.modal('setting', 'closable', false)
						  	.modal('show')
						;
					})
				;
				$('.project_edit_activator')
					.on('click', function() {
						var update_project_id = $(this).data('project_id');
						var ajax = $.ajax({
							method: 'POST',
							url   : '<?php echo base_url();?>i.php/sys_control/set_updating_project_id',
							data  : {
								update_project_id: update_project_id
							}
						});
						var jqxhr = ajax
						.done(function() {

						})
						.fail(function()  {
							alert("error");
						})
						.always(function() {
							var response_data = jqxhr.responseText;
							window.open('<?php echo base_url();?>i.php/sys_control/project_editor');  
						})
					});
				;
				$('.profile_preview').on('hover',function() {
					var focal_image = $(this).data('focal_image');
					var focal_person = $(this).data('focal_person');
					var focal_position = $(this).data('focal_position');
					$('.profile_preview').popup({
						transition : 'drop',
						position   : 'top center',
						inline     : true,
						variation  : 'wide',
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
			else {
				$('#page_label').html('No Statistical Operations');
				loading_stop();
			}
			
			$('.active.progress').progress();
			$('.activating.element').popup();
			$('.ui.sticky')
				.sticky({
			    	context: 'main'
			  	})
			;
			$('.special.cards .dimmable-image').dimmer({
			  	on: 'hover'
			});
		});
		loading_stop();
	}
	async function load_article_progress_points() {
		var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_progress_points");
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				iteration_count = 1;
				$.each(response_data, function(key, value) {

					var point_id = value.point_id;
					var project_id = value.project_id;
					var point_percent = value.point_percent;
					var point_color = value.point_color;
					var point_date = value.point_date;
				
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

					if ($('#point_tabs'+project_id).html() == '<div class="ui header medium center aligned">No Progress Data</div>') {
						$('#point_tabs'+project_id).html('');
					}
					
					if (iteration_count == response_data.length) {
						var activator = 'active';
					}
					else {
						var activator = '';
					}

					if (point_percent == '100') {
						progress_label = 'Completed as of '+stringify_date(point_date);
					}
					else {
						progress_label = stringify_date(point_date);
					}

					progress_points = `
						<div class="ui small indicating progress progress_report" data-percent="`+point_percent+`" data-total="100">
						  	<div class="bar">
								<div class="progress"></div>
						  	</div>
						  	<div class="label">`+progress_label+`</div>
						</div>
					`;

					$('#progress_report_container'+project_id).append(progress_points);
					$('.progress_report').progress();
				})
			}
			$('.menu .item').tab();
			return true;
		})
	}
	function show_user_management_modal(action) {
		setTimeout(function() {
			$('#user_management_modal')
				.modal('setting', 'blurring', true)
				.modal('setting', 'closable', false)
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
			.modal('setting', 'blurring', true)
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
		var cards = $('#users_cards_container').html();
		if (cards == '') {
			$('#page_label').html('No Pending Registrations');
		}
	}
</script>