<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datePosted = $_POST['date_posted'];
    $company = $_POST['company'];
    $postedBy = $_POST['posted_by'];
    $companyWebsite = $_POST['company_website'];
    $contactNumber = $_POST['contact_number'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $jobDescription = $_POST['job_description'];
    $applyBy = $_POST['apply_by'];
    $skillsRequired = $_POST['skills_required'];
    $trainingPeriod = $_POST['training_period'];
    $googleLink = $_POST['google_link'];

    $sql = "INSERT INTO job_postings (date_posted, company, posted_by, company_website, contact_number, email, location, salary, job_description, apply_by, skills_required, training_period, google_link) 
            VALUES ('$datePosted', '$company', '$postedBy', '$companyWebsite', '$contactNumber', '$email', '$location', '$salary', '$jobDescription', '$applyBy', '$skillsRequired', '$trainingPeriod', '$googleLink')";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_jobs.php");
        exit(); // Ensure that no more code is executed after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

?>
