@extends('layouts.admin.index')

@section('style')

@endsection

@section('content')
<div class="d_container">
    <div class="d_container_box">
        <h1 class="d_sec_title"> Add New SYNC </h1>
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
            <form action="{{route('sync.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-3 items-end">
                    <div class="">
                        <label for="instituteName" class="d_label">Institute Name <span
                                class="text-red-500">*</span></label>

                            <select name="instituteName" id="searchSelectField" class="d_input_field instituteName">
                                @foreach ($institutes as $institute )

                                <option value="{{$institute->instituteName}}" @if (old('instituteName') == $institute->instituteName)
                                    selected

                                @endif >{{$institute->instituteName}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="">
                        <label for="instituteNumber" class="d_label">Institute Contact Number <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="instituteNumber" id="instituteNumber" class="d_input_field"
                            placeholder="Enter Institute Number" value="{{old('instituteNumber')}}">
                    </div>
                    <div class="">
                        <label for="details" class="d_label">Work Details <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="details" id="details" class="d_input_field"
                            placeholder="Enter Work Details" value="{{old('details')}}">
                    </div>
                    <div class="">
                        <label for="workStatus" class="d_label">Work Status<span
                                class="text-red-500">*</span></label>
                            <select name="workStatus" id="workStatus" class="w-full">
                                    <option value="done" @if (old('workStatus')=='done') selected @endif>Done</option>
                                    <option value="in-progress">in-progress</option>
                                    <option value="panding">Panding</option>
                            </select>
                    </div>
                    <div id="occasion" class="hidden">

                    </div>
                    <div class="">
                        <label for="providerName" class="d_label">Provider Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="providerName" id="providerName" class="d_input_field"
                            placeholder="Enter Provider Name">
                    </div>
                    <div class="">
                        <label for="bill" class="d_label">Bill<span
                                class="text-red-500">*</span></label>
                        <select name="bill" id="bill" class="w-full">
                            <option value="unpaid">Unpaid</option>
                            <option value="deu">Deu</option>
                            <option value="Paid">Paid</option>
                        </select>
                    </div>

                </div>
                <div class="text-center mt-6">
                    <button type="submit" class="d_button">Add Sync</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#workStatus').change(function () {
            let workStatus = $(this).val();
            if(workStatus != 'done'){
                $('#occasion').removeClass('hidden');
                $('#occasion').html(`
                    <div class="">
                        <label for="occasion" class="d_label">Occasion </label>
                        <input type="text" name="occasion" id="occasion" class="d_input_field"
                            placeholder="Enter Occasion" value="{{old('occasion')}}">
                    </div>
                `);
            }
            else{
                $('#occasion').addClass('hidden');
                $('#occasion').html('');
            }
        });
    });
</script>

@endsection
