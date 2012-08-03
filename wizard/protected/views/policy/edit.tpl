<form id="policy-form" class="form-horizontal row-fluid isites-form" action="/policy/edit/{$template_id}/{$policy_id}">
	<fieldset>
		<legend>Edit Policy</legend>
		<textarea class="input-xlarge span12" id="policy-body" name="body" rows="10">{$body}</textarea>
		
		
		<div class="form-actions">
			<input type="submit" class="btn btn-primary" value="Submit"/>
			<!-- THIS WILL NOT WORK WITH ISITES
			<button id="policy-submit" type="submit" class="btn btn-primary">Submit</button>
			-->
			<button id="policy-save" class="btn btn-primary" type="button">Save</button>
			<a class="btn" href="{url url='/site/admindex'}">Cancel</a>
		</div>
		
	</fieldset>	
</form>


<div class="modal hide" id="success-modal">
	<div class="modal-body">
		<p class="lead">saved</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>

<script>
<![CDATA[
	failure = function(){
		console.log("failure");
	}
	success = function(data, textStatus, xhr){
		// TODO fix this shit!
		console.log(data);
		console.log(textStatus);
		console.log(xhr)
		if(data){
			console.log("success");
		} else {
			console.log("failure getting response data");
		}
		$('#success-modal').modal();
				
	}
	
	savePolicy = function(){
		// set url
		url = "{url url='/policy/save' ajax=1}";
		// get body
		body = $('#policy-body').val();
		// set data
		data = {
			body: body
		}
		$.ajax({
			type: 'POST',
			url: url,
			data: data,
			// TODO fix this shit
			dataType: 'json',
			error: failure,
			success: success
		});
	}

	$(document).ready(function(){
		$('#policy-save').click(savePolicy);
	});
]]>
</script>