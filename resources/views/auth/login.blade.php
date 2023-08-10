@extends('plantilla.app')

@section('auth')
    {{--  <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">-
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  --}}
    <div  >

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <img src="{{ asset('img/logo2.png') }}" alt="CRECER"  class="justify-content-center" width="450">
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Inicio de Sesión</h5>

                                    <p class="text-center small">Introduce tu correo y contraseña</p>
                                </div>

                                <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation">
                                    @csrf
                                    <div class="col-12">
                                        <label for="email" class="form-label">Correo</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true"
                                                id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Recordar</label>
                                        </div>
                                    </div>

                                    <!-- <div class="col-12">
                                      <button class="btn btn-secondary w-100" onclick="openCamera()">Acceder a la Cámara</button>
                                    </div> -->
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" style="background-color: #145A32" type="submit" id="loginButton">Ingresar</button>
                                    </div>
                                    <div id="errorMessage" class="alert alert-danger mt-3" style="display: none;">
                                        ¡Error al verificar la foto! Tu cuenta ha sido bloqueada temporalmente.
                                    </div>
                                </form>
                                <div class="col-12">
                                        <button class="btn btn-secondary w-100" onclick="openCamera()">Acceder a la Cámara</button>
                                </div>
                                <div class="col-12 mt-3">
                                    <video id="cameraPreview" autoplay playsinline></video>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-secondary" onclick="capturePhoto()">Capturar Foto</button>
                                </div>
                                <div class="col-12 mt-3">
                                    <img id="capturedPhoto" src="" alt="Foto Capturada">
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary w-100" style="background-color: #145A32" onclick="sendPhotoToAPI()">verificar</button>
                                </div>
                                <div id="verificationMessage" class="alert alert-success" style="display: none;">
                                    ¡Verificación exitosa! La imagen ha sido verificada correctamente.
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

 <!-- Script para abrir la cámara -->
<!-- Script para abrir la cámara y capturar una foto -->
<script>
    let stream;
    
    function openCamera() {
        // Verificar si el navegador admite getUserMedia
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            // Solicitar acceso a la cámara
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (s) {
                    stream = s;
                    var videoElement = document.getElementById('cameraPreview');
                    videoElement.srcObject = stream;
                })
                .catch(function (error) {
                    console.error('Error al acceder a la cámara:', error);
                });
        } else {
            console.error('getUserMedia no es compatible con este navegador.');
        }
    }
    
    
    function capturePhoto() {
        if (stream) {
            var videoElement = document.getElementById('cameraPreview');
            var canvas = document.createElement('canvas');
            canvas.width = videoElement.videoWidth;
            canvas.height = videoElement.videoHeight;
            canvas.getContext('2d').drawImage(videoElement, 0, 0, canvas.width, canvas.height);
            var imgElement = document.getElementById('capturedPhoto');
            imgElement.src = canvas.toDataURL('image/png');
        }
    }
    function sendPhotoToAPI() {
        var imgElement = document.getElementById('capturedPhoto');
        var base64Data = imgElement.src.split(',')[1];
        console.log( base64Data);
         // Obtener el contenido base64
        // Aquí debes realizar la solicitud a la API utilizando fetch o cualquier otra librería
        // Ejemplo usando fetch:
        fetch('https://incidentsapi.site/public/api/mediaInfractor/identifyUser', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({foto: base64Data })
        })
        .then(response => response.json())
        .then(data => {
            // Aquí puedes manejar la respuesta de la API
            // Verificar si la imagen ha sido verificada correctamente en la respuesta de la API
        if (data.verificate == true) {
            // Mostrar el mensaje de verificación exitosa
           
        } else {
            // La imagen no fue verificada correctamente
            console.log(data);
            var verificationMessage = document.getElementById('verificationMessage');
            verificationMessage.style.display = 'block';
        }
        })
        .catch(error => {
            console.error('Error al enviar la foto a la API:', error);
            //console.log( data);
            // Mostrar mensaje de error y bloquear el formulario
        var errorMessage = document.getElementById('errorMessage');
        var loginButton = document.getElementById('loginButton');

        errorMessage.style.display = 'block';
        loginButton.disabled = true;
          

        });
    }


</script>

@endsection
