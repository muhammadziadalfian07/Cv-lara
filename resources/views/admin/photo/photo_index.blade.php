@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
 
                @if(Session::has('sukses'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                    {{ Session::get('sukses') }}
                </div>
                @endif
 
                @if(Session::has('gagal'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                    {{ Session::get('gagal') }}
                </div>
                @endif
                <form method="POST" action=" {{url('/admin/photo')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group" >
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile" name="image">
        
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
 
@endsection