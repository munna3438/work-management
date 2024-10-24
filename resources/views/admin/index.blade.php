@extends('layouts.admin.index')

@section('content')
<div class="py-12 d_container">
    <div>
        <h1 class="text-center text-3xl font-bold text_primary mb-8">Sync Work Status</h1>
    </div>

    <div class="grid grid-cols-3 gap-5">
        <div class="sm:p-6 lg:p-8 bg-white overflow-hidden shadow-md hover:shadow-lg sm:rounded-lg">
            <a href="{{route('sync.list')}}" class="text-center font-bold">
                <h1 class="text_primary mb-3 text-3xl">{{$totalSync}}</h1>
                <h3 class=" text-2xl text_secondary capitalize">Total</h3>
            </a>
        </div>
        <div class="sm:p-6 lg:p-8 bg-white overflow-hidden shadow-md hover:shadow-lg sm:rounded-lg">
            <a href="{{route('sync.list','done')}}" class="text-center font-bold">
                <h1 class="text_primary mb-3 text-3xl">{{$syncDone}}</h1>
                <h3 class=" text-2xl text_secondary capitalize">done</h3>
            </a>
        </div>
        <div class="sm:p-6 lg:p-8 bg-white overflow-hidden shadow-md hover:shadow-lg sm:rounded-lg">
            <a href="{{route('sync.list','in-progress')}}" class="text-center font-bold">
                <h1 class="text_primary mb-3 text-3xl">{{$syncInProress}}</h1>
                <h3 class=" text-2xl text_secondary capitalize">in-progress</h3>
            </a>
        </div>
        <div class="sm:p-6 lg:p-8 bg-white overflow-hidden shadow-md hover:shadow-lg sm:rounded-lg">
            <a href="{{route('sync.list','panding')}}" class="text-center font-bold">
                <h1 class="text_primary mb-3 text-3xl">{{$syncPanding}}</h1>
                <h3 class=" text-2xl text_secondary capitalize">panding</h3>
            </a>
        </div>
    </div>

</div>
@endsection
