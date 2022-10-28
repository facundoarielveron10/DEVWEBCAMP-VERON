(function() {
    const grafica = document.querySelector('#regalos-grafica');

    if (grafica) {
        obtenerDatos();
        async function obtenerDatos() {
            // API peticion
            const url = '/api/regalos';
            const resupuesta = await fetch(url);
            const resultado = await resupuesta.json();
            
            // Grafica
            const ctx = document.getElementById('regalos-grafica').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: resultado.map( regalo => regalo.nombre ),
                    datasets: [{
                        label: '',
                        data: resultado.map( regalo => regalo.total ),
                        backgroundColor: [
                            '#ea580c',
                            '#84cc16',
                            '#22d3ee',
                            '#a855f7',
                            '#ef4444',
                            '#14b8a6',
                            '#db2777',
                            '#e11d48',
                            '#7e22ce'
                        ]
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            }); 
        }  
    }
})();