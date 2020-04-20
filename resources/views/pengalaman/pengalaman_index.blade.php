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
 
                <a href="{{ url('admin/manage-pengalaman/add') }}" class="btn btn-flat btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Pengalaman</a>
               
                <table class="table table-stripped myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Perusahaan</th>
                            <th>Jabatan</th>
                            <th>Dari</th>
                            <th>Sampai</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengalaman as $index=>$pl)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $pl->nama }}</td>
                            <td>{{ $pl->jabatan }}</td>
                            <td>{{ $pl->dari }}</td>
                            <td>{{ $pl->sampai }}</td>
                            <td>{{ $pl->deskripsi }}</td>
                            <td>   
                                <a href="{{ url('admin/manage-pengalaman/'.$pl->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
                                <a href="" data="{{ $pl->id }}" class="btn-hapus"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
 
            </div>
        </div>
    </div>
</div>
 
<div class="modal modal-danger fade" id="modal-hapus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data</h4>
                </div>
                <div class="modal-body">
                    <p>Yakin Hapus Data?</p>
                </div>
                <form method="post" action="">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline">Hapus</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
 
    @endsection
 
    @section('scripts')
 
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btn-hapus').click(function(e){
                e.preventDefault();
                var id = $(this).attr('data');
                var url = "{{ url('admin/manage-pengalaman') }}"+'/'+id;
                $('#modal-hapus').find('form').attr('action',url);
                $('#modal-hapus').modal();
            })
        })
    </script>
 
    @endsection