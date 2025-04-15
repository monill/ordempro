@extends('layouts.main')

@section('css')
    <!-- CSS do Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Detalhes do Armazém</h5>
                    </div>
                    <div class="card-body animated-form">
                        <form class="row g-3 needs-validation custom-input" action="{{ route('warehouses.store') }}" method="POST" novalidate="">
                            @csrf
                            <div class="col-4 position-relative">
                                <label class="form-label" for="country_id">País</label>
                                <select class="form-select" id="country-select" name="country_id"></select>
                            </div>
                            <div class="col-4 position-relative">
                                <label class="form-label" for="state_id">Estado</label>
                                <select class="form-select" id="state-select" name="state_id" ></select>
                            </div>
                            <div class="col-4 position-relative">
                                <label class="form-label" for="city_id">Cidade</label>
                                <select class="form-select" id="city-select" name="city_id"></select>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="company_id">Empresa</label>
                                <select class="form-select" name="company_id">
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="name">Nome</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Nome" required="" value="{{ @old('name') }}">
                            </div>

                            <div class="col-8 position-relative">
                                <label class="form-label" for="description">Descrição</label>
                                <input class="form-control" id="description" name="description" type="text" placeholder="Descrição" required="" value="{{ @old('description') }}">
                            </div>
                            <div class="col-12 position-relative">
                                <label class="form-label" for="address">Endereço</label>
                                <textarea class="form-control" id="address" name="address" rows="3">{{ @old('address') }}</textarea>
                            </div>
                            <div class="col-4">
                                <label class="form-label " for="is_enabled">Status</label>
                                <select class="form-select" name="is_enabled">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- JS do Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.full.js"></script>

    <script>
        $(document).ready(function () {
            // Iniciar Select2
            $('#country-select, #state-select, #city-select').select2({
                placeholder: 'Selecione',
                allowClear: true
            });

            // Carregar países
            axios.get('/api/countries').then(response => {
                $('#country-select').append('<option></option>');
                response.data.forEach(country => {
                    $('#country-select').append(new Option(country.name, country.id));
                });
            });

            // Ao selecionar país
            $('#country-select').on('change', function () {
                const countryId = $(this).val();
                $('#state-select').empty().trigger('change');
                $('#city-select').empty().trigger('change');

                if (!countryId) return;

                axios.get(`/api/states/${countryId}`).then(response => {
                    $('#state-select').append('<option></option>');
                    response.data.forEach(state => {
                        $('#state-select').append(new Option(state.name, state.id));
                    });
                });
            });

            // Ao selecionar estado
            $('#state-select').on('change', function () {
                const stateId = $(this).val();
                $('#city-select').empty().trigger('change');

                if (!stateId) return;

                axios.get(`/api/cities/${stateId}`).then(response => {
                    $('#city-select').append('<option></option>');
                    response.data.forEach(city => {
                        $('#city-select').append(new Option(city.name, city.id));
                    });
                });
            });
        });
    </script>

@endsection
