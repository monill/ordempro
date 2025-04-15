@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Detalhes do Genero</h5>
                    </div>
                    <div class="card-body animated-form">
                        <form class="row g-3 needs-validation custom-input" action="{{ route('genders.update', $gender) }}" method="POST" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="col-12 position-relative">
                                <label class="form-label" for="name">Nome</label>
                                <input class="form-control required" id="name" name="name" type="text" value="{{ $gender->name }}" placeholder="Nome" required="">
                            </div>
                            <div class="col-12">
                                <label class="form-label " for="is_enabled">Status</label>
                                <select class="form-select" name="is_enabled">
                                    <option value="1" {{ $gender->is_enabled == true ? 'selected' : '' }}>Ativo</option>
                                    <option value="0" {{ $gender->is_enabled == false ? 'selected' : '' }}>Inativo</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
