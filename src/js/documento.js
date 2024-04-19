function modal_load(e){
    e.preventDefault();
    Swal.fire({
        title: 'Verificando',
        html: 'Consultando datos',
        footer: '<p class="color-grisBajo no-margin">No cierre la página</p>',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        customClass: {
            popup: 'swal',
        },
        didOpen: () => {
            Swal.showLoading();
            subir_documentos();
        }
    });
}

async function subir_documentos() {
    const datos = new FormData();
    const archivosInputActa = document.getElementById('acta');
    const archivoActa = archivosInputActa.files[0];

    const archivosInputcurp = document.getElementById('curp');
    const archivocurp = archivosInputcurp.files[0];

    const archivosInputComprobante = document.getElementById('compro_dom');
    const archivoComprobante = archivosInputComprobante.files[0];

    const archivosInputBoleta_secu = document.getElementById('boleta_secu');
    const archivoBoleto = archivosInputBoleta_secu.files[0];

    const archivosInputcertificado = document.getElementById('certi_secu');
    const archivoCertificado = archivosInputcertificado.files[0];
    datos.append('archivoActa',archivoActa);
    datos.append('archivoCurp', archivocurp);
    datos.append('archivoCompro', archivoComprobante);
    datos.append('archivoBoleta', archivoBoleto);
    datos.append('archivoCerti', archivoCertificado);
    datos.append('telefono', document.getElementById('telefono').value);
    const url =`http://localhost/api.php?key=11`;
    const respuesta = await fetch(url, {
        method: 'POST',
        body: datos
    });

    const resultado = await respuesta.json();
    if (resultado.success) {
        Swal.fire({
            icon: 'success',
            text: resultado.message,
            timer: 1500,
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                popup: 'swal',
            },
            didClose:() =>{
                    
            }
        })
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: resultado.message,
            customClass: {
                popup: 'swal',
            },
            confirmButtonText: 'Entiendo'
        });
    }
}