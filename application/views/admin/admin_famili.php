<div class="container"> 

    <p class="title-menu"> Famili </p>

    <div class="wrap-search">
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        
        <button type="button" data-toggle="modal" data-target="#addFamili" class="btn btn-secondary btn-sm ml-auto">Tambahkan Famili</button>
        </form>
    </div>

    <!-- Modal add famili -->
    <div class="modal fade" id="addFamili" tabindex="-1" role="dialog" aria-labelledby="addFamili" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFamili">Tambah Famili</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            <form class="form-signin" action="<?= base_url('Famili/AddFamili') ?>" method="post" enctype="multipart/form-data">
            <div class="form-label-group mb-3">
                <input type="text" id="spesies" name="familia" class="form-control" placeholder="Nama Famili">
                <label for="spesies">Nama Famili</label>
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

    <!-- modal get view -->
    <div class="modal" id="viewFamili" tabindex="-1" role="dialog" aria-labelledby="viewFamili" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat Famili</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="viewFamiliyById"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </div>
        </div>
    </div>

    <!-- modal edit -->
    <div class="modal" id="editFamili" tabindex="-1" role="dialog" aria-labelledby="editFamili" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Famili</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div id="familiResult"></div> 
            </div>
            </div>
        </div>
    </div>


    <div class="table-responsive-md">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama Famili</th>
                    <th scope="col">Jumlah Herbarium</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($familia as $nama_famili) { ?>
                
                <tr>
                    <td scope="row" class="text-center"><?= $nama_famili['id_familia'] ?></td>
                    <td><?= $nama_famili['familia'] ?></td>
                    <td><?= $nama_famili['total_herbarium'] ?></td>
                    <td class="text-center">
                        <button type="button" data-toggle="modal" data-target="#viewFamili" class="btn btn-success btn-sm get_data_famili" id="<?= $nama_famili['id_familia'] ?>">Lihat</button>
                        <button type="button" data-toggle="modal" data-target="#editFamili" class="btn btn-info btn-sm view_data_famili" id="<?= $nama_famili['id_familia'] ?>">Ubah</button>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>

        <br>
        <?php 
        echo $this->pagination->create_links();
        ?>
    </div>
</div>
