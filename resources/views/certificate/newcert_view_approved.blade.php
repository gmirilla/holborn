
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<x-app-layout>

    <div class="py-12">
        <div>
            <div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>APPROVED POLICIES</h1> 
                    <table class="table-auto table table-bordered border border-slate-500 border-separate " 
                    id="laravel_datatable" style="color:antiquewhite; border: 1px solid;">
                        <thead class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left" style="background-color: black"> 
                            <th style="width: 15%; border: 1px solid;">CCI No</th>
                            <th style="width: 25%;border: 1px solid;">EXPORTER</th>
                            <th style="width: 25%;border: 1px solid;">IMPORTER</th>
                            <th style="width: 10%;border: 1px solid;">STATUS</th>
                            <th style="width: 10%;border: 1px solid;">VIEW</th>
                        </thead>
                        @foreach ( $ccilist as $cic)
                        <tr>
                            <td style="border: 1px solid;">{{$cic->cci_id}}</td>
                            <td style="border: 1px solid;">{{$cic->exportersname}}</td>
                            <td style="border: 1px solid;">{{$cic->importersname}}</td>
                            <td style="border: 1px solid;">{{$cic->status}}</td>
                            <td style="border: 1px solid; padding:5px"><a href="/newcert/printcert?id={{$cic->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">VIEW</a></td>
                        </tr>
                        @endforeach 
                            

                    </table>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
     <script>

 $(document).ready( function () {

     $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }
      });

  $('#laravel_datatable').DataTable({

         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ url('cci-list') }}",

          type: 'GET',

          data: function (d) {
          d.start_date = $('#start_date').val();
          d.end_date = $('#end_date').val();
          }
         },
         columns: [

                  { data: 'id', name: 'id' },
                 { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'created_at', name: 'created_at' }
               ]
      });
   });
  $('#btnFiterSubmitSearch').click(function(){
     $('#laravel_datatable').DataTable().draw(true);
  });

</script>
