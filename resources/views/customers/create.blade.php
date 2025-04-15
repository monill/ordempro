@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Adicionar Cliente</h5>
                    </div>
                    <div class="card-body animated-form">
                        <form class="row g-3 needs-validation custom-input" action="{{ route('customers.store') }}" method="POST" novalidate="">
                            @csrf
                            <div class="card-body bottom-border-tab">
                                <ul class="nav nav-tabs border-tab" id="bottom-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link nav-border txt-primary tab-primary pt-0 active" id="bottom-client-tab" data-bs-toggle="tab" href="#bottom-client" role="tab" aria-controls="bottom-home" aria-selected="true">
                                            <i class="icofont icofont-ui-user"> </i>Cliente
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link nav-border txt-primary tab-primary" id="bottom-home-tab" data-bs-toggle="tab" href="#bottom-home" role="tab" aria-controls="bottom-home" aria-selected="true">
                                            <i class="icofont icofont-ui-home"> </i>Endereço
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link nav-border txt-primary tab-primary" id="bottom-contact-tab" data-bs-toggle="tab" href="#bottom-contact" role="tab" aria-controls="bottom-contact" aria-selected="false">
                                            <i class="icofont icofont-phone"></i>Telefone
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="border-tabContent">
                                    <div class="tab-pane mt-3 show active" id="bottom-client" role="tabpanel"
                                         aria-labelledby="bottom-client-tab">
                                        <!-- Start Client -->
                                        <div class="row g-3 custom-input mt-2 address-row">
                                            <div class="col-6">
                                                <label class="form-label" for="first_name">Nome</label>
                                                <input class="form-control" id="first_name" name="first_name" type="text" placeholder="Nome" required="">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label" for="last_name">Sobrenome</label>
                                                <input class="form-control" id="last_name" name="last_name" type="text" placeholder="Sobrenome" required="">
                                            </div>


                                            <div class="col-4 position-relative">
                                                <label class="form-label" for="email">E-mail</label>
                                                <input class="form-control" id="email" name="email" type="email" placeholder="E-mail" required="">
                                            </div>
                                            <div class="col-8 position-relative">
                                                <label class="form-label" for="company_name">Empresa</label>
                                                <input class="form-control" id="company_name" name="company_name" type="text" placeholder="Empresa" required="">
                                            </div>



                                        </div>
                                        <!-- End Client -->
                                    </div>
                                    <div class="tab-pane fade" id="bottom-home" role="tabpanel" aria-labelledby="bottom-home-tab">
                                        <!-- Start Address -->
                                        <div id="address-container">
                                            <div class="row g-3 custom-input mt-2 address-row">
                                                <div class="col-xxl-2 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="country_id[]">País</label>
                                                        <select class="form-select" name="country_id[]">
                                                            @foreach($countries as $country)
                                                                <option value="{{ $country->id }}" {{ $address->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="address_type_id[]">Tipo Endereço</label>
                                                        <select class="form-select" name="address_type_id[]">
                                                            @foreach($addressTypes as $address)
                                                                <option
                                                                    value="{{ $address->id }}">{{ $address->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="state[]">Estado</label>
                                                        <input class="form-control @error('state.*') is-invalid @enderror" name="state[]" placeholder="Estado">
                                                        @error('state.*')
                                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="city[]">Cidade</label>
                                                        <input class="form-control @error('city.*') is-invalid @enderror" name="city[]" placeholder="Cidade">
                                                        @error('city.*')
                                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="address[]">Endereço</label>
                                                        <input class="form-control @error('address.*') is-invalid @enderror" name="address[]" placeholder="Endereço">
                                                        @error('address.*')
                                                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="zip_code[]">CEP</label>
                                                        <input class="form-control" name="zip_code[]" placeholder="CEP">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="complement[]">Complemento</label>
                                                        <input class="form-control" name="complement[]" placeholder="Complemento">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-danger remove-address d-none"><i class="fa-solid fa-trash"></i></button>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
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
                                            <div class="row g-3 custom-input mt-2 phone-row">
                                                <div class="col-xxl-2 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="phone_type_id[]">Tipo Telefone</label>
                                                        <select class="form-select" name="phone_type_id[]">
                                                            @foreach($phoneTypes as $phone)
                                                                <option value="{{ $phone->id }}">{{ $phone->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-sm-6 box-col-6">
                                                    <div class="form-group">
                                                        <label for="number[]">Telefone</label>
                                                        <input class="form-control" type="text" name="number[]" placeholder="Telefone">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-1 col-sm-6 box-col-6 d-flex align-items-end">
                                                    <button class="btn btn-danger remove-phone" type="button">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
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
                } else {
                    alert('É necessário pelo menos um telefone.');
                }
            }
        });
        // End Address
    </script>

@endsection
