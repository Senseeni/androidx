$(function()
{
	$('.btnGrabar').click(function()
	{
		if(!$.trim($('.txtNombre').val()))
		{
			alert('Falta nombre.');
			$('.txtNombre').focus();
			return false;
		}
	});
	
	$('.datagrid').on('click', 'table tr', function()
	{
		var fila = $(this);
		
		$(this).children("td").each(function(index)
		{
			if(index == 0)
				$('.txtId').val($(this).text());
			if(index == 1)
				$('.txtNombre').val($(this).text());
			if(index == 2)
				$('.chkActivo').prop("checked",$(this).text()=="1"?true:false);
		});
		
	});
	
});