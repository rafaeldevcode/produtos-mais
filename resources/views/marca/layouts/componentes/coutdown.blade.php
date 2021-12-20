<section class="container-fluid bg-danger py-2 px-3 d-flex flex-md-row flex-column  justify-content-between text-warning align-items-center">
    <div>
        <p class="m-0fw-bolder fs-4 text-center text-md-left" id="texto-desc">{{ $coutdown[0]->texto }}</p>
    </div>

    <div>
        <p class="text-center m-0" id="expira">Promoção Expira em:</p>
        <div class="d-flex" id="coutdown">
            <div class="d-flex flex-column text-center">
                <p class="mx-3 border border-warning rounded py-2 px-2 fs-4 m-0 fw-bolder" id="dia">
                    00
                </p>
                <span class="text-light fs-6">Dias</span>
            </div>
    
            <div class="d-flex flex-column text-center">
                <p class="mx-3 border border-warning rounded py-2 px-2 fs-4 m-0 fw-bolder" id="hora">
                    00
                </p>
                <span class="text-light fs-6">Horas</span>
            </div>
    
            <div class="d-flex flex-column text-center">
                <p class="mx-3 border border-warning rounded py-2 px-2 fs-4 m-0 fw-bolder" id="minuto">
                    00
                </p>
                <span class="text-light fs-6">Minutos</span>
            </div>
    
            <div class="d-flex flex-column text-center">
                <p class="mx-3 border border-warning rounded py-2 px-2 fs-4 m-0 fw-bolder" id="segundo">
                    00
                </p>
                <span class="text-light fs-6">Segundos</span>
            </div>
        </div>
    </div>
</section>

<script>
    let dataFinal = new Date();
        dataFinal = new Date("{{ $coutdown[0]->data }} {{ $coutdown[0]->time }}").getTime();
    let dia = document.getElementById('dia');
    let hora = document.getElementById('hora');
    let minuto = document.getElementById('minuto');
    let segundo = document.getElementById('segundo');

    let coutdown = setInterval(()=>{
        let dataAtual = new Date().getTime();
        
        let regressiva = dataFinal - dataAtual;
        
        dia.innerHTML = formatarData(Math.floor(regressiva / (1000 * 60 * 60 * 24)));
        hora.innerHTML = formatarData(Math.floor((regressiva % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
        minuto.innerHTML = formatarData(Math.floor((regressiva % (1000 * 60 * 60)) / (1000 * 60)));
        segundo.innerHTML = formatarData(Math.floor((regressiva % (1000 * 60)) / 1000));

        if (regressiva < 0) {
            clearInterval(coutdown);
            dia.innerHTML = '00';
            hora.innerHTML = '00';
            minuto.innerHTML = '00';
            segundo.innerHTML = '00';
            document.getElementById('expira'). innerHTML = "EXPIRADO"
            document.getElementById('texto-desc').innerHTML = 'Promoção expirada!';
        }
    }, 1000);

    function formatarData(data){
        if (data.toString().length == 1) {
            return `0${data}`
        }else{
            return data
        }
    }
</script>