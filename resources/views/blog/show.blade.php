@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mt-5 bg-white">
                <div class="card-body">
                    <h1>{{ $blog->title }}</h1>

                    <p>
                        Автор: {{ $blog->user->name }} Опубликовано: {{ $blog->created_at->format('d.m.Y') }}
                    </p>

                    <div>
                        {!! $blog->content !!}
                    </div>


                </div>
            </div>


            <h2>Комментарии</h2>
            <div class="d-flex">

            <a href="{{ route('blog.show', $blog->id) }}?sort=latest"
               class="btn btn-primary d-inline-block {{ request('sort') == 'latest' ? 'active' : '' }}">
                Новые
            </a>

            <a href="{{ route('blog.show', $blog->id) }}?sort=oldest"
               class="btn btn-secondary d-inline-block mx-3 {{ request('sort') == 'oldest' ? 'active' : '' }}">
                Старые
            </a>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach($comments as $commentData)
                <div class="card mt-2 bg-white">
                    <div class="card-body">
                        <div class="comment">
                            <span class="author">{{ $commentData->user->name }} {{ $commentData->created_at }}</span>

                            <p>{{ $commentData->content }}</p>


                        </div>
                    </div>
                </div>


            @endforeach
            {!! $comments->withQueryString()->links('pagination::bootstrap-5') !!}

            <div class="mt-4">
                <form
                    method="POST"
                    action="{{ route('comments.store', $blog) }}"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="blog_id"
                        value="{{ $blog->id }}"
                    >
                    <div class="form-group">
                    <textarea
                        class="form-control"
                        id="content" name="content"
                        rows="5">
                    </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>


        </div>
    </div>

@endsection


