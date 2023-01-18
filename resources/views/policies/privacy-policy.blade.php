<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">

    <script src="https://kit.fontawesome.com/5c2c5b6638.js" crossorigin="anonymous"></script>
    <script src="{{ asset('fontawesome-kit.js') }}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        p {
            text-align: justify;
        }
        span{
         text-align: justify;
        }
        li{
         text-align: justify;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            /* background-color: #04AA6D; */
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #191a4d;

            color: white;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }


        /* roket */
        #myBtn {
            display: none;
            position: fixed;
            width: 50px;
            height: 50px;
            bottom: 20px;
            right: 30px;
            border-radius: 50% !important;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #191a4d;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }

        #myBtn:hover {
            background-color: #D42A34;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>

    <title>{{ $title }}</title>
</head>

<body>


    <div class="sidebar">
        <a class="active" href="/">
            <img src="{{ asset('img/logos/logo-new/logo-companyy.png') }}" width="110" style="margin-left:10px" alt="">
        </a>
        {{-- <a href="#news">News</a> --}}
        <a href="https://api.whatsapp.com/send?phone=6281388837989&text=Hello%2C%20thank%20you%20for%20contacting%20Ximply.%20We%20will%20reply%20your%20message%20shortly.%20%0A%0AThank%20you" target="_blank" class="px-4">
            <span>Contact</span>
        </a>
        <a href="https://ximply.io/ximply" class="px-4" target="_blank">
            <span>About</span>
        </a>
    </div>

    <div class="content">
        <div class="row justify-content-center">
            <button onclick="topFunction()" id="myBtn" title="Go to top">
                <i class="fa-solid fa-arrow-up d-flex align-items-center justify-content-center"></i>
            </button>
            <div class="col-md-10">
                <div class="border-bottom py-3 text-center mb-4">
                    <h2 class="fw-bolder">Privacy Policy</h2>
                </div>
                <p style="text-align: justify;text-indent:30px">This Privacy Policy sets out the basics on how we use
                    the personal
                    information we collect and/or provide you
                    with ("Personal Information"). This Privacy Policy applies to all users of Our Services, unless set
                    out in a
                    separate Privacy Policy. Please read our Privacy Policy carefully so that you can understand our
                    approach
                    and how we use the information.</p>
                <p>This Privacy Policy covers the following matters:</p>
                <ol>
                    <li>Personal Information We May Collect</li>
                    <li>Use of Personal Information</li>
                    <li>Disclosure of Personal Information</li>
                    <li>Retention of Personal Information</li>
                    <li>Your rights</li>
                    <li>Cookies Policy</li>
                    <li>Recognition and Consent</li>
                    <li>Marketing Materials</li>
                    <li>Changes in Our Privacy Policy</li>
                    <li>How to Contact Us</li>
                </ol>
                <div>
                    <p class="fw-bold">A. PERSONAL INFORMATION WE CAN COLLECT </p>
                    <span>We may collect Personal Information in the form of:</span>
                    <ol type="1">
                        <li>The information you provide. </li>
                        <p style="text-indent:30px">You can provide information through electronic forms on Our Services
                            or by correspondence
                            through telephone, electronic mail, and so on. This information includes information that
                            you provide when registering with our services, subscribing to our services, searching for
                            products, participating in online discussions or other social media functions on our
                            services, participating in competitions, promotions, or surveys, and when you report
                            problems with our services. The information you provide may include your name, address,
                            e-mail address, telephone number, financial and credit card information, personal
                            description, photos, and other data. We may ask you to verify the information you provide,
                            to ensure the accuracy of the information.</p>
                        <li>The information you provide. </li>
                        <p>For each of your visits to our services, we may collect the following information
                            automatically:
                        <ol type="1">
                            <li>Technical information, including the Internet Protocol address (IP address) used to
                                connect your computer to the internet, your log in information, browser type and version
                                (browser) used, time zone settings, browser plug-in type and version , our operating
                                system and services;</li>
                            <li>Information about your visit, including a complete list of Uniform Resource Locators
                                (URLs) visited to, through and from Our Services (including date and time); the product
                                you are viewing or searching for; page response times, download issues, length of visits
                                to certain pages, interaction information on the page (such as scrolling, clicks, or
                                mouse movements), the method used to leave the site, and the phone number used to
                                contact our customer service.
                            </li>
                        </ol>
                        </p>
                        <li>The information you provide. </li>
                    </ol>
                    <p class="fw-bold d-block">B. USE OF PERSONAL INFORMATION</p>
                    <p>We use Personal Information in the following ways:</p>
                    <p style="text-indent:30px">We may use personal information collected through our Service site to
                        contact you regarding
                        the products and services offered by us and/or our partners and vice versa to improve your
                        experience with us and/or our partners. Personal information will not be sold or transferred in
                        ways that violate applicable laws and regulations, except in the case that we disclose the
                        information we collect to the government or other authorized parties if required by applicable
                        laws and regulations.</p>
                    <p class="fw-bold">C. DISCLOSURE OF PERSONAL INFORMATION</p>
                    <p style="text-indent:30px">We may share or disclose Personal Data with members of Our business
                        group, which includes
                        branches and subsidiaries, as well as the main parent company and its subsidiaries. We may share
                        Personal Data with third parties, including:</p>
                    <ol type="1">
                        <li>Business partners, suppliers and sub-contractors in regards of the contracts that we get
                            into with them or you.</li>
                        <li>Advertisers and ad networks that need data to select and offer relevant ads to you and
                            other users. We do not disclose information about identifiable individuals, but We may
                            provide them with aggregate information about Our users. We may also provide aggregated
                            information to assist advertisers in reaching specific target audiences. We may use the
                            personal data we collect to fulfil advertisers' requests by showing their ads to that target
                            audience.</li>
                        <li>Providers of analytics and search engines that help us to improve and optimize our services.
                        </li>
                        <li>We may disclose information to third parties:</li>
                        <ol type="a">
                            <li>In situations where we sell or buy companies and/or assets, we may disclose data to
                                potential buyers or sellers of such companies or assets.</li>
                            <li>If we or our parent company or substantial assets related therein are acquired by a
                                third party, the Personal Data held about our customers will be one of the transferred
                                assets.</li>
                            <li>If We are under a responsibility to disclose or share data in order to comply with
                                legal obligations and other agreements; or protect the rights, property, or safety of PT
                                Aplikasi Lintas Bangsa, our customers, and others. This includes exchanging
                                information with other companies and organizations for the purpose of fraud protection
                                and credit risk reduction.
                            </li>
                        </ol>
                    </ol>
                    <p class="fw-bold">D. COLLECTION & STORAGE OF PERSONAL INFORMATION</p>
                    <p style="text-indent:30px">Personal information that you provide to us may be collected by our
                        partner on our behalf via the
                        online platform services they provide to enable us to offer Our Services to you. We store
                        collected information on secure servers. All payment transactions on Our Service will be
                        encrypted. By submitting your Personal Information to Our Services, you agree to the transfer,
                        storage, and processing that occurs on our Services. We will take steps within reasonable limits
                        to ensure that Personal Information is treated securely and in accordance with the Privacy
                        Policy and Applicable Regulations.</p>
                    <p style="text-indent:30px">All Personal Information that you provide will be stored by us: (i) for
                        as long as you are still
                        a user of our services and (ii) for at least 5 (five) years from the date on which you stop
                        using our services; or (iii) in accordance with the original purpose for which the Personal
                        Information was collected.</p>
                    <p style="text-indent:30px">In situations where we provide (or you choose) a password that allows
                        you to access certain parts
                        of our service, you are responsible for maintaining the confidentiality of this password. You
                        are not allowed to share your password with anyone.</p>
                    <p style="text-indent:30px">Please note that the transmission of information over the internet is
                        not completely secure.
                        Nonetheless, We will try our best to protect such Personal Information. We cannot guarantee the
                        security of data sent to our Services; the risk of any transmission is your responsibility. Once
                        we receive your Personal Information, we will use strict procedures and security features to
                        prevent unauthorized access.</p>
                    <p class="fw-bold">E. YOUR RIGHTS</p>
                    <p style="text-indent:30px">You can request the deletion of your Personal Information on Our
                        Services or withdraw your
                        consent to any or all collection, use or disclosure of your Personal Information by giving us
                        reasonable notice in writing via the contact details available. </p>
                    <p style="text-indent:30px">Depending on the circumstances and nature of the request you request,
                        you must understand and
                        acknowledge that after the withdrawal of such consent or removal request, you may no longer be
                        able to use Our Services. Withdrawal of your consent may result in the termination of your
                        Account or your contractual relationship and transactions with us, with all rights and
                        obligations arising in full compliance. Upon receipt of a notification to withdraw consent for
                        the collection, use or disclosure of your Personal Information, we will inform you of the
                        possible consequences of such withdrawal so that you can decide whether or not you wish to
                        withdraw your consent.</p>
                    <p style="text-indent:30px">You can ask Us to access and/or correct your Personal Information which
                        is in our possession and
                        control, by contacting us at the details provided below.</p>
                    <p style="text-indent:30px">Our Services may, from time to time, contain links to and from websites
                        belonging to Partner
                        networks, advertisers and other affiliates. If you follow a link to one of these sites, please
                        note that these sites have their own Privacy Policies and that We are not responsible or liable
                        for those policies. Please check these policies before you submit any information to these
                        sites.</p>
                    <p class="fw-bold">F. COOKIES POLICY</p>
                    <p style="">When you use our services, we may place a number of cookies on your browser.
                        Cookies are small
                        digital files containing letters and numbers that we store on your browser or computer hard
                        drive with your consent. Cookies contain information that is transferred to your computer's hard
                        disk.</p>
                    <p style="text-indent:30px">Cookies may be used for the following purposes: (1) enable certain
                        functions, (2) provide
                        analysis, (3) store your preferences; and (4) enabling the delivery of advertising and
                        behaviours based advertising. Some of these cookies will only be used if you use certain
                        features, or choose certain preferences, while some other Cookies will always be used.</p>
                    <p>We use cookies for the following reasons:</p>
                    <ol type="1">
                        <li>Cookies are required for the operation of Our Services. This includes, for example,
                            Cookies that allow you to enter secure areas of Our Services, use a shopping cart, or use
                            electronic billing services.</li>
                        <li>Cookies allow us to recognize and count the number of visitors and see how visitors move
                            around our services when they use them. This helps us improve the way our services work, for
                            example, by ensuring users find what they are looking for easily and precisely.</li>
                        <li>Cookies are used to identify you when you return to our services. This allows us to
                            personalize our content for you, greet you by name, and remember your preferences (for
                            example, your choice of language or region).</li>
                        <li>Cookies record your visit to Our Services, the pages you have visited, and the links you
                            have followed. We will use this information to make Our Services and the advertisements
                            posted therein more relevant to your interests. We may also share this information with
                            third parties for that purpose.</li>
                    </ol>
                    <p style="text-indent:30px">Please note that third parties (including, for example, advertising
                        networks and external service
                        providers such as web traffic analysis services) may also use these cookies, over which we have
                        no control. These cookies tend to make Our Services and the advertisements displayed on them
                        more relevant to your interests, as well as improve the performance of Our Services.</p>
                    <p style="text-indent:30px">You can delete Cookies by performing the clear data function on your web
                        browser which allows you
                        to refuse the setting of all or part of Cookies. However, you may not be able to access all or
                        part of our Services.</p>
                    <p class="fw-bold">G. ACKNOWLEDGMENT AND APPROVAL</p>
                    <p style="text-indent:30px">By agreeing to the Privacy Policy, you and/or your parent or guardian
                        (in case you are 18
                        (eighteen) years old) acknowledge that you have read and understand this Privacy Policy and
                        agree to all its terms. In particular, you agree and give consent for us to collect, use, share,
                        disclose, store, transfer or process your Personal Information in accordance with this Privacy
                        Policy.</p>
                    <p style="text-indent:30px">In the event that you provide Personal Information relating to other
                        individuals (e.g. Personal
                        Information relating to your spouse, family members, friends, or other parties) to us, then you
                        declare and guarantee that you have obtained the consent of that individual to, and by hereby
                        consent on behalf of such individuals to, the collection, use, disclosure and processing of
                        their Personal Information by us.</p>
                    <p class="fw-bold">H. MARKETING MATERIALS</p>
                    <p style="text-indent:30px">We and Our Partners may send you and/or your parent or guardian direct
                        marketing, advertising,
                        and promotional communications via web browser, post, telephone calls, instant messaging
                        services, email and/or other messaging applications (“Marketing Materials” ) if you have agreed
                        to subscribe to our mailing list, and/or agree to receive marketing and promotional materials
                        from us. You may opt out of receiving such marketing communications at any time by contacting us
                        via the contact details available. Please note that if you choose to opt out, we may still send
                        you non-promotional messages, such as receipts or information about your account.</p>
                    <p class="fw-bold">I. CHANGES IN OUR PRIVACY POLICY</p>
                    <p style="text-indent:30px">Any changes we make to our Privacy Policy in the future will be
                        published on this page and, when
                        necessary, notified to you by email and/or other appropriate means. Please revisit this page
                        from time to time for updates or changes to our Privacy Policy.</p>
                </div>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 border-top row px-0">
                <div class="col-md-6 px-0">
                  <div class=""  style="display:block; text-align:center; justify-content:center; margin-top:40px;margin-bottom:40px">
                     <p>&#169;&nbsp;2022</p>
                  </div>
                </div>
                <div class="col-md-6  px-0">
                    <div class="px-0"
                        style="display:block; text-align:end; justify-content:right; margin-top:40px;margin-bottom:40px">
                        <a href="https://www.facebook.com/ximply.io" target="_blank" style="border-radius: 50%; padding:10px;text-decoration:none">
                            {{-- <i class="fa-brands fa-facebook fa-xl text-white"></i> --}}
                            <img src="https://i.ibb.co/WVCh81n/facebook.png" alt="" width="30">
                        </a>
                        <a href="https://www.tiktok.com/@ximply.io" target="_blank" style="border-radius: 50%; padding:10px;text-decoration:none">
                            {{-- <i class="fa-brands fa-twitter fa-xl text-white"></i> --}}
                            <img src="https://i.ibb.co/TqN8rY2/tiktok.png"  alt="" width="30">

                        </a>
                        <a href="https://www.instagram.com/ximply.io" target="_blank" style="border-radius: 50%; padding:10px;text-decoration:none">
                            {{-- <i class="fa-brands fa-instagram fa-xl text-white"></i> --}}
                            <img src="https://i.ibb.co/ct8NrMQ/instagram.png" alt="" width="30">

                        </a>
                        <a href="https://www.linkedin.com/company/ximply-io" target="_blank" style="border-radius: 50%; padding:0;text-decoration:none">
                            {{-- <i class="fa-brands fa-linkedin-in fa-xl text-white"></i> --}}
                            <img src="https://i.ibb.co/XyxfPhh/linkedin.png" alt="" width="30">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
    <script>
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>
