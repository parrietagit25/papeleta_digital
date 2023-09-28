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

document.getElementById('file1').addEventListener('change', function() {
        previewImage(this, 'preview1');
        document.querySelector('#frente').style.display = "none";
    });

    document.getElementById('file2').addEventListener('change', function() {
        previewImage(this, 'preview2');
        document.querySelector('#lado_conductor').style.display = "none";
    });

    document.getElementById('file3').addEventListener('change', function() {
        previewImage(this, 'preview3');
        document.querySelector('#maletero').style.display = "none";
    });

    document.getElementById('file4').addEventListener('change', function() {
        previewImage(this, 'preview4');
        document.querySelector('#lado_pasajero').style.display = "none";
    });

async function guardarCanvas() {

  let canvas = document.getElementById('miCanvas');
  let formData = new FormData();

  formData.append('imagen', canvas.toDataURL());
  formData.append('unidad', document.getElementById('unidad').value);
  formData.append('placa', document.getElementById('placa').value);
  formData.append('odometro', document.getElementById('odometro').value);
  formData.append('combustible', document.querySelector('input[name="combustible"]:checked') ? document.querySelector('input[name="combustible"]:checked').value : "");
  formData.append('poliza_seguro', document.getElementById('poliza_seguro').checked ? 1 : 0);
  formData.append('placa_revisado', document.getElementById('placa_revisado').checked ? 1 : 0);
  formData.append('formato_danios_menores', document.getElementById('formato_danios_menores').checked ? 1 : 0);
  formData.append('registro_unico_vehicula', document.getElementById('registro_unico_vehicula').checked ? 1 : 0);
  formData.append('stiker_panapass', document.getElementById('stiker_panapass').checked ? 1 : 0);
  formData.append('pito_claxon', document.getElementById('pito_claxon').checked ? 1 : 0);
  formData.append('luces_direccionales', document.getElementById('luces_direccionales').checked ? 1 : 0);
  formData.append('luces_traseras', document.getElementById('luces_traseras').checked ? 1 : 0);
  formData.append('luces_delanteras', document.getElementById('luces_delanteras').checked ? 1 : 0);
  formData.append('aire_acondicionado', document.getElementById('aire_acondicionado').checked ? 1 : 0);
  formData.append('limpia_parabrisas', document.getElementById('limpia_parabrisas').checked ? 1 : 0);
  formData.append('alfombras', document.getElementById('alfombras').checked ? 1 : 0);
  formData.append('herramientas', document.getElementById('herramientas').checked ? 1 : 0);
  formData.append('antenas', document.getElementById('antenas').checked ? 1 : 0);
  formData.append('placa_pipa', document.getElementById('placa_pipa').checked ? 1 : 0);
  formData.append('extintor', document.getElementById('extintor').checked ? 1 : 0);
  formData.append('gato', document.getElementById('gato').checked ? 1 : 0);
  formData.append('llanta_repuesto', document.getElementById('llanta_repuesto').checked ? 1 : 0);
  formData.append('copas_1234', document.getElementById('copas_1234').checked ? 1 : 0);
  formData.append('base_antena', document.getElementById('base_antena').checked ? 1 : 0);
  formData.append('triangulo_seguridad', document.getElementById('triangulo_seguridad').checked ? 1 : 0);

  // Agregar las imágenes redimensionadas
  const blob1 = await getResizedImageBlob(document.getElementById('file1'), 400, 400);
  formData.append('foto1', blob1);
  const blob2 = await getResizedImageBlob(document.getElementById('file2'), 400, 400);
  formData.append('foto2', blob2);
  const blob3 = await getResizedImageBlob(document.getElementById('file3'), 400, 400);
  formData.append('foto3', blob3);
  const blob4 = await getResizedImageBlob(document.getElementById('file4'), 400, 400);
  formData.append('foto4', blob4);

  // Hacer el envío al servidor
  let respuesta = await fetch('guardar_papeleta.php', {
    method: 'POST',
    body: formData
  });

  let resultado = await respuesta.json();
  if (resultado.success) {
    alert('Registrado con éxito!');
    location.reload();
  } else {
    alert('Ocurrió un error ');
  }
}


function resizeImage(file, maxWidth, maxHeight, callback) {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function (event) {
        const img = new Image();
        img.src = event.target.result;
        img.onload = function () {
            let width = img.width;
            let height = img.height;
            if (width > height) {
                if (width > maxWidth) {
                    height *= maxWidth / width;
                    width = maxWidth;
                }
            } else {
                if (height > maxHeight) {
                    width *= maxHeight / height;
                    height = maxHeight;
                }
            }
            const canvas = document.createElement('canvas');
            canvas.width = width;
            canvas.height = height;
            canvas.getContext('2d').drawImage(img, 0, 0, width, height);
            
            callback(canvas.toDataURL());
        }
    }
}

async function getResizedImageBlob(fileInput, maxWidth, maxHeight) {
  const file = fileInput.files[0];  
  console.log(file);
  return new Promise((resolve, reject) => {
      resizeImage(file, maxWidth, maxHeight, function (resizedImgBase64) {
            const byteString = atob(resizedImgBase64.split(',')[1]);
            const arrayBuffer = new ArrayBuffer(byteString.length);
            const int8Array = new Uint8Array(arrayBuffer);
            for (let i = 0; i < byteString.length; i++) {
                int8Array[i] = byteString.charCodeAt(i);
            }
            const blob = new Blob([int8Array], { type: "image/jpeg" });
            resolve(blob);
        });
    });
}

function previewImage(input, previewId) {
    const file = input.files[0];
    if (file) {
        resizeImage(file, 800, 800, function (resizedImgBase64) {
            // Muestra la imagen en la vista previa.
            const preview = document.getElementById(previewId);
            preview.src = resizedImgBase64;
        });
    }
}


</script>