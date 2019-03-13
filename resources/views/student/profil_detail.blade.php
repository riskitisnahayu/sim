@extends('student_layouts.master')

@section('page_title')
    Detail Profil Siswa
@endsection

@section('student-content')
<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section animated">
    <div class="container">
        <div class="row animate-box" style="background-color: white">
            <div class="col-md-12 text-center fh5co-heading">
                <h2>Profil</h2>
            </div>
        <form class="form-horizontal" enctype="multipart/form-data" method="post">
        <legend class="text-bold" style="padding-left:60px">Data Diri Siswa</legend>
            <div class="form-group">
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
    		</div>
            <legend class="text-bold" style="padding-left:60px">Sekolah</legend>
                <div class="form-group">
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
        		</div>
            <div class="row" style="margin-top: 50px; margin-bottom:20px">
                <div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-success" onclick="location.href='/siswa'" style="margin-top: -38px">Kembali</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
