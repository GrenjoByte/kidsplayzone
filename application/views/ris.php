<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RIS</title>
</head>
<style type="text/css">
	table {
		border-collapse: collapse;
	}
	.wide_table {
		width: 95%;
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
		border: solid 2px grey;
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
<!-- <body> -->
<body onload="load_requisition_details()">
	<br>
	<h1 class="hide" align="center" id="empty_message"><br>No RSMI Report to Generate</h1>
	<table align="center" class="wide_table" id="rsmi_table">
		<thead class="">
			<tr>
				<td class="borderless" colspan="20" align="right">
					<i>
						<big>
							<strong>Appendix 63&nbsp;</strong>
						</big>
					</i>
				</td>
			</tr>
			<tr>
				<th class="borderless" colspan="20" align="center">
					<h2>REQUISITION AND ISSUE SLIP</h2>
				</th>			
			</tr>
			<tr>
				<th class="borderless" colspan="15" align="left" id="category_name">
					<big>Entity Name : PHILIPPINE STATISTICS AUTHORITY-SAMAR</big>
				</th>
				<th class="borderless" colspan="5" align="center" id="category_name">
					<big>Fund Cluster : 101</big>
				</th>
			</tr>
			<tr>
				<th class="borderless"><br></th>
			</tr>
		</thead>		
		<tbody>
			<tr>
				<td class="no-bottom" colspan="15">
					Division : ____________________________
				</td>
				<td class="no-bottom" colspan="5">
					Responsibility Center Code : ___________&emsp;
				</td>
			</tr>
			<tr>
				<td class="no-top" colspan="15">
					Office : PSA-SAMAR
				</td>
				<td class="no-top" colspan="5">
					RIS No. : <u id="reference_code"></u>
				</td>
			</tr>
			<tr>
				<td colspan="14" align="center">
					<i>
						<strong>Requisition</strong>
					</i>
				</td>
				<td colspan="2" align="center">
					<i>
						<strong>Stock Available</strong>
					</i>
				</td>
				<td colspan="4" align="center">
					<i>
						<strong>Issue</strong>
					</i>
				</td>
			</tr>
			<tr>
				<td colspan="4" align="center">
					<strong>
						<small>
						Stock No.
						</small>
					</strong>
				</td>
				<td colspan="2" align="center">
					<strong>
						<small>
						Unit
						</small>
					</strong>
				</td>
				<td colspan="5" align="center">
					<strong>
						<small>
						Description
						</small>
					</strong>
				</td>
				<td colspan="3" align="center">
					<strong>
						<small>
						Quantity
						</small>
					</strong>
				</td>
				<td colspan="1" align="center">
					<strong>
						<small>
						Yes
						</small>
					</strong>
				</td>
				<td colspan="1" align="center">
					<strong>
						<small>
						No
						</small>
					</strong>
				</td>
				<td colspan="2" align="center">
					<strong>
						<small>
						Quantity
						</small>
					</strong>
				</td>
				<td colspan="2" align="center">
					<strong>
						<small>
						Remarks:
						</small>
					</strong>
				</td>
			</tr>
		</tbody>
		<tbody id="ris_data_section">
			<!-- <tr>
				<td colspan="4" align="center">Stock No.</td>
				<td colspan="2" align="center">Unit</td>
				<td colspan="5" align="center">Description</td>
				<td colspan="3" align="center">Quantity</td>
				<td colspan="1" align="center">Yes</td>
				<td colspan="1" align="center">No</td>
				<td colspan="2" align="center">Quantity</td>
				<td colspan="2" align="center">Remarks</td>
			</tr> -->
		</tbody>
		<tbody>
			<tr>
				<td colspan="20" class=""><br></td>
			</tr>
			<tr>
				<td colspan="20" class="">
					<strong>Purpose : </strong>	
					<u id="purpose"></u>
				</td>
			</tr>
			<tr>
				<td colspan="6" class="no-bottom" align="center"></td>
				<td colspan="5" class="no-bottom" align="left">
					<strong>
						Requested by:
					</strong>
				</td>
				<td colspan="4" class="no-bottom" align="left">
					<strong>
						Approved by:
					</strong>
				</td>
				<td colspan="3" class="no-bottom" align="left">
					<strong>
						Issued by:
					</strong>
				</td>
				<td colspan="2" class="no-bottom" align="left">
					<strong>
						Received by:
					</strong>
				</td>
			</tr>
			<tr>
				<td colspan="6" class="no-top" align="left">
					Signature : 
				</td>
				<td colspan="5" class="no-top" align="left"></td>
				<td colspan="4" class="no-top" align="left"></td>
				<td colspan="3" class="no-top" align="left"></td>
				<td colspan="2" class="no-top" align="left"></td>
			</tr>
			<tr>
				<td colspan="6" align="left">
					Printed Name : 
				</td>
				<td colspan="5" align="center">
					<b id="requestor_name"></b>
				</td>
				<td colspan="4" align="center">
					<b>
						<small>
							RIZA N. MORALETA
						</small>
					</b>
				</td>
				<td colspan="3" align="center">
					<b>
						<small>
							KENNETH H. LAURINO
						</small>
					</b>
				</td>
				<td colspan="2" align="center"></td>
			</tr>
			<tr>
				<td colspan="6" align="left">
					Designation : 
				</td>
				<td colspan="5" align="center">
					<small id="requestor_position"></small>
				</td>
				<td colspan="4" align="center">
					<small>
						Chief Statistical Specialist
					</small>
				</td>
				<td colspan="3" align="center">
					<small>
						AO I/ Designate Supply Officer
					</small>
				</td>
				<td colspan="2" align="center"></td>
			</tr>
			<tr>
				<td colspan="6" align="left">
					Date : 
				</td>
				<td colspan="5" align="center">
					<small id="request_date"></small>
				</td>
				<td colspan="4" align="center"></td>
				<td colspan="3" align="center"></td>
				<td colspan="2" align="center"></td>
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
	String.prototype.UCfirst = function() {
      	return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase()
 	}
	String.prototype.dateWords = function() {
        words_date = new Date(this);
        long_date = words_date.toLocaleDateString('en-us', {year:"numeric", month:"long", day:"numeric"})
    	return long_date;
    }
	function load_requisition_details() {
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_requisition_details';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);
		        element('ris_data_section').innerHTML = '';

		        report_data = '';

	            for (indx = 0; indx < output_data.length; indx++) {
			        reference_code = output_data[indx].reference_code;
			        request_purpose = output_data[indx].request_purpose;
			        request_date = output_data[indx].request_date;
			        first_name = output_data[indx].first_name;	
			        middle_name = output_data[indx].middle_name;	
			        last_name = output_data[indx].last_name;	
			        suffix = output_data[indx].suffix;	
			        position = output_data[indx].position;	

			        full_name = first_name+' '+middle_name[0]+'. '+last_name

					if (suffix != '') {
						full_name += ' '+suffix+'.';
					}

		        	element('requestor_name').innerHTML = full_name;
					element('requestor_position').innerHTML = position;
					element('reference_code').innerHTML = reference_code;
					element('request_date').innerHTML = request_date.dateWords();
				}
				load_requisition_items();
			}
		}
	}
    function load_requisition_items() {
		ajax = new XMLHttpRequest();
      	method = 'POST';
      	url = '<?php echo base_url();?>i.php/sims_control/load_requisition_items';
      	async = true;

      	data = new FormData();

      	ajax.open(method, url, async);
      	ajax.send();

      	ajax.onreadystatechange = function() {
	        if(this.readyState == 4 && this.status == 200) {
	        	output_data = JSON.parse(this.responseText);
		        element('ris_data_section').innerHTML = '';

		        report_data = '';

	            for (indx = 0; indx < output_data.length; indx++) {
			        item_code = output_data[indx].item_code;
			        item_name = output_data[indx].item_name;
			        item_price = output_data[indx].item_price;
			        item_description = output_data[indx].item_description;	
			        item_unit = output_data[indx].item_unit;	
			        category_name = output_data[indx].category_name;	
			        request_amount = output_data[indx].request_amount;	

			        report_data += `
				        <tr>
							<td colspan="4" class="no-top no-bottom" align="left"><small>`+item_code+`</small></td>
							<td colspan="2" class="no-top no-bottom" align="left"><small>`+item_unit.UCfirst()+`</small></td>
							<td colspan="5" class="no-top no-bottom" align="left"><small>`+item_name+`</small></td>
							<td colspan="3" class="no-top no-bottom" align="center"><small>`+request_amount+`</small></td>
							<td colspan="1" class="no-top no-bottom" align="left"><small></small></td>
							<td colspan="1" class="no-top no-bottom" align="left"><small></small></td>
							<td colspan="2" class="no-top no-bottom" align="center"><small></small></td>
							<td colspan="2" class="no-top no-bottom" align="left"><small></small></td>
						</tr>`;

		        }
		        element('ris_data_section').innerHTML = report_data;
		        window.print();
	        }
	    }
	}
	window.onafterprint = function () {
        window.close();
  	};
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