@extends('layouts.main')

@section('container')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <form action="javascript:void(0)" method="POST" onsubmit="submitReport()">
                    <div class="row">
                        @csrf
                        <input type="text" id="user_id" value="{{ Auth::user()['id'] }}" hidden>
                        <input type="text" id="report_id" value="{{ $data['reports']->id }}" hidden>
                        <div class="col-md">
                            <label class="text-xs text-dark" style="font-weight: 500">Email To</label>
                            <input type="email" id="email_to" class="form-control bg-white"
                                value="{{ $data['reports']->reported_to_email }}"
                                style="font-size:11px;height:30px; border-radius:5px !important" required>
                            {{-- {{ $data['reports']->status == 'open' ?: 'disabled' }} required> --}}
                        </div>
                        <div class="col-md">
                            <label class="text-xs text-dark" style="font-weight: 500">Email CC</label>
                            <input type="email" id="email_cc" class="form-control bg-white"
                                value="{{ $data['reports']->reported_to_email_cc }}"
                                style="font-size:11px;height:30px; border-radius:5px !important" required>
                            {{-- {{ $data['reports']->status == 'open' ?: 'disabled' }}> --}}
                        </div>
                        <div class="col-md">
                            <div class="row">
                                <div class="col-md">
                                    <label class="text-xs text-dark" style="font-weight: 500">Subject</label>
                                </div>
                            </div>
                            <input type="text" id="memo" class="form-control bg-white"
                                value="{{ $data['reports']->reported_memo }}"
                                style="font-size:11px;height:30px; border-radius:5px !important">
                            {{-- {{ $data['reports']->status == 'open' ?: 'disabled' }}> --}}
                        </div>
                        {{-- @if ($data['reports']->status == 'open') --}}
                        <div class="col-md text-end d-flex align-items-end mt-2">
                            <button type="submit" class="badge border-0 text-xs text-white"
                                style="background: #ff720c; height:30px">SEND</button>
                        </div>
                        {{-- @endif --}}
                    </div>
                </form>
            </div>
            <div class="col-md-3 d-flex align-items-end justify-content-md-end justify-content-end mt-2">
                <button onclick="history.back()" class="btn  btn-sm  text-white" style="background-color: #191a4d"
                    type="button">back</button>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card" style="border-radius: 5px; border:0.5mm solid #f1f1f1">
                <div class="card-header px-3" style="border-bottom:1px solid #f1f1f1 ">
                    <div class="row justify-content-between">
                        <div class="col-md">
                            <span
                                class="br font-weight-bold text-dark border-0 w-100">{{ $data['reports']->report_title }}</span>
                        </div>
                        <div class="col-md ">
                            <p class="text-start text-md-end font-weight-bold text-dark">
                                Total Amount : {{ number_format($data['reports']->total_amount, 2) }}</p>
                        </div>
                    </div>
                </div>
                <div class="table table-responsive">
                    <table class="table table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-sm px-3 text-dark" style="font-weight: 600">Date</th>
                                <th class="text-sm px-2 text-dark" style="font-weight: 600">Merchant</th>
                                <th class="text-sm px-2 text-dark" style="font-weight: 600">Amount</th>
                                <th class="text-sm px-2 text-dark" style="font-weight: 600">Expense Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['reports']->expense_data as $item)
                                <tr class="pb-0">
                                    <td class="font-weight-bold pt-3 pb-0">
                                        <p class="text-dark text-xs mx-2 text-break text-wrap">
                                            {{ $item->receipt_date }}
                                        </p>
                                    </td>
                                    <td class="text-xs font-weight-bold  pt-3 pb-0">
                                        <div class="d-flex align-items-center text-break text-wrap text-capitalize">
                                            <p class="text-xs text-dark">{{ $item->merchant }}</p>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-bold  pt-3 pb-0">
                                        <div class="d-flex align-items-center text-break text-wrap">
                                            <p class="text-xs text-dark fw-bold">
                                                {{ number_format($item->total_amount, 2) }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-bold  pt-3 pb-0">
                                        <div class="d-flex align-items-center text-break text-wrap text-capitalize">
                                            <p class="text-xs text-dark">{{ $item->category }}</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script>
        function submitReport() {

            // var pdf = buildpdf();

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success-cstm mx-2",
                    cancelButton: "btn btn-danger-cstm mx-2",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "<h5>Are you sure you want to process?</h5>",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    reverseButtons: false,
                })
                .then((result) => {
                    if (result.isConfirmed) {

                        var formSubmitReport = new FormData();

                        formSubmitReport.append('user_id', $("#user_id").val());
                        formSubmitReport.append('report_id', $("#report_id").val());

                        if ($("#email_to").val() != "" || $("#email_to").val() != null) {
                            formSubmitReport.append('email_to', $("#email_to").val());
                        }

                        if ($("#email_cc").val() != "" || $("#email_cc").val() != null) {
                            formSubmitReport.append('email_cc', $("#email_cc").val());
                        }

                        if ($("#memo").val() != "" || $("#memo").val() != null) {
                            formSubmitReport.append('memo', $("#memo").val());
                        }

                        // if (pdf) {
                        //     formSubmitReport.append('upload_pdf', pdf);
                        // }

                        $.ajaxSetup({
                            headers: {
                                "Authorization": "Bearer " + AUTH_TOKEN,
                                "Accept": "application/json"
                            }
                        });

                        $.ajax({
                            url: API_URL + "api/report/submit",
                            type: 'post',
                            data: formSubmitReport,
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                                $("#main-loader").show();
                            },
                            success: function(res) {
                                if (res['success'] == true) {
                                    swalWithBootstrapButtons.fire(
                                        "success!",
                                        "your request success.",
                                        "success"
                                    );
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "Error!",
                                        res['message'],
                                        "error"
                                    );
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                }
                            },
                            complete: function(data) {
                                $("#main-loader").hide();
                                if (data.status != 200) {
                                    Swal.fire(
                                        "something wrong",
                                        "please contact ximply support!",
                                        "error"
                                    );
                                }
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire(
                            "cancelled",
                            "your request cancelled :)",
                            "error"
                        );
                    }
                });
        }

        // function buildpdf() {
        //     var doc = new jsPDF();

        //     doc.text(20, 20, 'Hello world!');
        //     doc.text(20, 30, 'This is client-side Javascript, pumping out a PDF.');
        //     doc.addPage();
        //     doc.text(20, 20, 'Do you like that?');

        //     var blobPDF = doc.output('blob');

        //     return blobToFile(blobPDF, "test.pdf");
        // }

        // function blobToFile(theBlob, fileName) {
        //     return new File([theBlob], fileName, {
        //         lastModified: new Date().getTime(),
        //         type: theBlob.type
        //     })
        // }
    </script>
@endsection
