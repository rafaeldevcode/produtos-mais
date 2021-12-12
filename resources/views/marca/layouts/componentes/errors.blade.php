@if ($errors->any())
    <div class="mt-3">
        <ul class="p-0">
            @foreach ($errors->all() as $error)
                <li class="p-1 my-1 alert alert-danger d-flex justify-content-between align-items-center removerErro">{{ $error }} <i class="fas fa-times btnRemoverErro"></i></li>
            @endforeach
        </ul>
    </div>
@endif