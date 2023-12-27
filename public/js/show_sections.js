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

// Función para mostrar u ocultar la sección 1
function toggleSection1() {
    const miSeccion1 = document.getElementById('miSeccion1');
    const miSeccion2 = document.getElementById('miSeccion2');

    // Ocultar la sección 2 si está visible
    if (!miSeccion2.classList.contains('d-none')) {
        miSeccion2.classList.add('d-none');
    }

    // Alternar entre mostrar y ocultar la sección 1
    if (miSeccion1.classList.contains('d-none')) {
        // Mostrar la sección 1
        miSeccion1.classList.remove('d-none');
    } else {
        // Ocultar la sección 1
        miSeccion1.classList.add('d-none');
    }
}


function toggleSection2() {
    const miSeccion2 = document.getElementById('miSeccion2');
    // Alternar entre mostrar y ocultar la sección
    if (miSeccion2.classList.contains('d-none')) {
        // Mostrar la sección
        miSeccion2.classList.remove('d-none');
    } else {
        // Ocultar la sección
        miSeccion2.classList.remove('d-none');
    }
}

function ocultarSeccion1() {
    const miSeccion1 = document.getElementById('miSeccion1');
    miSeccion1.classList.add('d-none');
}

function ocultarSeccion2() {
    const miSeccion2 = document.getElementById('miSeccion2');
    miSeccion2.classList.add('d-none');
}



function ocultarTodasLasSecciones() {
    ocultarSeccion1();
    ocultarSeccion2();

    // Agrega más llamadas a funciones si tienes más secciones
}