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
                <h2>Edit Record</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employee.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>

  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif

    <form action="{{ route('employee.update',$rec->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" value="{{ $rec->name }}" class="form-control" placeholder="Name">
                    @error('name')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>e-mail</strong>
                    <input type="text" name="email" value="{{ $rec->email }}" class="form-control" placeholder="email">
                    @error('email')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>phone</strong>
                    <input type="text" name="phone" value="{{ $rec->phone }}" class="form-control" placeholder="phone">
                    @error('phone')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DOB</strong>
                    <input type="date" name="dob" value="{{ $rec->dob }}" class="form-control" placeholder="">
                    @error('dob')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $rec->description }}</textarea>
                    @error('description')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                 <input type="file" name="image" class="form-control" placeholder="">
                @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">

              <img src="{{ Storage::url($rec->image) }}" height="200" width="200" alt="" />


            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Designation</strong>
                   <select name="desgination" class="formcontrol">
                       <option value="{{$rec->desgination}}" selected></option>
                    <option value="Junior Developer">Junior Developer</option>
                    <option value="Senior Developer">Senior Developer</option>
                    <option value="Product Associate">Product Associate</option>
                    <option value="Sales Executive">Sales Executive</option>
                    <option value="Marketing">Marketing</option>
                </select>

                @error('name')
                 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status</strong>
                <input type="text" name="status" value="{{ $rec->status }}" class="form-control" placeholder="">
                @error('status')
                 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>


              <button type="submit" class="btn btn-primary ml-3">Submit</button>

        </div>

    </form>
</div>

</body>
</html>
