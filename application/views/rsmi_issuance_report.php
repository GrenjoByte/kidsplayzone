<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url();?>photos/icons/psas-SIMS.png">
	<title>RSMI</title>
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
	.hide {
		display: none;
	}
	td {
		word-wrap: break-word;
	}
	th {
		word-wrap: break-word;
	}
</style>
<body onload="load_rsmi_data()">
	<br>
	<h1 class="hide" align="center" id="empty_message"><br>No RSMI Report to Generate</h1>
	<table align="center" class="borderless hide" id="rsmi_table">
		<thead class="borderless">
			<tr>
				<th class="borderless" colspan="20" align="center">REPORT OF SUPPLIES AND MATERIALS ISSUED</th>			
			</tr>
			<tr>
				<th class="borderless" colspan="20" align="center" id="category_name"></th>			
			</tr>
			<tr>
				<th class="borderless" colspan="20" align="center">For the Month of <span id="date_holder">September 2023</span></th>
			</tr>
			<tr>
				<th class="borderless"><br></th>
			</tr>
		</thead>		
		<tbody>
			<tr>
				<td colspan="6">Entity Name:</td>
				<td colspan="10" contenteditable>PHILIPPINE STATISTICS AUTHORITY - SAMAR</td>
				<td colspan="2">Serial No:</td>
				<td colspan="2" id="serial_number" contenteditable></td>
			</tr>
			<tr>
				<td colspan="6">Fund Cluster:</td>
				<td colspan="10" contenteditable></td>
				<td colspan="2">Date:</td>
				<td colspan="2"><b id="date">Sept. 30, 2023</b></td>
			</tr>
			<tr>
				<td colspan="13" align="center"><small>To be filled up by the Supply and/or Property Division/Unit</small></td>
				<td colspan="7" align="center"><small>To be filled up by the Accounting Division/Unit</small></td>
			</tr>
			<tr>
				<th colspan="4" class="td_m"><small>RIS No.</small></th>
				<th colspan="1" class="td_xs"><small><small><small>Responsibility Center Code</small></small></small></th>
				<th colspan="2" class="td_s"><small>Stock No.</small></th>
				<th colspan="4" class="td_xl"><small>Item</small></th>
				<th colspan="2" class="td_s"><small>Unit</small></th>
				<th colspan="2" class="td_s"><small>Quantity Issued</small></th>
				<th colspan="2" class="td_s"><small>Unit Cost</small></th>
				<th colspan="3" class="td_s"><small>Amount</small></th>
			</tr>
		</tbody>
		<tbody id="reports_container">
			<tr align="center">
				<td colspan="4">RF-2023-09-05-001</td>
				<td></td>
				<td colspan="2">OSMD-16</td>
				<td colspan="4">Prepaid Card Globe/TM(P100) - Card</td>
				<td colspan="2">piece</td>
				<td colspan="2">4</td>
				<td colspan="2">107.00</td>
				<td colspan="3">428</td>
			</tr>
		</tbody>
		<tbody>
			<tr align="center">
				<td colspan="20"><b>***Nothing Follows***</b></td>
			</tr>
			<tr align="center">
				<td colspan="10">Recapitulation:</td>
				<td colspan="10">Recapitulation:</td>
			</tr>
			<tr align="center">
				<td colspan="5">Stock No.</td>
				<td colspan="2">Quantity</td>
				<td colspan="2">Item Name</td>
				<td colspan="6">Unit Cost</td>
				<td colspan="4">Total Cost</td>
			</tr>
		</tbody>	
		<tbody id="recapitulation_container">

		</tbody>	
		<tbody>
			<tr align="center">
				<td colspan="5"></td>
				<td colspan="2"><b id="request_amount_total"></b></td>
				<td colspan="2">TOTAL</td>
				<td colspan="6"><b id="item_price_total"></b></td>
				<td colspan="4"><b id="item_total_total"></b></td>
			</tr>
			<tr align="left">
				<td colspan="9" class="no-bottom">&emsp;Prepared by:</td>
				<td colspan="11" class="no-bottom">&emsp;Posted by:</td>
			</tr>
			<tr align="center">
				<td colspan="9" class="no-bottom no-top"><br><u><b contenteditable onblur="update_rsmi_signatories();" id="sign1">KENNETH H. LAURINO</b></u></td>
				<td colspan="11" class="no-bottom no-top"><br><u><b contenteditable onblur="update_rsmi_signatories();" id="sign2">MARY GRACE L. BEATO</b></td>
			</tr>
			<tr align="center">
				<td colspan="9" class="no-bottom no-top" contenteditable onblur="update_rsmi_signatories();" id="label1">Administrative Officer I/Supply Officer</td>
				<td colspan="11" class="no-bottom no-top" contenteditable onblur="update_rsmi_signatories();" id="label2">Accountant I</td>
			</tr>
			<tr>
				<td colspan="9" class="no-top"><br></td>
				<td colspan="11" class="no-top"><br></td>
			</tr>
		</tbody>
	</table>
</body>
<script type="text/javascript">
	function element(id) {
        return document.getElementById(id);
    }
    function num_handle(str) {
	    return str.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
    function load_rsmi_data() {
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_rsmi_data';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);
		        element('reports_container').innerHTML = '';

		        if (output_data.length == 0) {
		        	element('rsmi_table').classList.add('hide');
		        	element('empty_message').classList.remove('hide');
		        }
		        else {
		        	element('rsmi_table').classList.remove('hide');
		        	element('empty_message').classList.add('hide');	
		        }
		        
		        report_data = '';
		        request_amount_total = 0;
				item_price_total = 0;
				item_total_total = 0;
	            for (indx = 0; indx < output_data.length; indx++) {
			        reference_code = output_data[indx].reference_code;
			        request_date = output_data[indx].request_date;
			        stock_id = output_data[indx].stock_id;
			        item_code = output_data[indx].item_code;
			        item_name = output_data[indx].item_name;
			        item_unit = output_data[indx].item_unit;
			        request_amount = output_data[indx].request_amount;
			        item_price = output_data[indx].item_price;
			        category_name = output_data[indx].category_name;

				    if (output_data[indx-1]) {
					    previous_code = output_data[indx-1].reference_code;
					    if (previous_code == reference_code) {
				        	reference_code = '';
				        }
				    }

				    element('category_name').innerHTML = category_name;
			        report_data += `
			        <tr align="center">
						<td colspan="4">`+reference_code+`</td>
						<td contenteditable></td>
						<td colspan="2">`+item_code+`</td>
						<td colspan="4">`+item_name+`</td>
						<td colspan="2">`+item_unit+`</td>
						<td colspan="2">`+num_handle(parseInt(request_amount).toFixed(0))+`</td>
						<td colspan="2">`+num_handle(parseFloat(item_price).toFixed(2))+`</td>
						<td colspan="3">`+num_handle(parseFloat(request_amount*item_price).toFixed(2))+`</td>
					</tr>`;
					recap_data = '';
					if (element('recap'+stock_id)) {
						item_total_total += request_amount*item_price;
				    	recap_amount = element('recap_amount'+stock_id).innerHTML;
				    	recap_price = element('recap_price'+stock_id).innerHTML;
				    	recap_total = element('recap_total'+stock_id).innerHTML;

				    	new_amount = parseInt(recap_amount)+parseInt(request_amount);
				    	new_price = parseInt(recap_price)+parseInt(item_price);
				    	new_total = parseFloat(new_amount)*parseFloat(item_price);

				    	element('recap_amount'+stock_id).innerHTML = num_handle(parseInt(new_amount).toFixed(0));
						element('recap_total'+stock_id).innerHTML = num_handle(parseFloat(new_total).toFixed(2));
				    
				    }
				    else {
						item_total_total += request_amount*item_price;
						item_price_total += parseFloat(item_price);
				    	recap_data = `
				        <tr align="center" id="recap`+stock_id+`">
							<td colspan="5">`+item_code+`</td>
							<td colspan="2" id="recap_amount`+stock_id+`">`+num_handle(parseInt(request_amount).toFixed(0))+`</td>
							<td colspan="2">`+item_name+`</td>
							<td colspan="6" id="recap_price`+stock_id+`">`+num_handle(parseFloat(item_price).toFixed(2))+`</td>
							<td colspan="4" id="recap_total`+stock_id+`">`+num_handle((parseFloat(request_amount)*parseFloat(item_price).toFixed(2)).toFixed(2))+`</td>
						</tr>`;	
				    }
				    
					request_amount_total += parseFloat(request_amount);

		        	element('recapitulation_container').innerHTML += recap_data;
		        }
		        element('request_amount_total').innerHTML = num_handle(parseFloat(request_amount_total).toFixed(0));
				element('item_price_total').innerHTML = num_handle(parseFloat(item_price_total).toFixed(2));
				element('item_total_total').innerHTML = num_handle(parseFloat(item_total_total).toFixed(2));

		        element('reports_container').innerHTML = report_data;
	    		load_report_date();
	        }
	    }
	}
	function load_report_date() {
		jax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_report_date';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	response = this.responseText+' 00:00';
	        	words_date = new Date(response);
		        long_date = words_date.toLocaleDateString('en-us', {year:"numeric", month:"long"})
				element('date_holder').innerHTML = long_date;

		        short_date = words_date.toLocaleDateString('en-us', {year:"numeric", month:"short", day:"numeric"})
				element('date').innerHTML = short_date;
				load_rsmi_signatories();
	        }
	    }
	}
	function load_rsmi_signatories() {
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_rsmi_signatories';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);
	        	for (indx = 0; indx < output_data.length; indx++) {
		        	sign1 = output_data[indx].sign1;
		        	sign2 = output_data[indx].sign2;
		        	sign3 = output_data[indx].sign3;
		        	label1 = output_data[indx].label1;
		        	label2 = output_data[indx].label2;
		        	label3 = output_data[indx].label3;

		        	element('sign1').innerHTML = sign1;
		        	element('sign2').innerHTML = sign2;
		        	element('label1').innerHTML = label1;
		        	element('label2').innerHTML = label2;
		        	element('label2').innerHTML = label2;
		        }
	        }
	    }
	}
	function update_rsmi_signatories() {
		sign1 = element('sign1').innerHTML;
    	sign2 = element('sign2').innerHTML;
    	label1 = element('label1').innerHTML;
    	label2 = element('label2').innerHTML;

		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/update_rsmi_signatories';
      	async = true;

      	data = new FormData();

      	data.append('sign1',sign1);
      	data.append('sign2',sign2);
       	data.append('label1',label1);
      	data.append('label2',label2);

      	ajax.open(method, url, async);
      	ajax.send(data);

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        }
	    }
	}
</script>
</html>