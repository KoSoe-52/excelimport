$(document).ready(function()
{
	$(document).on("click",".delete",function(e)
	{
		$(this).parent().parent().remove();
	});
	$(document).on("submit","#addForm",function(e)
	{
		e.preventDefault();
			$.ajax({
				url: "excelimport.php",
				type:"POST",
				data:new FormData(this),
				contentType: false,
			    cache: false,
			    processData: false,
				beforeSend:function(){
					$(".importInfo").text("လုပ်ဆောင်နေပါသည်...");
				},
				success: function(data){
						$(".importInfo").html(data);
						//alert(data);
					}
			});

		//}
	});

});//ready
			
