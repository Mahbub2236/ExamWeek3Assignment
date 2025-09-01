@extends('layouts.app')

@section('title', 'File Upload')

@section('content')
    <section class="py-5">
        <div class="container px-5">
            <h2>Upload File</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('upload.handle') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Choose File</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                    @error('file') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </section>
@endsection