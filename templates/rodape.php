<script src="../js/carrossel.js"></script>
<script src="../js/repete_senha.js"></script>
</main>


<?php if (isset($fixa)) : //aqui eu to verificando se as variaveis estao definidas, se sim vou usar um rodape que recebe elas para definir um style especifico?>
    <footer style="<?= $fixa, $bottom, $largura ?>">
    <?php else : //se nao vou usar o rodape comum que nao recebe parametros ?>
        <footer>
        <?php endif; ?>
        <!-- AQUI VAO OS ITENS DO RODAPE DA PAGINA -->
        <div class="container_contatos">
            <span class="material-symbols-outlined">mail</span>
            <span class="material-symbols-outlined">phone</span>
        </div>

        <div class="texto_rodape">
            <span>Todos os direitos reservados</span>
            <span>Site 100% seguro</span>
        </div>

        <div class="container_redes_sociais">
            <a href=""><i class="bi bi-twitter redes_sociais"></i></a>
            <a href=""><i class="bi bi-facebook redes_sociais"></i></a>
            <a href="https://www.instragram.com/cellria" target="_blank"><i class="bi bi-instagram redes_sociais"></i></a>
        </div>
        </footer>
        </body>

        </html>