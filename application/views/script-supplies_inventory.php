<script type="text/javascript">
	// $( document ).ready(function() {
	// 	var GASACAO = "https://docs.google.com/spreadsheets/d/1K_sDhlDhrBwf47vo8j1yYiXHpPCBZadCuJfWt2tYTC0/edit?usp=sharing";
	// 	var POBLETE = "https://docs.google.com/spreadsheets/d/1L9eWF4ozPcB0XJN23UC5v1hXs2UUhSyCPv2lgxsTTCY/edit?usp=sharing";
	// 	var GABRAL = "https://docs.google.com/spreadsheets/d/1QkiOpP_Ez85ZzjmCD5e119vx7loWf5KY5El0dDR0dCU/edit?usp=sharing";
	// 	var NAZA = "https://docs.google.com/spreadsheets/d/1RmzKte_COZLXsb-AuAJa3nqOkfH-GAp5Qn98rsmkTsI/edit?usp=sharing";
	// 	var BALDONADO = "https://docs.google.com/spreadsheets/d/1NQHx_AS6gPXSUYyaLe7PM_TGTxN1uMwiP5DzPUhvXz0/edit?usp=sharing";
	// 	var LOBO = "https://docs.google.com/spreadsheets/d/1bHCtl3S-tIayFZBhrnDTpW520rxJk49aYWt7-FFpCUI/edit?usp=sharing";
	// 	var OYONOYON = "https://docs.google.com/spreadsheets/d/1sHZz55Q9GUcjtR7yb2VqU6VwFbNisE0alI7ebN9W7DA/edit?usp=sharing";
	// 	var TORDA = "https://docs.google.com/spreadsheets/d/1IUDdItS6LTze027Rwz7ZmQQoamXRGjSR1ps6zpCEw0M/edit?usp=sharing";

	// 	text1to15 = '';
	// 	text16to31 = '';
	// 	input_monitor1 = '';
	// 	input_monitor2 = '';
	// 	attendance1 = '';
	// 	attendance2 = '';
	// 	consolidated = '';
	// 	report_monthdays = '';
	// 	period1 = 'MAR. 01-15';
	// 	period2 = 'MAR. 16-31';
	// 	cell = 'B';
	// 	cell1 = 'B';
	// 	cell2start = 'C';
	// 	cell2end = 'R';
	// 	cell3 = 'S';
	// 	for (var i = 15; i <= 29; i++) {
	// 		text1to15 += `=SUM(IMPORTRANGE("`+GASACAO+`", "`+period1+`!`+cell+i+`"), IMPORTRANGE("`+POBLETE+`", "`+period1+`!`+cell+i+`"), IMPORTRANGE("`+GABRAL+`", "`+period1+`!`+cell+i+`"), IMPORTRANGE("`+NAZA+`", "`+period1+`!`+cell+i+`"), IMPORTRANGE("`+BALDONADO+`", "`+period1+`!`+cell+i+`"), IMPORTRANGE("`+LOBO+`", "`+period1+`!`+cell+i+`"), IMPORTRANGE("`+OYONOYON+`", "`+period1+`!`+cell+i+`"), IMPORTRANGE("`+TORDA+`", "`+period1+`!`+cell+i+`"))\n`;
			
	// 		input_monitor1 += `=CONCATENATE(IF(AND(IF(ISBLANK(IMPORTRANGE("`+GASACAO+`", "`+period1+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+GASACAO+`", "`+period1+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+GASACAO+`", "`+period1+`!`+cell3+i+`")), TRUE, FALSE)), "GASACAO, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+POBLETE+`", "`+period1+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+POBLETE+`", "`+period1+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+POBLETE+`", "`+period1+`!`+cell3+i+`")), TRUE, FALSE)), "POBLETE, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+GABRAL+`", "`+period1+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+GABRAL+`", "`+period1+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+GABRAL+`", "`+period1+`!`+cell3+i+`")), TRUE, FALSE)), "GABRAL, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+NAZA+`", "`+period1+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+NAZA+`", "`+period1+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+NAZA+`", "`+period1+`!`+cell3+i+`")), TRUE, FALSE)), "NAZA, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+BALDONADO+`", "`+period1+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+BALDONADO+`", "`+period1+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+BALDONADO+`", "`+period1+`!`+cell3+i+`")), TRUE, FALSE)), "BALDONADO, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+LOBO+`", "`+period1+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+LOBO+`", "`+period1+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+LOBO+`", "`+period1+`!`+cell3+i+`")), TRUE, FALSE)), "LOBO, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+OYONOYON+`", "`+period1+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+OYONOYON+`", "`+period1+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+OYONOYON+`", "`+period1+`!`+cell3+i+`")), TRUE, FALSE)), "OYONOYON, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+TORDA+`", "`+period1+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+TORDA+`", "`+period1+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+TORDA+`", "`+period1+`!`+cell3+i+`")), TRUE, FALSE)), "TORDA, ", ""))\n`;

	// 		attendance1 += `=SUM(IF(NOT(ISBLANK(IMPORTRANGE("`+GASACAO+`", "`+period1+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+POBLETE+`", "`+period1+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+GABRAL+`", "`+period1+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+NAZA+`", "`+period1+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+BALDONADO+`", "`+period1+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+LOBO+`", "`+period1+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+OYONOYON+`", "`+period1+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+TORDA+`", "`+period1+`!`+cell+i+`"))), 1, 0))\n`;
	// 	}
	// 	for (var i = 14; i <= 29; i++) {
	// 		text16to31 += `=SUM(IMPORTRANGE("`+GASACAO+`", "`+period2+`!`+cell+i+`"), IMPORTRANGE("`+POBLETE+`", "`+period2+`!`+cell+i+`"), IMPORTRANGE("`+GABRAL+`", "`+period2+`!`+cell+i+`"), IMPORTRANGE("`+NAZA+`", "`+period2+`!`+cell+i+`"), IMPORTRANGE("`+BALDONADO+`", "`+period2+`!`+cell+i+`"), IMPORTRANGE("`+LOBO+`", "`+period2+`!`+cell+i+`"), IMPORTRANGE("`+OYONOYON+`", "`+period2+`!`+cell+i+`"), IMPORTRANGE("`+TORDA+`", "`+period2+`!`+cell+i+`"))\n`;

	// 		input_monitor2 += `=CONCATENATE(IF(AND(IF(ISBLANK(IMPORTRANGE("`+GASACAO+`", "`+period2+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+GASACAO+`", "`+period2+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+GASACAO+`", "`+period2+`!`+cell3+i+`")), TRUE, FALSE)), "GASACAO, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+POBLETE+`", "`+period2+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+POBLETE+`", "`+period2+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+POBLETE+`", "`+period2+`!`+cell3+i+`")), TRUE, FALSE)), "POBLETE, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+GABRAL+`", "`+period2+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+GABRAL+`", "`+period2+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+GABRAL+`", "`+period2+`!`+cell3+i+`")), TRUE, FALSE)), "GABRAL, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+NAZA+`", "`+period2+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+NAZA+`", "`+period2+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+NAZA+`", "`+period2+`!`+cell3+i+`")), TRUE, FALSE)), "NAZA, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+BALDONADO+`", "`+period2+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+BALDONADO+`", "`+period2+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+BALDONADO+`", "`+period2+`!`+cell3+i+`")), TRUE, FALSE)), "BALDONADO, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+LOBO+`", "`+period2+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+LOBO+`", "`+period2+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+LOBO+`", "`+period2+`!`+cell3+i+`")), TRUE, FALSE)), "LOBO, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+OYONOYON+`", "`+period2+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+OYONOYON+`", "`+period2+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+OYONOYON+`", "`+period2+`!`+cell3+i+`")), TRUE, FALSE)), "OYONOYON, ", ""), IF(AND(IF(ISBLANK(IMPORTRANGE("`+TORDA+`", "`+period2+`!`+cell1+i+`")), TRUE, FALSE), IF(SUM(IMPORTRANGE("`+TORDA+`", "`+period2+`!`+cell2start+i+`:`+cell2end+i+`"))=0, TRUE, FALSE), IF(ISBLANK(IMPORTRANGE("`+TORDA+`", "`+period2+`!`+cell3+i+`")), TRUE, FALSE)), "TORDA, ", ""))\n`;

	// 		attendance2 += `=SUM(IF(NOT(ISBLANK(IMPORTRANGE("`+GASACAO+`", "`+period2+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+POBLETE+`", "`+period2+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+GABRAL+`", "`+period2+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+NAZA+`", "`+period2+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+BALDONADO+`", "`+period2+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+LOBO+`", "`+period2+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+OYONOYON+`", "`+period2+`!`+cell+i+`"))), 1, 0), IF(NOT(ISBLANK(IMPORTRANGE("`+TORDA+`", "`+period2+`!`+cell+i+`"))), 1, 0))\n`;
	// 	}
			
	// 	for (var i = 3; i <= 31; i++) {
	// 		consolidated += `=SUM(IMPORTRANGE("https://docs.google.com/spreadsheets/d/1xn5qkgNJRJTTT0Os3LA7BUX_e1_yisvNFCzlXOSJPtQ/edit?usp=sharing", "Nov. 2024!`+cell+i+`"), IMPORTRANGE("https://docs.google.com/spreadsheets/d/1xn5qkgNJRJTTT0Os3LA7BUX_e1_yisvNFCzlXOSJPtQ/edit?usp=sharing", "Dec. 2024!`+cell+i+`"))\n`;
	// 	}
	// 	rmonth = '03';
	// 	for (var i = 1; i <= 31; i++) {
	// 		report_monthdays += rmonth+`/`+String(i).padStart(2, "0")+`\n`;
	// 		// report_monthdays += rmonth+`/`+String(i).padStart(2, "0")+"/2024"+`\n`;
	// 	}
	// 	// console.log(report_monthdays)
	// 	// console.log(text1to15+text16to31)
	// 	// console.log(input_monitor1+input_monitor2)
	// 	console.log(attendance1+attendance2)
	// });



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

	var day = '';
	var month = '';
	var year = '';

	var current_date = '';
	var current_time = '';

	var current_reports_date = '';

	var page_count = 0;
	var current_page = 1;
	
	var item_stocks_array = [];
	// } FOR ALL VIEW TYPES
	function load_system_datetime() {
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
			        var item_unit = value.item_unit.toLowerCase();
			        var item_low_level = value.item_low_level;
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
			        var item_unit = value.item_unit.toLowerCase();
			        var item_low_level = value.item_low_level;
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

			       	// inventory_card = `
			    	// 	<div class="card" id="item_card`+item_id+`">
					// 		<div class="content">
					// 			<a class="ui header small">`+item_name+`</a>
					// 			<div class="meta">`+item_code+`</div>
					// 		</div>
					// 		<div class="ui basic content segment center aligned">
					// 			<a>
					// 				<i class="ui center aligned box `+box_color+` huge icon"></i>
					// 				<br>
					// 				<br>
					// 				<x class="stocks_holder invisible">`+stock_amount+` `+unit_display+`</x>
					// 				<input class="file_input" type="text" id="item`+item_id+`"></input>
					// 		 	</a>
					// 		</div>
					// 	</div>
			       	// `; 
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
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$('#inventory_cards_container').html('');
			if (response_data != '') {
				var items_array = [];
			    var units_array = [];
			    var descriptions_array = [];
			    var categories_array = [];
			    var search_content = [];
			    var item_name_content = [];
			    var item_description_content = [];
			    var categories_content = [];
			    var item_unit_content = [];
				
				retrieval_cart_indexer.length = 0;
				retrieval_cart_array.length = 0;
				restocking_cart_indexer.length = 0;
				restocking_cart_array.length = 0;

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
			        var item_unit = value.item_unit.toLowerCase();
			        var item_low_level = value.item_low_level;
			        category_acronym = category_name.match(/[A-Z]/g).join('');

			        // table_update_array.push([item_id, price_id, stock_id, category_id, item_code, item_name, stock_amount, item_price, item_description, category_name, item_unit]);

			        // grid_update_array.push([item_id, price_id, stock_id, category_id, item_code, item_name, item_price, item_description, category_name, item_unit]);

			        // retrieval_cart_array.push([item_id, price_id, stock_id, '0']);

					// restocking_cart_array.push([item_id, price_id, stock_id, '0', item_price]);

			      	if (item_unit != 'unspecified') {
				      	units_array[item_unit] = null;
			      	}

		      		search_content.push({id:item_id,title:item_code+' - '+item_name,description:item_description+' - '+category_acronym});

		      		if (!item_name_content.some(category => category.id === item_name)){
					    item_name_content.push({id:item_name,title:item_name});
					}
		      		if (!item_description_content.some(category => category.id === item_description)){
					    item_description_content.push({id:item_description,title:item_description});
					}
					if (!categories_content.some(category => category.id === category_id && category.title)) {
			      		categories_content.push({id:category_id,title:category_name});
					}
					if (!item_unit_content.some(category => category.id === item_unit)){
					    item_unit_content.push({id:item_unit,title:item_unit});
					}

				});
				$('.item_name_search')
					.search({
						source: item_name_content,
						fullTextSearch: 'exact',
						maxResults: 6,
						minCharacters: 2,
						showNoResults: false
					})
				;
				$('.item_description_search')
					.search({
						source: item_description_content,
						fullTextSearch: 'exact',
						maxResults: 100,
						minCharacters: 1,
						showNoResults: false
					})
				;
				$('.item_category_search')
					.search({
						source: categories_content,
						fullTextSearch: 'exact',
						maxResults: 100,
						minCharacters: 1,
						showNoResults: false
					})
				;
				$('.item_unit_search')
					.search({
						source: item_unit_content,
						fullTextSearch: 'exact',
						maxResults: 100,
						minCharacters: 1,
						showNoResults: false
					})
				;
				$('#main_inventory_search')
					.search({
						source: search_content,
						fullTextSearch: 'exact',
						maxResults: 100,
						minCharacters: 2,
						onSelect: function(result, response) {
							var item_id = result.id;
							target_page = $('#main_item_card'+item_id).attr('data-box_number');

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
				$('#inventory_reports_activator').on('click', function() {
					display_date = current_reports_date.dateWords();
					if (current_reports_date == current_date) {
			    		display_date = 'Today';
			    	}
				    loading_start('Loading Reports Data as of <x class="green-text">'+display_date+'</x>');
					load_inventory_rsmi_data();
				});
				load_max_item_code();
				load_admin_inventory_content();
				load_system_datetime();
			}
		})
	}
	function load_max_item_code() {
		var ajax = $.ajax("<?php echo base_url();?>i.php/sims_control/load_max_item_code");
		var jqxhr = ajax
		.fail(function() {
			alert("Connection Error");
		})
		.done(function() {
		    var item_code_content = [];
			var response_data = JSON.parse(jqxhr.responseText);
			$('#inventory_cards_container').html('');
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					var item_code = value.item_code;
				    code_num = parseInt(item_code.match(/\d+/g))+1;
				    code_num = String(code_num).padStart(3, '0');
				    code_char = item_code.match(/\D+/g);

				    next_item_code = code_char+code_num;
			
					if (!item_code_content.some(category => category.id === next_item_code)){
					    item_code_content.push({id:next_item_code,title:next_item_code});
					}
					$('.item_code_search')
						.search({
							source: item_code_content,
							fullTextSearch: 'exact',
							maxResults: 10,
							minCharacters: 1,
							showNoResults: false
						})
					;
		        })
		    }
		})
	}
	function load_admin_inventory_content() {
		var ajax = $.ajax("<?php echo base_url();?>i.php/sims_control/load_inventory_raw");
		var jqxhr = ajax
		.fail(function() {
			alert("Connection Error");
		})
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$('#main_inventory_cards_container').html('');
			if (response_data != '') {
				$.each(response_data, function(key, value) {
					if (key % 15 == 0) {
						page_number = (key/15)+1;
			        	if (key == 0) {
			        		page_box = `
				        		<div class="ui five doubling special cards inventory_container transition" id="main_inventory_page`+page_number+`" data-page_number="`+page_number+`" data-key="`+key+`">
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
				        		<div class="ui five doubling special cards inventory_container transition hidden" id="main_inventory_page`+page_number+`" data-page_number="`+page_number+` "data-key="`+key+`">
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
	       				var page_number = $(this).attr('data-page_number');
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
			        var item_unit = value.item_unit.toLowerCase();
			        var item_low_level = value.item_low_level;
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
			    		<div class="ui card" id="main_item_card`+item_id+`" data-box_number="`+page_number+`" data-item_id="`+item_id+`" data-card_count="`+key+`" data-stocks_count="1">
							<div class="content item_card" data-item_id="`+item_id+`">
								<a class="ui header tiny item_edit_activator pointered" data-item_id="`+item_id+`" data-price_id="`+price_id+`" data-stock_id="`+stock_id+`" data-item_name="`+item_name+`" data-item_code="`+item_code+`" data-item_price="`+item_price+`" data-item_unit="`+item_unit+`" data-item_low_level="`+item_low_level+`" data-item_category="`+category_name+`" data-item_description="`+item_description+`" data-value="0">
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
							  		<h5 class="ui icon header center aligned" id="stocks_popup_activator`+item_id+`">
										<i class="box `+box_color+` link icon" id="box`+item_id+`"></i>
										<div class="content">
											<a class="ui header link tiny item_stock active_stock`+item_id+`" id="item_stock`+stock_id+`_`+item_id+`" data-item_id="`+item_id+`" data-stock_id="`+stock_id+`" data-price_id="`+price_id+`" data-stock_amount="`+stock_amount+`" data-item_price="`+item_price+`" data-item_unit="`+item_unit+`" data-original_stock="`+stock_amount+`" data-stock_order="0">
												<x id="stock`+item_id+`">`+stock_amount+`</x> 
												<x id="unit`+item_id+`">`+unit_display+`</x>
												<input type="hidden" id="original_stock`+item_id+`" value="`+stock_amount+`">
												<div class="sub header tiny" id="item_price`+item_id+`">
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
											<i class="icons invisible large link add_to_retrieval" data-item_id="`+item_id+`" data-price_id="`+price_id+`" data-stock_id="`+stock_id+`" data-category_name="`+category_name+`"id="retrieval`+item_id+`">
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
											<i class="icons invisible large link add_to_restocking" data-item_id="`+item_id+`" data-price_id="`+price_id+`" data-stock_id="`+stock_id+`" data-category_name="`+category_name+` id="restocking`+item_id+`">
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
							<div class="ui popup" id="item_stocks_popup`+item_id+`">
						  		<div class="ui relaxed divided list" id="item_stocks_list`+item_id+`">

			    				</div>
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
			    			item_id = $(event.target).attr('data-item_id');
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
								duration: '40ms',
								onHide: function() {
									current_page--;
						    		if (current_page == 0) {
						    			current_page = page_count;
						    		}
						    		$('#inventory_navigation_center').html(current_page);
						    		$('#main_inventory_page'+current_page)
						    			.transition({
											animation: 'fade right',
											duration: '40ms'
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
								duration: '40ms',
								onHide: function() {
									current_page++;
						    		if (current_page > page_count) {
						    			current_page = 1;
						    		}
						    		$('#inventory_navigation_center').html(current_page);
						    		$('#main_inventory_page'+current_page)
						    			.transition({
											animation: 'fade left',
											duration: '40ms'
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
									var item_id = $(this).attr('data-item_id');
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
					var item_code = $(this).attr('data-item_code');

					$('#update_stock_id').val($(this).attr('data-stock_id'));
					$('#item_name_update').val($(this).attr('data-item_name'));
					$('#item_code_update').val($(this).attr('data-item_code'));
					$('#item_price_update').val($(this).attr('data-item_price'));
					$('#item_unit_update').val($(this).attr('data-item_unit'));
					$('#item_low_level_update').val($(this).attr('data-item_low_level'));
					$('#item_category_update').val($(this).attr('data-item_category'));
					$('#item_description_update').val($(this).attr('data-item_description'));

			    	$('#item_edit_modal')
						.modal({
							useFlex: true,
							allowMultiple: false,
							autofocus: false,
							blurring: false,
							closable: false
						})
				        .modal('show')
					;
				});
			    $('.supply_ledger_activator').on('dblclick', function() {
					var item_id = $(this).attr('data-item_id');
					var item_code = $(this).attr('data-item_code');
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
								var item_id = $(this).attr('data-item_id');
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
						var item_id = $(this).attr('data-item_id');
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
						var item_id = $(this).attr('data-item_id');
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
								var item_id = $(this).attr('data-item_id');
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
					// .on('input', function() {
					// 	var item_id = $(this).attr('data-item_id');
					// 	var input_value = $(this).val();
					// 	var original_stock = Number($('#original_stock'+item_id).val());

					// 	new_quantity = original_stock+Number(input_value);

					// 	if (input_value == '') {
					// 		$('#stock'+item_id).html(original_stock);
					// 	}
					// 	else {
					// 		if (input_value < 0) {
					// 			$(this).val(0);
					// 			$('#stock'+item_id).html(original_stock);
					// 		}
					// 		else {
					// 			$('#stock'+item_id).html(new_quantity);
					// 		}
					// 	}
					// 	var current_stock = Number($('#stock'+item_id).html());

					// 	box_color = box_painter(current_stock);
					// 	$('#box'+item_id).attr('class', 'box '+box_color+ ' link icon');
					// })
					.on('keyup', function(event) {
						var item_id = $(this).attr('data-item_id');
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
								var item_id = $(this).attr('data-item_id');
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
						var item_id = $(this).attr('data-item_id');
						var key = event.which;
						if (key == 13) {
							$(this).closest('#restocking_popup'+item_id).find('.add_to_restocking').trigger('click');
						}
					})
				;
				$('.add_to_retrieval').on('click', function() {
					var item_id = $(this).attr('data-item_id');
					var price_id = $(this).attr('data-price_id');
					var stock_id = $(this).attr('data-stock_id');
					var category_name = $(this).attr('data-category_name');
			        var category_acronym = category_name.match(/[A-Z]/g).join('');
					var quantity = Number($('#retrieval_item_quantity'+item_id).val());
					var original_stock = Number($('#original_stock'+item_id).val());
					var current_stock = Number($('#stock'+item_id).html());
					
					$('#original_stock'+item_id).val(current_stock);

					// alert(quantity+' - '+original_stock+' - '+current_stock)

					var item_stock_count = item_stocks_array[0][5];
					for (x = 1; x < item_stocks_array.length; x++) {
						if (item_stocks_array[x][0] == item_id) {
							if (item_stocks_array[x][5] > item_stock_count) {
								item_stock_count = item_stocks_array[x][5];
							}
						}
					}
					item_stock_count++;

					if (quantity != '' && quantity != 0) {
						if (item_stock_count > 1) {
							if (current_stock > 0) {
								if (!retrieval_cart_indexer.includes(stock_id)) {
							        retrieval_cart_array.push([item_id, price_id, stock_id, quantity]);
									retrieval_cart_indexer.push(stock_id);

									var item_name = $('#retrieval_item_quantity'+item_id).attr('data-item_name');
									var item_unit = $('#retrieval_item_quantity'+item_id).attr('data-item_unit');
									var item_code = $('#retrieval_item_quantity'+item_id).attr('data-item_code');
									var item_price = $('#retrieval_item_quantity'+item_id).attr('data-item_price');

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
										<div class="item retrieval_item" id="retrieval_item`+stock_id+`" data-item_id="`+item_id+`" data-stock_id="`+stock_id+`">
										    <div class="right floated content">
										    	<div class="ui right pointing dropdown pointered compact retrieval_item_menu`+item_id+` retrieval_stock_menu`+stock_id+`">
								  					<button class="compact mini ui basic grey button"><x id="retrieval_quantity`+stock_id+`">`+quantity+`</x> `+item_unit+`
								  					</button>
									  				<div class="ui mini menu">
													    <div class="fitted item retrieval_item_remover`+stock_id+`" data-item_id="`+item_id+`" data-stock_id="`+stock_id+`" data-quantity="`+quantity+`" data-item_price="`+item_price+`" data-item_unit="`+item_unit+`" id="retrieval_remover`+stock_id+`">
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
									$('.retrieval_stock_menu'+stock_id)
									  	.dropdown({
									  		action: 'nothing',
									  		direction: 'upward',
									  		transition: 'drop'
									  	})
									;
									var retrieval_length = $('.retrieval_item_remover'+stock_id).length;
									$('#original_stock'+item_id).val(current_stock);
								}
								else {
									var current_quantity = Number($('#retrieval_quantity'+stock_id).html());
									new_quantity = current_quantity+quantity;
									$('#retrieval_quantity'+stock_id).html(new_quantity);

									for (x = retrieval_cart_array.length - 1; x >= 0; x--) {
										if (retrieval_cart_array[x][2] == stock_id) {
											current_amount = retrieval_cart_array[x][3];
										}
									}
									for (x = retrieval_cart_array.length - 1; x >= 0; x--) {
										if (retrieval_cart_array[x][2] == stock_id) {
											retrieval_cart_array[x][3] = parseInt(new_quantity, 10);
										}
									}

								}
							}
							else if (current_stock == 0) {
								if (!retrieval_cart_indexer.includes(stock_id)) {
							        retrieval_cart_array.push([item_id, price_id, stock_id, quantity]);
									retrieval_cart_indexer.push(stock_id);

									var item_name = $('#retrieval_item_quantity'+item_id).attr('data-item_name');
									var item_unit = $('#retrieval_item_quantity'+item_id).attr('data-item_unit');
									var item_code = $('#retrieval_item_quantity'+item_id).attr('data-item_code');
									var item_price = $('#retrieval_item_quantity'+item_id).attr('data-item_price');

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
										<div class="item retrieval_item" id="retrieval_item`+stock_id+`" data-item_id="`+item_id+`" data-stock_id="`+stock_id+`">
										    <div class="right floated content">
										    	<div class="ui right pointing dropdown pointered compact retrieval_item_menu`+item_id+` retrieval_stock_menu`+stock_id+`">
								  					<button class="compact mini ui basic grey button"><x id="retrieval_quantity`+stock_id+`">`+quantity+`</x> `+item_unit+`
								  					</button>
									  				<div class="ui mini menu">
													    <div class="fitted item retrieval_item_remover`+stock_id+`" data-item_id="`+item_id+`" data-stock_id="`+stock_id+`" data-quantity="`+quantity+`" data-item_price="`+item_price+`" data-item_unit="`+item_unit+`" id="retrieval_remover`+stock_id+`">
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
									$('.retrieval_stock_menu'+stock_id)
									  	.dropdown({
									  		action: 'nothing',
									  		direction: 'upward',
									  		transition: 'drop'
									  	})
									;
									var retrieval_length = $('.retrieval_item_remover'+stock_id).length;
									$('#original_stock'+item_id).val(current_stock);
								}
								else {
									var current_quantity = Number($('#retrieval_quantity'+stock_id).html());
									new_quantity = current_quantity+quantity;
									$('#retrieval_quantity'+stock_id).html(new_quantity);

									for (x = retrieval_cart_array.length - 1; x >= 0; x--) {
										if (retrieval_cart_array[x][2] == stock_id) {
											current_amount = retrieval_cart_array[x][3];
										}
									}
									for (x = retrieval_cart_array.length - 1; x >= 0; x--) {
										if (retrieval_cart_array[x][2] == stock_id) {
											retrieval_cart_array[x][3] = parseInt(new_quantity, 10);
										}
									}
								}	
								for (x = 0; x < item_stocks_array.length; x++) {
									if (item_stocks_array[x][0] == item_id) {
										var active_id = $('.active_stock'+item_id).attr('id');

										var active_item_id = $('#'+active_id).attr('data-item_id');
										var active_stock_id = $('#'+active_id).attr('data-stock_id');
										var active_price_id = $('#'+active_id).attr('data-price_id');
										var active_stock_amount = $('#'+active_id).attr('data-stock_amount');
										var active_item_price = $('#'+active_id).attr('data-item_price');
										var active_item_unit = $('#'+active_id).attr('data-item_unit');
										var active_original_stock = $('#'+active_id).attr('data-original_stock');
										var active_stock_order = $('#'+active_id).attr('data-stock_order');
										
										var new_price_id = item_stocks_array[x][1];
										var new_stock_id = item_stocks_array[x][2];
										var new_stock_amount = item_stocks_array[x][3];
										var new_item_price = item_stocks_array[x][4];
										var new_stock_order = item_stocks_array[x][5];
										var item_unit = $('#unit'+item_id).html();
										
										// target_object = $('.item_stock'+'[data-stock_order="'+next_stock_order+'"]');

										var next_stock_order = Number(active_stock_order)+1;
										
										if (next_stock_order == new_stock_order) {
											// alert(new_stock_order)
			       							$('#item_stock'+new_stock_id+'_'+item_id).remove();

											var price_string = "₱"+Number(new_item_price).toFixed(2);

											box_color = box_painter(new_stock_amount);
											$('#box'+item_id).attr('class', 'box '+box_color+ ' link icon');

											$('#stock'+item_id).html(new_stock_amount);
											$('#unit'+item_id).html(item_unit);
											$('#item_price'+item_id).html(price_string);
											
											$('#original_stock'+item_id).val(new_stock_amount);
											$('#restocking_item_price'+item_id).val(new_item_price);
											
											$('#retrieval'+item_id).attr('data-price_id', new_price_id);
											$('#retrieval'+item_id).attr('data-stock_id', new_stock_id);

											$('#retrieval_item_quantity'+item_id).attr('data-item_price', new_item_price);
											$('#restocking_item_quantity'+item_id).attr('data-item_price', new_item_price);
											$('#restocking_item_price'+item_id).attr('data-item_price', new_item_price);

											var stock_count = $('#main_item_card'+item_id).attr('data-stocks_count');
											stock_count--;
											$('#main_item_card'+item_id).attr('data-stocks_count', stock_count)

											var current_stock_order = $('#item_stock'+new_stock_id+'_'+item_id).attr('data-stock_order');

											box_color = box_painter(current_stock);

					        				var stock_display = (current_stock+" "+active_item_unit).toString();
											stock_pop = `
												<div class="item item_stock" id="item_stock`+active_stock_id+`_`+item_id+`" data-item_id="`+item_id+`" data-stock_id="`+active_stock_id+`" data-price_id="`+active_price_id+`" data-stock_amount="`+current_stock+`" data-item_price="`+active_item_price+`" data-item_unit="`+active_item_unit+`" data-original_stock="`+active_original_stock+`" data-stock_order="`+active_stock_order+`">
													<i class="large box `+box_color+` middle aligned link icon" id="stock_box`+stock_id+`"></i>
													<div class="content">
														<div class="header" style="white-space: nowrap;">`+stock_display+`</div>
												      	<div class="description center aligned">
													    	₱`+Number(active_item_price).toFixed(2)+`
												      	</div>
													</div>
												</div>
								        	`;

									        $('#item_stocks_list'+item_id).prepend(stock_pop);

											$('#item_stock'+stock_id+'_'+item_id).attr('id', 'item_stock'+new_stock_id+'_'+item_id);
											$('#item_stock'+new_stock_id+'_'+item_id).attr('data-stock_id', new_stock_id);
											$('#item_stock'+new_stock_id+'_'+item_id).attr('data-price_id', new_price_id);
											$('#item_stock'+new_stock_id+'_'+item_id).attr('data-stock_amount', new_stock_amount);
											$('#item_stock'+new_stock_id+'_'+item_id).attr('data-item_price', new_item_price);
											$('#item_stock'+new_stock_id+'_'+item_id).attr('data-original_stock', new_stock_amount);
											$('#item_stock'+new_stock_id+'_'+item_id).attr('data-stock_order', new_stock_order);

								       		$('#stocks_popup_activator'+item_id)
											  	.popup({
											  		popup: $('#item_stocks_popup'+item_id),
											  		position: 'bottom center',
											  		variation: 'wide fluid mini',
											  		on: 'hover',
											  		closable: false,
											  		inline: false,
											  		hideOnScroll: false
											  	})
											;

											// target_id = $('.retrieval_item_remover'+stock_id+'[data-stock_id="'+stock_id+'"]').attr('id');
											// $('#'+target_id).off('dblclick');
											break;
										}
									}
								}
							}
						}
						else if (item_stock_count == 1) {
							if (!retrieval_cart_indexer.includes(stock_id)) {
						        retrieval_cart_array.push([item_id, price_id, stock_id, quantity]);
								retrieval_cart_indexer.push(stock_id);

								var item_name = $('#retrieval_item_quantity'+item_id).attr('data-item_name');
								var item_unit = $('#retrieval_item_quantity'+item_id).attr('data-item_unit');
								var item_code = $('#retrieval_item_quantity'+item_id).attr('data-item_code');
								var item_price = $('#retrieval_item_quantity'+item_id).attr('data-item_price');

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
									<div class="item retrieval_item" id="retrieval_item`+stock_id+`" data-item_id="`+item_id+`" data-stock_id="`+stock_id+`">
									    <div class="right floated content">
									    	<div class="ui right pointing dropdown pointered compact retrieval_item_menu`+item_id+` retrieval_stock_menu`+stock_id+`">
							  					<button class="compact mini ui basic grey button"><x id="retrieval_quantity`+stock_id+`">`+quantity+`</x> `+item_unit+`
							  					</button>
								  				<div class="ui mini menu">
												    <div class="fitted item retrieval_item_remover`+stock_id+`" data-item_id="`+item_id+`" data-stock_id="`+stock_id+`" data-quantity="`+quantity+`" data-item_price="`+item_price+`" data-item_unit="`+item_unit+`" id="retrieval_remover`+stock_id+`">
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
								$('.retrieval_stock_menu'+stock_id)
								  	.dropdown({
								  		action: 'nothing',
								  		direction: 'upward',
								  		transition: 'drop'
								  	})
								;
								var retrieval_length = $('.retrieval_item_remover'+stock_id).length;
								$('#original_stock'+item_id).val(current_stock);
							}
							else {
								var current_quantity = Number($('#retrieval_quantity'+stock_id).html());
								new_quantity = current_quantity+quantity;
								$('#retrieval_quantity'+stock_id).html(new_quantity);

								for (x = retrieval_cart_array.length - 1; x >= 0; x--) {
									if (retrieval_cart_array[x][2] == stock_id) {
										retrieval_cart_array[x][3] = parseInt(new_quantity, 10);
									}
								}
							}
						}

						$('#retrieval_item_quantity'+item_id).val('');
						$('.item_dropdown').dropdown('hide');

						$(this).closest('.outer_item_dropdown').dropdown('hide');
						$('#box'+item_id)
						 	.transition({
						 		animation: 'jiggle',
						 		onStart: function() {
									$('#retrieval_basket_activator')
										.transition('bounce')
									; 			
						 		}
						 	})
						;

						var retrieval_length = $('.retrieval_item_remover'+stock_id).length;
						// if (retrieval_length > 1) {
						// 	var cart_item_id = $('.retrieval_item_remover'+stock_id).eq(retrieval_length-1).attr('id');	
						// 	$('.retrieval_item_remover'+stock_id).not('#'+cart_item_id).remove();
						// }
						
						var removal_item_object = $('.retrieval_item').last();
						var object_item_id = removal_item_object.attr('data-item_id');
						var object_stock_id = removal_item_object.attr('data-stock_id');
						$('.retrieval_item_menu'+object_item_id)
							.dropdown({
								onShow: function () {
									return false;
								}
							})
						;
						$('.retrieval_stock_menu'+object_stock_id)
							.dropdown({
						  		action: 'nothing',
						  		direction: 'upward',
						  		transition: 'drop'
						  	})
						;
						$('.retrieval_item_remover'+object_stock_id)
							.off('dblclick')
							.on('dblclick', remove_retrieval_item)
						;
						retrieval_validity_check();
						console.log(retrieval_cart_array)
					}
					$('#retrieval_basket_indicator').html((retrieval_cart_indexer.length));
					if (!$('#retrieval_basket_indicator').transition('is visible')) {
						$('#retrieval_basket_indicator').transition('fade up');
					}
				})
				$('.add_to_restocking').on('click', function() {
					var item_id = $(this).attr('data-item_id');
					var price_id = $(this).attr('data-price_id');
					var stock_id = $(this).attr('data-stock_id');
					var category_name = $(this).attr('data-category_name');
			        var category_acronym = category_name.match(/[A-Z]/g).join('');
					var quantity = Number($('#restocking_item_quantity'+item_id).val());
					var item_price = $('#restocking_item_price'+item_id).val();
					var original_stock = Number($('#original_stock'+item_id).val());
					
					$('.restocking_item_remover').off('dblclick');
					if (quantity != '' && quantity != 0) {
						if (!restocking_cart_indexer.includes(item_id)) {
							restocking_cart_array.push([item_id, price_id, stock_id, quantity, item_price]);
							restocking_cart_indexer.push(item_id);

							var item_name = $('#restocking_item_quantity'+item_id).attr('data-item_name');
							var item_unit = $('#restocking_item_quantity'+item_id).attr('data-item_unit');
							var item_code = $('#restocking_item_quantity'+item_id).attr('data-item_code');
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
								    	<div class="ui right pointing dropdown restocking_stock_menu`+stock_id+` pointered compact">
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
							$('.restocking_stock_menu'+stock_id)
							  	.dropdown({
							  		action: 'nothing',
							  		direction: 'upward',
							  		transition: 'drop'
							  	})
							;
							$('restocking_empty_placeholder').addClass('invisible');
							$('.restocking_item_remover')
								.on('dblclick', function() {
									var item_id = $(this).attr('data-item_id');
									var restocking_quantity = $('#restocking_quantity'+item_id).html();
									var original_stock = $('#original_stock'+item_id).val();

									for (x = restocking_cart_array.length - 1; x >= 0; x--) {
										if (restocking_cart_array[x][0] == item_id) {

											restocking_cart_array.splice(x, 1);
										}
									}

									restocking_cart_indexer.splice(restocking_cart_indexer.indexOf(item_id), 1);
									$('#restocking_cart_indicator').html((restocking_cart_indexer.length));
									if (restocking_cart_indexer.length == 0) {
										if ($('#restocking_cart_indicator').transition('is visible')) {
											$('#restocking_cart_indicator').transition('fade up');
										}	
									}
									// var new_quantity = original_stock-restocking_quantity;

									// box_color = box_painter(new_quantity);
									// $('#box'+item_id).attr('class', 'box '+box_color+ ' link icon');
									
									// $('#stock'+item_id).html(new_quantity);
									// $('#original_stock'+item_id).val(new_quantity);
									
									$('#restocking_item'+item_id)
									 	.fadeOut(500, function() {
								 			$(this).remove();
			 								restocking_validity_check();
									 	})
									;
								})
							;
							var current_stock = Number($('#stock'+item_id).html());
							$('#original_stock'+item_id).val(current_stock);
							$('#restocking_item_quantity'+item_id).val('');
							$('.item_dropdown').dropdown('hide');
							$(this).closest('.outer_item_dropdown').dropdown('hide');
							$('#box'+item_id)
							 	.transition({
							 		animation: 'jiggle',
							 		onStart: function() {
										$('#restocking_cart_activator')
											.transition('bounce')
										; 			
							 		}
							 	})
							;
							$('#restocking_cart_indicator').html((restocking_cart_indexer.length));
							if (!$('#restocking_cart_indicator').transition('is visible')) {
								$('#restocking_cart_indicator').transition('fade up');
							}
							restocking_validity_check();
						}
						else {
							duration = 25000;
							variation = 'basic';
							icon = 'warning orange';
							header = 'Similar Item Exists';
							message = '<strong>An item with a similar item code already exists in the Restocking Cart. Only one (1) cart item per item code is permitted in the Restocking Cart.</strong>';
							load_notification(icon, header, message, duration, '', '', variation)
						}
					}
				})
				load_admin_inventory_stocks()
			}
		})
	}
	function remove_retrieval_item() {
		var item_id = $(this).attr('data-item_id');
		var stock_id = $(this).attr('data-stock_id');

		var cart_item_id = 'item_stock'+stock_id+'_'+item_id;
		var cart_stock_id = $('#'+cart_item_id).attr('data-stock_id');
		var cart_price_id = $('#'+cart_item_id).attr('data-price_id');
		var cart_stock_amount = $('#'+cart_item_id).attr('data-stock_amount');
		var cart_item_price = $('#'+cart_item_id).attr('data-item_price');
		var cart_item_unit = $('#'+cart_item_id).attr('data-item_unit');
		var cart_original_stock = $('#'+cart_item_id).attr('data-original_stock');
		var cart_stock_order = $('#'+cart_item_id).attr('data-stock_order');

		var active_id = $('.active_stock'+item_id).attr('id');
		var active_stock_id = $('#'+active_id).attr('data-stock_id');
		var active_price_id = $('#'+active_id).attr('data-price_id');
		var active_stock_amount = $('#'+active_id).attr('data-stock_amount');
		var active_item_price = $('#'+active_id).attr('data-item_price');
		var active_item_unit = $('#'+active_id).attr('data-item_unit');
		var active_original_stock = $('#'+active_id).attr('data-original_stock');
		var active_stock_order = $('#'+active_id).attr('data-stock_order');
		
		var original_stock = Number($('#original_stock'+item_id).val());
		var retrieval_quantity = Number($('#retrieval_quantity'+stock_id).html());
		var new_quantity = original_stock+retrieval_quantity;

		// alert(cart_item_id+" - "+active_id)

		var item_stock_count = item_stocks_array[0][5];
		for (x = 1; x < item_stocks_array.length; x++) {
			if (item_stocks_array[x][0] == item_id) {
				if (item_stocks_array[x][5] > item_stock_count) {
					item_stock_count = item_stocks_array[x][5];
				}
			}
		}
		item_stock_count++;

		// alert(stock_id+'_'+item_id)
		// alert(active_stock_id+'_'+active_item_id)

		// alert(active_stock_amount)	
		if (item_stock_count > 1) {
			if (cart_item_id == active_id) {
				$('#stock'+item_id).html(new_quantity);
				$('#original_stock'+item_id).val(new_quantity);
				$('#retrieval_item'+stock_id)
				 	.fadeOut(500, function() {
			 			$(this).remove();
		 				retrieval_validity_check();
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
			}
			else {
				next_stock_order = Number(active_stock_order)-1;
				target_object = $('.item_stock'+'[data-stock_order="'+next_stock_order+'"]');
						
				if (!target_object.length) {
					next_stock_order = 0;
					target_object = $('.item_stock'+'[data-stock_order="'+next_stock_order+'"]');
				}
				// alert(active_stock_order+" to "+next_stock_order)
				for (x = 0; x < item_stocks_array.length; x++) {
					if (item_stocks_array[x][0] == item_id && item_stocks_array[x][2] == stock_id) {

						if (item_stocks_array[x][5] == next_stock_order) {
							var new_price_id = item_stocks_array[x][1];
							var new_stock_id = item_stocks_array[x][2];
							var new_stock_amount = item_stocks_array[x][3];
							var new_item_price = item_stocks_array[x][4];
							var new_stock_order = item_stocks_array[x][5];
							var item_unit = $('#unit'+item_id).html();
						}

						$('#item_stock'+new_stock_id+'_'+item_id).remove();

						var price_string = "₱"+Number(new_item_price).toFixed(2);

						box_color = box_painter(new_stock_amount);
						$('#box'+item_id).attr('class', 'box '+box_color+ ' link icon');

						$('#stock'+item_id).html(new_stock_amount);
						$('#unit'+item_id).html(item_unit);
						$('#item_price'+item_id).html(price_string);
						
						$('#original_stock'+item_id).val(new_stock_amount);
						$('#restocking_item_price'+item_id).val(new_item_price);
						
						$('#retrieval'+item_id).attr('data-price_id', new_price_id);
						$('#retrieval'+item_id).attr('data-stock_id', new_stock_id);

						$('#retrieval_item_quantity'+item_id).attr('data-item_price', new_item_price);
						$('#restocking_item_quantity'+item_id).attr('data-item_price', new_item_price);
						$('#restocking_item_price'+item_id).attr('data-item_price', new_item_price);

						var stock_count = $('#main_item_card'+item_id).attr('data-stocks_count');
						stock_count--;
						$('#main_item_card'+item_id).attr('data-stocks_count', stock_count)

						var current_stock_order = $('#item_stock'+new_stock_id+'_'+item_id).attr('data-stock_order');

						box_color = box_painter(active_stock_amount);

        				var stock_display = (active_stock_amount+" "+active_item_unit).toString();
						stock_pop = `
							<div class="item item_stock" id="item_stock`+active_stock_id+`_`+item_id+`" data-item_id="`+item_id+`" data-stock_id="`+active_stock_id+`" data-price_id="`+active_price_id+`" data-stock_amount="`+active_stock_amount+`" data-item_price="`+active_item_price+`" data-item_unit="`+item_unit+`" data-original_stock="`+active_original_stock+`" data-stock_order="`+active_stock_order+`">
								<i class="large box `+box_color+` middle aligned link icon" id="stock_box`+active_stock_order+`"></i>
								<div class="content">
									<div class="header" style="white-space: nowrap;">`+stock_display+`</div>
							      	<div class="description center aligned">
								    	₱`+Number(new_item_price).toFixed(2)+`
							      	</div>
								</div>
							</div>
			        	`;

				        $('#item_stocks_list'+item_id).prepend(stock_pop);

						$('#item_stock'+active_stock_id+'_'+item_id).attr('id', 'item_stock'+new_stock_id+'_'+item_id);
						$('#item_stock'+new_stock_id+'_'+item_id).attr('data-stock_id', new_stock_id);
						$('#item_stock'+new_stock_id+'_'+item_id).attr('data-price_id', new_price_id);
						$('#item_stock'+new_stock_id+'_'+item_id).attr('data-stock_amount', new_stock_amount);
						$('#item_stock'+new_stock_id+'_'+item_id).attr('data-item_price', new_item_price);
						$('#item_stock'+new_stock_id+'_'+item_id).attr('data-original_stock', new_stock_amount);
						$('#item_stock'+new_stock_id+'_'+item_id).attr('data-stock_order', new_stock_order);

			       		$('#stocks_popup_activator'+item_id)
						  	.popup({
						  		popup: $('#item_stocks_popup'+item_id),
						  		position: 'bottom center',
						  		variation: 'wide fluid mini',
						  		on: 'hover',
						  		closable: false,
						  		inline: false,
						  		hideOnScroll: false
						  	})
						;

						// target_id = $('.retrieval_item_remover'+stock_id+'[data-stock_id="'+stock_id+'"]').attr('id');
						// $('#'+target_id).off('dblclick');
						break;
					}
				}
				for (x = retrieval_cart_array.length - 1; x >= 0; x--) {
					if (retrieval_cart_array[x][2] == stock_id) {

						retrieval_cart_array.splice(x, 1);
					}
				}
				retrieval_cart_indexer.splice(retrieval_cart_indexer.indexOf(stock_id), 1);

				$('#retrieval_item'+stock_id)
				 	.fadeOut(500, function() {
			 			$(this).remove();
		 				retrieval_validity_check();
				 	})
				;
				box_color = box_painter(new_stock_amount);
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
				// alert('diff')
			}
		}
		else if (item_stock_count == 1) {
			
			$('#stock'+item_id).html(new_quantity);
			$('#original_stock'+item_id).val(new_quantity);
			$('#retrieval_item'+stock_id)
			 	.fadeOut(500, function() {
		 			$(this).remove();
		 			retrieval_validity_check();
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
		}
		// var item_object = $('.retrieval_item');
		// var target_object = item_object.eq(item_object.length-2);
		// var stock_id = target_object.attr('data-stock_id');
		var removal_item_object = $('.retrieval_item[data-item_id="'+item_id+'"]').eq($('.retrieval_item[data-item_id="'+item_id+'"]').length-2);
		var object_item_id = removal_item_object.attr('data-item_id');
		var object_stock_id = removal_item_object.attr('data-stock_id');
		// alert(object_stock_id+'_'+object_item_id)
		$('.retrieval_item_menu'+object_item_id)
			.dropdown({
				onShow: function () {
					return false;
				}
			})
		;
		$('.retrieval_stock_menu'+object_stock_id)
			.dropdown({
		  		action: 'nothing',
		  		direction: 'upward',
		  		transition: 'drop'
		  	})
		;
		$('.retrieval_item_remover'+object_stock_id)
			.off('dblclick')
			.on('dblclick', remove_retrieval_item)
		;
		for (x = retrieval_cart_array.length - 1; x >= 0; x--) {
			if (retrieval_cart_array[x][2] == stock_id) {

				retrieval_cart_array.splice(x, 1);
			}
		}
		retrieval_cart_indexer.splice(retrieval_cart_indexer.indexOf(stock_id), 1);
		$('#retrieval_basket_indicator').html((retrieval_cart_indexer.length));
		if (retrieval_cart_indexer.length == 0) {
			if ($('#retrieval_basket_indicator').transition('is visible')) {
				$('#retrieval_basket_indicator').transition('fade up');
			}	
		}
		// console.log(retrieval_cart_array)
	}

	function load_admin_inventory_stocks() {
		var ajax = $.ajax("<?php echo base_url();?>i.php/sims_control/load_inventory_raw_stocks");
		var jqxhr = ajax
		.fail(function() {
			alert("Connection Error");
		})
		.always(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			if (response_data != '') {
			    var stock_pop = '';
				var match_counter = 0;
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
			        var item_unit = value.item_unit.toLowerCase();
			        category_acronym = category_name.match(/[A-Z]/g).join('');

			        if (stock_amount == -1) {
			        	stock_amount = 0;
			        }

					item_stocks_array.push([item_id, price_id, stock_id, stock_amount, item_price, match_counter]);

					for (x = 0; x < item_stocks_array.length; x++) {
						if (item_stocks_array[x][0] == item_id) {
							item_stocks_array[x][5] = match_counter;
							match_counter++;
						}
						else {
							match_counter = 0;
						}	
					}
				})
				var match_counter = 0;
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
			        var item_unit = value.item_unit.toLowerCase();
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
			        var stock_display = (stock_amount+" "+unit_display).toString();
			        if (!$('#item_stock'+stock_id+'_'+item_id).length) {

						for (x = 0; x < item_stocks_array.length; x++) {
							if (item_stocks_array[x][0] == item_id) {
								item_stocks_array[x][5] = match_counter;
								stock_pop = `
									<div class="item item_stock" id="item_stock`+stock_id+`_`+item_id+`" data-item_id="`+item_id+`" data-stock_id="`+stock_id+`" data-price_id="`+price_id+`" data-stock_amount="`+stock_amount+`" data-item_price="`+item_price+`" data-item_unit="`+item_unit+`" data-original_stock="`+stock_amount+`" data-stock_order="`+match_counter+`">
										<i class="large box `+box_color+` middle aligned link icon" id="stock_box`+stock_id+`"></i>
										<div class="content">
											<div class="header" style="white-space: nowrap;">`+stock_display+`</div>
									      	<div class="description center aligned">
										    	₱`+Number(item_price).toFixed(2)+`
									      	</div>
											
										</div>
									</div>
					        	`;
								match_counter++;
								$('#main_item_card'+item_id).attr('data-stocks_count', match_counter);
							}
							else {
								match_counter = 0;
							}
						}

			        	
				        $('#item_stocks_list'+item_id).append(stock_pop)
			       		$('#stocks_popup_activator'+item_id)
						  	.popup({
						  		popup: $('#item_stocks_popup'+item_id),
						  		position: 'bottom center',
						  		variation: 'wide fluid mini',
						  		on: 'hover',
						  		closable: false,
						  		inline: false,
						  		hideOnScroll: false
						  	})
						;
			        }
					// if (item_id == 4) {
					// 	alert($('#main_item_card'+item_id).attr('data-stocks_count'))
					// }

				})
				load_inventory_registered_users();
			}
		})
	}
	function retrieval_validity_check() {
		var retrieval_basket = retrieval_cart_array.length;

		if (retrieval_basket == 0) {
			$('#retrieval_empty_placeholder').removeClass('invisible');
		}
		else {
			$('#retrieval_empty_placeholder').addClass('invisible');
		}
		// alert($('#request_date').val().substr(0, 7));

		if (retrieval_cart_type == 'first') {
			var requestor_id = $('#requestor_id').val();
			var request_date = $('#request_date').val();
			var request_purpose = $('#request_purpose').val();

			if (requestor_id && request_date && request_purpose && retrieval_basket > 0) {
				if (!$('#retrieval_basket_checkout').transition('is visible')) {
					$('#retrieval_basket_checkout').transition('scale');
				}
			}
			else {
				if ($('#retrieval_basket_checkout').transition('is visible')) {
					$('#retrieval_basket_checkout').transition('scale');
				}
			}
		}
		else if (retrieval_cart_type == 'second') {
			var requisition_id = $('#requisition_id').val();

			if (requisition_id && retrieval_basket > 0) {
				if (!$('#retrieval_basket_checkout').transition('is visible')) {
					$('#retrieval_basket_checkout').transition('scale');
				}
			}
			else {
				if ($('#retrieval_basket_checkout').transition('is visible')) {
					$('#retrieval_basket_checkout').transition('scale');
				}
			}
		}

		$('#retrieval_basket_indicator').html(retrieval_basket);
		if (retrieval_basket >= 1) {
			if (!$('#retrieval_basket_indicator').transition('is visible')) {
				$('#retrieval_basket_indicator').transition('fade up');
			}	
		}
		else {
			if ($('#retrieval_basket_indicator').transition('is visible')) {
				$('#retrieval_basket_indicator').transition('fade up');
			}	
		}
	}
	function restocking_validity_check() {
		var restocking_reference_code = $('#restocking_reference_code').val();
		var restock_date = $('#restock_date').val();
		var restocking_cart = restocking_cart_array.length;

		if (restocking_cart == 0) {
			$('#restocking_empty_placeholder').removeClass('invisible');
		}
		else {
			$('#restocking_empty_placeholder').addClass('invisible');
		}

		if (restocking_reference_code && restock_date && restocking_cart > 0) {
			if (!$('#restocking_cart_checkout').transition('is visible')) {
				$('#restocking_cart_checkout').transition('scale');
			}
		}
		else {
			if ($('#restocking_cart_checkout').transition('is visible')) {
				$('#restocking_cart_checkout').transition('scale');
			}
		}

		$('#restocking_cart_indicator').html(restocking_cart);
		if (restocking_cart >= 1) {
			if (!$('#restocking_cart_indicator').transition('is visible')) {
				$('#restocking_cart_indicator').transition('fade up');
			}	
		}
		else {
			if ($('#restocking_cart_indicator').transition('is visible')) {
				$('#restocking_cart_indicator').transition('fade up');
			}	
		}
		
	}
	$.fn.cardSelected = function () {
		selected_card_id = $(this).attr('data-item_id');
		selected_card_count = $(this).attr('data-card_count');
		
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
		item_id = $('#'+target_id).attr('data-item_id');
		target_page = $('#'+target_id).attr('data-box_number');

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
		item_id = $('#'+target_id).attr('data-item_id');
		target_page = $('#'+target_id).attr('data-box_number');

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
		item_id = $('#'+target_id).attr('data-item_id');
		target_page = $('#'+target_id).attr('data-box_number');

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
		item_id = $('#'+target_id).attr('data-item_id');
		target_page = $('#'+target_id).attr('data-box_number');

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
					
					$('#supply_officer_drop_menu').append(options);

					$('#rsmi_posted_drop_menu').append(options);
					$('#rpci_verified_drop_menu').append(options);

				})
				$('#requestor_drop')
					.dropdown({
						onChange: function() {
							var input_value = $('#requestor_id').val();
							var input_text = $('#requestor_drop').dropdown('get text');
						}
					})
				;
				$('#supply_officer_drop')
					.dropdown({
						onChange: function() {
							var input_value = $('#requestor_id').val();
							var input_text = $('#supply_officer_drop').dropdown('get text');
						}
					})
				;
				$('#rsmi_posted_drop')
					.dropdown({
						onChange: function() {
							var input_value = $('#requestor_id').val();
							var input_text = $('#rsmi_posted_drop').dropdown('get text');
						}
					})
				;
				$('#rsmi_posted_drop')
					.dropdown({
						onChange: function() {
							var input_value = $('#requestor_id').val();
							var input_text = $('#rsmi_posted_drop').dropdown('get text');
						}
					})
				;
				$('#requestor_id')
					.on('change', function() {
						retrieval_validity_check();
					})
				;
				$('#request_purpose')
					.on('input', function() {
						retrieval_validity_check();
					})
				;
				$('#request_date')
					.on('change', function() {
						retrieval_validity_check();
					})
				;
			}
			load_ris_codes();
		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			
		});
	}
	function load_rpci_signatories() {
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_rpci_signatories';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);
	        	for (x = 0; x < output_data.length; x++) {
		        	sign1 = output_data[x].sign1;
		        	sign2 = output_data[x].sign2;
		        	sign3 = output_data[x].sign3;
		        	label1 = output_data[x].label1;
		        	label2 = output_data[x].label2;
		        	label3 = output_data[x].label3;
		        	label4 = output_data[x].label4;

		        	element('sign1').innerHTML = sign1;
		        	element('sign1_name').innerHTML = sign1;
		        	element('sign2').innerHTML = sign2;
		        	element('sign3').innerHTML = sign3;  
		        	element('label1').innerHTML = label1;
		        	element('label1_name').innerHTML = label1;
		        	element('label2').innerHTML = label2;
		        	element('label3').innerHTML = label3;
		        	element('label4').innerHTML = label4;

		        	window.print();
		        }
	        }
	    }
	}
	function load_ris_codes() {
	    var ajax = $.ajax("<?php echo base_url();?>i.php/sims_control/load_ris_codes");
		var jqxhr = ajax
		.done(function() {
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
						var input_value = $('#requisition_id').val();
						var input_text = $('#ris_drop').dropdown('get text');
						$('#ris_name_holder').html(input_text.trim());
					}
				})
			;
			$('#requisition_id')
				.on('change', function() {
					retrieval_validity_check();
				})
			;
			load_restocking_codes();
		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			
		})
	}
	function load_restocking_codes() {
		$('#restocking_reference_code').val(year+'-0860-PO-');
	    var ajax = $.ajax("<?php echo base_url();?>i.php/sims_control/load_restocking_codes");
		var jqxhr = ajax
		.done(function() {
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
				console.log(restocking_codes)
			}
			$('#restocking_reference_code_field')
				.search({
					source: restocking_codes,
					fullTextSearch: true,
					maxResults: 10,
					minCharacters: 4,
					showNoResults: false,
					onSelect: function(result, response) {
						restocking_id = result.id;
						restocking_code = result.title;
						restocking_validity_check();
					}
				})
			;
			$('#restock_date')
				.on('change', function() {
					restocking_validity_check();
				})
			;
			input_fields = `
				<input type="text" value="" placeholder="Restocking Code" name="restocking_reference_code" id="restocking_reference_code">
			`;
			// $('#restocking_reference_code_field').append(input_fields);
			loading_stop();
		})
		.fail(function() {
			alert("error");
		})
		.always(function() {
			
		})
	}
	$('.retrieval_tab_toggle').on('click', function () {
		retrieval_cart_type = $(this).attr('data-tab');
	});
	function reset_retrieval_cart() {
		empty_retrieval_cart();
		$('#retrieval_first_form').trigger('reset');
		$('#requestor_drop').dropdown('restore defaults');
		$('#requestor_id').val('');
		$('#ris_drop').dropdown('restore defaults');
		$('#requisition_id').val('');
	}
	function empty_retrieval_cart() {
		retrieval_cart_array.length = 0;
		retrieval_cart_indexer.length = 0;
		$('#retrieval_items_container').empty();
	}
	$('#retrieval_basket_checkout')
		.on('dblclick', retrieval_checkout)
	;
	function retrieval_checkout() {
		var confirmation = confirm('Please confirm that all RETRIEVAL BASKET items are correct.');
		if (confirmation) {
			var last_confirmation = confirm('Voiding items is highly discouraged. Please confirm for a second time that the RETRIEVAL BASKET contents are correct and accurate.');
			if (last_confirmation) {
				duration = 25000;
				variation = 'basic';
				if (retrieval_cart_type == 'first') {
					var ajax = $.ajax({
						method: 'POST',
						url   : '<?php echo base_url();?>i.php/sims_control/retrieval_checkout',
						data  : {
							retrieval_type: retrieval_cart_type,
							retrieval_cart_array: JSON.stringify(retrieval_cart_array),
							retrieval_cart_indexer: JSON.stringify(retrieval_cart_indexer),
							requestor_id: $('#requestor_id').val(),
							request_purpose: $('#request_purpose').val(),
							request_date: $('#request_date').val()
						}
					});
					var jqxhr = ajax
					.done(function() {
						duration = 25000;
						variation = 'basic';

						var response_data = jqxhr.responseText;
						if (response_data == 'restict_past_deployment') {
							icon = 'warning orange';
							header = 'Invalid Retrieval Date';
							message = 'A retrieval attempt beyond permissible date was made. Retrieval request rejected.';
							// load_admin_inventory_raw();
							// reset_restocking_cart();
							load_notification(icon, header, message, duration, '', '', variation)
						}
						else if (response_data == 'restict_past_currdate') {
							icon = 'warning orange';
							header = 'Invalid Retrieval Date';
							message = 'A retrieval attempt beyond the current or previous month was made. Retrieval request rejected.';
							// load_admin_inventory_raw();
							// reset_restocking_cart();
							load_notification(icon, header, message, duration, '', '', variation)
						}
						else {
							icon = 'check green';
							header = 'Requisition Successful';
							message = '<strong>Items requisitioned successfully.</strong>';
							reset_retrieval_cart();
							load_notification(icon, header, message, duration, '', '', variation)
						}
					})
					.fail(function()  {
						icon = 'x red';
						header = 'Requisition Failed';
						message = '<strong>Supplies requisition failed. Please try again.</strong>';
						load_notification(icon, header, message, duration, '', '', variation)
					})
				}
				else if (retrieval_cart_type == 'second') {
					duration = 25000;
					variation = 'basic';
					var ajax = $.ajax({
						method: 'POST',
						url   : '<?php echo base_url();?>i.php/sims_control/retrieval_checkout',
						data  : {
							retrieval_type: retrieval_cart_type,
							retrieval_cart_array: JSON.stringify(retrieval_cart_array),
							retrieval_cart_indexer: JSON.stringify(retrieval_cart_indexer),
							requisition_id: $('#requisition_id').val()
						}
					});
					var jqxhr = ajax
					.done(function() {
						icon = 'check green';
						header = 'RIS Insertion Successful';
						message = '<strong>RIS items inserted successfully.</strong>';
						load_notification(icon, header, message, duration, '', '', variation)
						reset_retrieval_cart();
						console.log(jqxhr.responseText);
					})
					.fail(function()  {
						icon = 'x red';
						header = 'RIS Insertion Failed';
						message = '<strong>RIS insertion failed. Please try again.</strong>';
						load_notification(icon, header, message, duration, '', '', variation)
					})
				}
			}
		}
	}
	function reset_restocking_cart() {
		empty_restocking_cart();
		$('#restocking_form').trigger('reset');
	}
	function empty_restocking_cart() {
		restocking_cart_array.length = 0;
		restocking_cart_indexer.length = 0;
		$('#restocking_items_container').empty();
		restocking_validity_check()
	}
	$('#restocking_cart_checkout')
		.on('dblclick', restocking_checkout)
	;
	function restocking_checkout() {
		var confirmation = confirm('Please confirm that all RESTOCKING CART items are correct.');
		if (confirmation) {
			var last_confirmation = confirm('Voiding items is highly discouraged. Please confirm for a second time that the RESTOCKING CART contents are correct and accurate.');
			if (last_confirmation) {
				var ajax = $.ajax({
					method: 'POST',
					url   : '<?php echo base_url();?>i.php/sims_control/restocking_checkout',
					data  : {
						restocking_cart_array: JSON.stringify(restocking_cart_array),
						restocking_cart_indexer: JSON.stringify(restocking_cart_indexer),
						restocking_code: $('#restocking_reference_code').val(),
						restock_date: $('#restock_date').val()
					}
				});
				var jqxhr = ajax
				.done(function() {
					duration = 25000;
					variation = 'basic';
					if (restocking_cart_indexer.length > 1) {
						item_message = 'Items';
					}
					else {
						item_message = 'Item';
					}

					var response_data = jqxhr.responseText;
					if (response_data == 'restict_past_deployment') {
						icon = 'warning orange';
						header = 'Invalid Restock Insertion';
						message = 'A restock insertion attempt beyond permissible date was made. Restock request rejected.';
						load_admin_inventory_raw();
						reset_restocking_cart();
						load_notification(icon, header, message, duration, '', '', variation)
					}
					else if (response_data == 'restict_past_currdate') {
						icon = 'warning orange';
						header = 'Invalid Restock Insertion';
						message = 'A restock insertion attempt beyond the current or previous month was made. Restock request rejected.';
						load_admin_inventory_raw();
						reset_restocking_cart();
						load_notification(icon, header, message, duration, '', '', variation)
					}
					else {
						icon = 'check green';
						header = 'Inventory Restock Successful';
						message = item_message+' restocked successfully.';
						load_admin_inventory_raw();
						reset_restocking_cart();
						load_notification(icon, header, message, duration, '', '', variation)	
					}
				})
				.fail(function()  {
					duration = 25000;
					variation = 'basic';
					icon = 'x red';
					header = 'Inventory Restock Failed';
					message = 'Inventory restocking failed. Please try again.';
					load_notification(icon, header, message, duration, '', '', variation)
				})
				.always(function() {
					
				})
			}
		}
	}
	$('#item_update_form')
	  	.form({
	  		on: 'change',
	  		inline: true,
	    	transition: 'swing down',
	        onSuccess: function(event) {
	        	event.preventDefault();
				if($('#item_update_form').form('is valid')) {
					var confirmation = confirm('Please confirm Item data update submission.');
					if (confirmation) {
						update_stock_data();
					}
				}
	        },
	    	fields: {
	      		item_name_update: {
			        identifier: 'item_name_update',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Name.'
			          	}
			        ]
	      		},
	      		item_price_update: {
			        identifier: 'item_price_update',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Price.'
			          	}
			        ]
	      		},
	      		item_unit_update: {
			        identifier: 'item_unit_update',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Unit.'
			          	}
			        ]
	      		},
	      		item_category_update: {
			        identifier: 'item_category_update',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Category.'
			          	}
			        ]
	      		},
	      		item_description_update: {
			        identifier: 'item_description_update',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Description.'
			          	}
			        ]
	      		}
	      	}
	    })
	;
	$('#item_update_form')
	  	.form({
	  		on: 'change',
	  		inline: true,
	    	transition: 'swing down',
	        onSuccess: function(event) {
	        	event.preventDefault();
				if($('#item_update_form').form('is valid')) {
					var confirmation = confirm('Please confirm Item data update submission.');
					if (confirmation) {
						update_stock_data();
					}
				}
	        },
	    	fields: {
	      		item_name_update: {
			        identifier: 'item_name_update',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Name.'
			          	}
			        ]
	      		},
	      		item_price_update: {
			        identifier: 'item_price_update',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Price.'
			          	}
			        ]
	      		},
	      		item_unit_update: {
			        identifier: 'item_unit_update',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Unit.'
			          	}
			        ]
	      		},
	      		item_low_level_update: {
			        identifier: 'item_low_level_update',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Unit.'
			          	}
			        ]
	      		},
	      		item_category_update: {
			        identifier: 'item_category_update',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Category.'
			          	}
			        ]
	      		},
	      		item_description_update: {
			        identifier: 'item_description_update',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Description.'
			          	}
			        ]
	      		}
	      	}
	    })
	;
	function update_stock_data() {
		// duration = 25000;
		// variation = 'basic';
		// icon = 'warning orange';
		// header = 'Update Disabled';
		// message = 'The update feature is currently disabled due to algorithm conflicts, please contact the developer for manual backend updating.';
		// location.reload();
		// load_notification(icon, header, message, duration, '', '', variation)	
		
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sims_control/update_stock_data',
			data  : new FormData($('#item_update_form')[0]),
			contentType: false,
			cache: false,
			processData: false
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = jqxhr.responseText;
			duration = 25000;
			variation = 'basic';

			if (response_data == 'success') {
				icon = 'check green';
				header = 'Update Successful';
				message = 'Item Data updated successfully. Page wil reload shortly to reflect the changes.';
				location.reload();
				load_notification(icon, header, message, duration, '', '', variation)	
			}
			else {
				icon = 'warning orange';
				header = 'Update Rejected';
				message = response_data+' already exists in the system. Update request was rejected';
				load_admin_inventory_raw();
				load_notification(icon, header, message, duration, '', '', variation)
			}
		})
		.fail(function()  {
			duration = 25000;
			variation = 'basic';
			icon = 'x red';
			header = 'Update Failed';
			message = 'Failed to update Item Data. Please try again.';
			load_notification(icon, header, message, duration, '', '', variation)
		})
		.always(function() {
		})
	}
	$('#new_item_form')
	  	.form({
	  		on: 'change',
	  		inline: true,
	    	transition: 'swing down',
	        onSuccess: function(event) {
	        	event.preventDefault();
				if($('#new_item_form').form('is valid')) {
					var confirmation = confirm('Please double-check that all entries are correct. Press "OK" if no omissions were found.');
					if (confirmation) {
						add_new_item();
					}
				}
	        },
	    	fields: {
	      		new_item_name: {
			        identifier: 'new_item_name',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Name.'
			          	}
			        ]
	      		},
	      		new_item_price: {
			        identifier: 'new_item_price',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Price.'
			          	}
			        ]
	      		},
	      		new_item_unit: {
			        identifier: 'new_item_unit',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Unit.'
			          	}
			        ]
	      		},
	      		new_item_category: {
			        identifier: 'new_item_category',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Category.'
			          	}
			        ]
	      		},
	      		new_item_description: {
			        identifier: 'new_item_description',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Item Description.'
			          	}
			        ]
	      		},
	      		new_item_low_level: {
			        identifier: 'new_item_low_level',
			        rules: [
			          	{
			            	type   : 'empty',
			            	prompt : 'Please enter a valid Number.'
			          	}
			        ]
	      		}
	      	}
	    })
	;
	function add_new_item() {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sims_control/add_new_item',
			data  : new FormData($('#new_item_form')[0]),
			contentType: false,
			cache: false,
			processData: false
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = jqxhr.responseText;
			duration = 25000;
			variation = 'basic';

			if (response_data == 'success') {
				icon = 'check green';
				header = 'Creation Successful';
				message = 'Item Data added successfully. Page wil reload shortly to reflect the changes.';
				location.reload();
				load_notification(icon, header, message, duration, '', '', variation)	
			}
			else {
				icon = 'warning orange';
				header = 'Creation Rejected';
				message = response_data+' already exists in the system. Item Creation request was rejected';
				load_admin_inventory_raw();
				load_notification(icon, header, message, duration, '', '', variation)
			}
		})
		.fail(function()  {
			duration = 25000;
			variation = 'basic';
			icon = 'x red';
			header = 'Item Creation Failed';
			message = 'Inventory Item Creation failed. Please try again.';
			load_notification(icon, header, message, duration, '', '', variation)
		})
		.always(function() {
			
		})
	}
	function ris_item_void(reference_items_id, reference_type) {
		var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sims_control/ris_item_void',
			data  : {
				reference_items_id: reference_items_id,
				reference_type: reference_type
			}
		});
		var duration = 25000;
		var overlay = 'multiple';
		var variation = '';
		var jqxhr = ajax
		.done(function() {
			var response_data = jqxhr.responseText;
			
			if (response_data == 'request_stock_origin_whole') {
				icon = 'check violet';
				header = 'Voided Successfully';
				message = 'The Requisition Item has been successfully voided.<br>As it was the final item in the related RIS, the RIS has also been deleted.';
				var response = 'success_whole';
			}
			else if (response_data == 'request_stock_origin') {
				icon = 'check violet';
				header = 'Voided Successfully';
				message = 'The Requisition Item has been successfully voided.';
				var response = 'success';
			}
			else if (response_data == 'request_stock_non-origin') {
				icon = 'x red';
				header = 'Void Request Denied';
				message = 'The Requisition Item requested for voiding belongs to the most recent previous stock, and the present stock was already deducted from. In order to maintain the system\'s algorithmic integrity, this request is denied.';
				var response = 'failed';
			}
			else if (response_data == 'request_stock_old') {
				icon = 'x red';
				header = 'Void Request Denied';
				message = 'The stock of the Requisition Item you attempted to void does not belong to the current active stock or the previous one. Voiding items beyond the current and most recent previous stock is not permitted in order to maintain the integrity of the system\'s First In, First Out (FIFO) algorithm.';
				var response = 'failed';
			}
			else if (response_data == 'restict_past_currdate') {
				icon = 'x red';
				header = 'Void Request Denied';
				message = 'Voiding items beyond the previous month is not permitted. In order to maintain the system\'s algorithmic integrity, this request is denied.';
				var response = 'failed';
			}
			else if (response_data == 'restock_stock_origin_whole') {
				icon = 'check violet';
				header = 'Voided Successfully';
				message = 'The Restocking Item has been successfully voided.<br>As it was the final item in the related RIS, the RIS has also been deleted.';
				var response = 'success_whole';
			}
			else if (response_data == 'restock_stock_origin') {
				icon = 'check violet';
				header = 'Voided Successfully';
				message = 'The Restocking Item has been successfully voided.';
				var response = 'success';
			}
			else if (response_data == 'restock_stock_non-origin') {
				icon = 'x red';
				header = 'Void Request Denied';
				message = 'The Restocking Item requested for voiding has already been deducted from. In order to maintain the system\'s algorithmic integrity, this request is denied.';
				var response = 'failed';
			}
			else if (response_data == 'restict_past_deployment') {
				icon = 'x red';
				header = 'Void Request Denied';
				message = 'The Restocking Item requested for voiding was created before the current app version. In order to maintain the system\'s updated algorithmic integrity, this request is denied.';
				var response = 'failed';
			}
			load_notification(icon, header, message, duration, '', overlay, variation)	
			if (response == 'success_whole') {
				load_inventory_rsmi_data($('#report_date').val());
				$('#ris_view_closer').trigger('click');
				load_admin_inventory_raw();
			}
			else if (response == 'success') {
				$('#ris_item'+reference_items_id)
					.fadeOut(500, function() {
			 			$(this).remove();
				 	})
				;
				load_admin_inventory_raw();
			}
		})
		.fail(function()  {
			duration = 25000;
			variation = 'basic';
			icon = 'x red';
			header = 'Action Failed';
			message = 'Please try again.';
			load_notification(icon, header, message, duration, '', overlay, variation)
		})
		.always(function() {
			
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
			var today = current_date.dateWords();
			var selected_date = ($(this).val()).dateWords();
	    	current_reports_date = $(this).val();
	    	if (current_reports_date == current_date) {
	    		selected_date = 'Today';
	    	}
	    	loading_start('Loading Reports Data for <x class="green-text">'+selected_date+'</x>');

			setTimeout(function() {
				load_inventory_rsmi_data();  
			}, 800);
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
							    	<div class="ui tiny basic grey compact label" id="reference_code`+reference_id+`">`+reference_date+`
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
					  				<div class="ui tiny basic grey compact label" id="reference_code`+reference_id+`">`+reference_date+`
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
		       			var reference_id = $(this).attr('data-reference_id');
		       			var reference_code = $(this).attr('data-reference_code');
		       			var purpose = $(this).attr('data-purpose');
		       			var reference_name = $(this).attr('data-reference_name');
		       			var reference_date = $(this).attr('data-reference_date');
		       			var ris_type = $(this).attr('data-ris_type');

		       			if (ris_type == 'requisition') {
			       			$('#ris_print_button').show();
		       			} 
		       			else if (ris_type == 'restocking') {
			       			$('#ris_print_button').hide();
		       			}

		       			$('#ris_void_button').attr('data-reference_id', reference_id);
						$('#ris_void_button').on('dblclick', function () {
							var confirmation = confirm("Are you sure you want to void this RIS?");
							if (confirmation) {
								var secondary_confirmation = confirm("Voiding this RIS would result in permanent inventory data loss, are you sure you want to proceed?")
								if (secondary_confirmation) {
									ris_void(reference_id);
								}
							}
						});

		       			$('#ris_reference_name').val(reference_name);
		       			$('#ris_reference_date').val(reference_date);
		       			$('#ris_purpose').val(purpose);

		       			load_ris_data(reference_id, ris_type);
		       		})
		       	;
			}
			else {
				$('#rsmi_empty_placeholder').removeClass('invisible');
			}
		    setTimeout(function() {
	    	    // loading_stop();
		    	$('#inventory_reports_modal')
			        .modal({
						useFlex: true,
						allowMultiple: false,
						autofocus: false,
						blurring: false,
						closable: false
					})
			        .modal('show')
			    ;	
		    }, 1000)
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
				var ris_total = 0;
				$.each(response_data, function(key, value) {
					var reference_items_id = value.reference_items_id;
					var reference_id = value.reference_id;
					var reference_code = value.reference_code;
					var item_code = value.item_code;
			        var item_unit = value.item_unit.toLowerCase();
					var item_price = value.item_price;
					var item_name = value.item_name;
					var quantity = value.quantity;
					var category_name = value.category_name;
					var category_acronym = category_name.match(/[A-Z]/g).join('');
					var original_unit = item_unit;
					
					ris_total += item_price*quantity;
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
		       			var class_color = 'blue';
						var reference_type = 'retrieval';

						$('#ris_view_main_header').removeClass('teal');
					}
					else {
		       			var icon_element = '<i class="dolly icon teal link"></i>';
		       			var class_color = 'teal';
						var reference_type = 'restocking';
						
						$('#ris_view_main_header').removeClass('blue');
					}
					
					$('#ris_view_main_header').addClass(class_color);
					$('#ris_view_main_header').html(icon_element);
       				$('#ris_view_main_header').append(reference_code);

	       			$('#ris_print_button').attr('data-requisition_id', reference_id);

					ris_data = `
						<div class="item" id="ris_item`+reference_items_id+`" data-reference_items_id="`+reference_items_id+`">
						    <div class="right floated content">
						    	<div class="ui right pointing dropdown ris_item_menu`+reference_items_id+` pointered compact">
				  					<div class="compact mini ui basic grey button"><x id="ris_quantity`+reference_items_id+`">`+quantity+`</x> `+item_unit+`
				  					</div>
					  				<div class="ui mini menu">
									    <div class="fitted item tiny ris_item_remover" data-reference_items_id="`+reference_items_id+`" data-reference_type="`+reference_type+`">
			        						<i class="close icon purple"></i>
									    	Void
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
					$('.ris_item_menu'+reference_items_id)
					  	.dropdown({
					  		action: 'nothing',
					  		direction: 'upward',
					  		transition: 'drop'
					  	})
					;
				})
				ris_total = '₱'+Number(ris_total).toFixed(2);
				$('#ris_total').html(ris_total);
				$('.ris_item_remover').on('dblclick', function () {
					var reference_items_id = $(this).attr('data-reference_items_id');
					var reference_type = $(this).attr('data-reference_type');
					
					var confirmation = confirm("Are you sure you want to void this RIS Item?");
					if (confirmation) {
						if (response_data.length == 1) {
							var secondary_confirmation = confirm("Deleting the last item on this RIS will void the related RIS, which will result in permanent inventory data loss. Are you sure you want to proceed?");
							if (secondary_confirmation) {
								ris_item_void(reference_items_id, reference_type);
							}
						}
						else {
							ris_item_void(reference_items_id, reference_type);
						}
					}
					else {
						// alert('cancelled');
					}
				});
				$('#ris_view_modal')
					.modal({
						transition: 'fade down',
						closable: false,
						blurring: false,
						autofocus: false,
						allowMultiple: true,
						onHidden: function() {
							$('#inventory_reports_modal')
								.modal('refresh')
							;	
						}
					})
					.modal('show')
					.modal('refresh')
				;
			}
		})
	}

	function initialize_report_load(report_type) {
		requisition_id = '';
		if (report_type == 'rsmi') {
			report_url = '<?php echo base_url();?>i.php/sims_control/initialize_rsmi_switch';
		}
		else if (report_type == 'rpci') {
			report_url = '<?php echo base_url();?>i.php/sims_control/initialize_rpci_switch';
		}
		else if (report_type == 'ris') {
			report_url = '<?php echo base_url();?>i.php/sims_control/initialize_ris_switch';
			requisition_id = $('#ris_print_button').attr('data-requisition_id');
		}
		var ajax = $.ajax({
			method: 'POST',
			url   : report_url,
			data  : {
				requisition_id: requisition_id,
				report_date: $('#report_date').val(),
				report_category: $('#report_category').val()
			}
		});
		var jqxhr = ajax
		.done(function() {
			setTimeout(function() {
				loading_stop();
			}, 1500)
			if (report_type == 'ris') {
	            window.open("<?php echo base_url();?>i.php/sims_control/ris_view", "_blank");
    	    }
			setTimeout(function() {
				if (report_type == 'rsmi') {
		            window.open("<?php echo base_url();?>i.php/sims_control/rsmi_issuance_report", "_blank");
	    	    }
	    	    else if (report_type == 'rpci') {
		            window.open("<?php echo base_url();?>i.php/sims_control/rpci_report", "_blank");
	    	    }
	    	    $('#inventory_reports_modal')
	    	    	.modal({
						useFlex: true,
						allowMultiple: false,
						autofocus: false,
						blurring: false,
						closable: false
					})
			        .modal('show')
			    ;
			}, 1200)
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
    	    
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
	$('#ris_print_button').on('dblclick', function() {
    	// loading_start('Loading RIS');
		initialize_report_load('ris');
	});
	$('#report_settings_activator').on('dblclick', function() {
		$('#inventory_settings_modal')
	    	.modal({
				useFlex: true,
				allowMultiple: true,
				autofocus: false,
				blurring: false,
				closable: false
			})
	        .modal('show')
	    ;
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