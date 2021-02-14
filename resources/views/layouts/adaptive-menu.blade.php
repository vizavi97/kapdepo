@foreach($menu as $item)
<div class="card-header" id="headingTwo">
    <h5 class="mb-0">
        @if(count($item->children) > 0)
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $item->id }}" aria-expanded="false" aria-controls="collapseTwo">
            {{ $item->title  }}
            <i class="fas fa-arrow-right"></i>
        </button>
        @else
            <a class="btn" style="font-size: 16px; text-transform: uppercase; padding: 15px 10px; text-decoration: none;" href="{{ $item->path }}">{{ $item->title }}</a>
        @endif
    </h5>
</div>
<div id="collapse{{ $item->id }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
                <ul>
                    @foreach($item->children as $child)
                        <li>
                            <a href="{{ $child->path }}">{{ $child->title }}</a>
                        </li>
                    @endforeach

                </ul>
        </div>
</div>
@endforeach
