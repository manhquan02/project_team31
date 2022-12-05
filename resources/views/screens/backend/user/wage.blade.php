@extends('layouts.backend.master')
@section('title', ('Payroll management'))
@section('content')

<div>
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{ ('Payroll management') }}
                    <span class="d-block text-muted pt-2 font-size-sm">{{ ('Payroll for the month of ').date('m-Y')}}</span>
                </h3>
            </div>
        </div>

        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>{{ ('User Name') }}</th>
                        <th>{{ ('Money / Session') }}</th>
                        <th>{{ ('Number of working sessions') }}</th>
                        <th>{{ ('Total wage') }}</th>
                        <th>{{ ('Status') }}</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @if($wages != null)

                    @foreach($wages as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{number_format($item->wage_month,0,'.','.')}} VNĐ</td>
                        <td>{{$item->session}}</td>
                        <td>{{number_format($item->total_wage,0,'.','.')}} VNĐ</td>
                        <td><span class="label label-inline {{$item->status == 1 ? 'label-light-primary': 'label-light-danger'}} font-weight-bold">{{statusWage()[$item->status]}}</span></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            @if(count($wages) <= 0) <div class="card-body">
                <div class="mb-7">
                    <div class="row align-items-center">
                        <h2 style="color: #999999; text-align: center">{{ ('No records found') }}</h2>
                    </div>
                </div>
        </div>
        @endif
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.select2').select2()
    });
</script>
@endsection