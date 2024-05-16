<?php
//Start de sessie
session_start();
//Maakt verbinden met de database.
include_once('../config.php');

//Defineer de variabelen
$email = "";
$password = "";
$errors = array();

// Kijkt of er een Post request is gemaakt
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Zodra de request is gemaakt word er data opgehaald
    if (isset($_POST['login'])) {
        //Data uit de form word in variabelen opgeslagen
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validatie voor form input, Zodra er een error gevonden is word deze opgeslagen in de $errors array.
        if (empty(trim($email)) || empty($password)) {
            $errors[] = "All fields are required";
        }

        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifcatie voor wachtwoord zodra er een user is gevonden
        if ($user && password_verify($password, $user['password'])) {
            // Slaat de user data op in sessies
            $_SESSION['loggedInUser'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
        
            // Stuurt de user naar de betreffende pagina gebasseerd op rol
            if ($user['is_admin'] == 1) {
                header('Location: ../admin/index.php');
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            $errors[] = "Invalid email or password";
        }

        // Kijkt of er errors zijn, als deze er zijn word dit weergeven in een error message.
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo '<div class="flex justify-center absolute: bottom-0 left-0">';
                echo '<div class="flex justify-center bg-red-100 border border-red-400 text-red-700 mb-5 py-3 rounded relative w-96" role="alert">';
                echo '<ul>';
                echo '<li>' . $error  . '</li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';
            }
        } 
    }
}
?>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 bg-grey-100">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-98 h-48" src="../assets/images/images.jpeg" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-black">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST" novalidate>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-black">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 bg-white/5 py-1.5 pl-5 text-black shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-black">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 bg-white/5 py-1.5 pl-5 text-black shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit" name="login" class="flex w-full justify-center rounded-md bg-blue-700 px-3 py-1.5 text-lg font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-grey-600">
                Not a member?
                <a href="register.php" class="font-semibold leading-6 text-blue-700 hover:text-blue-500">Register here!</a>
            </p>
        </div>
    </div>
