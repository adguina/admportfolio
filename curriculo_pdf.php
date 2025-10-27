<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ini_set('display_errors', 0);

require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Agnaldo D Moraes');
$pdf->SetTitle('Currículo - Agnaldo D Moraes');
$pdf->SetMargins(15, 20, 15);
$pdf->SetAutoPageBreak(TRUE, 20);
$pdf->AddPage();

// Fonte para suportar Unicode (ícones)
$pdf->SetFont('dejavusans', '', 8);

// Imagem redonda
$imgFile = __DIR__ . '/img/guina.png';
if (file_exists($imgFile)) {
    $x = 35;
    $y = 25;
    $diameter = 40;

    $pdf->StartTransform();
    $pdf->Circle($x + $diameter / 2, $y + $diameter / 2, $diameter / 2, 'CNZ');
    $pdf->Image($imgFile, $x, $y, $diameter, $diameter, 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);
    $pdf->StopTransform();
}

$css = <<<CSS
body {
    font-family: helvetica, sans-serif;
    color: #333333;
}
h1 {
    font-size: 17pt;
    margin-bottom: 2pt;
}
h2 {
    font-size: 14pt;
    color: #555555;
    margin-top: 0;
    margin-bottom: 10pt;
    white-space: nowrap;
}
h3 {
    font-size: 11pt;
    border-bottom: 1pt solid #ccc;
    padding-bottom: 3pt;
    margin-top: 10pt;
    margin-bottom: 5pt;
}
p, li {
    font-size: 8.2pt;
    line-height: 1.2;
    margin-top: 0;
    margin-bottom: 3pt;
}
ul {
    margin: 0 0 10pt 15pt;
}
.period {
    font-size: 6pt;
    color: #666666;
    margin-bottom: 10pt;
}
table {
    width: 100%;
    border-collapse: collapse;
}
td {
    vertical-align: top;
    padding-right: 10pt;
}
.small-font {
    text-align: justify;
    padding-left: 5pt;
}
.experience-block {
    margin-bottom: 15pt;
}
.resumo {
    line-height: 1.8;
}
.experience-block ul li {
    line-height: 1.8;
}
/* Cor de fundo da primeira coluna */
.coluna-esquerda {
    background-color: #f0f0f0;
    padding: 10pt;
    border-radius: 5pt;
}
.coluna-esquerda {
    background-color: #f0f0f0;
    padding: 10pt;
    border-radius: 5pt;
    padding-left: -25pt; /* desloca para esquerda */
}
CSS;

$html = <<<HTML
<style>$css</style>

<table>
<tr>
<td width="50%" class="coluna-esquerda">
<p style="line-height:150pt;">&nbsp;</p>
    <h1><span style="white-space: nowrap;">Agnaldo D Moraes</span></h1>
    <h2>Analista Sistema T.I</h2>

    <h3>Detalhes de Contato</h3>
    <p>✉ adguina@email.com</p>
    <p>☎ (11) 97216-4906</p>
    <p>⌂ Itatiba - SP</p>

    <h3>Educação</h3>
        <div>
            <p><strong>Gestao T.I</strong><br>USF<br>2009 - 2011</p>
            <p><strong>Ciencia da Computacao</strong><br>Anhanguera<br>2013 - 2016</p>
        </div>

    <h3>Habilidades</h3>
        <ul>
           <li>Suporte a sistemas corporativos: identificação, análise e resolução de problemas técnicos</li>
                    <li>Raciocínio lógico e analítico para interpretação de dados e tomada de decisões</li>
                    <li>Mapeamento de processos e proposição de melhorias para otimização da usabilidade</li>
                    <li>Testes de sistemas e acompanhamento de implantações, garantindo conformidade com requisitos</li>
                    <li>Treinamento e capacitação de usuários para utilização eficiente das soluções</li>
                    <li>Comunicação clara e eficaz com usuários e equipes técnicas, facilitando a resolução de problemas</li>
        </ul>
     </td>

<td width="55%" class="small-font" style="padding-left: 10pt;">
    <h3>Resumo</h3>
    <p class="resumo">Sou um profissional de TI focado em sistemas corporativos, com experiência em suporte
                    funcional, testes, implantação de sistemas e treinamentos de usuários. Gosto de transformar
                    problemas em soluções práticas, garantindo que as ferramentas utilizadas no dia a dia funcionem de
                    forma eficiente e intuitiva.
                    Tenho perfil proativo, comunicativo e orientado a resultados, sempre buscando melhorar processos,
                    facilitar a rotina dos usuários e contribuir para o sucesso das operações da empresa.</p>

    <h3>Experiência Profissional</h3>

    <div class="experience-block">
        <p><strong>Analista Sistema T.I - Monica Sanches Bolsas e Acessorios Ltda</strong><br>
        <span class="period">2012 - Atual</span></p>
                 <ul>
                        <li>Implantação e configuração de sistemas de PDV (Ponto de Venda) em lojas da rede, incluindo
                            treinamento de usuários.</li>
                        <li>Suporte ao sistema de gestão GESTOR (CIGAM) Retaguarda e Frente de Loja.</li>
                        <li>Configuração e preparação de computadores para operação funcional de sistemas Gestao de
                            Vendas, garantindo desempenho e compatibilidade.</li>
                        <li>Configuração impressoras (térmicas,convencionais e fiscal).</li>
                        <li>Administração de servidores Linux (Debian 12 e Ubuntu Server) local.
                        </li>
                        <li>Gestao de servidores de arquivos com Active Directory, VPNs e servidores web com
                            Apache2.</li>
                        <li>Customização e manutenção básica de aplicações web em PHP, com suporte a bancos de dados
                            PostgreSQL e MySQL.</li>
                        <li>Criação e manutenção de rotinas de backup para bancos de dados PostgreSQL e MySQL,
                            garantindo a segurança e integridade das informações.</li>
                    </ul>
    </div>
    <div class="experience-block">
        <p><strong>Analista de Suporte - Neotextil Indústria e Comércio de Tecidos Ltda</strong><br>
        <span class="period">2008 - 2012</span></p>
        <ul>
            <li>Suporte ao usuário final em sistemas Windows e administração de servidor Windows Server 2003.</li>
            <li>Instalação e manutenção de sistemas de gerenciamento para a área têxtil, com suporte e treinamento aos usuários.</li>
            <li>Manutenção de computadores e instalação de impressoras térmicas e convencionais.</li>
            <li>Auxílio na infraestrutura de redes.</li>
            <li>Apoio na area de PCP.</li>
        </ul>
    </div>
    <h3>Referências</h3>
    <p>Disponíveis mediante solicitação</p>
</td>
</tr>
</table>
HTML;
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('curriculo_agnaldo.pdf', 'I');

