@extends('layouts.admin')



@section('content')

    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}}</p>

        @endif

    <h1>Users</h1>

 <table class="table">
   <thead>
     <tr>
       <th>Id</th>
       <th>Photo</th>
       <th>Name</th>
       <th>Email</th>
       <th>Role</th>
       <th>Status</th>
       <th>Created</th>
       <th>Updated</th>
       <th>Delete</th>
     </tr>
   </thead>
   <tbody>
   @if($users)
       @foreach($users as $user)
     <tr>
       <td>{{$user->id}}</td>
       <td><img height="35" class="img-rounded" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
       <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
       <td>{{$user->email}}</td>
       <td>{{$user->role ? $user->role->name : 'User has no Role'}}</td>
       <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
       <td>{{$user->created_at}}</td>
       <td>{{$user->updated_at->diffForHumans()}}</td>
       <td>


           {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id]]) !!}

           <div class="form-group">
               {!! Form::submit('Delete User',['class'=>'btn btn-danger']) !!}
           </div>

           {!! Form::close() !!}

       </td>

     </tr>
       @endforeach
   @endif

   </tbody>
 </table>


@endsection
