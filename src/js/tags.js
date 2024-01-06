(function (){
    const tagsInput = document.querySelector("#tags-input");
    if(tagsInput){

        let tags = [];
        const tagsInputHidden = document.querySelector('[name="tags"]')
        const contenedorTags = document.querySelector("#contenedorTags");

        if(tagsInputHidden.value !== ""){
            tags = tagsInputHidden.value.split(",");
            mostrarTags();
        }

        tagsInput.addEventListener("keypress",guardarTag);

        function guardarTag(e){
            if(e.keyCode == 44){
                e.preventDefault();
                if(e.target.value.trim() !== ""){
                    tags = [...tags, e.target.value.trim()];
                }
                tagsInput.value = "";
                mostrarTags();
            }
        }

        function mostrarTags(){
            contenedorTags.textContent = "";

            tags.forEach(tag => {
                const elementoLista = document.createElement("LI");
                const elementoTag = document.createElement("BUTTON");
                elementoTag.setAttribute("type","button");
                elementoTag.classList.add("btn","btn-primario", "btn-sm","mt-3", "me-1"); 
                elementoTag.textContent = tag;
                elementoTag.addEventListener("click",eliminarTag);

                elementoLista.appendChild(elementoTag);
                contenedorTags.appendChild(elementoLista);
            });

            actualizarInput();
        }

        function eliminarTag(e){
            e.target.remove();
            tags = tags.filter(tag => tag !== e.target.textContent);
            actualizarInput();
        }

        function actualizarInput(){
            tagsInputHidden.value = tags.toString();
        }
    }
})();