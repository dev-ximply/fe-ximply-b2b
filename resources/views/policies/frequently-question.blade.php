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

        span {
            text-align: justify;
        }

        li {
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
            <img src="{{ asset('img/logos/logo-new/logo-companyy.png') }}" width="110" style="margin-left:10px"
                alt="">
        </a>
        <a href="https://api.whatsapp.com/send?phone=6281388837989&text=Hello%2C%20thank%20you%20for%20contacting%20Ximply.%20We%20will%20reply%20your%20message%20shortly.%20%0A%0AThank%20you"
            target="_blank" class="px-4">
            <span>Contact</span>
        </a>
        <a href="https://ximply.io/ximply" class="px-4" target="_blank">
            <span>About</span>
        </a>
    </div>

    <div class="content">        
        <div class="row justify-content-center">            
            <div class="col-md-10">
                <div class="border-bottom py-3 text-center mb-4">
                    <h2 class="fw-bolder">F.A.Q</h2>
                </div>
                <p class="fw-bold fs-5">Why use Ximply for your company?</p>
                <button onclick="topFunction()" id="myBtn" title="Go to top">
                    <i class="fa-solid fa-arrow-up d-flex align-items-center justify-content-center"></i>
                </button>
                <ul>
                    <li>Easy to learn and use: Our software is very simple and easy to use making training quick and
                        easy. We also provide professional training to help you use our software.</li>
                    <li>Customizable: Ximply allow for customization to fit your company needs.</li>
                    <li>Anytime anywhere: Edit and submit your expense with your mobile phone through our app. Connect
                        to our server anytime anywhere with internet.</li>

                </ul>
                <p class="fw-bold fs-5">What features and functions are provided by Ximply?</p>
                <ul>
                    <li>Spend management: Allow for admin to create small group each for its own purpose. Managers and
                        admin then can set limit used for each group to control company spending. Report of spending can
                        be view through our auto report or integrated software.</li>
                    <li>Expense management: Employee can claim reimbursements with just a photo. Our technology
                        automatically fills in the purchase data including name of user, time, place, category,
                        merchant, and amount. The user then can submit the report to his/her manager with one click.
                    </li>
                </ul>
                <p class="fw-bold fs-5">Why spend management is important?</p>
                <p>It is important as expense management control where company money went. Company run on money, the
                    better the control of money distribution the faster the company will grow.</p>
                <p class="fw-bold fs-5">Why expense management matter?</p>
                <p>Expense management record company spending so you know where the money was spent. It prevents illegal
                    purchases and loss of money. The less money loss the more money can be spend on building the
                    company.</p>
                <p class="fw-bold fs-5">Is Ximply the right platform for your company?</p>
                <p>Ximply is suitable for companies of all sizes and every industry. Ximply aim to solve the common
                    problem every company has which is managing spend and documentation. We help turn the complexity
                    that defined spend management into simplicity.</p>
                <p class="fw-bold fs-5">How to create an account?</p>
                <p>For the admin please contact us so that we can set up your own company account. Employee can sign up
                    from our website and us email to connect to their company.</p>
                <p class="fw-bold fs-5">Do you have free trial?</p>
                <p>Yes, we have the free trial for the basic account. Please contact us to try the free trial.</p>
                <p class="fw-bold fs-5">What are your opening hours?</p>
                <p>Our opening hour start from 9.00 AM and ends at 5.00 PM WIB from Monday to Friday.</p>
                <p class="fw-bold fs-5">What documents do I need to create the admin account for my company?</p>
                <p>No documents are required but some data is still needed. The data include company name, company size,
                    and company average spending per month</p>
                <p class="fw-bold fs-5">What information is fill in the claim invoice?</p>
                <p>The information filled are name of user, client, time, place, category, merchant, and amount. While
                    as the user we provide a comment section for filling in the business purpose and other details. </p>
                <p class="fw-bold fs-5">Who can look at all reimbursement in Ximply?</p>
                <p>Both admin and those given the access to by admin can view all reimbursement either pending, approved
                    or canceled claim.</p>
                <p class="fw-bold fs-5">Who is allowed to create, submit or approve claims?</p>
                <p>Every user has the permission to create and submit claims. Approvals can only be done by admin or
                    someone who the admin have given access.</p>
                <p class="fw-bold fs-5">How to approve claim reimbursements?</p>
                <p>Admin and managers can go to manage spend then approval. There they can pick which claim to be
                    approve or reject.</p>
                <p class="fw-bold fs-5">When do I get charged for Ximply subscription?</p>
                <p>User can choose whether to pay the subscriptions monthly or yearly before used.</p>
                <p class="fw-bold fs-5">Who can apply for an account?</p>
                <p>Anyone who is a part of a company can contact us to set up a company account. Employees then can sign
                    up on our website or app to join the company account. </p>
                <p class="fw-bold fs-5">How can the user claim reward?</p>
                <p>In the dashboard there is rewards section, click view all and pick the rewards you want to choose.
                    The rewards include discount from specific merchant which can be used in any location.</p>
                <p class="fw-bold fs-5">What is the security measure for Ximply?</p>
                <p>We deploy https and SSL encryption in order to ensure the safety of your company data. Call centre
                    are also available from 9.00 AM and ends at 5.00 PM WIB from Monday to Friday if there are any
                    emergencies or problems occurred. </p>
                <p class="fw-bold fs-5">What are the supported currencies in Ximply?</p>
                <p>Currently the only supported currencies is Indonesia rupiah.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 border-top row px-0">
                <div class="col-md-6 px-0">
                    <div class=""
                        style="display:block; text-align:center; justify-content:center; margin-top:40px;margin-bottom:40px">
                        <p>&#169;&nbsp;2022</p>
                    </div>
                </div>
                <div class="col-md-6  px-0">
                    <div class="px-0"
                        style="display:block; text-align:end; justify-content:right; margin-top:40px;margin-bottom:40px">
                        <a href="https://www.facebook.com/ximply.io" target="_blank"
                            style="border-radius: 50%; padding:10px;text-decoration:none">
                            {{-- <i class="fa-brands fa-facebook fa-xl text-white"></i> --}}
                            <img src="https://i.ibb.co/WVCh81n/facebook.png" alt="" width="30">
                        </a>
                        <a href="https://www.tiktok.com/@ximply.io" target="_blank"
                            style="border-radius: 50%; padding:10px;text-decoration:none">
                            {{-- <i class="fa-brands fa-twitter fa-xl text-white"></i> --}}
                            <img src="https://i.ibb.co/TqN8rY2/tiktok.png" alt="" width="30">

                        </a>
                        <a href="https://www.instagram.com/ximply.io" target="_blank"
                            style="border-radius: 50%; padding:10px;text-decoration:none">
                            {{-- <i class="fa-brands fa-instagram fa-xl text-white"></i> --}}
                            <img src="https://i.ibb.co/ct8NrMQ/instagram.png" alt="" width="30">

                        </a>
                        <a href="https://www.linkedin.com/company/ximply-io" target="_blank"
                            style="border-radius: 50%; padding:0;text-decoration:none">
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
