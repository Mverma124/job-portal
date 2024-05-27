<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        /* CSS styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #1d1160, #2d2d2d);
            color: white;
            padding: 50px 0;
            text-align: center;
            border-bottom-left-radius: 50% 20%;
            border-bottom-right-radius: 50% 20%;
            position: relative;
        }
        .header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1d1160, #2d2d2d);
            border-bottom-left-radius: 50% 20%;
            border-bottom-right-radius: 50% 20%;
            z-index: -1;
        }
        .header h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .header p {
            font-size: 20px;
            margin-bottom: 30px;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.5;
        }
        .logo {
            max-width: 200px;
            margin-bottom: 30px;
        }
        .container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #1d1160;
        }
        .container p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .container ul {
            list-style-type: none;
            padding-left: 0;
            margin-bottom: 20px;
        }
        .container ul li::before {
            content: '\2022';
            color: #1d1160;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
        .team-members {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
        }
        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }
        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #1d1160;
            transition: transform 0.3s ease;
        }
        .team-member img:hover {
            transform: scale(1.1);
        }
        .team-member h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #1d1160;
        }
        .team-member p {
            font-size: 18px;
            color: #555;
        }
        .footer {
            background-color: #1d1160;
            color: white;
            padding: 30px 0;
            text-align: center;
            position: relative;
            margin-top: 50px;
        }
        .footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1d1160, #2d2d2d);
            border-bottom-left-radius: 50% 20%;
            border-bottom-right-radius: 50% 20%;
            z-index: -1;
        }
        .footer p {
            margin: 0;
        }
        .footer a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php
    include 'navbar.php';
    ?>
    <div class="header">
        <img class="logo" src="Sign.jpg" alt="OurJobSite Logo">
        <h1>Welcome to OurJobSite</h1>
        <p>Your go-to destination for finding the perfect job opportunities tailored just for you. Connect with us to explore endless possibilities.</p>
    </div>

    <div class="container">
        <h2>Our Mission</h2>
        <p>We are dedicated to empowering individuals to reach their career goals by providing innovative tools and resources for job seekers and employers alike. It serves as a centralized platform where job seekers can search and apply for job opportunities, and employers can post job openings and review candidate applications.This web application is a digital platform designed to connect job seekers and employers in a convenient and efficient manner. This web application serves as a virtual marketplace where job seekers can create profiles, upload resumes, and search for job openings across various industries and locations. Simultaneously, employers can post job listings, review candidate profiles, and identify suitable candidates for their vacancies.</p>

        <p>Online job portals are a valuable resource for both job seekers and employers. They provide a way for job seekers to find and apply for jobs, and for employers to post job openings and find qualified candidates.We used a variety of design thinking techniques, such as empathy maps, customer journey maps, and personas, to understand the needs and pain points of all the different types of users of our web application.The system aims to streamline the hiring process, provide a diverse pool of talent for employers, and help job seekers find suitable employment opportunities.Our mission is to bridge the gap between talent and opportunity, creating meaningful connections that drive success and growth.</p>
        
        <h2>Why Choose Us?</h2>
        <ul>
            <li>Extensive network of reputable companies</li>
            <li>User-friendly platform for seamless job searching</li>
            <li>Personalized job recommendations based on your skills and preferences</li>
            <li>Dedicated support team ready to assist you at every step</li>
            <li>User Analysis whereby understanding the needs and pain points of the users of an online job portal.</li>
            <li>Survey Outcomes</li>
            <li>Empathy Map and Customer Journey Map</li>
            <li>Modules in the web application</li>
            <li>Prototype Design</li>
            <li></li>

        </ul>

        
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
