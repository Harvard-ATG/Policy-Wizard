<h1>Collaboration Policy Statement</h1>

<form id="policy-form" class="form-horizontal row-fluid isites-form" action="/policy/edit/{$template_id}/{$policy_id}">
	<fieldset>
		<legend>Edit Policy</legend>

		<button id="template-modal-btn" type="button" class="btn btn-primary">Show Templates</button>
		<textarea class="input-xlarge span12" id="policy-body" name="body" rows="10">{$body}</textarea>
		
		
		<div class="form-actions">
			<input type="submit" class="btn btn-primary" value="Publish"/>
			<!-- THIS WILL NOT WORK WITH ISITES
			<button id="policy-submit" type="submit" class="btn btn-primary">Submit</button>
			-->
			<button id="policy-save" class="btn btn-primary" type="button">Save as Draft</button>
			<a class="btn" href="{$cancel_link}">Cancel</a>
		</div>
		
	</fieldset>	
</form>


<div class="modal hide" id="success-modal" style="text-align: center">
	<div class="modal-body">
		<p class="lead">Saved</p>
	</div>
	<div class="modal-footer" style="text-align: center">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>

<div class="modal hide" id="template-modal">
	<div class="modal-body">
		<ul>
		{foreach from=$templates item=template}
			<li class="well">
				{$template.NAME}<br/>
				{$template.BODY}
			</li>
		{/foreach}
		</ul>
		
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>


<script>
<![CDATA[

tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 :"bold,italic,underline,|,fontselect,fontsizeselect",
        theme_advanced_buttons2 :"link,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,removeformat,code",
        theme_advanced_buttons3 :"",
        theme_advanced_buttons4 :"",
//"save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
//        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
//        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
//        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Example content CSS (should be your site CSS)
        //content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        //template_external_list_url : "js/template_list.js",
        //external_link_list_url : "js/link_list.js",
        //external_image_list_url : "js/image_list.js",
        //media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        //template_replace_values : {
        //        username : "Some User",
        //        staffid : "991234"
        //}
});

tinymce.execCommand('mceToggleEditor',false,'body');


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
	
	openTemplateModal = function(){
		$('#template-modal').modal();
	}

	$(document).ready(function(){
		$('#policy-save').click(savePolicy);
		$('#template-modal-btn').click(openTemplateModal);
	});
]]>
</script>