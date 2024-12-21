@extends('layouts.admin.index')

@section('style')
@endsection

@section('content')
<div class="d_container">

    <div class="d_container_box">
        <h1 class="d_sec_title">Institute List</h1>
        <div class="my-6 text-center text-[#555]">
            <p class="capitalize">{{ $status }} limit list</p>
        </div>
        <div class="flex items-center justify-between mb-6">
            <div>
                <form action="">
                    <div class="d_search_box">
                        <input type="text" name="search" placeholder="Search here" value="{{$search}}">
                        <button type="submit" class="m_btn2 ">Search</button>
                    </div>
                </form>
            </div>

            <div class="text-right ">
                <a class="m_btn2" href="{{route('institute.list')}}">Institute List</a>
            </div>
        </div>
        <div class="w-full overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Institute Name</th>
                        <th>Refer Name</th>
                        <th>Old Limit</th>
                        <th>New Limit</th>
                        <th>Document</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($limits as $key=>$limit)
                    {{-- @dd($limit) --}}
                        <tr>
                            <td>{{ ($limits->currentPage() - 1) * $limits->perPage() + $loop->iteration }}</td>
                            <td>{{ $limit->instituteName }}</td>
                            <td>{{ $limit->referName }}</td>
                            <td>{{ $limit->oldLimit }}</td>
                            <td>{{ $limit->newLimit }}</td>
                            <td>@if ($limit->document)
                                <a href="{{asset("uploads/limit/".$limit->document)}}"><i class="fa-regular fa-file"></i></a>
                            @endif</td>

                            <td>{{ $limit->created_at->format('d M, Y') }}</td>
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
