@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($blogs as $blog)
                <a href="{{ route('blog.show', $blog->id) }}" class="stretched-link text-decoration-none">
                    <div class="card mt-5 bg-white">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->content }}</p>
                            <p class="card-text">{{ $blog->user->name }} {{ $blog->created_at }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
