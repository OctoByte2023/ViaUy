<?php
 require_once '../../../vendor/autoload.php';

 require_once '../partials/head.php';

?>
<h1 class="page-title">Solicitud de Acceso a ViaUy</h1>
    <p class="page-description">Complete el formulario a continuación para solicitar acceso a la aplicación ViaUy como empresa de transporte de omnibuses:</p>
    
    <form action="procesar_solicitud.php" method="POST" class="company-container">
        <label for="nombre_empresa" class="form-label">Nombre de la Empresa:</label>
        <input type="text" id="nombre_empresa" name="nombre_empresa" required class="form-input">
        
        <label for="correo_contacto" class="form-label">Correo de Contacto:</label>
        <input type="email" id="correo_contacto" name="correo_contacto" required class="form-input">
        
        <label for="telefono_contacto" class="form-label">Teléfono de Contacto:</label>
        <input type="tel" id="telefono_contacto" name="telefono_contacto" required class="form-input">
        
        <label for="descripcion_empresa" class="form-label">Descripción de la Empresa:</label><br>
        <textarea id="descripcion_empresa" name="descripcion_empresa" rows="4" cols="50" required class="form-textarea"></textarea>
        
        <label for="motivo_solicitud" class="form-label">Motivo de la Solicitud:</label><br>
        <textarea id="motivo_solicitud" name="motivo_solicitud" rows="4" cols="50" required class="form-textarea"></textarea>
        
        <input type="submit" value="Enviar Solicitud" class="form-submit">
    </form>


    <script>
        cambiarTitulo("ViaUy | Solicitud De Empresa");
    </script>
<?php
 require_once '../partials/footer.php';
?>