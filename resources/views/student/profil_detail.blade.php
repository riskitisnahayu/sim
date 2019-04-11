@extends('student_layouts.master')

@section('page_title')
    Detail Profil Siswa
@endsection

@section('student-content')
<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section animated">
    <div class="container">
        <div class="row animate-box" style="background-color: white;padding-top:20px">
            {{-- <div class="col-md-12 text-center fh5co-heading"> --}}
            <div class="col-md-12 text-center">
                <h2>Profil</h2>
            </div>
        <form class="form-horizontal" enctype="multipart/form-data" method="post">
        <legend class="text-bold" style="padding-left:60px">Data Diri Siswa</legend>
        <table style="text-align:left">
            <tr>
                <td style="padding-left:150px;padding-bottom:10px">Nama</td>
                <td style="padding-left:50px">:</td>
                <td style="padding-left:50px">{{ $siswa->user['name'] }}</td>
            </tr>
            <tr>
                <td style="padding-left:150px;padding-bottom:10px">Jenis kelamin</td>
                <td style="padding-left:50px">:</td>
                <td style="padding-left:50px">{{ $siswa->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td style="padding-left:150px;padding-bottom:10px">Username</td>
                <td style="padding-left:50px">:</td>
                <td style="padding-left:50px">{{ $siswa->user['username'] }}</td>
            </tr>
            <tr>
                <td style="padding-left:150px;padding-bottom:10px">Email</td>
                <td style="padding-left:50px">:</td>
                <td style="padding-left:50px">{{ $siswa->user['email'] }}</td>
            </tr>
        </table>
            {{-- <div class="form-group">
			<label class="control-label col-lg-3">Nama </label>
    			<div class="col-lg-8">
    				<input type="text" class="form-control" name="name" placeholder="{{ $siswa->user['name'] }}" readonly>
    			</div>
    		</div>
            <div class="form-group">
			<label class="control-label col-lg-3">Jenis Kelamin</label>
    			<div class="col-lg-8">
    				<input type="text" class="form-control" name="jenis_kelamin" placeholder="{{ $siswa->jenis_kelamin }}" readonly>
    			</div>
    		</div>
            <div class="form-group">
			<label class="control-label col-lg-3">Username</label>
    			<div class="col-lg-8">
    				<input type="text" class="form-control" name="username" placeholder="{{ $siswa->user['username'] }}" readonly>
    			</div>
    		</div>
            <div class="form-group">
			<label class="control-label col-lg-3">Email</label>
    			<div class="col-lg-8">
    				<input type="email" class="form-control" name="email" placeholder="{{ $siswa->user['email'] }}" readonly>
    			</div>
    		</div> --}}
            <legend class="text-bold" style="padding-left:60px">Sekolah</legend>
            <table>
                <tr>
                    <td style="padding-left:150px;padding-bottom:10px">Nama sekolah</td>
                    <td style="padding-left:50px">:</td>
                    <td style="padding-left:50px">{{ $siswa->school_name }}</td>
                </tr>
                <tr>
                    <td style="padding-left:150px;padding-bottom:10px">Kelas</td>
                    <td style="padding-left:50px">:</td>
                    <td style="padding-left:50px">{{ $siswa->class }}</td>
                </tr>
            </table>
                {{-- <div class="form-group">
				<label class="control-label col-lg-3">Nama sekolah</label>
					<div class="col-lg-8">
						<input type="text" name="school_name" class="form-control" placeholder="{{ $siswa->school_name }}" readonly>
					</div>
				</div>
                <div class="form-group">
    			<label class="control-label col-lg-3">Kelas</label>
        			<div class="col-lg-8">
                        <input type="text" name="class" class="form-control" placeholder="{{ $siswa->class }}" readonly="">
        			</div>
        		</div> --}}
            <div class="row" style="margin-top: 50px; margin-bottom:20px">
                <div class="col-md-12" style="text-align: center;padding-top:20px">
                    <button type="button" class="btn btn-success" onclick="location.href='/siswa'" style="margin-top: -38px">Kembali</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
