<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Custom css -->
        <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">

    </head>
    <body class="bg-light">
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow border-bottom px-4">
            <a class="navbar-brand" href="/">Blog App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <button class="nav-link btn btn-primary text-white" id="create_post">Create Post</button>
        </nav>
 
        <section class="my-5" id="add_post">
            <div class="container">
                <div class="card shadow-sm border my-2">
                    <div class="card-body">
                        <h5 class="card-title">Add post</h5>
                        <form action="{{ route('add_post') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="post_password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="post_password" name="post_password">
                                @error('post_password')
                                    <div class="alert alert-danger my-2" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="post_title" class="form-label">Post Title</label>
                                <input type="text" class="form-control" id="post_title" name="post_title">
                                @error('post_title')
                                    <div class="alert alert-danger my-2" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control mh-200" placeholder="Leave a comment here" id="post_body" name="post_body"></textarea>
                                    <label for="post_body">Post Body</label>
                                    @error('post_body')
                                        <div class="alert alert-danger my-2" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
    
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container py-4">
                <h1 class="mb-4">All Posts</h1>
                <!-- All Post data -->
                @foreach ($posts as $post)
                <div class="card shadow-sm border my-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->post_title; }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at; }}</h6>
                        <p class="card-text">{{ $post->post_body; }}</p>
                        <div class="d-flex">
                            <a href="edit/{{ $post->id; }}" class="btn btn-info">Edit</a>
                            <form action="delete_post/{{ $post->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- JS -->
        <!-- <script>
            const createPost = document.querySelector('#create_post');
            const addPostForm = document.querySelector('#add_post');

            createPost.addEventListener("click", function(){
                addPostForm.classList.remove("d-none");
                addPostForm.classList.add("d-block");
            });
        </script> -->
    </body>
</html>
