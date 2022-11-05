@extends('layouts.backend.master')
@section('title', translate('Language Management'))
@section('content')
    <div>
        <div class="card card-custom">
            <div class="card-header border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{ translate('Configuration') }}
                        <span
                            class="d-block text-muted pt-2 font-size-sm">{{ translate('Language') }}</span>
                    </h3>
                </div>
                <div class="card-title">
                    <form action="">
                        <div class="input-icon" style="margin-right: 280px">
                            <input type="text" class="form-control" style="width: 200%"
                                   name="keyword" @if(request('keyword')) value="{{ request('keyword') }}" @endif
                                   placeholder="{{translate('Type keywords and Enter ...')}}"/>
                        </div>
                        <button hidden>Search</button>
                    </form>
                </div>
            </div>
            <form action="{{route('admin.language.store_translate', $lang)}}" method="post">
                @csrf
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>{{translate('KeyWord')}}</th>
                            <th>{{translate('Value')}}</th>
                            <th>{{translate('Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        @if($translations != null)
                            @foreach($translations as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->lang_in}}</td>
                                    <td><input type="text" name="lang_value[{{$item->id}}]" class="form-control"
                                               value="{{$item->lang_value}}"></td>
                                    <td><a id="btn-del" href="{{route('admin.language.delete_translation', $item->id)}}"
                                           style="margin-left: 12px"><i class="flaticon2-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div>
                        {{$translations->appends(request()->input())->links()}}
                    </div>

                    <!--end: Datatable-->
                    @if(count($translations) > 0)
                        <button type="submit" class="btn btn-success mr-2">{{ translate('Save') }}</button>
                    @else
                        <div class="card-body">
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <h2 style="color: #999999; text-align: center">{{ translate('No records found') }}</h2>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection
