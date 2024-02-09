<?php
$data = [];

$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');

$conn = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);

$lastUserStatement = $conn->query("SELECT name, created_at as registered_at, profile_picture from registration order by created_at desc limit 1");
$lastUser = $lastUserStatement->fetchAll(PDO::FETCH_ASSOC);
$data['last_registered_user'] = $lastUser[0];

$data['last_registered_user']['registered_at'] = date('Y-m-d H:i:s', strtotime($data['last_registered_user']['registered_at']));

$registrationsPerHourStatement = $conn->query('SELECT date_trunc(\'hour\', created_at) as hour, count(*) from registration group by hour order by hour asc limit 24');
$registrationsPerHour = $registrationsPerHourStatement->fetchAll(PDO::FETCH_ASSOC);
$data['registrations_per_hour'] = $registrationsPerHour;
$data['registrations_per_hour'] = array_map(function($item) {
    return [
        date('H', strtotime($item['hour'])) => $item['count']
    ];
}, $data['registrations_per_hour']);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="https://tree-frontend-eight.vercel.app/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tree registrations</title>
    <script type="module" crossorigin src="https://tree-frontend-eight.vercel.app/assets/index-DbzKMFqd.js"></script>
    <link rel="stylesheet" crossorigin href="https://tree-frontend-eight.vercel.app/assets/index-qiupC-Oi.css">
  </head>
  <body>
    <div id="app"></div>
    <script>
      window.__REGISTRATION_DATA__ = <?php echo json_encode($data); ?>
    </script>
    </p>
  </body>
</html>
