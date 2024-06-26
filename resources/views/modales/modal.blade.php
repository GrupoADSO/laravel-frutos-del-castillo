<div class="modal-content-perfil" id="modalPerfil">
    <span class="close closeModalUno"><i class="fa-solid fa-xmark"></i></span>

    <h2>Bienvenidos a Frutos del Castillo</h2>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="contenedor__input__login">
            <i class="fa-solid fa-envelope icon__login"></i>
            <input class="input__login" name="email" type="text" placeholder="Email">
        </div>
        @if ($errors->has('email'))
            <div><i class="bi bi-x-circle"></i> {{ $errors->first('email') }}</div>
        @endif


        <div class="contenedor__input__login">
            <i class="fa-solid fa-lock icon__login"></i>
            <input class="input__login" name="password" type="password" placeholder="Contraseña">
        </div>
        @if ($errors->has('password'))
            <div><i class="bi bi-x-circle"></i> {{ $errors->first('password') }}</div>
        @endif

        <div>
            <button class="login-button">Iniciar Sesión</button>
        </div>
    </form>

    <div class="signup-link">

        <p class="password-forgot" id="modalOlvidarContrasena">¿Olvidaste
            la contraseña?</p>
        <p class="crear__cuenta">¿No tienes cuenta? <span id="logoAbrirModalDos">Registrate</span></p>
    </div>
</div>


<div class="modal-content-perfil" id="modalSignup">
    <span class="close closeModalDos"><i class="fa-solid fa-xmark"></i></span>
    <h2>Registrate Ya!!</h2>
    <form action="{{ route('crearUsuario') }}" method="post">
        @csrf
        <div class="contenedor__input__login">
            <i class="fa-solid fa-user icon__login"></i>
            <input class="input__login" name="nombre" type="text" placeholder="Nombre">
        </div>
        @if ($errors->has('nombre'))
        <div><i class="bi bi-x-circle"></i>El campo nombre es incorrecto</div>
    @endif

        <div class="contenedor__input__login">
            <i class="fa-solid fa-user icon__login"></i>
            <input class="input__login" name="apellido" type="text" placeholder="apellido">
        </div>
        @if ($errors->has('apellido'))
        <div><i class="bi bi-x-circle">el campo apellido es incorrecto</i></div>
    @endif

        <div class="contenedor__input__login">
            <i class="fa-solid fa-calendar icon__login"></i>
            <label for="signup-fecha-nacimiento">Fecha de Nacimiento</label>
            <input id="signup-fecha-nacimiento" name="fecha_nacimiento" class="input__login" type="date">
        </div>
        @if ($errors->has('fecha_nacimiento'))
        <div><i class="bi bi-x-circle"></i>Debes ser mayor de edad</div>
    @endif

        <div class="contenedor__input__login">
            <i class="fa-solid fa-envelope icon__login"></i>
            <input class="input__login" name="email" type="text" placeholder="Email">
        </div>
        @if ($errors->has('email'))
            <div><i class="bi bi-x-circle"></i>Ingresa otro correo</div>
        @endif

        <div class="contenedor__input__login">
            <i class="fa-solid fa-mobile icon__login"></i>
            <input class="input__login" name="celular" type="number" placeholder="Teléfono">
        </div>
        @if ($errors->has('telefono'))
        <div><i class="bi bi-x-circle"></i>Telefono invalido</div>
    @endif

        <div class="contenedor__input__login">
            <i class="fa-solid fa-lock icon__login"></i>
            <input class="input__login" name="password" type="password" placeholder="Contraseña">
        </div>
        <div class="contenedor__input__login">
            <i class="fa-solid fa-lock icon__login"></i>
            <input class="input__login" name="password_verification" type="password" placeholder="Confirmar Contraseña">
        </div>
        @if ($errors->has('password_verification'))
            <div><i class="bi bi-x-circle"></i>Las Contraseñas no coinciden</div>
        @endif

        <div id="policy-checkbox">
            <input type="checkbox" id="accept-policy" required>
            <label for="accept-policy">Acepto las políticas y condiciones</label>
        </div>
        <button id="signup-button" class="login-button">Crear Cuenta</button>
    </form>
</div>

<div class="modal_content_recuperar_contraseña_email" id="content_recuperar_contraseña_email">
    <span class="close cerrarModalOlvidar"><i class="fa-solid fa-xmark"></i></span>

    <h2>Recupera tu cuenta con tu email</h2>
    <form action="#" method="post">
        <div class="contenedor__input__login">
            <i class="fa-solid fa-envelope icon__login"></i>
            <input class="input__login" type="text" placeholder="Email">
        </div>
        <div>
            <button class="login-button" type="submit" id="abrirModalEnviarCodigo">Enviar
                Codigo</button>
        </div>
    </form>
</div>

<div class="modal_content_recuperar_contraseña" id="modalDosEnviar">
    <span class="close closeModalDosEnviar"><i class="fa-solid fa-xmark"></i></span>

    <h2>Ingresa el codigo de validacón</h2>
    <form action="#" method="post">
        <div class="contenedor__input__login">
            <i class="fa-solid fa-lock icon__login"></i>
            <input class="input__login" type="codigo-email" placeholder="codigo">
        </div>
        <div>
            <button class="login-button" id="abrirModalCambiarContrasena">Recuperar</button>
        </div>
    </form>
</div>

<div class="modal_content_recuperar_contraseña_codigo" id="modalTresRecuperar">
    <span class="close  closeTresRecuperar"><i class="fa-solid fa-xmark"></i></span>

    <h2>Ingresa tu nueva contraseña</h2>
    <!-- <form action="#" method="post"> -->
    <div class="contenedor__input__login">
        <i class="fa-solid fa-lock icon__login"></i>
        <input class="input__login" type="password" placeholder="Contraseña">
    </div>
    <div class="contenedor__input__login">
        <i class="fa-solid fa-lock icon__login"></i>
        <input class="input__login" type="password" placeholder="Repetir Contraseña">
    </div>

    <div>
        <button class="login-button">Recuperar Contraseña</button>
    </div>
</div>
