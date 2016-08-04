{include file="header.tpl" title=Header}

{include file="nav.tpl" title=$page_title}
      
    <div class="container">
        <div class="row">
            <p><button onclick="window.location.href='index.php'" type="button" class="btn btn-primary" role="button">Gerar novos jogos</button></p>
            {assign var="count" value="0"}
            {for $i=1 to $tables}
                <table width="100%" border="1" summary="Tabela contem as 60 dezenas possíveis da MegaSena e um jogo de 6 dezenas marcadas.">
                    <caption>Jogo {$i} da Mega Sena</caption>
                    {assign var="num" value="0"}
                    {assign var="end" value="60"}
                    <tr>
                    {foreach $numbers as $number}
                        {assign var="num" value="`$num+1`"} 
                            <td {if in_array($number, $bettings[$count]) } class="selected"{/if}>{$number}</td>
                    {if $num == 10}
                        </tr>
                        {if $number < $end}
                        <tr>
                        {/if}
                        {assign var="num" value="0"}
                    {/if}   
                    {/foreach}
                </table>
                {assign var="count" value="`$count+1`"} 
            {/for}
        </div>  
    </div>
    
{include file="footer.tpl" title=Footer}
