
let button = document.getElementById('ingresarGasto')
console.log(button)
button.addEventListener('click', function(e){
    e.preventDefault();
    
    Swal.fire({
        icon: 'error',
        title: 'Atención...',
        text: 'Si presiona el botón Eliminar el usuario quedará eliminado de su Base de Datos',
        footer: '<a href="/profesionales">Volver al menú principal</a>'
      })
})

