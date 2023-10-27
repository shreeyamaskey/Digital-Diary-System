<?php

try {
    error_reporting(0);

    include "../database/initialconn.php";



    if (isset($_POST['add'])) {

        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $img =  mysqli_real_escape_string($conn, $_FILES['image']['name']); //name of the file


        if (!empty($_FILES['image']['name'])) {
            $fileext = explode('.', $img); //seperating filename from the extension
            $filecheck = strtolower(end($fileext));

            $fileext_store = array('png', 'jpg', 'jpeg');

            if (in_array($filecheck, $fileext_store)) {
                move_uploaded_file($_FILES['image']['tmp_name'], "images/$img");

                $body_enc = encryptthis($body, $key); //encrypt the password for security purpose

                $sql = "INSERT INTO Entries (title, body, image) VALUES ('$title', '$body_enc', '$img')";

                if (mysqli_query($GLOBALS['conn'], $sql)) {

?>
                    <!DOCTYPE html>
                    <html>

                    <body>

                        <script>
                            alert("Created!");
                        </script>

                    </body>

                    </html>

                <?php

                    header("refresh:0; url= index.php");
                }
            } else {
                ?>
                <!DOCTYPE html>
                <html>

                <body>

                    <script>
                        alert("Extension not available. You can only upload files with the extension jpg, png or jpeg.");
                    </script>

                </body>

                </html>

                <?php

                header("refresh:0; url= add.php");
            }

            if (empty($_FILES['image']['name'])) {
                $body_enc = encryptthis($body, $key); //encrypt the password for security purpose

                $sql = "INSERT INTO Entries (title, body, image) VALUES ('$title', '$body_enc', '$img')";
                if (mysqli_query($GLOBALS['conn'], $sql)) {
                ?>
                    <!DOCTYPE html>
                    <html>

                    <body>

                        <script>
                            alert("Created without an image!");
                        </script>

                    </body>

                    </html>

                <?php

                    header("refresh:0; url= index.php");
                } else {
                ?>
                    <!DOCTYPE html>
                    <html>

                    <body>

                        <script>
                            alert("Error creating.. please try again.");
                        </script>

                    </body>

                    </html>

<?php

                    header("refresh:0; url= index.php");
                }
            }
        }
    }

} catch (mysqli_sql_exception $e) {
    $err = $e->getMessage();
    echo $err;
}
    //encrypt function
    $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';

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


?>