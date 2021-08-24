@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="text-left mt-3">Categories</h3>
                            <a href="{{route('categories.create')}}" class="btn btn-success float-right">
                                New
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(session('info'))
                            <div class="alert alert-success" role="alert">
                                Categoría guardada con éxito
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th class="text-center" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key => $category)
                                <tr>
                                    <th scope="row">#{{$key+1}}</th>
                                    <td>{{$category->name}}</td>
                                    <td class="float-right">
                                        <form action="{{route('categories.destroy', $category)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a class="btn btn-secondary btn-rounded" href="{{route('categories.show', $category)}}" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a class="btn btn-info btn-rounded" href="{{route('categories.edit', $category)}}" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-rounded btn-icon" type="submit" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
