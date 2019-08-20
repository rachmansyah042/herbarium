<div class="container"> 

    <p class="title-menu"> Herbarium </p>

    <div class="wrap-search">
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        
        <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-secondary btn-sm ml-auto">Tambahkan Herbarium</button>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenter">Tambah Herbarium</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        <form class="form-signin">
        <div class="form-label-group mb-3">
            <input type="text" id="spesies" class="form-control" placeholder="Nama Spesies">
            <label for="spesies">Nama Spesies</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id ="genus" class="form-control" placeholder="Nama Genus">
            <label for="genus">Nama Genus</label>
        </div>

        <div class="form-label-group mb-3">
        <select class="form-control" id="inputGroupSelect01">
            <option selected disabled> Nama Famili</option>
            
            <?php foreach ($familia as $nama_famili) { ?>

            <option value="1"><?= $nama_famili['familia'] ?></option>

            <?php } ?>

        </select>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="lokal" class="form-control" placeholder="Nama Lokal">
            <label for="lokal">Nama Lokal</label>
        </div>

        <div class="input-group mb-3">
            <div class="col-6"> 
                <span>Gambar Herbarium</span>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <div class="col-6"> 
                <span>Gambar Asli</span>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="morfologi" class="form-control" placeholder="Morfologi">
            <label for="morfologi">Morfologi</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="koleksi" class="form-control" placeholder="No Koleksi">
            <label for="koleksi">No Koleksi</label>
        </div>

        <div class="input-group mb-3">
            <input  id="datepicker" class="form-control" placeholder="Tanggal Koleksi">
            <!-- <label for="datepicker">Tanggal Koleksi</label> -->
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="lokasi" class="form-control" placeholder="Lokasi">
            <label for="lokasi">Lokasi</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="habitat" class="form-control" placeholder="Tipe Habitat">
            <label for="habitat">Tipe Habitat</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="kolektor" class="form-control" placeholder="Kolektor">
            <label for="kolektor">Kolektor</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="identifikator" class="form-control" placeholder="Identifikator">
            <label for="identifikator">Identifikator</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="textarea" id="catatan" class="form-control" placeholder="Catatan Lain">
            <label for="catatan">Catatan Lain</label>
        </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Tambah</button>
        </div>
        </div>
    </form>
    </div>
    </div>

    <!-- table -->
    <div class="table-responsive-md">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Spesies</th>
                    <th scope="col">Famili</th>
                    <th scope="col">Morfologi</th>
                    <th scope="col" class="text-center">Lokasi</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" class="text-center">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm">Lihat</button>
                        <button type="button" class="btn btn-info btn-sm">Ubah</button>
                        <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
