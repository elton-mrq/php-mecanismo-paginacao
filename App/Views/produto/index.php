<div class="container">
    <div class="row">
      <form action="http://<?php echo APP_HOST; ?>/produto/" method="get" class="form-inline">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Total por página</label>
                    <select id="totalPorPagina" name="totalPorPagina" class="form-control input-sm" onchange="this.form.submit()">
                        <option value="5 <?php echo ($viewVar['totalPorPagina'] == "5") ? "select" : ""; ?>">5</option>
                        <option value="10 <?php echo ($viewVar['totalPorPagina'] == "10") ? "select" : ""; ?>">10</option>
                        <option value="15 <?php echo ($viewVar['totalPorPagina'] == "15") ? "select" : ""; ?>">15</option>
                    </select>
                </div> 
            </div>

            <div class="col-md-6">
                <div class="form-group pull-right">
                    <div class="input-group">
                        <span class="input-group-addon input-sm" id="basic-addon1">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </span>
                        <input type="text" placeholder="Buscar Produto" value="<?php echo $viewVar['buscaProduto']; ?>" class="form-control" required>
                        <div class="input-group-btn">
                            <button class="btn btn-sucess btn-sm" type="submit">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>           
      </form>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <hr>

            
        </div>
    </div>
</div>