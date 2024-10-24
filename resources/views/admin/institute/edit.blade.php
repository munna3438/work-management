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
                <a class="m_btn2" href="{{route('institute.list')}}">List of institute</a>
            </div>
            <form action="{{route('institute.update',$institute->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-3 items-end">
                    <div class="">
                        <label for="instituteName" class="d_label">Institute Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="instituteName" id="instituteName" class="d_input_field"
                            placeholder="Enter institute Name" value="{{$institute->instituteName}}">
                    </div>
                    <div>
                        <button type="submit" class="d_button">Update Institute</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection

@section('script')
@endsection
