@extends('layouts.store')

@section('content')
    <!-- ============== start about section ========== -->

    <section class="section mt-5 pt-5">
        <div class="container mt-5 pt-5">
            <div class="d-flex flex-column gap-32">
                <div class="d-flex flex-column gap-8">
                    <h1 class="heading-1 col-lg-9">The Story of Innovation, Style, and the Soul of Our Store.</h1>
                    <p class="body-1">Welcome to our digital emporium, where style meets innovation in the realm of
                        watches, gadgets, and cutting-edge technology. Discover a curated collection that transcends
                        time, blending timeless elegance with the latest advancements. From sleek smartwatches that
                        seamlessly integrate with your lifestyle to futuristic gadgets that redefine convenience, our
                        store is your gateway to a world where form and function coalesce. Explore the intersection of
                        fashion and technology, and immerse yourself in a realm of endless possibilities. Elevate your
                        everyday with our meticulously selected range—because time is precious, and so is staying ahead
                        in the world of gadgets and tech. Welcome to the future of wristwear and beyond.Established with
                        a vision to redefine the world of watches, gadgets, and technology, our journey is a testament
                        to a relentless pursuit of excellence. We curate collections that transcend the ordinary,
                        seamlessly blending the allure of classic timepieces with the cutting-edge allure of modern
                        technology. Committed to providing a personalized shopping experience, we guide you through a
                        realm of possibilities, ensuring every product resonates with your unique taste. Our story is
                        one of crafting tomorrow's classics, a tale where gears meet dreams, and where the ticking of
                        time harmonizes with the pulse of innovation. Join us on this odyssey as we continue to pioneer
                        the future, one wrist at a time. Welcome to a world where sophistication meets
                        innovation—welcome to our story.</p>
                </div>
                <div class="row g-4 align-items-center justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="d-flex flex-column padding-16 b-radius gap-8 bg-box">
                            <h2 class="heading-2">our vision</h2>
                            <p class="body-1">our journey is a testament to a relentless pursuit of excellence. We
                                curate collections that transcend the ordinary, seamlessly blending the allure of
                                classic timepieces with the cutting-edge allure of modern technology. Committed to
                                providing a personalized shopping experience, we guide you through a realm of
                                possibilities, ensuring every product resonates with your unique taste. Our story is one
                                of crafting tomorrow's classics</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="d-flex flex-column padding-16 b-radius gap-8 bg-box">
                            <h2 class="heading-2">our approach</h2>
                            <p class="body-1">we guide you through a realm of possibilities, ensuring every product
                                resonates with your unique taste. Our story is one of crafting tomorrow's classics, a
                                tale where gears meet dreams, and where the ticking of time harmonizes with the pulse of
                                innovation. Join us on this odyssey as we continue to pioneer the future, one wrist at a
                                time. Welcome to a world where sophistication meets innovation—welcome to our story.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center flex-wrap g-4">
                    <div class="d-flex flex-column justify-content-center align-items-center col-lg-2 col-md-4 col-12 ">
                        <h1 class="heading-1">+12M</h1>
                        <p class="body-2">total Users</p>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center col-lg-2 col-md-4 col-12">
                        <h1 class="heading-1">80K</h1>
                        <p class="body-2">Happy customers</p>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center col-lg-2 col-md-4 col-12">
                        <h1 class="heading-1">+25</h1>
                        <p class="body-2">Collections</p>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center col-lg-2 col-md-4 col-12">
                        <h1 class="heading-1">2024</h1>
                        <p class="body-2">year founded</p>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center col-lg-2 col-md-4 col-12">
                        <h1 class="heading-1">+460</h1>
                        <p class="body-2">total products</p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column gap-16 about mt-5 pt-5 justify-content-center align-items-center">
                <div class="row justify-content-center align-items-center g-4 h-100 ">
                    <div class="col-lg-7 col-12 h-100 img">
                        <img class="w-100 h-100" src="images/about/about-1.png" alt="about">
                    </div>
                    <div class="col-lg-5 col-12 h-100 ">
                        <div
                            class="d-flex flex-column justify-content-center  text-start gap-8 bg-box padding-16 b-radius h-100">
                            <h2 class="heading-2">Explore Tomorrow's Watches Today!</h2>
                            <p class="body-2">Welcome to our digital emporium, where style meets innovation in the realm
                                of watches,
                                gadgets, and cutting-edge technology. Discover a curated collection that transcends
                                time.</p>
                            <a href="{{ route('store') }}" class="btn w-fit">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-lg-2 align-items-center g-4 h-100 ">
                    <div class="col-lg-7 col-12 h-100 ">
                        <div
                            class="d-flex flex-column justify-content-center  text-start gap-8 bg-box padding-16 b-radius h-100">
                            <h2 class="heading-2">Elevate Your Lifestyle with Our Range of High-Tech Watches and
                                Gadgets.</h2>
                            <p class="body-2">Welcome to our digital emporium, where style meets innovation in the realm
                                of watches,
                                gadgets, and cutting-edge technology. Discover a curated collection that transcends
                                time.</p>
                            <a href="{{ route('store') }}" class="btn w-fit">shop now</a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12 h-100 img">
                        <img class="w-100 h-100" src="images/about/about-2.png" alt="about">
                    </div>
                </div>
            </div>
            <div class="row g-4 mt-5 pt-5 features">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="d-flex flex-column gap-16">
                        <div class="d-flex justify-content-center align-items-center b-radius icon-box bg-box">
                            <i class="fa-solid fa-truck-fast icon-sm"></i>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <h3 class="heading-3">Free shipping</h3>
                            <p class="body-2">Elevate your casual style with our Men's Hoodie</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="d-flex flex-column gap-16">
                        <div class="d-flex justify-content-center align-items-center b-radius icon-box bg-box">
                            <i class="fa-solid fa-credit-card icon-sm"></i>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <h3 class="heading-3">secure payments</h3>
                            <p class="body-2">Elevate your casual style with our Men's Hoodie</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="d-flex flex-column gap-16">
                        <div class="d-flex justify-content-center align-items-center b-radius icon-box bg-box">
                            <i class="fa-solid fa-box-open icon-sm"></i>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <h3 class="heading-3">30 days free return</h3>
                            <p class="body-2">Elevate your casual style with our Men's Hoodie</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="d-flex flex-column gap-16">
                        <div class="d-flex justify-content-center align-items-center b-radius icon-box bg-box">
                            <i class="fa-regular fa-gem icon-sm"></i>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <h3 class="heading-3">curated collections</h3>
                            <p class="body-2">Elevate your casual style with our Men's Hoodie</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 @include('components.store.testimonials')
 @include('components.store.cta')

@endsection