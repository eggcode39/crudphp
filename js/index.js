var urlweb = "http://www.guabba.com/crudphp/";

function save() {
    var valor = "correcto";
    var person_name = $('#person_name').val();
    var person_surname = $('#person_surname').val();

    if(person_name == ""){
        alert('El campo Nombre está vacío');
        $('#person_name').css('border','solid red');
        valor = "incorrecto";
    } else {
        $('#person_name').css('border','');
    }

    if(person_surname == ""){
        alert('El campo Apellido está vacío');
        $('#person_surname').css('border','solid red');
        valor = "incorrecto";
    } else {
        $('#person_surname').css('border','');
    }


    if (valor == "correcto"){
        var cadena = "person_surname=" + person_surname +
            "&person_name=" + person_name;
        $.ajax({
            type:"POST",
            url: urlweb + "api/Index/save",
            data: cadena,
            success:function (r) {
                if(r==1){
                    alert("¡Guardado!");
                    location.reload();
                } else {
                    alert("Fallo el envio");
                }
            }
        });
    }

}

function deleter(id){
    var cadena = "id=" + id;
    $.ajax({
        type:"POST",
        url: urlweb + "api/Index/delete",
        data : cadena,
        success:function (r) {
            if(r==1){
                alert('Registro Eliminado');
                location.reload();
            } else {
                alert('No se pudo realizar');
            }
        }
    });
}