<div class="page-section">
  <div class="container">
    <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

    <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

      @foreach ($doctor as $doctors)
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="{{ asset('doctorimage/' . $doctors->image) }}" alt="{{ $doctors->name }}">
              <div class="meta">
                <a href="tel:{{ $doctors->phone }}"><span class="mai-call"></span></a>
                <a href="https://wa.me/{{ $doctors->phone }}"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{ $doctors->name }}</p>
              <p class="text-xl mb-0">{{ $doctors->specialty }}</p>
              <span class="text-sm text-grey">Room No: {{ $doctors->room }}</span>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</div>
