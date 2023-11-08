@extends('layout.master')
@section('content')
<div class="infoRow xy-between">
	<div class="infoCard cardClr1 xy-center">
		<p class="amount">Guest</p>
		<p class="desc">1,093 Users</p>
	</div>
	<div class="infoCard cardClr2 xy-center">
		<p class="amount">Artists</p>
		<p class="desc">781 Artists </p>
	</div>
	<div class="infoCard cardClr3 xy-center">
		<p class="amount">Events</p>
		<p class="desc">64 Total Events</p>
	</div>
</div>

<div class="graphBox mb-5">
	<p class="genHeading pb-2">Guests Statistics</p>
	<div class="chartWrap">
		<div style="width:100%;">
			<div class="chartjs-size-monitor">
				<div class="chartjs-size-monitor-expand">
					<div class=""></div>
				</div>
				<div class="chartjs-size-monitor-shrink">
					<div class=""></div>
				</div>
			</div>
			<canvas id="canvas" style="display: block; width: 100%; height: 200px;" width="1379" height="400" class="chartjs-render-monitor"></canvas>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-12 col-12">
		<div class="graphBox d-flex align-items-center">
			<div class="textBox">
				<p class="genHeading pb-2 double-border">Artists Statistics</p>
				<p class="desc pt-2">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to mak type and scrambled it to make a type specimen book.
				</p>
			</div>
			<div class="graphSide">
				<div class="pieWrap">
					<canvas id="static" class="custome-chart-2" width="250" height="250" style="display: block; box-sizing: border-box; height: 250px; width: 250px;" class=""></canvas>
				</div>
			</div>

		</div>
	</div>
	<div class="col-lg-6 col-md-12 col-12">
		<div class="graphBox d-flex align-items-center">
			<div class="textBox">
				<p class="genHeading pb-2 double-border">Artists Statistics</p>
				<p class="desc pt-2">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to mak type and scrambled it to make a type specimen book.
				</p>
			</div>
			<div class="graphSide">
				<div class="chartWrap w-100">
					<canvas class="custome-chart" id="myChart-1" width="240" height="240" style="display: block; box-sizing: border-box; height: 240px; width: 240px;">
					</canvas>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection