@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			Pemesanan
			<hr>
			<table class="table table-responsive table-bordered table-rows">
				<thead>
					<tr>
						<th width="190">Nama Pembeli</th>
						<th width="190">Jenis Tiket</th>
						<th width="190">Asal</th>
						<th width="190">Tujuan</th>
						<th width="190">Harga</th>
						<th width="190">Nama Rekening</th>
						<th width="190">Tanggal</th>
						<th width="190"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($pemesanan as $p)
					<tr>
						<td>{{$p -> pembeli }}</td>
						<td>{{$p -> jenistiket }}</td>
						<td>{{$p -> asal }}</td>
						<td>{{$p -> tujuan }}</td>
						<td>{{$p -> harga }}</td>
						<td>{{$p -> namarekening }}</td>
						<td>{{$p -> created_at }}</td>
						<!-- <td><a href="/admin/pemesanan/tiket/{{$p -> id }}" class="btn btn-primary">Generate Tiket</a></td> -->
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$p->id}}">
  							Generate
							</button>
						</td>
					</tr>
					<div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  						<div class="modal-dialog">
    						<div class="modal-content">
      							<div class="modal-header">
        							<h5 class="modal-title" id="exampleModalLabel">Generate Tiket</h5>
       								 	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          								<span aria-hidden="true">&times;</span>
        								</button>
      							</div>
      							<form action="/admin/pemesanan/tiket/{{$p->id}}" method="post" enctype="multipart/form-data">
      								@csrf
      							<div class="modal-body">
      								<div class="form-group">
      									<label>Nama Pembeli</label>
      								<input type="text" readonly value="{{$p->pembeli}}" name="namapembeli" class="form-control">
      								</div>
      								<div class="form-group">
      									<label>Jenis Tiket</label>
      								<input type="text" readonly value="{{$p->jenistiket}}" name="jenistiket" class="form-control">
      								</div>
      								<div class="form-group">
      									<label>Asal</label>
      								<input type="text" readonly value="{{$p->asal}}" name="asal" class="form-control">
      								</div>
      								<div class="form-group">
      									<label>Tujuan</label>
      								<input type="text" readonly value="{{$p->tujuan}}" name="tujuan" class="form-control">
      								</div>
      								<div class="form-group">
      									<label>Kadaluarsa</label>
      								<input type="date" name="kadaluarsa" class="form-control">
      								</div>
      								<div class="form-group">
      									<label>Status</label>
      									<select class="form-control" name="status">
      										<option disabled selected>Pilih Status</option>
      										<option value="aktif">Aktif</option>
      										<option value="nonaktif">Non Aktif</option>

      									</select>
      								</div>
      							</div>
      							<div class="modal-footer">
        						<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
        						<input type="submit" class="btn btn-primary" value="Generate">
        						<!-- <button type="button" class="btn btn-primary">Generate</button> -->
      						</div>
      							</form>
      							
    					</div>
  					</div>
				</div>
					@endforeach
				</tbody>
			</table>
			<!-- Modal -->

		</div>
	</div>
</div>
@endsection