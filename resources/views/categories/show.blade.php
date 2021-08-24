@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">

                            <h3 class="text-left mt-3">
                                <i class="fa fa-bars mr-2"></i>
                                Category details
                            </h3>
                            <a href="{{route('categories.index')}}" class="btn btn-outline-info float-right mb-2">
                                <span>
                                <i class="fa fa-arrow-left"></i>
                                volver</span>
                            </a>
                        </div>

                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <h6><b>Category name: </b>
                                <span class="badge badge-secondary">
                                {{ $category->name }}
                                </span>
                            </h6>
                        </h4>
                        <b>Created at: </b> {{ $category->created_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
