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
                        <h5>Idiomas</h5>
                        <p class="f-m-light mt-1">Information</p>
                        <p class="f-m-light mt-1">Usado para adicionar um novo idioma. Após adicionar isso, você precisa criar uma nova pasta de idioma e converter os arquivos de idioma inglês para seu novo idioma, por exemplo, francês. Exemplo: Source-Code/lang/fr/* — Converta todos os arquivos nesta pasta de inglês para o novo idioma.</p>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('languages.create') }}" class="btn btn-primary px-5">Criar Idioma</a>
                        <div class="table-responsive custom-scrollbar">
                            <table class="display table-striped border" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Código</th>
                                        <th>Icone</th>
                                        <th>Direção</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($languages as $language)
                                    <tr>
                                        <td>{{ $language->name }}</td>
                                        <td>{{ $language->code }}</td>
                                        <td>{{ $language->icon }}</td>
                                        <td>{{ $language->direction }}</td>
                                        <td>{{ $language->is_enabled }}</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a href="{{ route('languages.edit', $language->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                                </li>
                                                @if(!in_array($language->id, [1,2]))
                                                <li class="delete">
                                                    <form action="{{ route('languages.destroy', $language->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                                    </form>
                                                </li>
                                                @endif
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
