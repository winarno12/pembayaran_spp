<?php var_dump($hari) ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">ADMIN LOGIN FORM</h4>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?= form_open(); ?>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                LOGIN FORM
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="" name="username" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="Password" autocomplete="off" />
                                </div>
                                <button type="submit" class="btn btn-info">Login</button>
                            </div>
                            <?= form_close() ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>