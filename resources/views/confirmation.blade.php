@extends('layouts.app')

@section('title', 'Show Data')

@section('content')
    <section class="py-5">
        <div class="container px-5">

            <h2>Form Confirmation</h2>

            @if($data)
                <div class="card p-3">
                    <p><strong>Name:</strong> {{ $data['name'] }}</p>
                    <p><strong>Email:</strong> {{ $data['email'] }}</p>
                    <p><strong>Message:</strong> {{ $data['message'] }}</p>

                    @if(isset($data['file_path']))
                        <p><strong>Uploaded File:</strong> {{ $data['file_path'] }}</p>
                    @endif
                </div>
            @else
                <p>No data found!</p>
            @endif
        </div>
    </section>

@endsection
