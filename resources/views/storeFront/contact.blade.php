@extends('layouts.store')
@section('content')

    <!-- ============== start contact section ========== -->

    <section class="section contact container b-radius bg-box p-5">
        <div class="row g-4 align-items-center justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="d-flex flex-column gap-16">
                    <h1 class="heading-1">get in touch with our team today</h1>
                    <p class="body-1">Dive into a world where fashion meets expression. Our online clothing emporium is
                        a curated destination for style enthusiasts</p>
                    <div class="d-flex flex-column gap-8">
                        <div class="d-flex align-items-center gap-8">
                            <div class="icon"><i class="fa-solid fa-phone"></i></div>
                            <div class="d-flex flex-column justify-content-center w-100 mt-3">
                                <h4 class="heading-4 m-0 p-0">Call us!</h4>
                                <p class="body-2">+867 357 895</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-8">
                            <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                            <div class="d-flex flex-column justify-content-center w-100 mt-3">
                                <h4 class="heading-4 m-0 p-0">location</h4>
                                <p class="body-2">London, UK,52050</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <form class="main-form d-flex flex-column gap-16" id="contact-us-form" action="{{ route('contact.store') }}"
                    method="POST">
                     @csrf
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-lg-6 col-12">
                                <input placeholder="name" type="text" id="name" name="name" required class="text-input">
                            </div>
                            <div class="col-lg-6 col-12">
                                <input placeholder="subject" type="text" id="subject" name="subject" required
                                    class="text-input">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <input placeholder="email" type="email" id="email" name="email" required class="text-input">
                    </div>
                    <div class="col-12">
                        <textarea placeholder="message" class="text-input" rows="7" cols="30" id="message"
                            name="message" required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" value="Submit" class="btn">send now</button>
                    </div>
                </form>
            </div>
        </div>
        <iframe class="contact-map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.9050207912896!2d-0.14675028449633118!3d51.514958479636384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ad554c335c1%3A0xda2164b934c67c1a!2sOxford+St%2C+London%2C+UK!5e0!3m2!1sen!2sro!4v1485889312335"
            allowfullscreen=""></iframe>
    </section>
@include('components.store.faq')


@if(session('toast_message'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        showNotification(
            @json(session('toast_message')),
            @json(session('toast_type'))
        );
    });
</script>
@endif

@endsection