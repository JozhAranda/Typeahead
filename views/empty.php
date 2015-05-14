<div class="container empty_space">
    <div class="col-lg-12 col-sm-12" id="content">
        <div>
            <div id="details" class="col-lg-7 col-sm-7">
                <h2>Usuario no encontrado</h2>
                <p>Te recomiendo volver a buscar o dejar de jugar con la URL, gracias! :D</p>
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