function modalLoading_login(e) {
  e.preventDefault();
  let timerInterval;
  Swal.fire({
    title: "Consultando datos",
    html: "Validando tu informacion",
    showConfirmButton: false,
    didOpen: () => {
      Swal.showLoading();
        login();
    },

  });
}

async function login() {
    const username=document.getElementById('username').value;
    const password=document.getElementById('password').value;
    const datos = new FormData();
    datos.append('username', username);
    datos.append('password', password);
    const url =`http://localhost/api.php?key=1`;
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
            window.location.href="http://localhost/api.php?key=2"
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