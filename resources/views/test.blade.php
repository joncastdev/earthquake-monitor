@extends('layouts/app')
@section('meta')


<title>Aplicación web de monitoreo de terremotos</title> 

<link rel="canonical" href="{{env('APP_URL')}}" />

<meta name="description" content="Tienda Online Caracas / Venezuela,cartas tcg,tazos,albums, Ofertas, Promociones, Descuentos en tiendapokemon.store">

<title>jQuery UI Datepicker - Default functionality</title>
{{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.2/themes/base/jquery-ui.css"> --}}
{{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}

{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}




 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


 <script type = "text/javascript" src = "https://d3js.org/d3.v4.min.js"></script>

<!-- 	<script src="https://d3js.org/d3.v5.min.js"></script> -->
<!-- script para que reconoscA EL THEN -->
<script src= 
"https://d3js.org/d3-dsv.v1.min.js"> 
</script> 
<script src= 
"https://d3js.org/d3-fetch.v1.min.js"> 
</script> 

	



@endsection 

@section('content')



<div id=test>

	<p>test</p>
	
</div>


<script type="text/javascript">


  // Feel free to change or delete any of the code you see in this editor!
  {{-- var svg = d3.select("body").append("svg") --}}
  var svg = d3.select("#test").append("svg")
  .attr("width", 960)
  .attr("height", 600);

    {{--  var properties.mag = 4;
    var properties.title = 'test';
    var fecha = 10;  --}}

    let fecha = 2026;



    var tickDuration = 500;

    var top_n = 12;
    var height = 600;
    var width = 960;

    const margin = {
      top: 80,
      right: 0,
      bottom: 5,
      left: 0
    };

    let barPadding = (height-(margin.bottom+margin.top))/(top_n*5);



    let year = 2000;




// d3.csv('brand_values.csv').then(function(data) {
    {{-- d3.json("http://localhost/graficos/welcome/gettotalchart/").then(function(data) { --}}
    {{-- d3.json(BASE_URL + '/api/getdata').then(function(data) { --}}
    d3.json(BASE_URL + '/api/getdata').then(function(data) {

      {{-- console.log(d3); --}}

      {{-- var properties.mag = data[0].properties.mag;
      var properties.title = data[0].properties.title;  --}}
     {{--  var properties.mag = 7;
      var properties.title = 'test'; --}}
      {{-- var fecha = 2016; --}}

       {{-- console.log(data[0].properties.mag);
      console.log(data[0].properties.title); --}} 


   {{--  data.forEach(d => {
       d.value = +d.value,
          d.lastValue = +d.lastValue,
          d.value = isNaN(d.value) ? 0 : d.value,
          d.year = +d.year,
          d.colour = d3.hsl(Math.random()*360,0.75,0.75)
    });  --}}

      data.forEach(d => {
        {{-- d.properties.mag = +d.properties.mag, --}}
        d.properties.mag = +d.properties.mag,
         // d.lastValue = +d.lastValue,
        d.lastValue = +d.properties.mag,
        d.properties.mag = isNaN(d.properties.mag) ? 0 : d.properties.mag,
        d.year = +d.fecha,
        d.colour = d3.hsl(Math.random()*360,0.75,0.75)

        {{-- console.log(d); --}}
        console.log(d.properties.mag);
      });

      {{-- console.log(d.properties.mag); --}}

   // let yearSlice = data.filter(d => d.year == year && !isNaN(d.value))
   //    .sort((a,b) => b.value - a.value)
   //    .slice(0, top_n);

      let yearSlice = data.filter(d => d.fecha == year && !isNaN(d.properties.mag))
      .sort((a,b) => b.properties.mag - a.properties.mag)
      .slice(0, top_n);

      {{-- console.log(yearSlice); --}}

      yearSlice.forEach((d,i) => d.rank = i);

      {{-- console.log('yearSlice: ', yearSlice) --}}

   // let x = d3.scaleLinear()
   //    .domain([0, d3.max(yearSlice, d => d.value)])
   //    .range([margin.left, width-margin.right-65]);

      let x = d3.scaleLinear()
      .domain([0, d3.max(yearSlice, d => d.properties.mag)])
      .range([margin.left, width-margin.right-65]);

      let y = d3.scaleLinear()
      .domain([top_n, 0])
      .range([height-margin.bottom, margin.top]);

      let xAxis = d3.axisTop()
      .scale(x)
      .ticks(width > 500 ? 5:2)
      .tickSize(-(height-margin.top-margin.bottom))
      .tickFormat(d => d3.format(',')(d));

      svg.append('g')
      .attr('class', 'axis xAxis')
      .attr('transform', `translate(0, ${margin.top})`)
      .call(xAxis)
      .selectAll('.tick line')
      .classed('origin', d => d == 0);

   // svg.selectAll('rect.bar')
   //    .data(yearSlice, d => d.name)
   //    .enter()
   //    .append('rect')
   //    .attr('class', 'bar')
   //    .attr('x', x(0)+1)
   //    .attr('width', d => x(d.value)-x(0)-1)
   //    .attr('y', d => y(d.rank)+5)
   //    .attr('height', y(1)-y(0)-barPadding)
   //    .style('fill', d => d.colour);

      svg.selectAll('rect.bar')
      .data(yearSlice, d => d.properties.title)
      .enter()
      .append('rect')
      .attr('class', 'bar')
      .attr('x', x(0)+1)
      .attr('width', d => x(d.properties.mag)-x(0)-1)
      .attr('y', d => y(d.rank)+5)
      .attr('height', y(1)-y(0)-barPadding)
      .style('fill', d => d.colour);

   // svg.selectAll('text.label')
   //    .data(yearSlice, d => d.name)
   //    .enter()
   //    .append('text')
   //    .attr('class', 'label')
   //    .attr('x', d => x(d.value)-8)
   //    .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1)
   //    .style('text-anchor', 'end')
   //    .html(d => d.name);

      svg.selectAll('text.label')
      .data(yearSlice, d => d.properties.title)
      .enter()
      .append('text')
      .attr('class', 'label')
      .attr('x', d => x(d.properties.mag)-8)
      .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1)
      .style('text-anchor', 'end')
      .html(d => d.properties.title);

   // svg.selectAll('text.valueLabel')
   //    .data(yearSlice, d => d.name)
   //    .enter()
   //    .append('text')
   //    .attr('class', 'valueLabel')
   //    .attr('x', d => x(d.value)+5)
   //    .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1)
   //    .text(d => d3.format(',.0f')(d.lastValue));

      svg.selectAll('text.valueLabel')
      .data(yearSlice, d => d.properties.title)
      .enter()
      .append('text')
      .attr('class', 'valueLabel')
      .attr('x', d => x(d.properties.mag)+5)
      .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1)
      .text(d => d3.format(',.0f')(d.properties.mag));

   // let yearText = svg.append('text')
   //    .attr('class', 'yearText')
   //    .attr('x', width-margin.right)
   //    .attr('y', height-25)
   //    .style('text-anchor', 'end')
   //    .html(~~year)
   //    .call(halo, 10);

      let yearText = svg.append('text')
      .attr('class', 'yearText')
      .attr('x', width-margin.right)
      .attr('y', height-25)
      .style('text-anchor', 'end')
      .html(~~fecha)
      .call(halo, 10);

      let ticker = d3.interval(e => {

      // yearSlice = data.filter(d => d.year == year && !isNaN(d.value))
      //    .sort((a,b) => b.value - a.value)
      //    .slice(0,top_n);

         //  yearSlice = data.filter(d => d.fecha == year && !isNaN(d.properties.mag))
         // .sort((a,b) => b.properties.mag - a.properties.mag)
         // .slice(0,top_n);

        yearSlice = data.filter(d => d.fecha > 1 && !isNaN(d.properties.mag))
        .sort((a,b) => b.properties.mag - a.properties.mag)
        .slice(0,top_n);

        yearSlice.forEach((d,i) => d.rank = i);

      //console.log('IntervalYear: ', yearSlice);

      // x.domain([0, d3.max(yearSlice, d => d.value)]); 

      // aqui se inserta
        x.domain([0, d3.max(yearSlice, d => d.properties.mag)]); 

        svg.select('.xAxis')
        .transition()
        .duration(tickDuration)
        .ease(d3.easeLinear)
        .call(xAxis);

      // let bars = svg.selectAll('.bar').data(yearSlice, d => d.name);

        let bars = svg.selectAll('.bar').data(yearSlice, d => d.properties.title);

      // bars
      //    .enter()
      //    .append('rect')
      //    .attr('class', d => `bar ${d.name.replace(/\s/g,'_')}`)
      //    .attr('x', x(0)+1)
      //    .attr( 'width', d => x(d.value)-x(0)-1)
      //    .attr('y', d => y(top_n+1)+5)
      //    .attr('height', y(1)-y(0)-barPadding)
      //    .style('fill', d => d.colour)
      //    .transition()
      //    .duration(tickDuration)
      //    .ease(d3.easeLinear)
      //    .attr('y', d => y(d.rank)+5);

        bars
        .enter()
        .append('rect')
        .attr('class', d => `bar ${d.properties.title.replace(/\s/g,'_')}`)
        .attr('x', x(0)+1)
        .attr( 'width', d => x(d.properties.mag)-x(0)-1)
        .attr('y', d => y(top_n+1)+5)
        .attr('height', y(1)-y(0)-barPadding)
        .style('fill', d => d.colour)
        .transition()
        .duration(tickDuration)
        .ease(d3.easeLinear)
        .attr('y', d => y(d.rank)+5);

      // bars
      //    .transition()
      //    .duration(tickDuration)
      //    .ease(d3.easeLinear)
      //    .attr('width', d => x(d.value)-x(0)-1)
      //    .attr('y', d => y(d.rank)+5);

        bars
        .transition()
        .duration(tickDuration)
        .ease(d3.easeLinear)
        .attr('width', d => x(d.properties.mag)-x(0)-1)
        .attr('y', d => y(d.rank)+5);

      // bars
      //    .exit()
      //    .transition()
      //    .duration(tickDuration)
      //    .ease(d3.easeLinear)
      //    .attr('width', d => x(d.value)-x(0)-1)
      //    .attr('y', d => y(top_n+1)+5)
      //    .remove();

        bars
        .exit()
        .transition()
        .duration(tickDuration)
        .ease(d3.easeLinear)
        .attr('width', d => x(d.properties.mag)-x(0)-1)
        .attr('y', d => y(top_n+1)+5)
        .remove();

      // let labels = svg.selectAll('.label')
      //    .data(yearSlice, d => d.name);

        let labels = svg.selectAll('.label')
        .data(yearSlice, d => d.properties.title);

      // labels
      //    .enter()
      //    .append('text')
      //    .attr('class', 'label')
      //    .attr('x', d => x(d.value)-8)
      //    .attr('y', d => y(top_n+1)+5+((y(1)-y(0))/2))
      //    .style('text-anchor', 'end')
      //    .html(d => d.name)    
      //    .transition()
      //    .duration(tickDuration)
      //    .ease(d3.easeLinear)
      //    .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1);

        labels
        .enter()
        .append('text')
        .attr('class', 'label')
        .attr('x', d => x(d.properties.mag)-8)
        .attr('y', d => y(top_n+1)+5+((y(1)-y(0))/2))
        .style('text-anchor', 'end')
        .html(d => d.properties.title)    
        .transition()
        .duration(tickDuration)
        .ease(d3.easeLinear)
        .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1);


      // labels
      //    .transition()
      //    .duration(tickDuration)
      //    .ease(d3.easeLinear)
      //    .attr('x', d => x(d.value)-8)
      //    .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1);

        labels
        .transition()
        .duration(tickDuration)
        .ease(d3.easeLinear)
        .attr('x', d => x(d.properties.mag)-8)
        .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1);

      // labels
      //    .exit()
      //    .transition()
      //    .duration(tickDuration)
      //    .ease(d3.easeLinear)
      //    .attr('x', d => x(d.value)-8)
      //    .attr('y', d => y(top_n+1)+5)
      //    .remove();

        labels
        .exit()
        .transition()
        .duration(tickDuration)
        .ease(d3.easeLinear)
        .attr('x', d => x(d.properties.mag)-8)
        .attr('y', d => y(top_n+1)+5)
        .remove();



      // let valueLabels = svg.selectAll('.valueLabel').data(yearSlice, d => d.name);

        let valueLabels = svg.selectAll('.valueLabel').data(yearSlice, d => d.properties.title);

      // valueLabels
      //    .enter()
      //    .append('text')
      //    .attr('class', 'valueLabel')
      //    .attr('x', d => x(d.value)+5)
      //    .attr('y', d => y(top_n+1)+5)
      //    .text(d => d3.format(',.0f')(d.lastValue))
      //    .transition()
      //    .duration(tickDuration)
      //    .ease(d3.easeLinear)
      //    .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1);

        valueLabels
        .enter()
        .append('text')
        .attr('class', 'valueLabel')
        .attr('x', d => x(d.properties.mag)+5)
        .attr('y', d => y(top_n+1)+5)
        .text(d => d3.format(',.0f')(d.properties.mag))
        .transition()
        .duration(tickDuration)
        .ease(d3.easeLinear)
        .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1);

      // valueLabels
      //    .transition()
      //    .duration(tickDuration)
      //    .ease(d3.easeLinear)
      //    .attr('x', d => x(d.value)+5)
      //    .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1)
      //    .tween("text", function(d) {
      //       let i = d3.interpolateRound(d.lastValue, d.value);
      //       return function(t) {
      //          this.textContent = d3.format(',')(i(t));
      //       };
      //    });

        valueLabels
        .transition()
        .duration(tickDuration)
        .ease(d3.easeLinear)
        .attr('x', d => x(d.properties.mag)+5)
        .attr('y', d => y(d.rank)+5+((y(1)-y(0))/2)+1)
        .tween("text", function(d) {
          let i = d3.interpolateRound(d.properties.mag, d.properties.mag);
          return function(t) {
           this.textContent = d3.format(',')(i(t));
         };
       });


      // valueLabels
      //    .exit()
      //    .transition()
      //    .duration(tickDuration)
      //    .ease(d3.easeLinear)
      //    .attr('x', d => x(d.value)+5)
      //    .attr('y', d => y(top_n+1)+5)
      //    .remove();

        valueLabels
        .exit()
        .transition()
        .duration(tickDuration)
        .ease(d3.easeLinear)
        .attr('x', d => x(d.properties.mag)+5)
        .attr('y', d => y(top_n+1)+5)
        .remove();

      // yearText.html(~~year);

        yearText.html(~~fecha);

   //    if(year == 2001) ticker.stop();
   //    year = d3.format('.1f')((+year) + 0.1);
   // },tickDuration);


        if(year > 1) ticker.stop();
        year = d3.format('.1f')((+year) + 0.1);
      },tickDuration);

});

const halo = function(text, strokeWidth) {
 text.select(function() { return this.parentNode.insertBefore(this.cloneNode(true), this); })
 .style('fill', '#ffffff')
 .style('stroke','#ffffff')
 .style('stroke-width', strokeWidth)
 .style('stroke-linejoin', 'round')
 .style('opacity', 1);

}   




</script>

@endsection 






	

	
	


