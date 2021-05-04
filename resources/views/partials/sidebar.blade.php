<div class="border-end border-bottom px-3 py-2 bg-white">
    <div class="my-1 text-muted">
        <h5>
            <strong>
            Team news
            </strong>
        </h5>
        <hr>    
    </div>
    @foreach ($teamsWithNews as $team)
        <div class="my-2 mx-0 ms-2 text-muted">
            <a 
                class="text-decoration-none"
                href="{{ route('team_news', ['team_name' => $team->name]) }}">
                {{ $team->name }}
            </a>
            @if (!$loop->last)
                @if($loop->even)
                    <hr class="w-75 my-1">
                @else
                    <hr class="w-50 my-1">
                @endif
            @endif
        </div>
    @endforeach
</div>

<style>
    a {
        color: var(--bs-muted);
    }

    a:hover {
        color: rgba(0, 0, 0, .7);
    }

    hr {

        margin: 0;

    }
</style>