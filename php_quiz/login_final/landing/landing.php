<?php
session_start();
$user = "";
if (isset($_SESSION["username"])) {
    $user = $_SESSION["username"];
}

// require_once __DIR__ . "/logout.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP Course</title>
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>

    <header>
        <button class="btn" value="logout" name="logout"><a href="../landing/logout.php"> Log out</a></button>
        <h2 class="hello">Welcome, <?php echo $user ?></h2>
        <div class="head">
            <h1><img class="logo" src="./images/PHP-logo.svg" alt="" /></h1>
        </div>
    </header>

    <section>
        <div class="learn-php">
            <p>Skill Path</p>
            <br />
            <h1 class="learn">Learn PHP</h1>
            <br />
            <p>
                Learn the fundamentals of PHP, one of the most popular
                languages of modern web development.
            </p>
            <br />

            <p>
                Includes <strong>PHP, PHP Basics, PHP and HTML,</strong> and
                more.
            </p>
            <br />
            <div class="try">
                <button class="try-btn">
                    <strong>Start !</strong></button><br />
                <div class="learner">
                    <span><img class="learner-logo" src="./images/1468822390 - Copy.png" alt="" /><img class="learner-logo" src="./images/1468822390 - Copy (2).png" alt="" /><img class="learner-logo" src="./images/1468822390.png" alt="" /></span>
                    <p><strong>1,468</strong> learners enrolled</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="requirement">
            <div class="req-item">
                <img class="skill-icon" src="./images/bars-graph-svgrepo-com.svg" alt="" />
                <div>
                    <p>Skill level</p>
                    <strong>
                        <p>Beginner</p>
                    </strong>
                </div>
            </div>

            <div class="req-item">
                <img class="skill-icon" src="./images/clock-regular.svg" alt="" />
                <div>
                    <p>Time to complete</p>
                    <strong>
                        <p>4 weeks</p>
                    </strong>
                </div>
            </div>

            <div class="req-item">
                <img class="skill-icon" src="./images/certificate-svgrepo-com.svg" alt="" />
                <div>
                    <p>Certificate of completion</p>
                    <strong>
                        <p>Yes</p>
                    </strong>
                </div>
            </div>

            <div class="req-item">
                <img class="skill-icon" src="./images/task-list-svgrepo-com.svg" alt="" />
                <div>
                    <p>Prerequisites</p>
                    <strong>
                        <p>None</p>
                    </strong>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="About">
            <div>
                <h2>About this skill path</h2>
                <br />
                <p>
                    PHP is a widely used server-side scripting language that
                    has become increasingly fast and powerful through the
                    years. You can also use it on the front-end since PHP
                    can be embedded right into HTML. These features make
                    learning PHP a great option for any web developer. In
                    this skill path, you’ll work through PHP fundamental
                    programming concepts and gain the skills necessary to
                    develop programs in PHP.
                </p>
                <br /><br />
            </div>
            <div class="skills">
                <h2>Skills you'll gain</h2>
                <br />
                <ul class="check-head">
                    <li class="check-item">
                        <img class="check" src="./images/circle-check-solid.svg" alt="" />
                        Fundamental programming concept
                    </li>

                    <li class="check-item">
                        <img class="check" src="./images/circle-check-solid.svg" alt="" />
                        Use PHP with HTML forms
                    </li>

                    <li class="check-item">
                        <img class="check" src="./images/circle-check-solid.svg" alt="" />
                        Create classes and objects
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="syl-section">
        <div class="syllabus">
            <h2 class="syl-text">Syllabus</h2>
            <ul class="sy-items">
                <li class="syl-s">5 units</li>
                <li class="syl-s">17 lessons</li>
                <li class="syl-s">12 projects</li>
                <li class="syl-s">14 quizzes</li>
            </ul>
        </div>
        <hr />

        <div class="lesson">
            <ol class="lesson-list">
                <li class="lesson-items">
                    <strong>
                        <p>
                            Introduction to the Learn PHP Skill Path
                        </p>
                    </strong>

                    <p>Welcome to the Learn PHP Skill Path!</p>
                </li>

                <li class="lesson-items">
                    <strong>
                        <p>PHP Variables, Strings, and Numbers</p>
                    </strong>

                    <p>
                        Learn about variables, strings, and numbers in PHP.
                    </p>
                </li>

                <li class="lesson-items">
                    <strong>
                        <p>PHP Functions</p>
                    </strong>

                    <p>
                        Learn about user-defined and built-in functions in
                        PHP.
                    </p>
                </li>

                <li class="lesson-items">
                    <strong>
                        <p>PHP Conditionals and Logic</p>
                    </strong>

                    <p>
                        Learn about various operators and conditionals in
                        PHP.
                    </p>
                </li>

                <li class="lesson-items">
                    <strong>
                        <p>PHP and HTML</p>
                    </strong>

                    <p>
                        Learn how to embed PHP logic into HTML documents and
                        handle HTML form submission with PHP.
                    </p>
                </li>
            </ol>
        </div>
    </section>

    <footer>Copyright <strong>2023</strong>. All Rights Reserved</footer>
</body>

</html>