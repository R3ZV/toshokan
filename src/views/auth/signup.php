<?php

require_once("src/views/template.php");

function signupPage(): string {
    $form = '';
    error_log(var_dump($_SESSION));
    if (array_key_exists('err', $_SESSION) && $_SESSION['err'] === "used-email") {
        $form .= "<p>Email you provided is already used!</p>";
        $_SESSION['err'] = NULL;
    }

    $form .= '<form action="/signup" method="POST">
        <form action="">
            <fieldset>
                <label>
                    Username:
                    <input
                        name="username"
                        placeholder="Username"
                    />
                </label>

                <label>
                    Email:
                    <input
                        type="email"
                        name="email"
                        placeholder="user@mail.com"
                   />
                </label>

                <label>
                    Password:
                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                   />
                </label>

            </fieldset>
        <input
            type="submit"
            value="Log In"
        />
    </form>
    <p>Have an account? LogIn <a href="/login">here</a>.
    ';
    return htmlFromTemplate($form);
}

?>
