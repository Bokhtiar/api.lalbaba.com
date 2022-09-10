@extends('layouts.admin.app')
@section('title',  @edit ? 'Zip Code Update' : 'Zip Code Create' )

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 


    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Zip Code {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Zip Code</li>
                <li class="breadcrumb-item active">Zip Code {{ @$edit ? 'Update' : 'Create' }} Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="card">
        <div class="card-header">
            {{-- form validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            {{-- form validation errors end --}}
        </div>
        <div class="card-body">
            <h5 class="card-title">Zip Code {{ @$edit ? 'Update' : 'Create' }} Form <a href="@route('admin.banner-bundle.index')" class="btn btn-sm btn-success"><i class="ri-list-unordered"></i></a></h5>
            @if (@$edit)
                <form action="@route('admin.zip-code.update', @$edit->zip_bundle_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('admin.zip-code.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">
                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Zip Bundle Title <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="title" value="{{ @$edit->title }}"
                        placeholder="type here Banner Title">
                </div>
                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Zip Bundle Price <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="price" value="{{ @$edit->price }}"
                        placeholder="type here Banner Price">
                </div>

                <div class="col-md-12 col-lg-12 my-2">
                    <div class="table-responsive">  
                        <table class="table table-bordered" id="dynamic_field">  
                            <tr>  
                                <td><input type="text" name="zip_codes[]" placeholder="Enter Zip Codes" class="form-control name_list" /></td>  
                                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                            </tr>  
                        </table>  
                    </div>
                </div>
                
                <div class="col-md-12 col-lg-12">
                    <label for="">Zip Bundle Body <span class="text-danger"></span></label>
                    <textarea name="body" rows="10" cols="5" class="form-control">
                       {!! @$edit->body !!}
                      </textarea><!-- End Editor -->
                </div>
            </section>
            <br><br><br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>


@section('js')
<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="zip_codes[]" placeholder="Enter zip Codes" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

    });  
</script>
@endsection
@endsection

