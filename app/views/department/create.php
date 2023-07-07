<div class="col-lg-12 p-2 border">
    <nav class="navbar nav navbar-light ">
        <h3>Department - Create</h3>
    </nav>
</div>
<div class="container">
    <form action="<?= ROOT; ?>department/store" method="post">
        <div class="mb-4">
            <label for="name">Department Name : </label>
            <input type="text" class="form-control text-capitalize" required name="name" id="name" placeholder="Enter Department name" pattern="[A-z\- _]{2,30}" title="Enter department name, min 6 letter and maximum 30 letter">
        </div>
        <div class="mb-4">
            <label for="description">Department Description : </label>
            <textarea class="form-control" required name="description" id="description" placeholder="Enter Department description" title="Enter department description" rows="10"></textarea>
        </div>
        <!-- <div class="mb-4">
            <label for="name">Display on website: </label>
            <input type="radio" class="form-control" required name="name" id="name" placeholder="Enter Department name" pattern="[A-z\- _]{6,30}" title="Enter department name, min 6 letter and maximum 30 letter">
        </div> -->

        <div class="mb-4">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
</div>