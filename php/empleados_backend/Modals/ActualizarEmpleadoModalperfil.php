<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id_empleado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Editar Perfil</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php/empleados_backend/registroempleado.php?id=<?php echo $row['id_empleado']; ?>">
            <div class="form-group">
                        <label for="inputEmail">E-Mail</label>
                        <input type="email" class="form-control" readonly="" name="correo" id="correo" value="<?php echo $row['correo_empleado']; ?>" required="required" placeholder="Ingrese su email"/>
                    </div>

                    <h1>Datos Personales</h1> 
                    <div class="form-group">
                        <label for="inputfistname"">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"  value="<?php echo $row['nombre_empleado']; ?>" required="required" placeholder="Ingrese su Nombre"/>
                    </div>
                    <div class="form-group">
                        <label for="inputlastname">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido"  value="<?php echo $row['apellido_empleado']; ?>" required="required" placeholder="Ingrese su Apellido"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Telefono</label>
                        <input type="number" class="form-control" name="telefono" id="telefono"  value="<?php echo $row['telefono_empleado']; ?>" required="required" placeholder="Ingrese su Telefono"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputName">Cedula</label>
                        <input type="text" class="form-control" name="cedula" id="cedula"  value="<?php echo $row['cedula_empleado']; ?>" required="required" placeholder="Ingrese su Cedula"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento"  value="<?php echo $row['fechanacimiento_empleado']; ?>" required="required" placeholder="Fecha de Nacimiento"/>
                    </div>

                   
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
			</form>
            </div>

        </div>
    </div>
</div>


