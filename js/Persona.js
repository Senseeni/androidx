$(function()
{
	$('.divFoto').hide();

	$('.chkEsCandidato').click(function()
	{
		if($(".chkCandidato").is(':checked'))
			$('.divFoto').show();
			else
			$('.divFoto').hide();

	})
	$('.btnGrabar').click(function()
	{
		if($('.cmbLocacion').val()=="0")
		{
			alert('Falta seleccionar locacion');
			$('.cmbLocacion').focus();
			return false;
		}
		if(!$.trim($('.txtRut').val()))
		{
			alert('Falta rut.');
			$('.txtRut').focus();
			return false;
		}
		if(!$.trim($('.txtDigito').val()))
		{
			alert('Falta digito.');
			$('.txtDigito').focus();
			return false;
		}
		if(!$.trim($('.txtNombre').val()))
		{
			alert('Falta nombre.');
			$('.txtNombre').focus();
			return false;
		}
		if(!$.trim($('.txtApellido').val()))
		{
			alert('Falta Apellido.');
			$('.txtApellido').focus();
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
			else if(index == 1)
				$('.cmbLocacion').val($(this).text());
			else if(index == 2)
				$('.txtRut').val($(this).text());
			else if(index == 3)
				$('.txtDigito').val($(this).text());
			else if(index == 4)
				$('.txtNombre').val($(this).text());
			else if(index == 5)
				$('.txtApellido').val($(this).text());
			else if(index == 6)
				$('chkEsCandidato').prop("checked",$(this).text()=="1"?true:false);
			else if(index == 7)
			{
				if($(".chkEsCandidato").is(':checked'))
				{
					$('divFotoCandidato')
					.html('<img src="' + $(this).text()+'" alt="Sin Foto">')
					$('.divFoto').show();
				}
				else
				{
					$('divFotoCandidato').html('');
					$('.divFoto').hide();
				}
			}
		});
		
	});
	
});