$(document).ready(function(){
    const formulario = document.querySelector('#frmFormulario');
    cargarComboBox();
    consultarMascotas();
    $(formulario).on('submit',prepararFormulario);


    function prepararFormulario(e){
        e.preventDefault();
        accion = document.querySelector('#accion').value;
        if(document.querySelector('#txtNombre')){
            txtNombre = document.querySelector('#txtNombre').value 
        }
        txtPassword = document.querySelector('#txtPassword').value;
        txtCedula = document.querySelector('#txtCedula').value;
        if(txtPassword.trim()===''||txtCedula.trim()===''){
            swal("campos obligatorios", "presiona Ok");
        }else{
            const datos = new  FormData();
            if(document.querySelector('#txtNombre')){
            datos.append('txtNombre',txtNombre)
            }
            datos.append('txtPassword',txtPassword);
            datos.append('txtCedula',txtCedula);
            datos.append('accion',accion);
    
            if(accion==='crear'){
                insertarBaseDatos(datos);
            }
            else if(accion==='login'){
                consultarUsuario(datos);
            }
        }

    }
    function insertarBaseDatos(datos){

        const xhr = new XMLHttpRequest();

        xhr.open('POST','Inc/funciones/modeloadmin.php');

        xhr.onload = function(){
            if(this.status===200){
                const respuesta = JSON.parse(xhr.responseText);
                console.log(respuesta)
                if(respuesta.respuesta==='correcto'){
                    swal("Registrado correctamente", "presiona Ok");
                    setTimeout(() => {
                        location.href = 'login.php'
                    }, 3000);
                }
            }
        }
        xhr.send(datos);
    }
    function consultarUsuario(datos){
        const xhr = new XMLHttpRequest();

        xhr.open('POST','Inc/funciones/modeloadmin.php');

        xhr.onload = function(){
            if(this.status===200){
                const respuesta = JSON.parse(xhr.responseText);
                if(respuesta.respuesta==='correcto'){
                    if(respuesta.tipoUsu==='1'){
                        location.href = 'index-admin.php';
                    }else{
                        location.href = 'index-cliente.php';
                    }
                    
                }
                    if(respuesta.error==='nouser'){
                        swal("Usuario o contraseña incorrecta", "presiona Ok");
                    }
                
            }
        }
        xhr.send(datos);
    }
    const frmAngenda = document.querySelector('#frmFormularioAgenda');
    
    $(frmAngenda).on('submit',prepararAngenda);

    function cargarComboBox(){
        const xhr = new XMLHttpRequest();
        xhr.open("GET",'Inc/funciones/consultas.modelo.php?&accion=cargar',true);
        xhr.onload = function(){
            if(this.status==200){
                const respuesta = JSON.parse(xhr.responseText);
                const comboBox = document.querySelector('#dueñoMascota');
                for(persona of respuesta){
                    let item = document.createElement('option');
                    item.setAttribute("value",persona.idPersona);
                    item.innerHTML = persona.nombrePersona
                    comboBox.appendChild(item);

                }
            }
        }
        xhr.send();
    }
    function prepararAngenda(e){
        e.preventDefault();
        let nombreMascota = document.querySelector('#nombreMascota').value;
        let razaMascota = document.querySelector('#razaMascota').value;
        let fechaMascota = document.querySelector('#fechaMascota').value;
        let colorMascota = document.querySelector('#colorMascota').value;
        let especieMascota = document.querySelector('#especieMascota').value;
        let dueñoMascota = document.querySelector('#dueñoMascota').value;
        let accion = document.querySelector('#crearCita').value;
        if(nombreMascota.trim()=='' || razaMascota.trim()==''|| fechaMascota.trim()==''|| colorMascota.trim()==''||
        especieMascota.trim()=='' || dueñoMascota.trim()==''){
            swal("Todos los campos son obligatorios", "presiona Ok");
        }else{
            const datos = new FormData();
            datos.append('nombreMascota',nombreMascota);
            datos.append('razaMascota',razaMascota);
            datos.append('fechaMascota',fechaMascota);
            datos.append('especieMascota',especieMascota);
            datos.append('colorMascota',colorMascota);
            datos.append('dueñoMascota',dueñoMascota);
            datos.append('accion',accion);
            if(accion==='crear'){
                insertarCita(datos);
            }
        }
    }
    function insertarCita(datos){
        const xhr = new XMLHttpRequest();
        xhr.open('POST','Inc/funciones/consultas.modelo.php',true);
        xhr.onload =  function(){
            if(this.status === 200){
                const respuesta = JSON.parse(xhr.responseText);
                if(respuesta.respuesta==='correcto'){
                    frmAngenda.reset();
                    swal("Agenda guardada correctamente", "presiona Ok");
                    consultarMascotas();
                }
            }
        }
        xhr.send(datos);
    }
    function consultarMascotas(){
        const xhr = new XMLHttpRequest();
        xhr.open('GET','Inc/funciones/consultas.modelo.php?&accion=masco',true);
        xhr.onload = function(){
            if(this.status === 200){
                const respuesta = JSON.parse(xhr.responseText);
                cargarTabla(respuesta);
            }
        }
        xhr.send();

    }
    function cargarTabla(datos){
        let i=0;
        let tabla =  document.querySelector('#table-conten')
        tabla.innerHTML = '';
        for(mascota of datos){
            i++;
            fila = document.createElement('tr');
            numero = document.createElement('td');
            nombre = document.createElement('td');
            color = document.createElement('td');
            raza = document.createElement('td');
            especie = document.createElement('td');
            fecha = document.createElement('td');
            propietario = document.createElement('td');
            cedula = document.createElement('td');

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
            propietario.innerHTML = mascota.nombrePersona;
            fila.appendChild(propietario);
            cedula.innerHTML = mascota.cedulaPersona;
            fila.appendChild(cedula);
            tabla.append(fila)
        }
    }
    if(document.querySelector('#inputBuscar')){
        inputBuscar = document.querySelector('#inputBuscar');
        $(inputBuscar).on('input',consultaMascotaUsuario);
    }
    function consultaMascotaUsuario(e){
        let cedula = e.target.value;
        const xhr = new XMLHttpRequest();
        xhr.open('GET','Inc/funciones/consultas.modelo.php?&accion=consultausu&cedula=.'+cedula,true);
        xhr.onload = function(){
            if(this.status === 200){
                const respuesta = JSON.parse(xhr.responseText);
                console.log(respuesta);
                if(respuesta.length===0){
                    consultarMascotas();
                }else{
                    cargarTabla(respuesta);
                }
                
            }
        }
        xhr.send();

    }

});