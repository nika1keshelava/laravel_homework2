<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Post</title>
</head>
<body>

{{auth()->user()-name}}
@if(isset($edit_post))
    <form action="/update-posts" method="post">
        @else
            <form action="/add-posts" method="post">
                @endif

                <label for="post">post</label>
                <input id="post" type="text" @isset($edit_post) value="{{$edit_post->post}}" @endisset name="post">
                <br>
                @csrf


                <label for="postCreatedAt">post created at</label>
                <input id="postCreatedAt" type="datetime-local" @isset($edit_post) value="{{$edit_post->postCreatedAt}}" @endisset name="post created at">
                <br>

                @if(isset($edit_post))
                    <input type="hidden" value="{{$edit_post->id}}" name="id">
                    <button>Update post</button>
                @else
                    <button>Save post</button>
                @endif

            </form>


            <hr>

            @foreach($posts as $post1)
                <div style="border: 1px solid #3e0b0b; padding:20px;">
                    {{$post1->post}}
                    {{$post1->PostCreatedAt}}

                    <br>
                    @if(auth()->user()-> permission_of_change == 1)
                        <a href="/delete-post/{{$post->id}}">Delete post</a>
                        <a href="/edit-post/{{$post->id}}">Edit post</a>
                    @endif
                </div>
    @endforeach

</body>
</html>
