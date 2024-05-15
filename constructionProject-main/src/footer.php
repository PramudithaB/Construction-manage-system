<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;

    }

    footer {
        background: #343434;
        padding-top: 50px;
    }

    .footer-container {
        width: 1140px;
        margin: auto;
        display: flex;
        justify-content: center;
    }

    .footer-content {
        width: 33.3%;
        color: white;
    }

    h3 {
        font-size: 28px;
        margin-bottom: 15px;
        text-align: center;
    }

    .footer-content p {
        width: 190px;
        margin: auto;
        padding: 7px;
    }

    .footer-content ul {
        text-align: center;
    }

    .footer-list {
        padding: 0;
    }

    .footer-list li {
        width: auto;
        text-align: center;
        list-style-type: none;
        padding: 7px;
        position: relative;
    }

    .footer-list li::before {
        content: '';
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 100%;
        width: 0;
        height: 2px;
        background: #f18930;
        transition-duration: .5s;
    }

    .footer-list li:hover::before {
        width: 70px;
    }

    .social-icons {
        text-align: center;
        padding: 0;
    }

    .social-icons li {
        display: inline-block;
        text-align: center;
        padding: 5px;
    }

    .social-icons i {
        color: white;
        font-size: 25px;
    }

    a {
        text-decoration: none;
        color: white;
    }

    a:hover {
        color: #f18930;
    }

    .social-icons i:hover {
        color: #f18930;
    }

    .bottom-bar {
        background: #f18930;
        text-align: center;
        padding: 10px 0;
        margin-top: 50px;
    }

    .bottom-bar p {
        color: #343434;
        margin: 0;
        font-size: 16px;
        padding: 7px;
    }
</style>

<body>
    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <h3>Contact System admin</h3>
                <p>Email:Info@example.com</p>
                <p>Phone:+94 761565556</p>
                <p>Address:Your Address 123 street</p>
            </div>
            <div class="footer-content">
                <h3>Do You Need Any Suport ?</h3>
                <p>Website:www.support.mid.lk</p>
                <p>Phone:+94 11 456 3789</p>

            </div>
            <div class="footer-content">
                <h3>Quick Links</h3>
                <ul class="footer-list">
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
            <div class="footer-content">
                <h3>Follow Us</h3>
                <ul class="social-icons">
                    <li><a href=""><i class="fab fa-facebook"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                    <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="bottom-bar">
            <p>&copy; 2024 Mendis Constructors . All rights reserved</p>
        </div>
    </footer>
</body>

</html>