<section class="form_wrap">
    <section class="cantact_info">
        <section class="info_title">
            <span class="glyphicon glyphicon-user"></span>
            <h2>INFORMACION<br>DE CONTACTO</h2>
        </section>
        <section class="info_items">
            <p><span class="glyphicon glyphicon-envelope"></span> NotasCotecnova@gmail.com</p>
            <p><span class="glyphicon glyphicon-earphone"></span> +57 1234567890</p>
        </section>
    </section>
    <div class="form_contact">
        <h2>Envia mensaje informativo</h2>
        <div class="user_info">
            <label for="email">Correo electronico destinatario *</label>
            <input type="text" id="email" name="email" required>
            <input type="submit" value="Enviar Mensaje" id="btnSend">
        </div>
    </div>
</section>

<script type="text/javascript">
//guardar nuevo registro de docente
    $('#btnSend').click(function(){
        //Se entregan los valores de los inputs del formularios de docentes por medio del id
        email=$('#email').val();
        //Los valores creados se envian a la funcion que realiza el nuevo registro
        //Esta funcion esta en docente/js/funciones.js
        emailinfo(email);
    });
</script>
