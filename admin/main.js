$(document).ready(function() {
		var options = {
		target: '#check',
		//beforeSubmit: showRequest, //pre-submit callback
		success: showResponse, //post submit call-back
		url: 'login.php', //over-rides form action attribute
		type: 'post'
		};
		//binding to the form's using ajaxForm		
		$('#login').ajaxForm(options);
		$('#type').change(function(){
			alert("Loading. . ");
			if($('#type').val()==='faculty') {
				$('#department').load('list.php?type=department');
				$('#position').load('list.php?type=fposition');
				$('#div').load("list.php?type="+$('#type').val()+"&department="+$('#department').val()+"&position="+$('#position').val()+"&status="+$('#status').val());
			}
			else {
				$('#department').load('list.php?type=0');
				$('#position').load('list.php?type=nfposition');
				$('#div').load("list.php?type="+$('#type').val()+"&department="+$('#department').val()+"&position="+$('#position').val()+"&status="+$('#status').val());
			}
		});
		$('#department').change(function() {
			alert("Loading. . ");
			$('#div').load("list.php?type="+$('#type').val()+"&department="+$('#department').val()+"&position="+$('#position').val()+"&status="+$('#status').val());
		});
		$('#position').change(function() {
			alert("Loading. . ");
			$('#div').load("list.php?type="+$('#type').val()+"&department="+$('#department').val()+"&position="+$('#position').val()+"&status="+$('#status').val());
		});
		$('#status').change(function() {
			alert("Loading. . ");
			$('#div').load("list.php?type="+$('#type').val()+"&department="+$('#department').val()+"&position="+$('#position').val()+"&status="+$('#status').val());
		});
});

function showResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
	if(responseText==='Login successful') {
		window.location.href="home.php";
	}
}