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
        <nav class="navbar navbar-light bg-light shadow border-bottom">
            <div class="container-fluid">
                <a href="/"><span class="navbar-brand mb-0 h1">Blog App</span></a>
            </div>
        </nav>

        <section class="my-5">
            <div class="container">
                <div class="card shadow-sm border my-2">
                    <div class="card-body">
                        <div class="d-flex">
                        <h5 class="card-title">Edit post</h5>
                        </div>
                        <form action="/edit_post/{{ $post->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="post_title" class="form-label">Post Title</label>
                                <input type="text" class="form-control" id="post_title" name="post_title" value="{{ $post->post_title }}">
                                @error('post_title')
                                    <div class="alert alert-danger my-2" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control mh-200" placeholder="Leave a comment here" id="post_body" name="post_body">{{ $post->post_body }}</textarea>
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

    </body>
</html>