@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="text-left mt-3">Categories</h3>
                            <a href="{{route('categories.create')}}" class="btn btn-success float-right">Nueva</a>
                        </div>
                    </div>

                    <div class="card-body">
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

                                            <a class="btn btn-info btn-rounded" href="{{route('categories.edit', $category)}}" title="Editar">
                                                Edit
                                            </a>
                                            <button class="btn btn-danger btn-rounded btn-icon" type="submit" title="Eliminar">
                                                Delete
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
