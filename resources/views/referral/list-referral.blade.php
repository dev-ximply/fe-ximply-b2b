@extends('layouts.main')

<style>
    th,
    td {
        color: #000000 !important;
    }

    .page-item {
        padding: 0 !important;
    }
</style>

@section('container')
    <div class="row">

        <div class="col-12 d-flex justify-content-end">
            <button onclick="history.back()" class="btn  btn-sm  text-white" style="background-color: #191a4d"
                type="button">back</button>
        </div>

        <div class="table table-repsonsive text-dark">
            <div class="text-center text-dark">
                <p class="text-dark fs-5 fw-bold">List Referral Friends</p>
            </div>
            {{-- <table class="table table-striped text-dark">
                <thead>
                    <tr class="text-dark">
                        <th width="40" class="text-center">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 0; ?>
                    @foreach ($data['referral']->referral_member as $item)
                        <tr class="text-dark">
                            <td width="40" class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->email }}</td>
                      
                        </tr>
                    @endforeach
                    <?php $i++; ?>

                </tbody>

            </table> --}}


            <div class="table table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-sm px-3 text-dark" style="font-weight: 600">No</th>
                            <th class="text-sm px-2 text-dark" style="font-weight: 600">Name</th>
                            <th class="text-sm px-2 text-dark" style="font-weight: 600">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php $i = 0 ?>
                        @foreach ($data['referral']->referral_member as $item)
                            <tr class="pb-0">
                                <td class="text-xs font-weight-bold  pt-3 pb-0">
                                    <div class="d-flex align-items-center text-break text-wrap">
                                        <p class="text-xs text-dark text-center">{{ $i+= 1 }}</p>
                                    </div>
                                </td>
                                <td class="text-xs font-weight-bold  pt-3 pb-0">
                                    <div class="d-flex align-items-center text-break text-wrap">
                                        <p class="text-xs text-dark">{{ $item->full_name }}</p>
                                    </div>
                                </td>
                                <td class="text-xs font-weight-bold  pt-3 pb-0">
                                    <div class="d-flex align-items-center text-break text-wrap">
                                        <p class="text-xs text-dark">{{ $item->email }}</p>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <?php $i++ ?>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
