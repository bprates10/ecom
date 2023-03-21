<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  <label for="name" class="control-label">{{ 'Nome' }}</label>
  <input class="form-control" name="name" type="text" id="name" value="{{ isset($product->name) ? $product->name : ''}}">
  {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price_eur') ? 'has-error' : ''}}">
  <label for="price_eur" class="control-label">{{ 'Preço (€)' }}</label>
  <input class="form-control" name="price_eur" type="text" id="price_eur" value="{{ isset($product->price_eur) ? $product->price_eur : ''}}">
  {!! $errors->first('price_eur', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price_usa') ? 'has-error' : ''}}">
  <label for="price_usa" class="control-label">{{ 'Preço (US$)' }}</label>
  <input class="form-control" name="price_usa" type="text" id="price_usa" value="{{ isset($product->price_usa) ? $product->price_usa : ''}}">
  {!! $errors->first('price_usa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price_brl') ? 'has-error' : ''}}">
  <label for="price_brl" class="control-label">{{ 'Preço (R$)' }}</label>
  <input class="form-control" name="price_brl" type="text" id="price_brl" value="{{ isset($product->price_brl) ? $product->price_brl : ''}}">
  {!! $errors->first('price_brl', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
  <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Adicionar' }}">
</div>