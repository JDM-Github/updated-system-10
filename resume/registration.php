<?php
session_start();

// UNSET KASE PAG NASA REGISTRATION KA, DAT WALANG USER
unset($_SESSION["user"]);

// KINUHA KO UNG HEADER PARA DI PAULIT ULIT
include_once "header.php";
?>

<?php
// IMPORT UNG MODAL SA SUCCESS AT ERROR
require_once("modals.php");

// ETO UNG MAG DETECT NUN, EXAMPLE SUCCESS, CHECK NYA UN, TAS I TOAST NYA
// TAS AALISIN NA AGAD, PARA DI UMULIT
if (isset($_SESSION['success'])) {
    echo "<script>showSuccessModal('{$_SESSION['success']}');</script>";
    unset($_SESSION['success']);
} elseif (isset($_SESSION['error'])) {
    echo "<script>showErrorModal('{$_SESSION['error']}');</script>";
    unset($_SESSION['error']);
}
?>

<body class="bg-light">

    <!-- BOOTSTRAP AND SHIT -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow" style="width: 32rem; padding: 20px;">
            <div class="card-body">

                <!-- ETO UNG NAG LALAGAY KUNG LOGIN BA SYA O REGISTRATION -->
                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'login';

                // CHECHECK NYA UNG GETTER
                if ($page === 'login') {
                    // IF LOGIN PAGE
                    include_once "login.php";
                } elseif ($page === 'register') {
                    // IF REGISTER PAGE 
                    include_once "register.php";
                }
                ?>
            </div>
        </div>
    </div>
</body>

<!-- INIMPORT LANG UNG FOOTER -->
<?php
include_once "footer.php";
?>