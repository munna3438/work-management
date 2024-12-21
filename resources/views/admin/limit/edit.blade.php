@extends('layouts.admin.index')

@section('style')
@endsection

@section('content')
<div class="d_container">
    <div class="d_container_box">
        <h1 class="d_sec_title"> Edit Institute </h1>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="text-right mb-4">
                <a class="m_btn2" href="{{route('limit.list',$limit->instituteID)}}">List of limit</a>
            </div>
            <form action="{{route('limit.store',$limit->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="instituteId" value="{{$limit->instituteID}}">
                <div class="grid grid-cols-3 gap-3 items-end">
                    <div class="">
                        <label for="referName" class="d_label">Refer Name<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="referName" id="referName" class="d_input_field"
                            placeholder="Enter Refer Name" value="{{$limit->referName}}">
                    </div>
                    <div class="">
                        <label for="oldLimit" class="d_label">Old Limit<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="oldLimit" id="oldLimit" class="d_input_field"
                            placeholder="Enter Old Limit" value="{{$limit->oldLimit}}">
                    </div>
                    <div class="">
                        <label for="newLimit" class="d_label">New Limit<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="newLimit" id="newLimit" class="d_input_field"
                            placeholder="Enter New Limit" value="{{$limit->newLimit}}">
                    </div>
                    <div class="">
                        <label for="document" class="d_label">Document<span
                                class="text-red-500">*</span></label>
                        <input type="file" name="document" id="document" class="d_input_field"
                            >
                    </div>
                    <div class="">
                        <label for="bill" class="d_label">Bill<span
                                class="text-red-500">*</span></label>
                        <select name="bill" id="bill" class="w-full">
                            <option value="unpaid" @if ( $limit->bill=='unpaid') selected @endif>Unpaid</option>
                            <option value="deu" @if ($limit->bill=='deu') selected @endif>Deu</option>
                            <option value="paid" @if ($limit->bill=='paid') selected @endif>Paid</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="d_button">Update Limit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection

@section('script')
@endsection
