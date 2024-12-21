@extends('layouts.admin.index')

@section('style')
<style>
    tr td{
        text-wrap: nowrap;
    }
</style>
@endsection

@section('content')
<div class="d_container">

    <div class="d_container_box">
        <h1 class="d_sec_title">Limit List</h1>
        <p class="text-[#555] text-center">{{$instituteName}} </p>

        @if (Session::has('msg'))
            <div class="d_success_message">
                <p class="">{{ Session::get('msg') }}</p>
                <button type="button" class="hide_area"><i class="fa-solid fa-x"></i></button>
            </div>
        @endif
        <div class="text-right mb-6">
            <a class="m_btn2" href="{{route('limit.add',$instituteId)}}">Add Limit</a>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Refer Name</th>
                        <th>Old Limit</th>
                        <th>New Limit</th>
                        <th>Document</th>
                        <th>bill</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($limits as $key=>$limit)
                        <tr>
                            <td>{{ ($limits->currentPage() - 1) * $limits->perPage() + $loop->iteration }}</td>
                            <td>{{ $limit->referName }}</td>
                            <td>{{ $limit->oldLimit }}</td>
                            <td>{{ $limit->newLimit }}</td>
                            <td class="text-center text-xl">
                                @if ($limit->document)
                                    <a href="{{asset("uploads/limit/".$limit->document)}}"><i class="fa-regular fa-file"></i></a>
                                @endif
                            </td>
                            <td>{{ $limit->bill }}</td>
                            <td>{{ $limit->created_at->format('d M, Y') }}</td>
                            <td >
                                <div class="d_action_container">
                                    <a href="{{ route('limit.edit', $limit->id) }}"
                                        class="d_action_button  bg_secondary hover:bg_secondary_light">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('limit.delete', $limit->id) }}" onclick="return confirm('Are you sure delete catagory?')" class="d_action_button bg_primary hover:bg_primary_light" onclick="confirm('are you sure delete this sync ??')">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{ $limits->links() }}
    </div>
</div>

@endsection

@section('script')
@endsection
