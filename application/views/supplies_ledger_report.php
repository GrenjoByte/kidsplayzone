<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.cdnfonts.com/css/trajan-pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>semantic/semantic.min.css">
	<script
	  src="https://code.jquery.com/jquery-3.1.1.min.js"
	  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	  crossorigin="anonymous"></script>
	<script src="<?php echo base_url();?>semantic/semantic.min.js"></script>
	<link rel="icon" href="<?php echo base_url();?>photos/icons/psa.png">
	<title>Supplies Ledger</title>
</head>
<style type="text/css">
	.no-left {
		border-left: none !important;
	}
	.no-right {
		border-right: none !important;
	}
	.no-top {
		border-top: none !important;
	}
	.no-bottom {
		border-bottom: none !important;
	}
	table, th, td {
		border-spacing: 0px;
		border: solid thin rgb(70, 70, 70, 1);
		color: rgb(50, 50, 50, 1.0);
	}
	.borderless {
		border: none !important;
	}
	.lockto-top {
		position: absolute;
		top: 0px;
		align-self: center; 
		align-content: center;

	}
	.lockto-bottom {
		position: absolute;
		bottom: 0px;
		align-self: center;
		align-content: center;
	}
	page[size="A4"] {
		background: white;
		width: 21cm;
		height: 29.7cm;
		display: block;
		margin: 0 auto;
		margin-bottom: 0.5cm;
		box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
	}
	@media print {
		body, page[size="A4"] {
			margin: 0;
		    box-shadow: 0;
		}
	}
	.td_xs {
		width: 3vw;
		max-width: 3vw;
	}
	.td_s {
		width: 8vw;
		max-width: 8vw;
	}
	.td_m {
		width: 15vw;
		max-width: 15vw;
	}
	.td_l {
		width: 20vw;
		max-width: 20vw;
	}
	.td_xl {
		width: 25vw;
		max-width: 25vw;	
	}
	td {
		word-wrap: break-word;
	}
	th {
		word-wrap: break-word;
	}
</style>
<body onload="load_general_item_data();">
	<br>
	<table align="center" class="borderless">
		<thead class="borderless">
			<tr>
				<th class="borderless" colspan="14" align="center">SUPPLIES LEDGER CARD</th>			
			</tr>
			<tr>
				<th colspan="14" class="borderless"><br></th>
			</tr>
			<tr>
				<th class="borderless" align="left" colspan="10">Entity Name: Philippine Statistics Authority - Samar</th>			
				<th class="borderless" align="right" colspan="4">Fund Cluster: <span contenteditable>RF</span></th>			
			</tr>
			<tr>
				<th colspan="14" class="borderless"><br></th>
			</tr>
		</thead>		
		<tbody>
			<tr>
				<td colspan="1">Item:</td>
				<td colspan="9" id="item_name">ITEM NAME</td>
				<td colspan="2">Item code:</td>
				<td colspan="2" id="item_code"></td>
			</tr>
			<tr>
				<td colspan="1">Description</td>
				<td colspan="9" id="item_description"></td>
				<td colspan="4">Re-Order Point:</td>
			</tr>
			<tr>
				<td colspan="1"><small>Unit of Measurement</small></td>
				<td colspan="9" id="item_unit"></td>
				<td colspan="4"></td>
			</tr>
			<tr>
				<th colspan="1" rowspan="2" class="td_s"><small>Date</small></th>
				<th colspan="3" rowspan="2" class="td_m"><small>Reference</small></th>
				<th colspan="3" class="td_l"><small>Receipt</small></th>
				<th colspan="3" class="td_l"><small>Issue</small></th>
				<th colspan="3" class="td_l"><small>Balance</small></th>
				<th colspan="1" rowspan="2" class="td_s"><small>No. of Days to Consume</small></th>
			</tr>
			<tr>
				<th colspan="1" class="td_xs"><small>Qty.</small></th>
				<th colspan="1" class="td_xs"><small>Unit Cost</small></th>
				<th colspan="1" class="td_xs"><small>Total Cost</small></th>
				<th colspan="1" class="td_xs"><small>Qty.</small></th>
				<th colspan="1" class="td_xs"><small>Unit Cost</small></th>
				<th colspan="1" class="td_xs"><small>Total Cost</small></th>
				<th colspan="1" class="td_xs"><small>Qty.</small></th>
				<th colspan="1" class="td_xs"><small>Unit Cost</small></th>
				<th colspan="1" class="td_xs"><small>Total Cost</small></th>
			</tr>
			<tr align="center">
				<td colspan="1" rowspan="2" class="td_s"><small id="initial_stockin_date"></small></td>
				<td colspan="3" rowspan="2" class="td_m"><small id="beginning_inventory_label"></small></td>
				<td colspan="1" class="td_xs"><small id="receipt_amount"></small></td>
				<td colspan="1" class="td_xs"><small id="receipt_price"></small></td>
				<td colspan="1" class="td_xs"><small id="receipt_total"></small></td>
				<td colspan="1" class="td_xs"><small></small></td>
				<td colspan="1" class="td_xs"><small></small></td>
				<td colspan="1" class="td_xs"><small></small></td>
				<td colspan="1" class="td_xs"><small id="initial_amount"></small></td>
				<td colspan="1" class="td_xs"><small id="initial_price"></small></td>
				<td colspan="1" class="td_xs"><small id="initial_total"></small></td>
				<td colspan="1" class="td_xs" contenteditable><small></small></td>
			</tr>
		</tbody>
		<tbody id="reports_container">
		</tbody>
	</table>
</body>
<script type="text/javascript">
	var	initial_quantity = 0;
	var	initial_total = 0;
	var	view_status = 0;
	function element(id) {
        return document.getElementById(id);
    }
    function num_handle(str) {
	    return str.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
	initial_check = false;
    function load_general_item_data() {
    	var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sims_control/load_general_item_data',
			data  : {
				// active_user_id: active_user_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
			$('#inventory_cards_container').html('');
			if (response_data != '') {
				$.each(response_data, function(key, value) {
	            	var item_name = value.item_name;
	            	var item_code = value.item_code;
	            	var item_description = value.item_description;
	            	var item_unit = value.item_unit;
	            	var stock_amount = value.stock_amount;
	            	var stockin_date = value.stockin_date;
	            	var item_price = value.item_price;
	            	var view_status = value.view_status;

	            	$('#item_name').html(item_name);
	            	$('#item_code').html(item_code);
	            	$('#item_description').html(item_description);
	            	$('#item_unit').html(item_unit);

					if (view_status == 1) {
						if (stock_amount == -1) {
							stock_amount = 0;
						}
						initial_quantity = stock_amount;
						initial_total = Number(item_price*stock_amount).toFixed(2);

						$('#initial_stockin_date').html('As of '+stockin_date);
						$('#initial_amount').html(num_handle(Number(stock_amount).toFixed(0)));
						$('#initial_price').html(num_handle(Number(item_price).toFixed(2)));
						$('#initial_total').html(num_handle(Number(initial_total).toFixed(2)));
						$('#beginning_inventory_label').html('Beginning Inventory');
						initial_check = true;
					}
				});
				load_supplies_ledger_data();
	        }
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
			
	    })
	}
    function load_supplies_ledger_data() {
    	var ajax = $.ajax({
			method: 'POST',
			url   : '<?php echo base_url();?>i.php/sims_control/load_supplies_ledger_data',
			data  : {
				// active_user_id: active_user_id
			}
		});
		var jqxhr = ajax
		.done(function() {
			var response_data = JSON.parse(jqxhr.responseText);
	        initial_price = $('#initial_price').html();
			
	        report_data = ''
	        balance_prices = ''
			if (response_data != '') {
				var instance_count = 0;
				$.each(response_data, function(key, value) {
	            	var stock_id = value.stock_id;
	            	var reference_date = value.reference_date;
	            	var reference_code = value.reference_code;
	            	var quantity = value.quantity;
	            	var item_price = value.item_price;
	            	var total = quantity*item_price;
	            	
	            	// if (balance_prices == '') {
	            	// 	balance_prices += item_price;
	            	// 	active_price = item_price;
	            	// }
	            	// else {
	            	// 	if (balance_prices.indexOf(item_price) == -1) {
		            // 		balance_prices += '<br>'+item_price;
		            // 		active_price = item_price;
		            // 	}	
	            	// }

			        if (reference_code.includes("RF")) {
						current_quantity = Number(initial_quantity)-Number(quantity);
			        	initial_quantity = current_quantity;
				        new_total = Number(initial_total)-Number(total);
				        initial_total = new_total;

			        	report_data += `
				        <tr align="center">
							<td colspan="1" class="td_s"><small>`+reference_date+`</small></td>
							<td colspan="3" class="td_m"><small>`+reference_code+`</small></td>
							<td colspan="1" class="td_xs"><small> </small></td>
							<td colspan="1" class="td_xs"><small> </small></td>
							<td colspan="1" class="td_xs"><small> </small></td>
							<td colspan="1" class="td_xs"><small>`+num_handle(quantity)+`</small></td>
							<td colspan="1" class="td_xs"><small>`+num_handle(Number(item_price).toFixed(2))+`</small></td>
							<td colspan="1" class="td_xs"><small>`+num_handle(Number(total).toFixed(2))+`</small></td>
							<td colspan="1" class="td_xs"><small>`+num_handle(Number(current_quantity).toFixed(0))+`</small></td>
							<td colspan="1" class="td_xs"><small>`+num_handle(Number(item_price).toFixed(2))+`</small></td>
							<td colspan="1" class="td_xs"><small>`+num_handle(Number(new_total).toFixed(2))+`</small></td>
							<td colspan="1" class="td_xs" contenteditable><small> </small></td>
						</tr>`;
			        }
			        else {
			        	current_quantity = Number(initial_quantity)+Number(quantity);
				      	initial_quantity = current_quantity;
					    new_total = Number(initial_total)+Number(total);
					    initial_total = new_total;

			        	if (instance_count == 0 && initial_check == false) {
			        		$('#receipt_amount').html(num_handle(Number(quantity).toFixed(0)));
			        		$('#receipt_price').html(num_handle(Number(item_price).toFixed(2)));
			        		$('#receipt_total').html(num_handle(total));

			        		$('#initial_stockin_date').html(reference_date);
			        		$('#initial_amount').html(num_handle(Number(quantity).toFixed(0)));
			        		$('#initial_price').html(num_handle(Number(item_price).toFixed(2)));
			        		$('#initial_total').html(num_handle(total));
			        		$('#beginning_inventory_label').html(reference_code);
			        	}
			        	else {
				        	report_data += `
					        <tr align="center">
								<td colspan="1" class="td_s"><small>`+reference_date+`</small></td>
								<td colspan="3" class="td_m"><small>`+reference_code+`</small></td>
								<td colspan="1" class="td_xs"><small>`+num_handle(quantity)+`</small></td>
								<td colspan="1" class="td_xs"><small>`+num_handle(Number(item_price).toFixed(2))+`</small></td>
								<td colspan="1" class="td_xs"><small>`+num_handle(Number(total).toFixed(2))+`</small></td>
								<td colspan="1" class="td_xs"><small> </small></td>
								<td colspan="1" class="td_xs"><small> </small></td>
								<td colspan="1" class="td_xs"><small> </small></td>
								<td colspan="1" class="td_xs"><small>`+num_handle(current_quantity)+`</small></td>
								<td colspan="1" class="td_xs"><small>`+num_handle(Number(item_price).toFixed(2))+`</small></td>
								<td colspan="1" class="td_xs"><small>`+num_handle(Number(new_total).toFixed(2))+`</small></td>
								<td colspan="1" class="td_xs" contenteditable><small> </small></td>
							</tr>`;
			        	}
			        } 

			        instance_count++;
		        })
				$('#reports_container').append(report_data);
	        }
		})
		.fail(function()  {
			alert("error");
		})
		.always(function() {
			
	    })
	}
</script>
</html>