$(obtener_registros());
function obtener_registros(productos)
{
	$.ajax({
		url : 'busqueda_editar.php',
		type : 'POST',
		dataType : 'html',
		data : { productos: productos },
	})
	.done(function(resultado){
		$("#tabla_resultados").html(resultado);
	})
}

$(document).on('keyup', '#buscar', function()
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


    $('#enviar').click(function(){
$.ajax({
    url:'buscar_articulo_mes.php',
    type:'POST',
    data:$('#tab2').serialize(),
    success:function(res){
        $('#resultado_mes').html(res);
    }
})
    })



  
