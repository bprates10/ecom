<div>
    @if(isset($pendingProducts->positem[0]->product->name))
    <div class="card-header">POS - Carrinho</div>
    <br />
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Moeda (R$)</th>
                    <th>Adicionar</th>
                </tr>
            </thead>
            @foreach($pendingProducts->positem as $item)
            <tbody>
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->currency_actual }}</td>
                    <td>{{ $item->price_actual }}</td>
                    <td>
                        <form method="POST" action="{{ url('/products' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}
                            <button type="button" wire:click="removeItem({{$item->id}}, )" class="btn btn-warning btn-sm" title="Remove">
                                <i class="fa fa-plus" aria-hidden="true"></i> Remover
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
            @if($pendingProducts)
            <button type="button" wire:click="buy()" class="btn btn-primary btn-sm" title="buy">
                <i class="fa fa-plus" aria-hidden="true"></i> Comprar
            </button>
            @endif
        </table>
    </div>
    @endif

    <br />
    <div class="card-header">POS - Produtos</div>
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
                    <th>Moeda</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allProducts as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price_eur }}</td>
                    <td>{{ $item->price_usa }}</td>
                    <td>{{ $item->price_brl }}</td>
                    <td>
                        <select id="currency">
                            <option value="eur">Moeda (€)</option>
                            <option value="uss">Moeda (US$)</option>
                            <option value="brl">Moeda (R$)</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" wire:click="addItem({{$item}})" class="btn btn-success btn-sm" title="Add">
                            <i class="fa fa-plus" aria-hidden="true"></i> Adicionar
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
    <script>
        // $(document).ready(function() {
        //     $('#currency').on('change', function(e) {
        //         console.log('AAAA');

        //     });
        // })
    </script>
    @endpush
</div>