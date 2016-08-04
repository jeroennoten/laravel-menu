@extends('adminlte::page')

@section('title', 'Menu')

@section('content_header')
    <h1>Nieuw menu-item</h1>
@stop

@section('content')
    <form method="post" action="{{ route('admin.menu.store') }}">
        {{ csrf_field() }}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Menu-item</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <div class="form-group @if($errors->has('text')) has-error @endif">
                        <label class="control-label" for="textField">Tekst</label>
                        <input type="text" name="text" value="{{ old('text', '') }}" class="form-control"
                               id="textField">
                        @if($errors->has('text'))
                            <span class="help-block">{{ $errors->first('text') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('url')) has-error @endif">
                        <label class="control-label" for="urlField">Pagina</label>
                        <select name="url" class="form-control" id="urlField">
                            @foreach($pages as $page)
                                <option value="{{ $page->url }}"
                                        @if(old('url', '') == $page->url) selected @endif>{{ $page->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('url'))
                            <span class="help-block">{{ $errors->first('url') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Toevoegen
                </button>
            </div>
        </div>
    </form>
@endsection