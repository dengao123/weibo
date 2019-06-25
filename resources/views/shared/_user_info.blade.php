<a href="{{ route('users.show',$user->id) }}" >
  <img src="{{ $user->gravatar('140') }}" alt="" class="gravatar">
  <p>{{ $user->name }}</p>
</a>
