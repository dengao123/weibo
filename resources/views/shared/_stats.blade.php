<a href="{{ route('users.followings',$user->id) }}">
  <strong id="followings" class="stat">
    {{ $user->followings->count() }}
    关注
  </strong>
</a>
<a href="{{ route('users.followers',$user->id) }}">
  <strong id="followiers" class="stat">
    {{ $user->followers->count() }}
    粉丝
  </strong>
</a>
<a href="{{ route('users.show',$user->id) }}">
  <strong id="statuses" class="stat">
     {{ $user->statuses->count() }}
    动态
  </strong>
</a>
