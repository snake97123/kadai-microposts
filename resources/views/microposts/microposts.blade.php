<div class="mt-4">
    @if (isset($microposts))
        <ul class="list-none">
            @foreach ($microposts as $micropost)
            <li class="flex items-start gap-x-2 mb-4">
                <div class="avatar">
                    <div class="w-12 rounded">
                        <img src="{{ Gravatar::get($micropost->user->email) }}" alt="" />
                    </div>
                </div>
                <div>
                    <div>
                        <a class="link link-hover text-info" href="{{ route('users.show', $micropost->user->id) }}">{{ $micropost->user->name }}</a>
                        <span class="text-muted text-gray-500">posted at {{ $micropost->created_at }}</span>
                    </div>
                    <div>
                        <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $micropost->user_id)
                            <form method="POST" action="{{ route('microposts.destroy', $micropost->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error btn-sm normal-case"
                                    onclick="return confirm('Delete id = {{ $micropost->id }} ?')">Delete</button>
                            </form>
                            @endif
                    </div>
                    <div>
                        @if (Auth::user()->is_favoriting($micropost))
                            <form method="POST" action="{{ route('favorites.unfavorite', $micropost->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning btn-sm normal-case">Unfavorite</button>
                            </form>
                       @else
                            <form method="POST" action="{{ route('favorites.favorite', $micropost->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm normal-case">Favorite</button>
                           </form>
                       @endif
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        {{ $microposts->links() }}
    @endif
</div>