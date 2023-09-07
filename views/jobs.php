<?php
require_once './config.php'; // Including configuration file
$query = "SELECT * FROM jobs";
$result = mysqli_query($conn, $query); // Executing the query

if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Display an error message if the query fails
}
$title = 'Jobs'; // Setting the page title
?>

<!DOCTYPE html>
<html lang="en">
    <?php include './head.php' ?>
    <!-- Including the HTML head section -->
    <body>
        <?php include './header.php' ?>
        <!-- Including the header section -->

        <!-- Breadcrumb navigation -->
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Jobs</li>
                </ol>
            </nav>
        </div>
        <div class="top-banner-searchbar">
            <input type="search" name="searchbar" id="searchbar" placeholder="Search...">
            <!-- <i class="fa-regular fa-magnifying-glass search-icon-btn"></i> -->
            <div id="suggestions"></div>
        </div>
        <div class="container">
            <div class="jobs-list" id="jobs-list"></div>
            <!-- Container for displaying jobs -->
        </div>

        <?php include './footer.php' ?>
        <!-- Including the footer section -->

        <!-- JavaScript section for updating and displaying jobs using AJAX -->
        <script>
            function updateJobsList() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', './get-new-jobs.php', true); // Making an AJAX request to get new jobs
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var jobs = JSON.parse(xhr.responseText); // Parsing the response JSON
                            var jobsList = document.getElementById('jobs-list');
                            jobsList.innerHTML = ''; // Clear the existing job boxes

                            // Loop through jobs and create job boxes dynamically
                            for (var i = 0; i < jobs.length; i++) {
                                var job = jobs[i];
                                var jobBox = document.createElement('div');
                                jobBox.className = 'job-box';
                                jobBox.setAttribute(
                                    'onclick',
                                    `location.href='./single-job.php?job_id=${job.job_id}'`
                                );
                                jobBox.innerHTML = `
                                    <h2 class="job-box-header" onclick="location.href='./single-job.php?job_id=${job.job_id}'">${job.job_title}</h2>
                                    <ul>
                                        <li class="job-box-category">${job.category_name}</li>
                                        <li class="job-contact-info">${job.job_contact_info}</li>
                                        <li class="job-contact-info">${job.username}</li>
                                    </ul>
                                    <p>${job.job_description}</p>
                                    <p class="job-address">${job.job_address}</p>
                                    <a href="./single-job.php?job_id=${job.job_id}" class="job-box-link">click</a>
                                `;
                                jobsList.appendChild(jobBox);
                            }
                        }
                    }
                };
                xhr.send();
            }

            // Update jobs list initially and every 10 seconds updateJobsList();
            // setInterval(updateJobsList, 10000);
            window.addEventListener('load', function () {
                updateJobsList();
            });
        </script>
        <script>
            var searchInput = document.getElementById('searchbar');
            var suggestionsContainer = document.getElementById('suggestions');
            var jobsList = document.getElementById('jobs-list');
            var selectedCategory = null; // Variable to track the selected category

            // Function to fetch and display jobs based on the user's input
            function fetchJobsByInput(userInput) {
                // Make an AJAX request to fetch job data based on the user's input
                var xhr = new XMLHttpRequest();
                xhr.open(
                    'GET',
                    './get-jobs-by-input.php?input=' + encodeURIComponent(userInput),
                    true
                );
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var jobs = JSON.parse(xhr.responseText);

                            // Clear the existing job boxes
                            jobsList.innerHTML = '';

                            // Loop through jobs and create job boxes dynamically
                            for (var i = 0; i < jobs.length; i++) {
                                var job = jobs[i];
                                var jobBox = document.createElement('div');
                                jobBox.className = 'job-box';
                                jobBox.innerHTML = `
                        <h2 class="job-box-header">${job.job_title}</h2>
                        <ul>
                            <li class="job-box-category">${job.category_name}</li>
                            <li class="job-contact-info">${job.job_contact_info}</li>
                            <li class="job-contact-info">${job.username}</li>
                        </ul>
                        <p>${job.job_description}</p>
                        <p class="job-address">${job.job_address}</p>
                        <a href="./single-job.php?job_id=${job.job_id}" class="job-box-link">click</a>
                    `;
                                jobsList.appendChild(jobBox);
                            }
                        }
                    }
                };

                xhr.send();
            }

            // Attach input event listener to search bar for autocomplete
            searchInput.addEventListener('input', function () {
                var userInput = searchInput.value;
                suggestionsContainer.style.cssText = '';
                // If a category was selected previously, clear it and display suggestions again
                if (selectedCategory) {
                    selectedCategory = null;
                    suggestionsContainer.style.cssText = 'display: block !important;';

                }

                // Make an AJAX request to fetch category suggestions
                var xhr = new XMLHttpRequest();
                xhr.open(
                    'GET',
                    './get-category-suggestions.php?input=' + encodeURIComponent(userInput),
                    true
                );
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var categories = JSON.parse(xhr.responseText);

                            // Clear existing suggestions
                            suggestionsContainer.innerHTML = '';

                            // Populate suggestions with categories
                            for (var i = 0; i < categories.length; i++) {
                                var suggestion = document.createElement('div');
                                suggestion.className = 'category-suggestion';
                                suggestion.textContent = categories[i];
                                searchInput.addEventListener('focus', function () {
                                    suggestionsContainer.style.cssText = 'display: block !important;';
                                });
                                document.addEventListener('click', function (event) {
                                    // Check if the target of the click is not the search input, suggestions
                                    // container, or suggested category
                                    if (event.target !== searchInput && event.target !== suggestionsContainer && !suggestionsContainer.contains(event.target)) {
                                        suggestionsContainer.style.cssText = 'display: none !important;';
                                    }
                                });
                                suggestion.addEventListener('click', function (event) {
                                    searchInput.value = event.target.textContent;
                                    suggestionsContainer.style.cssText = 'display: none !important;';
                                    selectedCategory = event.target.textContent; // Set the selected category
                                    // Fetch jobs based on selected category and display them
                                    fetchJobsByInput(selectedCategory);
                                });

                                suggestionsContainer.appendChild(suggestion);
                            }
                        }
                    }
                };
                xhr.send();

                // Fetch and display job boxes based on the user's input
                fetchJobsByInput(userInput);
            });
        </script>
    </body>
</html>