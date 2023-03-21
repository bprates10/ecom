@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">POS - Ponto de Venda</div>
                <div class="card-body">
                    <a href="{{ url('/products/create') }}" class="btn btn-success btn-sm" title="Adicionar Novo">
                        <i class="fa fa-plus" aria-hidden="true"></i> Novo
                    </a>

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Produto</th>
                                    <th>Preço (€)</th>
                                    <th>Preço (US$)</th>
                                    <th>Preço (R$)</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price_eur }}</td>
                                    <td>{{ $item->price_brl }}</td>
                                    <td>{{ $item->price_usa }}</td>
                                    <td>
                                        <a href="{{ url('/products/' . $item->id) }}" title="Visualizar"><button class="btn btn-info btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button>
                                        </a>
                                        <a href="{{ url('/products/' . $item->id . '/edit') }}" title="Editar"><button class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                        <form method="POST" action="{{ url('/products' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Apagar" onclick="return confirm(&quot;Deseja mesmo remover o produto?&quot;)">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> Apagar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection