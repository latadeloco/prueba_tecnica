window.onload = function() {
    let submit = document.getElementById('submit');
    let myChart;

    submit.addEventListener('click', function() {
        let initFibo = new Date(document.getElementById('initFibo').value);
        let endFibo = new Date(document.getElementById('endFibo').value);
        let errorInitFibo = document.getElementById('error-init');
        let errorEndFibo = document.getElementById('error-end');
        let errorDates = document.getElementById('error-dates');
        let error = false;
        errorInitFibo.innerText = '';
        errorEndFibo.innerText = '';
        errorDates.innerText = '';

        if (isNaN(initFibo.valueOf())) {
            errorInitFibo.innerText = 'La fecha inicial no tiene un formato que se corresponda a una fecha'; 
            console.log("La fecha inicial no tiene un formato que se corresponda a una fecha");
            error = true;
        }

        if (isNaN(endFibo.valueOf())) {
            errorEndFibo.innerText = 'La fecha final no tiene un formato que se corresponda a una fecha';
            console.log("La fecha final no tiene un formato que se corresponda a una fecha");
            error = true;
        }

        if (initFibo > endFibo) {
            errorDates.innerText = 'La fecha fin no puede ser menor que la fecha de inicio';
            console.log("La fecha fin no puede ser menor que la fecha de inicio");
            error = true;
        }

        if (!error) {
            let initFiboFormatted = getDateFormatted(initFibo);
            let endFiboFormatted = getDateFormatted(endFibo);
            fetch(`https://localhost:8000/fibonacci/${initFiboFormatted}/${endFiboFormatted}`)
            .then(response => response.json())
            .then(json => {

                let dates = [];
                let numberFibo = [];
                json.forEach(data => {
                    dates.push(data['date']);
                    numberFibo.push(data['number']);
                });

                var ctx= document.getElementById("myChart").getContext("2d");

                if (myChart) myChart.destroy();

                myChart = new Chart(ctx,{
                    type:"line",
                    data:{
                    labels: dates,
                    datasets:[{
                            label:'Número fibonacci correspondiente',
                            data: numberFibo,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1,
                            backgroundColor:[
                                'rgb(66, 134, 244,0.5)',
                                'rgb(74, 135, 72,0.5)',
                                'rgb(229, 89, 50,0.5)'
                            ]
                        }]
                    },
                });    
                
            }).catch(error => {
                let errorDates = document.getElementById('error-dates');
                errorDates.innerText = 'Error al conectar con el servicio, aseguresé de que está conectado por el puerto 8000';
                console.log("Error al conectar con el servicio, aseguresé de que está conectado por el puerto 8000");
            });
        }


    });
    

    function getDateFormatted(date) {

        let dia, mes;
        if (date.getUTCMonth() < 9) {
            mes = '0' + (date.getUTCMonth() + 1)
        } else {
            mes = date.getUTCMonth() + 1;
        }

        if (date.getUTCDate() <= 9) {
            dia = '0' + date.getUTCDate();
        } else {
            dia = date.getUTCDate();
        }

        return date.getFullYear() + '-' + mes + '-' + dia; 
    }


    
};