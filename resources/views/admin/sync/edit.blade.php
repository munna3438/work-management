@extends('layouts.admin.index')

@section('style')
@endsection

@section('content')
<div class="d_container">
    <div class="d_container_box">
        <h1 class="d_sec_title"> Edit SYNC </h1>
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
                <a class="m_btn2" href="{{route('sync.list')}}">List of sync</a>
            </div>
            <form action="{{route('sync.update', $sync->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-3 items-end">
                    <div class="">
                        <label for="instituteName" class="d_label">Institute Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="instituteName" id="instituteName" class="d_input_field"
                            placeholder="Enter institute Name" value="{{$sync->instituteName}}">
                    </div>
                    <div class="">
                        <label for="instituteNumber" class="d_label">Institute Contact Number <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="instituteNumber" id="instituteNumber" class="d_input_field"
                            placeholder="Enter Institute Number" value="{{$sync->instituteNumber}}">
                    </div>
                    <div class="">
                        <label for="details" class="d_label">Work Details <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="details" id="details" class="d_input_field"
                            placeholder="Enter Work Details" value="{{$sync->details}}">
                    </div>

                    <div class="">
                        <label for="workStatus" class="d_label">Work Status<span
                                class="text-red-500">*</span></label>
                            <select name="workStatus" id="workStatus" class="w-full">
                                    <option value="done" @if ($sync->workStatus == 'done') selected @endif>Done</option>
                                    <option value="in-progress" @if ($sync->workStatus == 'in-progress') selected @endif >in-progress</option>
                                    <option value="panding" @if ($sync->workStatus == 'panding') selected @endif>Panding</option>
                            </select>
                    </div>
                    <div class="">
                        <label for="providerName" class="d_label">Provider Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="providerName" id="providerName" class="d_input_field"
                            placeholder="Enter Provider Name" value="{{$sync->providerName}}">
                    </div>
                    <div class="">
                        <label for="bill" class="d_label">Bill<span
                                class="text-red-500">*</span></label>

                        <select name="bill" id="bill" class="w-full">
                            <option value="unpaid" @if ($sync->bill == 'unpaid') selected @endif >Unpaid</option>
                            <option value="deu" @if ($sync->bill == 'deu') selected @endif >Deu</option>
                            <option value="paid" @if ($sync->bill == 'paid') selected @endif >Paid</option>
                        </select>
                    </div>
                    <div class="">
                        <label for="date" class="d_label">Date <span
                                class="text-red-500">*</span></label>
                        <input type="date" name="date" id="date" class="d_input_field"
                            placeholder="Enter Work Date" value="{{ $sync->created_at->format('Y-m-d') }}">
                    </div>

                </div>
                <div class="text-center mt-6">
                    <button type="submit" class="d_button">Update Sync</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section('script')
@endsection
