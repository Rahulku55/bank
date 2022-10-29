@extends("layouts.backend.app")
@section("content")
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0"> Tables</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Datatable</a>
                                </li>
                                <li class="breadcrumb-item active">Basic
                                </li>
                            </ol>
                            @if(Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <p>Read full documnetation <a href="https://datatables.net/" target="_blank">here</a></p>
                </div>
            </div>
             <!-- Multilingual -->
             <section id="multilingual-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Multilingual</h4>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Add index
                                  </button>
                            </div>
                            <div class="card-datatable">
                                <table class="dt-multilingual table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Address</th>
                                            <th>logo</th>
                                            <th>Email</th>
                                            <th>pin</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $a )
                                    <tbody>
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$a->address}}</td>
                                            <td><img src="{{ url('/upload/logo/'.$a->logo) }}" style="height: 100px; width: 100px; border-radius: 100%;"></td>
                                            <td>{{$a->email}}</td>
                                            <td>{{$a->pin}}</td>
                                            <td>{{$a->created_at->format('D, d M Y H:i')}}</td>
                                            <td>
                                                <a href="" class="btn btn-info" style="border-radius: 100px;" data-toggle="modal" data-target="#view_model-{{$a->id}}"><i data-feather="eye"></i></a>
                                                <!-- <a href="" class="btn btn-success" style="border-radius: 100px;" data-toggle="modal" data-target="#edit_model-{{$a->id}}"><i data-feather="file-text"></i></a> -->
                                                <a href="{{route('indexdelete',[$a->id])}}" class="btn btn-danger" style="border-radius: 100px;"><i data-feather="trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Multilingual -->
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('index-store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="first-name-vertical">Address</label>
                        <input type="text"  class="form-control" name="address" placeholder=""/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="first-name-vertical">phone1</label>
                        <input type="text"  class="form-control" name="phone1" placeholder=""/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="first-name-vertical">phone2</label>
                        <input type="text"  class="form-control" name="phone2" placeholder=""/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="first-name-vertical">Email</label>
                        <input type="text"  class="form-control" name="email" placeholder=""/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="first-name-vertical">pin</label>
                        <input type="text"  class="form-control" name="pin" placeholder=""/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="first-name-vertical">logo</label>
                        <input type="file"  class="form-control" name="logo" placeholder=""/>
                    </div>
                </div>
            </div>
                <button  class="btn btn-primary" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @foreach ($data as $a)
  <!---view model---->
  <div class="modal fade" id="view_model-{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div class="row form-group">
             <div class="col col-md-3"><label class=" form-control-label">Title</label>
             </div>
             <div class="col-12 col-md-9">
                 <p class="form-control-static">{{$a->address}}</p>
             </div>
         </div>
         <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">phone1</label>
            </div>
            <div class="col-12 col-md-9">
                <p class="form-control-static">{{$a->phone1}}</p>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">phone2</label>
            </div>
            <div class="col-12 col-md-9">
                <p class="form-control-static">{{$a->phone2}}</p>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">email</label>
            </div>
            <div class="col-12 col-md-9">
                <p class="form-control-static">{{$a->email}}</p>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">pin</label>
            </div>
            <div class="col-12 col-md-9">
                <p class="form-control-static">{{$a->pin}}</p>
            </div>
        </div>
                  <div class="row form-group">
                  <div class="col col-md-3"><label class=" form-control-label">logo</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static"><img src="{{ url('/upload/logo/'.$a->logo) }}" style="height: 200px; width: 200px; border-radius: 100%;"></p>
                  </div>
              </div>
                 <div class="row form-group">
                  <div class="col col-md-3"><label class=" form-control-label">Updated At</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static">{{$a->updated_at->format('D, d M Y H:i')}}</p>
                  </div>
              </div>
        </div>
      </div>
    </div>
  </div>
 <!-- edit_Modal -->
<div class="modal fade" id="edit_model-{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
           <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="">
               @csrf
             @method('PUT')
             <div class="row">
               <div class="col-12">
                   <div class="form-group">
                       <label for="first-name-vertical">Room name</label>
                       <input type="text"  class="form-control" name="room_name" placeholder="name" value="{{$a->room_name}}" />
                   </div>
               </div>
               <div class="col-12">
                   <div class="form-group">
                       <label for="email-id-vertical">price</label>
                       <input name="price" type="text" class="form-control" value="{{$a->price}}">
                   </div>
               </div>
               <div class="col-12">
                   <button type="submit" class="btn btn-primary mr-1">Submit</button>
               </div>
           </div>
           </form>
       </div>
     </div>
   </div>
 </div>
 @endforeach
@endsection
