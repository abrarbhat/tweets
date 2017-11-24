@extends('layouts.default')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>All Posts</h2>

            </div>

        </div>

    </div>



    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Title</th>

            <th>Description</th>

            <th>User_id</th>
            <th width="280px">Action</th>

        </tr>
        <?php $i =1; ?>
        @foreach($user as $item)

            <tr>

                <td>{{ $i++ }}</td>

                <td>{{ $item->id }}</td>

                <td>{{ $item->email}}</td>

                <td>{{$item->name}}</td>

            </tr>

        @endforeach

    </table>





@endsection