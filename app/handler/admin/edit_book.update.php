<?php

use Controller\BookController;
use Util\DataCleaner;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['book'])) {
        $bookId = $_GET['book'];
        $book = new BookController();
        $bookInfo = $book->showBook($bookId);
    } else {
        header('Location: ../../view/admin/book.php');
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['bookId'])) {
        $bookId = $_POST['bookId'];
        $bookName = DataCleaner::sanitizeInput($_POST['bookName']);
        $bookOwner = DataCleaner::sanitizeInput($_POST['owner']);
        $bookGenre = DataCleaner::sanitizeInput($_POST['genre']);
        $bookShDesc = DataCleaner::sanitizeInput($_POST['shortDisc']);
        $bookLgDesc = DataCleaner::sanitizeInput($_POST['longDisc']);

        $file = $_FILES['image'];
        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];
        $fileNewName = '';

        if (!($fileError === 0)) {
            echo 'there was an error when uploading file!';
        } else {
            $fileNameComp = explode('.', $fileName);
            $fileExt = strtolower(end($fileNameComp));
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($fileExt, $allowed)) {
                echo 'not allowed to upload a file of this type!';
            } else {
                if ($fileSize >= 3000000) {
                    echo 'File is too big!';
                } else {
                    $fileNewName = uniqid('', true) . ".$fileExt";
                    $fileTmpDest = "../../../storage/images/books/temp/$fileNewName";
                    move_uploaded_file($fileTmp, $fileTmpDest);
                    $info = getimagesize($fileTmpDest);
                    $newHighWidth = 1195;
                    $newHighHeight = 1792;
                    $newLowWidth = 663;
                    $newLowHeight = 994;
                    switch ($info['mime']) {
                        case 'image/png':
                            $image = imagecreatefrompng($fileTmpDest);
                            $newHighImage = imagescale($image, $newHighWidth, $newHighHeight, IMG_BICUBIC_FIXED);
                            $newLowImage = imagescale($image, $newLowWidth, $newLowHeight, IMG_BICUBIC_FIXED);
                            imagepng($newHighImage, "../../../storage/images/books/highRes/$fileNewName");
                            imagepng($newLowImage, "../../../storage/images/books/lowRes/$fileNewName");
                            imagedestroy($newHighImage);
                            imagedestroy($newLowImage);
                            imagedestroy($image);
                            break;
                        case 'image/webp':
                            $image = imagecreatefromwebp($fileTmpDest);
                            $newHighImage = imagescale($image, $newHighWidth, $newHighHeight, IMG_BICUBIC_FIXED);
                            $newLowImage = imagescale($image, $newLowWidth, $newLowHeight, IMG_BICUBIC_FIXED);
                            imagewebp($newHighImage, "../../../storage/images/books/highRes/$fileNewName");
                            imagewebp($newLowImage, "../../../storage/images/books/lowRes/$fileNewName");
                            imagedestroy($newHighImage);
                            imagedestroy($newLowImage);
                            imagedestroy($image);
                            break;
                        case 'image/jpeg' or 'image/jpg':
                            $image = imagecreatefromjpeg($fileTmpDest);
                            $newHighImage = imagescale($image, $newHighWidth, $newHighHeight, IMG_BICUBIC_FIXED);
                            $newLowImage = imagescale($image, $newLowWidth, $newLowHeight, IMG_BICUBIC_FIXED);
                            imagejpeg($newHighImage, "../../../storage/images/books/highRes/$fileNewName");
                            imagejpeg($newLowImage, "../../../storage/images/books/lowRes/$fileNewName");
                            imagedestroy($newHighImage);
                            imagedestroy($newLowImage);
                            imagedestroy($image);
                            break;
                        default:
                            echo "there was an error";
                            break;
                    }
                    if (!unlink($fileTmpDest)) {
                        echo 'file was not deleted!';
                    } else {
                        echo 'file was deleted:)';
                    }
                }
            }
        }

        $bookImage = $fileNewName;
        $book = new BookController();
        $updateStatus = $book->editBook($bookId, $bookName, $bookOwner, $bookGenre, $bookShDesc, $bookLgDesc, $bookImage);
        if ($updateStatus) {
            header('Location: ../admin/book.php');
        } else {
            header('Location: ../pageNotFound.php');
        }
    }
}
