<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/5c2c5b6638.js" crossorigin="anonymous"></script>
    <script src="{{ asset('fontawesome-kit.js') }}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">

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
            width: 100%;
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




        .order {
            counter-reset: order;
        }

        .order li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order li::before {
            counter-increment: order;
            content: "1."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two {
            counter-reset: order;
        }

        .order-two li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-two li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-rights {
            counter-reset: order 4;
        }

        .order-two-rights li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-two-rights li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-chargebacks {
            counter-reset: order 5;
        }

        .order-two-chargebacks li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-two-chargebacks li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-disbursement {
            counter-reset: order 6;
        }

        .order-two-disbursement li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-two-disbursement li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-implementation {
            counter-reset: order 7;
        }

        .order-two-implementation li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-two-implementation li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-transactionsfees {
            counter-reset: order 9;
        }

        .order-two-transactionsfees li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-two-transactionsfees li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-suspensionInternet {
            counter-reset: order 10;
        }

        .order-two-suspensionInternet li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-two-suspensionInternet li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-securityProtection {
            counter-reset: order 11;
        }

        .order-two-securityProtection li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-two-securityProtection li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-representations {
            counter-reset: order 12;
        }

        .order-two-representations li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-two-representations li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-domicile {
            counter-reset: order 13;
        }

        .order-two-domicile li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-two-domicile li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-confidentialy {
            counter-reset: order 14;
        }

        .order-two-confidentialy li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-two-confidentialy li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-third {
            counter-reset: order 3;
        }

        .order-third li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-third li::before {
            counter-increment: order;
            content: "2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-introduction {
            counter-reset: order;
        }

        .order-list-introduction li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-list-introduction li::before {
            counter-increment: order;
            content: "2.2."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-definition {
            counter-reset: order;
        }

        .order-list-definition li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-list-definition li::before {
            counter-increment: order;
            content: "2.3."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-interpretation {
            counter-reset: order 1;
        }

        .order-list-interpretation li {
            list-style-type: none;
            display: block;
            position: relative;
        }

        .order-list-interpretation li::before {
            counter-increment: order;
            content: "2.3."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-transactionsfees {
            counter-reset: order;
        }

        .order-list-transactionsfees li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;
        }

        .order-list-transactionsfees li::before {
            counter-increment: order;
            content: "2.10."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-transactionsfees-two {
            counter-reset: order 1;
        }

        .order-list-transactionsfees-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;
        }

        .order-list-transactionsfees-two li::before {
            counter-increment: order;
            content: "2.10."counter(order) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }





        .order-list {
            counter-reset: orders;
        }

        .order-list li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list li::before {
            counter-increment: orders;
            content: "1.1."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .order-list-license {
            counter-reset: orders;
        }

        .order-list-license li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-license li::before {
            counter-increment: orders;
            content: "1.2."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .order-list-acceptance {
            counter-reset: orders;
        }

        .order-list-acceptance li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-acceptance li::before {
            counter-increment: orders;
            content: "1.3."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .order-list-authorised {
            counter-reset: orders;
        }

        .order-list-authorised li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-authorised li::before {
            counter-increment: orders;
            content: "1.4."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .order-list-access {
            counter-reset: orders;
        }

        .order-list-access li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-access li::before {
            counter-increment: orders;
            content: "1.5."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }


        .order-list-fees {
            counter-reset: orders;
        }

        .order-list-fees li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-fees li::before {
            counter-increment: orders;
            content: "1.6."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .order-list-location {
            counter-reset: orders;
        }

        .order-list-location li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-location li::before {
            counter-increment: orders;
            content: "1.7."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .order-list-security {
            counter-reset: orders;
        }

        .order-list-security li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-security li::before {
            counter-increment: orders;
            content: "1.8."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .order-list-security-two {
            counter-reset: orders 2;
        }

        .order-list-security-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-security-two li::before {
            counter-increment: orders;
            content: "1.8."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .order-list-thirdparty {
            counter-reset: orders;
        }

        .order-list-thirdparty li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-thirdparty li::before {
            counter-increment: orders;
            content: "1.9."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .order-list-property {
            counter-reset: orders;
        }

        .order-list-property li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-property li::before {
            counter-increment: orders;
            content: "1.10."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .order-list-disclaimer {
            counter-reset: orders;
        }

        .order-list-disclaimer li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-disclaimer li::before {
            counter-increment: orders;
            content: "1.11."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-disclaimer-two {
            counter-reset: orders 1;
        }

        .order-list-disclaimer-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-disclaimer-two li::before {
            counter-increment: orders;
            content: "1.11."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-disclaimer-third {
            counter-reset: orders 3;
        }

        .order-list-disclaimer-third li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-disclaimer-third li::before {
            counter-increment: orders;
            content: "1.11."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-disclaimer-records {
            counter-reset: orders;
        }

        .order-list-disclaimer-records li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-disclaimer-records li::before {
            counter-increment: orders;
            content: "1.12."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }


        .order-list-collection {
            counter-reset: orders;
        }

        .order-list-collection li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-collection li::before {
            counter-increment: orders;
            content: "1.13."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-collection-two {
            counter-reset: orders 1;
        }

        .order-list-collection-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-collection-two li::before {
            counter-increment: orders;
            content: "1.13."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }


        .order-list-ourights {
            counter-reset: orders;
        }

        .order-list-ourights li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-ourights li::before {
            counter-increment: orders;
            content: "1.14."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-ourights-two {
            counter-reset: orders 1;
        }

        .order-list-ourights-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-ourights-two li::before {
            counter-increment: orders;
            content: "1.14."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }


        .order-list-duration {
            counter-reset: orders;
        }

        .order-list-duration li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-duration li::before {
            counter-increment: orders;
            content: "1.15."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-miscellaneous {
            counter-reset: orders;
        }

        .order-list-miscellaneous li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-miscellaneous li::before {
            counter-increment: orders;
            content: "1.16."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-governing {
            counter-reset: orders;
        }

        .order-list-governing li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-governing li::before {
            counter-increment: orders;
            content: "1.17."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-termcondition {
            counter-reset: orders 1;
        }

        .order-list-termcondition li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-termcondition li::before {
            counter-increment: orders;
            content: "2.3"counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }


        .order-two-disbursement-two {
            counter-reset: orders;
        }

        .order-two-disbursement-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .order-two-disbursement-two li::before {
            counter-increment: orders;
            content: "2.7"counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-disbursement-third {
            counter-reset: orders 1;
        }

        .order-two-disbursement-third li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .order-two-disbursement-third li::before {
            counter-increment: orders;
            content: "2.7."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-two-disbursementrights {
            counter-reset: orders 8;
        }

        .order-two-disbursementrights li {
            list-style-type: none;
            display: block;
            position: relative;
            /* margin-left: 10px; */

        }

        .order-two-disbursementrights li::before {
            counter-increment: orders;
            content: "2."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }



        .order-lists {
            counter-reset: orderss;
        }

        .order-lists li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 50px;

        }

        .order-lists li::before {
            counter-increment: orderss;
            content: "1.1.4."counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-lists-two {
            counter-reset: orderss;
        }

        .order-lists-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 50px;

        }

        .order-lists-two li::before {
            counter-increment: orderss;
            content: "1.1.5."counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-lists-third {
            counter-reset: orderss;
        }

        .order-lists-third li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 50px;

        }

        .order-lists-third li::before {
            counter-increment: orderss;
            content: "1.1.4"counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-rightsobligations {
            counter-reset: orderss;
        }

        .order-list-rightsobligations li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-rightsobligations li::before {
            counter-increment: orderss;
            content: "2.5."counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-rightsobligations-two {
            counter-reset: orderss 2;
        }

        .order-list-rightsobligations-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .order-list-rightsobligations-two li::before {
            counter-increment: orderss;
            content: "2.5."counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-transactionsfees-third {
            counter-reset: orderss 2;
        }

        .order-list-transactionsfees-third li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .order-list-transactionsfees-third li::before {
            counter-increment: orderss;
            content: "2.10."counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-suspensionInternet {
            counter-reset: orderss;
        }

        .order-list-suspensionInternet li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-suspensionInternet li::before {
            counter-increment: orderss;
            content: "2.10."counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-securityProtection {
            counter-reset: orderss;
        }

        .order-list-securityProtection li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-securityProtection li::before {
            counter-increment: orderss;
            content: "2.12."counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-securityProtection-two {
            counter-reset: orderss 1;
        }

        .order-list-securityProtection-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .order-list-securityProtection-two li::before {
            counter-increment: orderss;
            content: "2.12."counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-representations {
            counter-reset: orderss;
        }

        .order-list-representations li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-representations li::before {
            counter-increment: orderss;
            content: "2.12."counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-domicile {
            counter-reset: orderss;
        }

        .order-list-domicile li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-domicile li::before {
            counter-increment: orderss;
            content: "2.14."counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-confidentialy {
            counter-reset: orderss;
        }

        .order-list-confidentialy li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-confidentialy li::before {
            counter-increment: orderss;
            content: "2.15."counter(orderss) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }



        /* sub order */
        .sub-order-list-access {
            counter-reset: orders;
        }

        .sub-order-list-access li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-list-access li::before {
            counter-increment: orders;
            content: "1.5.5."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .sub-order-list-security {
            counter-reset: orders;
        }

        .sub-order-list-security li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-list-security li::before {
            counter-increment: orders;
            content: "1.8.2."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .sub-order-list-disclaimer-one {
            counter-reset: orders;
        }

        .sub-order-list-disclaimer-one li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-list-disclaimer-one li::before {
            counter-increment: orders;
            content: "1.11.1."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;


        }

        .sub-order-list-disclaimer-two {
            counter-reset: orders;
        }

        .sub-order-list-disclaimer-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-list-disclaimer-two li::before {
            counter-increment: orders;
            content: "1.11.3."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .sub-order-list-collection {
            counter-reset: orders;
        }

        .sub-order-list-collection li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-list-collection li::before {
            counter-increment: orders;
            content: "1.13.1."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .sub-order-list-ourights {
            counter-reset: orders;
        }

        .sub-order-list-ourights li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-list-ourights li::before {
            counter-increment: orders;
            content: "1.14.1."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .sub-order-two-chargebacks {
            counter-reset: orders;
        }

        .sub-order-two-chargebacks li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .sub-order-two-chargebacks li::before {
            counter-increment: orders;
            content: "2.6."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }


        .sub-order-two-implementation {
            counter-reset: orders;
        }

        .sub-order-two-implementation li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-two-implementation li::before {
            counter-increment: orders;
            content: "2.8."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .sub-order-two-implementation-two {
            counter-reset: orders 1;
        }

        .sub-order-two-implementation-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-two-implementation-two li::before {
            counter-increment: orders;
            content: "2.8."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .sub-order-two-systemchanges {
            counter-reset: orders 2;
        }

        .sub-order-two-systemchanges li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-two-systemchanges li::before {
            counter-increment: orders;
            content: "2.8."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }


        .sub-order-two-cashdeposit {
            counter-reset: orders 3;
        }

        .sub-order-two-cashdeposit li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-two-cashdeposit li::before {
            counter-increment: orders;
            content: "2.8."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .sub-order-two-disbursementrights {
            counter-reset: orders;
        }

        .sub-order-two-disbursementrights li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .sub-order-two-disbursementrights li::before {
            counter-increment: orders;
            content: "2.9."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .sub-order-ximplyrights {
            counter-reset: orders 2;
        }

        .sub-order-ximplyrights li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-ximplyrights li::before {
            counter-increment: orders;
            content: "2.9."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .sub-order-ximplyobligations {
            counter-reset: orders 3;
        }

        .sub-order-ximplyobligations li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .sub-order-ximplyobligations li::before {
            counter-increment: orders;
            content: "2.9."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }


        .order-list-registration {
            counter-reset: orders;
        }

        .order-list-registration li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 10px;

        }

        .order-list-registration li::before {
            counter-increment: orders;
            content: "2.4."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

        .order-list-registration-two {
            counter-reset: orders 1;
        }

        .order-list-registration-two li {
            list-style-type: none;
            display: block;
            position: relative;
            margin-left: 40px;

        }

        .order-list-registration-two li::before {
            counter-increment: orders;
            content: "2.4."counter(orders) " ";
            position: absolute;

            margin-right: 100%;
            right: 10px;
        }

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
            <div class="col-md-10">
                <div class="border-bottom py-3 text-center mb-4">
                    <h2 class="fw-bolder text-uppercase">XIMPLY PLATFORM TERMS OF</h2>
                </div>
                {{-- <h5 class="fw-bold mb-4">KETENTUAN PENGGUNAAN PLATFORM XIMPLY</h5> --}}

                <div>
                    <button onclick="topFunction()" id="myBtn" title="Go to top">
                        <i class="fa-solid fa-arrow-up d-flex align-items-center justify-content-center"></i>
                    </button>
                    <ol class="order">
                        <li class="fw-bold">General</li>

                        <ol class="order-list">

                            <li>These terms of use ("Terms of Use" or "Agreement") apply to your use of the Platform and
                                the Electronic Services (as defined below).</li>
                            <li>XIMPLY is an online service provider incorporated in Indonesia that provide platform for
                                business to track and manage earning and spending.</li>
                            <li>Payment service provided by XIMPLY in Indonesia can be accessed through the platform and
                                comply with XIMPLY agreement and rules.
                            </li>
                            <li>The terms: </li>
                            <ol class="order-lists">
                                <li>"Account" means Account of Platform User or XIMPLY Account according to context.
                                </li>
                                <li>"XIMPLY", "Company", "we", "our" or "us" means PT. Aplikasi Lintas Bangsa a private
                                    limited company incorporated in Singapore, and its successors and assigns.</li>
                                <li>"XIMPLY Group" means XIMPLY and its related entities, including any of XIMPLY’s
                                    subsidiaries, XIMPLY’s holding company and its subsidiaries (in each case
                                    wheresoever situated).</li>
                                <li>"Authorised User" means any person authorised by you from time to time to use the
                                    Electronic Services in relation to your Account.</li>
                                <li>"Content" refers to any information, images, links, sounds, graphics, videos,
                                    software, user interfaces, visual interfaces, computer code or other materials
                                    including quotes, news and research data that is available on the Platform.</li>
                                <li>"Electronic Instruction" means any instructions, communications, instructions,
                                    orders, messages, data, information or other materials from you or your Authorised
                                    Users in relation to the Electronic Services.</li>
                                <li>"Electronic Services" means the Partner Services and the XIMPLY Services.
                                </li>
                                <li>"Platform" means the electronic platform available at https://XIMPLYapp.com/ (or
                                    such sub-domain or additional or replacement website(s)) that allows you to use the
                                    Electronic Services, and includes any mobile or desktop application through which
                                    the Platform may be accessed.</li>
                                <li>
                                    "Platform User Account" means your user account registered with XIMPLY for the
                                    Electronic Services.
                                </li>

                            </ol>
                            <li>"Provider" means:</li>
                            <ol class="order-lists-two">
                                <li>The relevant Partner or any other person (individual or non-individual) which offers
                                    services and/or products, directly or indirectly, through the Platform;</li>
                                <li>Any person to whom we outsource certain functions or activities to allow us to
                                    operate and/or provide the Platform and relevant Electronic Services;</li>
                                <li>Any government, regulator, law enforcement agency, financial institution, and
                                    ancillary service provider (for example, telecommunication, internet access, cloud
                                    network, logistics, facilities management, data centres, system hosting, call
                                    centres, equipment and software providers), agent or subcontractor involved in the
                                    provision of relevant Electronic Services; and</li>
                                <li>Our agents or storage or archival service providers for the purpose of making,
                                    printing, recording, mailing, storage, and/or filing any documents or items on which
                                    such information appear.</li>
                                <li>"you" and "your" refer to you as the user of the Platform or the Electronic
                                    Services, and includes the company, organization, or any other form of entity in
                                    which name your Platform User Account is registered.</li>
                            </ol>



                        </ol>
                        <li class="fw-bold">License to use the Platform</li>
                        <ol class="order-list-license">
                            <li>Subject to the terms and conditions of this Agreement, you are hereby granted a
                                non-exclusive, limited, non-transferable, freely revocable license to use the Platform.
                                XIMPLY reserves all rights not expressly granted herein in the Platform. XIMPLY may
                                terminate this license at any time without assigning any reason.</li>
                            <li>Your Platform User Account gives you access to the Electronic Services and Platform
                                functionality that XIMPLY may establish and maintain from time to time and in our sole
                                discretion. XIMPLY may maintain different types of Platform User Accounts for different
                                types of users. The Electronic Services and Platform functionality available to you will
                                vary based on your Platform User Account type and how your Platform User Account is
                                configured by the account owners or admin (if applicable).</li>
                        </ol>
                        <li class="fw-bold">Acceptance of terms</li>
                        <ol class="order-list-acceptance">
                            <li>Your use of the Platform and Electronic Services is subject to terms of this Agreement.
                                You will be responsible for all transactions made by you or, from our view, authorized
                                by you or your Authorised User. By using the Platform and Electronic Services, you are
                                deemed to have accepted and agree to be bound by the terms of this Agreement. If you do
                                not agree to be bound by this Agreement, you should not access or use the Platform or
                                any of the Electronic Services.</li>
                            <li>We may amend, supplement and/or revise any part of this Agreement at any time with
                                notice, and such changes shall take effect on the date specified in the notice. Any such
                                notices and updated terms will be published on the Platform. If you do not agree to
                                changes made to this Agreement, you must notify us and discontinue your use of the
                                Platform and all Electronic Services. Your or your Authorised User’s use of the Platform
                                following changes to this Agreement will constitute your acceptance of those changes.
                            </li>
                            <li>
                                Certain Electronic Services are subject to additional terms and conditions as we (or,
                                where applicable, the relevant Partner) may prescribe and make available on the Platform
                                or otherwise notify you.
                            </li>
                            {{-- <li>
                                Jika XIMPLY menyediakan produk atau layanan kepada Anda di Platform selain Layanan
                                Teknologi, produk dan layanan tersebut dapat tunduk pada syarat dan ketentuan tambahan
                                yang mungkin kami tetapkan dan sediakan di Platform.
                            </li> --}}
                        </ol>
                        <li class="fw-bold">Your Authorised Users</li>
                        <ol class="order-list-authorised">
                            <li>You are responsible for ensuring that each of your Authorised Users is aware of and
                                complies with this Agreement, each other agreement which you may have with XIMPLY
                                relating to your or your Authorised Users’ use of the Platform and/or any Electronic
                                Services, and the Partner Terms.</li>
                            <li>If you have authorised any person to give Electronic Instructions on your behalf, you
                                will be responsible for their actions and/or omissions, including any liabilities and
                                losses arising from any payments or transactions initiated or effected from your Account
                                which they may undertake or authorise.</li>
                        </ol>
                        <li class="fw-bold">Access to the Platform</li>
                        <ol class="order-list-access">
                            <li>Access to the Platform and Electronic Services may be available through different
                                devices (for example, personal computers or mobile devices). The availability and
                                features of the Platform and Electronic Services may vary depending on the type, system
                                specifications and configuration of the device. </li>
                            <li>Your and your Authorised User’s access to the Platform and Electronic Services may be
                                limited and subject to the relevant laws and regulations of the country you or your
                                Authorised User is located in. XIMPLY will not be responsible for any fees, charges and
                                expenses such as data roaming charges or any other charges which may be imposed by your
                                telecommunication or other service providers in connection with the access and use of
                                the Platform and Electronic Services.</li>
                            <li>There may be circumstances where XIMPLY and/or the Partner may need to change the
                                frequency and manner of use of the Electronic Services, transaction limits, operating
                                hours and types of facilities and services. In certain situations, XIMPLY and/or the
                                Partner may have to suspend the Electronic Services without giving you or your
                                Authorised User prior notice. Under such circumstances, XIMPLY will not be responsible
                                for any inconvenience, loss, damage or injury suffered by you or any third party.</li>
                            <li>XIMPLY may introduce new or different forms of authentication service when you or your
                                Authorised User wish to access the Platform and use the Electronic Services. XIMPLY may
                                replace the authentication service from time to time without prior notice to you or your
                                Authorised User.</li>
                            <li>XIMPLY shall have the right to decline your or your Authorised User’s access to the
                                Platform and/or to act on any Electronic Instruction without incurring any
                                responsibility for loss, claim, liability, cost or expense arising out of so declining
                                to act if:</li>
                            <ol class="sub-order-list-access">
                                <li>the Electronic Instructions are unclear, incomplete or inconsistent with other
                                    instructions issued to us by you or your Authorised User;</li>
                                <li>the Electronic Instructions have lapsed, been rendered invalid due to failure to
                                    comply with applicable conditions or are cancelled by a regulatory or governmental
                                    body;
                                </li>
                                <li>
                                    the Electronic Instructions cannot be processed due to any disruptions that are
                                    beyond XIMPLY’s reasonable control;
                                </li>
                                <li>
                                    allowing you or your Authorised User access to the Platform or processing the
                                    Electronic Instructions might expose XIMPLY, any other member of the XIMPLY Group,
                                    any Partner, or any of XIMPLY’s affiliates to legal action or censure from any
                                    government, regulator or law enforcement agency, or result in XIMPLY, any other
                                    member of the XIMPLY Group, any Partner or any of XIMPLY’s affiliates being subject
                                    to regulations or licensing requirements; or
                                </li>
                                <li>
                                    you or your Authorised User have failed to comply with any term of this Agreement,
                                    any other Agreement which you or your Authorised User may have with XIMPLY, or any
                                    Partner Terms.
                                </li>
                            </ol>
                            <li>XIMPLY will treat all Electronic Instructions as final and unconditional when we receive
                                them through the Platform. This means XIMPLY shall be entitled (but not obliged) to
                                effect such Electronic Instructions without your further consent and notice to you.</li>
                        </ol>
                        <li class="fw-bold">Fees</li>
                        <ol class="order-list-fees">
                            <li>XIMPLY may charge fees for the Electronic Services (“Fees”). The Fees are as described
                                on the Platform. The Fees will be notified to you via the Platform, via an order form
                                when you subscribe for the Electronic Services, or as otherwise separately agreed with
                                you. The Fees may be subject to revision without prior notice to you or your Authorised
                                Users. Your or your Authorised User’s continued use of the Electronic Services after any
                                such revision constitutes your consent to the revised Fees.</li>
                            <li>The Fees will be deducted from your Account or be invoiced to you for settlement in
                                accordance with the terms specified on the Platform, your order form, or in the relevant
                                invoice. If you do not make payment of the Fees by the relevant due date, XIMPLY may
                                charge a late fee and interest on the overdue amount and be entitled to suspend your
                                access to the Platform or use of the Electronic Services until the overdue amount is
                                paid in full. </li>
                            <li>If any amount owed to XIMPLY is outstanding, you agree that such outstanding amount may
                                at XIMPLY’s discretion be deducted from your Account.</li>
                            <li>The Fees do not include goods and services, value-added, sales, use, or other similar
                                taxes or duties, and any such taxes shall be assumed and paid by you in addition to the
                                Fees, except those taxes based on the net income of XIMPLY.
                            </li>
                            <li>The Partner may separately charge you fees for the Partner Services it provides. You are
                                responsible to the Partner for the settlement of such fees.
                            </li>
                        </ol>
                        <li class="fw-bold">Access to Platform in your location</li>
                        <ol class="order-list-location">
                            <li>Nothing herein shall be construed as a representation by XIMPLY or any Partner that the
                                information and materials contained in or accessed through the Platform is appropriate
                                or available for use in the geographic area or jurisdiction you or your Authorised User
                                is located.</li>
                            {{--  --}}
                            <li>Accessing the Platform from territories where its contents are illegal or unlawful is
                                prohibited. If you or your Authorised User choose to access the Platform, you and your
                                Authorised User do so on your respective initiative and are responsible for compliance
                                with local laws.</li>

                        </ol>
                        <li class="fw-bold">Security of your Platform User Account</li>
                        <ol class="order-list-security">
                            <li>If you discover or suspect any unauthorised or erroneous transactions from or to your
                                Platform User Account, you must immediately contact us. Upon such discovery, you agree
                                to take such steps to protect your Platform User Account, including changing any
                                security codes, passwords to your email accounts and reporting such incidents to us
                                immediately.</li>
                            <li>Where XIMPLY is of the view that your Platform User Account and any associated security
                                codes might have been compromised, in order to protect your Platform User Account,
                                XIMPLY may:</li>
                            <ol class="sub-order-list-security">
                                <li>require that you and/or your Authorised Users identify yourselves by alternative
                                    means;</li>
                                <li>require any Electronic Instruction to be confirmed through alternative means; and/or
                                </li>
                                <li>refrain from acting promptly upon any Electronic Instructions in order to confirm
                                    any Electronic Instructions, your identity and/or the identity of your Authorised
                                    Users.</li>
                            </ol>
                            <li class="order-list-security-two">In such circumstances, your Electronic Instructions
                                might not be processed within expected periods and XIMPLY will not be responsible for
                                any inconvenience, loss, damage or injury suffered by you or any third party.</li>
                            <li>XIMPLY shall retain the discretion to decline providing you with any Electronic Services
                                where XIMPLY has reasons to believe that you or any of your Authorised Users do not
                                intend to use the Platform or Electronic Services responsibly.</li>
                        </ol>
                        <li class="fw-bold">Third party websites</li>
                        <ol class="order-list-thirdparty">
                            <li>The Platform may provide links to other websites and online resources that are owned or
                                operated by Partners or other third parties. Such linked websites are not under the
                                control of any member of the XIMPLY Group and the XIMPLY Group cannot accept
                                responsibility for the contents of or the consequences of accessing any linked website
                                or any link contained in a linked website. Furthermore, the hyperlinks provided on the
                                Platform shall not be considered or construed as an endorsement or verification of such
                                linked websites or the contents therein by any member of the XIMPLY Group. You agree
                                that your access to and/or use of such linked websites is entirely at your own risk and
                                subject to the applicable Partner Terms and such other terms and conditions of access
                                and/or use contained therein.</li>
                            <li>Save and except with XIMPLY’s prior written consent, you may not insert a hyperlink to
                                the Platform or any part thereof on any other website or "mirror" or frame the Platform,
                                any part thereof, or any information or materials contained on the Platform on any other
                                server, website or webpage.</li>
                        </ol>
                        <li class="fw-bold">Intellectual property</li>
                        <ol class="order-list-property">
                            <li>The Contents on the Platform may not be reproduced, transmitted, published, performed,
                                broadcast, stored, adapted, distributed, displayed, licensed, altered, hyperlinked or
                                otherwise used in whole or in part in any manner without the prior written consent of
                                XIMPLY.</li>
                            <li>All trade marks, service marks and logos used on the Platform are the property of the
                                XIMPLY Group and/or the respective third party proprietors identified on the Platform.
                                No licence or right is granted and your access to the Platform and/or use of the
                                services available thereon should not be construed as granting, by implication, estoppel
                                or otherwise, any license or right to use any trade marks, service marks or logos
                                appearing on the Platform without the prior written consent of the XIMPLY Group or the
                                relevant third party proprietor thereof. Save and except with the XIMPLY Group's prior
                                written consent, no such trade mark, service mark or logo may be used as a hyperlink or
                                to mark any hyperlink to any XIMPLY Group member's site or any other site.</li>
                        </ol>
                        <li class="fw-bold">Disclaimer</li>
                        <ol class="order-list-disclaimer">
                            <li>XIMPLY does not provide any warranty of any kind in respect of:</li>
                            <ol class="sub-order-list-disclaimer-one">
                                <li>the Electronic Services, including warranties of accessibility, quality, provision
                                    or performance of any goods or services;</li>
                                <li>any Content, including warranties of accuracy, adequacy, currency or reliability;
                                </li>
                                <li>hyperlinks on the Platform to any other websites or content, which are not an
                                    endorsement or verification of such websites or content; and</li>
                                <li>the Partner Services.</li>
                            </ol>
                            <li class="order-list-disclaimer-two">THE ELECTRONIC SERVICES, TO THE MAXIMUM EXTENT
                                PERMITTED BY APPLICABLE LAW, IS PROVIDED “AS IS” AND XIMPLY EXPRESSLY DISCLAIMS ALL
                                WARRANTIES OF ANY KIND, WHETHER EXPRESS, IMPLIED, STATUTORY OR OTHERWISE, INCLUDING
                                WITHOUT LIMITATION, ANY WARRANTY OF <b>MERCHANT</b> ABILITY, FITNESS FOR A PARTICULAR
                                PURPOSE, OR NON-INFRINGEMENT. XIMPLY MAKES NO REPRESENTATION, WARRANTY, OR GUARANTY THAT
                                THE ELECTRONIC SERVICES WILL OPERATE IN COMBINATION WITH YOUR HARDWARE, OTHER SOFTWARE,
                                THIRD PARTY SERVICES, OR CUSTOMER MATERIAL. XIMPLY makes reasonable efforts to ensure
                                the Electronic Services are free of viruses or other harmful components, but cannot
                                guarantee that the Electronic Services will be free from unknown viruses or harmful
                                components. XIMPLY cannot guarantee that the Electronic Services will not incur delays,
                                interruptions, or other errors that are outside of XIMPLY’s reasonable control and are
                                inherent with the use of the internet and electronic communications.</li>
                            <li>You acknowledge and agree that XIMPLY will not be liable to you or any of your
                                Authorised Users for any loss, damage, cost or expense incurred or suffered in
                                connection with:</li>
                            <ol class="sub-order-list-disclaimer-two">
                                <li>the Platform or any Electronic Services not being available due to system or server
                                    maintenance or failure, the breakdown/non-availability of any network, any computer
                                    virus or malicious code, or any transmission interruption or failure;</li>
                                <li>the non-delivery, delayed delivery, misdirected delivery or the non-receipt of any
                                    Electronic Services;</li>
                                <li>any non-processing or delay in processing of Electronic Instructions by us or by any
                                    Provider through whom your Electronic Instructions are transacted;</li>
                                <li>any transaction or Electronic Instruction initiated by you or your Authorised User
                                    being declined by any bank, financial institution, payment intermediary or other
                                    service provider;</li>
                                <li>inaccurate or incomplete Content, reliance on or use of the information provided on
                                    any channel and medium for any purpose;</li>
                                <li>any disclosure of any information which you have consented to us collecting, using
                                    or disclosing or where such collection, use or disclosure is allowed under
                                    applicable laws;</li>
                                <li>any unauthorised and/or unlawful access to our machines, data processing system or
                                    transmission link;</li>
                                <li>any act of force majeure such as acts of God, war or warlike hostilities, civil
                                    commotions, riots, blockades, embargoes, sabotage, strikes, lock-outs, fire, flood,
                                    shortage of material or labour, power failures, delay in deliveries from
                                    sub-contractors; or</li>
                                <li>any event outside our control.</li>
                            </ol>
                            <li class="order-list-disclaimer-third">Any claims against or disputes that you may have
                                with a Provider are to be settled between you and the relevant Provider. You agree that
                                you will not claim against us or any member of the XIMPLY Group in this respect.</li>
                            <li>In no event shall XIMPLY or any other member of the XIMPLY Group be liable to you or any
                                other party for any indirect, special, incidental or consequential damages, loss of
                                profits or loss opportunity arising out of or in connection with your use of the
                                Platform or any Electronic Service even if we had been advised as to the possibility of
                                such damages or losses.</li>
                        </ol>
                        <li class="fw-bold">Our Records</li>
                        <ol class="order-list-disclaimer-records">
                            <li>Our records of Electronic Instructions and Electronic Services operations maintained by
                                us or by any relevant person authorised by us shall be binding and conclusive on you for
                                all purposes whatsoever. </li>
                            <li>When we deal with you, we will treat all such records as final evidence and you shall
                                not challenge or dispute the admissibility, reliability, accuracy or the authenticity of
                                the contents of such records merely on the basis that such records were incorporated
                                and/or set out in electronic form or are produced by or were the output of a computer
                                system. You hereby agree to waive any of your rights (if any) to so object. This
                                provision shall also apply to all records maintained by a Provider appointed or
                                designated by us.</li>
                        </ol>
                        <li class="fw-bold">Collection and use of personal information</li>
                        <ol class="order-list-collection">
                            <li>You and each of your Authorised Users agree that any information provided to us may be
                                disclosed to and used by the following parties:</li>
                            <ol class="sub-order-list-collection">
                                <li>credit bureaus and similar institutions to report or ask about your financial
                                    circumstances, and to report or collect debts you owe;</li>
                                <li>regulatory authorities, courts, and governmental agencies to comply with legal
                                    orders, legal or regulatory requirements, and government requests;</li>
                                <li>our service providers, affiliates, payment intermediaries, regulatory authorities
                                    and governmental agencies to detect and prevent fraud and any other criminal
                                    activity, and to protect XIMPLY and its affiliates against such fraudulent or
                                    criminal activity;</li>
                                <li>our affiliates and other members of the XIMPLY Group for marketing and risk
                                    management;</li>
                                <li>our service providers who perform services for us and help us operate our business
                                    and the Platform (including but not limited to cybersecurity, human resources, IT
                                    support and audit services); </li>
                                <li>any Partner or Provider in order to allow you and your Authorised Users to access
                                    the Partner Services or such other services and/or products that may be made
                                    available on the Platform; and</li>
                                <li>banks, financial institutions, payment intermediaries or other partners with whom we
                                    may jointly offer or develop products and services (but they may not use your
                                    personal data, in particular your email address, to independently market their own
                                    products or services to you unless you consent that they can do so); and/or</li>
                                <li>to our professional advisors (including our lawyers) to protect and advance our
                                    rights.</li>
                            </ol>
                            <li class="order-list-collection-two">Without limiting the foregoing, you agree that we may
                                transfer your and your Authorised Users’ data to any Partner, Provider, payment
                                intermediary, and company within the XIMPLY Group for the purposes of processing
                                Electronic Instructions and your transactions and to provide you with the Electronic
                                Services (for example, we will share information about you and your transactions with
                                the relevant book-keeping service provider if you opt to use the book-keeping
                                integration function available on the Platform). Regardless of where we process your
                                information, we will store and protect it in accordance with applicable laws.</li>
                        </ol>
                        <li class="fw-bold">Our rights</li>
                        <ol class="order-list-ourights">
                            <li>If XIMPLY, in its sole discretion, believes that you or your Authorised Users may have
                                breached any provision of this Agreement or any applicable Partner Terms, we may act to
                                protect ourselves, other users of the Platform, our Partner(s) and third parties. The
                                action XIMPLY may take includes but is not limited to:</li>
                            <ol class="sub-order-list-ourights">
                                <li>closing, suspending, or limiting your and/or your Authorised Users’ access to your
                                    Platform User Account;</li>
                                <li>contacting any person who may have transacted with you;</li>
                                <li>warning other customers of XIMPLY, law enforcement agencies, or impacted third
                                    parties of your and/or your Authorised Users’ actions;</li>
                                <li>updating inaccurate information you and/or your Authorised Users have provided to
                                    XIMPLY;
                                </li>
                                <li>taking legal action against you and/or your Authorised Users;</li>
                                <li>terminating this Agreement;</li>
                                <li>terminating or revoking access to any other product offered to you by XIMPLY through
                                    or in connection with your use of the Platform;</li>
                                <li>fully or partially reversing a transaction carried out using the Platform; and/or
                                </li>
                                <li>blocking your and/or your Authorised Users’ access to the Platform temporarily or
                                    permanently.</li>

                            </ol>
                            <li class="order-list-ourights-two">Where possible, XIMPLY will provide you with the
                                relevant information regarding the actions imposed, but we may be unable to do so in
                                accordance with the appropriate law including avoiding disclosing protected third party
                                information or interfering in the course of an investigation.</li>
                        </ol>
                        <li class="fw-bold">Duration of terms</li>
                        <ol class="order-list-duration">
                            <li>This Agreement shall remain in force until your Platform User Account is terminated.
                                XIMPLY may, at any time and without giving any reason or notice, terminate your access
                                to or use of the Platform (whereupon your Authorised Users will cease to have access to
                                the Platform) and/or any of the Electronic Services.</li>
                            <li>If we terminate your access to the Platform and/or any of the Electronic Services you
                                will not have the right to bring claims against us, any other member of the XIMPLY Group
                                or our affiliates with respect to such termination. The XIMPLY Group shall not be liable
                                to you for any losses, costs, claims, expenses, fees or damages suffered or incurred in
                                connection with any such termination.</li>
                            <li>Upon termination of this Agreement, you shall settle all outstanding Fees, charges and
                                interest in full.</li>
                        </ol>
                        <li class="fw-bold">Miscellaneous</li>
                        <ol class="order-list-miscellaneous">
                            <li>Neither you nor any of your Authorised Users may assign or transfer any of your rights
                                and obligations, whether in whole or in part, to any party without XIMPLY’s prior
                                written consent. </li>
                            <li>All rights of XIMPLY and members of the XIMPLY Group under this Agreement may be
                                assigned and/or transferred at its discretion without your or your Authorised User’s
                                consent. </li>
                            <li>The illegality, invalidity or unenforceability of any provision of this Agreement under
                                the law of any jurisdiction shall not affect its legality, validity or enforceability
                                under the law of any other jurisdiction. If any one or more of the provisions contained
                                in this Agreement shall be deemed invalid, unlawful or unenforceable in any respect
                                under any applicable law, the validity, legality and enforceability of the remaining
                                provisions contained herein shall not in any way be affected or impaired.</li>
                            <li>No failure on the part of XIMPLY or any other member of the XIMPLY Group to exercise,
                                and no delay on its part in exercising, any right or remedy under this Agreement will
                                operate as a waiver thereof nor will any single or partial exercise of any right or
                                remedy preclude any other or further exercise thereof or the exercise of any other right
                                or remedy. The rights and remedies provided in this Agreement are cumulative and not
                                exclusive of any rights or remedies provided by law.</li>
                        </ol>
                        <li class="fw-bold">Governing law and jurisdiction / Rights of third parties</li>
                        <ol class="order-list-governing">
                            <li>This Agreement is governed by and construed in accordance with Singapore law. </li>
                            <li>You agree that the courts of Singapore will have non-exclusive jurisdiction over any
                                claim or dispute arising under or in connection with this Agreement.</li>

                        </ol>

                    </ol>
                    <ol class="order-two">
                        <h5 class="fw-bold my-5 text-center">XIMPLY PLATFORM USE TERMS</h5>
                        <li class="fw-bold order-list-termcondition">TERMS AND CONDITIONS OF XIMPLY PAYMENT SYSTEM</li>
                        <p>The user is requested to read, learn, understand the terms and conditions that apply in this
                            website and if the user agrees, then the user is expected to comply with all the terms and
                            conditions that have been arranged in this XIMPLY website and automatically the user is
                            considered to be ready to bind themselves and These terms and conditions are considered a
                            form of Agreement between PT. XIMPLY Indonesian Technology. In the event that the User does
                            not agree to the terms and conditions that apply, the User can stop using the site and the
                            services on this website. Users in this case are any person and/or business entity which in
                            this case can be referred to as "User" and/or <b>"MERCHANT"</b> and legally protected
                            through the Law of the Republic of Indonesia No.11 of 2008 concerning Information and
                            Technology, Law Law of the Republic of Indonesia No. 19 of 2002 concerning Copyright, and
                            against all forms of engagement arising from all activities on the www.XIMPLY.io website and
                            having fulfilled the rules and requirements for the validity of an engagement as stated in
                            the Indonesian Civil Code. Customers are legal subjects who carry out purchasing activities
                            (hereinafter referred to as "Transactions") of goods and/or services (hereinafter referred
                            to as "Products") on the website owned by the User/<b>MERCHANT</b> .</p>
                        <li class="fw-bold">INTRODUCTION</li>
                        <ol class="order-list-introduction">
                            <li>In this Agreement the User is an individual legal subject, and/or legal entity, whether
                                Indonesian citizen, foreign citizen, who has the ability to use computers, computer
                                networks and/or other electronic media and has registered on the XIMPLY Website.</li>
                            <li>Users understand and know consciously that XIMPLY can change the terms and conditions on
                                this website at any time and will include the latest version on the XIMPLY Website.
                                Users are required to read these terms and conditions periodically so that Users are
                                deemed to have known and understood all forms of changes displayed on the XIMPLY
                                Website.</li>
                        </ol>
                        <li class="fw-bold">DEFINITIONS, INTERPRETATION AND APPENDIX</li>
                        <ol class="order-list-definition">
                            <li>Unless stated otherwise in this Agreement, the following terms have the following
                                meanings:</li>
                        </ol>
                    </ol>
                    <ul style="margin-left:60px">
                        <li><b>Fees</b> are expenses charged to <b>MERCHANT</b> and paid to <b>XIMPLY</b>.</li>
                        <li><b>Cash Deposit</b> is an amount of funds deposited by <b>MERCHANT</b> into an account on
                            behalf of <b>XIMPLY</b> at a bank designated by <b>XIMPLY</b>, where the funds do not
                            generate interest and are used by <b>XIMPLY</b> to carry out Settlements for the use of
                            <b>XIMPLY SERVICES</b> Services by <b>MERCHANTS</b> ;
                        </li>
                        <li><b>Calendar Day</b> is Monday to Sunday according to the calendar.</li>
                        <li><b>Working Days</b> are Monday to Friday and days which include holidays based on a
                            stipulation from the Government of the Republic of Indonesia;</li>
                        <li><b>Money Transfer Instructions</b> are instructions in electronic form sent by
                            <b>MERCHANT</b> to <b>XIMPLY</b>, which contain instructions to <b>XIMPLY</b> to make Money
                            Transfers to Money Recipient Accounts, where the instructions contain data and information
                            and in the format specified by <b>XIMPLY</b> in the SPP;
                        </li>
                        <li><b>XIMPLY SERVICES</b> <i>(Disbursement)</i> service is a Money Transfer service provided by
                            <b>XIMPLY</b> for <b>MERCHANTS</b> for the purpose of Sending Money from <b>XIMPLY</b> Money
                            Senders to one or more Money Recipient Accounts carried out in accordance with the
                            provisions of this Agreement, which includes but is not limited to authentication services,
                            receipt, processing of Money Transfer Instructions, operation, control, supervision and
                            monitoring of Money Transfer;
                        </li>
                        <li><b>Money Recipient</b> is the party mentioned in the Money Transfer Instructions to receive
                            Money Transfers from Money Senders;</li>
                        <li><b>Money Sending XIMPLY</b> means <b>MERCHANT</b> directly performs Money Transfer with the
                            aim of Recipient of Money;</li>
                        <li><b>Money Transfer</b> is an activity of sending a sum of money by a Money Sender through a
                            <b>MERCHANT</b> with the aim of Receiving Money and served by a <b>MERCHANT</b> by utilizing
                            the <b>XIMPLY SERVICES</b> Service provided by <b>XIMPLY</b> in accordance with the
                            provisions of this Agreement;
                        </li>
                        <li><b>XIMPLY facilities</b> are any tools, devices, computer systems and other facilities,
                            which include software, hardware, infrastructure and network devices, used by <b>XIMPLY</b>
                            in the context of providing and providing <b>XIMPLY Services</b> electronically in this
                            Agreement;</li>
                        <li><b>MERCHANT</b>facilities are any tools, devices, computer systems and other facilities,
                            which include software, hardware, infrastructure and network devices, used by <b>XIMPLY</b>
                            in the context of providing and providing <b>XIMPLY</b> Services electronically in this
                            Agreement;</li>
                        <li><b>Money Sender</b> is the party specified in the Money Transfer Instructions to receive
                            Money Transfers from;</li>
                        <li><b>Service Level</b> is service and performance standards related to the implementation of
                            cooperation in this Agreement which must be met by each Party as further regulated in the
                            SPP;</li>
                        <li><b>Settlement</b> is the process and implementation of the settlement of rights and
                            obligations between the Parties in connection with the implementation of <b>XIMPLY
                                Services</b> ;</li>
                        <li><b>Standar Prosedur Pengoperasian</b> (or abbreviated <b>SPP</b>) means the rules,
                            conditions, technical instructions and standard procedures related to the provision and
                            operation of <b>XIMPLY Services</b> which are prepared and determined by <b>XIMPLY</b> and
                            approved by <b>MERCHANT</b>, along with any updates, changes and adjustments made enforced
                            by <b>XIMPLY</b>. </li>
                    </ul>
                    <ol class="order-list-interpretation" style="margin-left: 30px">
                        <li class="order-list-interpretation">Interpretation. The Parties agree that in this Agreement:
                        </li>
                    </ol>
                    <ul style="margin-left:60px">
                        <li><b>The title of an article or paragraph is inserted only to provide easy reference and does
                                not affect the interpretation of the paragraph or article concerned;</b> </li>
                        <li><b>References to articles and paragraphs must be interpreted as references to the Articles
                                and Paragraphs of this Agreement;</b> </li>
                        <li>Words that show plural words, unless the context determines otherwise, are included in the
                            singular and vice versa;</li>
                        <li><b>References to parties must also be interpreted as references to individuals, firms,
                                companies, business entities, regulatory agencies, government agencies, civil
                                partnerships, or other legal entities as determined in the context;</b></li>
                        <li>Other terms that are used in this Agreement but are not defined in Paragraph 1 of this
                            Article, then the definition refers to the definition of the term concerned as regulated in
                            the SPP; and</li>
                        <li>Reference to SPP means reference to the latest edition of SPP or its amendments determined
                            by XIMPLY and approved by <b>MERCHANT</b> during the validity period of this Agreement.</li>
                    </ul>
                    <ol class="order-third">
                        <li class="fw-bold">REGISTRATION PROCESS AND MERCHANT REQUIREMENTS</li>
                        <ol class="order-list-registration">
                            <li>The <b>MERCHANT</b> must complete the administrative requirements (valid official
                                documents) in the form of:</li>
                        </ol>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>Kartu Tanda Penduduk (KTP)</li>
                        <li>Surat Ijin Usaha Perdangangan (SIUP)</li>
                        <li>Tanda Daftar Perusahaan (TDP)</li>
                        <li>Surat Keterangan Domisili (SK Domisli)</li>
                        <li>Nomor Pokok Wajib Pajak (NPWP)</li>
                        <li>Akta Pendirian & Perubahan</li>
                        <li>Surat keputusan menteri </li>
                        <li>Surat sewa lokasi</li>
                        <li>Location Photo</li>
                        <li>Cooperation Agreement (XIMPLY)</li>
                    </ul>
                    <ol class="order-list-registration-two">
                        <li><b>PAYMENT GATEWAY</b> have the right to refuse to serve <b>MERCHANTS</b> if the
                            <b>MERCHANT</b> is included in the Daftar Hitam atau Daftar Alert <b>MERCHANT</b> Asosiasi
                            Kartu Kredit Indonesia (AKKI), Bank Indonesia, or PRINCIPAL.
                        </li>
                        <li><b>MERCHANT</b> will not sell goods or services that violate laws/regulations/public order;
                            or goods or services specifically prohibited by the PAYMENT GATEWAY, BANK or SERVICE
                            PROVIDER, such as sharp weapons and/or fire, pornographic material, goods or services that
                            violate the provisions of Intellectual Property Rights (IPR); and others.</li>
                        <li>The <b>MERCHANT</b> must provide written notification to PAYMENT GATEWAY if the MERCHANT
                            changes the type of business and/or the type of goods or services offered through the
                            MERCHANT’S website or changes in the composition of ownership and/or directors on the
                            MERCHANT’S side, at least 14 (fourteen) WORKING DAYS before the change it is done.</li>
                        <li>If requested by the BANK or PRINCIPAL, PAYMENT GATEWAY can make a visit to the
                            <b>MERCHANT</b>, with prior notification, to do the following:
                        </li>

                    </ol>
                    <ul style="margin-left: 60px">
                        <li>Checking <b>MERCHANT'S</b> operational activities.</li>
                        <li>Checking the state of the <b>MERCHANT'S</b> business.</li>
                        <li>Checking <b>MERCHANT</b> security conditions in relation to INTERNET TRANSACTION, CARD and
                            CUSTOMER data</li>
                        <li>Or other matters deemed necessary by the BANK or PRINCIPAL</li>
                    </ul>
                    <ol class="order-two-rights">
                        <li class="fw-bold">RIGHTS AND OBLIGATIONS</li>
                        <ol class="order-list-rightsobligations">
                            <li><b>PAYMENT GATEWAY</b> has the right to receive payment of TRANSACTION FEE for each
                                successful INTERNET and CARD TRANSACTION, with the calculation to be regulated in the
                                agreement.</li>
                            <li><b>PAYMENT GATEWAY</b> is obligated to:</li>
                        </ol>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>Manage and maintain the INTERNET PAYMENT SYSTEM to keep it smooth and operational (KTP)</li>
                        <li>Provide data reconciliation of INTERNET TRANSACTIONS and CARD for <b>MERCHANTS</b></li>
                        <li>Provide information to the <b>MERCHANT</b> about the status of INTERNET TRANSACTIONS and
                            CARD</li>
                        <li>Maintain the confidentiality of data or information on INTERNET TRANSACTIONS and CARD</li>
                        <li>Provide technical or operational support to <b>MERCHANT</b> when necessary</li>
                        <li>Prepare Standard Operating Procedures (Standard Operating Procedures) for the operational
                            needs of INTERNET PAYMENT SYSTEM services between <b>MERCHANTS</b> and PAYMENT GATEWAY</li>
                        <li>Maintain and support <b>MERCHANTS</b> so that the FRAUD TO SALES RATIO for CARD TRANSACTIONS
                            is at a level in accordance with the provisions of the BANK.</li>
                    </ul>

                    <ol class="order-list-rightsobligations-two">
                        <li><b>MERCHANT</b> has the right to receive information on the status of INTERNET TRANSACTIONS
                            and CARD and to receive education regarding the operation of the INTERNET PAYMENT SYSTEM
                            service.</li>
                        <li>The <b>MERCHANT</b> is obligated to:</li>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>Make payments to the PAYMENT GATEWAY for the TRANSACTION FEE as stipulated in the Agreement
                        </li>
                        <li>Maintain the confidentiality of data or information on INTERNET TRANSACTIONS and CARD</li>
                        <li>Displays transaction conditions as a guide for CUSTOMERS</li>
                        <li>Keep evidence of INTERNET and CARD TRANSACTIONS for at least 24 (twenty four) months after
                            the date of the INTERNET and CARD TRANSACTIONS</li>
                        <li>Has a refund policy for INTERNET TRANSACTIONS and CARD or REFUND</li>
                        <li>Have a FRAUD detection or prevention system, whether owned by a <b>MERCHANT</b>, PAYMENT
                            GATEWAY or PRINCIPAL, especially for CARD TRANSACTIONS</li>
                        <li>Maintain and support PAYMENT GATEWAY so that the FRAUD TO SALES RATIO for CARD TRANSACTIONS
                            is at the level according to the provisions of the BANK.</li>
                    </ul>
                    <ol class="order-two-chargebacks">
                        <li class="fw-bold">CHARGEBACKS and REFUNDS</li>
                        <ol class="sub-order-two-chargebacks">
                            <li>PAYMENT GATEWAY will not charge extra for CHARGEBACK or REFUND.</li>
                            <li>In the event of a CHARGEBACK, the MERCHANT is required to pay back the CHARGEBACK bill
                                to the BANK.</li>
                            <li>Especially for CHARGEBACK, with the reason that the CARD TRANSACTION is denied by the
                                CUSTOMER due to FRAUD, the <b>MERCHANT</b> will be exempt from the CHARGEBACK bill if
                                the CARD TRANSACTION concerned has been protected with 3D-SECURE services.</li>
                            <li><b>MERCHANT</b> must have REFUND policy.</li>
                            <li>Especially for CARD TRANSACTIONS, <b>MERCHANTS</b> are prohibited from making REFUNDS in
                                cash directly to CUSTOMERS. REFUND CARD TRANSACTIONS must be made through PAYMENT
                                GATEWAY or BANK.</li>
                            <li>For each REFUND or CHARGEBACK, the <b>MERCHANT</b> will deduct funds in the amount of
                                the CARD TRANSACTION associated with the REFUND or CHARGEBACK from the INTERNET
                                TRANSACTION value funds disbursed to the <b>MERCHANT</b>.</li>

                        </ol>
                    </ol>
                    <ol class="order-two-disbursement">
                        <li class="fw-bold">DISBURSEMENT SCOPE OF AGREEMENT</li>
                    </ol>
                    <ol class="order-two-disbursement-two">
                        <li>The Parties agree that the scope of this Agreement is as follows:</li>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li><b>XIMPLY</b> agrees to provide and give XIMPLY Services for <b>MERCHANTS</b>, which include
                            in essence the following:</li>
                        <li>Connection to the XIMPLY system for <b>MERCHANTS</b> so that <b>MERCHANTS</b> can serve and
                            facilitate Money Transfers to Money Recipients;</li>
                        <li>Registration of XIMPLY Money Senders and Money Recipients in accordance with the data and
                            information sent by <b>MERCHANT</b> to XIMPLY;</li>
                        <li>According to the data and information in the Money Transfer Instruction sent by
                            <b>MERCHANT</b>, XIMPLY will carry out an authentication process to determine acceptance or
                            rejection of the Money Transfer Instruction. The authentication process includes
                            verification of the Money Recipient's data and information by comparing it with the data and
                            information available at the destination bank;
                        </li>
                        <li>Process Money Transfers against Money Transfer Instructions that have gone through the
                            process of authentication and acceptance, with XIMPLY making real-time credits to the Money
                            Recipient's account; and</li>
                        <li>Carry out settlement of <b>MERCHANT'S</b> obligations by debiting Cash Deposits and
                            crediting to commercial banks, people's credit banks or financial institutions managing
                            Recipient's accounts.</li>
                        <li><b>MERCHANT agrees to use the XIMPLY Service provided by XIMPLY to serve Money Transfers
                                from the MERCHANT to the Recipient, with the following conditions:</b></li>
                        <li><b>MERCHANTS</b>agree to prioritize the use of XIMPLY Services as long as the Money
                            Recipient is included in the ATM Bersama Network;</li>
                        <li><b>MERCHANTS</b> only use the XIMPLY Service for Remittances to Money Recipients who have
                            been registered and meet the provisions regarding the anti-money laundering program and the
                            prevention of terrorism financing, including but not limited to the provisions concerning
                            Knowing Your Customer (KYC) as required and determined by laws and regulations valid
                            invitation; and</li>
                        <li><b>MERCHANT</b> only uses XIMPLY Services to facilitate one or several purposes .</li>
                    </ul>
                    <ol class="order-two-disbursement-third">
                        <li>The Parties agree at all times to comply with and pay attention to all regulations,
                            circulars, technical instructions, policies, standard operating procedures or other
                            provisions stipulated by a government agency, regulatory agency, competent authority or
                            other government institution authorized to regulate, supervise and control the
                            implementation Remittance in this Agreement.</li>
                    </ol>

                    <ol class="order-two-implementation">
                        <li class="fw-bold">IMPLEMENTATION AND OPERATIONAL DISBURSEMENT</li>
                    </ol>
                    <ol class="sub-order-two-implementation">
                        <li>Standard Operating Procedures</li>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>XIMPLY will provide <b>MERCHANT</b> with 1 (one) set of documentation which includes SPP,
                            technical specifications and a complete technical documentation system including revisions
                            if there are changes.</li>
                        <li>SPP can be renewed, adjusted and changed by XIMPLY anytime concerning (i) the technical
                            implementation of this Agreement, (ii) to comply with applicable laws and regulations, or
                            (iii) to increase the security or reliability of the XIMPLY Service system organized by
                            XIMPLY, with written notification to the <b>MERCHANT</b> at least 30 (thirty) Calendar Days
                            before the effective date.</li>
                        <li>The <b>MERCHANT</b> promises to always obey and follow every rule, provision and procedure
                            set forth in the SPP including any updates, adjustments or changes in the future.</li>
                    </ul>
                    <ol class="sub-order-two-implementation-two">
                        <li class="">Cooperation Implementation</li>
                        <p style="margin-left:40px">Immediately after signing this Agreement, the Parties are required
                            to jointly carry out the implementation process related to the XIMPLY Service in accordance
                            with the guidelines and directions provided by XIMPLY and the details of the activities as
                            stated in the SPP, which includes but is not limited to:</p>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li><b>MERCHANT</b> develops the <b>MERCHANT</b> system and facilities so that it can be
                            connected to the XIMPLY System, securely through an appropriate data communication network;
                        </li>
                        <li>Implementation of the DISBURSEMENT Feature to be used by <b>MERCHANTS</b> in the context of
                            using the XIMPLY Service;</li>
                        <li>Depositing Cash Deposit by <b>MERCHANT</b>;</li>
                        <li>Dissemination of procedures for using the DISBURSEMENT Feature to <b>MERCHANTS</b>; and</li>
                        <li>Implementation of various tests of processes and systems to ensure operational readiness for
                            <b>MERCHANT</b> use of XIMPLY Services.
                        </li>
                    </ul>
                    <ol class="sub-order-two-systemchanges">
                        <li>System Changes</li>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>In the case of an upgrade or enhancement to the XIMPLY Facility by XIMPLY which requires the
                            <b>MERCHANT</b> to change or upgrade or enhance the <b>MERCHANT</b> Facility, either the
                            back-end system or the software significantly, then the change must be carried out at an
                            agreed time by the Parties and at the <b>MERCHANT'S</b> own expense.
                        </li>
                        <li>If there is a system disturbance at <b>MERCHANT</b> which affects the XIMPLY Network, then
                            XIMPLY has the right to stop processing Money Transfer Instructions received from
                            <b>MERCHANT</b> and then <b>MERCHANT</b> will carry out the necessary investigations and
                            repairs in accordance with directions from XIMPLY to find a solution to the system
                            disturbance.
                        </li>
                        <li>Damage to the XIMPLY Network caused by negligence and/or inappropriate use by the
                            <b>MERCHANT</b> becomes the responsibility of the <b>MERCHANT</b> so that costs and losses
                            arising from this become the responsibility of the <b>MERCHANT</b>.
                        </li>
                    </ul>
                    <ol class="sub-order-two-cashdeposit">
                        <li>CASH DEPOSIT</li>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>For operational implementation of the use of XIMPLY Services, <b>MERCHANTS</b> are required
                            to deposit Cash Deposits into a virtual account opened by XIMPLY for <b>MERCHANTS</b> at a
                            commercial bank specified by XIMPLY. The Cash Deposit does not generate interest.</li>
                        <li>XIMPLY has the right to use Cash Deposits to guarantee Money Transfers by <b>MERCHANT</b> by
                            using XIMPLY Services and for carrying out Settlement of <b>MERCHANT'S</b> obligations in
                            this Agreement.</li>
                        <li>If the Agreement ends for any reason, then the Cash Deposit will be disbursed by XIMPLY with
                            the condition that the remaining Cash Deposit will be returned to the <b>MERCHANT</b> after
                            deducting the obligations that have not been carried out by <b>MERCHANT</b> to XIMPLY
                            including the Settlement obligations under this Agreement. If the Cash Deposit is
                            insufficient to settle the outstanding obligations, then the <b>MERCHANT</b> is obliged to
                            pay the amount that is not covered by the Cash Deposit, when requested in writing by XIMPLY.
                        </li>
                    </ul>
                    <ol class="order-two-disbursementrights">
                        <li class="fw-bold">DISBURSEMENT OF RIGHTS AND OBLIGATIONS</li>
                        <p style="">Without prejudice to the rights and obligations of each Party specified in
                            other articles in this Agreement, each Party has the following rights and obligations:</p>
                        <ol class="sub-order-two-disbursementrights">
                            <li><b>MERCHANTS</b> are entitled to:</li>
                            <p style="margin-left: 10px">As long as the <b>MERCHANT</b> fulfils its obligations in this
                                Agreement and does not violate a provision in this Agreement, <b>MERCHANT</b> has the
                                right to use and utilize the XIMPLY Services provided by XIMPLY.</p>
                            <li><b>MERCHANTS</b> obligations:</li>
                        </ol>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>at the expense of the <b>MERCHANT</b> provide, develop, operate, and maintain the
                            <b>MERCHANT'S</b> Facilities so that they are always in operational condition and good
                            performance for the smooth operation of the XIMPLY Services, in the event of disruption
                            and/or damage to the <b>MERCHANT'S</b> Facilities, the <b>MERCHANT</b> is obliged to
                            immediately notify XIMPLY and repair the disturbance and/or damage using their best efforts;
                        </li>
                        <li>monitor, control, and be responsible for maintaining the security of every access and
                            operational security of every part of the <b>MERCHANT'S</b> Facilities;</li>
                        <li>monitoring the adequacy of funds in Cash Deposits and making deposits into Cash Deposits in
                            accordance with the provisions in Paragraph 4 Article 3 letter b of this Agreement;</li>
                        <li>create, implement, and supervise control systems and inspections as necessary to maintain
                            the confidentiality and security of access related to the use of XIMPLY Services;</li>
                        <li>formulate, implement and implement anti-money laundering and prevention of terrorism
                            financing programs, which include but are not limited to the principles of knowing your
                            customer (KYC), as required, determined and regulated in the applicable laws and
                            regulations;</li>
                        <li>promote and socialize XIMPLY Services while still paying attention to and complying with the
                            provisions regarding the creation, use and placement of the XIMPLY logo and trademark, which
                            provisions are regulated in the SPP;</li>
                        <li>be responsible and compensate losses suffered by XIMPLY which are proven to be the result of
                            acts of fraud (violations of XIMPLY Services either due to negligence and/or intent),
                            committed by the <b>MERCHANT</b>;</li>
                        <li>orderly keep all records regarding XIMPLY Services and must maintain and store these records
                            in its custody for 10 years, and must provide and submit all such records to XIMPLY when
                            needed;</li>
                        <li>pay the Transaction Fees to XIMPLY and other fees.</li>
                        <li>inform every XIMPLY who is affiliated with <b>MERCHANT</b> and uses XIMPLY Service, which is
                            further regulated in SPP.</li>
                        <li>The <b>MERCHANT</b> is obliged to provide XIMPLY with information related to the fees
                            charged to XIMPLY <b>MERCHANTS</b>.</li>
                        <li>upon request from XIMPLY, provide XIMPLY with information and assistance needed to implement
                            this Agreement and to implement laws and regulations, without prejudice to the principle of
                            confidentiality of Confidential Information as specified in the Error! Reference source not
                            found. This agreement; and</li>
                        <li>submit to XIMPLY all information and assistance needed by XIMPLY to implement anti-money
                            laundering and prevention of terrorism financing programs or other legally required matters
                            related to XIMPLY's role as a Money Transfer Provider, without prejudice to the principle of
                            confidentiality over bank secrets as determined laws and regulations and the confidentiality
                            principle of Confidential Information.</li>
                    </ul>
                    <ol class="sub-order-ximplyrights">
                        <li><b>XIMPLY</b> have the rights to:</li>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>monitor and control the use of XIMPLY Services by <b>MERCHANT</b>, as well as stopping
                            either temporarily or permanently if found there has been a violation by <b>MERCHANT</b> of
                            a provision in this Agreement or misuse of XIMPLY Service by <b>MERCHANT</b>;</li>
                        <li>monitor the <b>MERCHANT</b> Facilities 24 (twenty-four) hours a day and 7 (seven) days a
                            week, in order to monitor and ensure that the <b>MERCHANT</b> Facilities are in normal
                            operational condition to use XIMPLY Services; and</li>
                        <li>obtaining, billing, and collecting and charging Fees.</li>
                    </ul>
                    <ol class="sub-order-ximplyobligations">
                        <li><b>XIMPLY</b> obligations:</li>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>monitor, control, and be responsible for maintaining the security of every access and
                            operational security of every part of the XIMPLY Facilities;</li>
                        <li>create, implement, and supervise control systems and inspections as necessary to maintain
                            the confidentiality and security of access related to the operational activities of XIMPLY
                            Services;</li>
                    </ul>
                    <ol class="order-two-transactionsfees">
                        <li class="fw-bold">TRANSACTIONS, SETTLEMENTS AND FEES</li>
                        <ol class="order-list-transactionsfees">
                            <li>Transactions and Settlements</li>
                        </ol>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>MERCHANT is fully responsible for every transaction made by MERCHANT to XIMPLY, including
                            but not limited to all consequences arising and/or Settlements on behalf of MERCHANT.</li>
                        <li>Settlement is carried out by XIMPLY by deducting from the Cash Deposit any amount that is
                            MERCHANT's obligation in connection with the implementation of Money Transfer instructions
                            by MERCHANT and any amount that is XIMPLY's right based on the provisions of this Agreement.
                            Terms and procedures for deducting Cash Deposits are further regulated in the SPP.</li>
                    </ul>
                    <ol class="order-list-transactionsfees-two">
                        <li>COSTS</li>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>The MERCHANT is obliged to pay Fees to XIMPLY in accordance with the details, amount and
                            method of payment.</li>
                        <li>XIMPLY has the right to change the amount of the applicable fee by written notification to
                            the MERCHANT at least 30 (thirty) Calendar Days prior to the effective date of the fee
                            change ("Fee Change Date") which must obtain prior written approval from the MERCHANT.
                            Changes to these Fees will be stated in the addendum to this Agreement.</li>
                    </ul>
                    <ol class="order-list-transactionsfees-third">
                        <li>The taxes arising in connection with this Agreement shall be borne by each Party in
                            accordance with the applicable tax regulations.</li>
                    </ol>
                    <ol class="order-two-suspensionInternet">
                        <li class="fw-bold">TEMPORARY SUSPENSION OF INTERNET PAYMENT SYSTEM SERVICES</li>
                        <ol class="order-list-suspensionInternet">
                            <li><b>PAYMENT GATEWAY</b> can stop/deactivate the <b>INTERNET PAYMENT SYSTEM</b> at any
                                time with notification not later than 1 (one) <b>WORKING DAY</b> in advance to the
                                <b>MERCHANT</b>.
                            </li>
                            <li><b>PAYMENT GATEWAY</b> is not responsible for losses and/or damages arising from the
                                termination as referred to above as well as the permanent closure of services to
                                Merchants.</li>
                            <li>Termination of the <b>INTERNET PAYMENT SYSTEM</b> service may be caused by the following
                                reasons:</li>
                        </ol>
                    </ol>
                    <ul style="margin-left: 60px">
                        <li>System inspection, repair, maintenance or upgrade</li>
                        <li>Computer/telecommunication connection failure (internet connection)</li>
                        <li>There is a certain reason in the form of protecting the rights and/or interests of the
                            Parties</li>
                        <li>Or other reasons determined by PAYMENT GATEWAY or BANK</li>
                    </ul>
                    <ol class="order-two-securityProtection">
                        <li class="fw-bold">SECURITY AND PROTECTION OF INFORMATION</li>
                        <ol class="order-list-securityProtection">
                            <li>PAYMENT GATEWAY must have a secure system and network to protect sensitive information,
                                including but not limited to:</li>
                        </ol>
                    </ol>
                    <ul style="margin-left:60px">
                        <li>INTERNET TRANSACTION and CARD information (card number, CUSTOMER user id, etc.)</li>
                        <li>CUSTOMER Information (personal data, address, etc.)</li>
                        <li>Other information deemed sensitive by the Parties</li>
                    </ul>
                    <ol class="order-list-securityProtection-two">
                        <li>MERCHANT guarantees that MERCHANT will not do the following:</li>
                    </ol>
                    <ul style="margin-left:60px">
                        <li>Carrying out code-breaking efforts (reverse engineering) on the INTERNET PAYMENT SYSTEM</li>
                        <li>Doing things that cause damage to the INTERNET PAYMENT SYSTEM intentionally</li>
                        <li>Doing things that aim to steal INTERNET TRANSACTION and CARD and CUSTOMER data</li>
                    </ul>
                    <ol class="order-two-representations">
                        <li class="fw-bold">REPRESENTATIONS AND WARRANTIES</li>
                        <ol class="order-list-representations">
                            <li>The MERCHANT is a business entity legally established under applicable law in the
                                territory of the Republic of Indonesia and already has all the approvals, permits and
                                registration required by applicable legal provisions, and is not being revoked of its
                                acting authority according to applicable law to carry out its business, including but
                                not limited to making, signing and implementing this Agreement and other documents
                                related to this Agreement.</li>
                            <li>The Parties guarantee that the documents provided to the other party are official,
                                original, legal, valid and any information contained is correct.</li>
                            <li>Each Party, including all employees involved in this Agreement, is obliged to protect
                                and maintain all information and secrets related to this Agreement and all its
                                derivatives.</li>
                            <li>Each Party is not in a negligent state and/or commits a violation and/or is declared in
                                a state of default.</li>
                        </ol>
                    </ol>
                    <ol class="order-two-domicile">
                        <li class="fw-bold">DOMICILE, LEGAL, AND DISPUTE SETTLEMENT</li>
                        <ol class="order-list-domicile">
                            <li>This transaction is regulated and subject to the laws of the Republic of Indonesia.</li>
                            <li>If the Parties cannot resolve the dispute through consensus deliberation, the Parties
                                agree to choose a permanent and generally legal domicile at the Badan Arbitrase Nasional
                                Indonesia (BANI) in Jakarta as a means of settling the dispute.</li>
                        </ol>
                    </ol>
                    <ol class="order-two-confidentialy">
                        <li class="fw-bold">CONFIDENTIALITY</li>
                        <ol class="order-list-confidentialy">
                            <li>The Parties agree that the exchange of information that arises because of this Agreement
                                is categorized as confidential and for this reason the Parties agree to maintain the
                                confidentiality of such information unless they have obtained written permission from
                                one of the other parties and/or the information is valid and publicly known.</li>
                            <li>As long as this Agreement is valid or after the expiration of this Agreement, the
                                Parties and all parties working on/for the Parties and their affiliates are required to
                                maintain the confidentiality of data and/or information in any form regarding CUSTOMERS
                                whether obtained from other parties or from INTERNET TRANSACTIONS and CARD through
                                INTERNET PAYMENT SYSTEM whether it is classified as a secret of the BANK and/or the
                                Parties, or matters that must and should be kept confidential to anyone.</li>
                        </ol>
                    </ol>

                </div>
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
