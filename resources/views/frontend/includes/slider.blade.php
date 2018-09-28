<div class="slider-area">
    <div class="slider-active">
      @foreach ($slider as $key)
        <div class="slider-all">
          <img src="{{ asset('/') }}/{{ $key->picture }}" alt="">
          <div class="slider-text-wrapper">
            <div class="table">
              <div class="table-cell">
                <div class="slider-text animated">
                  <h1>{{ $key->title }}</h1>
                  <p>
                    {{ $key->desc }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
</div>
