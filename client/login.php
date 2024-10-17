<div class="container">
    <h1 class="heading text-center">Login</h1>

    <form action="./server/requests.php" method="post" class="login-form">

        <div class="col-6 offset-sm-3 mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address" required>
        </div>

        <div class="col-6 offset-sm-3 mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
        </div>

        <div class="col-6 offset-sm-3 text-center">
            <button type="submit" name="login" class="btn btn-primary btn-lg w-100">Login</button>
        </div>
        
        <!-- Forgot Password Link(NOT WORKING) -->
        <div class="col-6 offset-sm-3 text-center mt-3">
            <a href="?forgot-password=true" class="text-muted">Forgot your password?(NOT WORKING)</a>
        </div>
        
    </form>
</div>
