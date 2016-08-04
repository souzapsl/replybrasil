{include file="header.tpl" title=Header}

{include file="nav.tpl" title=$page_title}
      
    <div class="container">
        <div class="row">
            <form method="post" name="upload" enctype="multipart/form-data" action="">
                    <div class="col-sm-5 col-md-6">
                      <div class="thumbnail">
                        <div class="caption">
                            <h5>É permitido apenas arquivos .txt</h5>
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Selecione o arquivo</span>
                            <input name="file" type="file" class="form-control">
                          </div>
                          <br>
                          <p><button type="submit" class="btn btn-primary" role="button">Visualizar</button></p>
                        </div>
                      </div>
                    </div>
            </form>
            <div class="col-sm-5 col-md-6">
                      <div class="thumbnail">
                        <div class="caption">
                            <h3>{$message}</h3>
                            {if isset($new_file)}
                            <textarea cols="70" rows="10">{$new_file}</textarea>
                            {/if}
                        </div>
                      </div>
            </div>
        </div>  
    </div>
    
{include file="footer.tpl" title=Footer}
