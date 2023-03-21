@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">POS - Ponto de Venda</div>
                <div class="card-body">
                    @livewire('cart')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@livewireScripts

<script>
    function teste(item) {
        console.log('item', item)
        let url = `pos/${item}`;

        fetch(url, {
                method: 'PUT'
            })
            .then(function(response) {
                return response.json();
            })

            .catch(function(error) {
                console.log(error)
            });
    }

    function removeItem(item) {
        // todo...
    }

    function addItem() {

        let url = `pos`;

        fetch(url, {
                method: 'POST'
            })
            .then(function(response) {
                return response.json();
            })

            .catch(function(error) {
                console.log(error)
            });

    }
</script>