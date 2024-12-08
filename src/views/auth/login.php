<?php

require_once("src/views/template.php");

function loginPage(): string {
    $content = '
        <form>
            <fieldset>
                <label>
                    Username:
                    <input
                        name="username"
                        placeholder="Username..."
                    />
                </label>

                <label>
                    Password:
                    <input
                        type="password"
                        name="password"
                        placeholder="Password..."
                   />
                </label>
            </fieldset>
        <input
            type="submit"
            value="Log In"
        />
    </form>
    ';
    return htmlFromTemplate($content);
}

?>
