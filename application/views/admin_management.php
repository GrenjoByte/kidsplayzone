<div class="ui grid centered">
	<div class="twelve wide mobile fourteen wide tablet thirteen wide computer column centered">
		<h1 class="ui header center aligned">
			<a class="pointered" id="page_label"></a>
		</h1>
		<br>
		<div id="container_section">
			<div class="ui four stackable special cards" id="cards_container">
				
			</div>
		</div>
	</div>
</div>
<div class="ui medium modal" id="user_management_modal">
	<i class="close icon orange" id="user_management_modal_exit"></i>
	<div class="ui icon header medium">
		<a id="personnel_management_title"></a>
	</div>
	<div class="scrolling content">
		<div class="ui basic fluid accordion styled" id="personnel_documents_tab">
								
		</div>
	</div>
</div>
<br>
<br>
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
        <button class="ui cancel left labeled icon button" id="personnel_files_upload_dismiss">
            Cancel
            <i class="cancel icon"></i>
        </button>
        <button type="submit" form="personnel_assigner_form" class="ui green right labeled icon button">
            <i class="save icon"></i>
            Update
        </button>
    </div>
</div>