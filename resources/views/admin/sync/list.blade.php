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
        <h1 class="d_sec_title">Catagory List</h1>

        @if (Session::has('msg'))
            <div class="d_success_message">
                <p class="">{{ Session::get('msg') }}</p>
                <button type="button" class="hide_area"><i class="fa-solid fa-x"></i></button>
            </div>
        @endif
        <div class="text-right mb-4">
            <a class="m_btn2" href="{{route('sync.add')}}">add sync</a>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Institute Name</th>
                        <th>Institute phone Number</th>
                        <th>work details</th>
                        <th>work Status</th>
                        <th>provider Name</th>
                        <th>bill</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($syncs as $key=>$sync)
                        <tr>
                            {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td>{{ ($syncs->currentPage() - 1) * $syncs->perPage() + $loop->iteration }}</td>
                            <td>{{ $sync->instituteName }}</td>
                            <td>{{ $sync->instituteNumber }}</td>
                            <td>{{ $sync->details }}</td>
                            <td>{{ $sync->workStatus }}</td>
                            <td>{{ $sync->providerName }}</td>
                            <td>{{ $sync->bill }}</td>
                            <td>{{ $sync->created_at->format('d M, Y') }}</td>
                            <td >
                                <div class="d_action_container">
                                    <a href="{{ route('sync.edit', $sync->id) }}"
                                        class="d_action_button  bg_secondary hover:bg_secondary_light">

                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('sync.delete', $sync->id) }}" onclick="return confirm('Are you sure delete catagory?')" class="d_action_button bg_primary hover:bg_primary_light" onclick="confirm('are you sure delete this sync ??')">

                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $syncs->links() }}
    </div>
</div>

@endsection

@section('script')
@endsection
