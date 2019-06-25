@can('follow',$user)
  <div class="text-center mt-2 mb-4">
    @if(Auth::user()->isFollowing($user->id))
      <form method="post" action="{{ route('followers.destroy',$user->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-outline-primary">取消关注</button>
      </form>
    @else
       <form method="post" action="{{ route('followers.store',$user->id) }}">
           {{ csrf_field() }}
          <button type="submit" class="btn btn-sm btn-primary">关注</button>
       </form>
    @endif
  </div>
@endcan
