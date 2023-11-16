    <div id="login-modal" class="modal-perfil"></div>

    <div class="modal-content-perfil" id="modalPerfil">
        <span class="close closeModalUno">&times;</span>

        <h2>Bienvenidos a Frutos del Castillo</h2>
        <form action="#" method="post">
            <div>
                <input class="input__login" type="text" placeholder="Email">
            </div>
            <div>
                <input class="input__login" type="password" placeholder="Contraseña">

                <button class="login-button">Iniciar Sesión</button>
                <a class="password-forgot" href="#" id="modalOlvidarContrasena">¿Olvidaste
                    la contraseña?</a>
            </div>
        </form>
        <div class="signup-link">

            <p>¿No tienes cuenta? <span id="logoAbrirModalDos">Registrate</span></p>
        </div>
    </div>
    <!-- fin del modal de registro -->

    <!-- modal no tienes cuenta -->
    <div class="modal-content-perfil" id="modalSignup">
        <span class="close closeModalDos">&times;</span>
        <h2>Bienvenidos a Frutos del Castillo</h2>
        <form>
            <div>
                <input id="signup-name" class="input__login" type="text" placeholder="Nombre">
            </div>
            <div>

                <input id="signup-email" class="input__login" type="text" placeholder="Email">
            </div>
            <div>
                <input id="signup-phone" class="input__login" type="number" placeholder="Teléfono">
            </div>
            <div>
                <input id="signup-password" class="input__login" type="password" placeholder="Contraseña">
            </div>
            <div>
                <input id="signup-confirm-password" class="input__login" type="password" placeholder="Confirmar Contraseña">
            </div>
            <div id="policy-checkbox">
                <input type="checkbox" id="accept-policy">
                <label for="accept-policy">Acepto las políticas y condiciones</label>
            </div>
            <button id="signup-button" class="login-button">Crear Cuenta</button>
        </form>
    </div>
    <!--modal no tienes cuenta -->

    <!-- modal de recuperar Contraseña email -->
    <div class="modal_content_recuperar_contraseña_email" id="content_recuperar_contraseña_email">
        <span class="close cerrarModalOlvidar">&times;</span>

        <h2>Recupera tu cuenta con tu email</h2>
        <form action="#" method="post">
            <div>

                <input class="input__login" type="text" placeholder="Email">
            </div>
            <div>
                <button class="login-button" type="submit" id="abrirModalEnviarCodigo">Enviar
                    Codigo</button>
            </div>
        </form>
    </div>

    <!-- modal de recuperar contraseña Codigo -->

    <div class="modal_content_recuperar_contraseña" id="modalDosEnviar">
        <span class="close closeModalDosEnviar">&times;</span>

        <h2>Ingresa el codigo de validacón</h2>
        <form action="#" method="post">
            <div>

                <input class="input__login" type="text" placeholder="Codigo">
            </div>
            <div>
                <button class="login-button" id="abrirModalCambiarContrasena">Recuperar</button>
            </div>
        </form>
    </div>

    <!--fin del  modal de recuperar contraseña Codigo -->

    <!-- modal de recuperar Contraseña -->
    <div class="modal_content_recuperar_contraseña_codigo" id="modalTresRecuperar">
        <span class="close  closeTresRecuperar">&times;</span>

        <h2>Ingresa tu nueva contraseña</h2>
        <form action="#" method="post">
        <div>
            <input class="input__login" type="text" placeholder="Contraseña">
            <input class="input__login" type="text" placeholder="Nueva Contraseña">
        </div>
        <div>
            <button class="login-button">Recuperar Contraseña</button>
        </div>
        </form> 
    </div>
    <!-- fin del modal de recuperar Contraseña -->

    <!-- modal de Domicilio -->
    <div id="tarjetaDomicilio" class="contenedor__domicilio">
        <span id="cerra__domicilio" class="close">&times;</span>
        <form action="#" class="form__domicilio">
            <div class="columnas">
                <p class="titulo__campos">
                    Nombre<input type="text" name id>
                </p>
            </div>

            <div class="filas">
                <p class="titulo__campos">
                    Dirección de Correo<input type="email" name id>
                </p>
                <p class="titulo__campos">
                    Telefono<input type="text" name id>
                </p>
                <p class="titulo__campos">
                    Dirección<input type="text" name id>
                </p>
                <p class="titulo__campos">
                    Categoría <select name id>
                        <option value>Selecciona la Categoría</option>
                        <option value>Comidas Rapidas</option>
                        <option value>Bebidas</option>
                        <option value>postres</option>
                        <option value>extra</option>
                    </select>
                </p>
            </div>

            <div class="columnas__domicilio">
                <p class="titulo__campos">
                    Categoría <select name id>
                        <option value>Selecciona el producto</option>
                        <option value>Productos 1</option>
                        <option value>productos 2</option>
                        <option value>productos 3</option>
                    </select>
                </p>
                <textarea class="textarea__comentario" name id cols="30" rows="5" placeholder="Indicaciones"></textarea>
            </div>

            <div class="aceptar__informacion">
                <label for="aceptacion">Acepto la información enviada</label>
                <input type="checkbox" id="aceptacion" name="aceptacion" required>
            </div>

            <button class="botom__reservas">Reserva Ya!!</button>
        </form>

    </div>
    <!-- fin del modal de Domicilio -->

    <!-- Modal de reserva -->
    <div id="tarjetaReserva" class="contenedor__reserva">
        <span id="cerra__reserva" class="close">&times;</span>
        <form action="#" class="form__reserva">
            <div class="columnas">
                <p class="titulo__campos">
                    Nombre<input type="text" name id>
                </p>
            </div>

            <div class="filas">
                <p class="titulo__campos">
                    Direccion Correo<input type="email" name id>
                </p>
                <p class="titulo__campos">
                    Telefono<input type="text" name id>
                </p>
                <p class="titulo__campos">
                    Fecha de reservacion<input type="date" name id>
                </p>
                <p class="titulo__campos">
                    Numero de Personas<input type="text" name id>
                </p>
            </div>

            <div class="columnas">
                <textarea class="textarea__asunto" name id cols="30" rows="5" placeholder="Asusto"></textarea>
                <textarea class="textarea__comentario" name id cols="30" rows="5" placeholder="Comentario"></textarea>
            </div>

            <div class="aceptar__informacion">
                <label for="aceptacion">Acepto la información enviada</label>
                <input type="checkbox" id="aceptacion" name="aceptacion" required>
            </div>

            <button class="botom__reservas">Reserva Ya!!</button>
        </form>

    </div>
    <!-- fin modal de reserva -->