@extends('layouts.default')



@section('content')


    {!! Form::open(array('route' => 'posts.search','method'=>'POST')) !!}

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Search for user</strong>

            <td> {!! Form::text('searchtag', null, array('placeholder' => 'search by user','class' => 'form-control')) !!} </td>

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="submit" class="btn btn-primary">Submit</button>

    </div>


    {!! Form::close() !!}



    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Posts Crud</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Title</th>

            <th>Description</th>

            <th>User_id</th>
            <th width="280px">Action</th>

        </tr>
                <?php $i =1; ?>
        @foreach($posts as $item)

            <tr>

                <td>{{ $i++ }}</td>

                <td>{{ $item->title }}</td>

                <td>{{ $item->description }}</td>

                <td>{{$item->user_id}}</td>

                <td>

                    <a class="btn btn-info" href="{{ route('posts.show',$item->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('posts.edit',$item->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $item->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                </td>

            </tr>

        @endforeach

    </table>


    {!! $posts->render() !!}


@endsection