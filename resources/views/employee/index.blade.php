<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-2">

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Task</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New Employee Record</a>
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
            <th>S.No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Designation</th>
            <th>e-mail</th>
            <th>phone</th>
            <th>Description</th>
            <th>DOB</th>
            <th>status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($empdata as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td><img src="{{ Storage::url($item->image) }}" height="75" width="75" alt="" /></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->desgination }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->dob }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <form action="{{ route('employee.destroy',$item->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('employee.edit',$item->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $empdata->links() !!}

</body>
</html>
