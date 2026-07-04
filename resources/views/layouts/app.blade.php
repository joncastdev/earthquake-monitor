<!DOCTYPE html>

<html lang="{{ 'es' }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @yield('meta')

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>




  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}




  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  {{--   estilos del template  --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}

  <script type = "text/javascript" src = "https://d3js.org/d3.v4.min.js"></script>

<!--  <script src="https://d3js.org/d3.v5.min.js"></script> -->
<!-- script para que reconoscA EL THEN -->
<script src= 
"https://d3js.org/d3-dsv.v1.min.js"> 
</script> 
<script src= 
"https://d3js.org/d3-fetch.v1.min.js"> 
</script> 

<style type="text/css">

  ::selection { background-color: #E13300; color: white; }
  ::-moz-selection { background-color: #E13300; color: white; }

  body {
    background-color: #fff;
    margin: 40px;
    font: 13px/20px normal Helvetica, Arial, sans-serif;
    color: #4F5155;
  }

  a {
    color: #003399;
    background-color: transparent;
    font-weight: normal;
    text-decoration: none;
  }

  a:hover {
    color: #97310e;
  }

  h1 {
    color: #444;
    background-color: transparent;
    border-bottom: 1px solid #D0D0D0;
    font-size: 19px;
    font-weight: normal;
    margin: 0 0 14px 0;
    padding: 14px 15px 10px 15px;
  }

  code {
    font-family: Consolas, Monaco, Courier New, Courier, monospace;
    font-size: 12px;
    background-color: #f9f9f9;
    border: 1px solid #D0D0D0;
    color: #002166;
    display: block;
    margin: 14px 0 14px 0;
    padding: 12px 10px 12px 10px;
  }

  #body {
    margin: 0 15px 0 15px;
    min-height: 96px;
  }

  p {
    margin: 0 0 10px;
    padding:0;
  }

  p.footer {
    text-align: right;
    font-size: 11px;
    border-top: 1px solid #D0D0D0;
    line-height: 32px;
    padding: 0 10px 0 10px;
    margin: 20px 0 0 0;
  }

  #container {
    margin: 10px;
    border: 1px solid #D0D0D0;
    box-shadow: 0 0 8px #D0D0D0;
  }

  .line {
    fill: none;
    stroke: green;
    stroke-width: 5px;
  }
</style>



<script type="text/javascript">

  let BASE_URL = "{{ url('') }}";       

</script>



</head>
<body class="">
  <div class="min-h-screen bg-gray-100">


    <!-- Page Heading -->
    @if (isset($header))
    <header class="">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>
    @endif

    <!-- Page Content -->
    <main>


     <!-- content -->
     @yield('content')

     <div id="temporal">  


     </div>



     <!-- content end-->

   </main>
 </div>

 <script type="text/javascript">


  // Feel free to change or delete any of the code you see in this editor!
  {{-- var svg = d3.select("body").append("svg") --}}
  var svg = d3.select("#temporal").append("svg")
  .attr("width", 960)
  .attr("height", 600);

    {{--  var properties.mag = 4;
    var properties.title = 'test';
    var fecha = 10;  --}}

    var fecha = 10;



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

      {{-- var properties.mag = data[0].properties.mag;
      var properties.title = data[0].properties.title;  --}}
     {{--  var properties.mag = 7;
      var properties.title = 'test'; --}}
      {{-- var fecha = 2016; --}}

       {{-- console.log(data[0].properties.mag);
      console.log(data[0].properties.title); --}} 

      data.forEach(d => {
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
</body>
</html>
