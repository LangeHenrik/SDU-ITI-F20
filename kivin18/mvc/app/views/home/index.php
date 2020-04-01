<?php include '../app/views/partials/menu.php'; ?>

    <form>
        <div class="form-group">
            <label for="username">Email address</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            <small id="usernameInfo" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php include '../app/views/partials/foot.php'; ?>