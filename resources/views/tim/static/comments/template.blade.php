@push('styles')
  <link rel="stylesheet" href="{{asset('./css/tim/comments.css')}}"/>
@endpush

<div class="row">
  <div class="comment col">
    <div class="comment-form">
      <form action="{{ route('create-comment') }}" method="POST">
        @csrf()
        <input type="hidden" name="parent" value="{{$parent}}"/>
        @if(isset($categories_id))
          <input type="hidden" name="cat" value="{{$categories_id}}"/>
        @endif
        <div class="form-group">
          <label for="comment-name">
            <input type="text" class="form-control" name="name" id="comment-name" placeholder="Имя">
            <p class="mb-0">
              <small>Оставьте свое имя или не заполняйте данное поле, чтобы остатьтя инкогнито</small>
            </p>
          </label>

        </div>
        <div class="form-group">
          <label class="w-100">
                  <textarea class="form-control" minlength="2" rows="3"
                            name="comment"
                            placeholder="Оставьте свой комментрий"
                            required
                  ></textarea>
          </label>
        </div>
        <div class="d-flex justify-content-end">

          <button type="submit" class="btn btn-outline-dark">Опубликовать</button>
        </div>
      </form>
    </div>
    <ul class="comment-list">
      @if(count($comments) > 0)
        @foreach($comments as $comment)
          <li class="comment-item">
            <div class="comment-item-name">
              <h5>{{!is_null($comment->name) ? $comment->name : "Инкогнито"}}</h5>
            </div>
            <div class="comment-item-body">
              <span>{{$comment->comment}}</span>
            </div>
          </li>
        @endforeach
      @else
        <p>Оставьте первый комментарий</p>
      @endif
    </ul>
  </div>
</div>
