<?php
require_once("src/views/template.php");

function showActivations($activations): string {
    $content = '<div>';
    foreach ($activations as $activation) {
        $item = sprintf('
            <form method="POST" action="admin/activations?id=%s">
                <p>[ID: %s]: Activation request</p>
                <input type="hidden" name="extra_submit_param" value="extra_submit_value">
                <button type="submit" name="action" value="approve">Approve</button>
                <button type="submit" name="action" value="deny">Deny</button>
            </form>', $activation['id'], $activation['id']
        );

        $content .= $item;
    }

    $content .= '</div>';
    return htmlFromTemplate($content);
}
?>

