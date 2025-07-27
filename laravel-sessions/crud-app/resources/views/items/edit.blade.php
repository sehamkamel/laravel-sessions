@extends('items.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb py-2">
        <div class="pull-left">
            <h2>Edit Item</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 py-2">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $item->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Item Name">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 py-2">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="number" name="price" value="{{ $item->price }}" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                @error('price')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center py-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection
