<!doctype html>
<html lang="en">

<head>
    <title>Login 07</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Add Product</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                    
                        <div class="col-12 p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Add product</h3>
                                </div>
                           
                            </div>
                            <form method="post" class="signin-form" action="{{ route('store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Name</label>
                                    <input type="text" required class="form-control form-control-sm " id="name" name="name"    placeholder="product name" >
                                </div>
                        
                                <div class="form-group mb-3">
                                    <label class="label" for="desc">Product Description</label>
                                    <textarea class="form-control form-control-sm" id="desc" name="desc" placeholder="Product Description" required></textarea>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Price</label>
                                    <input type="number" required class="form-control form-control-sm " id="price" name="price"    placeholder="product price" >
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="cat">Category</label>
                                    <select required class="form-control form-control-sm" id="cat_id" name="cat_id">
                                        @foreach ($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label class="label"  for="name">Image</label>
                                    <input type="file" required class="form-control form-control-sm " id="image" name="image"    placeholder="product image" >
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Submit</button>
                                </div>
                          
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>

</html>
