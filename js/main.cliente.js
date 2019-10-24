$(document).ready(function(){
    if(document.querySelector('#table-mascota')){
        consultarCitas();
    }
    function consultarCitas(){
        const xhr = new XMLHttpRequest();
        xhr.open('GET','Inc/funciones/consultas.modelo.php?&accion=mascota',true);
    
        xhr.onload = function(){
            if(this.status === 200){
                let respuesta =JSON.parse(xhr.responseText);
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
        let tabla = document.querySelector('#table-mascota');
        let titulo = document.querySelector('#tituloCitas');
        i=0;
        for(let mascota of datos){
            i++;
            fila = document.createElement('tr');
            numero = document.createElement('td');
            nombre = document.createElement('td');
            color = document.createElement('td');
            raza = document.createElement('td');
            especie = document.createElement('td');
            fecha = document.createElement('td');
            numero.innerHTML = i;
            fila.appendChild(numero);
            nombre.innerHTML = mascota.nombreMascota;
            fila.appendChild(nombre);
            color.innerHTML = mascota.colorMascota;
            fila.appendChild(color);
            tabla.append(fila)
            raza.innerHTML = mascota.razaMascota;
            fila.appendChild(raza);
            especie.innerHTML = mascota.nombreEspecie;
            fila.appendChild(especie);
            fecha.innerHTML = mascota.fechaAgenda;
            fila.appendChild(fecha);
            tabla.append(fila)
        }
    }
})
