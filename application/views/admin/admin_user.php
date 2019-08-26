<div class="container">

    <p class="title-menu"> User </p>

    <div class="wrap-search">
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        
        <button type="button" data-toggle="modal" data-target="#addUser" class="btn btn-secondary btn-sm ml-auto">Tambahkan User</button>
        </form>
    </div>

    <!-- Modal add famili -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUser" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addUser">Tambah User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        <form class="form-signin" action="<?= base_url('User/addUser') ?>" method="post" enctype="multipart/form-data">
        <div class="form-label-group mb-3">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
            <label for="username">Username</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            <label for="password">Password</label>
        </div>

        <div class="form-label-group mb-3">
            <input type="text" id="nama" name="name" class="form-control" placeholder="Nama">
            <label for="nama">Nama</label>
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

    <div class="table-responsive-md">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama Admin</th>
                    <th scope="col">Famili</th>
                    <th scope="col">Username</th>
                    <th scope="col" class="text-center">Active</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

            <?php $no = 1; foreach ($user as $user) { ?>

            <?php if ($user['id_role']==2) : ?>
            
                <tr>
                    <td scope="row" class="text-center"><?= $no++ ?></td>
                    <td><?= $user['name'] ?></td>
                    <td>Otto</td>
                    <td>@<?= $user['username'] ?></td>
                    <td class="text-center active">Active</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm">Lihat</button>
                        <button type="button" class="btn btn-info btn-sm">Ubah</button>
                        <button type="button" class="btn btn-danger btn-sm">Non-Aktif</button>
                    </td>
                </tr>

            <?php endif; ?>
            <?php } ?>
            
            </tbody>
        </table>

         <br>
        <?php 
        echo $this->pagination->create_links();
        ?>
    </div>
</div>
