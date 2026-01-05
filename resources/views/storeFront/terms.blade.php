@extends('layouts.store')

@section('content')

    <div class="d-flex flex-column gap-32 mt-4 pt-5">
        <div class="bg-box py-5">
            <div class="container">
                <div class="d-flex flex-column gap-32">
                    <h2 class="heading-2">Terms of Use</h2>
                    <div class="d-flex flex-column gap-16">
                        <p class="body-1">Last updated: <span class="fw-bold primary-text">05/01/2026</span></p>
                        <p class="body-1">Please read these Terms of Use carefully before
                            using the {{ $settings->store_name ?? 'Everything Store' }} website (the "Service") operated by {{ $settings->store_name ?? 'Everything Store' }} ("us",
                            "we", or "our").
                        </p>
                        <p class="body-1">Your access to and use of the Service is conditioned on your acceptance of and
                            compliance with these Terms. These Terms apply to all visitors, users, and others who access
                            or use the Service.
                        </p>
                        <p class="body-1">By accessing or using the Service you agree to be bound by these Terms. If you
                            disagree with any part of the terms then you may not access the Service.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column gap-32  mt-4 container ">
            <div class="d-flex flex-column gap-16">
                <h2 class="heading-3 m-0 p-0">Accounts</h2>
                <p class="body-1">When you create an account with us, you must provide us information that is accurate,
                    complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may
                    result in immediate termination of your account on our Service.
                </p>
                <p class="body-1">You are responsible for safeguarding the password that you use to access the Service
                    and for any activities or actions under your password, whether your password is with our Service or
                    a third-party service.
                </p>
                <p class="body-1">You agree not to disclose your password to any third party. You must notify us
                    immediately upon becoming aware of any breach of security or unauthorized use of your account.
                </p>
            </div>
            <div class="d-flex flex-column gap-16">
                <h2 class="heading-3 m-0 p-0">Links To Other Web Sites</h2>
                <p class="body-1">Our Service may contain links to third-party web sites or services that are not owned
                    or controlled by {{ $settings->store_name ?? 'Everything Store' }}.
                </p>
                <p class="body-1">{{ $settings->store_name ?? 'Everything Store' }} has no control over, and assumes no responsibility for, the
                    content, privacy policies, or practices of any third-party web sites or services. You further
                    acknowledge and agree that {{ $settings->store_name ?? 'Everything Store' }} shall not be responsible or liable, directly or
                    indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or
                    reliance on any such content, goods, or services available on or through any such web sites or
                    services.
                </p>
                <p class="body-1">We strongly advise you to read the terms and conditions and privacy policies of any
                    third-party web sites or services that you visit.
                </p>
            </div>
            <div class="d-flex flex-column gap-16">
                <h2 class="heading-3 m-0 p-0">Termination</h2>
                <p class="body-1">We may terminate or suspend access to our Service immediately, without prior notice or
                    liability, for any reason whatsoever, including without limitation if you breach the Terms.
                </p>
                <p class="body-1">All provisions of the Terms which by their nature should survive termination shall
                    survive termination, including, without limitation, ownership provisions, warranty disclaimers,
                    indemnity, and limitations of liability.
                </p>
            </div>
            <div class="d-flex flex-column gap-16">
                <h2 class="heading-3 m-0 p-0">Governing Law</h2>
                <p class="body-1">These Terms shall be governed and construed in accordance with the laws of [Your
                    Country], without regard to its conflict of law provisions.
                </p>
                <p class="body-1">Our failure to enforce any right or provision of these Terms will not be considered a
                    waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a
                    court, the remaining provisions of these Terms will remain in effect. These Terms constitute the
                    entire agreement between us regarding our Service, and supersede and replace any prior agreements we
                    might have between us regarding the Service.
                </p>
            </div>
            <div class="d-flex flex-column gap-16">
                <h2 class="heading-3 m-0 p-0">Changes</h2>
                <p class="body-1">TWe reserve the right, at our sole discretion, to modify or replace these Terms at any
                    time. If a revision is material, we will try to provide at least 30 days' notice prior to any new
                    terms taking effect. What constitutes a material change will be determined at our sole discretion.
                </p>
                <p class="body-1">By continuing to access or use our Service after those revisions become effective, you
                    agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the
                    Service.
                </p>
            </div>
            <div class="d-flex flex-column gap-16">
                <h2 class="heading-3 m-0 p-0">Contact Us</h2>
                <p class="body-1">If you have any questions about this Privacy Policy, please contact us.
                </p>
            </div>
        </div>
    </div>

   @include('components.store.faq')


@endsection