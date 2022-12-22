@foreach ($user as $user)
<tr>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->cnic}}</td>
    <td>{{$user->role}}</td>
    <td>{{$user->age}}</td>
    <td>
      @if($user->profile_picture)
         <img width="50" height="50" src="{{asset('upload/'.$user->profile_picture)}}">
      @endif
    </td>
    <td>
      <a href="{{url('user/'.$user->id)}}"><i class="far fa-eye"></i></a>
      <a href="{{url('user/'.$user->id.'/edit')}}"><i class="far fa-edit"></i></a>
      <form action="{{ route('user.destroy', $user->id ) }}" method="post">
        @csrf
        @method('DELETE')
      <button type="submit" id="delete-user" class=" btn fa fa-trash text-danger" onclick="return confirm('Are you sure to delete this user?')"><i class="fas fa-trash-alt"></i></button>
      </form>
    </td>
</tr>
@endforeach
