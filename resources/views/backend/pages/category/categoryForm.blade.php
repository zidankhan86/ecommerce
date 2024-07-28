@extends('backend.master')

@section('content')

<br><br><div class="container">
    <div class="mx-auto mt-4 mb-4">
        <h2 class="text-success text-center">Category</h2>

        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto p-5" style="max-width: 800px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            @csrf

            @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif

            <div class="mb-4">
                <label for="exampleInputName2" class="form-label">Category Type</label>
                <input type="text" value="{{ old('type') }}" class="form-control" id="exampleInputName2" name="type" placeholder="Fruit" style="height: 45px; font-size: 18px;">
                @error('type')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="mb-4">
                <label for="exampleInputName2" class="form-label">Status</label>
                <select class="form-control" name="status" id="" style="height: 45px; font-size: 18px;">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>                  
                </select>
                @error('status')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <br><div class="text-center">
                <button type="submit" class="btn btn-success" style="width: 200px; height: 45px; font-size: 18px;">+Add Category</button>
            </div>
        </form>
    </div>
</div>

@endsection