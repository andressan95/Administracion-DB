$(function(){
	$('[name=codigo]').on('keyup', function(){
		var codigo = $('[name=codigo]').val();
		$.ajax({
			type: 'POST',
			url: 'controlador/buscarUsuario_controlador.php',
			data: 'codigo='+codigo,
			success: function(data){
				var array = eval(data);
				$('[name=nombres]').val(array[1]);
				$('[name=apellidos]').val(array[2]);
				$('[name=nacimiento]').val(array[3]);
				$('[name=sexo]').val(array[4]);
				if(array[0] > 0){
					$('#formUsuarios').attr('formType', 'editar');
				}else{
					$('#formUsuarios').attr('formType', 'registrar');
				}
			}
		});
	});

	$('#formUsuarios').on('submit', function(){
		var tipo = $('#formUsuarios').attr('formType');
		var form = $('#formUsuarios').serialize();
		$.ajax({
			type: 'POST',
			url: 'controlador/guardarUsuario_controlador.php',
			data: form+'&tipo='+tipo,
			success: function(data){
				if(tipo == 'registrar'){
					if(data = 1){
						$('#formUsuarios')[0].reset();
						alert('Usuario registrado con exito.');
					}else if(data == 0){
						alert('No se pudo registrar al usuario.');
					}
				}else if(tipo == 'editar'){
					if(data = 1){
						alert('Usuario editado con exito.');
					}else if(data == 0){
						alert('No se pudo editar al usuario.');
					}
				}
			}
		});
		return false;
	});
});