
<!DOCTYPE html>
<html>
<head>
    <title>GitHub Repository Search</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
    <h1 class="mb-4">GitHub Repository Search</h1>

    <div class="row">
        <div class="col-md-12">

        <?php 
            echo "<pre>";
            print_r($foo);
        ?>
            <form action="/githup_repo/public/index.php/api-result" method="post">
                <div class="row">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label for="username" class="form-label">User Name:</label>
                            <input type="text" class="form-control" id="fullName" name="username">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label for="repoName" class="form-label">Repository Name:</label>
                            <input type="text" class="form-control" id="repoName" name="repo_name">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label for="createdAt" class="form-label">Created At (YYYY-MM-DD):</label>
                            <input type="date" class="form-control" id="createdAt" name="created_at">
                        </div>
                    </div>
                    <!-- <div class="col-md-2">
                        <div class="mb-3">
                            <label for="starsNumber" class="form-label">Stars Number:</label>
                            <input type="number" class="form-control" id="starsNumber" name="stargazers_count">
                        </div>
                    </div> -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label for="reposToShow" class="form-label">Number of Repos to Show:</label>
                            <select class="form-select" id="reposToShow" name="repos_number">
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label for="language" class="form-label">Language:</label>
                            <input type="text" class="form-control" id="language" name="language">
                        </div>
                    </div>
                </div>
                <button type="submit"  class="btn btn-primary" >submit</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Search Results</h2>
            <table class="table table-bordered">
                <!-- Table headers -->
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Repo Name</th>
                        <th>Created At</th>
                        <th>Stars Number</th>
                        <th>Language</th>
                    </tr>
                </thead>
                <!-- Table content -->
                <tbody id="searchResults">
                    <tr>
                        <th>abdallah</th>
                        <th>repooooo</th>
                        <th>12-10-2023</th>
                        <th>100</th>
                        <th>php</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Include Bootstrap JavaScript if needed -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script -->

    <!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script>
    $(document).ready(function() {
        // Listen for the form submission
        $('form').submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Serialize the form data
            var formData = $(this).serialize();

            // Make an Ajax POST request to your server
            $.ajax({
                type: 'GET', // Adjust the HTTP method as needed
                url: '/githup_repo/public/index.php/api-result', // Replace with the actual URL to your PHP script
                data: formData,
                success: function(data) {
                    // Update the table with the new data
                    $('#searchResults').html(data);
                }
            });
        });
    });
</script> -->

</body>
</html>
