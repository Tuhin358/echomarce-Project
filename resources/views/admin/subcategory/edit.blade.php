@extends('admin.admin_master')
@section('admin_content')

{{--  @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif  --}}


<div class="row-fluid sortable">
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit SubCategory</h2>

    </div>

    <div class="box-content">
        <form class="form-horizontal" action="{{url('/sub-categories/'.$subcategory->id) }}" method="post" >
            @csrf



            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="date01">SubCategory Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="name" value="{{$subcategory->name}}" >
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Select Category</label>
                    <div class="control">
                        <select name="category" style="margin-left: 20px">
                            <option>Select Category</option>


                            @foreach ($categories as $category)
                            <option  value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach


                        </select>

                    </div>

                </div>



                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2"> Description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="description" rows="3">{{$subcategory->description}}</textarea>
                    </div>

                </div>




                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update </button>
                </div>
            </fieldset>
        </form>

    </div>
</div><!--/span-->
</div><!--/row-->
</div><!--/row-->


@endsection

