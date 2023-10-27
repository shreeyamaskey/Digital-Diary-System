<?php

include_once('header.php');

?>

<?php

try {
    function encryptthis($data, $key)
    {
        $encryption_key = base64_decode($key);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    function decryptthis($data, $key)
    {
        $encryption_key = base64_decode($key);
        list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
    }

    $result = $conn->query("SELECT * FROM Entries WHERE id='" . $_GET['id'] . "'");

    while ($row = $result->fetch_assoc()) {
        $body = decryptthis($row['body'], $key);
        $title = mysqli_real_escape_string($conn, $row['title']);

        $imageURL = '../images/' . $row["image"];
    }
} catch (Exception $e) {
    $err = $e->getMessage();
    echo $err;
}


?>

<div id="grad">
    <?php
    echo '<h1>' . $title . '</h1>';
    echo '<br>';
    echo '<p> ' . $body . ' </p>';

    ?>
    <img src="<?php echo $imageURL; ?>" alt="" />

    <?php
    include_once('footer.php');
    ?>