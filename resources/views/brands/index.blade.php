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
                        <h5>Lista de Marcas</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('brands.create') }}" class="btn btn-primary px-5">Criar Marca</a>
                        <div class="table-responsive custom-scrollbar">
                            <table class="display table-striped border" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Status</th>
                                        <th>Criado Em</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->description }}</td>
                                        <td>{{ $brand->is_enabled }}</td>
                                        <td>{{ $brand->created_at }}</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a href="{{ route('brands.edit', $brand->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                                </li>
                                                <li class="delete">
                                                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
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
