@extends('admin_template')
@section('content')
      <div class="row">
        <div class="col-xs-4">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Ambil Mata Kuliah</h3>
            </div>
            <div class="box-body">
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
              <form action="{{ route('tambahmatkul')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>NRP</label>
                    <input type="text" class="form-control" name="nrp" placeholder="Masukkan NRP">
                </div>
                <div class="form-group">
                    <label>Kode Mata Kuliah</label>
                    <select name="matkul" class="form-control">
                      <option value=""> Pilih Maktul </option>
                      @foreach($matkuls as $key => $matkul)

                      <option value="{{$matkul->id_matkul}}"> {{$matkul->nama_matkul}}</option>

                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kode Kelas</label>
                    <select name="kelas" class="form-control">
                      <option value=""> Pilih Kelas </option>
                      @foreach($kelass as $key => $kelas)

                      <option value="{{$kelas->id_kelas}}"> {{$kelas->nama_kelas}}</option>

                      @endforeach
                    </select>
                </div>
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        <!-- /.box-footer-->
          </div>
        </div>
        <div class="col-xs-8">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List</h3>
            </div>
            <div class="box-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Mata Kuliah</th>
                    <th>Kelas</th>
                    <th>Action</th>
                  <tr>
                </thead>
                <tbody>
                  @isset($matkul_ambils)
                  @foreach($matkul_ambils as $key => $event)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$event->matkulDiambil->nama_matkul}}</td>
                      <td>{{$event->kelasDiambil->nama_kelas}}</td>                     
                      <td><a href="{{url('/matkul')}}?id_matkul={{$event->id_matkul}}&id_kelas={{$event->id_kelas}}">Peserta</a></td>
                      

                      

                    </tr>
                  @endforeach
                  @endisset
                </tbody>          
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              @isset($events) {{$events->links()}} @endisset
            </div>
        <!-- /.box-footer-->
          </div>
        </div>
      </div>

      
      <!-- /.row -->
      <!-- Main row -->


          <!-- /.box -->

       
        <!-- right col -->
      
      <!-- /.row (main row) -->

   


    
@endsection

@section('js')

<script type="text/javascript">
  $(function () {
    $('.event').on('click', function() {
      var $row = $(this).closest("tr");
          $tds = $row.find("td:nth-child(1)");
      console.log($(this).data('id'));
      console.log($tds.text());
    });
  });
</script>
<script>
  $( function() {
    $( "#datepickerstart" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
    $( "#datepickerend" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  });

  // Getter
  // var dateFormat = $( ".selector" ).datepicker( "option", "dateFormat" );
   
  // // Setter
  // $( ".selector" ).datepicker( "option", "dateFormat", "yyyy-mm-dd" );
  </script>

@endsection

      </div>
    </div>

  </div>
</div>

