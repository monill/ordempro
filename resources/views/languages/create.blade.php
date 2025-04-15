@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Detalhes do Idioma</h5>
                    </div>
                    <div class="card-body animated-form">
                        <form class="row g-3 needs-validation custom-input" action="{{ route('languages.store') }}" method="POST" novalidate="">
                            @csrf
                            <div class="col-12 position-relative">
                                <label class="form-label" for="name">Nome</label>
                                <input class="form-control required" id="name" name="name" type="text" placeholder="Nome" required="" value="{{ @old('name') }}">
                            </div>
                            <div class="col-12 position-relative">
                                <label class="form-label" for="code">Código</label>
                                <input class="form-control required" id="code" name="code" type="text" placeholder="Código" required="" value="{{ @old('code') }}">
                                <small class="text-end">
                                    Click here for <a href="https://www.andiamo.co.uk/resources/iso-language-codes/" target="_blank">Short Codes</a> use <b>Code 2-4</b> column(s).
                                </small>
                            </div>
                            <div class="col-12 position-relative">
                                <label class="form-label" for="icon">Icone</label>
                                <input class="form-control required" id="icon" name="icon" type="text" placeholder="Icone" required="" value="{{ @old('icon') }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label " for="direction">Direção</label>
                                <select class="form-select" name="direction">
                                    <option value="ltr">LTR</option>
                                    <option value="rtl">RTL</option>
                                </select>
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
