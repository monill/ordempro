@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Detalhes de {{ $type }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation custom-input" action="{{ route($type.'s.store') }}" method="POST" novalidate="">
                            @csrf
                            <div class="col-4">
                                <label class="form-label" for="company_id">Empresa</label>
                                <select class="form-select" name="company_id">
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="gender_id">Gênero</label>
                                <select class="form-select" name="gender_id">
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label " for="partner_type">Tipo cliente</label>
                                <select class="form-select" name="partner_type">
                                    <option value="customer">Cliente</option>
                                    <option value="supplier">Fornecedor</option>
                                    <option value="both">Ambos</option>
                                </select>
                            </div>
                            <div class="col-8 position-relative">
                                <label class="form-label" for="full_name">Nome</label>
                                <input class="form-control" id="full_name" name="full_name" type="text" placeholder="Nome" value="{{ @old('full_name') }}">
                            </div>
                            <div class="col-4 position-relative">
                                <label class="form-label" for="tax_identifier">Identificação (CNPJ - CPF)</label>
                                <input class="form-control" id="tax_identifier" name="tax_identifier" type="text" placeholder="Identificação" value="{{ @old('tax_identifier') }}">
                            </div>
                            <div class="col-12 position-relative">
                                <label class="form-label" for="comments">Descrição</label>
                                <textarea class="form-control required" id="comments" name="comments" rows="5">{{ @old('comments') }}</textarea>
                            </div>
                            <div class="col-2 position-relative">
                                <label class="form-label" for="birthday">Aniversário</label>
                                <input class="form-control" id="birthday" name="birthday" type="text" placeholder="Aniversário">
                            </div>
                            <div class="col-2">
                                <label class="form-label " for="birthday_email">E-mail Aniversário?</label>
                                <select class="form-select" name="birthday_email">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                            <div class="row mt-2">
                                <div class="col-2">
                                    <label class="form-label " for="is_enabled">Status</label>
                                    <select class="form-select" name="is_enabled">
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </div>
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
