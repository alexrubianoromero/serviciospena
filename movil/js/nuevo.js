
function verifiqueCredeciales()
{
    var user = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;
    const http=new XMLHttpRequest();
    const url = '../movil/index.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
           document.getElementById("div_principal").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=verificarCredenciales'
    + "&user="+user
    + "&clave="+clave
    );

}

function menuPrincipal(){

    document.getElementById("imagenInicial").style.display = 'block';

    document.getElementById("divBotonesPrincipales").style.display = 'none';

    const http=new XMLHttpRequest();

    const url = '../movil/index.php';

    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){

            //  console.log(this.responseText);

             //var respuesta = JSON.parse(this.responseText);

            // console.log(respuesta.marca);

				// alert(respuesta[0]+' '+ respuesta[1]);

         //		document.getElementById("tipooperacion").text = respuesta[1];

           document.getElementById("div_principal").innerHTML  = this.responseText;

           

        }

    };

    http.open("POST",url);

    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    http.send('opcion=menuPrincipal'

    );

}



function pantallaClientes(){



    // alert('buenas');

    // document.body.style.backgroundColor  = "black"; 

    // document.body.style.color  = "white"; 

    

    document.getElementById("imagenInicial").style.display = 'none';

    document.getElementById("divBotonesPrincipales").style.display = 'block';



    const http=new XMLHttpRequest();

    const url = '../clientes/clientesResponsivo.php';

    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){

           document.getElementById("div_principal").innerHTML  = this.responseText;

        }

    };

    http.open("POST",url);

    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    http.send();

}



function salirSistema(){

    const http=new XMLHttpRequest();

    const url = '../movil/index.php';

    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){

           document.getElementById("divTotal").innerHTML  = this.responseText;

        }

    };

    http.open("POST",url);

    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    http.send('opcion=salirSistema'

    );

}



function pantallaMotos(){

    // document.body.style.backgroundColor  = "black"; 

    // document.body.style.color  = "white"; 

    

    document.getElementById("imagenInicial").style.display = 'none';

    document.getElementById("divBotonesPrincipales").style.display = 'block';



    const http=new XMLHttpRequest();

    const url = '../vehiculos/vehiculos.php';

    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){

           document.getElementById("div_principal").innerHTML  = this.responseText;

        }

    };

    http.open("POST",url);

    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    http.send();

}



function pantallaOrdenes(){

    // document.body.style.backgroundColor  = "black"; 

    // document.body.style.color  = "white"; 

    

    document.getElementById("imagenInicial").style.display = 'none';

    document.getElementById("divBotonesPrincipales").style.display = 'block';



    const http=new XMLHttpRequest();

    const url = '../orden/ordenes.php';

    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){

           document.getElementById("div_principal").innerHTML  = this.responseText;

        }

    };

    http.open("POST",url);

    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    http.send('opcion=ordenes'

    );
}


    function pantallaAyudasFinancieras()
    {
        document.getElementById("imagenInicial").style.display = 'none';
        document.getElementById("divBotonesPrincipales").style.display = 'block';    
        const http=new XMLHttpRequest();
        const url = '../ayudas_financieras/ayudasFinancieras.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
            document.getElementById("div_principal").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send('opcion=menuAyudasFinancieras');
    }
    
    function pantallaTecnicos()
    {
        document.getElementById("imagenInicial").style.display = 'none';
        document.getElementById("divBotonesPrincipales").style.display = 'block';    
        const http=new XMLHttpRequest();
        const url = '../tecnicos/tecnicosmovil.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("div_principal").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send('opcion=pantallaPrincipalTecnicos');
    }
function preguntarNuevaClave(idUsuario)
{
    // alert('cambio de clave '+ idUsuario);
    const http=new XMLHttpRequest();
    const url = '../movil/index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("cuerpoModalCambioClave").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=preguntarNuevaClave'
    + "&idUsuario="+idUsuario
    );
    
}
function actualizarClave()
{
    var idUsuario = document.getElementById("input_id_usuario").value;
    var claveAnterior = document.getElementById("txtClaveAnterior").value;
    var claveNueva = document.getElementById("txtNuevaClave").value;
    const http=new XMLHttpRequest();
    const url = '../movil/index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("cuerpoModalCambioClave").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=actualizarClave'
    + "&idUsuario="+idUsuario
    + "&claveAnterior="+claveAnterior
    + "&claveNueva="+claveNueva
    );
    
    
}