(function (){
    const horas = document.querySelector("#horas");
    if(horas){
        
        const categoria = document.querySelector("[name='id_categoria']");
        const dias = document.querySelectorAll("[name='dia']");
        const inputHiddenDia = document.querySelector("[name='id_dia']");
        const inputHiddenHora = document.querySelector("[name='id_hora']");
        
        categoria.addEventListener("change", terminoBusqueda);
        dias.forEach(dia => dia.addEventListener("change", terminoBusqueda));
        let busqueda = {
            id_categoria: categoria.value || "",
            dia: inputHiddenDia.value || ""
        }

        if(!Object.values(busqueda).includes("")){
            async function iniciarApp() {
                await buscarEventos();
    
                const horaSeleccionada = document.querySelector(`[data-hora-id = '${inputHiddenHora.value}']`);
                horaSeleccionada.removeAttribute("disabled");
                horaSeleccionada.classList.add("active");
                horaSeleccionada.dataset.bsToggle = "button";
                horaSeleccionada.onclick = seleccionarHora;
            }

            iniciarApp();
        }
        
        function terminoBusqueda(e){
            busqueda[e.target.name]= e.target.value;
            inputHiddenHora.value = "";
            inputHiddenDia.value = "";

            despulsarBotones(e);

            if(Object.values(busqueda).includes("")){
                const listadoHoras = document.querySelectorAll(".btn-hora-disponible");
                listadoHoras.forEach(elemento => {
                    elemento.setAttribute("disabled","true");
                })
                return;
            }

            buscarEventos();
        }

        async function buscarEventos(){
            const {dia, id_categoria} = busqueda;
            const url = `/api/eventos-horarios?id_dia=${dia}&id_categoria=${id_categoria}`;
            const resultado = await fetch(url);
            const eventos = await resultado.json();
            obtenerHorasDisponibles(eventos);
        }
        
        function obtenerHorasDisponibles(eventos){
            const listadoHoras = document.querySelectorAll(".btn-hora-disponible");
            listadoHoras.forEach(elemento => {
                elemento.setAttribute("disabled","true");
            })

            const horasTomadas = eventos.map(evento => evento.id_hora);
            const listadorHorasArray = Array.from(listadoHoras);
            const resultado = listadorHorasArray.filter(button => !horasTomadas.includes(button.dataset.horaId));
            resultado.forEach(button => button.removeAttribute("disabled"));

            const horasDisponibles = document.querySelectorAll(".btn-hora-disponible:not(.active)");
            horasDisponibles.forEach(horaDisponible => horaDisponible.addEventListener("click",seleccionarHora));
        }

        function seleccionarHora(e){
            despulsarBotones(e);

            if(e.target.classList.contains("active")){
                inputHiddenHora.value = e.target.dataset.horaId;
                inputHiddenDia.value = document.querySelector("[name='dia']:checked").value;
            }else{
                inputHiddenHora.value = "";
                inputHiddenDia.value = "";
            }
        }

        function despulsarBotones(e){
            //Despulsar botones anteriores
            const botonesHora = document.querySelectorAll(".btn-hora-disponible");
            botonesHora.forEach(boton => {
                if(boton !== e.target){
                    boton.classList.remove("active");
                    boton.ariaPressed = false;
                }
            });
        }
    }

})();