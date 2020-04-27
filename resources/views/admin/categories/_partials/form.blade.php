@csrf
<div class="form-group row">
  <label for="title" class="col-sm-1 col-form-label">Titulo</label>
  <div class="col-sm-11">
    <input type="text" value="{{ $category->title ?? old('title') }}" class="form-control" id="title" name="title" placeholder="Titulo">
  </div>
</div>

<div class="form-group row">
  <label for="url" class="col-sm-1 col-form-label">Url</label>
  <div class="col-sm-11">
    <input type="text" value="{{ $category->url ?? old('url') }}" class="form-control" id="url" name="url" placeholder="Url">
  </div>
</div>
<div class="form-group row">
  <label for="description" class="col-sm-1 col-form-label">Descrição</label>
  <div class="col-sm-11">
    <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $category->description ?? old('description') }}</textarea>
  </div>
</div>
<div class="form-group">
  <button type="submit" class="btn btn-info pull-right">Salvar</button>
</div>

