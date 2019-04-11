@extends('layouts.panel')

@section('page_title')
    Edit Akun Anak

@endsection

@section('content_section')
    <div class="panel panel-flat">
        <div class="panel-body">

        {{-- Validasi  --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal" action="{!! route('orangtua.registeration.update',['id'=>$siswa->id]) !!}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
        	<fieldset class="content-group">
                <legend class="text-bold">Data diri anak</legend>
                <div class="form-group">
        			<label class="control-label col-lg-2">Nama anak</label>
        			<div class="col-lg-10">
        				<input type="text" class="form-control" name="name" value="{{ $siswa->user['name'] }}">
        			</div>
        		</div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Jenis Kelamin</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="jenis_kelamin">
                            <option value="laki-laki" @if ($siswa->jenis_kelamin == 'laki-laki') selected="selected" @endif>laki-laki</option>
                            <option value="perempuan" @if ($siswa->jenis_kelamin == 'perempuan') selected="selected" @endif>perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Username</label>
        			<div class="col-lg-10">
        				<input type="text" class="form-control" name="username" value="{{ $siswa->user['username'] }}">
        			</div>
        		</div>

                <div class="form-group">
        			<label class="control-label col-lg-2">Email</label>
        			<div class="col-lg-10">
        				<input type="text" class="form-control" name="email" value="{{ $siswa->user['email'] }}">
        			</div>
        		</div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Password lama</label>
        			<div class="col-lg-10">
                        <input type="password" id="oldPassword" class="form-control" name="oldPassword" value="">
        			</div>
        		</div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Password baru</label>
        			<div class="col-lg-10">
        				<input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
        			</div>
        		</div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Konfirmasi password baru</label>
                    <div class="col-lg-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <fieldset class="content-group">
				<legend class="text-bold">Sekolah</legend>

				<div class="form-group">
					<label class="control-label col-lg-2">Provinsi</label>
					<div class="col-lg-10">
                            <select class="form-control" name="province_id" id="provinces" onchange="checkform()">
                                <option value="">Pilih Provinsi</option>
                                @foreach($provinces as $value)
                                    <option value="{{$value->id}}" @if($value->id ==  $siswa->province_id) selected='selected' @endif>{{$value->name}}</option>
                                @endforeach
                            </select>
					</div>
				</div>

                <div class="form-group">
					<label class="control-label col-lg-2">Kota/kabupaten</label>
					<div class="col-lg-10">
                        <select class="form-control" name="regency_id" id="regencies" onchange="checkform()">
                            <option value="">Pilih Kota/kabupaten</option>
                            @foreach($regencies as $value)
                                <option value="{{$value->id}}" class="{{$value->province_id}}" @if($value->id == $siswa->regency_id) selected='selected' @endif >{{$value->name}} </option>
                            @endforeach
                        </select>
					</div>
				</div>

                <div class="form-group">
					<label class="control-label col-lg-2">Kecamatan</label>
					<div class="col-lg-10">
                        <select class="form-control" name="district_id" id="districts" onchange="checkform()">
                            <option value="" class="">Pilih Kecamatan</option>
                            @foreach ($districts as $value)
                                <option value="{{$value->id}}" class="{{$value->regency_id}}" @if($value->id == $siswa->district_id) selected='selected' @endif>{{$value->name}}</option>
                            @endforeach
                        </select>
					</div>
				</div>

                <div class="form-group">
					<label class="control-label col-lg-2">Nama sekolah</label>
					<div class="col-lg-10">
						<input type="text" name="school_name" class="form-control" value="{{ $siswa->school_name }}">
					</div>
				</div>

                <div class="form-group">
        			<label class="control-label col-lg-2">Kelas</label>
        			<div class="col-lg-10">
                        <select class="form-control" name="class">
                               <option value="7" @if ($siswa->class == '7') selected="selected" @endif>7</option>
                               <option value="8" @if ($siswa->class == '8') selected="selected" @endif>8</option>
                               <option value="9" @if ($siswa->class == '9') selected="selected" @endif>9</option>
                        </select>
        			</div>
        		</div>
			</fieldset>

        	</fieldset>

            <div class="row" style="margin-top: 10px;">
              <div class="col-md-12" style="text-align: center;">
                <button type="button" class="btn btn-danger" onclick="location.href='/orangtua/registerasi-anak';">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </div>
        </form>

    </div>


    </div>
@endsection
@section('script')
    <script src="{{asset('assets/js/jquery.chained.min.js')}}"></script>
    <script>$("#regencies").chained("#provinces");</script>
    <script>$("#districts").chained("#regencies");</script>

@endsection
