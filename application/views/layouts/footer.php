    </main>
    </div>

    <footer class="py-4 bg-light mt-auto text-center">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-center small">
                <div class="text-muted">Copyright &copy; My Protofolio 1998 - <?= date('Y') ?></div>
                <!-- <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div> -->


            </div>



        </div>

        <!-- <div class="row float-right">-->




        <!-- </div> -->


    </footer>





    </div>


    <div class="row-md-2 p-0 ">

        <div class="col fixed-bottom mb-2 mr-2">


            <div class="accordion" id="accordionExample">

                <div class="row justify-content-end">

                    <div class="col-md-2 text-center d-inline-flex justify-content-end mr-2">
                        <div class="card bg-transparent">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-primary m-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Whatsapp
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="card-body">

                                    <a target="Blank" href="https://api.whatsapp.com/send?phone=62081513219076"><i class="fab fa-whatsapp fa-4x" style="color:#40ff00;"></i></a>


                                </div>
                            </div>
                        </div>


                    </div>
                </div> <!--  Akhir Row Card   -->


            </div>


        </div>

    </div> <!--  Akhir Row Awal   -->


    </div>




    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbx5NVtBc2q_NTQrdAWlWYbYpfNL4XwP0RdThEUNdchUoPLRLKCjQmYYoqnALe9Ce3wD/exec'
        const form = document.forms['contact-galery'];
        const btnKirim = document.querySelector('.btn-kirim');
        const btnLoading = document.querySelector('.btn-loading');
        const myAlert = document.querySelector('.my-alert');

        form.addEventListener('submit', e => {
            e.preventDefault() //ini tujuannya menghapus defaultnya yaitu get
            //ketika tombol submit di klik
            //tampilkan tombol loading dan hilangkan tombol kirim
            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');

            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => {
                    //tampilkan tombol kirim dan hilangkan tombol loading
                    btnLoading.classList.toggle('d-none');
                    btnKirim.classList.toggle('d-none');

                    //tampilkan alert
                    myAlert.classList.toggle('d-none');

                    //reset form
                    form.reset();

                    console.log('Success!', response);
                })

                .catch(error => console.error('Error!', error.message))
        })
    </script>



    <!-- <div class="row text-end fixed-bottom">


    </div> -->



    <!-- Js Bootstrap -->
    <!-- <script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.min.js"></script> -->

    <script src="<?= base_url(); ?>assets/sbm/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/sbm/js/scripts.js"></script>
    <script src="<?= base_url(); ?>assets/sbm/js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/sbm/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>assets/sbm/demo/chart-bar-demo.js"></script>
    <script src="<?= base_url(); ?>assets/sbm/js/simple-datatables@latest.js"></script>
    <script src="<?= base_url(); ?>assets/sbm/js/datatables-simple-demo.js"></script>
    </body>

    </html>