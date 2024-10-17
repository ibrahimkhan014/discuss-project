<div class="container mt-5">
    <h1 class="heading text-center mb-4">Ask A Question</h1>

    <form action="./server/requests.php" method="post" class="form-horizontal">

        <div class="form-group row mb-3">
            <label for="title" class="col-sm-3 col-form-label text-right">Title</label>
            <div class="col-sm-6">
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter your question title" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="discription" class="col-sm-3 col-form-label text-right">Description</label>
            <div class="col-sm-6">
                <textarea name="discription" class="form-control" id="discription" rows="4" placeholder="Provide details for your question" required></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="category" class="col-sm-3 col-form-label text-right">Category</label>
            <div class="col-sm-6">
                <?php include("category.php"); ?>
            </div>
        </div>

        <div class="form-group row mb-3">
            <div class="col-sm-6 offset-sm-3 text-center">
                <button type="submit" name="ask" class="btn btn-primary btn-lg">Submit Question</button>
            </div>
        </div>
        
    </form>
</div>
