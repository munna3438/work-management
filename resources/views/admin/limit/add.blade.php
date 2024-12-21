@extends('layouts.admin.index')

@section('style')
@endsection

@section('content')
<div class="d_container">
    <div class="d_container_box">
        <h1 class="d_sec_title"> Add New Limit </h1>
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
                <a class="m_btn2" href="#">List of limit</a>
                {{-- <a class="m_btn2" href="{{route('institute.list')}}">List of limit</a> --}}
            </div>
            <form action="{{route('limit.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="instituteId" value="{{$instituteId}}">
                <div class="grid grid-cols-3 gap-3 items-end">
                    <div class="">
                        <label for="referName" class="d_label">Refer Name<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="referName" id="referName" class="d_input_field"
                            placeholder="Enter Refer Name">
                    </div>
                    <div class="">
                        <label for="oldLimit" class="d_label">Old Limit<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="oldLimit" id="oldLimit" class="d_input_field"
                            placeholder="Enter Old Limit">
                    </div>
                    <div class="">
                        <label for="newLimit" class="d_label">New Limit<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="newLimit" id="newLimit" class="d_input_field"
                            placeholder="Enter New Limit">
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
                            <option value="unpaid" @if (old('panding')=='unpaid') selected @endif>Unpaid</option>
                            <option value="deu" @if (old('panding')=='deu') selected @endif>Deu</option>
                            <option value="paid" @if (old('panding')=='paid') selected @endif>Paid</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="d_button">Add Limit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection

@section('script')
@endsection
