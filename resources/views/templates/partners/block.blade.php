<section class="section-partner">
    <div class="container">
        <h5>@lang('наши')<span>@lang('партнёры')</span></h5>
        <div class="partner">
            @foreach($partners as $item)
                <a href="{{ $item->link ? $item->link : '#'  }}">
                    <div class="partner-item">
                        <img src="/storage/{{ $item->image }}">
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
