@extends('layouts.default')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Showing search results</h2>

            </div>

        </div>

    </div>



    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Id</th>

            <th>Email</th>

            <th>Name</th>

        </tr>
        <?php $i =1; ?>
        @foreach($user as $item)

            <tr>

                <td>{{ $i++ }}</td>

                <td>{{ $item->id}}</td>

                <td>{{ $item->email}}</td>

                <td>{{$item->name}}</td>

                <td>

                    <a class="btn btn-info" href="{{ route('posts.follow',$item->id) }}">Follow Or Unfollow</a>


            </tr>

    @endforeach





@endsection