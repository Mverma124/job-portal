<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* General styles */
    

        /* Footer styles */
        .ftco-footer {
            background-color: #333;
            color: #fff;
            padding: 5px 0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2px;
            box-sizing: border-box; /* Include padding in width calculation */
        }

        .row {
            display: flex;
            flex-wrap: wrap; /* Allow wrapping of columns */
            margin-bottom: 3px;
        }

        .column {
            flex: 1 0 100%; /* Each column takes full width on small screens */
            padding: 0 15px;
            box-sizing: border-box; /* Include padding in width calculation */
            margin-bottom: 2px;
        }

        .column h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #fff;
            text-transform: uppercase;
            border-bottom: 2px solid #fff;
            padding-bottom: 1px;
        }

        .column p,
        .column ul li {
            color: #ccc;
            font-size: 14px;
            line-height: 1.6;
            list-style-type: none; /* Remove bullet points */
            margin-left: 0; /* Remove default left margin */
            padding-left: 0; /* Remove default left padding */
        }

        .column ul a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .column ul a:hover {
            color: #ddd;
        }

        .footer-info li {
            color: #ccc;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 1px;
        }

        .footer-info a {
            color: #fff;
            text-decoration: none;
        }

        .footer-info a:hover {
            text-decoration: underline;
            color: #ddd;
        }

        .footer-social {
            display: flex;
            align-items: center;
        }

        .footer-social a {
            color: #fff;
            font-size: 24px;
            transition: color 0.3s ease;
            margin-right: 15px;
        }

        .footer-social a:hover {
            color: #ddd;
        }

        .footer-social .fab {
            transition: all 0.3s ease;
        }

        .footer-social .fab:hover {
            transform: scale(1.2);
        }

        /* Hover effects */
        .column a:hover {
            color: #ccc;
        }

        /* Logo styles */
        
        .footer-logo {
    display: flex;
    justify-content: center;
    align-items: center;
}

.footer-logo img {
    max-width: 100px; /* Adjust logo size */
}

      

        /* Media queries */
        @media (min-width: 768px) {
            .column {
                flex: 1 0 50%; /* Two columns per row on medium screens */
            }
        }

        @media (min-width: 992px) {
            .column {
                flex: 1 0 33.33%; /* Three columns per row on large screens */
            }
        }
    </style>
</head>
<body>
    <footer class="ftco-footer">
        <div class="container">
            <div class="row">
                <div class="column">
                    
                        <h2>About Us</h2>
                
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <ul class="footer-social">
                        <li><a href="#" class="fab fa-twitter" title="Twitter"></a></li>
                        <li><a href="#" class="fab fa-facebook-f" title="Facebook"></a></li>
                        <li><a href="#" class="fab fa-instagram" title="Instagram"></a></li>
                    </ul>
                </div>
                <div class="column">
                    <h2>For Employers</h2>
                    <ul>
                        <li><a href="#" title="How it works">How it works</a></li>
                        <li><a href="#" title="Register">Register</a></li>
                        <li><a href="#" title="Post a Job">Post a Job</a></li>
                        <li><a href="#" title="Advance Skill Search">Advance Skill Search</a></li>
                        <li><a href="#" title="Recruiting Service">Recruiting Service</a></li>
                        <li><a href="#" title="Blog">Blog</a></li>
                        <li><a href="#" title="Faq">Faq</a></li>
                    </ul>
                </div>

                
                <d<div class="column">
    <ul class="footer-info">
        <div class="footer-logo">
            <img src="Sign.jpg" alt="Logo">
        </div> 
        <br> 
        <li><i class="fas fa-map-marker-alt icon"></i>xyz near abc kolkata</li>
        <li><i class="fas fa-phone icon"></i><a href="tel:+23923929210">91 392 3929 210</a></li>
        <li><i class="fas fa-envelope icon"></i><a href="mailto:info@yourdomain.com">jobportal.com</a></li>
    </ul>
</div>

            </div>
            <div class="row">
                <div class="column">
                    <p class="copyright">
                        &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
