
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<x-app-layout>
    {{ csrf_field() }}

    <div class="py-12" style='font-family: "Trebuchet MS", Tahoma, sans-serif'>
        <div>
            <div>
                <div class="card-body py-12 bg-white" style="margin-left: 35px; margin-right: 40px;  padding:10px;">
                    <h3 style="text-align: center"><strong>FILTER</strong></h3> 
                    <form action="/newcert/getcciwa" method="get">
                        <div class="grid grid-cols-4 gap-4">
                        <div class="form-group">
                            <label for='datefrom'>DATE FROM :</label>
                            <input type="date" value="2024-01-01" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                            text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="datefrom"  name="datefrom">
                        </div>

                        <div class="form-group">
                            <label for='dateto'>DATE TO :</label>
                            <input type="date" value='{{date("Y-m-d")}}' class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                            text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="dateto"  name="dateto">
                        </div>

                        <div class="form-group">
                            <label for='name'> NAME :</label>
                            <input type="text" value="" placeholder="Importer" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                            text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="name"  name="name">
                        </div>

                        <div class="form-group" style="display: none">
                            <label for='MODE'>MODE:</label>
                            <input type="text" value="{{$qmode}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                            text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="mode"  name="mode">
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> SUBMIT</button>
                    </div>
                    </form>
                
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 style="text-align: center">CERTIFICATES TO BE  {{$qmode}}</h3> 
                    <div class="card-body py-12 bg-white" style="margin: 15px; padding:10px; min-height:400px overflow:auto;">
                    <table class="table-auto table table-bordered border border-slate-500 border-separate even:bg-blue-gray-50/50" 
                    id="laravel_datatable" style="color:black; border: 1px solid; size:80%">
                        <thead class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left" style="background-color: blue"> 
                            <th style="width: 15%; border: 1px solid;">CCI No</th>
                            <th style="width: 25%;border: 1px solid;">EXPORTER</th>
                            <th style="width: 25%;border: 1px solid;">IMPORTER</th>
                            <th style="width: 10%;border: 1px solid;">STATUS</th>
                            <th style="width: 5%;border: 1px solid;">VIEW</th>
                        </thead>
                        @forelse ( $ccilist as $cic)
                        <tr>
                            <td style="border: 1px solid;">{{$cic->cci_id}}</td>
                            <td style="border: 1px solid;">{{$cic->exportersname}}</td>
                            <td style="border: 1px solid;">{{$cic->importersname}}</td>
                            <td style="border: 1px solid;">{{$cic->status}}</td>
                            <td style="border: 1px solid; padding:8px"><a href="/newcert/getcert?id={{$cic->id}}" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">VIEW</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center"><i>NO CERTIFICATES TO BE  {{$qmode}} </i></td>
                        </tr>
                        @endforelse
                            

                    </table>  
                </div>
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
