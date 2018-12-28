@extends('admin_template')
@section('content')
      <div class="row">
        
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List</h3>
            </div>
            <div class="box-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NRP</th>
                    <th>Nama</th>

                    
                  <tr>
                </thead>
                <tbody>
                  @isset($matkul_ambils)
                  @foreach($matkul_ambils as $key => $event)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$event->mahasiswaDiambil->nrp}}</td>
                      <td>{{$event->mahasiswaDiambil->nama}}</td>
                      
                      

                      

                    </tr>
                  @endforeach
                  @endisset
                </tbody>          
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              {{$matkul_ambils->links()}}
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

