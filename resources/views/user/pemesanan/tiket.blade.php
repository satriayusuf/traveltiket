@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			@if ($message = Session::get('success'))
	  <div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>	
		  <strong>{{ $message }} <br> Silahkan Transfer ke 4310202020 A/n Econ Ganteng
		  	<a href="/home/tiket">Cek Status Tiket mu disini</a>
		  </strong>
	  </div>
	@endif
			<form action="{{route('tiketproses')}}" enctype="multipar/form-data" method="post">
				@csrf
				<div class="form-group">
					<label>Nama Pembeli</label>
					<input type="text" name="pembeli" value="{{Auth::user()->name}}" class="form-control">
				</div>
				<div class="form-group">
					<label>Jenis Tiket</label>
					<select class="form-control" name="jenistiket">
						<option disabled selected>Pilih Jenis Tiket</option>
						<option value="ekonomi">Ekonomi</option>
						<option value="vip1">Vip - 1</option>
						<option value="vip2">Vip - 2</option>
					</select>
				</div>
				<div class="form-group">
					<label>Asal</label>
					<input type="text" readonly class="form-control" value="Cianjur" name="asal">
				</div>
				<div class="form-group">
					<label>Tujuan</label>
					<select class="form-control" name="tujuan" id="tujuan" onchange="functionHarga()">
						<option disabled selected> Pilih Tujuan</option>
						<option value="jakarta">Jakarta</option>
						<option value="bandung">Bandung</option>
						<option value="sukabumi">Sukabumi</option>
						<option value="garut">Garut</option>
						<option value="tasikmalaya">Tasikmalaya</option>
						<option value="bogor">Bogor</option>
					</select>
				</div>
				<div class="form-group">
					<label>Harga</label>
					<input type="text" class="form-control" name="harga" id="harga" value="" readonly>
				</div>
				<div class="form-group">
					<label>Nama Rekening</label>
					<input type="text" class="form-control" name="namarekening">
				</div>
 		<input type="submit" class="btn btn-success" value="Pesan Sekarang">

			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	function functionHarga() {
		const x = document.getElementById("tujuan").value;
		if( x == 'jakarta'){
			document.getElementById("harga").value = '40000';
		}
		else if ( x == 'bandung'){
			document.getElementById("harga").value = '50000';
		}
		else if ( x == 'sukabumi'){
			document.getElementById("harga").value = '20000';
		}
		else if ( x == 'garut'){
			document.getElementById("harga").value = '80000';
		}
		else if ( x == 'tasikmalaya'){
			document.getElementById("harga").value = '100000';
		}
		else if ( x == 'bogor'){
			document.getElementById("harga").value = '30000';
		}else{
			document.getElementById("harga").value = 'pilih tujuan'
		}
		// document.getElementById("harga").value = x;
	}
</script>
@endsection