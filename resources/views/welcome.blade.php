<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5 p-5">
<div class="row justify-content-center">
    <div class="col-lg-6 pr-0 bg">
        <div class="card mb-0 shadow-none">
            <div class="card-body">
                
                <div class="px-3">
                <h5>
                   TO DO List
                </h5>
                
                    <div class="custom-tab tab-profile">
                        <ul class="nav nav-tabs " role="tablist">
                        <li class="nav-item">Show Category</li>
                            @if($category)
                        @foreach ($category as $cat)
                            <li class="nav-item"><a class="nav-link pt-0" data-toggle="tab" href="#cat{{$cat->id}}" role="tab">{{$cat->name}}</a></li>|
                       @endforeach
                       @endif
                       <li class="nav-item"><a class="nav-link active pt-0" data-toggle="tab" href="#alltab" role="tab">All</a></li>

                        </ul><!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="alltab" role="tabpanel">
                                @if($todo_list)
                            @foreach ($todo_list as $todo)
                            <div class="form-group row">
                                        <div class="col-md-10">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox">
                                             <label class="custom-control-label" for="email_chk">{{$todo->name}}  </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-right">
                                        <form method="POST" action="/todo_list/{{$todo->id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                                        <button class="btn text-danger"><i class="fa fa-close"></i></button>

                                        </form>
                                    </div>
                            </div>
                                    @endforeach
                                    @endif
                            </div>
                            @if($category)
                        @foreach ($category as $cat)
                            <div class="tab-pane" id="cat{{$cat->id}}" role="tabpanel">
                            @foreach ($cat->todolists as $todo)
                            <div class="form-group row mt-4">
                                        <div class="col-md-10">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox">
                                             <label class="custom-control-label" for="name">{{$todo->name}}  </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-right">
                                        <form method="POST" action="/todo_list/{{$todo->id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                                        <button class="btn text-danger"><i class="fa fa-close"></i></button>
                                        </form>
                            </div>
                            </div>
                            @endforeach
                            </div>
                        @endforeach
                        @endif
                        </div>
                    </div>
                    <hr>
                    <form class="form-horizontal my-4" method="POST" action="/todo_list">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">                                 
                                    <div class="form-group">
                                        <label for="name">Add To Do</label>
                                        <div class="input-group mb-3">
                                        <input id="name" type="text" class="form-control " name="name" value="" autocomplete="name">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name">Category</label>
                                        <div class="col-md-8">
                                        <select name="category_id" class="form-select">
                                        <option value=""> Choose Category </option>
                                        @foreach ($category as $cat)
                                                <option value="{{$cat->id}}"> {{$cat->name}} </option>
                                                @endforeach
                                            </select>                              
                                        </div>
                                        <div class="col-md-4">
                                           <button class="btn btn-primary btn-sm" type="submit">Add TO DO</button>
                                        </div>
                                    </div>
                    </form>
                    <hr>
                    <h5>CATEGORIES</h5>
                    <form class="form-horizontal my-4" method="POST" action="/category">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                                    <div class="form-group row">
                                        <label for="name">Category Name</label>
                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control " name="name" value="" autocomplete="name">
                                           </div>
                                        <div class="col-md-4">
                                           <button class="btn btn-primary btn-sm" type="submit">Add Cetegory</button>
                                        </div>
                                    </div>
                    </form>
                    
                    @if($category)
                    @foreach ($category as $cat)
                   <div class="row">
                     <div class="col-md-1">
                         <form method="POST" action="/category/{{$cat->id}}">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                     <button class="btn text-danger"><i class="fa fa-close"></i></button>

                     </form>
                     </div>
                      <div class="col-md-6 my-2"><p>{{$cat->name}}</p> </div>
                   </div>
                    @endforeach
                    @endif
                   
                </div>
              
            </div>
        </div>
    </div>
</div>


</div>

</body>
</html>
