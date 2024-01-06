<main class="my-5">
    <h2 class="text-center mb-4"><?php echo $titulo;?></h2>
    <p class="text-center mb-5">Elige tu plan.</p>

    <div class="container">
        <div class="row row-cols-1 row-cols-lg-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Pase Gratis</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light"> USD</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Acceso virtual a DevWebCamp</li>
                        </ul>
                        <form action="/finalizar-registro/gratis" method="POST">
                            <input type="submit" class="w-100 btn btn-lg btn-primario" value="Inscripción Gratis" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Pase Virtual</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$39<small class="text-body-secondary fw-light"> USD</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Acceso virtual a DevWebCamp</li>
                            <li>Pase por 2 dias</li>
                            <li>Enlace a talleres y conferencias</li>
                            <li>Acceso a las grabaciones</li>
                        </ul>
                        <div id="smart-button-container">
                            <div style="text-align: center;">
                                <div id="paypal-button-container-virtual"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primario">
                    <div class="card-header py-3 text-bg-primario border-primario">
                        <h4 class="my-0 fw-normal">Pase Presencial</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$79<small class="text-body-secondary fw-light"> USD</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Acceso Presencial a DevWebCamp</li>
                            <li>Pase por 2 dias</li>
                            <li>Enlace a talleres y conferencias</li>
                            <li>Acceso a las grabaciones</li>
                            <li>Camisa del evento</li>
                            <li>Comida y bebida</li>
                        </ul>
                        <div id="smart-button-container">
                            <div style="text-align: center;">
                                <div id="paypal-button-container-presencial"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://www.paypal.com/sdk/js?client-id=AVVslYenD__xE2uw6pRBQJYe9fNPYNK53EDorWa1ubLWI34T6iTewaOxjJR_vQNcrTJ_hdGVt3c0iGit&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
    function initPayPalButton() {

        //BOTON VIRTUAL
        paypal.Buttons({
            style: {
            shape: 'rect',
            color: 'blue',
            layout: 'vertical',
            label: 'pay',
            },
    
            createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{"description":"2","amount":{"currency_code":"USD","value":39}}]
            });
            },
    
            onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
    
                // Full available details
                // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
    
                const datos = new FormData();
                datos.append("id_paquete", orderData.purchase_units[0].description);
                datos.append("id_pago", orderData.purchase_units[0].payments.captures[0].id);
                fetch("/finalizar-registro/pagar",{
                    body: datos,
                    method: "POST"
                })
                .then(respuesta => respuesta.json())
                .then(resultado => {
                    // console.log(resultado);
                    if(resultado.resultado){
                        actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                    }
                })

                // Or go to another URL:  actions.redirect('thank_you.html');
            });
            },
    
            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container-virtual');

        //BOTON PRESENCIAL
        paypal.Buttons({
            style: {
            shape: 'rect',
            color: 'blue',
            layout: 'vertical',
            label: 'pay',
            },
    
            createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":79}}]
            });
            },
    
            onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
    
                // Full available details
                // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
    
                const datos = new FormData();
                datos.append("id_paquete", orderData.purchase_units[0].description);
                datos.append("id_pago", orderData.purchase_units[0].payments.captures[0].id);
                fetch("/finalizar-registro/pagar",{
                    body: datos,
                    method: "POST"
                })
                .then(respuesta => respuesta.json())
                .then(resultado => {
                    if(resultado.resultado){
                        actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                    }
                })

                // Or go to another URL:  actions.redirect('thank_you.html');
                
            });
            },
    
            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container-presencial');
    }
 
  initPayPalButton();
</script>