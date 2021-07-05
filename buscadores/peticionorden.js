$(obtener_registros());

function obtener_registros(orden)
{
	$.ajax({
		url : 'buscadores/consultaorden.php',
		type : 'POST',
		dataType : 'html',
		data : { orden: orden },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
