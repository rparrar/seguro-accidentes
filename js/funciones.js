$( document ).ready(function() {
    $('#info').modal('toggle')
});

function mismoPaciente()
{
    let rutp = document.getElementById("rutpaciente").value;
    let nomp = document.getElementById("nombrepaciente").value;
    let apep = document.getElementById("apellidopaciente").value;

    console.log(rutp);
    console.log(nomp);
    console.log(apep);

    if (rutp != "" && nomp !="" && apep !="")
    {

    Swal.fire({
        icon: 'success',
        title: '<span class="text-danger">DATOS COPIADOS!!</span>',
        html: 'SE COPIA<br>[RUT]-[NOMBRE]-[APELLIDO]<br>\n DEL PACIENTE HACIA EL REPRESENTANTE!!',
        timer: 3500,
        footer:'PRESIONE ACEPTAR PARA CERRAR',
        timerProgressBar:true,
        confirmButtonText:'ACEPTAR',
        confirmButtonColor:'#28a745',
      })

    document.getElementById("rutrepresentante").value = document.getElementById("rutpaciente").value;
    document.getElementById("nombrerepresentante").value = document.getElementById("nombrepaciente").value;
    document.getElementById("apellidorepresentante").value = document.getElementById("apellidopaciente").value;
    }else{
        Swal.fire({
            icon: 'error',
            title: '<span class="text-danger">ERROR!!</span>',
            html: 'DEBEN HABER DATOS EN RUT-NOMBRE-APELLIDO <br>EN LA SECCION DATOS PACIENTE',
            footer:'PRESIONE CORREGIR PARA CERRAR Y ARREGLAR ERROR',
            confirmButtonText:'CORREGIR',
            confirmButtonColor:'#28a745',
          })
    }
}

function mayusculas(e) {
    e.value = e.value.toUpperCase();
}

function minusculas(e) {
    e.value = e.value.toLowerCase();
}
$("input#rutpaciente").rut();
$("input#rutrepresentante").rut();
