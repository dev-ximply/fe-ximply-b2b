@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg col-12 mx-auto">
            <div class="d-flex justify-content-between">
                <div>
                    @if (session()->get('is_superadmin') == false)
                        <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Remain Budget</p>
                        <h5 class=" mb-0 font-weight-bolder text-dark">
                            Rp
                            <span>
                                {{ $data['limit']['remain_limit'] != null ? number_format($data['limit']['remain_limit'], 2) : '0' }}
                            </span>
                        </h5>
                    @endif
                </div>
                <div>
                    <button class="btn btn-sm text-white" style="background-color: #19194b"
                        onclick="history.back()">back</button>
                </div>
            </div>
            <div class="card card-body mt-3">
                @if (session('error'))
                    <div style="width: 100%; text-align:right" class="text-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="mb-0 text-dark font-weight-bolder">New Budget</h6>
                        <p class="text-xs mb-0 text-secondary">Create new budget</p>
                    </div>
                </div>
                <form action="{{ route('add_spend') }}" id="add_spend" method="post">
                    @csrf
                    <input type="text" id="user_id" name="user_id" value="" hidden>
                    <input type="text" id="form_ui" name="form_ui" value="true" hidden>
                    <div class="row">
                        <div class="col-6">
                            <label for="projectName" class="form-label text-dark" style="font-weight: 600">Name</label>
                            <select class="form-control" name="assign_user_id" id="assign_user_id" required>
                                <option value="" selected>Select</option>
                                @foreach ($data['notassign_members'] as $item)
                                    <option value="{{ $item->id }}" class="text-capitlize">
                                        {{ ucwords(strtolower($item->group_name)) }}
                                        {{ '[' . ucwords(strtolower($item->role_name)) . ']' }} -
                                        {{ ucwords(strtolower($item->full_name)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label text-dark" style="font-weight: 600">Spending Budget Limit </label>
                            <input type="text" class="form-control number-separator" id="limit" name="limit" 
                                value="{{ old('limit') }}" required>
                            <script>
                                new NumericInput(document.getElementById('limit'), 'en-CA');
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label text-dark" style="font-weight: 600">Frequency</label>
                            <select class="form-control" name="frequency" required>
                                <option value="onetime">Onetime</option>
                                <option value="monthly">Monthly</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label text-dark" style="font-weight: 600">Auto Approve Amount</label>
                            <input type="text" class="form-control number-separator"  id="auto_approve_limit"
                                name="auto_approve_limit" value="{{ old('auto_approve_limit') }}" required>
                            <script>
                                new NumericInput(document.getElementById('auto_approve_limit'), 'en-CA');
                            </script>
                        </div>
                        {{-- <div class="col-6">
                            <label class="form-label text-dark" style="font-weight: 600">Period</label>
                            <input type="text" class="form-control" id="period" name="period">
                            <select name="frequency" id="frequency" class="form-select">
                                <option value="">Select</option>
                                <option value="">One Time</option>
                                <option value="">Monthly</option>
                          
                            </select>
                        </div> --}}

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label text-dark" style="font-weight: 600">Expire Date</label>
                            <input class="form-control datetimepicker" type="text" name="expire_date" id="expire_date"
                                value="{{ old('expire_date') }}" placeholder="Please select date" required data-input>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md">
                            <label class="form-label text-dark" style="font-weight: 600">Category Exceptions</label>
                            <select class="getcategory form-control" name="except_category_id"
                                id="choices-multiple-remove-button2" multiple>
                                @foreach ($data_category as $item2)
                                <option value="" class="text-capitlize">
                                    {{ $item2->category_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" name="button" class="btn btn-danger-cstm m-0"
                            onclick="history.back()">Cancel</button>
                        <input type="submit" id="new-budget" name="button" value="Submit" class="btn btn-success-cstm m-0 ms-2">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        easyNumberSeparator({
            selector: '.number-separator',
            separator: ',',
            decimalSeparator: '.',
            resultInput: '#result_input',
        })
    </script>

    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flatpickr.min.js') }}"></script>
    <script>
        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                allowInput: true
            }); // flatpickr
        }

        if (document.getElementById('choices-multiple-remove-button')) {
            var element = document.getElementById('choices-multiple-remove-button');
            const example = new Choices(element, {
                removeItemButton: true
            });

            example.setChoices(
                [
                    // {
                    //     value: 'One',
                    //     label: 'Meal'
                    // },
                    // {
                    //     value: 'Two',
                    //     label: 'Entertaint'
                    // },
                    // {
                    //     value: 'Three',
                    //     label: 'Gift'
                    // },
                ],
                'value',
                'label',
                false,
            );
        }

        if (document.getElementById('choices-multiple-remove-button2')) {
            var elements = document.getElementById('choices-multiple-remove-button2');
            const examples = new Choices(elements, {
                removeItemButton: true
            });

            examples.setChoices(
                [
                    // {
                    //     value: 'One',
                    //     label: 'Meal'
                    // },
                    // {
                    //     value: 'Two',
                    //     label: 'Entertaint'
                    // },
                    // {
                    //     value: 'Three',
                    //     label: 'Gift'
                    // },
                ],
                'value',
                'label',
                false,
            );
        }

        // const modal = document.querySelector("#modal");
        // const body = document.querySelector("body");

        // const showModal = function(e) {
        //     modal.classList.toggle("hidden");

        //     if (!modal.classList.contains("hidden")) {
        //         // Disable scroll
        //         body.style.overflow = "hidden";
        //     } else {
        //         // Enable scroll
        //         body.style.overflow = "auto";
        //     }
        // };
        const form = document.getElementById('add_spend');
        form.addEventListener('submit',  function(event) {
        // $('#new-budget').click(function(event) {
        event.preventDefault(); // Mencegah event default

        // Lakukan tindakan lain di sini
        // ...
        // console.log("tes");
        let check = checkPin("#topUp",function(){
            $('#add_spend').off('submit').submit();
        });

        // // Jalankan kembali event default setelah tindakan selesai
        // 
        });

    </script>
@endsection
