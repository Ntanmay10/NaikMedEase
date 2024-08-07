<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/footer.css">
    <title>Footer</title>
</head>

<body>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p>
                        Accuracy and reliability: Medical information needs to be accurate and up-to-date.
                    </p>
                    <p>
                        Transparency: Be clear about your policies, procedures, and limitations.
                    </p>
                </div>
                <div class="col-md-4">
                    <h5>Reach Us</h5>
                    <p>Opp. Bus-Stop, Chikhli</p>
                    <p>+91 76986 22666</p>
                    <p>raxamedical@gmail.com</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" onclick="home();">Home</a></li>
                        <li><a href="#" onclick="feedback();">Feedback</a></li>
                        <li><a href="doctor.php">Consult Doctor</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="copyright">Copyright &copy; 2024 NaikMedEase</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="./js/nav.js"></script>
    <script>
        function feedback() {
            window.location.href = "feedback.php"
        }
    </script>
</body>

</html>