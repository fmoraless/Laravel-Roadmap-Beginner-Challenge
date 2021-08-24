@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="text-left mt-3">Update Category</h3>
                            <a href="{{route('categories.index')}}" class="btn btn-outline-info float-right mb-2">volver</a>
                            <form action="{{ route('categories.update', $category) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Category name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                                    @error('name') <span class="text-danger er">{{ $message }}</span>@enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
