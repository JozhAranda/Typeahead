<div class="container empty_space">
    <div class="col-lg-12 col-sm-12" id="content">
        <div>
            <div id="details" class="col-lg-7 col-sm-7">
                <div>
                    <div class="col-lg-3 col-sm-3" style="margin-bottom: 20px;">
                        <img src="<?php echo $rowPersonal['photo']; ?>" class="img-responsive" />
                    </div>    
                    <div class="col-lg-4 col-sm-4" style="margin-bottom: 20px;">
                        <h3><?php echo $rowPersonal['name']; ?></h3>
                        <h4><?php echo $rowPersonal['position']; ?></h4>
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Teléfono de oficina:</td>
                                <td>
                                    <i class="icon-home"></i> 
                                    <?php echo $rowPersonal['phone']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Teléfono celular:</td>
                                <td>
                                    <i class="icon-headphones"></i> 
                                    <?php echo $rowPersonal['cell_phone']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Correo electrónico:</td>
                                <td>
                                    <i class="icon-envelope"></i> 
                                    <a href="mailto:<?php echo $rowPersonal['email']; ?>"><?php echo $rowPersonal['email']; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Linkedin:</td>
                                <td>
                                    <i class="icon-retweet"></i> 
                                    <a href="<?php echo $rowPersonal['linkedin']; ?>"><?php echo $rowPersonal['linkedin']; ?></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-lg-5 col-sm-5">
                <div id="reports" class="well">
                    <h3 class="modal-header">Personal</h3>

                    <form class="form" name="directory" id="search">
                        <input type="text" class="form-control typeahead search_input" placeholder="Busca a un colaborador" autocomplete="off" data-provide="typeahead"/>
                        <br/>
                        <input type="hidden" class="col-sm-1" name="bondId" id="bondId" value="" />
                    </form>

                    <ul class="nav nav-list">
                        
                        <?php while($rowPersonals = $queryPersonals->fetch(PDO::FETCH_ASSOC)): ?>                        
                        <li>
                            <a href="?<?php echo $rowPersonals['name']; ?>">
                                <img width="50" height="50" src="<?php echo $rowPersonals['photo']; ?>" style="float:left;margin-right: 10px;">
                                <p class="list-item"><?php echo $rowPersonals['name']; ?><br><?php echo $rowPersonals['position']; ?></p>
                            </a>
                        </li>                        
                        <?php endwhile ?>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>   