<div>
    <form wire:submit.prevent="submit">

        <div class="row">
            @include('include.message')

            <div class="col-md-5 mb-3">
                <label for="">Nome Completo <span class="text-danger">*</span></label>
                <input type="text" wire:model="nome" placeholder="Nome Completo" class="form-control"
                    value="{{ old('nome', null) }}" />
                @if ($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
            </div>

            <div class="col-md-4 mb-3">
                <label for="">Nº de Bilhete <span class="text-danger">*</span></label>
                <input type="text" wire:model="bi" placeholder="Nº de Bilhete" class="form-control"
                    value="{{ old('bi', null) }}" />
                @if ($errors->has('bi'))
                    <span class="text-danger">{{ $errors->first('bi') }}</span>
                @endif
            </div>

            <div class="col-md-3 mb-3">
                <label for="">Nº de Telefone <span class="text-danger">*</span></label>
                <input type="number" wire:model="telefone" placeholder="Nº de Telefone" class="form-control"
                    value="{{ old('telefone', null) }}" />
                @if ($errors->has('telefone'))
                    <span class="text-danger">{{ $errors->first('telefone') }}</span>
                @endif
            </div>


            <div class="col-md-3 mb-3">
                <label for="">Curso <span class="text-danger">*</span></label>
                <select wire:model="curso_id" wire:change="filterTurma" class="form-control">
                    <option value="" hidden>Curso</option>
                    @if ($cursos)
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->curso }}</option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('curso_id'))
                    <span class="text-danger">{{ $errors->first('curso_id') }}</span>
                @endif
            </div>

            <div class="col-md-3 mb-3">
                <label for="">Ano <span class="text-danger">*</span></label>
                <select wire:model="classe_id" wire:change="filterTurma" class="form-control">
                    <option value="" hidden>Ano</option>
                    @if ($classes)
                        @foreach ($classes as $classe)
                            <option value="{{ $classe->id }}">{{ $classe->classe }}</option>
                        @endforeach

                    @endif
                </select>
                @if ($errors->has('classe_id'))
                    <span class="text-danger">{{ $errors->first('classe_id') }}</span>
                @endif
            </div>

            <div class="col-md-3 mb-3">
                <label for="">Turma <span class="text-danger">*</span></label>
                <select wire:model="turma_id" id="" class="form-control">
                    <option value="" hidden>Turma</option>
                    @if ($turmas)
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->id }}">{{ $turma->turma }}</option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('turma_id'))
                    <span class="text-danger">{{ $errors->first('turma_id') }}</span>
                @endif
            </div>

            <div class="col-md-3 mb-3">
                <label for="">Ano Lectivo <span class="text-danger">*</span></label>
                <select wire:model="ano_lectivo" class="form-control">
                    <option value="" hidden>Ano Lectivo</option>
                    <option value="2023-2024">2023-2024</option>
                    <option value="2024-2025">2024-2025</option>
                </select>
                @if ($errors->has('ano_lectivo'))
                    <span class="text-danger">{{ $errors->first('ano_lectivo') }}</span>
                @endif
            </div>


            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>

    </form>
</div>
