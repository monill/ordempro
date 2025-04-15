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
                        <form class="row g-3 needs-validation custom-input" action="{{ route('warehouses.update', $warehouse) }}" method="POST" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="col-4">
                                <label class="form-label" for="country_id">País</label>
                                <select name="country_id" id="country-select" class="form-select">
                                    <option value="">Selecione o país</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ $warehouse->country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="state_id">Estado</label>
                                <select name="state_id" id="state-select" class="form-select">
                                    <option value="">Selecione o estado</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}" {{ $warehouse->state_id == $state->id ? 'selected' : '' }}>
                                            {{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="city_id">Cidade</label>
                                <select name="city_id" id="city-select" class="form-select">
                                    <option value="">Selecione a cidade</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ $warehouse->city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="company_id">Empresa</label>
                                <select class="form-select" name="company_id">
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" {{ $company->id == $warehouse->company_id ? 'selected' : ''}}>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="name">Nome</label>
                                <input class="form-control required" id="name" name="name" type="text" placeholder="Nome" value="{{ $warehouse->name }}" required="">
                            </div>
                            <div class="col-8">
                                <label class="form-label" for="description">Descrição</label>
                                <input class="form-control" id="description" name="description" type="text" placeholder="Descrição" required="" value="{{ $warehouse->description }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="address">Endereço</label>
                                <textarea class="form-control" id="address" name="address" rows="3">{{ $warehouse->address }}</textarea>
                            </div>
                            <div class="col-4">
                                <label class="form-label " for="is_enabled">Status</label>
                                <select class="form-select" name="is_enabled">
                                    <option value="1" {{ $warehouse->is_enabled == true ? 'selected' : '' }}>Ativo</option>
                                    <option value="0" {{ $warehouse->is_enabled == false ? 'selected' : '' }}>Inativo</option>
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
