$(document).ready(function(){
    if(document.querySelector('#content-mascotas')){
        consultarCitas();
    }
    function consultarCitas(){
        const xhr = new XMLHttpRequest();
        xhr.open('GET','Inc/funciones/consultas.modelo.php?&accion=mascota',true);
    
        xhr.onload = function(){
            if(this.status === 200){
                let respuesta =JSON.parse(xhr.responseText);
                let titulo = document.querySelector('#tituloCitas');
                if(respuesta.length === 0){
                    $(titulo).removeClass('d-none');
                    $('#tabla-contente').addClass('d-none');
                }else{
                    cargarTabla(respuesta)
                }
            }
        }
        xhr.send();
    }
    function cargarTabla(datos){
        let content = document.querySelector('#content-mascotas');
        content.innerHTML="";
        let contenido ='';
        console.log(datos)
        let i= 0;
        for(let i=0;i<datos.length;i++){
            if(i%2===0){
                contenido += `<h2 class="text-center mb-5">Tus mascotas</h2>`
                contenido += `<div class="row">`
            }
            for(let mascota of datos){
                    if(i%2===0){
                       
                    contenido += `   <div class="col-lg-4 mb-3">`
                    contenido += `     <div class="card">`
                    contenido += `           <div class="card-body clearfix">`
                    contenido += `                <p class="m-0 float-right"><small class="text-muted">Fecha : ${mascota.fechaAgenda}</small></p>`
                    contenido += `               <h4 class="card-title ">${mascota.nombreMascota}</h4>`
                    contenido += `               <p class="card-text mb-0 mr-3 d-inline">Color:</p>`
                    contenido += `               <p class="card-text m-0 d-inline">${mascota.colorMascota}</p>`
                    contenido += `               <hr>`
                    contenido += `              <p class="card-text mb-0 mr-3 d-inline">Raza:</p>`
                    contenido += `               <p class="card-text m-0 d-inline">${mascota.razaMascota}</p>`
                    contenido += `               <hr>`
                    contenido += `              <p class="card-text mb-0 mr-3 d-inline">Especie:</p>`
                    contenido += `               <p class="card-text m-0 d-inline">${mascota.nombreEspecie}</p>`
                    contenido += `           </div>`
                    contenido += `          <div class="card-footer">`
                    contenido += `              <a name="" id="" class="btn btn-info btn-sm float-right" href="#" role="button">Ver más información</a>`
                    contenido += `          </div>`
                    contenido += `      </div>`
                    contenido += `   </div>`
                    }

                }    
                if(i % 2 > 0){
                    contenido += `</div>`
                    datos.length = [];
                }
                
        }
        
        content.innerHTML = contenido;
    }
})
