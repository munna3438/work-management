@extends('layouts.admin.index')

@section('style')
@endsection

@section('content')
<div class="d_container">

    <div class="d_container_box">
        <h1 class="d_sec_title">Institute List</h1>

        @if (Session::has('msg'))
            <div class="d_success_message">
                <p class="">{{ Session::get('msg') }}</p>
                <button type="button" class="hide_area"><i class="fa-solid fa-x"></i></button>
            </div>
        @endif
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
                <a class="m_btn2" href="{{route('sync.add')}}">add institute</a>
            </div>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Institute Name</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($institutes as $key=>$institute)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $institute->instituteName }}</td>
                            <td>{{ $institute->created_at->format('d M, Y') }}</td>
                            <td >
                                <div class="d_action_container">

                                    <a href="{{ route('institute.edit', $institute->id) }}"
                                        class="d_action_button  bg_secondary hover:bg_secondary_light">

                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{route('institute.delete',$institute->id)}}" onclick="return confirm('Are you sure delete institute?')" class="d_action_button bg_primary hover:bg_primary_light">

                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection
