<script type="text/javascript">
	// FOR TABLE VIEW {
	var table_update_array = [];
	var table_update_indexer = [];
	// } FOR TABLE VIEW

	// FOR GRID VIEW {
	var grid_update_array = [];
	var grid_update_indexer = [];

	var retrieval_cart_array = [];
	var retrieval_cart_indexer = [];
	var retrieval_items_count = 0;

	var restocking_cart_array = [];
	var restocking_cart_indexer = [];
	var restocking_items_count = 0;
	var	restocking_codes = [];

	
	var active_cart_identifier = 0;
	var grid_index_count = 0;
	var view_type = '';
	// } FOR GRID VIEW

	// FOR ALL VIEW TYPES {
	var edit_status = 0;
	var archive_status = 1;
	var retrieval_cart_type = 'first';
	var selected_card_id = 0;
	var selected_card_count = 0;
	var max_card_count = 0;
	var card_selection_trigger = false;

	var date = new Date();
	var day = String(date.getDate());
	var month = String(date.getMonth()+1);
	var year = String(date.getFullYear());

	day = day.padStart(2, '0');
	month = month.padStart(2, '0');
	
	var page_count = 0;
	var current_page = 1;
	
	var current_date = year+'-'+month+'-'+day;
	$('#report_date').val(current_date);
	// } FOR ALL VIEW TYPES

	function load_inventory_raw() {
		var ajax = $.ajax("<?php echo base_url();?>i.php/sims_control/load_inventory_raw");
		var jqxhr = ajax
		.fail(function() {
			alert("Connection Error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$('#inventory_cards_container').html('');
			if (response_data != '') {
				var items_array = [];
			    var units_array = [];
			    var descriptions_array = [];
			    var categories_array = [];
			    var search_content = [];
				
				retrieval_cart_indexer.length = 0;
				retrieval_cart_array.length = 0;
				restocking_cart_indexer.length = 0;
				restocking_cart_array.length = 0;
				table_update_array.length = 0;
				grid_update_array.length = 0;

				$.each(response_data, function(key, value) {
					var item_id = value.item_id;
			        var price_id = value.price_id;
			        var stock_id = value.stock_id;
			        var category_id = value.category_id;
			        var item_code = value.item_code;
			        var item_name = value.item_name;
			        var item_description = value.item_description;
			        var category_name = value.category_name;
			        var stock_amount = value.stock_amount;
			        var item_price = value.item_price;
			        var item_unit = value.item_unit;
			        category_acronym = category_name.match(/[A-Z]/g).join('');

			        table_update_array.push([item_id, price_id, stock_id, category_id, item_code, item_name, stock_amount, item_price, item_description, category_name, item_unit]);

			        grid_update_array.push([item_id, price_id, stock_id, category_id, item_code, item_name, item_price, item_description, category_name, item_unit]);

			        retrieval_cart_array.push([item_id, price_id, stock_id, '0']);

					restocking_cart_array.push([item_id, price_id, stock_id, '0', item_price]);

		           	items_array[item_code] = null;
		           	items_array[item_name] = null;
		           	items_array[item_description] = null;
			      	items_array[category_name] = null;
			      	items_array[item_unit] = null;
			      	items_array[item_price] = null;
					descriptions_array[item_description] = null;
			      	categories_array[category_name] = null;
			      	if (item_unit != 'unspecified') {
				      	units_array[item_unit] = null;
			      	}

		      		search_content.push({id:item_id,title:item_code+' - '+item_name,description:item_description+' - '+category_acronym});
				});
				$('#inventory_search')
					.search({
						source: search_content,
						fullTextSearch: 'exact',
						maxResults: 100,
						minCharacters: 2,
						onSelect: function(result, response) {
							search_item_id = result.id;
							$('#item'+search_item_id).trigger('focus');
							$('#item_card'+search_item_id)
								.transition('pulse')
								.transition('tada')
								.transition('flash')
							;
						}
					})
				;
				load_inventory_content();
			}
		})
	}

	function load_inventory_content() {
		var ajax = $.ajax("<?php echo base_url();?>i.php/sims_control/load_inventory_raw");
		var jqxhr = ajax
		.fail(function() {
			alert("Connection Error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$('#inventory_cards_container').html('');
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					var item_id = value.item_id;
			        var price_id = value.price_id;
			        var stock_id = value.stock_id;
			        var category_id = value.category_id;
			        var item_code = value.item_code;
			        var item_name = value.item_name;
			        var item_description = value.item_description;
			        var category_name = value.category_name;
			        var stock_amount = value.stock_amount;
			        var item_price = value.item_price;
			        var item_unit = value.item_unit;
			        category_acronym = category_name.match(/[A-Z]/g).join('');

			        if (stock_amount == -1) {
			        	stock_amount = 0;
			        }

					box_color = box_painter(stock_amount);

			        if (stock_amount == 1) {
			        	unit_display = item_unit;
			        }
			        else {
			        	unit_last = item_unit[item_unit.length-1].toLowerCase();
				        if (unit_last == 's' || unit_last == 'sh' || unit_last == 'ch' || unit_last == 'x' || unit_last == 'z') {
				        	unit_display = item_unit+'es';
				        }
				        else {
				        	unit_display = item_unit+'s';
				        }
			        }

			       	inventory_card = `
			    		<div class="card" id="item_card`+item_id+`">
							<div class="content">
								<a class="ui header small">`+item_name+`</a>
								<div class="meta">`+item_code+`</div>
							</div>
							<div class="ui basic content segment center aligned">
								<a>
									<i class="ui center aligned box `+box_color+` huge icon"></i>
									<br>
									<br>
									<x class="stocks_holder invisible">`+stock_amount+` `+unit_display+`</x>
									<input class="file_input" type="text" id="item`+item_id+`"></input>
							 	</a>
							</div>
						</div>
			       	`; 
			       	$('#inventory_cards_container').append(inventory_card);
			    });
			}
		})
	}

	function load_admin_inventory_raw() {
		var ajax = $.ajax("<?php echo base_url();?>i.php/sims_control/load_inventory_raw");
		var jqxhr = ajax
		.fail(function() {
			alert("Connection Error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$('#inventory_cards_container').html('');
			if (response_data != '') {
				var items_array = [];
			    var units_array = [];
			    var descriptions_array = [];
			    var categories_array = [];
			    var search_content = [];
				
				retrieval_cart_indexer.length = 0;
				retrieval_cart_array.length = 0;
				restocking_cart_indexer.length = 0;
				restocking_cart_array.length = 0;
				table_update_array.length = 0;
				grid_update_array.length = 0;

				$.each(response_data, function(key, value) {
					var item_id = value.item_id;
			        var price_id = value.price_id;
			        var stock_id = value.stock_id;
			        var category_id = value.category_id;
			        var item_code = value.item_code;
			        var item_name = value.item_name;
			        var item_description = value.item_description;
			        var category_name = value.category_name;
			        var stock_amount = value.stock_amount;
			        var item_price = value.item_price;
			        var item_unit = value.item_unit;
			        category_acronym = category_name.match(/[A-Z]/g).join('');

			        table_update_array.push([item_id, price_id, stock_id, category_id, item_code, item_name, stock_amount, item_price, item_description, category_name, item_unit]);

			        grid_update_array.push([item_id, price_id, stock_id, category_id, item_code, item_name, item_price, item_description, category_name, item_unit]);

			        retrieval_cart_array.push([item_id, price_id, stock_id, '0']);

					restocking_cart_array.push([item_id, price_id, stock_id, '0', item_price]);

		           	items_array[item_code] = null;
		           	items_array[item_name] = null;
		           	items_array[item_description] = null;
			      	items_array[category_name] = null;
			      	items_array[item_unit] = null;
			      	items_array[item_price] = null;
					descriptions_array[item_description] = null;
			      	categories_array[category_name] = null;
			      	if (item_unit != 'unspecified') {
				      	units_array[item_unit] = null;
			      	}

		      		search_content.push({id:item_id,title:item_code+' - '+item_name,description:item_description+' - '+category_acronym});
				});
				$('#main_inventory_search')
					.search({
						source: search_content,
						fullTextSearch: 'exact',
						maxResults: 100,
						minCharacters: 2,
						onSelect: function(result, response) {
							var item_id = result.id;
							target_page = $('#main_item_card'+item_id).data('box_number');

							if (current_page == target_page) {
					  			var element = $("#main_item_card"+item_id);
					  			var iteration_check = 1;

							    $('html, body').animate({
							        scrollTop: element.offset().top - ($(window).height() - element.outerHeight(true)) / 2
						    	}, 200, function() {
						    		if (iteration_check == 1) {
						    			$('.card[data-item_id="'+item_id+'"]').trigger('click');
										$('#item'+item_id).trigger('focus');
										$('#main_item_card'+item_id)
											.transition('flash')
											.cardSelected()
										;	
							    		iteration_check = 0;
						    		}
						    	});
							}
							else {
								$('#main_inventory_page'+current_page)
									.transition({
										animation: 'fade up',
										onHide: function() {
											current_page = target_page;
								    		$('#inventory_navigation_center').html(current_page);
								    		$('#main_inventory_page'+current_page)
								    			.transition({
													animation: 'fade up',
								    				onComplete: function() {
							    						var element = $("#main_item_card"+item_id);
					  									var iteration_check = 1;
													    
													    $('html, body').animate({
													        scrollTop: element.offset().top - ($(window).height() - element.outerHeight(true)) / 2
												    	}, 200, function() {
												    		if (iteration_check == 1) {
												    			$('.card[data-item_id="'+item_id+'"]').trigger('click');
																$('#item'+item_id).trigger('focus');
																$('#main_item_card'+item_id)
																	.transition('flash')
																	.cardSelected()
																;	
													    		iteration_check = 0;
												    		}
												    	});	
								    				}
								    			})
								    		;			
										}
									})
								;
							}
						}
					})
				;
				load_admin_inventory_content();
			}
		})
	}
	function load_admin_inventory_content() {
		var ajax = $.ajax("<?php echo base_url();?>i.php/sims_control/load_inventory_raw");
		var jqxhr = ajax
		.fail(function() {
			alert("Connection Error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$('#inventory_cards_container').html('');
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					if (key % 15 == 0) {
						page_number = (key/15)+1;
			        	if (key == 0) {
			        		page_box = `
				        		<div class="ui five stackable special cards inventory_container transition" id="main_inventory_page`+page_number+`" data-page_number="`+page_number+`" data-key="`+key+`">
				        		</div>
							`;	
							page_nav = `
				        		<div class="item link selected active inventory_page_nav" data-page_number="`+page_number+`" id="inventory_nav`+page_number+`">
				        			`+page_number+`
				        		</div>
							`;	
			        	}
			        	else {
			        		page_box = `
				        		<div class="ui five stackable special cards inventory_container transition hidden" id="main_inventory_page`+page_number+`" data-page_number="`+page_number+` "data-key="`+key+`">
				        		</div>
							`;	
							page_nav = `
				        		<div class="item link inventory_page_nav" data-page_number="`+page_number+`" id="inventory_nav`+page_number+`">
				        			`+page_number+`
				        		</div>
							`;	
			        	}

			       		$('#main_inventory_cards_container').append(page_box);
			       		$('#main_inventory_cards_navigation').append(page_nav);
			        }
		        })
				page_count = page_number;
		        $('.inventory_page_nav')
	       			.on('click', function() {
	       				var page_number = $(this).data('page_number');
	       				$("#scrollButton").click(function() {
						    var element = $("#inventory_nav"+page_number);
						    $('html, body').animate({
						        scrollTop: element.offset().top - ($(window).height() - element.outerHeight(true)) / 2
					    	}, 1000);
	       				});
	       			})
	       		;

			    inventory_card = '';
			    box_identifier = 0;
				$.each(response_data, function(key, value) {
					var item_id = value.item_id;
			        var price_id = value.price_id;
			        var stock_id = value.stock_id;
			        var category_id = value.category_id;
			        var item_code = value.item_code;
			        var item_name = value.item_name;
			        var item_description = value.item_description;
			        var category_name = value.category_name;
			        var stock_amount = value.stock_amount;
			        var item_price = value.item_price;
			        var item_unit = value.item_unit;
			        category_acronym = category_name.match(/[A-Z]/g).join('');

			        if (stock_amount == -1) {
			        	stock_amount = 0;
			        }

					box_color = box_painter(stock_amount);

			        if (stock_amount == 1) {
			        	unit_display = item_unit;
			        }
			        else {
			        	unit_last = item_unit[item_unit.length-1].toLowerCase();
				        if (unit_last == 's' || unit_last == 'sh' || unit_last == 'ch' || unit_last == 'x' || unit_last == 'z') {
				        	unit_display = item_unit+'es';
				        }
				        else {
				        	unit_display = item_unit+'s';
				        }
			        }

			        if (key % 15 == 0) {
			        	box_identifier += 15;
			        }
			        page_number = box_identifier/15;

			       	inventory_card = `
			    		<div class="ui card" data-box_number="`+page_number+`" data-item_id="`+item_id+`" data-card_count="`+key+`" id="main_item_card`+item_id+`">
							<div class="content item_card" data-item_id="`+item_id+`">
								<a class="ui header tiny item_edit_activator pointered" data-item_id="`+item_id+`" data-item_name="`+item_name+`" data-item_code="`+item_code+`" data-item_price="`+item_price+`" data-item_unit="`+item_unit+`" data-item_category="`+category_name+`" data-item_description="`+item_description+`" data-value="0">
									`+item_name+`
									<div class="sub header" data-tooltip="`+category_name+`">
										`+category_acronym+`
									</div>
								</a>
								<div class="compact basic segment left floated supply_ledger_activator" data-item_id="`+item_id+`" data-item_code="`+item_code+`">
									<a class="ui header small grey pointered">`+item_code+`</a>
								</div>
							</div>
							<div class="ui basic content segment center aligned item_card" data-item_id="`+item_id+`">
							  	<div class="ui dropdown left pointing top outer_item_dropdown" data-item_id="`+item_id+`">
							  		<h5 class="ui icon header">
										<i class="box `+box_color+` link icon" id="box`+item_id+`"></i>
										<div class="content">
											<a class="ui header tiny">
												<x id="stock`+item_id+`">`+stock_amount+`</x> 
												<x id="unit`+item_id+`">`+unit_display+`</x>
												<input type="hidden" id="original_stock`+item_id+`" value="`+stock_amount+`">
												<div class="sub header tiny">
													₱`+Number(item_price).toFixed(2)+`
												</div>
											</a>
										</div>
									</h5>
									<div class="menu">
						    			<div class="ui popup" id="retrieval_popup`+item_id+`">
											<div class="ui form left aligned">
												<h5 class="ui dividing header">Retrieval</h5>
												<div class="field">
													<div class="ui left icon small input">
														<i class="x icon"></i>
														<input class="retrieval_quantity_input" type="number" id="retrieval_item_quantity`+item_id+`" placeholder="Retrieval Quantity" data-item_id="`+item_id+`" data-item_name="`+item_name+`" data-item_unit="`+item_unit+`" data-item_code="`+item_code+`" data-item_price="`+item_price+`"></input>
								    				</div>
								    			</div>
								    		</div>
											<i class="icons invisible large link add_to_retrieval" data-item_id="`+item_id+`">
												<i class="plus icon blue link"></i>
											</i>
						    			</div>
						    			<div class="ui popup" id="restocking_popup`+item_id+`">
											<div class="ui form left aligned">
												<h5 class="ui dividing header">Restocking</h5>
												<div class="field">
													<div class="ui left icon small input">
														<i class="x icon"></i>
														<input class="restocking_quantity_input" type="number" id="restocking_item_quantity`+item_id+`" placeholder="Restock Quantity" data-item_id="`+item_id+`" data-item_name="`+item_name+`" data-item_unit="`+item_unit+`" data-item_code="`+item_code+`" data-item_price="`+item_price+`"></input>
										    		</div>
									    		</div>
									    		<div class="field">
										    		<div class="ui left icon small input">
														<i class="paperclip icon"></i>
														<input class="restocking_price_input" type="number" placeholder="Price" data-item_id="`+item_id+`" data-item_price="`+item_price+`" value="`+item_price+`" id="restocking_item_price`+item_id+`"></input>
										    		</div>
									    		</div>
								    		</div>
											<i class="icons invisible large link add_to_restocking" data-item_id="`+item_id+`">
												<i class="plus icon teal link"></i>
											</i>
						    			</div>
								    	<div class="item" id="retrieval_popup_activator`+item_id+`">
											<i class="caret up icon blue"></i>
											Retrieve
								    	</div>
								    	<div class="item" id="restocking_popup_activator`+item_id+`">
											<i class="caret down icon teal"></i>
											Restock
								    	</div>
								  	</div>
							  	</div>
								  	
								<input class="file_input" type="text" id="item`+item_id+`"></input>
							</div>
						</div>
					`;
					$('#main_inventory_page'+page_number).append(inventory_card);

			       	$('#retrieval_popup_activator'+item_id)
					  	.popup({
					  		popup: $('#retrieval_popup'+item_id),
					  		position: 'top center',
					  		on: 'click',
					  		variation: 'small',
					  		onVisible: function() {
					  			$('#retrieval_item_quantity'+item_id).trigger('focus');
					  		},
					  		onHidden: function() {
					  			var original_stock = $('#original_stock'+item_id).val();
					  			$('#retrieval_item_quantity'+item_id).val('');
					  			$('#stock'+item_id).html(original_stock);
					  			
					  			box_color = box_painter(original_stock);
								$('#box'+item_id).attr('class', 'box '+box_color+ ' link icon');
					  		}
					  	})
					;
					$('#restocking_popup_activator'+item_id)
					  	.popup({
					  		popup: $('#restocking_popup'+item_id),
					  		position: 'bottom center',
					  		on: 'click',
					  		variation: 'small',
					  		onVisible: function() {
					  			$('#restocking_item_quantity'+item_id).trigger('focus');
					  		},
					  		onHidden: function() {
					  			var original_stock = $('#original_stock'+item_id).val();
					  			$('#restocking_item_quantity'+item_id).val('');
					  			$('#stock'+item_id).html(original_stock);
					  			
					  			box_color = box_painter(original_stock);
								$('#box'+item_id).attr('class', 'box '+box_color+ ' link icon');
					  		}
					  	})
					;
			        max_card_count = key;
			    });
			    $('.card')
			    	.on('click', function(event) {
			    		if ($(event.target).hasClass('item_card')) {
			    			item_id = $(event.target).data('item_id');
			    			$(this).cardSelected();	
			    		}
			    	})
			    ;
			    $('#inventory_navigation_left')
			    	.on('click', function() {
			    		$('html, body').animate({
					        scrollTop: $(document).height()
				    	}, 100);
			    		$('#main_inventory_page'+current_page)
							.transition({
								animation: 'fade left',
								duration: '50ms',
								onHide: function() {
									current_page--;
						    		if (current_page == 0) {
						    			current_page = page_count;
						    		}
						    		$('#inventory_navigation_center').html(current_page);
						    		$('#main_inventory_page'+current_page)
						    			.transition({
											animation: 'fade right',
											duration: '50ms'
						    			})
						    		;	
								}
							})
						;
			    	})
			    	.on('dblclick', function() {})
			    ;
			    $('#inventory_navigation_right')
			    	.on('click', function() {
    					$('html, body').animate({
					        scrollTop: $(document).height()
				    	}, 100);
			    		$('#main_inventory_page'+current_page)
							.transition({
								animation: 'fade right',
								duration: '50ms',
								onHide: function() {
									current_page++;
						    		if (current_page > page_count) {
						    			current_page = 1;
						    		}
						    		$('#inventory_navigation_center').html(current_page);
						    		$('#main_inventory_page'+current_page)
						    			.transition({
											animation: 'fade left',
											duration: '50ms'
						    			})
						    		;	
								}
							})
						;
			    	})
			    	.on('dblclick', function() {})
			    ;
			    $('#inventory_navigation_dropdown')
			    	.on('click', function() {
			    		$('html, body').animate({
					        scrollTop: $(document).height()
				    	}, 100);
			    	})
			    	.dropdown({
			    		onChange: function(value) {
				    		$('#main_inventory_page'+current_page)
								.transition({
									animation: 'fade up',
									duration: '300ms',
									onHide: function() {
			    						current_page = value;
							    		$('#inventory_navigation_center').html(current_page);
							    		$('#main_inventory_page'+current_page)
							    			.transition({
												animation: 'fade up',
												duration: '300ms'
							    			})
							    		;	
									}
								})
							;
			    		}
			    	})
			    ;
			    $('.outer_item_dropdown')
				  	.dropdown({
				  		action: 'nothing',
				  		direction: 'upward',
				  		transition: 'drop',
				  		onShow: function () {
				  			$(document)
				  				.off('keydown')
				  				.on('keydown', function(event) {
									var key = event.which;
									if (key == 38) {
										// UP
				  						$('#retrieval_popup_activator'+item_id).trigger('click');
									}
									if (key == 40) {
										// DOWN
				  						$('#restocking_popup_activator'+item_id).trigger('click');
									}
									if (key == 37) {
										// LEFT
										$('.outer_item_dropdown').dropdown('hide');
										$(document).cardNavLeft();
									}
									if (key == 39) {
										// RIGHT
										$('.outer_item_dropdown').dropdown('hide');
										$(document).cardNavRight();
									}
									if (key == 27) {
										// ESCAPE
										$('.outer_item_dropdown').dropdown('hide');
									}
								})
				  			;
				  		},
				  		onHide: function () {
				  			$(document)
				  				.off('keydown')
								.on('keydown', function(event) {
									var key = event.which;
									if (key == 38) {
										// UP
										$(document).cardNavUp();
									}
									if (key == 40) {
										// DOWN
										$(document).cardNavDown();
									}
									if (key == 37) {
										// LEFT
										$(document).cardNavLeft();
									}
									if (key == 39) {
										// RIGHT
										$(document).cardNavRight();
									}
									if (key == 13) {
										// ENTER
										$('#box'+selected_card_id).trigger('click');
									}
									if (key == 27) {
										// ESCAPE
										$('.outer_item_dropdown').dropdown('hide');
									}
								})
							;
				  		}
				  	})
				;
				$('.item_edit_activator').on('dblclick', function() {
					var item_code = $(this).data('item_code');

					$('#item_id_update').val($(this).data('item_id'));
					$('#item_name_update').val($(this).data('item_name'));
					$('#item_code_update').val($(this).data('item_code'));
					$('#item_price_update').val($(this).data('item_price'));
					$('#item_unit_update').val($(this).data('item_unit'));
					$('#item_category_update').val($(this).data('item_category'));
					$('#item_description_update').val($(this).data('item_description'));

			    	$('#item_edit_modal')
						.modal('setting', 'transition', 'fade down')
						.modal('setting', 'closable', false)
						.modal('setting', 'blurring', true)
						.modal('show')
					;
				});
			    $('.supply_ledger_activator').on('dblclick', function() {
					var item_id = $(this).data('item_id');
					var item_code = $(this).data('item_code');
			    	loading_start('Loading Supply Ledger for <x class="teal-text">Item '+item_code+'</x>');
					var ajax = $.ajax({
						method: 'POST',
						url   : '<?php echo base_url();?>i.php/sims_control/initialize_supplies_ledger_switch',
						data  : {
							item_id: item_id
						}
					});
					var jqxhr = ajax
					.fail(function() {
						alert("Connection Error");
					})
					.always(function() {
						setTimeout(function(){
				            window.open("<?php echo base_url();?>i.php/sims_control/supplies_ledger_report", "_blank");
				            loading_stop();
			    	    },1000);
			    	})
				});
				$('.retrieval_quantity_input')
					.on('focus', function() {
						$(document)
			  				.off('keydown')
			  				.on('keydown', function(event) {
								var key = event.which;
								if (key == 38) {
									// UP
			  						$('#retrieval_popup_activator'+item_id).trigger('click');
								}
								if (key == 40) {
									// DOWN
			  						$('#restocking_popup_activator'+item_id).trigger('click');
								}
								if (key == 27) {
									// ESCAPE
									$('.outer_item_dropdown').dropdown('hide');
								}
							})
			  			;
					})
					.on('input', function() {
						var item_id = $(this).data('item_id');
						var input_value = $(this).val();
						var original_stock = Number($('#original_stock'+item_id).val());

						new_quantity = original_stock-input_value;

						if (input_value == '') {
							$('#stock'+item_id).html(original_stock);
						}
						else {
							input_value = Number($(this).val());
							if (input_value > original_stock) {
								$(this).val(original_stock);
								$('#stock'+item_id).html(0);
							}
							else if (input_value < 0) {
								$(this).val(0);
								$('#stock'+item_id).html(original_stock);
							}
							else {
								$('#stock'+item_id).html(new_quantity);
							}	
						}
						var current_stock = Number($('#stock'+item_id).html());
						
						box_color = box_painter(current_stock);
						$('#box'+item_id).attr('class', 'box '+box_color+ ' link icon');
					})
					.on('keyup', function(event) {
						var item_id = $(this).data('item_id');
						var key = event.which;
						if (key == 13) {
							$(this).closest('#retrieval_popup'+item_id).find('.add_to_retrieval').trigger('click');
						}
					})
				;
				$('.restocking_quantity_input')
					.on('focus', function() {
						$(document)
			  				.off('keydown')
			  				.on('keydown', function(event) {
								var key = event.which;
								if (key == 38) {
									// UP
			  						$('#retrieval_popup_activator'+item_id).trigger('click');
								}
								if (key == 40) {
									// DOWN
			  						$('#restocking_popup_activator'+item_id).trigger('click');
								}
								if (key == 27) {
									// ESCAPE
									$('.outer_item_dropdown').dropdown('hide');
								}
							})
			  			;
					})
					.on('input', function() {
						var item_id = $(this).data('item_id');
						var input_value = $(this).val();
						var original_stock = Number($('#original_stock'+item_id).val());

						new_quantity = original_stock+Number(input_value);

						if (input_value == '') {
							$('#stock'+item_id).html(original_stock);
						}
						else {
							if (input_value < 0) {
								$(this).val(0);
								$('#stock'+item_id).html(original_stock);
							}
							else {
								$('#stock'+item_id).html(new_quantity);
							}
						}
						var current_stock = Number($('#stock'+item_id).html());

						box_color = box_painter(current_stock);
						$('#box'+item_id).attr('class', 'box '+box_color+ ' link icon');
					})
					.on('keyup', function(event) {
						var item_id = $(this).data('item_id');
						var key = event.which;
						if (key == 13) {
							$(this).closest('#restocking_popup'+item_id).find('.add_to_restocking').trigger('click');
						}
					})
				;
				$('.restocking_price_input')
					.on('focus', function() {
						$(document)
			  				.off('keydown')
			  				.on('keydown', function(event) {
								var key = event.which;
								if (key == 38) {
									// UP
			  						$('#retrieval_popup_activator'+item_id).trigger('click');
								}
								if (key == 40) {
									// DOWN
			  						$('#restocking_popup_activator'+item_id).trigger('click');
								}
								if (key == 27) {
									// ESCAPE
									$('.outer_item_dropdown').dropdown('hide');
								}
							})
			  			;
					})
					.on('keyup', function(event) {
						var item_id = $(this).data('item_id');
						var key = event.which;
						if (key == 13) {
							$(this).closest('#restocking_popup'+item_id).find('.add_to_restocking').trigger('click');
						}
					})
				;
				$('.add_to_retrieval').on('click', function() {
					var item_id = $(this).data('item_id');
					var quantity = Number($('#retrieval_item_quantity'+item_id).val());
					var original_stock = Number($('#original_stock'+item_id).val());

					$('.retrieval_item_remover').off('dblclick');
					if (quantity != '' && quantity != 0) {
						if (!retrieval_cart_indexer.includes(item_id)) {
							// !EXISTS IN CART
							var current_quantity = $('#retrieval_quantity'+item_id).html();
							for (x = retrieval_cart_array.length - 1; x >= 0; x--) {
								if (retrieval_cart_array[x][0] == item_id) {
									retrieval_cart_array[x][3] = parseInt(quantity, 10);
								}
							}
							retrieval_cart_indexer.push(item_id);

							var item_name = $('#retrieval_item_quantity'+item_id).data('item_name');
							var item_unit = $('#retrieval_item_quantity'+item_id).data('item_unit');
							var item_code = $('#retrieval_item_quantity'+item_id).data('item_code');
							var item_price = $('#retrieval_item_quantity'+item_id).data('item_price');
							var original_unit = item_unit;
							if (quantity > 1) {
								unit_last = item_unit[item_unit.length-1].toLowerCase();
						        if (unit_last == 's' || unit_last == 'sh' || unit_last == 'ch' || unit_last == 'x' || unit_last == 'z') {
						        	item_unit = item_unit+'es';
						        }
						        else {
						        	item_unit = item_unit+'s';
						        }	
							}

							item_row = `
								<div class="item" id="retrieval_item`+item_id+`">
								    <div class="right floated content">
								    	<div class="ui right pointing dropdown cart_item_dropdown pointered compact">
						  					<button class="compact mini ui basic grey button"><x id="retrieval_quantity`+item_id+`">`+quantity+`</x> `+item_unit+`
						  					</button>
							  				<div class="ui mini menu">
											    <div class="fitted item retrieval_item_remover" data-item_id="`+item_id+`">
					        						<i class="close icon orange"></i>
											    	Remove
											    </div>
											</div>
								    	</div>
								    </div>
								    <div class="middle aligned content">
								      	<a class="ui small header black">
								      		`+item_name+`
											<div class="ui tiny blue compact label horizontal">
								        		`+item_code+` (`+category_acronym+`)
								      		</div>
							        	</a>
							        	<div class="meta">
											₱`+Number(item_price).toFixed(2)+` per `+original_unit+`
							      		</div>
								    </div>
							  	</div>
							`;
							$('#retrieval_items_container').append(item_row);
							$('.cart_item_dropdown')
							  	.dropdown({
							  		action: 'nothing',
							  		direction: 'upward',
							  		transition: 'drop'
							  	})
							;
							$('.retrieval_item_remover').on('dblclick', function() {

								var item_id = $(this).data('item_id');
								var retrieval_quantity = Number($('#retrieval_quantity'+item_id).html());
								var original_stock = Number($('#original_stock'+item_id).val());
								var new_quantity = original_stock+retrieval_quantity;
								
								for (x = retrieval_cart_array.length - 1; x >= 0; x--) {
									if (retrieval_cart_array[x][0] == item_id) {
										cart_item_amount = parseInt(retrieval_cart_array[x][3]);

										retrieval_cart_array[x][3] = 0;
									}
								}
								retrieval_cart_indexer.splice(retrieval_cart_indexer.indexOf(item_id), 1);

								$('#stock'+item_id).html(new_quantity);
								$('#original_stock'+item_id).val(new_quantity);
								$('#retrieval_item'+item_id)
								 	.transition({
								 		animation: 'drop',
								 		onComplete: function(){
								 			$(this).remove();
						 					if (retrieval_cart_indexer.length == 0) {
							 					$('#retrieval_empty_placeholder').removeClass('invisible');
								 			}
								 		}
								 	})
								;
								box_color = box_painter(new_quantity);
								$('#box'+item_id)
									.attr('class', 'box '+box_color+ ' link icon')
									.transition({
								 		animation: 'bounce',
								 		onComplete: function() {
											$('#retrieval_basket_activator')
												.transition('jiggle')
											; 			
								 		}
								 	})
								;
							})
							var current_stock = Number($('#stock'+item_id).html());
							$('#original_stock'+item_id).val(current_stock);
							$('#retrieval_item_quantity'+item_id).val('');
							$('.item_dropdown').dropdown('hide');
						}
						else {
							// EXISTS IN CART
							var current_quantity = Number($('#retrieval_quantity'+item_id).html());
							new_quantity = current_quantity+quantity;
							$('#retrieval_quantity'+item_id).html(new_quantity);

							for (x = retrieval_cart_array.length - 1; x >= 0; x--) {
								if (retrieval_cart_array[x][0] == item_id) {
									current_amount = retrieval_cart_array[x][3];
								}
							}
							for (x = retrieval_cart_array.length - 1; x >= 0; x--) {
								if (retrieval_cart_array[x][0] == item_id) {
									retrieval_cart_array[x][3] = parseInt(new_quantity, 10);
								}
							}

						}
	 					$('#retrieval_empty_placeholder').addClass('invisible');
						$(this).closest('.outer_item_dropdown').dropdown('hide');
						$('#box'+item_id)
						 	.transition({
						 		animation: 'jiggle',
						 		onComplete: function() {
									$('#retrieval_basket_activator')
										.transition('bounce')
									; 			
						 		}
						 	})
						;
					}
					console.log(retrieval_cart_indexer);
					console.log(retrieval_cart_array);
				})
				$('.add_to_restocking').on('click', function() {
					var item_id = $(this).data('item_id');
					var quantity = $('#restocking_item_quantity'+item_id).val();
					var item_price = $('#restocking_item_price'+item_id).val();
					var original_stock = Number($('#original_stock'+item_id).val());
					
					$(this).closest('.outer_item_dropdown').dropdown('hide');
					$('#box'+item_id)
					 	.transition({
					 		animation: 'jiggle',
					 		onComplete: function() {
								$('#restocking_cart_activator')
									.transition('bounce')
								; 			
					 		}
					 	})
					;
					$('.restocking_item_remover').off('dblclick');
					if (quantity != '' && quantity != 0) {
						var item_name = $('#restocking_item_quantity'+item_id).data('item_name');
						var item_unit = $('#restocking_item_quantity'+item_id).data('item_unit');
						var item_code = $('#restocking_item_quantity'+item_id).data('item_code');
						var original_unit = item_unit;
						
						if (quantity > 1) {
							unit_last = item_unit[item_unit.length-1].toLowerCase();
					        if (unit_last == 's' || unit_last == 'sh' || unit_last == 'ch' || unit_last == 'x' || unit_last == 'z') {
					        	item_unit = item_unit+'es';
					        }
					        else {
					        	item_unit = item_unit+'s';
					        }	
						}

						item_row = `
							<div class="item" id="restocking_item`+item_id+`">
								    <div class="right floated content">
								    	<div class="ui right pointing dropdown cart_item_dropdown pointered compact">
						  					<div class="compact mini ui basic grey button"><x id="restocking_quantity`+item_id+`">`+quantity+`</x> `+item_unit+`
						  					</div>
							  				<div class="ui mini menu">
											    <div class="fitted item restocking_item_remover" data-item_id="`+item_id+`">
					        						<i class="close icon orange"></i>
											    	Remove
											    </div>
											</div>
								    	</div>
								    </div>
								    <div class="middle aligned content">
								      	<a class="ui small header black">
								      		`+item_name+`
											<div class="ui tiny teal compact label horizontal">
								        		`+item_code+` (`+category_acronym+`)
								      		</div>
							        	</a>
							        	<div class="meta">
											₱`+Number(item_price).toFixed(2)+` per `+original_unit+`
							      		</div>
								    </div>
							  	</div>
						`;
						$('#restocking_items_container').append(item_row);
						$('.cart_item_dropdown')
						  	.dropdown({
						  		action: 'nothing',
						  		direction: 'upward',
						  		transition: 'drop'
						  	})
						;
						$('restocking_empty_placeholder').addClass('invisible');
						$('.restocking_item_remover').on('dblclick', function() {
							var item_id = $(this).data('item_id');
							var restocking_quantity = $('#restocking_quantity'+item_id).html();
							var original_stock = $('#original_stock'+item_id).val();
							
							restocking_cart_indexer.splice(restocking_cart_indexer.indexOf(item_id), 1);
							restocking_cart_array[item_id][3] = 0;

							var new_quantity = original_stock-restocking_quantity;

							box_color = box_painter(new_quantity);
							$('#box'+item_id).attr('class', 'box '+box_color+ ' link icon');
							
							$('#stock'+item_id).html(new_quantity);
							$('#original_stock'+item_id).val(new_quantity);
							$('#restocking_item'+item_id)
							 	.transition({
							 		animation: 'drop',
							 		onComplete: function(){
							 			$(this).remove();
							 			if (restocking_cart_indexer.length == 0) {
							 				$('#restocking_empty_placeholder').removeClass('invisible');
							 			}
							 		}
							 	})
							;
						})
						var current_stock = Number($('#stock'+item_id).html());
						$('#original_stock'+item_id).val(current_stock);
						$('#restocking_item_quantity'+item_id).val('');
						$('.item_dropdown').dropdown('hide');
					}
				})
				
				load_inventory_registered_users();
			}
		})
	}
	$.fn.cardSelected = function () {
		selected_card_id = $(this).data('item_id');
		selected_card_count = $(this).data('card_count');
		
		$('.card').removeClass('olive');
		$('.card').removeClass('raised');
		$(this).addClass('olive');
		$(this).addClass('raised');

		$(document)
			.off('keydown')
			.on('keydown', function(event) {
				var key = event.which;
				if (key == 38) {
					// UP
					$(this).cardNavUp();
				}
				if (key == 40) {
					// DOWN
					$(this).cardNavDown();
				}
				if (key == 37) {
					// LEFT
					$(this).cardNavLeft();
				}
				if (key == 39) {
					// RIGHT
					$(this).cardNavRight();
				}
				if (key == 13) {
					// ENTER
					$('#box'+selected_card_id).trigger('click');
				}
				if (key == 27) {
					// ESCAPE
					$('.outer_item_dropdown').dropdown('hide');
				}
			})
		;
	}
	$.fn.cardNavUp = function (event) {
		card_selector = selected_card_count-5;
		if (card_selector < 0) {
			card_selector = max_card_count;
		}

		target_id = $('.card[data-card_count="'+card_selector+'"]').attr('id');
		item_id = $('#'+target_id).data('item_id');
		target_page = $('#'+target_id).data('box_number');

		if (target_page == undefined) {
			target_page = page_count;
		}

		if (current_page != target_page) {
			$('#main_inventory_page'+current_page).addClass('invisible');
			current_page = target_page;
    		$('#inventory_navigation_center').html(current_page);
    		$('#main_inventory_page'+current_page).removeClass('invisible');
		}
		$('#item'+item_id).trigger('focus');

		$('#'+target_id).cardSelected();
	}
	$.fn.cardNavDown = function () {
		card_selector = selected_card_count+5;

		if (card_selector > max_card_count) {
			card_selector = 0;
		}

		target_id = $('.card[data-card_count="'+card_selector+'"]').attr('id');
		item_id = $('#'+target_id).data('item_id');
		target_page = $('#'+target_id).data('box_number');

		if (target_page == undefined) {
			target_page = 1;
		}

		if (current_page != target_page) {
			$('#main_inventory_page'+current_page).addClass('invisible');
			current_page = target_page;
    		$('#inventory_navigation_center').html(current_page);
    		$('#main_inventory_page'+current_page).removeClass('invisible');
		}
		$('#item'+item_id).trigger('focus');

		$('#'+target_id).cardSelected();
	}
	$.fn.cardNavLeft = function () {
		card_selector = selected_card_count-1;
		if (card_selector < 0) {
			card_selector = max_card_count;
		}

		target_id = $('.card[data-card_count="'+card_selector+'"]').attr('id');
		item_id = $('#'+target_id).data('item_id');
		target_page = $('#'+target_id).data('box_number');

		if (target_page == undefined) {
			target_page = page_count;
		}

		if (current_page != target_page) {
			$('#main_inventory_page'+current_page).addClass('invisible');
			current_page = target_page;
    		$('#inventory_navigation_center').html(current_page);
    		$('#main_inventory_page'+current_page).removeClass('invisible');
		}
		$('#item'+item_id).trigger('focus');

		$('#'+target_id).cardSelected();
	}
	$.fn.cardNavRight = function () {
		card_selector = selected_card_count+1;
		if (card_selector > max_card_count) {
			card_selector = 0;
		}
		
		target_id = $('.card[data-card_count="'+card_selector+'"]').attr('id');
		item_id = $('#'+target_id).data('item_id');
		target_page = $('#'+target_id).data('box_number');

		if (target_page == undefined) {
			target_page = 1;
		}

		if (current_page != target_page) {
			$('#main_inventory_page'+current_page).addClass('invisible');
			current_page = target_page;
    		$('#inventory_navigation_center').html(current_page);
    		$('#main_inventory_page'+current_page).removeClass('invisible');
		}
		$('#item'+item_id).trigger('focus');

		$('#'+target_id).cardSelected();
	}
	$.fn.openItem = function () {

	}
	function box_painter(current_stock) {
		if (current_stock > 50) {
        	box_color = 'green';
        }
        else if (current_stock >= 21 && current_stock <= 50) {
        	box_color = 'olive';
        }
        else if (current_stock >= 11 && current_stock <= 20) {
        	box_color = 'yellow';
        }
        else if (current_stock <= 10 && current_stock != 0) {
        	box_color = 'orange';
        }
        else if (current_stock == 0) {
        	box_color = 'red';
        }
        return box_color;
	}
	function load_inventory_registered_users() {
	    var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_inventory_registered_users");
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$('#requestor_drop_menu').html('');
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

					full_name = first_name+' '+middle_name[0]+'. '+last_name

					if (suffix != '') {
						full_name += ' '+suffix+'.';
					}
					
					options = `
						<div class="item requestor_option" data-value="`+user_id+`" data-user_id="`+user_id+`" data-image="`+image+`" data-full_name="`+full_name+`" data-position="`+position+`">
							<div class="ui avatar image image_container">
								<img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="center middle aligned flowing_image image bordered">
							</div>
							<span>`+full_name+`</span>
						</div>
					`;
					
					$('#requestor_drop_menu').append(options);
				})
				$('#requestor_drop')
					.dropdown({
						onChange: function() {
							var input_value = $('#requestor_id').val();
							var input_text = $('#requestor_drop').dropdown('get text');
						}
					})
				;
			}
			load_ris_codes();
		});
	}
	function load_ris_codes() {
	    var ajax = $.ajax("<?php echo base_url();?>i.php/sims_control/load_ris_codes");
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				$('#ris_drop_menu').html('');
				$.each(response_data, function(key, value) {
					var requisition_id = value.requisition_id;
					var reference_code = value.reference_code;

					options = `
						<div class="item ris_option" data-value="`+requisition_id+`" data-requisition_id="`+requisition_id+`" data-reference_code="`+reference_code+`">
							<span>`+reference_code+`</span>
						</div>
					`;
					
					$('#ris_drop_menu').append(options);
				})
			}
			$('#ris_drop')
				.dropdown({
					onChange: function() {
						var input_value = $('#ris_reference_code').val();
						var input_text = $('#ris_drop').dropdown('get text');
						$('#ris_name_holder').html(input_text.trim());
					}
				})
			;
			load_restocking_codes();
		})
	}
	function load_restocking_codes() {
	    var ajax = $.ajax("<?php echo base_url();?>i.php/sims_control/load_restocking_codes");
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
				restocking_codes = [];

				$('#restocking_drop_menu').html('');
				$.each(response_data, function(key, value) {
					var restocking_id = value.restocking_id;
					var restocking_code = value.restocking_code;

					options = `
						<div class="item restocking_option" data-value="`+restocking_id+`" data-restocking_id="`+restocking_id+`" data-restocking_code="`+restocking_code+`">
							<span>`+restocking_code+`</span>
						</div>
					`;
					
					$('#restocking_drop_menu').append(options);

		      		restocking_codes.push({id:restocking_id,title:restocking_code});
				})
				$('#restocking_drop')
					.dropdown({
						onChange: function() {
							var input_value = $('#restocking_reference_code').val();
							var input_text = $('#restocking_drop').dropdown('get text');
							$('#restocking_name_holder').html(input_text.trim());
						},
						allowAdditions: true
					})
				;
			}
			$('#restocking_reference_code_field')
				.search({
					source: restocking_codes,
					fullTextSearch: 'exact',
					maxResults: 100,
					minCharacters: 2,
					onSelect: function(result, response) {
						restocking_id = result.id;
						restocking_code = result.title;
					}
				})
			;
			input_fields = `
				<input type="text" value="" placeholder="Restocking Code" name="restocking_reference_code" id="restocking_reference_code">
			`;
			// $('#restocking_reference_code_field').append(input_fields);
			loading_stop();
		})
	}
	$('.retrieval_tab_toggle').on('click', function () {
		retrieval_cart_type = $(this).data('tab');
	});
	function retrieval_checkout() {
		if (retrieval_cart_type == 'first') {
			var ajax = $.ajax({
				method: 'POST',
				url   : '<?php echo base_url();?>i.php/sims_control/retrieval_checkout',
				data  : {
					grid_update_array: JSON.stringify(grid_update_array),
					restocking_cart_array: JSON.stringify(retrieval_cart_array),
					restocking_cart_indexer: JSON.stringify(restocking_cart_indexer),
					requestor_name: $('#requestor_id').val(),
					request_purpose: $('#request_purpose').val(),
					restock_date: $('#request_date').val()
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
				if (response_data == 'success') {
					icon = 'check green';
					header = 'Requisition Successful';
					message = items_count+' items retrieved successfully.';
					duration = 25000;
					load_notification(icon, header, message, duration);
				}
				else if (response_data == 'failed') {
					icon = 'x red';
					header = 'Requisition Failed';
					message = 'Supplies Requisition failed. Please try again.';
					duration = 25000;
					load_notification(icon, header, message, duration);
				}
			})	
		}
		else if (retrieval_cart_type == 'second') {
			var ajax = $.ajax({
				method: 'POST',
				url   : '<?php echo base_url();?>i.php/sims_control/retrieval_checkout',
				data  : {
					grid_update_array: JSON.stringify(grid_update_array),
					restocking_cart_array: JSON.stringify(retrieval_cart_array),
					restocking_cart_indexer: JSON.stringify(restocking_cart_indexer),
					requestor_name: $('#requestor_id').val(),
					request_purpose: $('#request_purpose').val(),
					restock_date: $('#request_date').val()
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
				if (response_data == 'success') {
					icon = 'check green';
					header = 'Requisition Successful';
					message = items_count+' items retrieved successfully.';
					duration = 25000;
					load_notification(icon, header, message, duration);
				}
				else if (response_data == 'failed') {
					icon = 'x red';
					header = 'Requisition Failed';
					message = 'Supplies Requisition failed. Please try again.';
					duration = 25000;
					load_notification(icon, header, message, duration);
				}
			})
		}
	}
	function restocking_checkout() {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sims_control/restocking_checkout',
			data  : {
				grid_update_array: JSON.stringify(grid_update_array),
				restocking_cart_array: JSON.stringify(restocking_cart_array),
				restocking_cart_indexer: JSON.stringify(restocking_cart_indexer),
				restocking_code: $('#restocking_reference_code').val(),
				restock_date: $('#restock_date').val()
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
			if (response_data == 'success') {
				icon = 'check green';
				header = 'Inventory Restock Successful';
				message = items_count+' items restocked successfully.';
				duration = 25000;
				load_notification(icon, header, message, duration);
			}
			else if (response_data == 'duplicate') {
				icon = 'check green';
				header = 'Inventory Restock Successful';
				message = items_count+' items successfully added to existing reference code '+reference_code+'.';
				duration = 25000;
				load_notification(icon, header, message, duration);
			}
			else {
				icon = 'x red';
				header = 'Inventory Restock Failed';
				message = 'Failed to save restocking data into the database. Please try again.';
				duration = 25000;
				load_notification(icon, header, message, duration);
			}
		})
	}	
	$('#stocks_toggle')
		.on('click', function() {
			var checked = $(this).is(':checked');
			if (checked) {
				$('.stocks_holder').removeClass('invisible');
			}
			else {
				$('.stocks_holder').addClass('invisible');
			}
		})
	;
	$('#report_date')
		.on('change', function() {
			load_inventory_rsmi_data();
		})
	;
	function load_inventory_rsmi_data() {
       	$('#inventory_reports_container').html('');
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sims_control/load_inventory_rsmi_data',
			data  : {
				report_date: $('#report_date').val(),
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
				$('#rsmi_empty_placeholder').addClass('invisible');
				$.each(response_data, function(key, value) {
			        var view_status = value.view_status;
					var reference_id = value.reference_id;
					var reference_code = value.reference_code;
					var requestor_id = value.requestor_id;
					var reference_name = value.reference_name;
					var purpose = value.purpose;
					var reference_date = value.reference_date;
					var reference_code_array = value.reference_code_array;

					if (reference_name == '') {
						reference_name = 'Supply Officer'
					}
					if (purpose == '') {
						purpose = 'Inventory Restocking'
					}

					if (reference_code.includes('RF')) {
						rsmi_data = `
							<div class="item ris_view_activator" id="ris`+reference_id+`" data-reference_id="`+reference_id+`" data-reference_code="`+reference_code+`" data-purpose="`+purpose+`" data-reference_name="`+reference_name+`" data-reference_date="`+reference_date+`" data-ris_type="requisition">
					  			<div class="right floated content middle">
						  			<div class="ui top pointing dropdown cart_item_dropdown pointered">
						  				<div class="ui tiny basic grey compact label" id="reference_code`+reference_id+`">`+reference_date+`
					  					</div>
						  				<div class="menu">
										    <div class="item retrieval_item_remover" data-reference_id="`+reference_id+`">
				        						<i class="close icon orange large"></i>
										    	Remove
										    </div>
										</div>
							    	</div>
						    	</div>
				        		<i class="shopping basket icon blue link middle aligned"></i>
				        		<div class="content">
						      		<div class="ui header tiny blue">`+reference_code+`</div>
						      		<div class="meta">`+reference_name.UCwords()+`</div>
						    	</div>	
						  	</div>
						`;
					}
					else {
						rsmi_data = `
							<div class="item ris_view_activator" id="ris`+reference_id+`" data-reference_id="`+reference_id+`" data-reference_code="`+reference_code+`" data-purpose="`+purpose+`" data-reference_name="`+reference_name+`" data-reference_date="`+reference_date+`" data-ris_type="restocking">
					  			<div class="right floated content middle">
						  			<div class="ui top pointing dropdown cart_item_dropdown pointered">
						  				<div class="ui tiny basic grey compact label" id="reference_code`+reference_id+`">`+reference_date+`
					  					</div>
						  				<div class="menu">
										    <div class="item retrieval_item_remover" data-reference_id="`+reference_id+`">
				        						<i class="close icon orange large"></i>
										    	Remove
										    </div>
										</div>
							    	</div>
						    	</div>
				        		<i class="dolly icon teal link middle aligned"></i>
				        		<div class="content">
						      		<div class="ui header tiny teal">`+reference_code+`</div>
						      		<div class="meta">Supply Officer</div>
						    	</div>	
						  	</div>
						`;
					}
			       	$('#inventory_reports_container').append(rsmi_data);
			    })
			    $('.ris_view_activator')
			    	.off()
		       		.on('click', function() {
		       			var reference_id = $(this).data('reference_id');
		       			var reference_code = $(this).data('reference_code');
		       			var purpose = $(this).data('purpose');
		       			var reference_name = $(this).data('reference_name');
		       			var reference_date = $(this).data('reference_date');
		       			var ris_type = $(this).data('ris_type');

		       			$('#ris_reference_name').val(reference_name);
		       			$('#ris_reference_date').val(reference_date);
		       			$('#ris_purpose').val(purpose);

		       			load_ris_data(reference_id, ris_type);
		       		})
		       	;
			    loading_stop();
			    setTimeout(function() {
			    	$('#inventory_reports_modal')
				        .modal('setting', 'closable', false)
				        .modal('setting', 'blurring', true)
				        .modal('setting', 'allowMultiple', false)
				        .modal('setting', 'autofocus', false)
						.modal('setting', 'useFlex', false)
				        .modal('show')
				    ;	
			    }, 1150)
			}
			else {
				$('#rsmi_empty_placeholder').removeClass('invisible');
			}
		})
	}
	function load_ris_data(reference_id, ris_type) {
		$('#ris_view_container').empty();
		$('#ris_view_modal').modal('hide');
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sims_control/load_ris_data',
			data  : {
				reference_id: reference_id,
				ris_type: ris_type
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
					var reference_items_id = value.reference_items_id;
					var reference_id = value.reference_id;
					var reference_code = value.reference_code;
					var item_code = value.item_code;
					var item_unit = value.item_unit;
					var item_price = value.item_price;
					var item_name = value.item_name;
					var quantity = value.quantity;
					var category_name = value.category_name;
					var category_acronym = category_name.match(/[A-Z]/g).join('');
					var original_unit = item_unit;
					
					if (quantity > 1) {
						unit_last = item_unit[item_unit.length-1].toLowerCase();
				        if (unit_last == 's' || unit_last == 'sh' || unit_last == 'ch' || unit_last == 'x' || unit_last == 'z') {
				        	item_unit = item_unit+'es';
				        }
				        else {
				        	item_unit = item_unit+'s';
				        }	
					}

					if (reference_code.includes('RF')) {
		       			var icon_element = '<i class="shopping basket icon blue link"></i>';
		       			class_color = 'blue';
						$('#ris_view_main_header').removeClass('teal');
					}
					else {
		       			var icon_element = '<i class="dolly icon teal link"></i>';
		       			class_color = 'teal';
						$('#ris_view_main_header').removeClass('blue');
					}
					
					$('#ris_view_main_header').addClass(class_color);
					$('#ris_view_main_header').html(icon_element);
       				$('#ris_view_main_header').append(reference_code);
					
					ris_data = `
						<div class="item" id="ris_item`+reference_items_id+`" data-reference_items_id="`+reference_items_id+`">
						    <div class="right floated content">
						    	<div class="ui right pointing dropdown cart_item_dropdown pointered compact">
				  					<div class="compact mini ui basic grey button"><x id="ris_quantity`+reference_items_id+`">`+quantity+`</x> `+item_unit+`
				  					</div>
					  				<div class="ui mini menu">
									    <div class="fitted item ris_item_remover" data-reference_items_id="`+reference_items_id+`">
			        						<i class="close icon orange"></i>
									    	Remove
									    </div>
									</div>
						    	</div>
						    </div>
						    <div class="middle aligned content">
						      	<div class="ui tiny header `+class_color+`">
						      		`+item_name+`
									<div class="ui tiny compact label horizontal">
						        		`+item_code+` (`+category_acronym+`)
						      		</div>
					        	</div>
					        	<div class="meta">
									₱`+Number(item_price).toFixed(2)+` per `+original_unit+`
					      		</div>
						    </div>
					  	</div>
					`;

					$('#ris_view_container').append(ris_data);
				})
				$('#ris_view_modal')
					.modal('setting', 'useFlex', false)
					.modal('setting', 'allowMultiple', true)
	        		.modal('setting', 'autofocus', false)
	        		.modal('setting', 'blurring', true)
					.modal('setting', 'closeable', true)
					.modal('show')
				;
			}
		})
	}

	function initialize_report_load(report_type) {
		if (report_type == 'rsmi') {
			report_url = '<?php echo base_url();?>i.php/sims_control/initialize_rsmi_switch';
		}
		else if (report_type == 'rpci') {
			report_url = '<?php echo base_url();?>i.php/sims_control/initialize_rpci_switch';
		}
		var ajax = $.ajax({
			method: 'POST',
			url   : report_url,
			data  : {
				report_date: $('#report_date').val(),
				report_category: $('#report_category').val()
			}
		});
		var jqxhr = ajax
		.done(function() {

		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
			setTimeout(function() {
				if (report_type == 'rsmi') {
		            window.open("<?php echo base_url();?>i.php/sims_control/rsmi_issuance_report", "_blank");
	    	    }
	    	    else if (report_type == 'rpci') {
		            window.open("<?php echo base_url();?>i.php/sims_control/rpci_report", "_blank");
	    	    }
	    	    loading_stop();
	    	    $('#inventory_reports_modal')
			        .modal('setting', 'closable', false)
			        .modal('setting', 'blurring', true)
			        .modal('setting', 'allowMultiple', false)
			        .modal('setting', 'autofocus', false)
					.modal('setting', 'useFlex', false)
			        .modal('show')
			    ;
			}, 2000)
		})
	}
	$('#rsmi_activator').on('dblclick', function() {
    	loading_start('Loading RSMI');
		initialize_report_load('rsmi');
	});
	$('#rpci_activator').on('dblclick', function() {
    	loading_start('Loading RPCI');
		initialize_report_load('rpci');
	});
</script>

<!-- inventory_card = `
	<div class="card">
		<div class="content">
			<a class="ui header tiny">`+item_name+`</a>
			<div class="meta">`+item_description+`</div>
		</div>
		<div class="ui instant slide masked reveal content">
			<div class="visible content">
				<div class="ui basic segment center aligned">
					<h1>`+category_acronym+`</h1>
				</div>	
			</div>
			<div class="hidden content">
				<div class="ui basic segment">
				  	<div class="field">
						<div class="ui left action input mini fluid">
							<div class="ui animated button basic mini">
								<div class="hidden content"><small>Quantity</small></div>
								<div class="visible content">
									<i class="right times icon large"></i>
								</div>
							</div>
							<input type="tel" value="" placeholder="Quantity" name="quantity`+item_id+`" id="quantity`+item_id+`">
						</div>
				  	</div>	
				</div>
			</div>
		</div>
		<div class="extra content">
			<a>
			<i class="box `+box_color+` icon"></i>
			`+stock_amount+` `+unit_display+`
		 	</a>
		</div>
	</div>
`; --> 