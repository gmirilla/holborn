
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<x-app-layout>
    {{ csrf_field() }}

    @php
        $date = new DateTime('now');
        $dt=$date->format('Y-m-d');

    @endphp

    <div class="py-12" style='font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;'>
        <div>
            <div>
                <div class="card-body py-12 bg-white" style="margin-left: 35px; margin-right: 40px;  padding:10px;">
                    <h3 style="text-align: center"><strong>FILTERS</strong></h3> 
                    <form action="/get_csv" method="get">
                        <div class="grid grid-cols-4 gap-4">
                        <div class="form-group">
                            <label for='datefrom'>DATE FROM :</label>
                            <input type="date" value="2024-01-01" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                            text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="datefrom"  name="datefrom">
                        </div>

                        <div class="form-group">
                            <label for='dateto'>DATE TO :</label>
                            <input type="date" value="{{$dt}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                            text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="dateto"  name="dateto">
                        </div>

                        <div class="form-group">
                            <label for='name'>EXPORTER/IMPORTER NAME :</label>
                            <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                            text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="name"  name="name">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> SUBMIT</button>
                    </div>
                    </form>
                
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
