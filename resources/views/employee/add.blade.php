@extends('include.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Employee Add</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/employee/save') }}" method="post" encType="multipart/form-data">
                @csrf
                @if (isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', @$data->name) }}" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone"
                                value="{{ old('phone', @$data->phone) }}" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email"
                                value="{{ old('email', @$data->email) }}" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="{{ @$data->id ?: 0 }}" />
                <div class="mt-4 d-flex  justify-content-end">
                    <button type="submit" class="btn btn-secondary" style="width: 215px">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
