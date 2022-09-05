<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <title>Post Update</title>
</head>

<body>
    <div class="post__update">
        <h1 class="post__update--header">
            Update Post
        </h1>
        <div class="post__update--content">
            <form action="{{ route('user.post.update', ['id' => $post->id]) }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                <div class="form__group">
                    <input type="text" name="content" class="form__input" placeholder="Content"
                        value="{{ $post->post }}" required />
                </div>

                @if ($post->image_name != null)
                    <div class="post__row--image">
                        <img src="{{ asset('/storage/post_image/' . $post->image_name) }}" alt="Image" height="50px"
                            width="50px">
                    </div>
                @endif

                <div class="btn btn__post">
                    <label for="">Add image</label>
                    <input class="btn__post--post" type="file" name="update_img" />
                </div>
                <div class="post__update--button">
                    <input class="btn" type="submit" value="Update post" />
                </div>
            </form>
        </div>
        <div>
            <div class="link link__back">
                <a href="{{ url('/profile') }}">Back to Profile Screen</a>
            </div>
        </div>
    </div>
</body>

</html>
