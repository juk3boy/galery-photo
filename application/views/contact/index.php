<div class="container">

    <div class="row m-3 justify-content-md-center">

        <div class="col-lg-6">

            <h3 class="text-center">Silahkan Diisi</h3>
            <div class="row">

                <div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
                    <strong>Terimakasih!</strong> Pesan anda sudah kami terima!!.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                </div>

                <div class="col border shadow rounded">

                    <form action="" method="POST" name="contact-galery" class="mb-3 mt-3">
                        <div class="form-group">
                            <label for="nama">Masukan nama anda :</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Silahkan masukkan nama anda disini ...." required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="telepon" class="mt-2">Masukan nomor telepon anda :</label>
                            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Silahkan masukkan nomor telepon anda disini ...." required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="mt-2">Masukan email anda :</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Silahkan masukkan email anda disini ...." required>
                        </div>

                        <div class="form-group">
                            <label for="pesan" class="mt-2">Isi pesan anda :</label>
                            <textarea width="100" name="pesan" id="pesan" class="form-control" placeholder="Isi pesan anda disini ...." style="resize: none;"> </textarea>
                        </div>


                        <div class="row">

                            <div class="col">
                                <button type="submit" class="btn btn-primary mt-3 btn-kirim">Simpan</button>

                                <button class="btn btn-primary mt-3 btn-loading d-none" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>


                            </div>
                        </div>







                    </form>


                </div>


            </div>



        </div>

    </div>


</div>