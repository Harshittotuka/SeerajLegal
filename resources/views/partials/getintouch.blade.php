@php
    $jsonPath = public_path('personal_details.json');
    $details = json_decode(file_get_contents($jsonPath), true)['personal_details'];
@endphp

<section class="call">
    <div class="background bg-img bg-fixed section-padding"
        data-background="{{ asset('assets/img/get_in_touch.webp') }}" data-overlay-dark="3">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8 col-md-12">
                    <div class="section-title text-white mb-0">
                        All people are equal before the law. <span>A good attorney</span> is what makes a difference.
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-12">
                    <div class="call-center">
                        <div class="icon"><i class="fa-solid fa-phone"></i></div>
                        <div class="text">
                            <p>Get in touch</p> 
                            <a href="tel:{{ $details['phone_no'] }}">{{ $details['phone_no'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
