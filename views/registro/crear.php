<!-- Registro -->
<main class="registro">
    <!-- Titulo -->
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <!-- Descripcion -->
    <p class="registro__descripcion">Elige tu plan</p>

    <!-- Paquetes -->
    <div class="paquetes__grid">
        <!-- Paquete Gratis -->
        <div data-aos="<?php aos_animacion(); ?>" class="paquete">
            <!-- Nombre -->
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <!-- Lista -->
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
            </ul>
            <!-- Precio -->
            <p class="paquete__precio">$0</p>
            <!-- Comprar -->
            <form method="POST" action="/finalizar-registro/gratis">
                <input class="paquetes__submit" type="submit" value="Inscripcion Gratis">
            </form>
        </div>
        <!-- Paquete Presencial -->
        <div data-aos="<?php aos_animacion(); ?>" class="paquete">
            <!-- Nombre -->
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <!-- Lista -->
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 dias</li>
                <li class="paquete__elemento">Acceso a Talleres y Conferencias</li>
                <li class="paquete__elemento">Acceso a las Grabaciones</li>
                <li class="paquete__elemento">Camisa del Evento</li>
                <li class="paquete__elemento">Comida y Bebida</li>
                <li class="paquete__elemento">Regalo a Eleccion</li>
            </ul>
            <!-- Precio -->
            <p class="paquete__precio">$199</p>
            <!-- Pagar -->
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
        <!-- Paquete Virtual -->
        <div data-aos="<?php aos_animacion(); ?>" class="paquete">
            <!-- Nombre -->
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <!-- Lista -->
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 dias</li>
                <li class="paquete__elemento">Enlace a Talleres y Conferencias</li>
                <li class="paquete__elemento">Acceso a las Grabaciones</li>
                <li class="paquete__elemento">Regalo Stickers</li>
            </ul>
            <!-- Precio -->
            <p class="paquete__precio">$49</p>

            <!-- Pagar -->
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container-virtual"></div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://www.paypal.com/sdk/js?client-id=Ae_akJH6B_LBP8J5lGg3i392lxqU1RSMbHZO2fVZbjSM1MJ7TzWWbBW8zUWXSsR9YA3shkTCB9vZrAD1&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
    function initPayPalButton() {
      // Pase Presencial
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":199}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            const datos = new FormData();
            datos.append('paquete_id', orderData.purchase_units[0].description);
            datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);
            
            fetch('/finalizar-registro/pagar', {
                method: 'POST',
                body: datos
            })
            .then( respuesta => respuesta.json())
            .then(resultado => {
                if (resultado.resultado) {
                    actions.redirect(`https://devwebcamp-veron.herokuapp.com/finalizar-registro/conferencias`);
                }
            });

          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
      
      // Pase Virtual
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"2","amount":{"currency_code":"USD","value":49}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            const datos = new FormData();
            datos.append('paquete_id', orderData.purchase_units[0].description);
            datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);
            
            fetch('/finalizar-registro/pagar', {
                method: 'POST',
                body: datos
            })
            .then( respuesta => respuesta.json())
            .then(resultado => {
                if (resultado.resultado) {
                    actions.redirect(`https://devwebcamp-veron.herokuapp.com/finalizar-registro/conferencias`);
                }
            });
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container-virtual');
    }
    initPayPalButton();
</script>