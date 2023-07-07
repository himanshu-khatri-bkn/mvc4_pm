<div class="container">
    <div class="col-lg-12 p-2 border">
        <nav class="navbar nav navbar-light ">
            <h3>Doctor</h3>
        </nav>
    </div>
    <div class="alert alert-info">
        <a href="<?= ROOT; ?>doctor/create" class="btn btn-primary">
            Add Doctor</a>
    </div>
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
                <th>Department</th>
                <th>Gender</th>
                <th>Qualification</th>
                <th>Specification</th>
                <th>Experience</th>
                <th>Address</th>
                <th>Photo</th>
                <th>Action</th>
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
                        <td><?= $info['department_name']; ?></td>
                        <td><?= $info['gender']; ?></td>
                        <td><?= $info['quali']; ?></td>
                        <td><?= $info['spec']; ?></td>
                        <td><?= $info['exp']; ?></td>
                        <td><?= $info['address']; ?></td>
                        <td><img src="<?= $info['photo']; ?>" height="70px"></td>
                        <td><a href="<?= ROOT; ?>doctor/edit/<?= $info['id']; ?>" class="btn btn-success">
                                Edit
                            </a>
                            <a href="#" onclick="ctask('doctor/destroy/<?= $info['id']; ?>')" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
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