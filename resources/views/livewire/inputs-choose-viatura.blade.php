<div class="options-radios">
    @if ($viaturas)
        @foreach ($viaturas as $viatura)
            <div class="option-radio">
                <input type="radio" id="viatura_id" name="option" value="{{ $viatura->id }}">
                <label for="option{{ $viatura->id }}">{{ $viatura->matricula }}</label>
                <div class="marca">{{ $viatura->marca }}</div>
                <div class="modelo">{{ $viatura->modelo }}</div>
                <div class="lugares"><span>Nº de Lugares:<span>{{ $viatura->numero_lugares }}</div>
                <div class="lugares"><span>Lugares Disponíveis:<span>{{ '0' }}</div>
            </div>
        @endforeach
    @endif
</div>
