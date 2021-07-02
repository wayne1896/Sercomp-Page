$(obtener_registros());

function obtener_registros(empleados)
{
	$.ajax({
		url : 'buscadores/consultaempleado.php',
		type : 'POST',
		dataType : 'html',
		data : { empleados: empleados },
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
