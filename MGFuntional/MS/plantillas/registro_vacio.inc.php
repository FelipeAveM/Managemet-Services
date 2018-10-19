<div class="form-group">
    <label>Nombre Usuario</label>
    <input type="text" class="form-control" name="nombre" placeholder="Miembro Empresa">


</div>
<div class="form-group">
    <label>Email Corporativo</label>
    <input type="email" class="form-control" name="correo" placeholder="Usuario@dominio.com.co">

</div>
<div class="form-group">
    <label>Contraseña</label>
    <input type="password" class="form-control" name="clave1">

</div>

<div class="form-group">
    <label>Repite la contraseña</label>
    <input type="password" class="form-control" name="clave2">

</div>

<div class="form-group">
    <label> Tienda </label>
    <select class="form-control" id="tienda" name="tienda" >
        <option value="-1" id="tienda">Seleccione</option>
        <option value="Tienda 1">Tienda 1 </option>
        <option value="Tienda 2">Tienda 2</option>
        <option value="Tienda 3">Tienda 3</option>
        <option value="Tienda 4">Tienda 4</option>
        <option value="Tienda n">Tienda n</option>
       
      
    </select>
    
</div>


<div class="form-group">
    <label>Perfil</label>
    <select class="form-control" id="perfil" name="perfil">
        <option value="-1" id="perfil">Seleccione</option>
        <option value="Administrador">Administrador </option>
        <option value="Técnico">Técnico</option>
        <option value="Supervisor">Supervisor</option>
        <option value="Jefe De Tienda">Jefe De Tienda</option>
    </select>
</div>
 





<button type="reset" class="btn btn-default btn-primary">Limpiar</button> <br><br>

<button type="submit"class="btn btn-default btn-primary" name="enviar">Enviar Datos</button>
