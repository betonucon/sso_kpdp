@extends('layouts.app')

@push('style')
  <style>
    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: normal;
    }
  </style>
@endpush
@push('datatable')
<script type="text/javascript">
        /*
        Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
        Version: 4.6.0
        Author: Sean Ngu
        Website: http://www.seantheme.com/color-admin/admin/
        */
              $(document).ready(function () {
                var table=$('#data-table-fixed-header').DataTable({
                    lengthMenu: [20,50,100],
                    searching:true,
                    lengthChange:false,
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },
                    dom: 'lrtip',
                    responsive: true,
                    ajax:"{{ url('employe/getdata')}}",
                      columns: [
                        { data: 'id', render: function (data, type, row, meta) 
                            {
                              return meta.row + meta.settings._iDisplayStart + 1;
                            } 
                        },
                        
                        { data: 'action' },
                        { data: 'nik' },
                        { data: 'nama' },
                        
                      ],
                      
                });
                $('#cari_datatable').keyup(function(){
                  table.search($(this).val()).draw() ;
                })

                
            });

       
    </script>
@endpush
@section('content')
    <section class="content-header">
      <h1>
        Mst Barang
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row" id="tampil-dashboard-role">
        
      </div>
      <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-clone"></i> FEATURED NEWS</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        
        
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="btn-group" style="margin-top:5%">
                <button type="button" class="btn btn-success btn-sm" onclick="location.assign(`{{url('employe/view')}}?id={{encoder(0)}}`)"><i class="fa fa-plus"></i> Buat Baru</button>
                
              </div>
              
            </div>
            <div class="col-md-2">
              <!-- <div class="form-group">
                <label>Divisi</label>
                  <select onchange="pilih_jenis(this.value)" class="form-control  input-sm">
                    <option value="">All Data</option>
                    
                  </select>
               
              </div> -->
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label>Cari data</label>
                  <input type="text" id="cari_datatable" placeholder="Search....." class="form-control input-sm">
                  
              </div>
            </div>
          </div>
          <div class="row">
           
            <div class="col-md-12">
              <div class="table-responsive">
                <table id="data-table-fixed-header" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            
                            <th width="5%"></th>
                            <th width="15%">NIK</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    
                </table>
              </div>
            </div>
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
      </div>
      <!-- /.box -->

    </section>
@endsection

@push('ajax')
    <script> 
      function delete_data(id,act){
           
           swal({
               title: "Yakin menghapus data ini ?",
               text: "data akan hilang dari data  ini",
               type: "warning",
               icon: "error",
               showCancelButton: true,
               align:"center",
               confirmButtonClass: "btn-danger",
               confirmButtonText: "Yes, delete it!",
               closeOnConfirm: false
           }).then((willDelete) => {
               if (willDelete) {
                    if(act=='0'){
                       $.ajax({
                           type: 'GET',
                           url: "{{url('employe/delete')}}",
                           data: "id="+id+"&act="+act,
                           success: function(msg){
                               swal("Success! berhasil terhapus!", {
                                   icon: "success",
                               });
                               var tables=$('#data-table-fixed-header').DataTable();
                                  tables.ajax.url("{{ url('employe/getdata')}}").load();
                           }
                       });
                   
                    }else{
                      $.ajax({
                           type: 'GET',
                           url: "{{url('employe/delete')}}",
                           data: "id="+id+"&act="+act,
                           success: function(msg){
                               swal("Success! berhasil ditampilkan!", {
                                   icon: "success",
                               });
                               var tables=$('#data-table-fixed-header').DataTable();
                                  tables.ajax.url("{{ url('employe/getdata')}}?hide=1").load();
                           }
                       });
                    }
                    $("#tampil-dashboard-role").load(); 
               } else {
                   
               }
           });
           
      }   
    </script>   
@endpush
