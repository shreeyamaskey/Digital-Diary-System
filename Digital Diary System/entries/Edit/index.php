<?php

include_once('header.php');

?>


<?php

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

try {

    if (count($_POST) > 0) {
        $img =  mysqli_real_escape_string($conn, $_FILES['image']['name']); //name of the file

        if (!empty($_FILES['image']['name'])) {
            $fileext = explode('.', $img); //seperating filename from the extension
            $filecheck = strtolower(end($fileext));

            $fileext_store = array('png', 'jpg', 'jpeg');

            if (in_array($filecheck, $fileext_store)) {
                move_uploaded_file($_FILES['image']['tmp_name'], "images/$img");

                $body_enc = encryptthis($_POST['body'], $key);
                $update = $conn->query("UPDATE Entries set id='" . $_POST['id'] . "', title='" . $_POST['title'] . "', image='" . $img . "', body='" . $body_enc . "' WHERE id='" . $_POST['id'] . "'");
                $message = "Successfully Updated!";
            }

            if (empty($_FILES['image']['name'])) {
                $body_enc = encryptthis($_POST['body'], $key);
                $update = $conn->query("UPDATE Entries set id='" . $_POST['id'] . "', title='" . $_POST['title'] . "', image='" . $img . "', body='" . $body_enc . "' WHERE id='" . $_POST['id'] . "'");
                $message = "Successfully Updated!";
            }
        }
    }
    $result = $conn->query("SELECT * FROM Entries WHERE id='" . $_GET['id'] . "'");
    while ($row = $result->fetch_assoc()) {
        $id = mysqli_real_escape_string($conn, $row['id']);
        $title = mysqli_real_escape_string($conn, $row['title']);
        $body_dec = decryptthis($row['body'], $key);
    }
} catch (Exception $e) {
    $err = $e->getMessage();
    echo $err;
}

?>

<form action="index.php" method="POST" enctype="multipart/form-data">

    <div><?php if (isset($message)) {
                echo $message;
            } ?>
    </div>
    <div>
        ID:
        <input type="hidden" name="id" class="text-input" value="<?php echo $row['id']; ?>">
        <input type="text" name="id" value="<?php echo $id; ?>">
    </div>
    <div>
        Title:
        <input type="text" name="title" class="text-input" value="<?php echo $title; ?>">
    </div>
    <div>
        Body:
        <textarea name="body" id="body"> <?php echo $body_dec; ?></textarea>
    </div>
    <div>
        Image:
        <input type="file" name="image" class="text-input">
    </div>
    <div>
        <input type="submit" name="update" value="Update Entry" class="button btn_big">
    </div>

    <?php
    include_once('footer.php');
    ?>