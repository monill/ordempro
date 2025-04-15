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
                        <h5>Lista de Unidades</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('units.create') }}" class="btn btn-primary px-5">Criar Unidade</a>
                        <div class="table-responsive custom-scrollbar">
                            <table class="display table-striped border" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Código</th>
                                        <th>Status</th>
                                        <th>Criado Em</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($units as $unit)
                                    <tr>
                                        <td>{{ $unit->name }}</td>
                                        <td>{{ $unit->short_code }}</td>
                                        <td>{{ $unit->is_enabled }}</td>
                                        <td>{{ $unit->created_at }}</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a href="{{ route('units.edit', $unit->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                                </li>
                                                <li class="delete">
                                                    <form action="{{ route('units.destroy', $unit->id) }}" method="POST" style="display:inline;">
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
