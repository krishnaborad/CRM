@extends('admin.layouts.adminapp')
@section('content')
<!-- Content Header (Page header) -->
<section class="box-body">

  <h1>Category details</h1>
      <section class="content">
          <div class="box" id="example2">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                  title="Collapse">
                            <i class="fa fa-minus"></i></button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                        </div>
                      </div>

                  <!-- Flash successfull Message Start -->

                  <!-- Flash successfull message End -->
                      <br>


                    <form method="post" for="cat" action="{{ url('admin/category/deleteall')}}">{{ csrf_field() }}
                        <p>
                        <a class="btn btn-info" href="{{ url('admin/category/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add New Category</a>
                            <button type="submit"class="btn btn-danger waves-effect waves-light deleteText" >Delete All Selected</button>
                    <br> <br>
                    <table class="table table-bordered table-striped datatable">
                       <thead>
                           <tr>
                               <th>All<br><INPUT type="checkbox" name="delete_id[]" onchange="checkAll(this)" /></th>
                               <th >Id</th>
                               <th >Category</th>
                               <th > Company</th>
                               <th >Created at</th>
                               <th >Action</th>
                           </tr>
                       </thead>
                       @foreach($categorys as $category)
                           <tr>
                               <td>
                                   <INPUT type="checkbox" name="delete_id[]"  value="{{$category->id}}" />
                               </td>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $category->name }}</td>
                               <td>{{(isset( $category->company->name ))? $category->company->name : ""}}</td>
                               <td>{{ $category->created_at }}</td>
                               <td>
                                   <a href="{{ url('admin/category/edit/' . $category->id) }}"class="btn btn-success" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a>

                                   <a href="{{ url('admin/category/delete/' . $category->id)}}"class="btn btn-danger waves-effect waves-light deleteText" >
                                   <i class="fa fa-trash-o" aria-hidden="true" ></i>  Delete</a>
                               </td>
                           </tr>
                       @endforeach

                       </tbody>

                   </table>

                </form>
            </div>
        </section>
        </section>
    </div>
@endsection
<script type="text/javascript">

    $(document).ready(function() {
    $('#table').DataTable();
    } );

</script>
<script>
    function checkAll(ele)
     {
        var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++)
                 {
                    if (checkboxes[i].type == 'checkbox')
                     {
                        checkboxes[i].checked = true;
                    }
                }
            }
            else
             {
                 for (var i = 0; i < checkboxes.length; i++)
                  {
                     console.log(i)
                     if (checkboxes[i].type == 'checkbox')
                      {
                         checkboxes[i].checked = false;
                       }
                   }
               }
           }

</script>
