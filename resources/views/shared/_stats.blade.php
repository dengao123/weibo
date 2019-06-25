<a href="#">
  <strong id="followings" class="stat">
    {{ $user->followings->count() }}
    关注

  </strong>
</a>
<a href="#">
  <strong id="followiers" class="stat">
    {{ $user->followers->count() }}
    粉丝
  </strong>
</a>
<a href="#">
  <strong id="statuses" class="stat">
     {{ $user->statuses->count() }}
    动态
  </strong>
</a>
