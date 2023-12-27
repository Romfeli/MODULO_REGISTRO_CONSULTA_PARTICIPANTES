let signaturePad; // Variable para el objeto SignaturePad
let haComenzadoDibujo = false; // Variable para controlar si se ha iniciado el dibujo
const url = window.participanteStoreUrl;


// Modificar la función que maneja el clic en el botón "FIRMAR Y ENVIAR"
function toggleSection3() {
    const miSeccion2 = document.getElementById('miSeccion2');

    // Mostrar la sección 2 del formulario
    miSeccion2.classList.remove('d-none');

    // Llamada a la función para mostrar la alerta de firma
    Swal.fire({
        title: 'Firma Digital',
        html: '<canvas id="signatureCanvas" width="400" height="200"></canvas>',
        showCancelButton: true,
        confirmButtonText: 'CONFIRMAR',
      
        didOpen: () => {
            const canvas = document.getElementById('signatureCanvas');
            signaturePad = new SignaturePad(canvas);

            canvas.addEventListener("mousedown", evento => {
                haComenzadoDibujo = true;
            });

            canvas.addEventListener("mousemove", (evento) => {
                if (!haComenzadoDibujo) {
                    return;
                }

                const x = evento.clientX - canvas.getBoundingClientRect().left;
                const y = evento.clientY - canvas.getBoundingClientRect().top;

                signaturePad.strokeMoveTo(x, y);
                signaturePad.stroke();
            });

            ["mouseup", "mouseout"].forEach(nombreDeEvento => {
                canvas.addEventListener(nombreDeEvento, () => {
                    haComenzadoDibujo = false;
                });
            });
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Llamada a la función para manejar la firma y el envío del formulario
            manejarFirmaYEnvio();
        }
    });
}

// Función para manejar la firma y el envío del formulario
async function manejarFirmaYEnvio() {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const formData = new FormData(document.getElementById('formParticipante'));

    formData.append('_token', csrfToken);
    
    const firmaBase64 = signaturePad.toDataURL();
    
    formData.append('firmaBase64', firmaBase64);
    
    const formDataWithSignature = new FormData();
    
    formData.forEach((value, key) => {
        formDataWithSignature.append(key, value);
    });
    formDataWithSignature.append('firmaBase64', firmaBase64);
    const response = await fetch('/', {
        method: 'POST',
        body: formDataWithSignature,
    });
    
    const data = await response.json();
    console.log('Respuesta del servidor:', data);
    

    
    if (data.success) {
        mostrarMensaje(true, data.message);
    } else {
        mostrarMensaje(false, data.message);
    }
    // Función para mostrar mensajes en la pantalla
function mostrarMensaje(esExitoso, mensaje) {
    const mensajeElemento = document.getElementById('mensajeRespuesta');
    
    ocultarTodasLasSecciones();


    if (esExitoso) {
        mensajeElemento.classList.remove('alert-danger');
        mensajeElemento.classList.add('alert-success');
    } else {
        mensajeElemento.classList.remove('alert-success');
        mensajeElemento.classList.add('alert-danger');
    }
    
    mensajeElemento.innerHTML = mensaje;
    mensajeElemento.style.display = 'block';
    location.reload(true);
}

                
}