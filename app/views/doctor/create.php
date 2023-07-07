<div class="col-lg-12 p-2 border">
    <nav class="navbar nav navbar-light ">
        <h3>Doctor - Create</h3>
    </nav>
</div>
<div class="container">
    <form action="<?= ROOT; ?>doctor/store" enctype="multipart/form-data" method="post">
        <div class="mb-4">
            <label for="dname">Doctor Name : </label>
            <input type="text" class="form-control text-capitalize" required name="name" id="dname" onchange=" loadAjax('doctor/checkname','name='+this.value,'rs')" placeholder="Enter Doctor name" pattern="[A-z\- _]{2,30}" title="Enter doctor name, min 6 letter and maximum 30 letter">
            <div id="rs"></div>
        </div>
        <div class="mb-4">
            <label for="department_id"> Select Department: </label>

            <select class="form-select" required name="department_id" id="department_id">
                <option value="">Select One</option>
                <?php
                foreach ($alldept as $dinfo) { ?>
                    <option value="<?= $dinfo['id']; ?>"><?= ucfirst(strtolower($dinfo['name'])); ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="gender">Gender: </label>
            <div class="form-control">
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" required name="gender" id="m" value="male">
                    <label for="m" class="form-check-label">Male</label>
                </div>
                <div class="form-check form-check-inline">

                    <input type="radio" class="form-check-input" required name="gender" id="f" value="female">
                    <label for="f" class="form-check-label">Female</label>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label for="quali">Qualification : </label>
            <input type="text" class="form-control text-capitalize" name="quali" id="quali" placeholder="Enter Qualification">
        </div>

        <div class="mb-4">
            <label for="exp">Experience : </label>
            <input type="text" class="form-control text-capitalize" name="exp" id="exp" placeholder="Enter Experience">
        </div>

        <div class="mb-4">
            <label for="spec">Specification : </label>
            <input type="text" class="form-control text-capitalize" name="spec" id="spec" placeholder="Enter Specification">
        </div>

        <div class="mb-4">
            <label for="address">Address : </label>
            <textarea class="form-control text-capitalize" name="address" id="address" placeholder="Enter Address"></textarea>
        </div>

        <div class="mb-4">
            <label for="photo">Photo : </label>
            <input type="file" class="form-control" name="photo" id="photo">
        </div>

        <div class="mb-4">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
</div>