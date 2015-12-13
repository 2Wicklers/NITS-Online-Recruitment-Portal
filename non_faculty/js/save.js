$(document).ready(function () {
	$('#save').click(function () {        
			data = $('#recruitment').serializeArray();
            $.post('save_form.php',data,function(data,status){
				if(status==='success')
				{
					alert(data + "Form Saved Successfully");
				}
				else
				{
					alert("Error in connection, retry!!");
				}				
            });
			
});
});