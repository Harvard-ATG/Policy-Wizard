<form id="policy-form" class="form-horizontal row-fluid isites-form" action="/policy/edit/{$template_id}/{$policy_id}">
	<fieldset>
		<legend>Edit Policy</legend>
		<textarea class="input-xlarge span12" id="body" name="body" rows="20">{$body}</textarea>
		
		
		<div class="form-actions">
			<button id="policy-submit" type="submit" class="btn btn-primary">Submit</button>
			<a class="btn" href="{url url='/site/admindex'}">Cancel</a>
		</div>
		
	</fieldset>	
</form>
