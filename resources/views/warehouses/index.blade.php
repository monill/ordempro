@extends('layouts.main')

@section('css')
    <link href="{{ asset('assets/css/vendors/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendors/dataTables.bootstrap5.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container-fluid datatable-init">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">

                        <h5>Lista de Armazéns</h5>
                        <p class="f-m-light mt-1">Information</p>
                        <p class="f-m-light mt-1">O depósito serve ao propósito principal de manter os níveis de estoque. Se um item não estiver disponível em nenhum outro depósito, seu estoque será exibido como zero ao gerar faturas, contas ou conduzir quaisquer outras transações. Isso garante um gerenciamento de estoque preciso e previne erros durante o processo de faturamento.</p>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('warehouses.create') }}" class="btn btn-primary px-5">Criar Armazém</a>
                        <div class="table-responsive custom-scrollbar">
                            <table class="display table-striped border" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Total de Itens</th>
                                        <th>Estoque disponivel</th>
                                        <th>Valor (Custo)</th>
                                        <th>Valor (Venda)</th>
                                        <th>Valor (Lucro)</th>
                                        <th>Criado em</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($warehouses as $warehouse)
                                    <tr>
                                        <td>{{ $warehouse->name }}</td>
                                        <td>{{ $warehouse->total_items }}</td>
                                        <td>{{ $warehouse->available_stock }}</td>
                                        <td>{{ $warehouse->worth_cost }}</td>
                                        <td>{{ $warehouse->worth_sale_price }}</td>
                                        <td>{{ $warehouse->worth_profit }}</td>
                                        <td>{{ $warehouse->created_at }}</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a href="{{ route('warehouses.edit', $warehouse->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                                </li>
                                                <li class="delete">
                                                    <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero Configuration  Ends-->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables1.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom2.js') }}"></script>
@endsection
