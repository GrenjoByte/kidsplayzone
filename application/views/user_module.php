<div class="ui column grid centered">
	<div class="column row centered">
		<div class="fourteen wide mobile fourteen wide tablet twelve wide computer column centered">
			<div class="ui secondary labeled icon pointing menu fluid item" id="tab_titles">
				
			</div>
			<div id="tabs_container">
				
			</div>
		</div>
	</div>
</div>
<div class="ui small modal" id="item_edit_modal">
    <div class="ui header yellow small center aligned">
        <i class="edit icon yellow link" id="item_edit_icon"></i>
		Item Details
    </div>
    <div class="content" id="item_edit_container">
	    <form class="ui form" enctype="multipart/form-data" id="item_update_form">
			<input type="hidden" value="" name="update_stock_id" id="update_stock_id">
			<div class="field">
				<label>Item Name</label>
				<div class="ui input small search squared_search item_name_search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Item Name" name="item_name_update" id="item_name_update">
                    </div>
                    <div class="results"></div>
                </div>
		  	</div>
	    	<div class="two fields">
				<div class="field">
					<label>Price</label>
					<div class="ui input small fluid">
						<input type="text" pattern="\d+(\.\d+)?" value="" placeholder="Price" name="item_price_update" id="item_price_update">
					</div>
			  	</div>
			  	<div class="field">
					<label>Unit</label>
					<div class="ui input small search squared_search item_unit_search">
                        <div class="ui icon input">
                            <input class="prompt" type="text" placeholder="Unit" name="item_unit_update" id="item_unit_update">
                        </div>
                        <div class="results"></div>
                    </div>
			  	</div>
	    	</div>
	    	<div class="two fields">
				<div class="field">
					<label>Category</label>
					<div class="ui input small search squared_search item_category_search">
                        <div class="ui icon input">
                            <input class="prompt" type="text" placeholder="Category" name="item_category_update" id="item_category_update">
                        </div>
                        <div class="results"></div>
                    </div>
			  	</div>
			  	<div class="field">
					<label>Description</label>
					<div class="ui input small search squared_search item_description_search">
                        <div class="ui icon input">
                            <input class="prompt" type="text" placeholder="Description" name="item_description_update" id="item_description_update">
                        </div>
                        <div class="results"></div>
                    </div>
			  	</div>
	    	</div>
	    	<div class="two fields">
				<div class="field">
					<label>Low Stock Level</label>
                    <div class="ui icon input">
                        <input type="number" placeholder="Low Stock Level" name="item_low_level_update" id="item_low_level_update">
                    </div>
			  	</div>
		  	</div>
    	</form>
    </div>
    <div class="actions">
    	<div class="ui orange right corner small label" id="item_edit_closer">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
    </div>
</div>
<div class="ui small modal" id="add_item_modal">
    <div class="ui header green small center aligned">
        <i class="dolly flatbed icon green link" id="add_item_icon"></i>
		Add New Item
    </div>
    <div class="content" align="center">
        <div class="ui grid centered">
            <div class="fourteen wide column centered">
                <form class="ui form" enctype="multipart/form-data" id="new_item_form">
                    <div class="field">
                        <label>Item Name</label>
                        <div class="ui input small search squared_search item_name_search">
		                    <div class="ui icon input">
		                        <input class="prompt" type="text" placeholder="Item Name" name="new_item_name" id="new_item_name">
		                    </div>
		                    <div class="results"></div>
		                </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>Item Code</label>
                            <div class="ui input small search squared_search item_code_search">
			                    <div class="ui icon input">
			                        <input class="prompt" type="text" placeholder="Item Code" name="new_item_code" id="new_item_code">
			                    </div>
			                    <div class="results"></div>
			                </div>
                        </div>
                        <div class="field">
                            <label>Initial Stock Quantity</label>
                            <div class="ui input small fluid">
                                <input type="text" value="" placeholder="Initial Stock Quantity" name="new_stock_quantity" id="new_stock_quantity">
                            </div>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>Price</label>
                            <div class="ui input small fluid">
                                <input type="text" pattern="\d+(\.\d+)?" value="" placeholder="Price" name="new_item_price" id="new_item_price">
                            </div>
                        </div>
                        <div class="field">
                            <label>Unit <small>(Singular)</small></label>
                            <div class="ui input small search squared_search item_unit_search">
		                        <div class="ui icon input">
		                            <input class="prompt" type="text" placeholder="Unit" name="new_item_unit" id="new_item_unit">
		                        </div>
		                        <div class="results"></div>
		                    </div>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>Category</label>
                            <div class="ui input small search squared_search item_category_search">
                                <div class="ui icon input">
                                    <input class="prompt" type="text" placeholder="Category" name="new_item_category" id="new_item_category">
                                </div>
                                <div class="results"></div>
                            </div>
                        </div>
                        <div class="field">
                            <label>Description</label>
                            <div class="ui input small search squared_search item_description_search">
		                        <div class="ui icon input">
		                            <input class="prompt" type="text" placeholder="Description" name="new_item_description" id="new_item_description">
		                        </div>
		                        <div class="results"></div>
		                    </div>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>Low Stock Level</label>
                            <div class="ui icon input">
                                <input type="number" placeholder="Low Stock Level" name="new_item_low_level" id="new_item_low_level">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="actions">
    	<div class="ui orange right corner small label" id="add_item_closer">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
    </div>
</div>
<div class="ui small modal" id="restocking_cart_modal">
    <div class="ui header teal medium center aligned">
	        <i class="dolly icon teal link" id="restocking_cart_icon"></i>
			Restocking Cart
    </div>
    <div class="content" id="restocking_cart_container">
    	<div class="ui segment basic">
    		<div class="ui one column centered grid">
    			<div class="fourteen wide column">
			    	<form class="ui form" id="restocking_form">
	    				<div class="two fields">
		    				<div class="ten wide field">
								<div class="ui left action input mini fluid" tabindex="-1">
									<div class="ui animated button basic mini">
										<div class="hidden content"><small>Restocking Code</small></div>
										<div class="visible content">
											&emsp;<i class="hashtag right icon large"></i>&emsp;
										</div>
									</div>
									<div class="ui input search squared_search" id="restocking_reference_code_field">
									  	<div class="ui icon input">
									    	<input class="prompt" type="text" placeholder="Restocking Reference Code" id="restocking_reference_code">
									  	</div>
									  	<div class="results"></div>
									</div>
								</div>
						  	</div>	
						  	<div class="six wide field">
								<div class="ui left action input mini fluid">
									<div class="ui animated button basic mini">
										<div class="hidden content"><small>Restocking Date</small></div>
										<div class="visible content">
											&emsp;<i class="calendar check outline right icon large"></i>&emsp;
										</div>
									</div>
								  	<input type="date" value="" name="restock_date" id="restock_date">
								</div>
						  	</div>
    					</div>
    				</form>
    			</div>
	  		</div>
		</div>
    	<h4 class="ui horizontal divider header grey tiny">
		  	<i class="boxes grey icon tiny"></i>
		  	Cart Contents
		</h4>
		<h3 class="ui header center aligned pointered yellow" id="restocking_empty_placeholder">
			Empty
		</h3>	
    </div>
    <div class="scrolling content">
    	<div class="ui one column centered grid">
			<div class="fourteen wide column">
	    		<div class="ui middle aligned animated selection celled list" id="restocking_items_container">
				  	
				</div>
			</div>
		</div>
    </div>
    <div class="actions" id="restocking_cart_actions">
    	<div class="ui orange right corner small label" id="restocking_cart_closer">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
    	<div class="ui tiny basic green transition hidden button" id="restocking_cart_checkout">
    		<i class="clipboard check icon"></i>
    		Checkout
    	</div>
    </div>
</div>
<div class="ui small modal" id="retrieval_basket_modal">
    <div class="ui header blue medium center aligned">
	        <i class="shopping basket icon blue link" id="retrieval_basket_icon"></i>
			Retrieval Basket
    </div>
    <div class="content" id="retrieval_basket_container">
    	<div class="ui top attached tabular two item basic blue menu pointing secondary">
		  	<a class="active item retrieval_tab_toggle" data-tab="first">Regular Retrieval</a>
		  	<a class="item retrieval_tab_toggle" data-tab="second">RIS Item Insertion</a>
		</div>
		<div class="ui bottom attached active blue tab" data-tab="first">
		  	<div class="ui segment basic">
		  		<div class="ui one column centered grid">
    			<div class="fourteen wide column">
				    	<form class="ui form" id="retrieval_first_form">
					    	<div class="fields">
								<div class="ten wide field" tabindex="-1">
									<div class="ui left action input mini fluid" tabindex="-1">
										<div class="ui animated button basic mini">
											<div class="hidden content"><small>Requestor</small></div>
											<div class="visible content">
												&emsp;<i class="large icons"><i class="user icon"></i><i class="undo bottom right corner icon large"></i></i>&emsp;
											</div>

										</div>
										<div class="ui fluid dropdown scrolling selection" id="requestor_drop">
											<input type="hidden" name="requestor_id" id="requestor_id" value="">
											<i class="dropdown icon"></i>
											<div class="default text" id="requestor_default_value">Requestor</div>
											<div class="menu" id="requestor_drop_menu">
												
											</div>
										</div>
									</div>
							  	</div>
							  	<div class="six wide field">
									<div class="ui left action input mini fluid">
										<div class="ui animated button basic mini">
											<div class="hidden content"><small>Request Date</small></div>
											<div class="visible content">
												&emsp;<i class="calendar check outline right icon large"></i>&emsp;
											</div>
										</div>
									  	<input type="date" value="" name="request_date" id="request_date">
									</div>
							  	</div>
							</div>
							<div class="field">
								<div class="ui left action input mini fluid">
									<div class="ui animated button basic mini">
										<div class="hidden content"><small>Purpose</small></div>
										<div class="visible content">
											&emsp;<i class="large icons"><i class="bars icon"></i><i class="check bottom right corner icon large"></i></i>&emsp;
										</div>
									</div>
									<input type="text" value="" placeholder="Purpose" name="request_purpose" id="request_purpose">
								</div>
						  	</div>
						</form>
	    			</div>
	    		</div>
	    	</div>
		</div>
		<div class="ui bottom attached blue tab" data-tab="second">
	    	<div class="ui segment basic">
	    		<div class="ui one column centered grid">
	    			<div class="eight wide column">
	    				<div class="field">
							<div class="ui left action input mini fluid">
								<div class="ui animated button basic mini">
									<div class="hidden content"><small>RIS Code</small></div>
									<div class="visible content">
										&emsp;<i class="hashtag right icon large"></i>&emsp;
									</div>
								</div>
								<div class="ui fluid dropdown scrolling selection" id="ris_drop">
									<input type="hidden" name="requisition_id" id="requisition_id" value="">
									<i class="dropdown icon"></i>
									<div class="default text" id="ris_default_value">RIS Reference Code</div>
									<div class="menu" id="ris_drop_menu">
										
									</div>
								</div>
							</div>
					  	</div>	
	    			</div>
		  		</div>
    		</div>
   		</div>
   		<h4 class="ui horizontal divider header grey tiny">
		  	<i class="boxes grey icon tiny"></i>
		  	Basket Contents
		</h4>
		<h3 class="ui header center aligned pointered yellow" id="retrieval_empty_placeholder">
			Empty
		</h3>
    </div>
    <div class="scrolling content" id="retrieval_basket_container">
		<div class="ui one column centered grid">
			<div class="fourteen wide column">
	    		<div class="ui middle aligned animated selection celled list" id="retrieval_items_container">
				  	
				</div>
			</div>
		</div>
    </div>
    <div class="actions" id="retrieval_basket_actions">
    	<div class="ui orange right corner small label" id="retrieval_basket_closer">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
    	<div class="ui tiny basic green transition hidden button" id="retrieval_basket_checkout">
    		<i class="clipboard check icon"></i>
    		Checkout
    	</div>
    </div>
</div>
<div class="ui small modal" id="ris_requests_modal">
    <div class="ui header olive medium center aligned">
	        <i class="object group icon olive link" id="ris_requests_icon"></i>
			Requisition Requests
    </div>
    <div class="content" id="ris_requests_container">
    	<div class="ui segment very padded basic">
		  	<h3 class="ui header center aligned pointered" id="">
				Empty
			</h3>	
    	</div>
    </div>
    <div class="actions">
    	<div class="ui orange right corner small label" id="ris_requests_closer">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
    </div>
</div>
<div class="ui tiny modal" id="inventory_reports_modal">
    <div class="ui header green medium center aligned">
        <i class="chart bar icon green link" id="inventory_reports_icon"></i>
		Reports	
    </div>
    <div class="content">
	    <div class="ui form">
			<div class="two fields">
				<div class="eight wide field">
					<div class="ui left action input mini fluid">
						<div class="ui animated button basic mini">
							<div class="hidden content"><small>Restocking Date</small></div>
							<div class="visible content">
								&emsp;<i class="calendar check outline right icon large"></i>&emsp;
							</div>
						</div>
					  	<input type="date" value="" name="report_date" id="report_date">
					</div>
			  	</div>
				<div class="eight wide field">
					<div class="ui left action input mini fluid" tabindex="-1">
						<div class="ui animated button basic mini">
							<div class="hidden content"><small>Report Category</small></div>
							<div class="visible content">
								&emsp;<i class="clipboard list right icon large"></i>&emsp;
							</div>
						</div>
						<div class="ui fluid selection dropdown" id="report_category_dropdown">
							<input type="hidden" name="report_category" id="report_category" value="Office Supplies">
							<i class="dropdown icon"></i>
							<div class="default text">Report Category</div>
							<div class="menu">
								<div class="item" data-value='Office Supplies'>
									OS
								</div>
								<div class="item" data-value="Office Supplies and Materials for Inventory">
									OSMI
								</div>
								<div class="item" data-value="Office Supplies and Materials for Distribution">
									OSMD
								</div>
							</div>
						</div>
					</div>
			  	</div>
			</div>
		</div>
		<h4 class="ui horizontal divider header grey tiny">
		  	<i class="file alternate outline grey icon tiny"></i>
		  	Issuances and Restocks
		</h4>
		<h3 class="ui header center aligned pointered yellow" id="rsmi_empty_placeholder">
			Empty
		</h3>
    </div>
    <div class="scrolling content">
    	<div class="ui one column centered grid">
			<div class="fifteen wide column">
				<div class="ui middle aligned relaxed animated celled selection list" id="inventory_reports_container">
				  		
		    	</div>
		    </div>
    	</div>
    </div>
    <div class="actions">
    	<div class="ui orange right corner small label">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
	  	<button class="ui tiny left floated labeled icon button" id="report_settings_activator">
		  	<i class="cog icon"></i>
		  	Report Settings
		</button>
    	<div class="ui tiny olive button" id="rpci_activator">RPCI</div>
    	<div class="ui tiny teal button" id="rsmi_activator">RSMI</div>
    </div>
</div>
<div class="ui mini modal" id="inventory_settings_modal">
    <div class="ui header medium center aligned">
		<a class="break-text">Inventory Report Settings</a>
    </div>
    <div class="content">
    	<form class="ui form" id="ris_view_form">
			<h5 class="ui header left aligned">Accountable Officer</h5>
			<div class="field" tabindex="-1">
				<div class="ui left action input mini fluid" tabindex="-1">
					<div class="ui animated button basic mini">
						<div class="hidden content"><small>Supply Officer</small></div>
						<div class="visible content">
							&nbsp;
							<i class="large icons">
								<i class="user icon"></i>
								<i class="boxes bottom right corner icon large"></i>
							</i>
							&nbsp;
						</div>

					</div>
					<div class="ui fluid dropdown scrolling selection" id="supply_officer_drop">
						<input type="hidden" name="supply_officer_id" id="supply_officer_id" value="">
						<i class="dropdown icon"></i>
						<div class="default text" id="supply_officer_default_value">Supply Officer</div>
						<div class="menu" id="supply_officer_drop_menu">
							
						</div>
					</div>
				</div>
		  	</div>
		  	<div class="field">
				<div class="ui left action input mini fluid">
					<div class="ui animated button basic mini">
						<div class="hidden content"><small>Acctbl. Date</small></div>
						<div class="visible content">
							&nbsp;
							<i class="calendar check outline right icon large"></i>
							&nbsp;
						</div>
					</div>
				  	<input type="date" value="" placeholder="Accountability Date" id="ris_reference_date">
				</div>
		  	</div>
			<h5 class="ui header left aligned">RSMI</h5>
			<div class="field">
				<div class="ui left action input mini fluid" tabindex="-1">
					<div class="ui animated button basic mini">
						<div class="hidden content"><small>Posted By</small></div>
						<div class="visible content">
							&nbsp;
							<i class="large icons">
								<i class="file outline icon"></i>
								<i class="paperclip bottom right corner icon large"></i>
							</i>
							&nbsp;
						</div>

					</div>
					<div class="ui fluid dropdown scrolling selection" id="rsmi_posted_drop">
						<input type="hidden" name="rsmi_posted_id" id="rsmi_posted_id" value="">
						<i class="dropdown icon"></i>
						<div class="default text" id="rsmi_posted_default_value">Posted By</div>
						<div class="menu" id="rsmi_posted_drop_menu">
							
						</div>
					</div>
				</div>
		  	</div>
		  	<h5 class="ui header left aligned">RPCI</h5>
		  	<div class="field">
				<div class="ui left action input mini fluid">
					<div class="ui animated button basic mini">
						<div class="hidden content"><small>Verified By</small></div>
						<div class="visible content">
							&nbsp;
							<i class="large icons">
								<i class="file alternate icon"></i>
								<i class="check bottom right corner icon large"></i>
							</i>
							&nbsp;
						</div>
					</div>
					<input type="text" value="" placeholder="Verified By" name="rpci_verified_id" id="rpci_verified_id">
				</div>
		  	</div>
		  	<div class="field">
				<div class="ui left action input mini fluid">
					<div class="ui animated button basic mini">
						<div class="hidden content"><small>Position</small></div>
						<div class="visible content">
							&nbsp;
							<i class="large icons">
								<i class="user icon"></i>
								<i class="id badge outline bottom right corner icon large"></i>
							</i>
							&nbsp;
						</div>
					</div>
					<input type="text" value="" placeholder="Verified By" name="rpci_verified_id" id="rpci_verified_id">
				</div>
		  	</div>
		</form>
    </div>
    <div class="actions modal-actions">
    	<div class="ui orange right corner small label" id="image_preview_closer">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
	</div>
</div>
<div class="ui small modal" id="ris_view_modal">
	<div class="ui header small center aligned" id="ris_view_main_header">
        <i class="shopping basket icon grey link"></i>
    </div>
    <div class="content">
    	<div class="ui one column centered grid">
			<div class="fourteen wide column">
		    	<form class="ui form" id="ris_view_form">
			    	<div class="fields">
						<div class="ten wide field" tabindex="-1">
							<div class="ui left action input mini fluid" tabindex="-1">
								<div class="ui animated button basic mini">
									<div class="hidden content"><small>Requestor</small></div>
									<div class="visible content">
										&emsp;<i class="large icons"><i class="user icon"></i><i class="undo bottom right corner icon large"></i></i>&emsp;
									</div>

								</div>
								<input type="text" value="" readonly="" id="ris_reference_name">

							</div>
					  	</div>
					  	<div class="six wide field">
							<div class="ui left action input mini fluid">
								<div class="ui animated button basic mini">
									<div class="hidden content"><small>Request Date</small></div>
									<div class="visible content">
										&emsp;<i class="calendar check outline right icon large"></i>&emsp;
									</div>
								</div>
							  	<input type="text" value="" readonly="" id="ris_reference_date">
							</div>
					  	</div>
					</div>
					<div class="field">
						<div class="ui left action input mini fluid">
							<div class="ui animated button basic mini">
								<div class="hidden content"><small>Purpose</small></div>
								<div class="visible content">
									&emsp;<i class="large icons"><i class="bars icon"></i><i class="check bottom right corner icon large"></i></i>&emsp;
								</div>
							</div>
							<input type="text" value="" readonly="" id="ris_purpose">
						</div>
				  	</div>
				</form>
	    	</div>
	    </div>
	    <h4 class="ui horizontal divider header grey small">
		  	<i class="boxes grey icon small"></i>
		  	RIS Contents
		</h4>
    </div>
    <div class="scrolling content">
    	<div class="ui one column centered grid">
			<div class="fourteen wide column">
				<div class="ui middle aligned relaxed animated celled selection list" id="ris_view_container">
    			</div>
    		</div>
    	</div>
    	<div class="ui one column centered grid">
			<div class="fifteen wide column">
				<div class="ui header small right middle aligned">
				  	<span>Total:</span>	
				  	<span id="ris_total"></span>	
		    	</div>
		    </div>
    	</div>
    </div>
    <div class="actions">
    	<!-- <div class="ui tiny basic violet button" id="ris_void_button" data-reference_id="">
    		<i class="trash alternate violet icon"></i>
    		Void RIS
    	</div> -->
    	<div class="ui tiny teal button" data-requisition_id="" id="ris_print_button">
    		<i class="print icon"></i>
    		Print RIS
    	</div>
    	<div class="ui orange right corner small label" id="ris_view_closer">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
    </div>
</div>
<div class="ui tiny modal" id="file_preview_modal">
    <div class="ui header medium center aligned">
		<a id="file_preview_title" class="break-text">File Title</a>       
    </div>
    <div class="content" id="file_preview_container">
    	
    </div>
    <div class="actions modal-actions">
    	<div class="ui orange right corner small label" id="image_preview_closer">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
	</div>
</div>
<div class="ui tiny modal" id="image_preview_modal">
    <div class="ui header center aligned">
		<a class="break-text" id="image_preview_title">Image Title</a>       
    </div>
    <div class="content" id="image_preview_container">
    	
    </div>
    <div class="actions modal-actions">
    	<div class="ui orange right corner small label" id="image_preview_closer">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
	</div>
</div>
<div class="ui large longer modal" id="supplies_inventory_modal">
    <div class="ui header center aligned">
		<a>Supplies Inventory</a>       
    </div>
    <div class="ui basic fixed content">
    	<div class="ui grid">
    		<div class="ui row">
				<div class="fourteen wide column right aligned">
					<div class="ui search category right aligned" id="inventory_search">
					  	<div class="ui icon input">
					    	<input class="prompt" type="text" placeholder="Search Inventory..." id="inventory_search_input">
					    	<i class="search icon"></i>
					  	</div>
					  	<div class="results"></div>
					</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="ui scrolling content">
    	<div class="ui grid">
    		<div class="ui row">
				<div class="fourteen wide column centered">
					<div class="ui segment" id="inventory_cards_container">
						
			    	</div>	
	    		</div>
			</div>  
			<div class="ui row">
				<div class="ui wide column">
					<div class="ui toggle checkbox">
					  	<input type="checkbox" name="stocks_toggle" id="stocks_toggle">
					  	<label></label>
					</div>
				</div>
			</div>  		
    	</div>
    </div>
    <div class="actions">
    	<div class="ui orange right corner small label">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
    </div>
</div>
<div class="ui small modal" id="project_view_modal">
	<div class="content" id="project_view_content">
		<div class="ui grid centered">
			<div class="ui seven wide column middle aligned">
				<div class="ui rounded post_image_container">
			  		<img id="project_view_image">
				</div>
			</div>
			<div class="ui nine wide column top aligned compact basic segment">
				<div class="ui left aligned header">
					<div class="content">
						<a id="project_view_title"></a>
						<div class="sub header">
					    	<span id="project_view_start"></span>
					    	to
					    	<span id="project_view_end"></span>
					    </div>	    	
					</div>
				</div>
			    <div class="ui left aligned small header">
			    	<a class="ui avatar circular image image_container">
				  		<img id="project_view_focal_image">
			    	</a>
				  	<div class="content">
				    	<span id="project_view_focal_name"></span>
				    	<div class="sub header" id="project_view_focal_position"></div>
			  		</div>
				</div>
				<div class="ui small indicating active progress pointered progress_update_activator" data-total="100" id="project_view_progress_percent">
					<div class="bar">
						<div class="progress"></div>
					</div>
					<div class="label">Current Progress</div>
				</div>
			</div>
		</div>
		<div class="ui secondary pointing menu two item olive">
		  	<a class="active ui header small item project_progress_tab" data-tab="project_progress">Project Progress</a>
		  	<a class="ui header small item team_tab" data-tab="project_team">Project Team</a>
		</div>
		<div class="ui bottom attached active tab project_progress_tab" data-tab="project_progress">
		  	<div class="ui borderless mini labeled icon pointing menu fluid item olive" id="point_tabs" data-divisions_count="">
				<div class="ui header medium center aligned">No Progress Data</div>
			</div>
			<div id="point_tabs_container">
				
			</div>
		</div>
		<div class="ui bottom attached tab team_tab" data-tab="project_team">
		  	Second
		</div>
	</div>
	<div class="actions modal-actions">
		<div class="ui orange right corner small label">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
	  	<div class="ui dropdown labeled icon top pointing right actions_drop">
	  		<i class="ellipsis horizontal large icon"></i>
		  	<div class="menu">
		    	<div class="ui center aligned large header">
		      		<i class="large cogs icon"></i>
		      		Project Actions
		      	</div>
		      	<div class="scrolling menu">
      				<div class="item" id="project_delete_activator">
						<i class="red trash icon"></i>
        				<small>Delete</small>
      				</div>
      				<div class="item" data-project_id="" id="project_edit_activator">
						<i class="teal edit outline icon"></i>
        				<small>Edit</small>
      				</div>
	    		</div>
	    	</div>
	    </div>
	</div>
</div>
<div class="ui tiny modal" id="contract_creation_modal">
	<div class="ui header center aligned">
		<a id="contract_creation_modal_label">New Contract</a>
	</div>
	<div class="ui content">
		<form class="ui form" enctype="multipart/form-data" id="contract_creation_form">
		  	<div class="field">
				<div class="ui left action input mini">
					<div class="ui animated button basic mini" tabindex="-1">
						<div class="hidden content"><small>Project</small></div>
						<div class="visible content">
							&emsp;<i class="right address card icon large"></i>&emsp;
						</div>
					</div>
					<div class="ui fluid search dropdown scrolling selection" id="project_drop">
						<input type="hidden" name="contract_project_id" id="contract_project_id">
						<i class="dropdown icon"></i>
						<div class="default text" id="contract_project_default_value">Project</div>
						<div class="ui link items menu" id="project_drop_menu">
							
						</div>
					</div>
				</div>
		  	</div>
		  	<div class="field">
				<div class="ui left action input mini">
					<div class="ui animated button basic mini" tabindex="-1">
						<div class="hidden content"><small>Contract Title</small></div>
						<div class="visible content">
							&emsp;<i class="right clipboard outline icon large"></i>&emsp;
						</div>
					</div>
					<input type="text" value="" placeholder="Contract Title" name="contract_title" id="contract_title">
					<input type="hidden" name="contract_action_status" id="contract_action_status" value="">
					<input type="hidden" name="active_contract_id" id="active_contract_id">
				</div>
		  	</div>
		  	<div class="field">
				<div class="ui left action input mini">
					<div class="ui animated button basic mini" tabindex="-1">
						<div class="hidden content"><small>Contract Salary</small></div>
						<div class="visible content">
							&emsp;<i class="right clipboard outline icon large"></i>&emsp;
						</div>
					</div>
					<input type="text" value="" placeholder="Contract Salary" name="contract_salary" id="contract_salary">
				</div>
		  	</div>
		  	<div class="two fields">
		  		<div class="field">
					<div class="ui left action input mini">
						<div class="ui animated button basic mini" tabindex="-1">
							<div class="hidden content"><small>Contract Start</small></div>
							<div class="visible content">
								&emsp;<i class="calendar check outline icon large"></i>&emsp;
							</div>
						</div>
						<input type="date" placeholder="yyyy-mm-dd" name="contract_start" id="contract_start">
					</div>
			  	</div>
			  	<div class="field">
					<div class="ui right action input mini">
						<input type="date" placeholder="End Date" name="contract_end" id="contract_end">
						<div class="ui animated button basic mini" tabindex="-1">
							<div class="hidden content"><small>Contract End</small></div>
							<div class="visible content">
								&emsp;<i class="calendar times outline icon large"></i>&emsp;
							</div>
						</div>
					</div>
			  	</div>
		  	</div>
		</form>
	</div>
	<div class="actions">
		<div class="ui orange right corner small label">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
		<button type="button" form="contract_creation_form" class="ui inverted green right mini labeled icon button transition hidden" id="contract_creation_submit">
			<i class="checkmark icon"></i>
			<span id="contract_creation_submit_label">Create</span>
		</button>
	</div>
</div>
<div class="ui small modal" id="contracts_modal">
	<div class="ui header center aligned">
		<a id="contracts_header">Project Contracts</a>
	</div>
	<div class="content" id="contracts_content">
		<div class="ui grid">
			<div class="ui row" id="contracts_search_section">
				<div class="ui sixteen wide column top right aligned">
					<div class="ui search">
						<div class="ui icon input">
						  	<input class="prompt" type="text" placeholder="Search contracts...">
		    				<i class="search icon"></i>
						</div>
					  	<div class="results"></div>
					</div>
				</div>	
			</div>
			<div class="ui row">
				<div class="ui sixteen wide column basic segment">
					<div class="ui middle aligned relaxed animated celled selection list"  id="contracts_container">
				  		
		    		</div>
				</div>
			</div>
		</div>
	</div>
	<div class="actions modal-actions">
		<div class="ui orange right corner small label">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
	  	<div class="ui dropdown labeled icon top pointing right actions_drop">
	  		<i class="ellipsis horizontal large icon"></i>
		  	<div class="menu">
		    	<div class="ui center aligned large header">
		      		<i class="large cogs icon"></i>
		      		Contract Actions
		      	</div>
		      	<div class="scrolling menu">
      				<div class="item" id="">
						<i class="teal edit outline icon"></i>
        				<small>Edit</small>
      				</div>
      				<div class="item" id="contracts_creation_activator">
						<i class="icon">
							<i class="icons link">
								<i class="file outline alternate icon green link"></i>
								<i class="plus icon green corner link"></i>
							</i>
						</i>
        				<small>Create New</small>
      				</div>
	    		</div>
	    	</div>
	    </div>
	</div>
</div>
<div class="ui tiny modal" id="contract_view_modal">
	<div class="ui center aligned header" id="contract_view_modal_header">
		<span class="content" id="contract_view_modal_label"></span>
		<span class="sub header" id="contract_view_modal_subheader"></span>
		<!-- <i id="contract_view_modal_label_icon" class="icon"></i> -->
	</div>
	<div class="content">
		<div class="ui grid centered" id="team_search_section">
			<div class="ui sixteen wide column top right aligned" id="team_assignment">
				<div class="ui search">
					<div class="ui icon input">
					  	<input class="prompt" type="text" placeholder="Search team...">
	    				<i class="search icon"></i>
					</div>
				  	<div class="results"></div>
				</div>
			</div>
			<div class="ui sixteen wide column" id="team_selection">
				<div class="ui middle aligned relaxed animated celled selection list" id="contract_team_list">
				  		
		    	</div>
			</div>
		</div>
	</div>
	<div class="actions">
		<div class="ui orange right corner small label">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
		<div class="ui dropdown labeled icon top pointing right actions_drop">
	  		<i class="ellipsis horizontal large icon"></i>
		  	<div class="menu">
		    	<div class="ui center aligned large header">
		      		<i class="large cogs icon"></i>
		      		Contract Actions
		      	</div>
		      	<div class="scrolling menu">
      				<div class="item" id="contract_assignment_activator">
						<i class="icon">
							<i class="icons link">
								<i class="file outline alternate icon teal link"></i>
								<i class="pencil icon teal corner link"></i>
							</i>
						</i>
        				<small id="modify_assignment_label">Modify Assignment List</small>
      				</div>
	    		</div>
	    	</div>
	    </div>
	</div>
</div>
<div class="ui mini modal" id="contract_assignment_modal">
	<div class="ui center aligned header" id="contract_assignment_modal_header">
		<span class="content" id="contract_assignment_modal_label"></span>
		<span class="sub header" id="contract_assignment_modal_subheader"></span>
		<!-- <i id="contract_assignment_modal_label_icon" class="icon"></i> -->
	</div>
	<div class="content">
		<div class="ui grid">
			<div class="ui sixteen wide column top right aligned" id="team_assignment">
				<form class="ui form">
					<div class="field">
						<div class="ui fluid search dropdown scrolling multiple selection" id="team_selection_drop" data-contract_id="" data-contract_start="" data-contract_end="">
							<input type="hidden" name="contract_team_selection" id="contract_team_selection">
							<i class="dropdown icon"></i>
							<div class="default text" id="focal_default_value">Team</div>
							<div class="menu" id="team_selection_drop_menu">
								
							</div>
						</div>
				  	</div>
				</form>
			</div>
		</div>
	</div>
	<div class="actions">
		<div class="ui orange right corner small label">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
	</div>
</div>
<!-- PROJECT EDIT MODAL -->
<!-- <div class="ui small modal" id="project_view_modal">
	<i class="close icon orange"></i>
	<div class="ui center aligned header">
		<div class="ui rounded image post_image_container">
	  		<img id="project_view_image">
		</div>	
		<div class="content">
			<a id="project_view_title"></a>
		    <div class="sub header">
		    	<span id="project_view_start"></span>
		    	to
		    	<span id="project_view_end"></span>
		    </div>	
		</div>
	</div>
	<div class="ui content">
		<div class="ui grid centered">
			<div class="ui row">
				<div class="ui twelve wide column">
					<div class="ui accordion">
					  	<div class="active title">
							<h3 class="ui header center aligned pointered" id="project_details_section">
								Project Details
			  		    		<i class="dropdown icon"></i>
							</h3>
					  	</div>
					  	<div class="active content">
					  		<form class="ui form">
								<div class="field">
									<div class="ui left action input">
										<div class="ui animated button basic tiny" tabindex="-1">
											<div class="hidden content"><small>Project Title</small></div>
											<div class="visible content">
												&emsp;<i class="right user icon"></i>&emsp;
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
												&emsp;<i class="right address card icon"></i>&emsp;
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
												&emsp;<i class="image outline icon"></i>&emsp;
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
													&emsp;<i class="calendar check outline icon"></i>&emsp;
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
													&emsp;<i class="calendar times outline icon"></i>&emsp;
												</div>
											</div>
										</div>
								  	</div>
							  	</div>	
							</form>
						</div>
						<div class="active title">
							<h3 class="ui header center aligned pointered" id="project_details_section">
								Project Progress
			  		    		<i class="dropdown icon"></i>
							</h3>
						</div>
						<div class="active content">
							Mando content
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="actions">
		<button type="submit" class="ui inverted green right tiny labeled icon button">
			<i class="checkmark icon"></i>
			Update
		</button>
	</div>
</div> -->
<div class="ui tiny modal" id="project_creation_modal">
	<div class="ui header center aligned">
		<a id="project_creation_modal_label">New Project</a>
	</div>
	<div class="ui content">
		<form class="ui form" enctype="multipart/form-data" id="project_creation_form">
			<div class="field">
				<div class="ui left action input mini">
					<div class="ui animated button basic mini" tabindex="-1">
						<div class="hidden content"><small>Project Title</small></div>
						<div class="visible content">
							&emsp;<i class="right clipboard outline icon large"></i>&emsp;
						</div>
					</div>
					<input type="text" value="" placeholder="Project Title" name="project_title" id="project_title">
					<input type="hidden" name="project_action_status" id="project_action_status" value="">
					<input type="hidden" name="active_project_id" id="active_project_id">
				</div>
		  	</div>
		  	<div class="field">
				<div class="ui left action input mini">
					<div class="ui animated button basic mini" tabindex="-1">
						<div class="hidden content"><small>Focal Person</small></div>
						<div class="visible content">
							&emsp;<i class="right address card icon large"></i>&emsp;
						</div>
					</div>
					<div class="ui fluid search dropdown scrolling selection" id="focal_drop">
						<input type="hidden" name="focal_person_id" id="focal_person_id">
						<i class="dropdown icon"></i>
						<div class="default text" id="focal_default_value">Focal Person</div>
						<div class="menu" id="focal_drop_menu">
							
						</div>
					</div>
				</div>
		  	</div>
		  	<div class="field">
				<div class="ui left action input mini">
					<div class="ui animated button basic mini" tabindex="-1">
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
					<div class="ui left action input mini">
						<div class="ui animated button basic mini" tabindex="-1">
							<div class="hidden content"><small>Start Date</small></div>
							<div class="visible content">
								&emsp;<i class="calendar check outline icon large"></i>&emsp;
							</div>
						</div>
						<input type="date" placeholder="yyyy-mm-dd" name="start_date" id="start_date">
					</div>
			  	</div>
			  	<div class="field">
					<div class="ui right action input mini">
						<input type="date" placeholder="End Date" name="end_date" id="end_date">
						<div class="ui animated button basic mini" tabindex="-1">
							<div class="hidden content"><small>End Date</small></div>
							<div class="visible content">
								&emsp;<i class="calendar times outline icon large"></i>&emsp;
							</div>
						</div>
					</div>
			  	</div>
		  	</div>
		</form>
	</div>
	<div class="actions">
		<div class="ui orange right corner small label">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
		<button type="button" form="project_creation_form" class="ui inverted green right mini labeled icon button transition hidden" id="project_creation_submit">
			<i class="checkmark icon"></i>
			<span id="project_creation_submit_label">Create</span>
		</button>
	</div>
</div>
<div class="ui mini modal" id="upload_progress_modal">
	<div class="content">
		<div class="ui centered header medium">
			<a id="upload_progress_title">Upload Progress</a>
		</div>
		<div class="ui small indicating active progress" data-total="100" id="update_progress_percent">
			<div class="bar">
				<div class="progress"></div>
			</div>
			<div class="label" id="update_progress_label"></div>
		</div>
	</div>
</div>
<div class="ui tiny modal" id="progress_update_modal">
	<div class="ui header center aligned">
		<a id="progress_update_modal_label"></a>
	</div>
	<div class="ui content" id="project_update_content">
		<form class="ui form" enctype="multipart/form-data" id="progress_update_form">
			<div class="ui grid centered">
				<div class="ui row centered column">
					<div class="column fourteen wide center aligned">
						<div class="field">
							<div class="ui left action input">
								<div class="ui animated button basic tiny" tabindex="-1">
									<div class="hidden content"><small>AS OF</small></div>
									<div class="visible content">
										&emsp;<i class="calendar alternate icon large"></i>&emsp;
									</div>
								</div>
								<input type="date" value="" placeholder="AS OF" name="point_date" id="point_date">
								<input type="hidden" name="active_point_id" id="active_point_id">
								<input type="hidden" name="point_color" id="point_color">
								<input type="hidden" name="progress_active_project_id" id="progress_active_project_id">
								<input type="hidden" id="active_project_progress">
								<input type="hidden" id="update_type_checker">
							</div>
						</div>
					</div>
				</div>
				<div class="ui row column">
					<div class="column fourteen wide center aligned">
						<div class="mini header" id="progress_update_label">0% Progress</div>
						<span class="ui small indicating active progress" data-percent="0" data-total="100" id="progress_update_value">
							<div class="bar" id="bar">
								<div class="progress"></div>
							</div>
						</span>	
						<div class="ui mini buttons">
						  	<div class="ui orange inverted button rounded" id="progress_minus">
						  		<i class="minus icon"></i>
						  	</div>
						  	<div class="or" data-text="|" id="progress_value_indicator"></div>
						  	<div class="ui green inverted button rounded" id="progress_plus">
						  		<i class="plus icon"></i>
						  	</div>
						</div>
						<input type="text" class="file_input" name="progress_bar_value" id="progress_bar_value">
					</div>
				</div>
				<div class="ui row column">
					<div class="column fourteen wide center aligned field">
						<div class="ui header small center aligned">
							Supporting Documents
						</div>
					</div>
				</div>
				<div class="ui row column">
					<div class="column fourteen wide left aligned">
						<input type="file" class="file_input" name="support_documents[]" id="support_documents" multiple>
						<div class="ui five doubling stackable cards" id="support_documents_container"></div>
					</div>
				</div>
				<div class="ui row column">
					<div class="column fourteen wide center aligned field">
						<div class="ui tiny teal button" id="upload_activator">
							<i class="upload icon"></i>
							Select Files
						</div>
						<input type="text" class="file_input" name="file_input_indicator" id="file_input_indicator">
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="actions">
		<div class="ui orange right corner small label">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
		<button class="ui inverted red right mini labeled icon button" id="progress_deleter">
			<i class="trash icon"></i>
			Delete
		</button>
		<button type="submit" form="progress_update_form" class="ui inverted green right mini labeled icon button">
			<i class="checkmark icon"></i>
			Update
		</button>
	</div>
</div>
<div class="ui small modal" id="user_management_modal">
	<div class="ui icon header medium">
		<a id="personnel_management_title"></a>
	</div>
	<div class="scrolling content" id="personnel_documents_container">
		<div class="ui basic fluid accordion styled" id="personnel_documents_tab">
								
		</div>
	</div>
	<div class="actions">
    	<div class="ui orange right corner small label" id="user_management_modal_exit">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
    </div>
</div>
<div class="ui tiny modal" id="personnel_assigner_modal">
    <div class="ui header center aligned">
        <a id="assigner_title"></a>
    </div>
    <div class="ui content">
        <form class="ui form" enctype="multipart/form-data" id="personnel_assigner_form">
            <div class="ui grid centered">
                <div class="ui row centered column">
                    <div class="column fourteen wide center aligned field">
						<h4 id="assigner_current_module">
							
						</h4>
                        <div class="ui selection dropdown" id="designations_drop">
							<input type="hidden" name="designation" id="designation">
							<i class="dropdown icon"></i>
							<div class="default text">Designations</div>
						</div>
                        <input type="hidden" name="active_personnel_assigment_id" id="active_personnel_assigment_id">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
    	<div class="ui orange right corner small label">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
        <button type="submit" form="personnel_assigner_form" class="ui green right labeled icon button tiny">
            <i class="save icon"></i>
            Update
        </button>
    </div>
</div>
<div class="ui small long modal profile_view_modal" id="profile_view_modal">
	<div class="scrolling content" id="profile_view_container">
		<form class="ui form" enctype="multipart/form-data" id="registration_update_form">
	  		<div class="ui grid">
		  		<div class="ui row column">
		  			<div class="ui sixteen wide column">
						<div class="ui basic segments">
							<div class="ui segment basic center aligned">
								<h3 align="center">Profile Image</h3>
				  				<div class="ui medium circular circular_border center aligned image">
									<div class="image_container">
										<img src="<?php echo base_url();?>photos/icons/male_default.jpg" class="image center middle aligned flowing_image" id="profile_image_preview">
									</div>
								</div>
								<br>
								<br>
								<div class="three fields">
									<div class="field"></div>
									<div class="field">
								  		<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Profile Image</small></div>
												<div class="visible content">
													&emsp;<i class="image file outline icon large"></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Profile Image" class="profile_update_input" name="ac_image_file_name" id="ac_image_file_name">
											<input type="file" class="invisible" accept="image/*" value="" name="profile_image" id="profile_image">
										</div>
									</div>
					  			</div>
				  			</div>
							<div class="ui padded basic segment">
								<h3 class="ui header" align="center">Personal Information</h3>
								<div class="two fields">
									<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>First Name</small></div>
												<div class="visible content">
													&emsp;<i class="right icon large"><small><b>FN</b></small></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="First Name" class="profile_update_input" name="ac_first_name" id="ac_first_name">
											<input type="hidden" value="" placeholder="First Name" name="active_profile_user_id" id="active_profile_user_id">
										</div>
								  	</div>
								  	<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Middle Name</small></div>
												<div class="visible content">
													&emsp;<i class="right icon large"><small><b>MN</b></small></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Middle Name" class="profile_update_input" name="ac_middle_name" id="ac_middle_name">
										</div>
								  	</div>
								</div>
								<div class="two fields">
								  	<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Last Name</small></div>
												<div class="visible content">
													&emsp;<i class="right icon large"><small><b>LN</b></small></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Last Name" class="profile_update_input" name="ac_last_name" id="ac_last_name">
										</div>
								  	</div>
								  	<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Suffix</small></div>
												<div class="visible content">
													&emsp;<i class="right icon large"><small><b>Sfx</b></small></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Suffix" class="profile_update_input" name="ac_suffix" id="ac_suffix">
										</div>
								  	</div>
								</div>
								<div class="two fields">
									<div class="field">
								      	<div class="ui icon selection dropdown button basic small" id="gender_drop">
								          	&emsp;<i class="venus mars icon"></i>&emsp;
								          	<input type="hidden" class="profile_update_input" name="ac_gender" id="ac_gender">
								          	<div class="default text">Gender</div>
								          	<div class="menu">
								              	<div class="item" data-value="male">
								              		Male
								              		<i class="mars icon"></i>
								              	</div>
								              	<div class="item" data-value="female">
								              		Female
								              		<i class="venus icon"></i>
								              	</div>
								          	</div>
								      	</div>
								  	</div>
								  	<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Birthdate</small></div>
												<div class="visible content">
													&emsp;<i class="calendar check outline right icon large"></i>&emsp;
												</div>
											</div>
										  	<input type="date" value="" class="profile_update_input" name="ac_birthdate" id="ac_birthdate">
										</div>
								  	</div>
								</div>
								<div class="two fields">
									<div class="eight field">
								      	<div class="ui icon selection dropdown button basic small" id="employment_type_drop">
								          	&emsp;<i class="users icon"></i>&emsp;
								          	<input type="hidden" class="profile_update_input" name="ac_employment_type" id="ac_employment_type">
								          	<div class="default text">Employment Type</div>
								          	<div class="menu">
								              	<div class="item" data-value="3">
								              		Regular
								              	</div>
								              	<div class="item" data-value="2">
								              		Contractual
								              	</div>
								              	<div class="item" data-value="1">
								              		CoSW (Office-based)
								              	</div>
								              	<div class="item" data-value="0">
								              		CoSW
								              	</div>
							          	</div>
								      	</div>
							  		</div>
							  	</div>
								<br>
								<div class="two fields">
									<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Position</small></div>
												<div class="visible content">
													&emsp;<i class="right address card icon large"></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Position" class="profile_update_input" name="ac_position" id="ac_position">
										</div>
								  	</div>
								  	<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Phone Number</small></div>
												<div class="visible content">
													&emsp;<i class="right mobile alternate icon large"></i></i>&emsp;
												</div>
											</div>
											<input type="tel" value="" placeholder="Phone Number" class="profile_update_input" name="ac_phone_number" id="ac_phone_number" maxlength="11">
										</div>
								  	</div>
								</div>
								<div class="two fields">
									<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>TIN Number</small></div>
												<div class="visible content">
													&emsp;<i class="right icon large"><small><b>TIN</b></small></i>&emsp;
												</div>
											</div>
											<input type="tel" value="" placeholder="TIN Number" class="profile_update_input" name="ac_tin_number" id="ac_tin_number" maxlength="17">
										</div>
								  	</div>
								  	<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>LBP Account</small></div>
												<div class="visible content">
													&emsp;<i class="right icon large"><small><b>LBP</b></small></i></i>&emsp;
												</div>
											</div>
											<input type="tel" value="" placeholder="LBP Account Number" class="profile_update_input" name="ac_lbp_account" id="ac_lbp_account" maxlength="12">
										</div>
								  	</div>
								</div>
								<h5 align="center">Complete Address</h5>
								<div class="two fields">
									<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Purok/Street</small></div>
												<div class="visible content">
													&emsp;<i class="right road icon large"></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Purok/Street" class="profile_update_input" name="ac_purok_street" id="ac_purok_street">
										</div>
								  	</div>
								  	<div class="field">
								  		<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Barangay</small></div>
												<div class="visible content">
													&emsp;<i class="right map signs icon large"></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Barangay" class="profile_update_input" name="ac_barangay" id="ac_barangay">
										</div>
								  	</div>
								</div>
								<div class="two fields">
									<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Complete Address</small></div>
												<div class="visible content">
													&emsp;<i class="right university icon large"></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="City/Municipality" class="profile_update_input" name="ac_city_municipality" id="ac_city_municipality">
										</div>
								  	</div>
								  	<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Province</small></div>
												<div class="visible content">
													&emsp;<i class="right map outline icon large"></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Province" class="profile_update_input" name="ac_province" id="ac_province">
										</div>
								  	</div>
								</div>
								<div class="two fields centered">
									<div class="eight field center aligned">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>ZIP Code</small></div>
												<div class="visible content">
													&emsp;<i class="right icon large"><small><b>ZIP</b></small></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="ZIP Code" class="profile_update_input" name="ac_zip_code" id="ac_zip_code">
										</div>
								  	</div>	
								</div>
							</div>
							<div class="ui padded basic segment">
								<h3 align="center">Emergency Contact Information</h3>
								<div class="field">
									<div class="ui left action input mini fluid">
										<div class="ui animated button basic mini" tabindex="-1">
											<div class="hidden content"><small>Contact Name</small></div>
											<div class="visible content">
												&emsp;<i class="right user circle outline icon large"></i>&emsp;
											</div>
										</div>
										<input type="text" value="" placeholder="Contact Name" class="profile_update_input" name="ac_ec_name" id="ac_ec_name">
									</div>
							  	</div>
								<div class="two fields">
								  	<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Relationship</small></div>
												<div class="visible content">
													&emsp;<i class="right id badge outline icon large"></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Relationship" class="profile_update_input" name="ac_ec_relationship" id="ac_ec_relationship">
										</div>
								  	</div>	
								  	<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Phone Number</small></div>
												<div class="visible content">
													&emsp;<i class="right mobile alternate icon large"></i></i>&emsp;
												</div>
											</div>
											<input type="tel" value="" placeholder="Contact's Phone Number" class="profile_update_input" name="ac_ec_phone_number" id="ac_ec_phone_number" maxlength="11">
										</div>
								  	</div>
								</div>
								<h5 align="center">Contact's Complete Address</h5>
								<div class="two fields">
									<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Purok/Street</small></div>
												<div class="visible content">
													&emsp;<i class="right road icon large"></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Purok/Street" class="profile_update_input" name="ac_ec_purok_street" id="ac_ec_purok_street">
										</div>
								  	</div>
								  	<div class="field">
								  		<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Barangay</small></div>
												<div class="visible content">
													&emsp;<i class="right map signs icon large"></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Barangay" class="profile_update_input" name="ac_ec_barangay" id="ac_ec_barangay">
										</div>
								  	</div>
								</div>
								<div class="two fields">
									<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Complete Address</small></div>
												<div class="visible content">
													&emsp;<i class="right university icon large"></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="City/Municipality" class="profile_update_input" name="ac_ec_city_municipality" id="ac_ec_city_municipality">
										</div>
								  	</div>
								  	<div class="field">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>Province</small></div>
												<div class="visible content">
													&emsp;<i class="right map outline icon large"></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="Province" class="profile_update_input" name="ac_ec_province" id="ac_ec_province">
										</div>
								  	</div>
								</div>
								<div class="two fields centered">
									<div class="eight field center aligned">
										<div class="ui left action input mini fluid">
											<div class="ui animated button basic mini" tabindex="-1">
												<div class="hidden content"><small>ZIP Code</small></div>
												<div class="visible content">
													&emsp;<i class="right icon large"><small><b>ZIP</b></small></i>&emsp;
												</div>
											</div>
											<input type="text" value="" placeholder="ZIP Code" class="profile_update_input" name="ac_ec_zip_code" id="ac_ec_zip_code">
										</div>
								  	</div>	
								</div>
							</div>
							<div class="ui padded basic segment" id="account_info_segment">
								<h3 align="center">Account Information</h3>
								<div class="field">
									<div class="ui left action input mini fluid">
										<div class="ui animated button basic mini" tabindex="-1">
											<div class="hidden content"><small>Email</small></div>
											<div class="visible content">
												&emsp;<i class="right envelope icon large"></i>&emsp;
											</div>
										</div>
										<input type="email" value="" placeholder="Email Address" class="profile_update_input" name="ac_email_address" id="ac_email_address">
									</div>
							  	</div>
								<div class="field">
									<div class="ui left action input mini fluid">
										<div class="ui animated button basic mini" tabindex="-1">
											<div class="hidden content"><small>Username</small></div>
											<div class="visible content">
												&emsp;<i class="right slack hash icon large"></i>&emsp;
											</div>
										</div>
										<input type="text" value="" autocomplete="off" placeholder="Username" class="profile_update_input" name="ac_username" id="ac_username">
									</div>
							  	</div>
							  	<div class="field">
									<div class="ui left action input mini fluid">
										<div class="ui animated button basic mini" tabindex="-1">
											<div class="hidden content"><small>New Password</small></div>
											<div class="visible content">
												&emsp;<i class="right lock icon large"></i>&emsp;
											</div>
										</div>
										<input type="password" value="" autocomplete="new-password" placeholder="New Password (Leave blank if not updating)" class="profile_update_input" name="ac_new_password" id="ac_new_password">
									</div>
							  	</div>
								<div class="field">
									<div class="ui left action input mini fluid">
										<div class="ui animated button basic mini" tabindex="-1">
											<div class="hidden content"><small>Password</small></div>
											<div class="visible content">
												&emsp;<i class="right check circle outline icon large"></i>&emsp;
											</div>
										</div>
										<input type="password" value="" autocomplete="new-password" placeholder="User Password" class="profile_update_input" name="ac_password" id="ac_password">
									</div>
							  	</div>
							</div>
					  		<br>
						</div>
					</div>
		  		</div>
		  	</div>
	  	</form>
	</div>
	<div class="actions">
		<div class="ui orange right corner small label">
		    <i class="ui times pointered big deny icon"></i>
	  	</div>
	</div>
</div>