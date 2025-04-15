@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Detalhes da Unidade</h5>
                    </div>
                    <div class="card-body animated-form">
                        <form class="row g-3 needs-validation custom-input" action="{{ route('units.store') }}" method="POST" novalidate="">
                            @csrf
                            <div class="col-12 position-relative">
                                <label class="form-label" for="name">Nome</label>
                                <input class="form-control required" id="name" name="name" type="text" placeholder="Nome" required="">
                            </div>
                            <div class="col-12 position-relative">
                                <label class="form-label" for="short_code">Código</label>
                                <input class="form-control required" id="short_code" name="short_code" type="text" placeholder="Código" required="">
                            </div>
                            <div class="col-12 position-relative">
                                <label class="form-label" for="description">Descrição</label>
                                <textarea class="form-control required" id="description" name="description" rows="3" required=""></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label " for="is_enabled">Status</label>
                                <select class="form-select" name="is_enabled">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
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
