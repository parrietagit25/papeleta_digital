<script>

var canvas = document.getElementById("miCanvas");
var ctx = canvas.getContext("2d");
var figuraSeleccionada = null;

async function buscar_placa_papeleta(){
    var placa = document.querySelector("#placa").value;
    console.log(placa);

    if (placa.length >= 6) {

      let formData = new FormData();
      formData.append('placa', placa);
      formData.append('placa_papeleta', 1);

      let respuesta = await fetch('papeleta_status.php', {
          method: 'POST',
          body: formData
      });

      if(respuesta.ok) {
          let data = await respuesta.text();

          var imagen = new Image();
              imagen.src = data; //"../img/img.png"; 

              imagen.onload = function() {
                ctx.drawImage(imagen, 0, 0, canvas.width, canvas.height);
              }
              canvas.addEventListener("click", function(e) {
                var rect = canvas.getBoundingClientRect();
                var x = e.clientX - rect.left;
                var y = e.clientY - rect.top;

                if (figuraSeleccionada === "triangulo") {
                  dibujarTriangulo(x, y);
                } else if (figuraSeleccionada === "cuadrado") {
                  dibujarCuadrado(x, y);
                } else if (figuraSeleccionada === "circulo") {
                  dibujarCirculo(x, y);
                }
              });
          
      } else {
          console.error("Error en la respuesta del servidor:", respuesta.statusText);
      } 
    }
  }

var imagen = new Image();
    imagen.src = "../img/img.png"; 

    imagen.onload = function() {
      ctx.drawImage(imagen, 0, 0, canvas.width, canvas.height);
    }
    canvas.addEventListener("click", function(e) {
      var rect = canvas.getBoundingClientRect();
      var x = e.clientX - rect.left;
      var y = e.clientY - rect.top;

      if (figuraSeleccionada === "triangulo") {
        dibujarTriangulo(x, y);
      } else if (figuraSeleccionada === "cuadrado") {
        dibujarCuadrado(x, y);
      } else if (figuraSeleccionada === "circulo") {
        dibujarCirculo(x, y);
      }
    });

function seleccionarFigura(figura) {
  figuraSeleccionada = figura;
}
function dibujarTriangulo(x, y) {
  ctx.beginPath();
  ctx.moveTo(x, y);
  ctx.lineTo(x + 25, y + 50);
  ctx.lineTo(x - 25, y + 50);
  ctx.closePath();
  
  ctx.lineWidth = 3;
  ctx.strokeStyle = 'blue';
  ctx.stroke();
}
function dibujarCuadrado(x, y) {
  ctx.beginPath();
  ctx.rect(x - 25, y - 25, 50, 50);
  
  ctx.lineWidth = 3;
  ctx.strokeStyle = 'green';
  ctx.stroke();
}
function dibujarCirculo(x, y) {
  ctx.beginPath();
  ctx.arc(x, y, 25, 0, Math.PI * 2);
  
  ctx.lineWidth = 3;
  ctx.strokeStyle = 'red';
  ctx.stroke();
}
function limpiarCanvas() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(imagen, 0, 0, canvas.width, canvas.height);
}


async function guardarCanvas() {

  let canvas = document.getElementById('miCanvas');
  let datos = {
    imagen: canvas.toDataURL(),
    unidad: document.getElementById('unidad').value,
    placa: document.getElementById('placa').value,
    odometro: document.getElementById('odometro').value,
    combustible: document.querySelector('input[name="combustible"]:checked') ? document.querySelector('input[name="combustible"]:checked').value : null,
    poliza_seguro: document.getElementById('poliza_seguro').checked,
    placa_revisado: document.getElementById('placa_revisado').checked,
    formato_danios_menores: document.getElementById('formato_danios_menores').checked,
    registro_unico_vehicula: document.getElementById('registro_unico_vehicula').checked,
    stiker_panapass: document.getElementById('stiker_panapass').checked,
    pito_claxon: document.getElementById('pito_claxon').checked,
    luces_direccionales: document.getElementById('luces_direccionales').checked,
    luces_traseras: document.getElementById('luces_traseras').checked,
    luces_delanteras: document.getElementById('luces_delanteras').checked,
    aire_acondicionado: document.getElementById('aire_acondicinado').checked, 
    limpia_parabrisas: document.getElementById('limpia_parabrisas').checked,
    alfombras: document.getElementById('alfombras').checked, 
    herramientas: document.getElementById('herramientas').checked,
    antenas: document.getElementById('antenas').checked,
    placa_pipa: document.getElementById('placa_pipa').checked,
    extintor: document.getElementById('extintor').checked,
    gato: document.getElementById('gato').checked,
    llanta_repuesto: document.getElementById('llanta_repuesto').checked,
    copas_1234: document.getElementById('copas_1234').checked,
    base_antena: document.getElementById('base_antena').checked,
    triangulo_seguridad: document.getElementById('triangulo_seguridad').checked,
  };

  let respuesta = await fetch('guardar_papeleta.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(datos)
  });

  let resultado = await respuesta.json();
  if (resultado.success) {
    alert('Registrado con éxito!');
    location.reload();
  } else {
    alert('Ocurrió un error ');
  }
}



</script>