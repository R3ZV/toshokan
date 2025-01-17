<?php

require_once("src/views/template.php");

function loginPage(): string {
    $form = '<form action="/login" method="POST">
        <form action="">
            <fieldset>
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
    <p>Don\'t have an account? SignUp <a href="/signup">here</a>.
    ';
    return htmlFromTemplate($form);
}

?>
