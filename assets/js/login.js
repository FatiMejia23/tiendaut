$(document).ready(function() {
    $("#btnLogin").click(function(e) {
        e.preventDefault();

        /*var user = $("#inputUser").val().trim();
        var pass = $("#inputPassword").val().trim();

        alert(user + " " + pass);
        console.log(user + " " + pass);
*/

        mostrarDato();

    }); //end #btnLogin

    async function mostrarDato() {
        const datos = new FormData(document.getElementById('formulario'));

        await fetch('assets/data/login.php', {
            method: 'POST',
            body: datos
        })

        .then(response => response.json())
            .then(response => {
                //  console.log(response.datos);
                if (response.dato == 'ok') {
                    location.href = "nueva.hmtl;"
                } else {
                    alert("Datos incorrectos");
                }
            })
            .catch(err => {
                console.log(err);
            });
    } //end mostrar dato
});