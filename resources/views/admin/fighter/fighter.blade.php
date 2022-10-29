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
                        <h2 class="content-header-title float-left mb-0">Fighter Tables</h2>
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
                                    Add fighter
                                  </button>
                            </div>
                            <div class="card-datatable">
                                <table class="dt-multilingual table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>title</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $a )
                                    <tbody>
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$a->title}}</td>
                                            <td><img src="{{ url('/upload/fighter/'.$a->image) }}" style="height: 100px; width: 100px; border-radius: 100%;"></td>
                                            <td>{{$a->created_at->format('D, d M Y H:i')}}</td>
                                            <td>
                                                <a href="" class="btn btn-info" style="border-radius: 100px;" data-toggle="modal" data-target="#view_model-{{$a->id}}"><i data-feather="eye"></i></a>
                                                {{-- <a href="" class="btn btn-info" style="border-radius: 100px;" data-toggle="modal" data-target="#edit_model-{{$a->id}}"><i data-feather="file-text"></i></a> --}}
                                                <a href="{{route('fighter-delete',[$a->id])}}" class="btn btn-danger" style="border-radius: 100px;"><i data-feather="trash"></i></a>
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
          <form action="{{route('fighter-store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="first-name-vertical">title</label>
                        <input type="text"  class="form-control" name="title" placeholder=""/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="first-name-vertical">image</label>
                        <input type="file"  class="form-control" name="image" placeholder=""/>
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
  <!-- view_Modal -->
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
                <p class="form-control-static">{{$a->title}}</p>
            </div>
        </div>
                 <div class="row form-group">
                 <div class="col col-md-3"><label class=" form-control-label">image</label>
                 </div>
                 <div class="col-12 col-md-9">
                     <p class="form-control-static"><img src="{{ url('/upload/fighter/'.$a->image) }}" style="height: 200px; width: 200px; border-radius: 100%;"></p>
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
           <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{url("banner_edit",$a->id)}}">
               @csrf
             @method('PUT')
             <div class="row">
               <div class="col-12">
                   <div class="form-group">
                       <label for="first-name-vertical">title</label>
                       <input type="text"  class="form-control" name="title" placeholder="name" value="{{$a->title}}" />
                   </div>
               </div>
               <div class="col-12">
                   <div class="form-group">
                       <label for="email-id-vertical">description</label>
                       <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$a->description}}</textarea>
                   </div>
               </div>
               <div class="col-12">
                   <div class="form-group">
                       <label for="password-vertical">Image</label>
                       <img src="{{url('/upload/blog/'.$a->image)}}" alt="" style="height: 100px; width: 100px; border-radius: 100%;">
                       <input type="file"  class="form-control" name="image" placeholder="" />
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
