@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Editar Cliente</h5>
                    </div>
                    <div class="card-body animated-form">
                        <form class="row g-3 needs-validation custom-input" action="{{ route('customers.update', $customer->id) }}" method="POST" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-body bottom-border-tab">
                                
                                <div class="tab-content" id="border-tabContent">
                                    <div class="tab-pane mt-3 show active" id="bottom-client" role="tabpanel"
                                         aria-labelledby="bottom-client-tab">
                                        <!-- Start Client -->
                                        <div class="row g-3 custom-input mt-2 address-row">
                                            <div class="col-6">
                                                <label class="form-label" for="first_name">Nome</label>
                                                <input class="form-control" id="first_name" name="first_name" type="text" value="{{ old('first_name', $customer->first_name) }}" placeholder="Nome" required="">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label" for="last_name">Sobrenome</label>
                                                <input class="form-control" id="last_name" name="last_name" type="text" value="{{ old('last_name', $customer->last_name) }}" placeholder="Sobrenome" required="">
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label" for="gender_id">Gênero</label>
                                                <select class="form-select" name="gender_id">
                                                    @foreach($genders as $gender)
                                                        <option value="{{ $gender->id }}" {{ $customer->gender_id == $gender->id ? 'selected' : '' }}>{{ $gender->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label " for="partner_type">Tipo cliente</label>
                                                <select class="form-select" name="partner_type">
                                                    <option value="customer" {{ $customer->partner_type == 'customer' ? 'selected' : '' }}>Cliente</option>
                                                    <option value="supplier" {{ $customer->partner_type == 'supplier' ? 'selected' : '' }}>Fornecedor</option>
                                                    <option value="both" {{ $customer->partner_type == 'both' ? 'selected' : '' }}>Ambos</option>
                                                </select>
                                            </div>
                                            <div class="col-4 position-relative">
                                                <label class="form-label" for="email">E-mail</label>
                                                <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $customer->email) }}" placeholder="E-mail" required="">
                                            </div>
                                            <div class="col-8 position-relative">
                                                <label class="form-label" for="company_name">Empresa</label>
                                                <input class="form-control" id="company_name" name="company_name" type="text" value="{{ old('company_name', $customer->company_name) }}" placeholder="Empresa" required="">
                                            </div>
                                            <div class="col-4 position-relative">
                                                <label class="form-label" for="tax_identifier">Identificação (CNPJ - CPF)</label>
                                                <input class="form-control" id="tax_identifier" name="tax_identifier" type="text" value="{{ old('tax_identifier', $customer->tax_identifier) }}" placeholder="Identificação" required="">
                                            </div>
                                            <div class="col-2 position-relative">
                                                <label class="form-label" for="birthday">Aniversário</label>
                                                <input class="form-control" id="birthday" name="birthday" type="text" value="{{ old('birthday', $customer->birthday) }}" placeholder="Aniversário" required="">
                                            </div>
                                            <div class="col-2">
                                                <label class="form-label " for="birthday_email">E-mail Aniversário?</label>
                                                <select class="form-select" name="birthday_email">
                                                    <option value="0" {{ $customer->birthday_email == 0 ? 'selected' : '' }}>Não</option>
                                                    <option value="1" {{ $customer->birthday_email == 1 ? 'selected' : '' }}>Sim</option>
                                                </select>
                                            </div>
                                            <div class="col-12 position-relative">
                                                <label class="form-label" for="comments">Descrição</label>
                                                <textarea class="form-control required" id="comments" name="comments" rows="5" required="">{{ old('comments', $customer->comments) }}</textarea>
                                            </div>
                                        </div>
                                        <!-- End Client -->
                                    </div>
                                    <div class="tab-pane fade" id="bottom-home" role="tabpanel" aria-labelledby="bottom-home-tab">
                                        <!-- Start Address -->
                                        <div id="address-container">
                                            @foreach ($customer->addresses as $index => $address)
                                            <div class="row g-3 custom-input mt-2 address-row">
                                                <div class="col-xxl-2 col-sm-6 box-col-6">
                                                    <input type="hidden" name="address_id[]" value="{{ $address->id }}">
                                                    <div class="form-group">
                                                        <label for="country_id[]">País</label>
                                                        <select class="form-select" name="country_id[]">
                                                            @foreach($countries as $country)
                                                                <option value="{{ $country->id }}" {{ $address->country_id == $country->id ? 'selected' : '' }}>
                                                                    {{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="address_type_id">Tipo Endereço</label>
                                                        <select class="form-select" name="address_type_id[]">
                                                            @foreach($addressTypes as $type)
                                                                <option value="{{ $type->id }}" {{ $address->address_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="state">Estado</label>
                                                        <input class="form-control @error('state.*') is-invalid @enderror" name="state[]" value="{{ $address->state }}" placeholder="Estado">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="city">Cidade</label>
                                                        <input class="form-control @error('city.*') is-invalid @enderror" name="city[]" value="{{ $address->city }}" placeholder="Cidade">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-1 col-sm-6 box-col-6 d-flex align-items-end">
                                                    <button type="button" class="btn btn-danger remove-address d-none">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                                <div class="col-xxl-6 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="address">Endereço</label>
                                                        <input class="form-control @error('address.*') is-invalid @enderror" name="address[]" value="{{ $address->address }}" placeholder="Endereço">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="zip_code">CEP</label>
                                                        <input class="form-control" name="zip_code[]" value="{{ $address->zip_code }}" placeholder="CEP">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="complement">Complemento</label>
                                                        <input class="form-control" name="complement[]" value="{{ $address->complement }}" placeholder="Complemento">
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="add-address">
                                                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- End Address -->
                                    </div>
                                    <div class="tab-pane fade" id="bottom-contact" role="tabpanel"
                                         aria-labelledby="bottom-contact-tab">
                                        <!-- Start Phone -->
                                        <div id="phone-container">
                                            @foreach ($customer->phones as $index => $phone)
                                                <div class="row g-3 custom-input mt-2 phone-row">
                                                    <div class="col-xxl-2 col-sm-6 box-col-6">
                                                        <div class="form-group">
                                                            <label for="phone_type_id[]">Tipo Telefone</label>
                                                            <select class="form-select" name="phone_type_id[]">
                                                                @foreach ($phoneTypes as $type)
                                                                    <option value="{{ $type->id }}" {{ $phone->phone_type_id == $type->id ? 'selected' : '' }}>
                                                                        {{ $type->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-sm-6 box-col-6">
                                                        <div class="form-group">
                                                            <label for="number[]">Telefone</label>
                                                            <input class="form-control" type="text" name="number[]" value="{{ $phone->number }}" placeholder="Telefone">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-1 col-sm-6 box-col-6 d-flex align-items-end">
                                                        <button class="btn btn-danger remove-phone" type="button">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="add-phone">
                                                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- End Phone -->
                                    </div>
                                </div>
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

@section('scripts')

    <script>
        // Start Address
        document.getElementById('add-address').addEventListener('click', function () {
            const container = document.getElementById('address-container');
            const row = container.querySelector('.address-row').cloneNode(true);

            row.querySelectorAll('input').forEach(input => input.value = '');
            row.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

            row.querySelector('.remove-address').classList.remove('d-none');
            container.appendChild(row);
        });
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-address')) {
                const row = e.target.closest('.address-row');
                row.remove();
            }
        });
        // End Address

        // Start Address
        document.getElementById('add-phone').addEventListener('click', function () {
            let container = document.getElementById('phone-container');
            let phoneRow = container.querySelector('.phone-row');

            // Clona a linha
            let newPhoneRow = phoneRow.cloneNode(true);

            // Limpa os valores
            newPhoneRow.querySelectorAll('input').forEach(input => input.value = '');
            newPhoneRow.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

            // Adiciona ao container
            container.appendChild(newPhoneRow);
        });

        // Remover telefone - usa delegação de eventos
        document.addEventListener('click', function (event) {
            if (event.target.closest('.remove-phone')) {
                let phoneRows = document.querySelectorAll('.phone-row');
                if (phoneRows.length > 1) {
                    event.target.closest('.phone-row').remove();
                }
            }
        });
        // End Address
    </script>

@endsection
