@extends('layouts.admin')



@section('content')

    <h1>Posts</h1>

    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Photo</th>
          <th>Owner</th>
          <th>Category</th>
          <th>Title</th>
          <th>Body</th>
          <th>Created</th>
          <th>Updated</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>

      @if($posts)

          @foreach($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td><img height="50" src="{{$post->photo ? $post->photo->file: 'http://placehold.it/400x400'}}" alt =""></td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
          <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
          <td>{{str_limit($post->body, 20)}}</td>
          <td>{{$post->created_at->diffForhumans()}}</td>
          <td>{{$post->updated_at->diffForhumans()}}</td>
          <td>


            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id]]) !!}

            <div class="form-group">
              {!! Form::submit('Delete Post',['class'=>'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}

          </td>
        </tr>

        @endforeach

       @endif

      </tbody>
    </table>


@stop