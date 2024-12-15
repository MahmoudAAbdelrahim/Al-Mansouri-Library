<?php
$host = 'localhost';
$db   = 'online_courses';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
$do = isset($_GET['do']) ? $_GET['do'] : 'Home';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Courses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Micro+5&family=Protest+Revolution&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css/bootstrap.css">
    <link rel="stylesheet" href="css/css/css.css">
    <link rel="stylesheet" href="csss.css">
    <link rel="stylesheet" href="cardcss.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css">
    <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

</head>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #333;
    color: white;
}

.logo {
    font-size: 24px;
}

.menu-icon {
    cursor: pointer;
    font-size: 24px;
}

.wallet {
    font-size: 18px;
}

nav {
    display: none;
}

nav.show {
    display: block;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 15px;
}

nav ul li a {
    color: white;
    text-decoration: none;
}

main {
    padding: 20px;
}

section {
    margin-bottom: 20px;
}

#courses-list,
#purchased-list {
    display: flex;
    flex-wrap: wrap;
}

.course {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px;
    width: 200px;
    text-align: center;
}
    /* This is purely for the demo */
    .container {
  max-width: 800px;
  margin: 0 auto;
}
.plyr {
  border-radius: 4px;
  margin-bottom: 15px;
}

.plyr .plyr__progress--played {
  background-color: #ff0; /* Set the played portion to yellow */
}

.text {
        color: #00ADB5;
        text-align: center;
        align-items: center;
      }
      .hidde{
display: none;      }
  </style>
  <body>
    <div class="container">
        <!-- Section 1: Header -->
        <header>
            <div class="logo">My Logo</div>
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <div class="wallet">Balance: <span id="balance"></span></div>
        </header>
        
        <!-- Section 2: Menu -->
        <nav id="menu">
            <ul>
                <li>Home</li>
                <li>About</li>
                <li>Contact</li>
                <li>Videos</li>
                <a href="index.php?do=date">Profile</a>
                <a href="index.php?do=About">Logout</a>
            </ul>
        </nav>

        <?php
    if ($do == 'About') { ?>
        <div id="alert-placeholder"></div>
        <!-- Section 3: Courses -->
        <main>
            <section id="available-courses">
                <h2>Available Courses</h2>
                <div id="courses-list"></div>
            </section>
            <section id="purchased-courses">
                <h2>Purchased Courses</h2>
                <div id="purchased-list"></div>
            </section>
             <!-- Placeholder for alerts -->
        </main>
    </div>
    

<?php }    
elseif ($do == 'date') {?>


    <h1 class="text" style="margin:50px 0 0 0 ;">الدرس الاول</h1>
    <div class="container">
        <?php
    $stmt = $pdo->query('SELECT id, title, price,description,video1,video2,video3,video4 FROM courses');
                    $available_courses = $stmt->fetch();
                    echo $available_courses['price'];

?>
        <video controls   poster="<?php echo $available_courses['description'] ?>" class="player">
                        <!-- Video files -->
                        <source src="<?php echo $available_courses['video1'] ?>" type="video/mp4" size="360">
                        <source src="<?php echo $available_courses['video2'] ?>" type="video/mp4" size="480">
                        <source src="<?php echo $available_courses['video3'] ?>" type="video/mp4" size="576">
                        <source src="<?php echo $available_courses['video4'] ?>" type="video/mp4" size="720">
        
                        <!-- Fallback for browsers that don't support the <video> element -->
                        <a href="<?php echo $available_courses['video1'] ?>" download>Download</a>
                    </video>

    </div>
          <div class="actions">
            <p type="button" class="btn js-play"></p>
            <p type="button" class="btn js-pause"></p>
            <p type="button" class="btn js-stop"></p>
            <p type="button" class="btn js-rewind"></p>
            <p type="button" class="btn js-forward"></p>
          </div>

    

    <?php
}
?>      
    <script>
        function toggleMenu() {
            document.getElementById('menu').classList.toggle('show');
        }

        $(document).ready(function() {
            // Fetch data from server
            $.get('fetch_data.php', function(data) {
                const result = JSON.parse(data);
                $('#balance').text(result.balance);

                result.courses.forEach(course => {
                    const courseElement = `<div class="course">
                        <h3>${course.title}</h3>
                        <button onclick="purchaseCourse(${course.id}, ${course.price})">Buy for ${course.price}</button>
                    </div>`;
                    $('#courses-list').append(courseElement);
                });

                result.purchased_courses.forEach(courseId => {
                    const purchasedCourse = result.courses.find(course => course.id == courseId);
                    const purchasedElement = `<div class="course">
                        <h3>${purchasedCourse.title}</h3>
                        <p>${purchasedCourse.description}</p>                    

                        <p style="  background-color: rgb(0, 0, 0);color: aqua;">مشتري</p>
                    </div>`;
                    $('#purchased-list').append(purchasedElement);
                });
            });
        });

        function showAlert(message, type) {
            const alertPlaceholder = document.getElementById('alert-placeholder');
            const alertHTML = `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
            alertPlaceholder.innerHTML = alertHTML;
        }

        function purchaseCourse(courseId, coursePrice) {
            const currentBalance = parseFloat($('#balance').text());
            if (currentBalance >= coursePrice) {
                $.post('purchase_course.php', { course_id: courseId, course_price: coursePrice }, function(response) {
                    const result = JSON.parse(response);
                    if (result.success) {
                        showAlert(' ! تم شراء الكورس بنجاح', 'success');
                        setTimeout(() => location.reload(), 2000);
                    } else {
                        showAlert('حدث خطا اثنا شراء الكورس.', 'danger');
                    }
                });
            } else {
                showAlert('!رصيدك لا يكفي لشراء الكورس', 'danger');
            }
        }
    </script>
    <script>

let video2 =document.getElementById('video2');
let video2a =document.getElementById('video2a');

video2a?.addEventListener('click' ,function(){
          // @ts-ignore
          video2.classList.remove("hidde")});
        
    </script>
      <script src="https://cdn.plyr.io/3.5.12/plyr.min.js"></script>
        <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>

<script>
    // تهيئة Plyr.js لكل مقطع فيديو
    document.addEventListener('DOMContentLoaded', function () {
            const players = document.querySelectorAll('.player');
            players.forEach(function(player) {
                new Plyr(player);
            });
        
  // Expose
  window.player = player;

  // Bind event listener
  function on(selector, type, callback) {
    document.querySelector(selector).addEventListener(type, callback, false);
  }

  // Play
  on('.js-play', 'click', () => { 
    player.play();
  });

  // Pause
  on('.js-pause', 'click', () => { 
    player.pause();
  });

  // Stop
  on('.js-stop', 'click', () => { 
    player.stop();
  });

  // Rewind
  on('.js-rewind', 'click', () => { 
    player.rewind();
  });

  // Forward
  on('.js-forward', 'click', () => { 
    player.forward();
  });
});
      </script>
    <script src="css/js/query.com_jquery-3.7.1.min.js"></script>
    <script src="css/js/bootstrap.min.js"></script>
    <script src="css/js/bootstrap.js"></script>
    <script src="eyetrc.js" type="text/javascript"></script>
    <script src="https://cdn.plyr.io/3.5.12/plyr.min.js"></script>
    <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => { 
            // This is the bare minimum JavaScript. You can opt to pass no arguments to setup.
            const player = new Plyr('.player');
            
            // Expose
            window.player = player;
            
            // Bind event listener
            function on(selector, type, callback) {
                document.querySelector(selector).addEventListener(type, callback, false);
            }
            
            // Play
            on('.js-play', 'click', () => { 
                player.play();
            });
            
            // Pause
            on('.js-pause', 'click', () => { 
                player.pause();
            });
            
            // Stop
            on('.js-stop', 'click', () => { 
                player.stop();
            });
            
            // Rewind
            on('.js-rewind', 'click', () => { 
                player.rewind();
            });
            
            // Forward
            on('.js-forward', 'click', () => { 
                player.forward();
            });
        });
    </script>
</body>
</html>
