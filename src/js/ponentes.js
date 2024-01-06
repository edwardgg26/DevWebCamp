(function (){
    const ponentesInput = document.querySelector("#ponentes");
    if(ponentesInput){
        let ponentes = [];
        let ponentesFiltrados = [];
        const listadoPonentes = document.querySelector("#listadoPonentes");
        const ponenteHidden = document.querySelector("[name='id_ponente']");
        obtenerPonentes();

        ponentesInput.addEventListener("input", buscarPonentes);
        if(ponenteHidden.value !== ""){
            async function iniciarApp() {
                const ponente = await obtenerPonente(ponenteHidden.value);

                const ponenteItem = document.createElement("LI");
                    
                const botonPonente = document.createElement("BUTTON");
                botonPonente.setAttribute("type","button");
                botonPonente.classList.add("btn","btn-outline-primario","active", "btn-ponente", "mb-2");
                botonPonente.dataset.bsToggle = "button";
                botonPonente.textContent = ponente.nombre;
                botonPonente.dataset.ponenteId = ponente.id;
                botonPonente.onclick = seleccionarPonente;

                ponenteItem.appendChild(botonPonente);
                listadoPonentes.appendChild(ponenteItem);
            }

            iniciarApp();
        }

        async function obtenerPonentes(){
            const url = `/api/ponentes`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            formatearPonentes(resultado);
        }

        async function obtenerPonente(id){
            const url = `/api/ponente?id=${id}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            return resultado;
        }

        function formatearPonentes(arrayPonentes = []){
            ponentes = arrayPonentes.map(ponente => {
                return {
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                }
            })
        }

        function buscarPonentes(e){
            const busqueda = e.target.value;

            if(busqueda.length > 3){
                const expresion = new RegExp(busqueda, "i");
                ponentesFiltrados = ponentes.filter(ponente => {
                    if(ponente.nombre.toLowerCase().search(expresion) != -1){
                        return ponente;
                    }
                })
            }else{
                ponentesFiltrados = [];
            }

            mostrarPonentes();
        }

        function mostrarPonentes(){
            while(listadoPonentes.firstChild){
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }

            if(ponentesFiltrados.length > 0){
                ponentesFiltrados.forEach(ponente => {
                    const ponenteItem = document.createElement("LI");
                    
                    const botonPonente = document.createElement("BUTTON");
                    botonPonente.setAttribute("type","button");
                    botonPonente.classList.add("btn","btn-outline-primario" , "btn-ponente", "mb-2");
                    botonPonente.dataset.bsToggle = "button";
                    botonPonente.textContent = ponente.nombre;
                    botonPonente.dataset.ponenteId = ponente.id;
                    botonPonente.onclick = seleccionarPonente;

                    ponenteItem.appendChild(botonPonente);
                    listadoPonentes.appendChild(ponenteItem);
                });
            }else{
                const aviso = document.createElement("LI");
                aviso.textContent = "No se encontraron ponentes con ese nombre";
                listadoPonentes.appendChild(aviso);
            }
        }

        function seleccionarPonente(e){
            despulsarBotones(e);
            const ponente = e.target;
            ponenteHidden.value = ponente.dataset.ponenteId;
        }

        function despulsarBotones(e){
            //Despulsar botones anteriores
            const botonesPonente = document.querySelectorAll(".btn-ponente");
            botonesPonente.forEach(boton => {
                if(boton !== e.target){
                    boton.classList.remove("active");
                    boton.ariaPressed = false;
                }
            });
        }
    }
    
})();