<?php
    Auth::filter();
?>

<div class="row">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Column</th>
            <th scope="col">Value</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th scope="row">email</th>
                <td><?= Auth::getUser()["email"]; ?></td>
            </tr>

            <tr>
                <th scope="row">hash</th>
                <td><?= Auth::getUser()["hash"]; ?></td>
            </tr>

            <tr>
                <th scope="row">salt</th>
                <td><?= Auth::getUser()["salt"]; ?></td>
            </tr>

            <tr>
                <th scope="row">token</th>
                <td><?= Auth::getUser()["token"]; ?></td>
            </tr>

            <tr>
                <th scope="row">created</th>
                <td><?= Auth::getUser()["created"]; ?></td>
            </tr>
        </tbody>
    </table>
</div>