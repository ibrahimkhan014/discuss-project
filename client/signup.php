<div class="container">
    <h1 class="heading text-center">Signup</h1>

    <form method="post" action="./server/requests.php" class="signup-form">

        <div class="col-md-6 offset-md-3 mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
        </div>

        <div class="col-md-6 offset-md-3 mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address" required>
        </div>

        <div class="col-md-6 offset-md-3 mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
        </div>

        <div class="col-md-6 offset-md-3 mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" required>
        </div>

        <div class="col-md-6 offset-md-3 text-center">
            <button type="submit" name="signup" class="btn btn-primary btn-lg w-100">Signup</button>
        </div>
        
    </form>
</div>
