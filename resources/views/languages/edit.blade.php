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
                        <form class="row g-3 needs-validation custom-input" action="{{ route('languages.update', $language) }}" method="POST" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="col-12 position-relative">
                                <label class="form-label" for="name">Nome</label>
                                <input class="form-control required" id="name" name="name" type="text" value="{{ $language->name }}" placeholder="Nome" required="">
                            </div>
                            <div class="col-12 position-relative">
                                <label class="form-label" for="code">Código</label>
                                <input class="form-control required" id="code" name="code" type="text" value="{{ $language->code }}" placeholder="Código" required="">
                                <small class="text-end">
                                    Click here for <a href="https://www.andiamo.co.uk/resources/iso-language-codes/" target="_blank">Short Codes</a> use <b>Code 2-4</b> column(s).
                                </small>
                            </div>
                            <div class="col-12 position-relative">
                                <label class="form-label" for="icon">Icone</label>
                                <input class="form-control required" id="icon" name="icon" type="text" value="{{ $language->icon }}" placeholder="Icone" required="">
                            </div>
                            <div class="col-12">
                                <label class="form-label " for="direction">Direção</label>
                                <select class="form-select" name="direction">
                                    <option value="ltr" {{ $language->direction == 'ltr' ? 'selected' : '' }}>LTR</option>
                                    <option value="rtl" {{ $language->direction == 'rtl' ? 'selected' : '' }}>RTL</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label " for="is_enabled">Status</label>
                                <select class="form-select" name="is_enabled">
                                    <option value="1" {{ $language->is_enabled == true ? 'selected' : '' }}>Ativo</option>
                                    <option value="0" {{ $language->is_enabled == false ? 'selected' : '' }}>Inativo</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary" type="submit">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
