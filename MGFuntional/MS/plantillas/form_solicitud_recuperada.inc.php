<input type="hidden" id="id_solicitud" name="id_solicitud" value="<?php echo $id_solicitud; ?>">
 
  <div class="col-md-6 ">
<div class="form-group">
    <label for="solicitud">Solicitud:</label>
    <input type="text" class="form-control"id="solicitud"name="solicitud"placeholder=""value="<?php echo$solicitud_recuperada->obtenerId(); ?>" readonly="">
   
</div>
      
      <div class="form-group">
    <label for="solicitud">Solicitante:</label>
    <input type="text" class="form-control"id="solicitante"name="solicitante"placeholder=""value="<?php echo$solicitud_recuperada->obtenerNombreUsuario(); ?>" readonly="">
</div>
      
      <div class="form-group">
    <label for="correo">Tienda:</label>
    <input type="text" class="form-control"id="correo"name="correo"placeholder=""value="<?php echo $solicitud_recuperada ->obtenerTienda() ?>"readonly="">
</div>
      <div class="form-group">
    <label for="correo">Prioridad:</label>
    <input type="text" class="form-control"id="correo"name="correo"placeholder=""value="<?php echo $solicitud_recuperada ->obtenerPrioridad() ?>"readonly="">
</div>
  

<div class="form-group">
    <label for="solicitud">Diagnostico Usuario :</label>
    <textarea class="form-control" rows="5" id="diagnostico"name="diagnostico" readonly=""><?php echo$solicitud_recuperada->obtenerDetalle(); ?> </textarea>
</div>

<hr>
</div>

  <div class="col-md-6">
<div class="form-group">
    <label for="estado">Estado:</label>
    <input type="text" class="form-control"id="estado"name="estado"placeholder=""value="<?php echo$solicitud_recuperada->obtenerEstado(); ?>" readonly="">
    
</div>
 <label>
     <h5 class="alert alert-warning"><input type="checkbox" name="cerrar" value="CERRADA"> Marca este recuadro para cerrar la solicitud</h5>
         
 </label>


<div class="form-group">
    <label for="solicitud" >Comentarios Tecnico/Responsable  :</label>
    <textarea class="form-control "   rows="5" id="diagnostico"name="diagnostico" required=""></textarea>
</div>


<div class="form-group">
    <label for="tecnico">Nombre Tecnico Responsable :</label>
    <input type="text" class="form-control"id="tecnico"name="tecnico"value="<?php echo $_SESSION['nombre_usuario']; ?>">
</div>


<div class="form-group">
    <label for="solicitud">E-Mail:</label>
    <input type="text" class="form-control"id="correo"name="correo"placeholder=""value="<?php echo $_SESSION['correo']; ?>"readonly="">
</div>

</div>

<hr>
<br>
<button type="submit" class="btn btn-primary"name="guardar">Actualizar</button>