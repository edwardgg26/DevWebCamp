import Swal from "sweetalert2";
(function(){
    let eventos = [];

    const registroResumen = document.querySelector("#registro-resumen");
    if(registroResumen){

        const eventosBotones = document.querySelectorAll(".btn-agregar-evento");
        eventosBotones.forEach(eventoBotton=> eventoBotton.addEventListener("click", seleccionarEvento));

        const formularioRegistro = document.querySelector("#registro");
        formularioRegistro.addEventListener("submit", submitFormulario);

        mostrarEventos();
    
        function seleccionarEvento(e){
            if(eventos.length < 5){
                e.target.disabled = true;
                eventos = [...eventos, {
                    id: e.target.dataset.id,
                    titulo: e.target.parentElement.querySelector(".tituloEvento").textContent.trim()
                }];
        
                mostrarEventos();
            }else{
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Solo se permite registrar 5 conferecias/workshops maximo!"
                });
            }
        }
    
        function mostrarEventos(){
            limpiarEventos();
            if(eventos.length > 0){
                eventos.forEach(evento => {
                    const eventoDOM = document.createElement("DIV");
                    eventoDOM.classList.add("d-flex","justify-content-between", "align-items-center", "my-3");
    
                    const titulo = document.createElement("P");
                    titulo.classList.add("mb-0");
                    titulo.textContent = evento.titulo;
    
                    const botonEliminar = document.createElement("BUTTON");
                    botonEliminar.classList.add("btn", "btn-danger");
                    botonEliminar.innerHTML = "<svg class='bi'><use xlink:href='#trash'></svg>";
                    botonEliminar.onclick = ()=>{
                        eliminarEvento(evento.id);
                    }
                    
                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(botonEliminar);
    
                    registroResumen.appendChild(eventoDOM);
                })
            }else{
                const noRegistro = document.createElement("P");
                noRegistro.textContent = "No hay eventos, añade maximo 5.";
                registroResumen.appendChild(noRegistro);
            }
        }
    
        function eliminarEvento(id){
            eventos = eventos.filter(evento => evento.id !== id);
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            botonAgregar.disabled = false;
            mostrarEventos();
        }
    
        function limpiarEventos(){
            while(registroResumen.firstChild){
                registroResumen.removeChild(registroResumen.firstChild);
            }
        }

        async function submitFormulario(e){
            e.preventDefault();

            const regaloId = document.querySelector("#regalo").value;
            const eventosId = eventos.map(evento => evento.id);

            if(eventosId.length === 0 || regaloId == ""){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Debes elegir al menos un evento y un regalo"
                });
                return;
            }

            const datos = new FormData();
            datos.append("eventos", eventosId);
            datos.append("id_regalo", regaloId);

            const url = "/finalizar-registro/conferencias";
            const respuesta = await fetch(url,{
                method: "POST",
                body: datos
            });

            const resultado = await respuesta.json();
            if(resultado.resultado){
                Swal.fire({
                    icon: "success",
                    title: "Exito",
                    text: "Tu registro fue exitoso, te esperamos en DevWebCamp"
                })
                .then(()=>location.href = `/boleto?id=${resultado.token}`);
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Hubo un error al realizar el registro"
                });
            }
        }
    }

})();