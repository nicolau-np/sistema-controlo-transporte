<div class="options-radios">
    @if ($viaturas)
        @foreach ($viaturas as $viatura)
            <div class="option-radio {{ $viatura['disponibilidade']=='Indisponivel' ? 'indisponivel': null }}">
                <input type="radio" name="viatura_id" value="{{ $viatura['id'] }}" {{ $viatura['disponibilidade']=='Indisponivel' ? 'disabled': null }}>
                <label for="option{{ $viatura['id'] }}">{{ $viatura['matricula'] }}</label>
                <div class="marca">{{ $viatura['marca'] }}</div>
                <div class="modelo">{{ $viatura['modelo'] }}</div>
                <div class="lugares"><span>Nº de Lugares: </span>{{ $viatura['numero_lugares'] }}</div>
                <div class="lugares"><span>Lugares Disponíveis: </span>{{ $viatura['lugares_disponiveis'] }}</div>
                <div class="lugares"><span>Estado: </span>{{ $viatura['disponibilidade'] }}</div>
            </div>
        @endforeach
    @endif
</div>
