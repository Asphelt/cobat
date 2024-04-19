function modalLoading_aspirante(e){
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
            crear_aspirante();
        }
    });
}

async function crear_aspirante() {
    const datos = new FormData();
    datos.append('in_nombre_completo', document.getElementById('username').value);
    datos.append('in_apellido_paterno', document.getElementById('middlename').value);
    datos.append('in_apellido_materno', document.getElementById('lastname').value);
    datos.append('in_password', document.getElementById('password').value);
    datos.append('in_correo',  document.getElementById('e-mail').value);

    const url = 'http://localhost/api.php?key=10';
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
                window.location.href="http://localhost/login.php"
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