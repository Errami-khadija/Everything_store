@extends('layouts.store')

@section('content')

    <div class="d-flex flex-column gap-32 privacy mt-4 pt-5">
        <div class="bg-box py-5">
            <div class="container">
                <div class="d-flex flex-column gap-32">
                    <h2 class="heading-2">privacy policy</h2>
                    <div class="d-flex flex-column gap-16">
                        <p class="body-1">Last updated: <span class="fw-bold primary-text">05/01/2026</span></p>
                        <p class="body-1">{{ $settings->store_name ?? 'Everything Store' }} we operates {{ $settings->store_name ?? 'Everything Store' }}. This page informs you of
                            our policies regarding the collection, use, and disclosure of Personal Information we
                            receive from users of the Site.
                        </p>
                        <p class="body-1">We use your Personal Information only for providing and improving the Site. By
                            using the Site, you agree to the collection and use of information in accordance with this
                            policy.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column gap-32  mt-4 container ">
            <div class="d-flex flex-column gap-16">
                <h2 class="heading-3 m-0 p-0">Information Collection And Use</h2>
                <p class="body-1">While using our Site, we may ask you to provide us with certain personally
                    identifiable
                    information that can be used to contact or identify you. Personally identifiable information may
                    include, but is not limited to your name, email address, postal address, and phone number ("Personal
                    Information").
                </p>
            </div>
            <div class="d-flex flex-column gap-16">
                <h2 class="heading-3 m-0 p-0">Log Data</h2>
                <p class="body-1">Like many site operators, we collect information that your browser sends whenever you
                    visit our Site ("Log Data"). This Log Data may include information such as your computer's Internet
                    Protocol ("IP") address, browser type, browser version, the pages of our Site that you visit, the
                    time and date of your visit, the time spent on those pages, and other statistics.
                </p>
            </div>
            <div class="d-flex flex-column gap-16">
                <h2 class="heading-3 m-0 p-0">Cookies</h2>
                <p class="body-1">Cookies are files with small amount of data, which may include an anonymous unique
                    identifier. Cookies are sent to your browser from a web site and stored on your computer's hard
                    drive.
                </p>
                <p class="body-1">Like many sites, we use "cookies" to collect information. You can instruct your
                    browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not
                    accept cookies, you may not be able to use some portions of our Site.
                </p>
            </div>
            <div class="d-flex flex-column gap-16">
                <h2 class="heading-3 m-0 p-0">Security</h2>
                <p class="body-1">The security of your Personal Information is important to us, but remember that no
                    method of transmission over the Internet, or method of electronic storage, is 100% secure. While we
                    strive to use commercially acceptable means to protect your Personal Information, we cannot
                    guarantee its absolute security.
                </p>
            </div>
            <div class="d-flex flex-column gap-16">
                <h2 class="heading-3 m-0 p-0">Changes To This Privacy Policy</h2>
                <p class="body-1">This Privacy Policy is effective as of [Date] and will remain in effect except with
                    respect to any changes in its provisions in the future, which will be in effect immediately after
                    being posted on this page.
                </p>
                <p class="body-1">We reserve the right to update or change our Privacy Policy at any time and you should
                    check this Privacy Policy periodically. Your continued use of the Service after we post any
                    modifications to the Privacy Policy on this page will constitute your acknowledgment of the
                    modifications and your consent to abide and be bound by the modified Privacy Policy.
                </p>
                <p class="body-1">If we make any material changes to this Privacy Policy, we will notify you either
                    through the email address you have provided us, or by placing a prominent notice on our website.
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