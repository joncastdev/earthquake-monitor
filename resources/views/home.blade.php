@extends('layouts/app')
@section('meta')


<title>Tienda Pokémon | Ecommerce online</title> 

<link rel="canonical" href="{{env('APP_URL')}}" />

<meta name="description" content="Tienda Online Caracas / Venezuela,cartas tcg,tazos,albums, Ofertas, Promociones, Descuentos en tiendapokemon.store">

<title>jQuery UI Datepicker - Default functionality</title>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.2/themes/base/jquery-ui.css">
{{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.2/jquery-ui.js"></script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>



@endsection 

@section('content')

{{-- <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script> --}}


{{-- @if(!Auth::user())   
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>


@endif --}}

<style type="text/css">
	

	{{-- .custom-info {
		padding: 4px;
		/*padding-top:0px;*/
			/*padding-bottom:  30px;
			padding-left: 30px;*/
		}

		p{
			font-size: 18px;  
		} --}}


		
/*
	#mainContent div.FCKEditor {
		margin: 0 -14px 0 -6px;width: 
		}*/

	</style>
	
	{{-- @include('inc/navbar') --}}
	


	<div class="row">

		<div class="col-12">

			{{-- @include('inc/categories') --}}

		</div>

	</div>
	<br>

	<div class="row subforum">

		<div class="container">

			<div class="card">

				<div class="card-body">

					<h1 class="display-4">Aplicaciòn de Sismos</h1>

					<p>Date: <input type="text" id="datepicker"></p>
					<hr>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>

					<div class="col-12">  
						<div id="mapid" style="width: 100%;height: 480px;box-shadow: 5px 5px 5px #888;"></div>
					</div>
					<hr>



					<div class="row">				

						<div class="col-sm-4">

							<div class="card">

								<div class="card-header">

									<div class="myTable">	

									</div>

									<div class="myTable1">	

									</div>

									
									{{-- <table id="myTable" class="table table-responsive">     

										<thead class="thead-dark">
											<tr>

												<th>place</th>
                                     

              </tr>
            </thead>                       

          </table>   --}}


        </div>



      </div>

    </div>



    <div class="pagination">

    	{{-- {!! $products->links() !!} --}}
    </div>				



  </div> 

<!-- end row -->



<br>

<!-- end row -->



<br>

</div>

</div>

</div>

</div>

<script>
	$( function() {
		$( "#datepicker" ).datepicker();
	} );
</script> 

<script>

	$.ajax({
		url: BASE_URL+'/api/getdata',   
		dataType: 'json'    
	})
	.done(function(result) {

		console.log(result[0]);


		$.each(result[0], function(index, val) {

			$(".myTable").append(
				`<table>
  <thead>
    <tr>
      <th>${index}</th>      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>${val}</td>      
    </tr>    
  </tbody>
</table>
			`)


		});

		$.each(result[1], function(index, val) {

			$(".myTable1").append(
				`<table>
  <thead>
    <tr>
      <th>${index}</th>      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>${val}</td>      
    </tr>    
  </tbody>
</table>
			`)


		});

	});

</script>

<script>
	
	var marker;

	var markes;

	var map = L.map('mapid');


	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  // attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
		maxZoom: 18
	}).addTo(map);

	L.control.scale().addTo(map);



	$.ajax({
		url: BASE_URL+'/api/getdata',   
		dataType: 'json'    
	})
	.done(function(result) {

		{{-- console.log(result.coordinates[0]); --}}

		{{-- for (let i = 0; i < result.length; i++) {   --}}

		view = map.setView([result[1].coordinates[1],result[1].coordinates[0]],result[1].coordinates[2]);


		//aqui no es necesario
		{{-- marker =  L.marker(result[1].coordinates[1],result[1].coordinates[0]).addTo(map); --}}

		{{-- marker.bindPopup(result.coordinates[1],result.coordinates[0]).addTo(map).openPopup(); --}}

		{{-- marker.bindPopup(result[1].coordinates[1],result[1].coordinates[0]).addTo(map); --}}

		var marker = L.marker([result[1].coordinates[1], result[1].coordinates[0]]).addTo(map);
		marker.bindPopup(result[0].title)

		{{-- var marker = L.marker([10.488, -66.879]).addTo(map);
		marker.bindPopup("<b>Hola desde Caracas!</b><br>Este es un popup personalizado.") --}}

		var circle = L.circle([result[1].coordinates[1], result[1].coordinates[0]], {
			color: 'red',
			fillColor: '#f03',
			fillOpacity: 0.5
			{{-- radius: result[0].sig --}}
			{{-- radius: 200000 --}}
		}).addTo(map);


		{{-- var circle = L.circle([10.49577, -66.911959,17], {
			color: 'green',
			fillColor: '#f03',
			fillOpacity: 0.5,
			radius: 500
		}).addTo(map);
 --}}


		{{-- 	view = map.setView([result[i].lat,result[i].long],2);

			marker =  L.marker([result[i].lat,result[i].long]).addTo(map);

			marker.bindPopup(result[i].country).addTo(map);  --}} 

			{{-- } --}}


		});

	</script>

	{{-- @include('inc/footer') --}}
	@endsection 




