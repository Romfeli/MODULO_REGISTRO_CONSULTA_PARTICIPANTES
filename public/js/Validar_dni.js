function validarDNI() {
    var dniInput = document.getElementById('dni');
    var dniRegex = /^\d{8}$/;
    
    if (dniRegex.test(dniInput.value)) {
        var dni = dniInput.value || '';

        toggleSection2();

        $.ajax({
            url: '/' + dni,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log('Datos recibidos:', data);
                obtenerDatosParticipante(data);
            },
            error: function () {
                console.log('Error al realizar la solicitud Ajax.');
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

function obtenerDatosParticipante(data) {
    $.ajax({
        url: 'http://127.0.0.1:8000/' + data.dni,

        method: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log('Datos recibidos:', data);
            if (data) {
                // Si el DNI es válido, rellenar el formulario con la información del participante
                llenarFormulario(data);

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
            console.log('Error al realizar la solicitud Ajax.');
            // Error al obtener información del participante
            mostrarError('Error al obtener información del participante.');
        }
    });
}

function llenarFormulario(data) {
    console.log('Datos recibidos para llenar el formulario:', data);

    // Rellenar el formulario con la información del participante
    $('#nombre_y_apellido').val(data.nombre_y_apellido || '');
    $('#email').val(data.email || '');
    $('#telefono').val(data.telefono || '');
    // Otras asignaciones según la estructura de tu formulario

    // Marcar el formulario como "modo de actualización"
    $('#formParticipante').attr('data-update-mode', 'true');
    toggleSection2();
}



function mostrarExito(mensaje) {
    // Muestra el mensaje de éxito 
    console.log(mensaje);
}











