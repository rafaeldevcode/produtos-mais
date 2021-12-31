<section class="container-fluid bg-danger py-2 px-3 d-flex flex-md-row flex-column  justify-content-between text-warning align-items-center">
    <div>
        <p class="m-0fw-bolder fs-4 text-center text-md-left" id="texto-desc">{{ $coutdown->texto }}</p>
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

<span id="data" hidden>{{ $coutdown->data }}</span>
<span id="time" hidden>{{ $coutdown->time }}</span>

<script type="text/javascript">
    coutdown(document.getElementById('data').innerHTML, document.getElementById('time').innerHTML);
</script>