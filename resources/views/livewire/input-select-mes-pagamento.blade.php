<div>
    <select name="mes_id" wire:change="selectMes" wire:model="mes_id" class="form-control">
        <option value="" hidden>Mês</option>
        @if ($meses)
            @foreach ($meses as $mes)
                <option value="{{ $mes->id }}">{{ $mes->mes }}</option>
            @endforeach
        @endif
    </select>
</div>
