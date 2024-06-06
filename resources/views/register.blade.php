<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .form-section {
            display: none;
        }

        .form-section.current {
            display: block;
        }

        .parsley-errors-list {
            color: red;
        }
        body{
            background-image:url('assets/img/background.png'); 
            background-size:cover; 
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 ">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <img src="assets/img/paper_2.jpg" alt="gambar" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <form class="form-signin register-form" action="/register" method="post">
                                <div class="form-section current">
                                    <div class="mb-md-3 mt-md-2 pb-2">
                                        <h3 class="text-dark-50 mb-2">Buat Akun</h3>
                                        <p class="text-dark-50 mb-3 small">Pastikan Anda memilih peran yang sesuai</p>
                                        <hr class="mb-4">
                                        <h4 class="text-dark-50 mb-2">Pilih Peran Anda</h4>
                                        <p class="text-dark-50 mb-3 small">Pilih peran yang paling sesuai. Pilihan peran
                                            akan berpengaruh ke opsi yang tersedia</p>

                                        <div class="input-group">
                                            <select class="form-select w-100 px-2 py-2" name="peran" id="inputGroupSelect04"
                                                aria-label="Example select with button addon" required
                                                data-parsley-group="block-0">
                                                <option selected disabled value="">Pilih Peran</option>
                                                <option value="1">Pengurus KBK</option>
                                                <option value="2">Dosen </option>
                                                <option value="3">Kaprodi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-section">
                                    <div class="form-group mb-3">
                                        <label for="fullname" class="mb-2">NIP:</label>
                                        <input type="text" class="form-control" id="nip" name="nip"
                                            placeholder="Masukan NIP Anda" required data-parsley-group="block-1">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="mb-2">Nama Lengkap:</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Masukan Nama Anda" required data-parsley-group="block-1">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email" class="mb-2">Email :</label>
                                        <input type="email" name="email" id="inputEmail" class="form-control"
                                            placeholder="Masukan Email Anda" required data-parsley-group="block-1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="jurusan" class="mb-2">Jurusan:</label>
                                        <select class="form-select w-100 px-2 py-2" name="jurusan" id="inputGroupSelect04"
                                            aria-label="Example select with button addon" required
                                            data-parsley-group="block-0">
                                            <option selected disabled value="">Pilih Jurusan</option>
                                            {{-- @foreach ($data_jur as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="prodi" class="mb-2">Prodi:</label>
                                        <select class="form-select w-100 px-2 py-2" name="prodi" id="inputGroupSelect04"
                                            aria-label="Example select with button addon" required
                                            data-parsley-group="block-0">
                                            <option selected disabled value="">Pilih Prodi</option>
                                            {{-- @foreach ($data_prod as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password" class="mb-2">Password:</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required data-parsley-group="block-1">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="confirm_password" class="mb-2">Konfirmasi Password:</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password" required data-parsley-group="block-1"
                                            data-parsley-equalto="#password">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-2">Captcha:</label>
                                        <div class="captcha">
                                            <img src="{{ captcha_src('inverse') }}" alt="captcha">
                                            <div class="mt-2"></div>
                                            <input type="text" name="captcha"
                                                class="form-control @error('captcha') is-invalid @enderror"
                                                placeholder="Please Insert Captch">
                                            @error('captcha')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="terms"
                                            name="terms" required data-parsley-group="block-1">
                                        <label class="form-check-label small" for="terms">Saya setuju dengan <a
                                                href="/terms">syarat dan ketentuan</a></label>
                                    </div>
                                </div>
                                <div class="form-navigation d-flex justify-content-between mt-4">
                                    <button class="btn btn-outline-dark px-4 py-2 previous"
                                        type="button">Kembali</button>
                                    <button class="btn btn-outline-dark px-4 py-2 next"
                                        type="button">Selanjutnya</button>
                                    <button class="btn btn-outline-dark px-4 py-2 submit"
                                        type="submit">Submit</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-center mt-4">
                                <p class="mb-0 small">Sudah Punya Akun? <a href="/login"
                                        class="text-dark-50 fw-bold">Masuk</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            var $sections = $('.form-section');

            function navigateTo(index) {
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index > 0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation .submit').toggle(atTheEnd);
            }

            function curIndex() {
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .previous').click(function() {
                navigateTo(curIndex() - 1);
            });

            $('.form-navigation .next').click(function() {
                $('.register-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function() {
                    navigateTo(curIndex() + 1);
                });
            });

            $sections.each(function(index, section) {
                $(section).find(':input').attr('data-parsley-group', 'block-' + index);
            });

            navigateTo(0);
        });
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
