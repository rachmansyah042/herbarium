<div class="container"> 

    <p class="title-menu"> Famili </p>

    <div class="wrap-search">
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        
        <button type="button" class="btn btn-secondary btn-sm ml-auto">Tambahkan Famili</button>
        </form>
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
                        <button type="button" class="btn btn-success btn-sm">Lihat</button>
                        <button type="button" class="btn btn-info btn-sm">Ubah</button>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>
</div>
