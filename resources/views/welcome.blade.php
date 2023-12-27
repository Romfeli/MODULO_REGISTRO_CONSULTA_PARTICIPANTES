<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODULO_ALTA_PERSONA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  
    <script src="{{ asset('js/show_sections.js') }}"></script>
    <script src="{{ asset('js/Validar_dni.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>


</head>
<body>
       

      <div class="container">
        
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
                
                    <p>Español</p>
                  </div>
                </div>
              </div>
            </div>
            <p>{{ $participantes->count() }} participantes</p>
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
                    <th>Creacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participantes as $participante)
                <tr>
                    <td>{{ $participante->dni }}</td>
                    <td>{{ $participante->nombre_y_apellido }}</td>
                    <td>{{ $participante->email }}</td>
                    <td>{{ $participante->telefono }}</td>
                    <td>{{ $participante->created_at }}</td>
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
                <button type="button" onclick="validarDNI();" name="validate_dni" id="validate_dni" class="btn btn-success">Validar DNI</button>
            </div>

            <!-- Sección 2 - Otros datos -->
            <div id="miSeccion2" class="mb-3 d-none">
            <div class="mb-3">
                <input type="text" name="nombre_y_apellido" id="nombre_y_apellido" class="form-control-sm" placeholder="NOMBRE Y APELLIDO" required>
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
                <button type="button" class="btn btn-info" onclick="toggleSection3()">FIRMAR Y ENVIAR</button>
            </div>

            
        </form>
          
        </div>
    </div>
    
</div>

    <!-- Agrega este contenedor en la parte deseada de tu HTML -->
    <div id="mensajeRespuesta" class="alert" style="display: none;"></div>

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