<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="main_content pt-3">
        <div class="container">
            <div class="row">
               
                <div class="col-md-4">
                    <div class="card">
                       <div class="card-header">
                        Edit student
                       </div>
                       <div class="card-body">
                        <form action="{{route('update',$student->id)}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                              <label for="" class="form-label">Existing photo</label>
                             <div><img src="{{ asset('uploads/'.$student->photo) }}" alt="" width="100" height="100"></div>
                          </div>
                          
                          <div class="mb-3">
                            <label for="" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="photo">
                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Student name</label>
                                <input type="text" class="form-control" name="name" value="{{ $student->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Student email</label>
                                <input type="text" class="form-control" name="email" value="{{ $student->email }}" >
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                            
                       </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>