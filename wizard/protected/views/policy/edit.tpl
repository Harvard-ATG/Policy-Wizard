<h3>Collaboration Policy Statement</h3>

<form id="policy-form" class="form-horizontal row-fluid isites-form">
	<fieldset>
		<legend>Edit Policy</legend>

		<button id="template-modal-btn" type="button" class="btn">Show Templates</button>
		<textarea class="input-xlarge span12" id="policy-body" name="body" rows="10">{if $title != ''}<h5>{$title}</h5>{/if}{$body}</textarea>
		
		
		<div class="form-actions">

			{if $is_published}
				<button id="policy-submit" class="btn" type="button">Save</button>
			{else}
				<button id="policy-submit" class="btn" type="button">Publish</button>
				<button id="policy-save" class="btn" type="button">Save as Draft</button>
			{/if}
			<a class="btn" href="{url url='/site/index'}">Cancel</a>
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

<div class="modal hide" id="failure-modal" style="text-align: center">
	<div class="modal-body">
		<p class="lead">Failure saving data!</p>
	</div>
	<div class="modal-footer" style="text-align: center">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>

<div class="modal hide" id="template-modal">
	<div class="modal-body">
		<h4>Instructions for customizing collaboration policy</h4>
		<div>
		If you choose to write your own policy on collaboration, keep the following guidelines in mind.
		</div>
		<div>
			<ol>
		<li class="wrap">You should outline explicitly what students may or may not discuss with their classmates outside the classroom and how best to capture those discussions on formal work submitted for course credit.</li>

		<li class="wrap">You may want to include citation resources for students including the <a href="http://usingsources.fas.harvard.edu/icb/icb.do">Harvard Guide to Using Sources</a>.</li>

		<li class="wrap">You may want to include information about conforming to the College’s policies on academic integrity found in the <a href="http://isites.harvard.edu/icb/icb.do?keyword=k69286&pageid=icb.page355695">Harvard College Handbook for Students</a>.</li>
		</ol>
		</div>
		
		{foreach from=$templates item=template}
			<div class="well">
				<h5>{$template.NAME}</h5><br/>
				{$template.BODY}
			</div>
		{/foreach}
		
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>


<script>
// this has to be defined outside of the CDATA because otherwise it gets htmlentity encoded
//   &'s become $amp;s and the link no longer works
var submit_url = '{url url="/policy/admindex"}';

var ajax_save_and_publish_url = "{url url='/policy/save/1' ajax=1}";
var ajax_save_url = "{url url='/policy/save' ajax=1}";

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
		//console.log("success");
		if(data.response === true){
			$('#success-modal').modal();
		} else {
			$('#failure-modal').modal();
		}
				
	}
	successSubmit = function(data, textStatus, xhr){
		//console.log("successSubmit");
		if(data.response === true){
			// then we just move on to the submit url
			window.location = submit_url;
		} else {
			$('#failure-modal').modal();
		}
		
	}
	
	savePolicy = function(submit){
		// set url
		//console.log("savePolicy");
		var url = '';
		
		if(submit){
			url = ajax_save_and_publish_url;			
		} else {
			url = ajax_save_url;
		}
		
		// get body
		//body = $('#policy-body').val();
		var body = tinyMCE.get('policy-body').getContent();
		// set data
		var data = {
			body: body
		}
		$.ajax({
			type: 'POST',
			url: url,
			data: data,
			dataType: 'json',
			error: failure,
			success: function(data, textStatus, xhr){
				if(submit){
					successSubmit(data, textStatus, xhr);
				} else {
					success(data, textStatus, xhr);
				}
			}
		});
	}
	
	submitPolicy = function(){
		savePolicy(true);
	};
	saveNoSubmitPolicy = function(){
		savePolicy(false);
	};
	
	openTemplateModal = function(){
		$('#template-modal').modal();
	}

	$(document).ready(function(){
		$('#policy-save').click(saveNoSubmitPolicy);
		$('#policy-submit').click(submitPolicy);
		$('#template-modal-btn').click(openTemplateModal);
	});
]]>
</script>