@extends('adminlte::page')

@section('title', 'Menu')

@section('content_header')
    <h1>Menu beheren</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Menu</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin table-striped">
                    <thead>
                    <tr>
                        <th>Tekst</th>
                        <th>Url</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $i => $item)
                        <tr>
                            <td>
                                {{ $item->text }}
                            </td>
                            <td>
                                {{ $item->url }}
                            </td>
                            <td>
                                <form method="post"
                                      action="{{ route('admin.menu.update', $item) }}"
                                      style="display: inline"
                                >
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="display_order" value="{{ $item->displayOrder - 1 }}">
                                    <button type="submit"
                                            class="btn btn-xs btn-primary"
                                            @if($i == 0) disabled @endif
                                    >
                                        <i class="fa fa-arrow-up"></i>
                                    </button>
                                </form>
                                <form method="post"
                                      action="{{ route('admin.menu.update', $item) }}"
                                      style="display: inline"
                                >
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="display_order" value="{{ $item->displayOrder + 1 }}">
                                    <button type="submit"
                                            class="btn btn-xs btn-primary"
                                            @if($i == count($items) - 1) disabled @endif
                                    >
                                        <i class="fa fa-arrow-down"></i>
                                    </button>
                                </form>
                                <form method="post"
                                      action="{{ route('admin.menu.destroy', $item) }}"
                                      style="display: inline"
                                >
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-xs btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">
            <a href="{{ route('admin.menu.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Nieuw menu-item
            </a>
        </div>
    </div>
@endsection