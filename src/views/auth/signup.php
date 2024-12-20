<?php

require_once("src/views/template.php");

function signupPage(): string {
    $form = '<form action="/signup" method="POST">
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
