@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{--@include('admin.sidebar')--}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product Nº {{ $product->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/products') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                    <a href="{{ url('/products/' . $product->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                    <form method="POST" action="{{ url('products' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete product" onclick="return confirm(&quot;Deseja realmente apagar este produto?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br />
                    <br />

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <th> Nome </th>
                                    <td> {{ $product->name }} </td>
                                </tr>
                                <tr>
                                    <th> Preço (€) </th>
                                    <td> {{ $product->price_eur }} </td>
                                </tr>
                                <tr>
                                    <th> Preço (US$) </th>
                                    <td> {{ $product->price_usa }} </td>
                                </tr>
                                <tr>
                                    <th> Preço (BRL) </th>
                                    <td> {{ $product->price_brl }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection