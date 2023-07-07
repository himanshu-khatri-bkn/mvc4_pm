<div class="container">
    <div class="col-lg-12 p-2 border">
        <nav class="navbar nav navbar-light ">
            <h3>Department</h3>
        </nav>
    </div>
    <?php
    if (Session::get('logindtl')) {

    ?>
        <div class="alert alert-info">
            <a href="<?= ROOT; ?>department/create" class="btn btn-primary">
                Add Department</a>
        </div>
    <?php } ?>
    <?php if ($msg = Session::get('gmsg')) { ?>
        <div class="alert alert-success h3">
            <?= $msg; ?>
        </div>
    <?php
        Session::delete('gmsg');
    } ?>
    <?php if ($msg = Session::get('emsg')) { ?>
        <div class="alert alert-danger h3">
            <?= $msg; ?>
        </div>
    <?php
        Session::delete('emsg');
    } ?>
    <table id="datalist" class="table table-striped border">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Description</th>
                <?php
                if (Session::get('logindtl')) {

                ?>
                    <th>Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>

            <?php
            if ($data) {
                $index = 0;
                foreach ($data as $info) {
            ?>
                    <tr>
                        <td><?= ++$index; ?></td>
                        <td><?= $info['name']; ?></td>
                        <td><?= $info['description']; ?></td>
                        <?php
                        if (Session::get('logindtl')) {

                        ?>
                            <td><a href="<?= ROOT; ?>department/edit/<?= $info['id']; ?>" class="btn btn-success">
                                    Edit
                                </a>
                                <?php 
                        if (Session::get('logindtl')['role']=='admin') {
?>
                                <a href="#" onclick="ctask('department/destroy/<?= $info['id']; ?>')" class="btn btn-danger">
                                    Delete
                                </a>
                                <?php } ?>
                            </td>
                        <?php } ?>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <th class="text-info text-center" colspan="4">
                        No Record found
                    </th>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>