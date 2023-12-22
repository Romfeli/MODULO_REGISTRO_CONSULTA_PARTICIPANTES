<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODULO_ALTA_PERSONA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<<<<<<< HEAD
=======




  
>>>>>>> fc751f8d465a06f06031e2cf7123d54b25f33b7f
   
</head>
<body>
       

  <style>


  .card {
    width: 18rem;
    border: 1px solid #ccc; /* Borde gris */
    border-radius: 0; /* Sin borde redondeado */
  }

  .card-body {
    text-align: center;
  }

  .custom-box {
    width: 500px;
    height: 150px;
    border-radius: 3dvh;
    border: 1px solid #ccc;
    margin: 20px auto;
    padding: 20px;
    align-content: center;
    background-color: #ccc;
  }
  

  .custom-box-text {
    margin-bottom: 10px;
  }

  .custom-buttons {
    text-align: center;
    margin-top: 10px;
  }
  




</style>


      <div class="container">
        <div class="row mt-4">
          <div class="col-12 text-center">
            <div class="custom-box">
              <div class="row">
                <div class="col-6">
                  <div class="custom-box-text text-start">
                    <p>06/12/2023</p>
                    <p>12:45 13:30</p>
                    <p>El virus</p>
                  </div>
                </div>
                <div class="col-6">
                  <div class="custom-box-text text-end">
                    <p>Olga Hernandez</p>
                    <p>{{ $participantes->count() }} participantes</p>
                    <p>Español</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="custom-buttons">
                <div class="custom-buttons">
                    <button type="button" class="btn btn-secondary" onclick="toggleSection()">Ver participantes</button>
                    <button type="button" class="btn btn-primary" onclick="toggleSection1()">Añadir participante</button>
                </div> 
            </div>
          </div>




          
     <!-- Sección a mostrar u ocultar -->
<div id="miSeccion" class="row mt-4 d-none">
    <div class="col-12 text-center">
        @isset($participantes)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre y Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participantes as $participante)
                <tr>
                    <td>{{ $participante->dni }}</td>
                    <td>{{ $participante->nombre_y_apellido }}</td>
                    <td>{{ $participante->email }}</td>
                    <td>{{ $participante->telefono }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endisset
    </div>
</div>








<div class="row mt-4">
    <div class="col-12 text-center">
        <form id="formParticipante" method="post" action="{{ route('participante.store') }}">
            @csrf

            <!-- Sección 1 - DNI -->
            <div id="miSeccion1" class="mb-3 d-none">
                <input type="text" name="dni" id="dni" class="form-control-sm" placeholder="DNI" pattern="\d{8}" title="El DNI debe contener 8 dígitos numéricos" required>
<<<<<<< HEAD
                <button type="button" onclick="validarDNI();" name="validate_dni" id="validate_dni" class="btn btn-success">Validar DNI</button>
=======
                <button type="button" onclick="validarDNI(); obtenerDatosParticipante();" name="validate_dni" id="validate_dni" class="btn btn-success">Validar DNI</button>
>>>>>>> fc751f8d465a06f06031e2cf7123d54b25f33b7f
            </div>

            <!-- Sección 2 - Otros datos -->
            <div id="miSeccion2" class="mb-3 d-none">
            <div class="mb-3">
<<<<<<< HEAD
                <input type="text" name="nombre_y_apellido" id="nombre_y_apellido" class="form-control-sm" placeholder="NOMBRE Y APELLIDO" required>
=======
                <input type="text" name="nombre_y_apellido" id="nombre" class="form-control-sm" placeholder="NOMBRE Y APELLIDO" required>
>>>>>>> fc751f8d465a06f06031e2cf7123d54b25f33b7f
            </div>

            <div class="mb-3">
                <input type="email" name="email" id="email" class="form-control-sm" placeholder="EMAIL" required>
            </div>

            <div class="mb-1">
                <input type="tel" name="telefono" id="telefono" class="form-control-sm" placeholder="TELEFONO" required>
            </div>

            <div class="mb-3">
                <input type="text" name="inputPersonalizado" id="inputPersonalizado" class="form-control-sm" placeholder="INPUT">
            </div>

            <div class="mb-3">
                  <select name="selectPersonalizado" id="selectPersonalizado" class="form-select-sm" required>
                    <option value="opcion1">Opción 1</option>
                    <option value="opcion2">Opción 2</option>
                    <option value="opcion3">Opción 3</option>
                </select>
            </div>

            
            <div class="mb-3">
            <textarea class="form-control-sm" type="text" placeholder="Avisos Legales" aria-label="Disabled input example" disabled></textarea>
            </div>

            <label>Checkbox 1:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="checkbox1" id="checkbox1" required>
                    <label class="form-check-label" for="checkbox1">Obligatorio</label>
                </div>
                  <br>
                <label>Checkbox 2:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="checkbox2" id="checkbox2" required>
                    <label class="form-check-label" for="checkbox2">Obligatorio</label>
                </div>
                <br>
                <button type="submit" class="btn btn-info"  >FIRMAR Y ENVIAR</button>
            </div>

            
        </form>
    </div>
</div>







<<<<<<< HEAD
=======



>>>>>>> fc751f8d465a06f06031e2cf7123d54b25f33b7f
<script>    
function toggleSection() {
    const miSeccion = document.getElementById('miSeccion');

    if (miSeccion.classList.contains('d-none')) {
        // Mostrar la sección
        miSeccion.classList.remove('d-none');
    } else {
        // Ocultar la sección
        miSeccion.classList.add('d-none');
    }
}

function toggleSection1() {
    const miSeccion1 = document.getElementById('miSeccion1');
    const miSeccion2 = document.getElementById('miSeccion2');

    // Mostrar la sección de validación de DNI
    miSeccion1.classList.remove('d-none');

    // Ocultar la sección 2 (si está visible)
    miSeccion2.classList.add('d-none');
}

function toggleSection2() {
    const miSeccion2 = document.getElementById('miSeccion2');

    // Mostrar la sección 2 del formulario
    miSeccion2.classList.remove('d-none');
}




function validarDNI() {
    var dniInput = document.getElementById('dni');
    var dniRegex = /^\d{8}$/;
    
    if (dniRegex.test(dniInput.value)) {
<<<<<<< HEAD
        var dni = dniInput.value || '';

        toggleSection2();
=======
        var dni = dniInput.value || ''
        toggleSection2()
>>>>>>> fc751f8d465a06f06031e2cf7123d54b25f33b7f

        $.ajax({
            url: 'http://127.0.0.1:8000/' + dni,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
<<<<<<< HEAD
                console.log('Datos recibidos:', data);
                
                obtenerDatosParticipante(data);
            },
            error: function () {
                console.log('Error al realizar la solicitud Ajax.');
=======
                if (data.valido) {
                    // Si el DNI es válido, hacer otra solicitud para obtener los datos del participante
                    obtenerDatosParticipante(dniInput.value);
                    
                } else {
                    // El DNI es inválido
                    mostrarError('El DNI ingresado no es válido. Inténtalo de nuevo.');
                }
            },
            error: function () {
>>>>>>> fc751f8d465a06f06031e2cf7123d54b25f33b7f
                // Error al verificar el DNI
                mostrarError('Error al verificar el DNI.');
            }
        });
    } else {
        // El formato del DNI es inválido
        mostrarError('El DNI debe contener 8 dígitos numéricos');
    }
}

function mostrarError(mensaje) {
    // Muestra el mensaje de error en algún lugar de tu interfaz de usuario
    console.error('Error: ' + mensaje);
}

<<<<<<< HEAD
function obtenerDatosParticipante(data) {
    $.ajax({
        url: 'http://127.0.0.1:8000/' + data.dni,

        method: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log('Datos recibidos:', data);
            if (data.valido) {
                // Si el DNI es válido, rellenar el formulario con la información del participante
                llenarFormulario(json(data));
=======
function obtenerDatosParticipante(dni) {
    $.ajax({
        url: 'http://127.0.0.1:8000/' + dni,
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data.valido) {
                // Si el DNI es válido, rellenar el formulario con la información del participante
                llenarFormulario(data);
>>>>>>> fc751f8d465a06f06031e2cf7123d54b25f33b7f

                // Verificar si hay un mensaje de éxito y mostrarlo en la interfaz
                if (data.success) {
                    mostrarExito(data.mensaje);
                }
            } else {
                // DNI inválido
                mostrarError('No se encontraron datos para el DNI proporcionado.');
            }
        },
        error: function () {
<<<<<<< HEAD
            console.log('Error al realizar la solicitud Ajax.');
=======
>>>>>>> fc751f8d465a06f06031e2cf7123d54b25f33b7f
            // Error al obtener información del participante
            mostrarError('Error al obtener información del participante.');
        }
    });
}

function llenarFormulario(data) {
<<<<<<< HEAD
    console.log('Datos recibidos para llenar el formulario:', data);

    // Rellenar el formulario con la información del participante
    $('#nombre').val(data.nombre_y_apellido || '');
    $('#email').val(data.email || '');
    $('#telefono').val(data.telefono || '');
    // Otras asignaciones según la estructura de tu formulario

    // Marcar el formulario como "modo de actualización"
    $('#formParticipante').attr('data-update-mode', 'true');
    toggleSection2();
=======
    // Rellenar el formulario con la información del participante
    document.getElementById('nombre_y_apellido').value = data.nombre_y_apellido || '';
    document.getElementById('email').value = data.email || '';
    document.getElementById('telefono').value = data.telefono || '';
    // Otras asignaciones según la estructura de tu formulario

    // Marcar el formulario como "modo de actualización"
    document.getElementById('formParticipante').setAttribute('data-update-mode', 'true');
>>>>>>> fc751f8d465a06f06031e2cf7123d54b25f33b7f
}



function mostrarExito(mensaje) {
    // Muestra el mensaje de éxito en algún lugar de tu interfaz de usuario
    // Puedes usar alert, console.log, o mostrarlo en una etiqueta en tu HTML, por ejemplo
    console.log(mensaje);
}










</script>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif

@if($errors->has('email'))
    <div class="alert alert-danger">
        {{ $errors->first('email') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success')['mensaje'] }}
    </div>
@endif




 <!-- Agregar Bootstrap JS y Popper.js al final del cuerpo para garantizar que funcionen correctamente -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     

     
 


</body>
</html>