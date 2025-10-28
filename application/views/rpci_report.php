<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url();?>photos/icons/psas-SIMS.png">
	<title>RPCI</title>
</head>
<style type="text/css">
	table {
		border-collapse: collapse;
	}
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
		border: solid 1px grey;
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
	.td_xs {
		width: 4vw;
		max-width: 4vw;
	}
	.td_s {
		width: 6vw;
		max-width: 6vw;
	}
	.td_m {
		width: 8vw;
		max-width: 15vw;
	}
	.td_l {
		width: 10vw;
		max-width: 20vw;
	}
	.td_xl {
		width: 14vw;
		max-width: 25vw;	
	}
	.hide {
		display: none;
	}
	td, th {
		word-wrap: break-word;
	}
	.padded_left_th {
		padding-left: 0.3em;
	}
	.padded_right_th {
		padding-right: 0.3em;
	}
	.bg-yellow {
		background-color: gold;
	}
	.tilted-text {
	  	transform: rotate(45deg);
	  	display: inline-block;
	}
	@media print {
		@page {
		    size: 184.15mm 266.7mm;
		    margin: 10mm;
		    box-shadow: 0;
	  	}
	  	body {
			-webkit-print-color-adjust: exact;
		    margin: 10mm;
		    zoom: 80%;
	  	}
	  	table {
		    width: 100%;
		    border-collapse: collapse;
		}

	  	thead {
		    display: table-header-group;
		}

		tfoot {
		    display: table-footer-group; /* Optional */
		}
	}
</style>
<!-- <body> -->
<body onload="load_rpci_primary_data()">
	<br>
	<h1 class="hide" align="center" id="empty_message"><br>No RPCI Report to Generate</h1>
	<table align="center" class="borderless" id="rpci_table">
		<thead class="borderless">
			<tr>
				<th class="borderless" colspan="20" align="center">REPORT ON THE PHYSICAL COUNT OF INVENTORIES</th>			
			</tr>
			<tr>
				<th class="borderless" colspan="20" align="center" id="category_name">OTHER SUPPLIES AND MATERIALS</th>			
			</tr>
			<tr>
				<th class="borderless" colspan="20" align="center">As of <span id="date_holder"></span></th>
			</tr>
			<tr>
				<th class="borderless"><br></th>
			</tr>
			<tr align="left">
				<th class="borderless" colspan="1">Fund Cluster: <u contenteditable id="fund_cluster">GAA</u></th>
			</tr>
			<tr align="left">
				<th class="borderless" colspan="20">For which <u id="sign1_name">KENNETH H. LAURINO</u>, <u id="label1_name">Administrative Officer I Designate Supply Officer</u> is accountable, having assumed such accountability on <u contenteditable id="label4" onblur="update_rpci_signatories();"></u></th>
			</tr>
			<tr>
				<th class="borderless"><br></th>
			</tr>
			<tr align="center" class="bg-yellow">
				<th colspan="4" rowspan="3" class="td_xl">Article</th>
				<th colspan="2" rowspan="3" class="td_l">Description</th>
				<th colspan="2" rowspan="3" class="td_m">Stock Number (SL#)</th>
				<th colspan="2" rowspan="3" class="td_s">Unit of Meas.</th>
				<th colspan="2" rowspan="3" class="td_s">On Hand per Card Quantity</th>
				<th colspan="2" rowspan="3" class="td_s">On Hand per Card Count</th>
				<th colspan="2" rowspan="3" class="td_s">Unit Value</th>
				<th colspan="2">Shortage</th>
				<th colspan="2" rowspan="3" class="td_s">Total</th>
			</tr>
			<tr class="bg-yellow">
				<th colspan="2">Overage</th>
			</tr>
			<tr class="bg-yellow">
				<th colspan="1" class="td_xs"><small>Qty</small></th>
				<th colspan="1" class="td_xs"><small>Value</small></th>
			</tr>
		</thead>		
		<tbody id="reports_container">
			
		</tbody>
		<tbody>
			<tr class="bg-yellow">
				<th colspan="18" align="right" class="padded_right_th">Grand Total =</th>
				<th colspan="2" id="grand_total_holder" align="right" class="padded_right_th"></th>
			</tr>
			<tr>
				<th colspan="20" class="no-top no-bottom"><br></th>
			</tr>
		</tbody>
		<tbody>
			<tr align="left">
				<td colspan="5" class="no-bottom no-right no-top">&emsp;Certified Correct by:</td>
				<td colspan="9" class="borderless">&emsp;Approved by:</td>
				<td colspan="11" class="no-bottom no-top no-left">&emsp;Verified by:</td>
			</tr>
			<tr align="center">
				<td colspan="5" class="no-bottom no-top no-right">
					<br>
					<u>
						<b contenteditable id="sign1" onblur="update_rpci_signatories();"></b>
					</u>
					<br>
					<span contenteditable id="label1" onblur="update_rpci_signatories();"></span>
				</td>
				<td colspan="7" class="borderless">
					<br>
					<u>
						<b contenteditable id="sign2" onblur="update_rpci_signatories();"></b>
					</u>
					<br>
					<span contenteditable id="label2" onblur="update_rpci_signatories();"></span>
				</td>
				<td colspan="8" class="no-bottom no-top no-left">
					<br>
					<u>
						<b contenteditable id="sign3" onblur="update_rpci_signatories();"></b>
					</u>
					<br>
					<span contenteditable id="label3" onblur="update_rpci_signatories();"></span>
				</td>
			</tr>
			<tr align="center">
				<td colspan="1" class="no-bottom no-top no-right"></td>
			</tr>
			<tr>
				<td colspan="20" class="no-top"><br></td>
			</tr>
		</tbody>
	</table>
</body>
<script type="text/javascript">
	var grand_total = 0;

	function element(id) {
        return document.getElementById(id);
    }
    String.prototype.UCwords = function() {
        return this.replace(/\w+/g, function(a){ 
            return a.charAt(0).toUpperCase() + a.slice(1).toLowerCase()
        })
    }
    String.prototype.UCfirst = function() {
        return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase()
    }
    function num_handle(str) {
	    return str.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
	function load_rpci_primary_data() {
		//Loads items and stocks data
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_rpci_primary_data';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);
		        element('reports_container').innerHTML = '';

		        if (output_data.length == 0) {
		        	element('rpci_table').classList.add('hide');
		        	element('empty_message').classList.remove('hide');
		        }
		        else {
		        	element('rpci_table').classList.remove('hide');
		        	element('empty_message').classList.add('hide');	
		        }
		        
				previous_item_name = '';
				previous_stock_amount = '';
				previous_item_id = '';
		        previous_item_price = '';

		        label_a = 0;
		        label_b = 0;
		        label_c = 0;
		        label_d = 0;
		        label_e = 0;
		        label_f = 0;

	            for (x = 0; x < output_data.length; x++) {
			    	
			    	item_id = output_data[x].item_id;
			    	item_name = output_data[x].item_name;
					item_description = output_data[x].item_description;
					item_code = output_data[x].item_code;
					item_unit = output_data[x].item_unit;
					stock_amount = output_data[x].stock_amount;
					item_price = output_data[x].item_price;
					category_name = output_data[x].category_name;
			    	item_name_view = output_data[x].item_name;

					// if (stock_amount == '-1') {
						stock_amount = 0;
					// }

					if (item_name == previous_item_name) {
						item_name = '';
						item_description = '';
						item_code = '';
						item_unit = '';
					}

					if (item_code == 'A-045') {
		        		console.log(stock_amount);
		        	}

					total_cost = Number(stock_amount)*Number(item_price);
					grand_total = Number(grand_total)+Number(total_cost);

					if (element('row'+item_id+item_price)) {
						current_stock = element('item_stock1'+item_id+item_price).innerHTML;
						next_stock = Number(stock_amount)+Number(current_stock);

						current_total = element('item_total'+item_id+item_price).getAttribute('data-item_total');
						if (current_total === null) {
							current_total = '0.00';
						}

						next_total = Number(next_stock*item_price);

						element('item_stock1'+item_id+item_price).innerHTML = next_stock;
						element('item_stock2'+item_id+item_price).innerHTML = next_stock;
						element('item_total'+item_id+item_price).innerHTML = num_handle(Number(next_total).toFixed(2));
						element('item_total'+item_id+item_price).setAttribute('data-item_total', Number(next_total));
					}
					else if (previous_item_id == item_id && previous_stock_amount == 0) {
						report_data = `
				        <tr id="row`+item_id+item_price+`" data-indexval="`+x+`" data-item_id="`+item_id+`" data-amount_total="`+stock_amount+`">
				        	<th colspan="4"></th>
							<th colspan="2"></th>
							<th colspan="2"></th>
							<th colspan="2"></th>
							<th colspan="2"><small id="item_stock1`+item_id+item_price+`">`+num_handle(Number(stock_amount).toFixed(0))+`</small></th>
							<th colspan="2"><small id="item_stock2`+item_id+item_price+`">`+num_handle(Number(stock_amount).toFixed(0))+`</small></th>
							<th colspan="2" align="right" class="padded_right_th"><small id="item_price`+item_id+item_price+`">`+num_handle(Number(item_price).toFixed(2))+`</small></th>
							<th colspan="1"><small></small></th>
							<th colspan="1"><small></small></th>
							<th colspan="2" align="right" class="padded_right_th"><small id="item_total`+item_id+item_price+`" data-item_total="`+Number(total_cost)+`">`+num_handle(Number(total_cost).toFixed(2))+`</small></th>
				        </tr>`;	
		        		element('reports_container').innerHTML += report_data;
						// current_stock = element('item_stock1'+previous_item_id+previous_item_price).innerHTML;
						// next_stock = Number(stock_amount)+Number(current_stock);

						// current_total = element('item_total'+previous_item_id+previous_item_price).innerHTML;
						// next_total = Number(next_stock*item_price);

						// element('item_stock1'+previous_item_id+previous_item_price).innerHTML = next_stock;
						// element('item_stock2'+previous_item_id+previous_item_price).innerHTML = next_stock;
						// element('item_price'+previous_item_id+previous_item_price).innerHTML = item_price;
						// element('item_total'+previous_item_id+previous_item_price).innerHTML = num_handle(Number(next_total).toFixed(2))+'&emsp;';
					}
					else{
				        report_data = `
				        <tr id="row`+item_id+item_price+`" data-indexval="`+x+`" data-item_id="`+item_id+`" data-amount_total="`+stock_amount+`">
				        	<th colspan="4" align="left" class="padded_left_th"><small>`+item_name+`</small></th>
							<th colspan="2"><small>`+item_description+`</small></th>
							<th colspan="2"><small>`+item_code+`</small></th>
							<th colspan="2"><small>`+item_unit+`</small></th>
							<th colspan="2"><small id="item_stock1`+item_id+item_price+`">`+num_handle(Number(stock_amount).toFixed(0))+`</small></th>
							<th colspan="2"><small id="item_stock2`+item_id+item_price+`">`+num_handle(Number(stock_amount).toFixed(0))+`</small></th>
							<th colspan="2" align="right" class="padded_right_th"><small id="item_price`+item_id+item_price+`">`+num_handle(Number(item_price).toFixed(2))+`</small></th>
							<th colspan="1"><small></small></th>
							<th colspan="1"><small></small></th>
							<th colspan="2" align="right" class="padded_right_th"><small id="item_total`+item_id+item_price+`" data-item_total="`+Number(total_cost)+`">`+num_handle(Number(total_cost).toFixed(2))+`</small></th>
				        </tr>`;	
		        		element('reports_container').innerHTML += report_data;

		        		if (item_code.includes("A-") && label_a == 0) {
		        			label = 'A - OFFICE SUPPLIES';
		        			label_a = 1;
		        			add_row('row'+item_id+item_price, label);
		        		}
		        		else if (item_code.includes("B-") && label_b == 0) {
		        			label = 'B - CONSUMABLES';
		        			label_b = 1;
		        			add_row('row'+item_id+item_price, label);
		        		}
		        		else if (item_code.includes("C-") && label_c == 0) {
		        			label = 'C - COMPUTER SUPPLIES';
		        			label_c = 1;
		        			add_row('row'+item_id+item_price, label);
		        		}
		        		else if (item_code.includes("D-") && !item_code.includes("OSMD") && label_d == 0) {
		        			label = 'D - JANITORIAL SUPPLIES';
		        			label_d = 1;
		        			add_row('row'+item_id+item_price, label);
		        		}
		        		else if (item_code.includes("E-") && label_e == 0) {
		        			label = 'E - ELECTRICAL SUPPLIES';
		        			label_e = 1;
		        			add_row('row'+item_id+item_price, label);
		        		}
		        		else if (item_code.includes("F-") && !item_code.includes("FF") && label_f == 0) {
		        			label = 'F - VEHICLE SUPPLIES/MATERIALS';
		        			label_f = 1;
		        			add_row('row'+item_id+item_price, label);
		        		}
					}

			        previous_item_name = item_name;
			        previous_stock_amount = stock_amount;
			        previous_item_id = item_id;
			        previous_item_price = item_price;
		        }
				element('category_name').innerHTML = category_name.toUpperCase();
		        element('grand_total_holder').innerHTML = num_handle(Number(grand_total).toFixed(2));
		        // alert(grand_total);
		        setTimeout(function(){
		    		load_rpci_secondary_data();
		        }, 500);
	        }
	    }
	}
    function load_rpci_secondary_data() {
		//Loads initial data
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_rpci_secondary_data';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);
		        grand_total = element('grand_total_holder').innerHTML;
		        grand_total = grand_total.replaceAll(',', '');
	
	            for (x = 0; x < output_data.length; x++) {
		        	item_id = output_data[x].item_id;
		        	stock_id = output_data[x].stock_id;
		        	stock_amount = output_data[x].stock_amount;
		        	item_price = output_data[x].item_price;

		        	if (stock_amount == '-1') {
						stock_amount = 0;
					}

					// if (item_id == '11') {
					// 	alert(stock_amount)
        			// 	console.log('minus - '+stock_amount);
        			// }
					// console.log(item_id+' - '+stock_amount)
					// if (stock_amount == 0) {
	        		// 	element('row'+item_id+item_price).remove();
					// }

					if (element('row'+item_id+item_price)) {
						// element('row'+item_id+item_price).classList.remove('hide');
						
		      			current_stock = element('item_stock1'+item_id+item_price).innerHTML;
		      			current_stock = current_stock.replaceAll(',', '');

						current_total = element('item_total'+item_id+item_price).getAttribute('data-item_total');
						if (current_total === null) {
							current_total = '0.00';
						}

						next_stock = Number(stock_amount)+Number(current_stock);
						next_total = Number(next_stock)*Number(item_price);
						grand_total = Number(grand_total)+Number(next_total);
						// console.log('sub'+item_code);
						element('row'+item_id+item_price).setAttribute('data-amount_total', Number(next_total));

						element('item_stock1'+item_id+item_price).innerHTML = num_handle(Number(next_stock).toFixed(0));
						element('item_stock2'+item_id+item_price).innerHTML = num_handle(Number(next_stock).toFixed(0));
						element('item_total'+item_id+item_price).innerHTML = num_handle(Number(next_total).toFixed(2));
						element('item_total'+item_id+item_price).setAttribute('data-item_total', Number(next_total));
		      		}
		      	}
		      	// alert(mando);
				// grand_total = grand_total.toFixed(2);
		      	// old_grand_total = element('grand_total_holder').innerHTML;
		   		// old_grand_total = old_grand_total.replaceAll(',', '');
		      	// final_total = grand_total-old_grand_total;

				load_rpci_secondary_additions();
		        element('grand_total_holder').innerHTML = num_handle(Number(grand_total).toFixed(2));
	        }
	    }
	}
	function add_row(id, label) {
		index = element(id).rowIndex-10;

	 	table = element('reports_container');
		row = table.insertRow(index);
		row.setAttribute('style', 'background-color: lightgrey;');
		// row.setAttribute('ondblclick', 'delete_row("'+id+'")');
		for (i = 0; i < 10; i++) {
			if (i == 0) {
				cell = row.insertCell(i);
				cell.innerHTML = '&emsp;'+label;
				cell.colSpan = '20';
				cell.setAttribute('contenteditable', 'true');
			}
		}
		
	}
	function delete_row(id) {
		index = element(id).rowIndex-8;
		table = element('reports_container');
		row = table.deleteRow(index);
	}
	function load_rpci_primary_additions() {
		// Loads requisition data
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_rpci_primary_additions';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);
		        grand_total = element('grand_total_holder').innerHTML;
		        grand_total = grand_total.replaceAll(',', '');
	
	            for (x = 0; x < output_data.length; x++) {
		        	reference_items_id = output_data[x].reference_items_id;
		        	reference_id = output_data[x].reference_id;
		        	reference_code = output_data[x].reference_code;
		        	reference_date = output_data[x].reference_date;
		        	item_price = output_data[x].item_price;
		        	item_id = output_data[x].item_id;
		        	item_code = output_data[x].item_code;
		        	item_unit = output_data[x].item_unit;
		        	item_name = output_data[x].item_name;
		        	quantity = output_data[x].quantity;
		        	category_name = output_data[x].category_name;

		        	if (item_code == 'A-062') {
						alert(quantity)
        				console.log('minus - '+quantity);
        			}	

					if (element('row'+item_id+item_price)) {
						// element('row'+item_id+item_price).classList.remove('hide');
						
		      			current_stock = element('item_stock1'+item_id+item_price).innerHTML;
		      			current_stock = current_stock.replaceAll(',', '');

						current_total = element('item_total'+item_id+item_price).getAttribute('data-item_total');
						if (current_total === null) {
							current_total = '0.00';
						}

						grand_total = Number(grand_total)-Number(current_total);

						next_stock = Number(quantity)+Number(current_stock);
						next_total = Number(next_stock)*Number(item_price);
						grand_total = Number(grand_total)+Number(next_total);

						element('row'+item_id+item_price).setAttribute('data-amount_total', Number(next_total));

						element('item_stock1'+item_id+item_price).innerHTML = num_handle(Number(next_stock).toFixed(0));
						element('item_stock2'+item_id+item_price).innerHTML = num_handle(Number(next_stock).toFixed(0));
						element('item_total'+item_id+item_price).innerHTML = num_handle(Number(next_total).toFixed(2));
						element('item_total'+item_id+item_price).setAttribute('data-item_total', Number(next_total));
		      		}
		      	}
		      	// alert(mando);
				// grand_total = grand_total.toFixed(2);
		      	// old_grand_total = element('grand_total_holder').innerHTML;
		   		// old_grand_total = old_grand_total.replaceAll(',', '');
		      	// final_total = grand_total-old_grand_total;
				
		      	load_rpci_secondary_additions();
		        element('grand_total_holder').innerHTML = num_handle(Number(grand_total).toFixed(2));
	        }
	    }
	}
	function load_rpci_secondary_additions() {
		// Loads restocking data
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_rpci_secondary_additions';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);
		        grand_total = element('grand_total_holder').innerHTML;
		        grand_total = grand_total.replaceAll(',', '');
	
	            for (x = 0; x < output_data.length; x++) {
		        	reference_items_id = output_data[x].reference_items_id;
		        	reference_id = output_data[x].reference_id;
		        	reference_code = output_data[x].reference_code;
		        	reference_date = output_data[x].reference_date;
		        	item_price = output_data[x].item_price;
		        	item_id = output_data[x].item_id;
		        	item_code = output_data[x].item_code;
		        	item_unit = output_data[x].item_unit;
		        	item_name = output_data[x].item_name;
		        	quantity = output_data[x].quantity;
		        	category_name = output_data[x].category_name;

		        	if (item_code == 'A-062') {
						alert(quantity)
        				console.log('minus - '+quantity);
        			}

					if (element('row'+item_id+item_price)) {
						// element('row'+item_id+item_price).classList.remove('hide');
						
		      			current_stock = element('item_stock1'+item_id+item_price).innerHTML;
		      			current_stock = current_stock.replaceAll(',', '');

						current_total = element('item_total'+item_id+item_price).getAttribute('data-item_total');
						if (current_total === null) {
							current_total = '0.00';
						}

						grand_total = Number(grand_total)-Number(current_total);

						next_stock = Number(quantity)+Number(current_stock);
						next_total = Number(next_stock)*Number(item_price);
						grand_total = Number(grand_total)+Number(next_total);

						element('row'+item_id+item_price).setAttribute('data-amount_total', Number(next_total));

						element('item_stock1'+item_id+item_price).innerHTML = num_handle(Number(next_stock).toFixed(0));
						element('item_stock2'+item_id+item_price).innerHTML = num_handle(Number(next_stock).toFixed(0));
						element('item_total'+item_id+item_price).innerHTML = num_handle(Number(next_total).toFixed(2));
						element('item_total'+item_id+item_price).setAttribute('data-item_total', Number(next_total));
		      		}
		      	}
		      	// alert(mando);
				// grand_total = grand_total.toFixed(2);
		      	// old_grand_total = element('grand_total_holder').innerHTML;
		   		// old_grand_total = old_grand_total.replaceAll(',', '');
		      	// final_total = grand_total-old_grand_total;
				
				load_rpci_primary_deductions();
		        element('grand_total_holder').innerHTML = num_handle(Number(grand_total).toFixed(2));
	        }
	    }
	}
	function load_rpci_primary_deductions() {
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_rpci_primary_deductions';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);
		        grand_total = element('grand_total_holder').innerHTML;
		        grand_total = grand_total.replaceAll(',', '');
	
	            for (x = 0; x < output_data.length; x++) {
		        	reference_items_id = output_data[x].reference_items_id;
		        	reference_id = output_data[x].reference_id;
		        	reference_code = output_data[x].reference_code;
		        	reference_date = output_data[x].reference_date;
		        	item_price = output_data[x].item_price;
		        	item_id = output_data[x].item_id;
		        	item_code = output_data[x].item_code;
		        	item_unit = output_data[x].item_unit;
		        	item_name = output_data[x].item_name;
		        	quantity = output_data[x].quantity;
		        	category_name = output_data[x].category_name;

					if (element('row'+item_id+item_price)) {
						// element('row'+item_id+item_price).classList.remove('hide');
						
		      			current_stock = element('item_stock1'+item_id+item_price).innerHTML;
		      			current_stock = current_stock.replaceAll(',', '');

						current_total = element('item_total'+item_id+item_price).getAttribute('data-item_total');
						if (current_total === null) {
							current_total = '0.00';
						}

						grand_total = Number(grand_total)-Number(current_total);

						next_stock = Number(current_stock)-Number(quantity);
						next_total = Number(next_stock)*Number(item_price);
						grand_total = Number(grand_total)+Number(next_total);

						element('row'+item_id+item_price).setAttribute('data-amount_total', Number(next_total));

						if (item_code == 'A-062') {
							alert(quantity)
	        				console.log('minus - '+quantity);
	        			}	
						element('item_stock1'+item_id+item_price).innerHTML = num_handle(Number(next_stock).toFixed(0));
						element('item_stock2'+item_id+item_price).innerHTML = num_handle(Number(next_stock).toFixed(0));
						element('item_total'+item_id+item_price).innerHTML = num_handle(Number(next_total).toFixed(2));
						element('item_total'+item_id+item_price).setAttribute('data-item_total', Number(next_total));
		      		}
		      	}
		      	// alert(mando);
				// grand_total = grand_total.toFixed(2);
		      	// old_grand_total = element('grand_total_holder').innerHTML;
		   		// old_grand_total = old_grand_total.replaceAll(',', '');
		      	// final_total = grand_total-old_grand_total;
		      	load_report_date();
		        element('grand_total_holder').innerHTML = num_handle(Number(grand_total).toFixed(2));
	        }
	    }
	}
	function load_rpci_secondary_deductions() {
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_rpci_secondary_deductions';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);
		        grand_total = element('grand_total_holder').innerHTML;
		        grand_total = grand_total.replaceAll(',', '');
	
	            for (x = 0; x < output_data.length; x++) {
		        	item_id = output_data[x].item_id;
		        	stock_id = output_data[x].stock_id;
		        	stock_amount = output_data[x].stock_amount;
		        	item_price = output_data[x].item_price;

		        	if (stock_amount == '-1') {
						stock_amount = 0;
					}

					if (element('row'+item_id+item_price)) {
						// element('row'+item_id+item_price).classList.remove('hide');
						
		      			current_stock = element('item_stock1'+item_id+item_price).innerHTML;
		      			current_stock = current_stock.replaceAll(',', '');

						current_total = element('item_total'+item_id+item_price).getAttribute('data-item_total');
						if (current_total === null) {
							current_total = '0.00';
						}

						grand_total = Number(grand_total)-Number(current_total);

						next_stock = Number(quantity)-Number(current_stock);
						next_total = Number(next_stock)*Number(item_price);
						grand_total = Number(grand_total)+Number(next_total);
						// console.log('sub'+item_code);

						if (item_code == 'A-045') {
	        				console.log('minus - '+quantity);
	        			}	
						element('item_stock1'+item_id+item_price).innerHTML = num_handle(Number(next_stock).toFixed(0));
						element('item_stock2'+item_id+item_price).innerHTML = num_handle(Number(next_stock).toFixed(0));
						element('item_total'+item_id+item_price).innerHTML = num_handle(Number(next_total).toFixed(2));
						element('item_total'+item_id+item_price).setAttribute('data-item_total', Number(next_total));
		      		}
		      	}
		      	// alert(mando);
				// grand_total = grand_total.toFixed(2);
		      	// old_grand_total = element('grand_total_holder').innerHTML;
		   		// old_grand_total = old_grand_total.replaceAll(',', '');
		      	// final_total = grand_total-old_grand_total;
				load_report_date();
		        element('grand_total_holder').innerHTML = num_handle(Number(grand_total).toFixed(2));
	        }
	    }
	}
	function load_report_date() {
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_report_date';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	response = this.responseText;
	        	words_date = new Date(response);
		        long_date = words_date.toLocaleDateString('en-us', {year:"numeric", month:"long", day:"numeric"})
				element('date_holder').innerHTML = long_date;
				load_rpci_signatories();
	        }
	    }
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

		        }
		      	load_rpci_zero_removal();
	        }
	    }
	}
	function load_rpci_zero_removal() {
		//Loads items and stocks data
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_rpci_primary_data';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);

				for (let x = 0; x < output_data.length; x++) {
				    const item_id = output_data[x].item_id;
				    const item_price = output_data[x].item_price;
				    const stock_amount = output_data[x].stock_amount;

				    const item_check = document.querySelectorAll('[data-item_id="' + item_id + '"]');

				    if (item_check.length > 0) {
				        let total_stock = 0;

				        item_check.forEach(function(el) {
				            const stock = parseFloat(el.getAttribute('data-amount_total')) || 0;
				            total_stock += stock;
				            // alert(el.getAttribute('id'))
				        });

			        	console.log('Item ID:', item_id, 'Total stock:', total_stock);
				        if (total_stock === 0) {
				            row_element = element('row'+item_id+item_price);
				            if (row_element) {
				                row_element.remove();
				            }
				        }
				    }
				}
				setTimeout(function(){
		        	window.print();
				}, 500);
	        }
	    }
	}
	function update_rpci_signatories() {
		sign1 = element('sign1').innerHTML;
    	sign2 = element('sign2').innerHTML;
    	sign3 = element('sign3').innerHTML;
    	label1 = element('label1').innerHTML;
    	label2 = element('label2').innerHTML;
    	label3 = element('label3').innerHTML;
    	label4 = element('label4').innerHTML;

		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/update_rpci_signatories';
      	async = true;

      	data = new FormData();

      	data.append('sign1',sign1);
      	data.append('sign2',sign2);
      	data.append('sign3',sign3);
      	data.append('label1',label1);
      	data.append('label2',label2);
      	data.append('label3',label3);
      	data.append('label4',label4);

      	ajax.open(method, url, async);
      	ajax.send(data);

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        }
	    }
	}
</script>
</html>
