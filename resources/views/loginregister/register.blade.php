
<!doctype html>
<html lang="en">

<head>
	 <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--favicon-->
     <link rel="icon" href="/assets/images/pemalang-logo.png" type="image/png" />
     <!--plugins-->
     <link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
     <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
     <link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
     <!-- loader-->
     <link href="/assets/css/pace.min.css" rel="stylesheet" />
     <script src="/assets/js/pace.min.js"></script>
     <!-- Bootstrap CSS -->
     <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
     <link href="/assets/css/app.css" rel="stylesheet">
     <link href="/assets/css/icons.css" rel="stylesheet">
     <title>SI INTERN</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
                            <img src="/assets/images/pemalang-logo.png" width="90" height="120" alt="" />
                        </div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Daftar Pengajuan KKN / MAGANG</h3>
										<p>Punya Akun ? <a href="{{ Route('login') }}">Sign in Disini</a>
										</p>
									</div>
									<div class="form-body">
										<form class="row g-3" action="{{ route('daftar') }}" method="POST">
                                            @csrf
											<div class="col-sm-6">
												<label for="@error('nama_depan') validationCustom01 @enderror" class="form-label">Nama Depan</label>
												<input type="text" name="nama_depan" value="{{ old('nama_depan') }}"  class="form-control @error('nama_depan') is-invalid @enderror" id="validationCustom01" placeholder="Nama Depan">
                                                @error('nama_depan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Nama Belakang</label>
												<input type="text" name="nama_belakang" class="form-control" id="inputLastName" placeholder="Nama Belakang" value="{{ old('nama_belakang')}}">
											</div>
											<div class="col-12">
												<label for="@error('email') validationCustom03 @enderror" class="form-label">Alamat Email</label>
												<input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="validationCustom03" placeholder="Alamat Email">
                                                @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <select class="form-select mb-3" name="jk" aria-label="Default select example">
                                                    <option value="Laki - Laki" selected>Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
											<div class="col-12">
												<label for="@error('pass') validationCustom03 @enderror" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="pass" class="form-control border-end-0 @error('pass') is-invalid @enderror" id="inputChoosePassword validationCustom03"  placeholder="Masukan Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    @error('pass')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
											</div>
                                            <div class="col-12">
												<label for="@error('repasspass') validationCustom03 @enderror" class="form-label">Re-Type Password</label>
												<div class="input-group" id="show_hide_password2">
													<input type="password" name="repass" class="form-control border-end-0 @error('repass') is-invalid @enderror" id="inputChoosePassword2 validationCustom03" placeholder="Re-type Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    @error('repass')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-secondary"><i class='bx bx-user'></i>Daftar</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
            $("#show_hide_password2 a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password2 input').attr("type") == "text") {
                    $('#show_hide_password2 input').attr('type', 'password');
                    $('#show_hide_password2 i').addClass("bx-hide");
                    $('#show_hide_password2 i').removeClass("bx-show");
                } else if ($('#show_hide_password2 input').attr("type") == "password") {
                    $('#show_hide_password2 input').attr('type', 'text');
                    $('#show_hide_password2 i').removeClass("bx-hide");
                    $('#show_hide_password2 i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="/assets/js/app.js"></script>
</body>

</html>
