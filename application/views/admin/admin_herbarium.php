<div class="container"> 

    <p class="title-menu"> Herbarium </p>
    

    <div class="wrap-search">
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        
        <button type="button" data-toggle="modal" data-target="#addHerbarium" class="btn btn-secondary btn-sm ml-auto">Tambahkan Herbarium</button>
        </form>
    </div>

    <!-- modal get view -->
    <div class="modal" id="viewHerb" tabindex="-1" role="dialog" aria-labelledby="viewHerb" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat Herbarium</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="viewHerById"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </div>
        </div>
    </div>

    <!-- Modal add herbarium -->
    <div class="modal fade" id="addHerbarium" tabindex="-1" role="dialog" aria-labelledby="addHerbarium" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addHerbarium">Tambah Herbarium</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        <form class="form-signin" action="<?= base_url('Herbarium/AddHerbarium') ?>" method="post" enctype="multipart/form-data">
        <div class="form-label-group mb-3">
            <input type="text" id="spesies" name="species" class="form-control" placeholder="Nama Spesies">
            <label for="spesies">Nama Spesies</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id ="genus" name="genus" class="form-control" placeholder="Nama Genus">
            <label for="genus">Nama Genus</label>
        </div>

        <div class="form-group mb-3">
        <label for="catatan">Nama Famili</label>
        <select name="id_familia" class="form-control" id="inputGroupSelect01">
            <option selected disabled> Nama Famili</option>
            
            <?php foreach ($familia as $nama_famili) { ?>

            <option value="<?= $nama_famili['id_familia'] ?>" ><?= $nama_famili['familia'] ?></option>

            <?php } ?>

        </select>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="lokal" name="local_name" class="form-control" placeholder="Nama Lokal">
            <label for="lokal">Nama Lokal</label>
        </div>

        <div class="input-group mb-3">
            <div class="col-6"> 
                <span>Gambar Herbarium</span>
                <img class="img-collection" id="herb_pic" src="<?= base_url('assets/images/default.jpg') ?>">
                <input type="file" name="herbarium_pict" class="form-control-file" id="herbarium_pict" onchange="previewImage();">
            </div>

            <div class="col-6"> 
                <span>Gambar Asli</span>
                <img class="img-collection" id="r_pic" src="<?= base_url('assets/images/default.jpg') ?>"> 
                <input type="file" name="real_pic" class="form-control-file" id="real_pic" onchange="realImage();">
            </div>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="morfologi" name="leaf_morphology" class="form-control" placeholder="Morfologi">
            <label for="morfologi">Morfologi</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="koleksi" name="collection_num" class="form-control" placeholder="No Koleksi">
            <label for="koleksi">No Koleksi</label>
        </div>

        <div class="form-group mb-3">
        <label for="catatan">Tanggal Koleksi</label>
            <input  id="datepicker" class="form-control" name="collection_date" placeholder="Tanggal Koleksi">
            <!-- <label for="datepicker">Tanggal Koleksi</label> -->
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="lokasi" name="location" class="form-control" placeholder="Lokasi">
            <label for="lokasi">Lokasi</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="habitat" name="habitat_type" class="form-control" placeholder="Tipe Habitat">
            <label for="habitat">Tipe Habitat</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="kolektor" name="collector" class="form-control" placeholder="Kolektor">
            <label for="kolektor">Kolektor</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="identifikator" name="identifier" class="form-control" placeholder="Identifikator">
            <label for="identifikator">Identifikator</label>
        </div>

        <div class="form-group mb-3">
        <label for="catatan">Catatan Lain</label>
            <textarea type="text" rows="3" id="catatan" name="notes" class="form-control notes" placeholder="Catatan Lain"></textarea>
        </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </div>
    </form>
    </div>
    </div>

    <!-- modal edit -->
    <div class="modal" id="editHerb" tabindex="-1" role="dialog" aria-labelledby="editHerb" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="herbResult"></div> 
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
            </div>
        </div>
    </div>

    <!-- modal delete -->
    <?php foreach ($herbarium as $nama_herbarium) { ?>
    <div class="modal" id="deleteHerb<?= $nama_herbarium['id_herbarium']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteHerb" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Herbarium</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('Herbarium/delete/'.$nama_herbarium['id_herbarium']); ?>" method="post">
                <p>Anda yakin ingin menghapus ? </p>
            </div>
            <div class="modal-footer">
                <input type="text" value="<?=$nama_herbarium['id_familia']; ?>" name="id_familia" hidden>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    <?php } ?>

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
                    <th scope="col" class="text-center">Tgl koleksi</th>
                    <th scope="col" class="text-center">Kolektor</th>
                    <th scope="col" class="text-center table-action">Action</th>
                </tr>
            </thead>
            <tbody>

             <?php $no=1;foreach ($herbarium as $nama_herbarium) { ?>
                
                <tr>
                    <td scope="row" class="text-center"><?= $no++ ?></td>
                    <td><?= $nama_herbarium['species'] ?></td>
                    <td><?= $nama_herbarium['familia'] ?></td>
                    <td><?= $nama_herbarium['leaf_morphology'] ?></td>
                    <td><?= $nama_herbarium['location'] ?></td>
                    <td class="text-center"><?= date("d-M-Y", strtotime($nama_herbarium['collection_date'])) ?></td>
                    <td><?= $nama_herbarium['collector'] ?></td>
                    <td class="text-center">
                        <button type="button" data-toggle="modal" data-target="#viewHerb" class="btn btn-success btn-sm get_data" id="<?= $nama_herbarium['id_herbarium'] ?>" class="btn btn-success btn-sm">Lihat</button>
                        <button type="button" data-toggle="modal" data-target="#editHerb" class="btn btn-info btn-sm view_data" id="<?= $nama_herbarium['id_herbarium'] ?>">Ubah</button>
                        <button type="button" data-toggle="modal" data-target="#deleteHerb<?= $nama_herbarium['id_herbarium']; ?>" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>
</div>
